<?php $pageTitle = 'Connexion - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main class="main-contener">

    <h1>Connexion à RetroShelf</h1>

    <?php if (!empty($message)): ?>
        <div class="message-alerte">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>/login/login" method="POST">
        <label>Email : <input type="email" name="email" required></label><br>
        <label>Mot de passe : <input type="password" name="mdp" required></label><br>
        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte ? <a href="<?= BASE_URL ?>/inscription">S'inscrire</a></p>

</main>

<?php require RACINE . '/View/common/footer.php'; ?>
