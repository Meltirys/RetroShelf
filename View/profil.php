<?php $pageTitle = 'Mon profil - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main class="profil">

    <main class="profil main-contener">

        <!-- En-tête page -->
        <div class="profil-header">
            <h1 class="profil-title">Mon profil</h1>
            <p class="profil-subtitle">Modification de profil</p>
        </div>

        <!-- Formulaire -->
        <section class="form-card">

            <?php if (!empty($message)): ?>
                <?= $message ?>
            <?php endif; ?>

            <form method="POST" action="<?= BASE_URL ?>/profil/update">

                <div class="form-row">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user['Pseudonyme']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['Email']) ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mdp_actuel">Mot de passe actuel</label>
                    <input type="password" id="mdp_actuel" name="mdp_actuel" placeholder="Requis pour changer le mot de passe">
                </div>

                <div class="form-group">
                    <label for="mdp">Nouveau mot de passe</label>
                    <input type="password" id="mdp" name="mdp">
                </div>

                <div class="form-group">
                    <label for="mdp_confirm">Confirmer le nouveau mot de passe</label>
                    <input type="password" id="mdp_confirm" name="mdp_confirm">
                </div>


                <button type="submit" class="btn-update">Mettre à jour</button>

            </form>
        </section>


        <!-- Ludothèque -->
        <?php
        $possede = array_filter($collection, fn($j) => $j['Statut'] === 'possede');
        $souhait = array_filter($collection, fn($j) => $j['Statut'] === 'souhait');
        ?>

        <div class="tabs-card">
            <div class="tabs-nav">
                <button class="tab-btn active" data-tab="collection">Collection</button>
                <button class="tab-btn" data-tab="wishlist">Wishlist</button>
            </div>

            <div class="tab-content active" id="tab-collection">
                <?php if (empty($possede)): ?>
                    <p>Votre collection est vide. <a href="<?= BASE_URL ?>">Recherchez un jeu</a> pour commencer !</p>
                <?php else: ?>
                    <div class="cards profil-cards">
                        <?php foreach ($possede as $jeu): ?>
                            <a href="<?= BASE_URL ?>/game/index/<?= $jeu['Id_Jeu'] ?>">
                                <div class="mini-card">
                                    <header><img src="<?= htmlspecialchars($jeu['Image']) ?>" alt="<?= htmlspecialchars($jeu['Titre']) ?>" loading="lazy" onerror="this.src='<?= BASE_URL ?>/Public/IMAGES/missing_card.svg'"></header>
                                    <div class="content">
                                        <p><?= htmlspecialchars($jeu['Titre']) ?></p>
                                    </div>
                                    <footer><?= htmlspecialchars($jeu['Date_Sortie'] ?? 'Date inconnue') ?></footer>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="tab-content" id="tab-wishlist">
                <?php if (empty($souhait)): ?>
                    <p>Votre liste de souhaits est vide.</p>
                <?php else: ?>
                    <div class="cards profil-cards">
                        <?php foreach ($souhait as $jeu): ?>
                            <a href="<?= BASE_URL ?>/game/index/<?= $jeu['Id_Jeu'] ?>">
                                <div class="mini-card">
                                    <header><img src="<?= htmlspecialchars($jeu['Image']) ?>" alt="<?= htmlspecialchars($jeu['Titre']) ?>" loading="lazy" onerror="this.src='<?= BASE_URL ?>/Public/IMAGES/missing_card.svg'"></header>
                                    <div class="content">
                                        <p><?= htmlspecialchars($jeu['Titre']) ?></p>
                                    </div>
                                    <footer><?= htmlspecialchars($jeu['Date_Sortie'] ?? 'Date inconnue') ?></footer>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <!-- Suppression du compte -->
        <section class="supprimer-compte">
            <h2>Supprimer mon compte</h2>
            <p>Attention ! Cette action est irréversible.</p>
            <form method="POST" action="<?= BASE_URL ?>/profil/delete">
                <button type="submit" class="btn-supprimer">Supprimer mon compte</button>
            </form>
        </section>

        <script>
            document.querySelectorAll('.tab-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    // Désactiver tous les boutons et onglets
                    document.querySelectorAll('.tab-btn').forEach(function(b) {
                        b.classList.remove('active');
                    });
                    document.querySelectorAll('.tab-content').forEach(function(c) {
                        c.classList.remove('active');
                    });

                    // Activer le bouton cliqué et son onglet correspondant
                    btn.classList.add('active');
                    document.getElementById('tab-' + btn.dataset.tab).classList.add('active');
                });
            });
        </script>

    </main>

    <?php require RACINE . '/View/common/footer.php'; ?>