<?php
session_start();


echo "Nom :".$_SESSION["Patient"][1]."<br>";
echo "Prénom :".$_SESSION["Patient"][2]."<br>";
echo "Specialite :".$_SESSION["Patient"][3]."<br>";
echo "téléfone :".$_SESSION["Patient"][4]."<br>";
$num=$_SESSION['Patient'][0];


$cnx=new PDO("mysql:host=localhost;dbname=DB_Clinique",'root','');
$req="select NumMedecin from ordonnance GROUP by NumPatient ";
$rows=$cnx->query($req)->fetchAll();

$table="";
  
foreach($rows as $row)
{
        $table.="<tr>
                    <td>$row[0]</td>
                    <td><a href='ListesOrdonnances.php?NumMedecin=$row[0]'>Consulter Ordonnances</a></td>
                </tr>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form method="post">
        <table border="1">
            <?php echo $table; ?>
        </table>
    </form>  
</body>
</html>