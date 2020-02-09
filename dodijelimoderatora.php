<?php
$naslov = "Dodijeli moderatora";
require_once 'header.php';
function provjeraPristupaObrazac(){
    if(KojaUloga()!=3){
    header("Location: index.php");
    exit; 
    }
}
provjeraPristupaObrazac();
$greska=array();
if(isset($_POST["submitDodajPozicija"])){
        $greska=array();
        foreach ($_POST as $key => $value){
            if(empty($value)){
                    $greska[]="$key nije unesen.";
            }
        }
        if(empty($greska)){
            $PozMod=$_POST["PozMod"];
            $PozSirina=$_POST["PozSirina"];
            $PozVisina=$_POST["PozVisina"];
            $PozLokacija=$_POST["PozLokacija"];
            $PozStranica=$_POST["PozStranica"];
            $veza = new Baza();
            $veza->spojiDB();
            $sql="INSERT INTO pozicija_oglasa (idlokacija,idstranica,dimenzija_oglasa_sirina,dimenzija_oglasa_visina,moderator_pozicije_id) VALUES ($PozLokacija,$PozStranica,$PozSirina,$PozVisina,$PozMod);";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
            header("Location: dodijelimoderatora.php");
        }
}
if(isset($_POST["submitPromijeniTip"])){
        $greska=array();
        foreach ($_POST as $key => $value){
            if(empty($value)){
                    $greska[]="$key nije unesen.";
            }
        }
        if(empty($greska)){
            $korisnikTipAzuriraj=$_POST["korisnikTip"];
            $tipTipAzuriraj=$_POST["tipTip"];
            $veza = new Baza();
            $veza->spojiDB();
            $sql="UPDATE korisnik SET idtip_korisnika=$tipTipAzuriraj WHERE idkorisnik = $korisnikTipAzuriraj;";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
            header("Location: dodijelimoderatora.php");
        }
}
if(isset($_POST["submitDodajModerator"])){
        $greska=array();
        foreach ($_POST as $key => $value){
            if(empty($value)){
                    $greska[]="$key nije unesen.";
            }
        }
        if(empty($greska)){
            $dodajKategorijaModeratorK=$_POST["dodajKategorijaModeratorK"];
            $dodajKategorijaModeratorM=$_POST["dodajKategorijaModeratorM"];
            $veza = new Baza();
            $veza->spojiDB();
            $sql="INSERT INTO moderatorKategorije ( idkategorija_predmeta , idkorisnik ) VALUES ($dodajKategorijaModeratorK,$dodajKategorijaModeratorM);";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
            header("Location: dodijelimoderatora.php");
        }
}

    $korisnici = dohvatiKorisnike();
    $kategorijeAnonimni = dohvatKategorije();
    $tipoviKorisnika = dohvatTipovi();
    $korisniciM = dohvatiKorisnikeModeratore();
    $stranice= dohvatiStranice();
    $prvaStranica= $stranice[0]->getLokacije();
    $pozicije=dohvatiPozicije();
    
    /*if(!empty(kategorijeAnonimni)){
        foreach ($kategorijeAnonimni as $key => $value) {
            var_dump($key);
            var_dump($value);
            $key::setModeratori();
        }
    }*/
//TO DO DOHVATI POZICIJE
//DODAJ IM LOKACIJE
//WHERE P.IDLOKACIJA=L.IDPOZICIJA    
//dodat im moderatora! JEDAN
    
 function dohvatiPozicije(){
    //$sql="SELECT idpozicija_oglasa,idlokacija,idstranica,dimenzija_oglasa_sirina,dimenzija_oglasa_visina,moderator_pozicije_id FROM pozicija_oglasa;";
     $sql="SELECT idpozicija_oglasa,pozicija_oglasa.idlokacija,pozicija_oglasa.idstranica,dimenzija_oglasa_sirina,dimenzija_oglasa_visina,moderator_pozicije_id, k.korime,l.broj,s.url FROM pozicija_oglasa LEFT JOIN korisnik k on k.idkorisnik=pozicija_oglasa.moderator_pozicije_id LEFT JOIN lokacija l on pozicija_oglasa.idlokacija=l.idlokacija LEFT JOIN stranica s on l.idstranica=s.idstranica;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($sql);
    $prikaz = array();
    if ($rez != null) {
        while (list($i,$l,$s,$ds,$dv,$m,$kor,$broj,$url) = $rez->fetch_array()) {
            $prikaz[] = new Pozicija($i,$l,$s,$ds,$dv,$m,$kor,$broj,$url);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz;
 }     
    
 function dohvatiStranice(){
    $sql="SELECT idstranica, url FROM stranica;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($sql);
    $prikaz = array();
    if ($rez != null) {
        while (list($id,$url) = $rez->fetch_array()) {
            $prikaz[] = new Stranica($id,$url);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz;
 } 
    
    

function dohvatiKorisnike(){
            $sql="SELECT idkorisnik , lozinka_nekriptirano ,ime , prezime , email , adresa , status_racun_aktivan , pristup_zakljucan,korisnik.idtip_korisnika,tip_korisnika.naziv, korime,neuspjesne_prijave FROM korisnik LEFT JOIN tip_korisnika on korisnik.idtip_korisnika= tip_korisnika.idtip_korisnika;";
            $veza = new Baza();
            $veza->spojiDB();
            $rez = $veza->selectDB($sql);
            $prikaz = array();
            if ($rez != null) {
                while (list($idkorisnik,$lozinka,$ime,$prezime,$email,$adresa,$status_racun_aktivan,$pristup_zakljucan,$idtip_korisnika,$tip_korisnika,$korime,$neuspjesne_prijave) = $rez->fetch_array()) {
                    //tu inicijaliziram objekt? i njega dodam u array??hmm
                    $prikaz[] = new Korisnik($idkorisnik,$lozinka,$ime,$prezime,$email,$adresa,$status_racun_aktivan,$pristup_zakljucan,$idtip_korisnika,$tip_korisnika,$korime,$neuspjesne_prijave);
                }
            }
            $veza->zatvoriDB();
            if(!empty($prikaz))return $prikaz;
}
function dohvatiKorisnikeModeratore(){
            $sql="SELECT idkorisnik , lozinka_nekriptirano ,ime , prezime , email , adresa , status_racun_aktivan , pristup_zakljucan,korisnik.idtip_korisnika,tip_korisnika.naziv, korime,neuspjesne_prijave FROM korisnik LEFT JOIN tip_korisnika on korisnik.idtip_korisnika= tip_korisnika.idtip_korisnika WHERE korisnik.idtip_korisnika=2;";
            $veza = new Baza();
            $veza->spojiDB();
            $rez = $veza->selectDB($sql);
            $prikaz = array();
            if ($rez != null) {
                while (list($idkorisnik,$lozinka,$ime,$prezime,$email,$adresa,$status_racun_aktivan,$pristup_zakljucan,$idtip_korisnika,$tip_korisnika,$korime,$neuspjesne_prijave) = $rez->fetch_array()) {
                    //tu inicijaliziram objekt? i njega dodam u array??hmm
                    $prikaz[] = new Korisnik($idkorisnik,$lozinka,$ime,$prezime,$email,$adresa,$status_racun_aktivan,$pristup_zakljucan,$idtip_korisnika,$tip_korisnika,$korime,$neuspjesne_prijave);
                }
            }
            $veza->zatvoriDB();
            if(!empty($prikaz))return $prikaz;
}
if(empty($pozicije)){$smarty->assign('pozicije',"");}else{$smarty->assign('pozicije',$pozicije);}  
if(empty($stranice)){$smarty->assign('stranice',"");}else{$smarty->assign('stranice',$stranice);}  
if(empty($prvaStranica)){$smarty->assign('stranice1',"");}else{$smarty->assign('stranice1',$prvaStranica);} 
if(empty($tipoviKorisnika)){$smarty->assign('tipA',"");}else{$smarty->assign('tipA',$tipoviKorisnika);}    
if(empty($korisnici)){$smarty->assign('korisniciA',"");}else{$smarty->assign('korisniciA',$korisnici);}
if(empty($korisniciM)){$smarty->assign('korisniciM',"");}else{$smarty->assign('korisniciM',$korisniciM);}
if(empty($kategorijeAnonimni)){$smarty->assign('kategorijeA',"");}else{$smarty->assign('kategorijeA',$kategorijeAnonimni);}
    
    $smarty->assign('aktivnaSkriptaR',$_SERVER["PHP_SELF"]);
    $smarty->assign('greska', $greska);
    $smarty->display('templates/dodijelimoderatora.tpl');
    $smarty->display('templates/footer.tpl');
?>