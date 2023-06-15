<?php include('layout/header.inc.php'); ?>

<h1>Détail d'un match</h1>

<?php //var_dump($contest); ?>

<h2><?= $contest['title'] ?></h2>
<h3>Date du match : <?= $contest['start_date'] ?></h3>
<h3>Gagnant du match : <?= $contest['nickname'] ?></h3>

<h2>Liste des joueurs du match</h2>
<table border="1">
    <tr>
        <th>Nickname</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php foreach ($playersForContest as $player) { ?>
        <tr>
            <td><?= $player['nickname'] ?></td>
            <td><?= $player['email'] ?></td>
            <td><a href="router.php?page=match&id_player=<?= $player['id'] ?>&id_contest=<?= $_GET['id'] ?>" onclick="return confirm('Etes-vous certain ?')">Retirer</a></td>
        </tr>
    <?php } ?>
</table>

<form action="router.php?page=match" method="post">
    <label for="id_player">Choisir un joueur</label>
    <select name="id_player" id="id_player">
        <?php foreach ($players as $player) { ?>
            <option value="<?= $player['id'] ?>"><?= $player['nickname'] ?></option>
        <?php } ?>
    </select>
    <input type="hidden" name="id_contest" id="" value="<?= $contest['id'] ?>">
    <input type="submit" value="Ajouter un joueur">
</form>


<?php include('layout/footer.inc.php'); ?>
