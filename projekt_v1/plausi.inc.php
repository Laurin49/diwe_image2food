<?php
class Plausi {
    public function namentest($wert) {
        if (preg_match("/^\w{2,30}$/", $wert)) {
            return 0;
        } else {
            return 1;
        }
    }
    public function emailtest($wert) {
        $fehler = 0;
        // Test notwendige E-Mail-Struktur
        if (!preg_match("/\w+@\w+\.\w{2}/", $wert)) {
            $fehler++;
            echo "EMail Fehler <br />";
        }
        // nichtalphanumerische Zeichen - außer dem Zeichen @
        if (preg_match("/\W/", $wert, $ergarray)) {
            if ($ergarray[0] != "@") {
                $fehler++;
                echo "EMail Fehler Alphanumerische Zeichen <br />";
            }

        }
        return $fehler;
    }
    public function nutzerdatentest($wert) {
        $fehler = 0;
        if (!preg_match("/^\w{8,20}$/", $wert)) {
            $fehler++;
            echo "Nutzerdaten Fehler 8, 20 <br />";
        }
        // Keine Zahl
        if (!preg_match("/\d/", $wert)) {
            $fehler++;
            echo "Nutzerdaten Fehler keine Zahl <br />";
        }
        // Kein Großbuchstabe
        if (!preg_match("/[A-Z]/", $wert)) {
            $fehler++;
            echo "Nutzerdaten Fehler kein Großbuchstabe <br />";
        }
        // Kein Kleinbuchstabe
        if (!preg_match("/[a-z]/", $wert)) {
            $fehler++;
            echo "Nutzerdaten Fehler kein Kleinbuchstabe <br />";
        }
        return $fehler;
    }
}