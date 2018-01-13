<?php /** @var \GameCatalog\DTO\GameDTO[] $data */ ?>
<?php var_dump($_SESSION); ?>
<h1>All Games</h1>
<table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Publisher</th>
        <th>Release Date</th>
        <th>Controller Schema</th>
        <th>Last Played</th>
        <th>Playtime</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <?php foreach ($data as $game): ?>
        <?php if (isset($_SESSION['game_id']) && $_SESSION['game_id'] == $game->getId()): ?>
            <tr style="background-color:lightgreen">
        <?php else: ?>
            <tr>
        <?php endif; ?>
        <td><?= $game->getTitle(); ?></td>
        <td><?= $game->getPublisher(); ?></td>
        <td><?= $game->getReleaseDate(); ?></td>
        <td><?= $game->getController()->getName(); ?></td>
        <td><?= $game->getLastPlayed(); ?></td>
        <td><?= $game->getPlayTime(); ?></td>
        <td><a href="edit_game.php?id=<?= $game->getId(); ?>">edit</a></td>
        <td><a href="delete.php?id=<?= $game->getId(); ?>">delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<ul>
    <li><a href="add_game.php">Add new game</a></li>
    <li><a href="statistics.php">Statistics</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>



