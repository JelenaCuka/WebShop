<?php
$naslov = "Kategorije adimn";
require_once 'header.php';
function provjeraPristupaObrazac(){
    if(KojaUloga()!=3){
    header("Location: index.php");
    exit; 
    }
}
provjeraPristupaObrazac();
$greska=array();

if(isset($_POST["submitKategorijaDodaj"])){
        $greska=array();

        foreach ($_POST as $key => $value){
            if(empty($value)){
                    $greska[]="$key nije unesen.";
            }
        }

        if(empty($greska)){
            $kategorijaUnos=$_POST["kategorijaUnos"];
            $veza = new Baza();
            $veza->spojiDB();
            $sql="INSERT INTO kategorija_predmeta (naziv) VALUES ('$kategorijaUnos');";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
            header("Location: kreirajKategorije.php");
        }
}
if(isset($_POST["submitKategorijaAžuriraj"])){
        $greska=array();

        foreach ($_POST as $key => $value){
            if(empty($value)){
                    $greska[]="$key nije unesen.";
            }
        }

        if(empty($greska)){
            $kategorijaAzur=$_POST["kategorijaAzur"];
            $kategorijaAzurID=$_POST["kategorijaAzurID"];
            $veza = new Baza();
            $veza->spojiDB();
            $sql="UPDATE kategorija_predmeta SET naziv='$kategorijaAzur' WHERE idkategorija_predmeta =$kategorijaAzurID;";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
            header("Location: kreirajKategorije.php");
        }
}
    $kategorijeAnonimni = dohvatKategorije();

    if(empty($kategorijeAnonimni)){$smarty->assign('kategorijeA',"");}else{$smarty->assign('kategorijeA',$kategorijeAnonimni);}
    
    $smarty->assign('aktivnaSkriptaR',$_SERVER["PHP_SELF"]);
    $smarty->assign('greska', $greska);
    $smarty->display('templates/kategorijeRegistracija.tpl');
    $smarty->display('templates/footer.tpl');
?>