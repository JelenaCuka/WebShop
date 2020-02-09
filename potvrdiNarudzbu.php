<?php
include_once 'funkcije.php';
if(isset($_GET['idNar'])&&$_GET['idNar']!=""&&!empty($_GET['idNar'])&&isset($_GET['ukNar'])&&$_GET['ukNar']!=""&&!empty($_GET['ukNar'])){
    $idNar=$_GET['idNar'];
    $ukNar=$_GET['ukNar'];
    if($idNar!=""&&$ukNar!=""){
        $veza = new Baza();
            $veza->spojiDB();
            $sql="UPDATE narudzba SET status_potvrde=1 WHERE idnarudzba=$idNar";
            $veza->updateDB($sql);
            $dodajRacun="INSERT INTO racun (datum,vrijeme,cijena_ukupno,idnarudzba) VALUES(DATE(now()),time(now()),$ukNar,$idNar);";
            $veza->updateDB($dodajRacun);
            $veza->zatvoriDB();
    }
}
?>