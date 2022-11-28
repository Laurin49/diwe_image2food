<?php
class Login {
    public function _login() {
        $p = new Plausi();
        if ($this->plausibilisieren()) {
            $this->anmelden_db();
        }
    }

    private function plausibilisieren() {
        $anmelden = 0;
        // Fehlervariable

        $p = new Plausi();
        $anmelden += $p -> nutzerdatentest($_POST['userid']);
        $anmelden += $p -> nutzerdatentest($_POST['pw']);
        // Testausgaben für den derzeitigen Stand des Projekts
        echo "Die Eingaben: <hr>";
        print_r($_POST);
        echo "<br>Fehleranzahl: " . $anmelden . "<hr>";
        if ($anmelden == 0)
            return true;
        else
            return false;
    }

    private function anmelden_db() {

    }
}