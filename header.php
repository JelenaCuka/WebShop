<?php
include_once 'sesija.class.php';
include_once 'baza.class.php';
include_once 'funkcije.php';
include_once 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
include_once 'funkcije.php';
Sesija::kreirajSesiju();
if(!Sesija::dajKorisnika()){
    Sesija::kreirajKorisnika("anonimni", 0);
}
//$s=Sesija::dajKorisnika();
//echo $s["korisnik"];
//error_reporting(E_ALL);
error_reporting(0);//produkcija
if ($_SERVER["REQUEST_URI"] === "/WebDiP/2017_projekti/WebDiP2017x031/prijavaRegistracija.php?mod=prijava") {
    if ($_SERVER['SERVER_PORT'] !== 443 && (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off')) {
        header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit;
    }
}else{
    if(!($_SERVER['SERVER_PORT'] !== 443 && (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off')))  {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit;
    }
}
function KojaUloga(){
    if(Sesija::dajKorisnika()){
    $kor=Sesija::dajKorisnika();
    return $kor["tip"];
    }else{
        return null;
    }
}
function IspisiNavigaciju(){
    $ispis=array();
    switch (KojaUloga()){
        case 3: $ispis["KategorijeA"]="kreirajKategorije.php";
                $ispis["ADMIN"]="dodijelimoderatora.php";
        case 2: $ispis["MODERATOR"]="moderator.php";
                $ispis["MODnarudzbe"]="narudzbeModerator.php";
        case 1: $ispis["Oglasi"]= "oglasi.php";
    }
    return $ispis;
}
function obisiSesijuPreusmeriPrijava(){
    if(isset($_GET["odjava"])){
        Sesija::obrisiSesiju();
        header("Location: prijavaRegistracija.php?mod=prijava");
    }
}
function dohvatiPodatkeKonfiguracije(){
    $upit="SELECT idkonfiguracija_sustava,trajanje_kolacica,stranicenje_broj_zapisa,virtualni_pomak_vremena,trajanje_sesije_max,neispravna_prijava_broj_max,link_za_aktivaciju_trajanje_sati,broj_top_korisnika,prikazi_statistiku_od,prikazi_statistiku_do,aktivna FROM konfiguracija_sustava WHERE aktivna=1 ;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    if ($rez != null) {
        while (list($iKK, $tKK, $sKK, $vpKK, $tsmKK, $nsmKK, $latKK, $btkKK, $soKK, $sdKK, $aKK) = $rez->fetch_array()) {
            $konfiguracija_sustava=new Konfiguracija($iKK , $tKK, $sKK, $vpKK, $tsmKK, $nsmKK, $latKK, $btkKK, $soKK, $sdKK, $aKK);
        }
    }
    $veza->zatvoriDB(); 
    return $konfiguracija_sustava;
}
$KONFA=dohvatiPodatkeKonfiguracije();
if(isset($_SESSION["korisnik"]) ){ obisiSesijuPreusmeriPrijava(); }
$smarty = new Smarty();
$smarty->assign('naslov', $naslov);//vazno assign prije display
$smarty->assign('navigacija', IspisiNavigaciju() );
$smarty->assign('pozadinaSekcijaObrazac', " pozadina1");
$smarty->display('templates/header.tpl');


?>