<?php
$naslov ="Oglasi";
require_once 'header.php';

function provjeraPristupaGalerija(){
    if(KojaUloga()!=3&&KojaUloga()!=2&&KojaUloga()!=1){
    header("Location: index.php");
    exit; 
    }
}
provjeraPristupaGalerija();

function dohvatiVrsteOglasa(){
    $sqlOglas="SELECT vo.idvrsta_oglasa, vo.naziv, vo.brzina_izmjene_sec, vo.duljina_trajanja_prikazivanja_h, vo.cijena, vo.pozicija_oglasa_id, vo.pozicija_oglasa_idlokacija, vo.pozicija_oglasa_idstranica, po.dimenzija_oglasa_sirina, po.dimenzija_oglasa_visina, l.broj, s.url FROM vrsta_oglasa vo LEFT JOIN pozicija_oglasa po ON po.idpozicija_oglasa = vo.pozicija_oglasa_id LEFT JOIN lokacija l ON po.idlokacija = l.idlokacija LEFT JOIN stranica s ON l.idstranica = s.idstranica";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($sqlOglas);
    $prikaz = array();
    if ($rez != null) {
        while (list($i,$n,$bis,$bth,$c,$poid,$polid,$posid,$Ds,$Dv,$brL,$u) = $rez->fetch_array()) {
            $prikaz[] = new VrstaOglasa($i, $n, $bis, $bth, $c, $poid, $polid, $posid, $Ds, $Dv, $brL, $u);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
}
$ispisVrsteOglasa=dohvatiVrsteOglasa();
$greska=array();
if(isset($_POST["submitOglas"])){
        $greska=array();
        $VOvrsta=$_POST["VOvrsta"];
        $VOnaziv=$_POST["VOnaziv"];
        $VOopis=$_POST["VOopis"];
        $VOurl=$_POST["VOurl"];
        $VOslika=$_FILES["VOslika"]["name"];
        $VOod=$_POST["VOod"];
        //$VOdo=$_POST["VOdo"];
        
        if(empty($VOvrsta)){
            $greska[]="Odabir vrste oglasa - obavezan unos";
        }
        if(empty($VOnaziv)){
            $greska[]="Naziv - obavezan unos";
        }
        if(empty($VOopis)){
            $greska[]="Opis - obavezan unos";
        }
        if(empty($VOurl)){
            $greska[]="URL- obavezan unos";
        }
        if(empty($VOslika)){
            $greska[]="Slika- obavezan unos";
        }
        if(empty($VOod)){
            $greska[]="Datum od - obavezan unos";
        }
        if(!empty($VOod)){
            if(provjeriDatum ($VOod)==1){
                $greskaDiv = true;
                $greska[]="Datum i vrijeme - potreban format gggg-mm-dd hh:mm:ss ";
            }
        }
        
        
        //$VOdo=$_POST["VOdo"];izracunaj
        $TrajanjeOglasaSati=""; //POZVATI VIRTUALNO TU I KOD REGISTRACIJE
        $veza = new Baza();
        $veza->spojiDB();
        $rez = $veza->selectDB("SELECT duljina_trajanja_prikazivanja_h FROM vrsta_oglasa WHERE idvrsta_oglasa=$VOvrsta;");
        if ($rez != null) {
            $TrajanjeOglasaSati= $rez->fetch_array();
            $TrajanjeOglasaSati=$TrajanjeOglasaSati["duljina_trajanja_prikazivanja_h"];
            //var_dump($TrajanjeOglasaSati);
        }
        //$VOodDate=date("Y-m-d H:i:s", strtotime($VOod));
        $VOdo = date("Y-m-d H:i:s", strtotime("+$TrajanjeOglasaSati hours", strtotime($VOod)));
        //var_dump($VOdo);
        
        if(Sesija::dajKorisnika()){
        $kor=Sesija::dajKorisnika();
        $korimeO=$kor["korisnik"];}
        else{$korimeO="";}
        $KOR_id="";
        $rez2=$veza->selectDB("SELECT idkorisnik FROM korisnik WHERE korime='$korimeO';");
        if ($rez2 != null) {
            $KOR_id= $rez2->fetch_array();
            $KOR_id=$KOR_id["idkorisnik"];
        }
        $veza->zatvoriDB();
        
        $target_dir = "slike/";
        $target_file = $target_dir . basename($_FILES["VOslika"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $greska[]="Sorry, datoteka - mora završavati ekstenzijom .png ili .jpg. ili jpeg :)";
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
            $greska[]="Preimenujte naziv slike.";
            $uploadOk = 0;
        }

        if(empty($greska)&&$uploadOk){
            if (move_uploaded_file($_FILES["VOslika"]["tmp_name"], $target_file)) {
                $veza = new Baza ();
                $veza->spojiDB();
                $upit="INSERT INTO oglas (naziv,opis,url_web_stranica_otvori,slika,početak_prikazivanja,kraj_prikazivanja,idkorisnik,vrsta_oglasa_id) VALUES ('$VOnaziv','$VOopis','$VOurl','$VOslika','$VOod','$VOdo',$KOR_id,$VOvrsta);";
                //var_dump($upit);
                $veza->updateDB($upit);
                $veza->zatvoriDB();
                header("Location: oglasi.php");
            } else {
                $greska[]="Doslo je do pogreske prilikom uploada datoteke.";
            }
        }
}
    function provjeriDatum ($inp){
        $patD="/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}$/";
        if (preg_match($patD, $inp)){
            return false;
        }
        else{
            return true;
        }
    }
 function dohvatiOglaseKorisnika(){
        if(Sesija::dajKorisnika()){
        $kor=Sesija::dajKorisnika();
        $korimeO=$kor["korisnik"];}
        else{$korimeO="";}

    $sqlOglasKorisnika="SELECT idoglas,naziv,opis,url_web_stranica_otvori,slika,broj_klikova,početak_prikazivanja,kraj_prikazivanja,status_potvrdenosti,status_aktivnosti,oglas.idkorisnik,vrsta_oglasa_id FROM oglas LEFT JOIN korisnik on oglas.idkorisnik=korisnik.idkorisnik WHERE korisnik.korime='$korimeO'";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($sqlOglasKorisnika);
    $prikaz = array();
    if ($rez != null) {
        while (list($i, $n, $o, $u, $slika, $bk, $pp, $kp, $sp, $sa, $ik, $vo) = $rez->fetch_array()) {
            $prikaz[] = new Oglas($i, $n, $o, $u, $slika, $bk, $pp, $kp, $sp, $sa, $ik, $vo);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
} 
$ispisOglasiKorisnika=dohvatiOglaseKorisnika();
    

    

if(empty($greska)){$smarty->assign('greska',"");}else{$smarty->assign('greska',$greska);}
if(empty($ispisVrsteOglasa)){$smarty->assign('ispisVrsteOglasa',"");}else{$smarty->assign('ispisVrsteOglasa',$ispisVrsteOglasa);}
if(empty($ispisOglasiKorisnika)){$smarty->assign('ispisOglasiKorisnika',"");}else{$smarty->assign('ispisOglasiKorisnika',$ispisOglasiKorisnika);}
$smarty->display('templates/oglasi.tpl');
$smarty->display('templates/footer.tpl');                

?>