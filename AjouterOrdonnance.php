<?php
session_start();
$num = $_SESSION["Medecin"][0];

$cnx = new PDO("mysql:host=localhost;dbname=DB_Clinique", 'root', '');
$requete = "select NumPatient from ordonnance where NumMedecin=$num GROUP by NumPatient";
$Patients = $cnx->query($requete)->fetchAll();

$option = "";
foreach ($Patients as $patient) {
    $option .= "<option value='$patient[0]'>" . $patient[0] . "</option>";
}
if (isset($_POST['btnAjouter'])) {
    $NumOrdonnace = $_POST['Numord'];
    $NumPatient = $_POST['Numpatient'];
    $NumMedcin = $_SESSION["Medecin"][0];
    $DateOrdonnace = $_POST['dateOrd'];

    $requete = "insert into ordonnance values($NumOrdonnace,$NumMedcin,$NumPatient,'$DateOrdonnace')";
    if ($cnx->exec($requete)) {
        echo "<script>alert('Est Ajouté avec succées')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="AjouterOrdonnance.php" method="post">
        <select name="Numpatient">
            <option value="choisir">choisir</option>
            <?php
            echo $option;
            ?>
        </select>
        <br>
        Numéro ordonnance : <input type="number" name="Numord"><br>
        date Ordonnance : <input type="date" name="dateOrd">
        <br>
        <input type="submit" value="Ajouter Ordonnance" name="btnAjouter">

    </form>
</body>

</html>