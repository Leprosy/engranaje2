<?php
$this->setLayoutVar('pageTitle', 'Login');
?>

<form method="post">
    <p>Login : <input type="text" name="login" /></p>
    <p>Password : <input type="password" name="password" /></p>
    <p>Recordarme en este computador <input type="checkbox" name="remember" /></p>
    <p><input type="submit" value="Ingresar" /></p>
</form>