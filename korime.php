<?php
include_once 'baza.class.php';
function dohvatiKorime(){
        $veza = new Baza();
        $veza->spojiDB();
        $rez= $veza->selectDB("SELECT idkorisnik, korime FROM korisnik");
        $prikaz=array();
        if ($rez != null) {
            while ($red = $rez->fetch_assoc()) {
                //tu inicijaliziram objekt? i njega dodam u array??hmm
                $prikaz[]=$red;
            }
            }
            echo json_encode($prikaz,JSON_UNESCAPED_UNICODE);
        $veza->zatvoriDB();   
}
dohvatiKorime();
?>