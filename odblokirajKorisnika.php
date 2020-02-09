<?php
include_once 'funkcije.php';
if(isset($_GET['idKor'])&&$_GET['idKor']!=""&&!empty($_GET['idKor'])){
    $obrisi=$_GET['idKor'];
    if($obrisi!=""){
        $veza = new Baza();
            $veza->spojiDB();
            $sql="UPDATE korisnik SET pristup_zakljucan=0, neuspjesne_prijave=0  WHERE idkorisnik =$obrisi;";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
    }
}
?>