<?php
require("Authentificate.php");
session_start();
if (isset($_POST['login']))
    if (isset($_POST["rad"]) && $_POST["rad"] == "1") {
        if (!empty($_POST['log']) && !empty($_POST['pass'])) {
            $log = $_POST['log'];
            $pass = $_POST['pass'];
            $medecin = Authentificate::GetMedecin($log, $pass);
            if ($medecin != null) {
                $_SESSION['Medecin'] = $medecin;
                header('location:ListePatientBymedecine.php');
            }
        }
    }
if (isset($_POST["rad"]) && $_POST["rad"] == "2") {
    if (!empty($_POST['log']) && !empty($_POST['pass'])) {
        $log = $_POST['log'];
        $pass = $_POST['pass'];
        $patient = Authentificate::GetPatient($log, $pass);
        if ($patient != null) {
            $_SESSION['Patient'] = $patient;
            header('location:ListeMedecinBypatient.php');
        }
    }
}






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Login.php" method="post">
        <label>Login :</label> <input type="text" name="log">
        <label>Medecine :</label><input type="radio" name="rad" value="1">
        <label>Patient :</label><input type="radio" name="rad" value="2">
        <br>
        <br>
        <label>Password :</label>
        <input type="password" name="pass"><br><br>
        <input type="submit" name="login" value="login">

    </form>
</body>

</html>