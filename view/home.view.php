<?php include('layout/header.inc.php'); ?>

    <h2>Liste des joueurs</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Nickname</th>
        </tr>
        <?php foreach ($players as $player) { ?>
            <tr>
                <td><?= $player['id'] ?></td>
                <td><?= $player['email'] ?></td>
                <td><?= $player['nickname'] ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2 id="games">Liste des jeux</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Min</th>
            <th>Max</th>
        </tr>
        <?php foreach ($games as $game) { ?>
            <tr>
                <td><?= $game['id'] ?></td>
                <td><?= $game['title'] ?></td>
                <td><?= $game['min_players'] ?></td>
                <td><?= $game['max_players'] ?></td>
            </tr>
        <?php } ?>
    </table>

    <style>
        .grey {
            background-color: lightgray;
        }
    </style>

    <h2>Liste des compétitions</h2>
    <table border="1">
        <tr>
            <th>Titre</th>
            <th>Nb joueurs</th>
            <th>Date</th>
            <th>Vainqueur</th>
            <th>Action</th>
        </tr>
        <?php foreach ($contests as $contest) { ?>
            <tr class="<?= ($contest['start_date']>date("Y-m-d"))?'grey':'' ?>">
                <td><?= $contest['title'] ?></td>
                <td><?= $contest['Nb players'] ?></td>
                <td><?= $contest['start_date'] ?></td>
                <td><?= $contest['nickname'] ?></td>
                <td><a href="router.php?page=match&id=<?= $contest['id'] ?>">Gérer le match</a></td>
            </tr>
        <?php } ?>
    </table>

<?php include('layout/footer.inc.php'); ?>
