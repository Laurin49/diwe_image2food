<?php
/**
 * Festlegung der Untergrenze für die PHP-Version
 * @version: 1.0
 */
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
        require("nav.php");
        require ("plausi.inc.php");
    ?>
</div>
<div id="content">
    <h1>Login</h1>
    <?php
        require('login.inc.php');   // Formular Login
        require('login.class.php'); // Klasse Login
    ?>
</div>
</body>
</html>