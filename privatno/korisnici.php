<?php
include_once '../sesija.class.php';
include_once '../baza.class.php';
include_once '../funkcije.php';
include_once '../vanjske_biblioteke/Smarty/libs/Smarty.class.php';
include_once '../funkcije.php';
Sesija::kreirajSesiju();
if(!Sesija::dajKorisnika()){
    Sesija::kreirajKorisnika("anonimni", 0);
}
//$s=Sesija::dajKorisnika();
//echo $s["korisnik"];
error_reporting(E_ALL);
//error_reporting(0);//produkcija
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
?>
<!DOCTYPE html>
<html lang="hr">
    <head>
        <title>Ispis korisnika</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="naslov" content="Ispis korisnika">  
        <meta name="datum posljednje promjene" content="07.06.2018.">
        <meta name="autor" content="Jelena Čuka"> 

        <link rel="shortcut icon" href="../slike/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../slike/favicon.ico" type="image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="../css/css1.css">
        <link rel="stylesheet" type="text/css" href="../css/css2.css">      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../js/jsFile01.js"></script>
        <script src="../js/jsFile02.js"></script>
    </head>
    <body>
        <header class="PopraviPoravnanje">
            <div class="grupiranjeVeciEkrani">
                <h1 >Ispis korisnika</h1>    
                <p id="LastModifiedDateTime" >2.5.2018. 22:00</p><br />
            </div>
        </header>
        <nav class="PopraviPoravnanje ">
            <div class="grupiranjeVeciEkrani">
                <ul >
                    <li><a href="../index.php">Početna</a></li>
                    <li><a href="../kategorije.php">kategorije</a></li>
                    <li><a href="../dokumentacija.php">dokumentacija</a></li>
                    <li><a href="../o_autoru.php">O autoru</a></li>
                    <li><a href="../prijavaRegistracija.php?mod=prijava">Prijava</a></li>
                    <li><a href="../prijavaRegistracija.php?mod=registracija">Registracija</a></li>
                    <li><a href="korisnici.php">PRIVATNO/korisnici</a></li>
                </ul>
            </div>
        </nav>
        <section id="sadrzaj">
            <h2 class="grupiranjeVeciEkrani">Ispis korisnika</h2>
            <?php
            include_once '../funkcije.php';
            $korisnici = dohvatiKorime();
            $ispisTablica = "";
            if ($korisnici) {
                $ispisTablica = "<table class=\"grupiranjeVeciEkrani tablica1 tablicaScroll\"><thead class=\"tablica1_zaglavlje\"><tr>";
                $ispisTablica .= "<td><a href=\"\">korime</a></td>";
                $ispisTablica .= "<td><a href=\"\">lozinka</a></td>";
                $ispisTablica .= "<td><a href=\"\">tip</a></td>";
                $ispisTablica .= "<td><a href=\"\">prezime</a></td>";
                $ispisTablica .= "<td><a href=\"\">ime</a></td>";
                $ispisTablica .= "<td><a href=\"\">email</a></td>";
                $ispisTablica .= "</tr></thead>";
                $ispisTablica .= "<tbody>";
                foreach ($korisnici as $i => $k) {
                    $ispisTablica .= "<tr class=\"Red\">";
                    foreach ($k as $k2 => $v) {
                        //var_dump($k["korime"]);
                        //$ispisTablica .= "<td>" . $korisnici["$i"]["$k2"] ."</td>";
                        $ispisTablica .= "<td>" . $v ."</td>";
                    }
                    $ispisTablica .= "</tr>";
                }
                
                $ispisTablica .= "</tbody>";
                $ispisTablica .= "<tfoot class=\"tablicafooter\"><td><a href=\"\">Prethodna</a></td><td><a href=\"\">Sljedeća</a></td></tfoot>";
                $ispisTablica .= "</table>";
                echo $ispisTablica;
            }
            ?> 
            <div class="classClear push"></div>
    </section>
    <footer class="PopraviPoravnanje">
        <div class="grupiranjeVeciEkrani">
            <div class="divSest">
                <p><address>Kontakt: <a href="mailto:jelcuka@foi.hr">Jelena Čuka</a></address></p>
                <p> <small>&copy;</small> 2018. J.Čuka</p>
                <div id="google_translate_element"></div>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                      new google.translate.TranslateElement({pageLanguage: 'hr', includedLanguages: 'de,en'}, 'google_translate_element');
                    }
                    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div>
            </div>
            <div class="divCetiri">
                <figure> 
                    <a href="http://validator.w3.org/check/referer">
                    <img src="http://barka.foi.hr/WebDiP/2017/materijali/zadace/HTML5.png" width="100" alt="HTML 5 validator" /></a>
                    <figcaption> Ikona HTML 5 validator</figcaption>
                </figure>
                <figure> 
                   <a href="http://jigsaw.w3.org/css-validator/check/referer">
                    <img src="http://barka.foi.hr/WebDiP/2017/materijali/zadace/CSS3.png" width="100" alt="CSS 3 validator" /></a>
                    <figcaption> Ikona CSS 3 validator </figcaption>
                </figure>
            </div>
        </div>
     </footer>
</body>
</html>
