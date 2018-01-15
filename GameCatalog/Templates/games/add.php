<?php /** @var \GameCatalog\DTO\ControllersDTO[] $data */ ?>
<h1>Add new game</h1>
<?php foreach ($errors as $error): ?>
    <p style="color:red"><?= $error; ?></p>
<?php endforeach; ?>
<form method="post">
    Title: <input type="text" name="title" required="required"/><br/>
    Publisher: <input type="text" name="publisher" required="required"/><br/>
    Release Date: <input type="date" name="release_date" required="required"/><br/>
    Controller Schema: <select name="controller_id">
        <?php foreach ($data as $controller): ?>
            <option value="<?= $controller->getId(); ?>"><?= $controller->getName(); ?></option>
        <?php endforeach; ?>
    </select><br/>
    <input type="submit" name="save" value="Save"/>
</form>
<a href="games.php">List</a>