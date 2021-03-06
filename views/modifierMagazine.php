<!DOCTYPE html>
<html>

<head>
    <title>Modifications</title>
    <meta charset="utf-8">
</head>

<body>
<div>
    <div>
        <?php include('views/entete.php'); ?>
    </div>
    <div class="body">
        <div class="contenu">
            <h2>Modifier le magazine</h2>
            <form action="?page=magazine&action=modifier" method="post">
                <table>
                    <thead>
                    <tr>
                        <th colspan="2"><?= $magazine->titre ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><label for="reference">Référence</label></td>
                        <td><input type="number" name="reference" value="<?= $magazine->reference ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="titre">Titre</label></td>
                        <td><input type="text" name="titre" id="titre" value="<?= $magazine->titre ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="anneePublication">Année de publication</label></td>
                        <td><input type="number" name="anneePublication" id="anneePublication" value="<?= $magazine->anneePublication ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="type">Type</label></td>
                        <td><input type="text" name="typeMagazine" id="typeMagazine" value="<?= $magazine->typeMagazine ?>" required></td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" value="Sauvegarder">
            </form>
        </div>
    </div>
</div>
</body>

</html>

