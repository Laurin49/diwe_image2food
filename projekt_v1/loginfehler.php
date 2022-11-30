<?php
/**
 * Start der Session
 */
session_start();
/**
 * Festlegung der Untergrenze für die PHP-Version
 *
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
    <title>Image2Food – Sag mir, was ich daraus kochen kann – Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="nav">
    <?php
    @include ("nav.php");
    ?>
</div>
<div id="content">

    <h1>Anmeldefehler</h1>
    <?php
    @include ("login.inc.php");

    /**
     * Foto2Gericht
     * Das soziale Netzwerk für Kochideen
     * Die Fehlerseite beim fehlerhaften Login
     */
    class LoginFehler
    {

        /**
         * Fehlermeldung
         */
        public function fehler()
        {
            if (isset($_SESSION["name"])) {
                unset($_SESSION["name"]);
            }
            if (isset($_SESSION["login"])) {
                unset($_SESSION["login"]);
            }

            echo "<h4>Die Anmeldedaten waren leider falsch</h4>" . "<a href='login.php'>Neu anmelden</a>";
        }
    }
    $loginobj = new LoginFehler();

    $loginobj->fehler();

    ?>
</div>
</body>
</html>