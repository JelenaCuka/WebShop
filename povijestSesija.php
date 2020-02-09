<?php
//include_once 'sesija.class.php';
include_once 'funkcije.php';
//Sesija::kreirajSesiju();
if(isset($_GET['pid'])&&$_GET['pid']!=""&&!empty($_GET['pid'])){
    $dodaj=$_GET['pid'];
    if(Sesija::dajPovijest() ){
        $povijestPredmeta=Sesija::dajPovijest();
        if(!empty($povijestPredmeta)){
            $povijestPredmeta[]=$dodaj;
        }
        //$povijestPredmeta=$povijestPredmeta["povijest"];
        Sesija::kreirajPovijest($povijestPredmeta);
    }else{
        $novi=array();
        $novi[]=$_GET['pid'];
        Sesija::kreirajPovijest($novi);
    }
    $x=Sesija::dajPovijest();
    $y="Povijest:";
    foreach ($x as $k=>$v){
        $y.=dohvatiSamoNazivPredmeta($v).",";
    }
    echo $y;
}
?>