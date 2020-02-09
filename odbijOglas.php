<?php
include_once 'funkcije.php';
if(isset($_GET['idOgl'])&&$_GET['idOgl']!=""&&!empty($_GET['idOgl'])){
    $idOgl=$_GET['idOgl'];
    if($idOgl!=""){
        $veza = new Baza();
            $veza->spojiDB();
            $sql="UPDATE oglas SET status_potvrdenosti=4 WHERE idoglas=$idOgl;";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
    }
}
?>