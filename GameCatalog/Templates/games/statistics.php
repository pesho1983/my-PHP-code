<?php /** @var \GameCatalog\DTO\StatisticDTO[] $data */ ?>
<h1>Statistics</h1>
<table border="1">
    <thead>
    <tr>
        <th>Controller Schema</th>
        <th>Games</th>
        <th>Total Playtime</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $report): ?>
        <tr>
            <td><?= $report->getControllers(); ?></td>
            <td><?= $report->getGames(); ?></td>
            <td><?= $report->getPlayTime(); ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<ul>
    <li><a href="games.php">List</a></li>
    <li><a href="add_game.php">Add new game</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>



