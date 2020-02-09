<?php
include_once 'funkcije.php';
if(isset($_GET['idPO'])&&$_GET['idPO']!=""&&!empty($_GET['idPO'])){
    $azuriraj=$_GET['idPO'];
    $keyVisina="POV".$azuriraj;
    $keySirina="POS".$azuriraj;
    $getVisina=$_GET["$keyVisina"];
    $getSirina=$_GET["$keySirina"];
            
    if($azuriraj!=""&&$getVisina!=""&&$getSirina!=""){
        $veza = new Baza();
            $veza->spojiDB();
            $sql="UPDATE pozicija_oglasa SET dimenzija_oglasa_sirina=$getSirina,dimenzija_oglasa_visina=$getVisina WHERE idpozicija_oglasa=$azuriraj;";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
    }
}
?>