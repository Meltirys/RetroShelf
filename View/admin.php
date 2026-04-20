<?php $pageTitle = 'Dashboard Admin - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main>
    <h1>Dashboard Admin</h1>

    <section>
        <h2>Statistiques</h2>
        <p>Membres inscrits : <strong><?= $stats['nb_membres'] ?></strong></p>
        <p>Jeux en base locale : <strong><?= $stats['nb_jeux'] ?></strong></p>
    </section>

    <section>
        <h2>Utilisateurs</h2>
        <?php if (!empty($utilisateurs)): ?>
            <?php foreach ($utilisateurs as $u): ?>
                <article>
                    <strong><?= htmlspecialchars($u['Pseudonyme']) ?></strong>
                    <?= htmlspecialchars($u['Email'] ?? '—') ?>
                    <?php if ($u['Id_Utilisateur'] != $_SESSION['user_id']): ?>
                        <form action="<?= BASE_URL ?>/admin/deleteUser/<?= $u['Id_Utilisateur'] ?>" method="POST">
                            <button type="submit">Supprimer</button>
                        </form>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun utilisateur.</p>
        <?php endif; ?>
    </section>

</main>

<?php require RACINE . '/View/common/footer.php'; ?>
