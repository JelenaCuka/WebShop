<?php
include_once 'funkcije.php';
if(isset($_GET['idStr'])&&$_GET['idStr']!=""){
    $str=$_GET['idStr'];
    if($str!=""){
        $prikažiLokacije=dohvatiLokacije($str);
    }else{
        $prikažiLokacije="";
    }  
    echo json_encode($prikažiLokacije,JSON_UNESCAPED_UNICODE);
}
?>