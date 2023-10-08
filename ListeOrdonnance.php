<?php
session_start();
if (isset($_GET['NumMedecin']) && !empty($_GET['NumMedecin'])) {
    $num = $_GET['NumMedecin'];
    $cnx = new PDO("mysql:host=localhost;dbname=DB_Clinique", 'root', '');
    $req = "SELECT * FROM  ordonnance  WHERE NumMedecin=$num ";
    $Ordonnances = $cnx->query($req)->fetchAll();
    $table = "";

    foreach ($Ordonnances as $Ordonnance) {
        $table .= "<tr>
                        <td>$Ordonnance[0]</td>
                        <td>$Ordonnance[1]</td>
                        <td>$Ordonnance[2]</td>
                        <td>$Ordonnance[3]</td>
                    </tr>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="ListeOrdonnance.php" method="post">
        <table border="1">
            <?php 
            if (isset($_GET['NumMedecin']) && !empty($_GET['NumMedecin'])) {
                echo $table;
            }

            ?>
        </table>
    </form>
</body>

</html>