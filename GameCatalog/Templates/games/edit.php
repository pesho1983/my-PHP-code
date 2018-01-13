<?php /** @var \GameCatalog\DTO\EditGameDTO $data */ ?>
<h1>Edit game "<?=$data->getGame()->getTitle();?>"</h1>

<form method="post">
    Title: <input type="text" value="<?= $data->getGame()->getTitle(); ?>" name="title" required="required"/><br/>
    Publisher: <input type="text" value="<?= $data->getGame()->getPublisher(); ?>" name="publisher" required="required"/><br/>
    Release Date: <input type="date" value="<?= $data->getGame()->getReleaseDate(); ?>" name="release_date" required="required"/><br/>
    Controller Schema: <select name="controller_id">
        <?php foreach ($data->getControllers() as $controller): ?>
            <?php if ($data->getGame()->getController()->getId() == $controller->getId()): ?>
                <option selected="selected" value="<?= $controller->getId(); ?>"><?= $controller->getName(); ?></option>
            <?php else: ?>
                <option value="<?= $controller->getId(); ?>"><?= $controller->getName(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>
    Last Played:<input type="date" value="<?= $data->getGame()->getLastPlayed(); ?>" name="last_played" required="required"/><br/>
    Playtime:<input type="time" value="<?= $data->getGame()->getPlayTime(); ?>" name="playtime" required="required"/><br/>
    <input type="submit" name="save" value="Save"/>
</form>
<a href="games.php">List</a>