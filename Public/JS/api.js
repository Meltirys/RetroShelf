/*
 * Flux complet :
 * 1. On récupère le mot-clé saisi par l'utilisateur
 * 2. On cherche en BDD locale via PHP
 * 3. On cherche simultanément via l'API RAWG directement
 * 4. On fusionne les deux résultats et on affiche les cartes
 * 5. On envoie à PHP uniquement les nouveaux jeux à sauvegarder
 */

document.addEventListener("DOMContentLoaded", function () {
  // On récupère le mot-clé stocké dans le champ caché de search.php
  // Ce champ est rempli côté PHP avec la valeur de $_GET['search']
  const keyword = document.getElementById("mot-clé").value;
  const resultspot = document.getElementById("resultats");

  resultspot.innerHTML = "";

  if (!keyword) {
    resultspot.innerHTML = "<p>Veuillez saisir un mot-clé.</p>";
    return;
  }

  // On lance les deux recherches (locale et api) en parallèle grâce à Promise.all()
  // Cela évite d'attendre la fin de l'une avant de lancer l'autre
  // et rend la recherche plus rapide
  Promise.all([searchLocal(keyword), searchRawg(keyword)])
    .then((results) => {
      const localGames = results[0];
      const rawgGames = results[1];

      // On récupère les références externes des jeux déjà en local
      // pour identifier ceux qui sont nouveaux côté RAWG
      const localRefs = localGames.map((game) => String(game.RefExterne));

      // On filtre les jeux RAWG pour ne garder que les nouveaux
      const newGames = rawgGames.filter(
        (game) => !localRefs.includes(String(game.externalRef)),
      );

      // On fusionne les résultats locaux et les nouveaux jeux RAWG
      // Les jeux locaux sont affichés en premier
      const newGamesFormatted = [];
      newGames.forEach((game) => {
        newGamesFormatted.push({
          Id_Jeu: null,
          Titre: game.name,
          Date_Sortie: game.released,
          Image: game.background_image,
          externalRef: game.externalRef,
        });
      });

      const allGames = [...localGames, ...newGamesFormatted];

      // On affiche toutes les cartes, si aucune renvoi un message
      if (allGames.length === 0) {
        resultspot.innerHTML = "<p>Aucun résultat trouvé.</p>";
        return;
      }

      allGames.forEach((game) => {
        const card = createCard(game);
        resultspot.appendChild(card);
      });

      // On envoie à PHP uniquement les nouveaux jeux à sauvegarder
      if (newGames.length > 0) {
        saveGames(newGames);
      }
    })
    .catch((error) => {
      console.error("Erreur lors de la recherche :", error);
    });
});

// On recherche les jeux en BDD locale via PHP
// On retourne un tableau vide si PHP ne répond pas
function searchLocal(keyword) {
  const params = new URLSearchParams({ keyword });
  return fetch(`${BASE_URL}/search/results?${params}`)
    .then((response) => {
      if (!response.ok) throw new Error("Réponse de la base non valide");
      return response.json();
    })
    .catch(() => []);
}

// On appelle directement l'API RAWG depuis le navigateur
// On laisse le front-end dialoguer avec le service externe
function searchRawg(keyword) {
  const apikey = "aff19c69f16a42eb8b4902a215f4762d";
  const platforms =
    "23,49,74,167,79,107,27,83,106,15,80,105,14,11,16,26,43,24,9,17,77,46";
  const params = new URLSearchParams({
    key: apikey,
    search: keyword,
    platforms,
  });
  const url = `https://api.rawg.io/api/games?${params}`;

  return fetch(url)
    .then((response) => {
      if (!response.ok) throw new Error("Réponse de RAWG non valide");
      return response.json();
    })
    .then((data) => {
      // On formate les résultats pour notre usage
      // et on ajoute la référence externe pour la détection des doublons
      return (data.results ?? []).map((game) => ({
        externalRef: String(game.id),
        name: game.name ?? "Inconnu",
        released: game.released ?? null,
        background_image: game.background_image ?? "",
        platforms: game.platforms ?? [],
        genres: game.genres ?? [],
      }));
    })
    .catch((err) => {
      console.error("Erreur RAWG :", err);
      return [];
    });
}

// On envoie les nouveaux jeux à PHP pour sauvegarde en BDD locale
// On laisse le front-end transmettre les données récupérées auprès de RAWG
// On utilise POST avec un format JSON pour envoyer les données
function saveGames(games) {
  fetch(`${BASE_URL}/search/save`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(games),
  })
    .then((response) => {
      if (!response.ok) throw new Error("Réponse de la sauvegarde non valide");
      return response.json();
    })
    .then((savedGames) => {
      // On récupère les jeux avec leurs nouveaux id locaux retournés par PHP
      // On met à jour les cartes affichées pour que leurs liens fonctionnent
      savedGames.forEach((saved) => {
        const card = document.querySelector(
          `[data-ref="${saved.externalRef}"]`,
        );
        if (card) {
          card.href = `${BASE_URL}/game/index/${saved.Id_Jeu}`;
        }
      });
    })
    .catch((error) => {
      console.error("Erreur lors de la sauvegarde :", error);
    });
}

// On crée et retourne une carte HTML pour un jeu dans les deux cas :
// - Jeu local : Id_Jeu est connu, on crée le lien directement
// - Jeu RAWG non encore sauvegardé : Id_Jeu est null,
//   on met à jour le lien après la sauvegarde via saveGames();
function createCard(game) {
  const name = game.Titre ?? game.name ?? "Inconnu";
  const date = game.Date_Sortie ?? game.released ?? "Date inconnue";
  const image = game.Image ?? game.background_image ?? "";
  const id = game.Id_Jeu;
  const ref = game.externalRef ?? "";

  const link = document.createElement("a");
  link.href = id ? `${BASE_URL}/game/index/${id}` : "#";
  link.dataset.ref = ref;

  const article = document.createElement("div");
  article.classList.add("mini-card");

  const header = document.createElement("header");
  const img = document.createElement("img");
  img.src = image;
  img.alt = `Jaquette de ${name}`;
  img.loading = "lazy";
  img.onerror = function () {
    this.src = `${BASE_URL}/Public/IMAGES/missing_card.svg`;
  };
  header.appendChild(img);

  const content = document.createElement("div");
  content.classList.add("content");
  const title = document.createElement("p");
  title.textContent = name;
  content.appendChild(title);

  const footer = document.createElement("footer");
  footer.textContent = date;

  article.appendChild(header);
  article.appendChild(content);
  article.appendChild(footer);
  link.appendChild(article);

  return link;
}
