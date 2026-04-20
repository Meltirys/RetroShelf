<?php $pageTitle = 'Inscription - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main class="main-contener">

    <h1>Rejoindre RetroShelf</h1>

    <?php if (!empty($message)): ?>
        <div class="message-alerte">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>/inscription/save" method="POST">
        <label>Pseudo : <input type="text" name="pseudo" required></label><br>
        <label>Email : <input type="email" name="email" required></label><br>
        <label>Mot de passe : <input type="password" name="mdp" required></label><br>
        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà un compte ? <a href="<?= BASE_URL ?>/login">Se connecter</a></p>

</main>

<?php require RACINE . '/View/common/footer.php'; ?>
