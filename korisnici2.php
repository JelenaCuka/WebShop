<?php
include_once 'baza.class.php';
function dohvatiKorime(){
        $veza = new Baza();
        $veza->spojiDB();
        //korisnicko ime //ime //prezime email //lozinka
        $rez= $veza->selectDB("SELECT korime, ime , prezime , email , lozinka, tk.naziv as 'tip'   FROM korisnik LEFT JOIN tip_korisnika tk ON korisnik.idtip_korisnika = tk.idtip_korisnika ;");
        $prikaz=array();
        if ($rez != null) {
            while ($red = $rez->fetch_assoc()) {
                $prikaz[]=$red;
            }
        }
            echo json_encode($prikaz,JSON_UNESCAPED_UNICODE);
        $veza->zatvoriDB();   
}
dohvatiKorime();
?>