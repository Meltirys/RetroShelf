# RetroShelf

Ludothèque personnelle pour suivre sa collection de jeux vidéo rétro.

Projet étudiant réalisé dans le cadre d'une formation en développement web.

---

// Fontions

- Recherche de jeux via l'API RAWG
- Fiche détaillée par jeu (plateformes, description, note moyenne)
- Gestion de collection et liste de souhaits
- Système de commentaires
- Espace admin (modération, édition des fiches)

---

// Stack

- PHP (MVC maison, sans framework)
- MySQL / PDO
- HTML / SCSS
- JavaScript vanilla

---

// Installation

1. Cloner le repo
2. Copier `Config/data.example.php`et le renommer en `Config/data.php` et renseigner les identifiants BDD
3. Importer `RetroShelf.sql` dans phpMyAdmin
4. Pointer le vhost vers le dossier racine

---

// API

Les données jeux proviennent de [RAWG](https://rawg.io) — les images et informations sont la propriété de leurs auteurs respectifs.

