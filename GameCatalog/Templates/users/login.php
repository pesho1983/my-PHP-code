<?php /** @var $data \GameCatalog\DTO\UserDTO|null */ ?>
<h1>Login</h1>
<?php if (isset($_SESSION['username'])): ?>
    <p style="color:green">Congratulations, <?= htmlspecialchars($_SESSION['username']); ?>. Login in our platform to
        manage your games.</p>
<?php endif; ?>
<?php session_destroy(); ?>
<?php foreach ($errors as $error): ?>
    <p style="color:red"><?= $error; ?></p>
<?php endforeach; ?>
<form method="POST">
    Username: <input value="<?= $data != null ? $data->getUsername() : ""; ?>" type="text" name="username"/><br/>
    Password: <input value="<?= $data != null ? $data->getPassword() : ""; ?>" type="password" name="password"/><br/>
    <input type="submit" name="login" value="Login!"/>
</form>