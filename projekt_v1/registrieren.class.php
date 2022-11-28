<?php
/**
 * Image2Food
 * Das soziale Netzwerk für Kochideen
 * Die Einstiegsseite mit der Hauptklasse
 */
class Registrierung {
    public function registrieren() {
        if ($this->plausibilisieren()) {
            $this->eintragen_db();
        }
    }
    private function plausibilisieren() {
        // Fehlervariable
        $anmelden = 0;
        $p = new Plausi();

        $anmelden += $p -> namentest($_POST['name']);
        $anmelden += $p -> namentest($_POST['vorname']);
        $anmelden += $p -> emailtest($_POST['email']);

        $anmelden += $p -> nutzerdatentest($_POST['userid']);
        $anmelden += $p -> nutzerdatentest($_POST['pw']);
        // Kritische Zeichen auf der freien Eingabe der Zusatzinfos eleminieren
        $_POST['zusatzinfos'] = preg_replace("/[<|>|$|%|&|§]/", "#", $_POST['zusatzinfos']);
        // Testausgaben für den derzeitigen Stand des Projekts
        echo "Die Eingaben: <hr>";
        print_r($_POST);
        echo "<br>Fehleranzahl: " . $anmelden . "<hr>";
        if ($anmelden == 0)
            return true;
        else
            return false;

    }
    private function eintragen_db() {

    }
}
?>