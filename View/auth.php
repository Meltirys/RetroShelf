<?php $pageTitle = 'Connexion / Inscription - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main class="main-contener">
<div class="auth-screen">

    <!-- Son 8-bit de sélection — ajouter le fichier audio et remplir les src -->
    <audio id="sfx-select" preload="auto">
        <source src="<?= BASE_URL ?>/Public/AUDIO/select.ogg" type="audio/ogg">
        <source src="<?= BASE_URL ?>/Public/AUDIO/select.mp3" type="audio/mpeg">
    </audio>

    <p class="auth-screen-title">RETRO_SHELF</p>

    <!-- Menu de sélection style console -->
    <div class="auth-menu">
        <button class="auth-menu-btn <?= ($activeTab ?? 'login') === 'login' ? 'active' : '' ?>" data-tab="tab-login">
            <span class="auth-arrow">►</span> CONTINUE
        </button>
        <button class="auth-menu-btn <?= ($activeTab ?? 'login') === 'inscription' ? 'active' : '' ?>" data-tab="tab-inscription">
            <span class="auth-arrow">►</span> NEW GAME
        </button>
    </div>

    <!-- Formulaire Connexion -->
    <div id="tab-login" class="auth-form-panel <?= ($activeTab ?? 'login') === 'login' ? 'active' : '' ?>">

        <?php if (!empty($message) && ($activeTab ?? 'login') === 'login'): ?>
            <p class="auth-message"><?= $message ?></p>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>/auth/login" method="POST" class="auth-form">
            <div class="auth-field">
                <label class="auth-label" for="login-email">Email</label>
                <input class="auth-input" type="email" id="login-email" name="email" required>
            </div>
            <div class="auth-field">
                <label class="auth-label" for="login-mdp">Mot de passe</label>
                <input class="auth-input" type="password" id="login-mdp" name="mdp" required>
            </div>
            <button type="submit" class="btn-auth">Se connecter</button>
        </form>

    </div>

    <!-- Formulaire Inscription -->
    <div id="tab-inscription" class="auth-form-panel <?= ($activeTab ?? 'login') === 'inscription' ? 'active' : '' ?>">

        <?php if (!empty($message) && ($activeTab ?? 'login') === 'inscription'): ?>
            <p class="auth-message"><?= $message ?></p>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>/auth/save" method="POST" class="auth-form">
            <div class="auth-field">
                <label class="auth-label" for="reg-pseudo">Pseudo</label>
                <input class="auth-input" type="text" id="reg-pseudo" name="pseudo" required>
            </div>
            <div class="auth-field">
                <label class="auth-label" for="reg-email">Email</label>
                <input class="auth-input" type="email" id="reg-email" name="email" required>
            </div>
            <div class="auth-field">
                <label class="auth-label" for="reg-mdp">Mot de passe <span class="auth-hint">(8 caractères min.)</span></label>
                <input class="auth-input" type="password" id="reg-mdp" name="mdp" required>
            </div>
            <button type="submit" class="btn-auth">Créer mon compte</button>
        </form>

    </div>

</div>
</main>

<script>
document.querySelectorAll('.auth-menu-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        // Jouer le son 8-bit de sélection
        var sfx = document.getElementById('sfx-select');
        sfx.currentTime = 0;
        sfx.play();

        // Changer l'onglet actif
        document.querySelectorAll('.auth-menu-btn').forEach(function(b) { b.classList.remove('active'); });
        document.querySelectorAll('.auth-form-panel').forEach(function(p) { p.classList.remove('active'); });
        btn.classList.add('active');
        document.getElementById(btn.dataset.tab).classList.add('active');
    });
});
</script>

<?php require RACINE . '/View/common/footer.php'; ?>
