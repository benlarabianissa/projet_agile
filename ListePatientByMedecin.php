<?php
session_start();


echo "Nom :".$_SESSION["Medecin"][1]."<br>";
echo "Prénom :".$_SESSION["Medecin"][2]."<br>";
echo "Specialite :".$_SESSION["Medecin"][3]."<br>";
echo "téléfone :".$_SESSION["Medecin"][4]."<br>";


$num=$_SESSION["Medecin"][0];
$cnx=new PDO("mysql:host=localhost;dbname=DB_Clinique",'root','');
$requete="select NumPatient from ordonnance where NumMedecin=$num GROUP by NumPatient ";
$Patients=$cnx->query($requete)->fetchAll();

$option="";
foreach($Patients as $patient)
{
    $option.="<option>".$patient[0]."</option>";
}
$table="";
if(isset($_POST['select']))
{
    $sel=$_POST['select'];
    $requete="select * from ordonnance where NumMedecin=$num  ";
    $Patients=$cnx->query($requete)->fetchAll();
    // print_r($Patients);
    foreach($Patients as $patient)
    { 
        $table.="<tr>
        <td>$patient[0]</td>
        <td>$patient[1]</td>
        <td>$patient[2]</td>
        <td>$patient[3]</td>
        <td><a href='ListePatientByMedecin.php?num=$patient[0]'>
        supprimer</a></td>
        </tr>";
    }

}


if (isset($_GET['num']) and !empty($_GET['num'])){
    $num=$_GET['num'];
    $cnx=new PDO("mysql:host=localhost;dbname=DB_Clinique",'root','');
    $req="delete from Ordonnance where '$num'=NumOrdonnance ";
    $n=$cnx->exec($req);
    if ($n == 1){
        echo "<script>alert('Est Supprimé avec succées')</script>";
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
    
    <form action="ListePatientByMedecin.php" method="post">

    <select name='select' onchange='this.form.submit()'>
    <option value="choisir">choisir</option>
       <?php echo $option; ?>
    </select>

<br><br><br> 
        
        <br><br><br>
        <table border="1"">
            <?=$table?>
        </table>
        <a href="AjouterOrdonnance.php">Ajouter</a>
    </form>  
</body>
</html>