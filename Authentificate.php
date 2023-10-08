<?php
class Authentificate
{
    function __construct()
    {
        
    }
    public static function GetMedecin($login,$password)
    {
        $cnx=new PDO("mysql:host=localhost;dbname=DB_Clinique","root","");
        $requete="select * from medecin where LoginMedecin='$login' and PasswordMedecin='$password'";
        $Medecin=$cnx->query($requete)->fetch();
        if(count($Medecin)!=0)
            return $Medecin;
        else
            return null;
        
    }

    public static function GetPatient($login,$password)
    {
        $cnx=new PDO("mysql:host=localhost;dbname=DB_Clinique","root","");
        $requete="select * from Patient where LoginPatient='$login' and PasswordPatient='$password'";
        $Patient=$cnx->query($requete)->fetch();
        if(count($Patient)!=0)
            return $Patient;
        else
            return null;
        
    }
}
