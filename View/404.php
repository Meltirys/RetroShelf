<?php $pageTitle = '404 - Page introuvable'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main class="main-contener">

    <section class="error-404">

        <p class="error-404-code">404</p>
        <p class="error-404-title">GAME OVER</p>
        <p class="error-404-msg">Cette page est introuvable ou n'existe pas.</p>
        <a href="<?= BASE_URL ?>/" class="btn-404"> Retour à l'accueil</a>

    </section>

</main>

<?php require RACINE . '/View/common/footer.php'; ?>