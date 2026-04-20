<?php $pageTitle = 'Modifier une fiche - RetroShelf'; ?>
<?php require RACINE . '/View/common/header.php'; ?>

<main>
    <h1>Modifier la fiche : <?= htmlspecialchars($jeu['Titre']) ?></h1>

    <form action="<?= BASE_URL ?>/admin/updateGame/<?= $jeu['Id_Jeu'] ?>" method="POST">
        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($jeu['Titre']) ?>" required>

        <label for="date_sortie">Date de sortie</label>
        <input type="date" id="date_sortie" name="date_sortie" value="<?= htmlspecialchars($jeu['Date_Sortie'] ?? '') ?>">

        <label for="image">URL de l'image</label>
        <input type="text" id="image" name="image" value="<?= htmlspecialchars($jeu['Image'] ?? '') ?>">

        <button type="submit">Enregistrer</button>
        <a href="<?= BASE_URL ?>/game/index/<?= $jeu['Id_Jeu'] ?>">Annuler</a>
    </form>
</main>

<?php require RACINE . '/View/common/footer.php'; ?>
