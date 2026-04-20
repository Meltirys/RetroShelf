<?php $pageTitle = 'Recherche - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main class="main-contener">

    <div class="search-header">
    <p class="result-para">Résultats de la recherche</p>
    <?php if (!empty($_GET['search'])): ?>
        <h1 class="search-title"><?= htmlspecialchars($_GET['search']) ?></h1>
    <?php endif; ?>
    </div>

    <div id="resultats" class="cards"></div>

    <!-- Stocke la valeur de la recherche pour api.js -->
    <input type="hidden" id="mot-clé" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

</main>

<script>const BASE_URL = "<?= BASE_URL ?>";</script>
<script src="<?= BASE_URL ?>/Public/JS/api.js"></script>

<?php require RACINE . '/View/common/footer.php'; ?>
