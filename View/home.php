<?php $pageTitle = 'Accueil - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main class="main-contener">

    <section class="welcome">
        <h1>BIENVENUE SUR <br> RETRO SHELF!</h1>
        <p>Votre ludothèque personnelle pour le suivi de votre collection de jeux vidéo<br> anciens.
            Explorez, collectionnez et partagez vos avis sur vos jeux préférés !</p>
    </section>

    <section class="hightlights">
        <div class="games-hight-blue">
            <h2>LES MIEUX NOTÉS</h2>
        </div>

        <?php if (empty($featured)): ?>
            <p>Aucun jeu noté pour le moment.</p>
        <?php else: ?>
            <div class="cards cards-scroll">
                <?php foreach ($featured as $jeu): ?>
                    <a href="<?= BASE_URL ?>/game/index/<?= $jeu['Id_Jeu'] ?>">
                        <div class="mini-card">
                            <header>
                                <img src="<?= htmlspecialchars($jeu['Image']) ?>" alt="<?= htmlspecialchars($jeu['Titre']) ?>" loading="lazy" onerror="this.src='<?= BASE_URL ?>/Public/IMAGES/missing_card.svg'">
                            </header>
                            <div class="content">
                                <p><?= htmlspecialchars($jeu['Titre']) ?></p>
                            </div>
                            <footer><?= htmlspecialchars($jeu['Date_Sortie'] ?? 'Date inconnue') ?></footer>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <section class="hightlights">
        <div class="games-hight-brown">
            <h2>NOUVEAUTÉS</h2>
        </div>

        <?php if (empty($recent)): ?>
            <p>Aucun jeu disponible pour le moment.</p>
        <?php else: ?>
            <div class="cards cards-scroll">
                <?php foreach ($recent as $jeu): ?>
                    <a href="<?= BASE_URL ?>/game/index/<?= $jeu['Id_Jeu'] ?>">
                        <div class="mini-card">
                            <header>
                                <img src="<?= htmlspecialchars($jeu['Image']) ?>" alt="<?= htmlspecialchars($jeu['Titre']) ?>" loading="lazy" onerror="this.src='<?= BASE_URL ?>/Public/IMAGES/missing_card.svg'">
                            </header>
                            <div class="content">
                                <p><?= htmlspecialchars($jeu['Titre']) ?></p>
                            </div>
                            <footer><?= htmlspecialchars($jeu['Date_Sortie'] ?? 'Date inconnue') ?></footer>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

</main>

<?php require RACINE . '/View/common/footer.php'; ?>