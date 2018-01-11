<h1>REGISTER NEW USER</h1>
<?php /** @var \GameCatalog\DTO\UserDTO $data */ ?>
<?php foreach ($errors as $error): ?>
    <p style="color:red"><?= $error; ?></p>
<?php endforeach; ?>
<form method="POST">
    Username: <input value="<?= $data != null ? $data->getUsername() : ""; ?>" type="text" name="username"/><br/>
    Password: <input value="<?= $data != null ? $data->getPassword() : ""; ?>" type="password" name="password"/><br/>
    Confirm Password: <input type="password" name="confirm_password"/><br/>
    Display Name: <input value="<?= $data != null ? $data->getDisplayName() : ""; ?>" type="text" name="display_name"
                         required="required"/><br/>
    Born On: <input value="<?= $data != null ? $data->getBornOn() : ""; ?>" type="date" name="born_on"
                    required="required"/><br/>
    <input type="submit" name="register" value="Register!"/>
</form>
