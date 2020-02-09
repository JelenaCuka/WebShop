<?php
include_once 'funkcije.php';
if(isset($_GET['idKor'])&&$_GET['idKor']!=""&&!empty($_GET['idKor'])&&isset($_GET['idKAT'])&&$_GET['idKAT']!=""&&!empty($_GET['idKAT'])){
    $obrisi=$_GET['idKor'];
    $obrisik=$_GET['idKAT'];
    if($obrisi!=""){
        $veza = new Baza();
            $veza->spojiDB();
            $sql="DELETE FROM  moderatorKategorije WHERE idkorisnik =$obrisi AND idkategorija_predmeta=$obrisik ;";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
    }
}
?>