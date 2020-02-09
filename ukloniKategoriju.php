<?php
include_once 'funkcije.php';
if(isset($_GET['idKat'])&&$_GET['idKat']!=""&&!empty($_GET['idKat'])){
    $obrisi=$_GET['idKat'];
    if($obrisi!=""){
        $veza = new Baza();
            $veza->spojiDB();
            $sql="DELETE FROM kategorija_predmeta WHERE idkategorija_predmeta =$obrisi;";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
    }
}
?>