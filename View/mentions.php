<?php $pageTitle = 'Mentions légales - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main class="main-contener">

    <section class="legal">
        <h1>Mentions légales</h1>

        <h2>Éditeur du site</h2>
        <p>Ce site est un projet étudiant réalisé dans le cadre d'une formation en développement web.</p>
        <p>Auteur : Matteo</p>

        <h2>Hébergement</h2>
        <p>Ce site est hébergé sur une base distante O2Switch dans le cadre d'un projet de formation.</p>

        <h2>Propriété intellectuelle</h2>
        <p>Les données relatives aux jeux vidéo proviennent de l'API <a href="https://rawg.io" target="_blank" rel="noopener">RAWG</a>. Les images et informations associées sont la propriété de leurs auteurs respectifs.</p>

        <h2>Données personnelles</h2>
        <p>Les données collectées (pseudonyme, adresse e-mail, mot de passe chiffré) sont utilisées uniquement pour le fonctionnement du service. Elles ne sont ni vendues ni transmises à des tiers.</p>
        <p>Conformément au RGPD, vous pouvez demander la suppression de votre compte à tout moment depuis votre profil.</p>

        <h2>Cookies</h2>
        <p>Ce site utilise une session, pour maintenir votre connexion. Aucun cookie de traçage ou publicitaire n'est utilisé.</p>


        <h2>Contact</h2>
        <p>Pour toute question ou signalement, utilisez le formulaire ci-dessous.</p>

        <div class="form-card">

            <?php if (!empty($message_contact)): ?>
                <p class="form-message"><?= htmlspecialchars($message_contact) ?></p>
            <?php endif; ?>

            <form action="<?= BASE_URL ?>/mentions/contact" method="POST">
                <div class="form-group">
                    <label for="contact-nom">Nom</label>
                    <input type="text" id="contact-nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="contact-email">Email</label>
                    <input type="email" id="contact-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="contact-message">Message</label>
                    <textarea id="contact-message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn-update">Envoyer</button>
            </form>

        </div>
        
    </section>


</main>

<?php require RACINE . '/View/common/footer.php'; ?>