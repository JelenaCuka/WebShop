<?php
include_once 'funkcije.php';
if(isset($_GET['nazivPredmeta'])&&$_GET['nazivPredmeta']!=""){
    $naz=$_GET['nazivPredmeta'];
    if($naz!=""){
        $prikažiPredmete=dohvatiPredmeteNazivFilter($naz);
        //pozovi ispis predmeta za ovu kategoriju
    }else{
        $prikažiPredmete="";
    }  
    echo json_encode($prikažiPredmete,JSON_UNESCAPED_UNICODE);
}
?>