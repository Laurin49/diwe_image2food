<?php
// Start der Session
session_start();
// Cookie schreiben, Timestamp als Wert, Gültigkeitsdauer 120 Tage
setcookie("Image2Food", time(), time() + (60 * 60 * 24 * 120));

// Festlegung der Untergrenze für die PHP-Version
if (0 > version_compare(PHP_VERSION, '7')) {
    die('<h1>Für diese Anwendung ' . 'ist mindestens PHP 7 notwendig</h1>');
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Image2Food – Sag mir, was ich daraus kochen kann – Index </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="nav">
        <?php
            if (isset($_SESSION["login"]) && ($_SESSION["login"] == "true")) {
                require ("navmitglieder.php");
            } else {
                require ("nav.php");
            }
        ?>
    </div>
    <div id="content">

        <h1>Image2Food – Sag mir, was ich daraus kochen kann</h1>
        <h2>Das soziale, multimediale Netzwerk für Kochideen</h2>
        <?php
        /**
         * Image2Food
         * Das soziale Netzwerk für Kochideen
         * Die Einstiegsseite mit der Hauptklasse
         */
        class Index {
            /**
             * Identifikation des Besuchers als neuer oder wiederkehrender Besucher
             * sowie den Anmeldezustand über ein Cookie und die Session
             * In Abhängigkeit davon werden unterschiedliche Texte angezeigt
             */
            function besucher() {

                if (isset($_SESSION["login"]) && ($_SESSION["login"] == "true")) {
                    echo "<div id='indextext'><h3>Mitgliederbereich</h3>" . "Sie sind angemeldet.</div>";
                } else if (isset($_SESSION["login"]) && ($_SESSION["login"] == "false")) {
                    echo "<div id='indextext'>Sie können sich jetzt zum Mitgliederbereich anmelden.</div>";
                } else if (isset($_COOKIE['Image2Food'])) {
                    echo "<div id='indextext'>Sch&ouml;n, Sie wiederzusehen. " . "Melden Sie sich an, um in den geschlossenen Mitgliederbereich zu gelangen, wenn Sie sich schon registriert haben.</div>";
                } else {
                    echo "<div id='indextext'>Willkommen " . "auf unserer Webseite. " . "Schauen Sie sich um. " . "Sie können sich hier registrieren und dann in " . "einem geschlossenen " . "Mitgliederbereich anmelden.</div>";

                }
            }

        }

        $obj = new Index();
        $obj -> besucher();
        ?>
    </div>
</body>
</html>