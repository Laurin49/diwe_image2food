<?php
// Start der Session
session_start();

// Festlegung der Untergrenze für die PHP-Version
if (0 > version_compare(PHP_VERSION, '7')) {
    die('<h1>Für diese Anwendung ' . 'ist mindestens PHP 7 notwendig</h1>');
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Image2Food – Sag mir, was ich daraus kochen kann – Registrierung </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="nav">
    <?php
        @include("nav.php");
        @include("plausi.inc.php");
    ?>
</div>
<div id="content">
    <h1>Login</h1>
    <?php
        @include('login.inc.php');   // Formular Login
        @include('login.class.php'); // Klasse Login

        $loginobj = new Login();
        if (sizeof($_POST) > 0) {
            $loginobj->_login();
        }
    ?>
</div>
</body>
</html>