<?php include('layout/header.inc.php'); ?>

<h1>Ajouter un jeu</h1>

<form action="router.php?page=addgame" method="post">
    <label for="title">Titre</label>
    <input type="text" id="title" name="title" minlength="3" maxlength="100">
    <br>
    <label for="min_players">Nb joueurs mini</label>
    <input type="number" id="min_players" name="min_players" minvalue="2">
    <br>
    <label for="max_players">Nb joueurs maxi</label>
    <input type="number" id="max_players" name="max_players" minvalue="2">
    <br>
    <input type="submit" value="Enregistrer">


</form>

<?php include('layout/footer.inc.php'); ?>
