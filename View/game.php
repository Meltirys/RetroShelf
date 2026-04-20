<?php $pageTitle = htmlspecialchars($jeu['Titre']) . ' - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main class="main-contener">
    <div class="fiche-jeu">

        <!-- Hero -->
        <section class="fiche-hero">

            <div class="fiche-cover">
                <img
                    src="<?= htmlspecialchars($jeu['Image']) ?>"
                    alt="Image de <?= htmlspecialchars($jeu['Titre']) ?>"
                    loading="lazy"
                    onerror="this.src='<?= BASE_URL ?>/Public/IMAGES/missing_card.svg'">
            </div>

            <div class="fiche-info">

                <h2 class="fiche-titre"><?= htmlspecialchars($jeu['Titre']) ?></h2>
                <hr class="fiche-separator">

                <div class="fiche-meta-group">
                    <span class="fiche-label">Date de sortie</span>
                    <span class="fiche-value"><?= htmlspecialchars($jeu['Date_Sortie'] ?? 'Inconnue') ?></span>
                </div>

                <?php if (!empty($plateformes)): ?>
                    <div class="fiche-meta-group">
                        <span class="fiche-label">Plateformes</span>
                        <div class="fiche-plateformes">
                            <?php foreach ($plateformes as $p): ?>
                                <span class="badge-plateforme"><?= htmlspecialchars($p['Nom_plateforme']) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="fiche-meta-group">
                    <span class="fiche-label">Note des utilisateurs</span>
                    <div class="fiche-stars">
                        <?php
                        $moyenne = $average['total'] > 0 ? round($average['moyenne']) : 0;
                        for ($i = 1; $i <= 5; $i++): ?>
                            <span><?= $i <= $moyenne ? '★' : '☆' ?></span>
                        <?php endfor; ?>
                    </div>
                </div>

                <?php if (!empty($_SESSION['user_id'])): ?>
                    <div class="fiche-actions">
                        <?php if ($inCollection && $inCollection['Statut'] === 'possede'): ?>
                            <form action="<?= BASE_URL ?>/ludotheque/remove/<?= $jeu['Id_Jeu'] ?>" method="POST">
                                <button type="submit" class="btn-collection">Retirer de ma collection</button>
                            </form>
                            <form action="<?= BASE_URL ?>/ludotheque/add/<?= $jeu['Id_Jeu'] ?>" method="POST">
                                <input type="hidden" name="statut" value="souhait">
                                <button type="submit" class="btn-wishlist">Déplacer vers ma liste de souhaits</button>
                            </form>
                        <?php elseif ($inCollection && $inCollection['Statut'] === 'souhait'): ?>
                            <form action="<?= BASE_URL ?>/ludotheque/add/<?= $jeu['Id_Jeu'] ?>" method="POST">
                                <input type="hidden" name="statut" value="possede">
                                <button type="submit" class="btn-collection">Ajouter à ma collection</button>
                            </form>
                            <form action="<?= BASE_URL ?>/ludotheque/remove/<?= $jeu['Id_Jeu'] ?>" method="POST">
                                <button type="submit" class="btn-wishlist">Retirer de ma liste de souhaits</button>
                            </form>
                        <?php else: ?>
                            <form action="<?= BASE_URL ?>/ludotheque/add/<?= $jeu['Id_Jeu'] ?>" method="POST">
                                <input type="hidden" name="statut" value="possede">
                                <button type="submit" class="btn-collection">Ajouter à ma collection</button>
                            </form>
                            <form action="<?= BASE_URL ?>/ludotheque/add/<?= $jeu['Id_Jeu'] ?>" method="POST">
                                <input type="hidden" name="statut" value="souhait">
                                <button type="submit" class="btn-wishlist">Ajouter à ma liste de souhaits</button>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($_SESSION['role']) && $_SESSION['role'] == 1): ?>
                    <a href="<?= BASE_URL ?>/admin/editGame/<?= $jeu['Id_Jeu'] ?>" class="lien-admin">Modifier cette fiche</a>
                <?php endif; ?>

            </div>
        </section>

        <!-- Notation -->
        <?php if (!empty($_SESSION['user_id'])): ?>
            <section class="notation">
                <span class="section-badge">Votre note</span>
                <div class="notation-card">
                    <p class="notation-hint">Cliquez sur une étoile pour noter ce jeu</p>
                    <form action="<?= BASE_URL ?>/game/note/<?= $jeu['Id_Jeu'] ?>" method="POST" id="form-noter">
                        <input type="hidden" name="note" id="note-value" value="<?= $noteUser ?? 1 ?>">
                        <div class="stars-input">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="star-input <?= $noteUser >= $i ? 'active' : '' ?>" data-value="<?= $i ?>">★</span>
                            <?php endfor; ?>
                        </div>
                    </form>
                </div>
            </section>
        <?php endif; ?>

        <!-- Résumé -->
        <?php if (!empty($jeu['Description'])): ?>
            <div class="fiche-resume">
                <span class="section-badge">Résumé</span>
                <div class="fiche-resume-content">
                    <p><?= htmlspecialchars($jeu['Description']) ?></p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Commentaires -->
        <div class="fiche-commentaires">
            <span class="section-badge">Critiques des membres</span>

            <?php if (!empty($commentaires)): ?>
                <div class="commentaires-grid">
                    <?php foreach ($commentaires as $comm): ?>
                        <div class="commentaire-card">
                            <div class="commentaire-header">
                                <img src="<?= BASE_URL ?>/Public/IMAGES/user.svg" alt="Avatar" class="commentaire-avatar">
                                <div class="commentaire-meta">
                                    <p class="commentaire-pseudo"><?= htmlspecialchars($comm['Pseudonyme']) ?></p>
                                    <span class="commentaire-date"><?= htmlspecialchars($comm['Date_']) ?></span>
                                </div>
                            </div>
                            <p class="commentaire-texte">"<?= htmlspecialchars($comm['Contenu']) ?>"</p>
                            <?php if (!empty($_SESSION['role']) && $_SESSION['role'] == 1): ?>
                                <form action="<?= BASE_URL ?>/comm/deleteComment/<?= $comm['Id_Commentaire'] ?>" method="POST">
                                    <input type="hidden" name="id_jeu" value="<?= $jeu['Id_Jeu'] ?>">
                                    <button type="submit" class="btn-supprimer-comm">Supprimer</button>
                                </form>
                            <?php elseif (!empty($_SESSION['user_id']) && $_SESSION['user_id'] == $comm['Id_Utilisateur']): ?>
                                <form action="<?= BASE_URL ?>/comm/deleteCommentUser/<?= $comm['Id_Commentaire'] ?>" method="POST">
                                    <input type="hidden" name="id_jeu" value="<?= $jeu['Id_Jeu'] ?>">
                                    <button type="submit" class="btn-supprimer-comm">Supprimer</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="commentaires-vide">Aucun commentaire pour le moment.</p>
            <?php endif; ?>

            <?php if (!empty($_SESSION['user_id'])): ?>
                <form action="<?= BASE_URL ?>/comm/add/<?= $jeu['Id_Jeu'] ?>" method="POST" class="commentaire-form">
                    <textarea name="contenu" placeholder="Écrire un commentaire..." class="commentaire-textarea"></textarea>
                    <button type="submit" class="btn-publier">Publier</button>
                </form>
            <?php endif; ?>
        </div>

        <script>
            document.querySelectorAll('.star-input').forEach(function(star) {
                star.addEventListener('mouseover', function() {
                    const value = parseInt(this.dataset.value);
                    document.querySelectorAll('.star-input').forEach(function(s) {
                        s.classList.toggle('hover', parseInt(s.dataset.value) <= value);
                    });
                });

                star.addEventListener('mouseout', function() {
                    document.querySelectorAll('.star-input').forEach(function(s) {
                        s.classList.remove('hover');
                    });
                });

                star.addEventListener('click', function() {
                    document.getElementById('note-value').value = this.dataset.value;
                    document.getElementById('form-noter').submit();
                });
            });
        </script>


    </div>
</main>

<input type="hidden" id="jeu-id" value="<?= htmlspecialchars($jeu['Id_Jeu']) ?>">

<?php require RACINE . '/View/common/footer.php'; ?>