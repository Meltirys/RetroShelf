<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RetroShelf — Votre ludothèque personnelle pour suivre votre collection de jeux vidéo rétro.">
    <title><?= $pageTitle ?? 'RetroShelf' ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/Public/CSS/style.css">
</head>

<body>

<header class="header">
    <div class="header-content">

        <div class="logo">
            <a href="<?= BASE_URL ?>">
                <img src="<?= BASE_URL ?>/Public/IMAGES/logo.svg" alt="RetroShelf">
            </a>
        </div>

        <form action="<?= BASE_URL ?>/search" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Titre du jeu..." required>
            <button type="submit">Rechercher</button>
        </form>

        <div class="header-actions">

            <?php if (!empty($_SESSION['user_id'])): ?>
            <div class="user-menu">
                <button id="btn-user" class="btn-user-toggle" aria-expanded="false">
                    <img src="<?= BASE_URL ?>/Public/IMAGES/profile.svg" alt="Mon compte">
                </button>
                <div id="user-dropdown" class="user-dropdown" hidden>
                    <a href="<?= BASE_URL ?>/profil" class="user-dropdown-item">Mon profil</a>
                    <a href="<?= BASE_URL ?>/logout" class="user-dropdown-item user-dropdown-logout">Déconnexion</a>
                </div>
            </div>
            <?php else: ?>
            <a href="<?= BASE_URL ?>/auth" class="btn-user-toggle">
                <img src="<?= BASE_URL ?>/Public/IMAGES/profile.svg" alt="Mon compte">
            </a>
            <?php endif; ?>

            <button id="research" class="btn-search-toggle">
                <img src="<?= BASE_URL ?>/Public/IMAGES/magnifying-glass-solid-full.svg" alt="recherche">
            </button>

        </div>

    </div>

</header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const btn       = document.getElementById('research');
    const searchBar = document.querySelector('.search-form');
    const input     = searchBar.querySelector('input[name="search"]');
    const btnUser   = document.getElementById('btn-user');
    const dropdown  = document.getElementById('user-dropdown');

    // Loupe : ferme le dropdown si ouvert, puis bascule la barre de recherche
    btn.addEventListener('click', function () {
        if (dropdown) { dropdown.hidden = true; }
        searchBar.classList.toggle('open');
        if (searchBar.classList.contains('open')) {
            input.focus();
        }
    });

    // Bouton profil : ferme la recherche si ouverte, puis bascule le dropdown
    if (btnUser) {
        btnUser.addEventListener('click', function (e) {
            e.stopPropagation();
            searchBar.classList.remove('open');
            dropdown.hidden = !dropdown.hidden;
        });

        // Clic en dehors : ferme le dropdown
        document.addEventListener('click', function () {
            dropdown.hidden = true;
        });
    }
});
</script>
