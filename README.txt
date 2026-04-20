Ce README sera compléter de manière progressive, en traçant brièvement la construction fonctionnelle du site et des différents fichiers qui le constitueront.
Il sera écrit sous le format d'un carnet des tâches pour ne pas en perdre le suivi.

Actuellement réaliser : 

-Le routage depuis le fichier routev2.php (car le route.php écris en switch case a été mis de côté). 
- Création des controllers nécessaire avec les appels requis pour le fonctionnement du routage.
- Création du modèle de connexion à la base de données.
- Mise en en place des différentes fonctions qui constitueront le modèle utilisateur qui sera créer par la suite(inscription, connexion, deconnexion, modification).
- Création des vues de l'accueil, de la page de connexion et d'inscription (simples versions de test).
- Ajouter une session_destroy() après le deleteuser dans profil_ctl pour la suppression de compte
- Requêtage de l'API avec JS.
- Construction des cartes retournées sur la page de résultat. (Ajout des descriptions de jeu, malheureusement en anglais)
- Créer l'espace des commentaires (avis) d'une page de jeu détailler.
- Construire les listes de souhaits et de possessions, d'un profil.
- Réécriture de api.js pour passer en une requête (PromiseAll() pour de meilleurs performances)
- Réalisation du header (format sticky pour la navigation)
- Écriture du CSS et de l'HTML des pages suivantes : -Accueil 
                                                     -Resultats
                                                     -Profil

- Réalisation du script de selections des tabs du menu profil





En cours de réalisation : 

- Ajouter un contrôle strict de la longueur du mot de passe à l'inscription
- Refactoriser le code sur les conventions de nommages et de commentaires
- Cacher l'ensemble des fichiers en dehors du dossier public (js/css/fonts) et l'index depuis le htaccess.
- Contrôler la gestion des espaces lors d'une recherche de jeu avec un ParamBind (et conséquemment dans l'enregistrement de la bdd)
- Refactoriser le code des pages Connexion / inscription



À réaliser par la suite :

- La construction front-end des pages (finir le CSS et la mise en page conformément au figma)
- Pour l'intégration vidéo, l'api propose des "trailers" des jeux. // Non réalisable en utilisation non commerciale
- Écrire le footer (bien mentionner RAWG comme demander en suivant le RGPD)
- Concevoir la page de mentions légale et contact
- Passer les test de sécurité ZAAP 
- Préparer le passage O2Switch
- Préparer les supports et diapositives du projet pour l'oral
- S'exercer à jouer du violon pendant 45min pour Mercredi.




Thoughts : 

Pour afficher les plateformes sur lequelles un jeu se trouve, 
cela se trouve dans un tableau d'objet (plateforms) puis dans l'objet (platform), 
il faudra ensuite en récupérer son nom (name).

Pour la construction d'une page de jeu, il nous est nécessaire de récupérer par les filtres de l'api, 
les données suivantes :

API (RAWG) | BDD

id | RefExterne
name | Titre
released | Date_Sortie
background_image | Image
description | Description

Les images retournées par l'API RAWG ne sont pas les jaquettes de jeu,
elle peuvent parfois l'être ou simplement renvoyés des images directes du jeu.
Il faudrais se renseigner sur l'API IGDB d'Amazon, 
elle possède les jaquettes et est plus rapide et complète mais le requêtage semble plus complexe et demande une autorisation OAuth2 avec une connexion Twitch.
Il faut vérifier si cela demande une lourde restructuration ou non.
PS : Elle propose aussi l'accès a des trailers de jeu sans coût pour l'intégration d'un média


Pour la partie HTML/CSS dans le cas des cartes mise en avant dans la partie accueil et la page de résultat, le but sera de garder une 
taille fixe sur les deux interfaces et de proposer un défilement pour la partie mobile.
Il faut aussi changer l'écoute dans le fichier api.js étant donner que je vais modifier pour le format responsive l'intégration de la barre de recherche


Dans le cas de la page de connexion je vais faire en sorte que chaque paramètre modifiable est sa validation d'envoi. Une erreur a été repérer le formulaire d'inscription ne semble plus fonctionnel,
à vérifier entre le home.php actuel et la première version quels serait les éléments en defauts.


Pas besoin de mettre le composer.json et n'est pas nécessaire pour le portage O2Switch, pas sur Github, il faudra refaire une install


Étant donner qu'un utilisateur supprimer est seulement anonymiser, et qu'il garde donc une existance dans la base, il se retrouve visible dans le tableau de bord admin, 
filtrer les utilisateurs supprimés pour ne laisser que les existants. Exclure aussi l'administrateur ?


Dans le cas de la page de résultats, le JS construit les cartes qui sont recueillies par la div, je dois m'arranger pour un style unifié avec les fiches de l'accueil


penser à renforcer les retours de l'api (response => if(!response.ok)..)


Protéger les requêtes des models (fonction écrite, il ne reste plus qu'à l'appeler)


Unifier les pages de connexions et d'inscription (Système flip similaire aux onglets de Collection/ Wishlist)


Last point //

- Rédiger le powerpoint de présentation ainsi que le dossier de projet.
- Mémoriser les alternatives d'écriture et de syntaxes des méthodes et fonctions.

- l'image de susbtitue ne s'affiche que sur la fiche de jeu et non au résultat.
