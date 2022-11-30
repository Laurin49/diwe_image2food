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
        $vorhanden = false;
        @include ("db.inc.php");

        if ($stmt = $pdo -> prepare("SELECT userid, pw FROM mitglieder")) {
            $stmt -> execute();
            while ($row = $stmt -> fetch()) {
                if (isset($_POST["userid"])
                    && $_POST["userid"] == $row['userid']
                    && md5($_POST["pw"]) == $row['pw']) {
                    $vorhanden = true;
                    break;
                }
            }
        }
        if ($vorhanden) {
            $_SESSION["name"] = $_POST["userid"];
            $_SESSION["login"] = "true";
            $dat = "index.php";
        } else {
            $dat = "loginfehler.php";
        }
        header("Location: $dat");
    }
}