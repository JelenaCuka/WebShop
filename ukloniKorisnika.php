<?php
include_once 'funkcije.php';
if(isset($_GET['idKor'])&&$_GET['idKor']!=""&&!empty($_GET['idKor'])){
    $obrisi=$_GET['idKor'];
    if($obrisi!=""){
        $veza = new Baza();
            $veza->spojiDB();
            $sql="DELETE FROM korisnik WHERE idkorisnik =$obrisi;";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
    }
}
?>