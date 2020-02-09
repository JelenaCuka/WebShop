<?php
include_once 'funkcije.php';
if(isset($_GET['idNar'])&&$_GET['idNar']!=""&&!empty($_GET['idNar'])){
    $idNar=$_GET['idNar'];
    if($idNar!=""){
        $prikažiRacun=new Racun($idNar);
        
    }else{
        $prikažiRacun="";
    }  
    echo json_encode($prikažiRacun,JSON_UNESCAPED_UNICODE);
}
?>