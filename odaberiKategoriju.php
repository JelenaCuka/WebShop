<?php
include_once 'funkcije.php';
if(isset($_GET['kid'])&&$_GET['kid']!=""){
    $kat=$_GET['kid'];
    if($kat!=""){
        $kat=substr($kat,1);
        //var_dump($kat);
        //echo $kat;
        $prikažiPredmete=dohvatiPredmete($kat);
        //pozovi ispis predmeta za ovu kategoriju
    }else{
        $prikažiPredmete="";
    }  
    echo json_encode($prikažiPredmete,JSON_UNESCAPED_UNICODE);
}


?>
