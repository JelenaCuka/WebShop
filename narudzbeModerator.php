<?php 
$naslov ="Pregled narudžbe";
require_once 'header.php';
include_once 'funkcije.php';

function provjeraPristupaTablica(){
    if(KojaUloga()!=3&&KojaUloga()!=2){
    header("Location: index.php");
    exit; 
    }
}
provjeraPristupaTablica();

//DOHVATI NARUDZBE ZA ANONIMNOG
//DOHVATI NARUDZBE ZA REG
//DOHVATI NARUDZBE ZA ADMINA
$narudzbeM=array();
$sesija=Sesija::dajKorisnika();
$tip=$sesija["tip"];
$korime=$sesija["korisnik"];
if($tip!=0&&$tip!=1){
    if(dohvatiNarudbeModerator()){
        $narudzbeM=dohvatiNarudbeModerator();
    }else{
        $narudzbeM=array();
    }
}

if(!empty($narudzbeM)){
    foreach ($narudzbeM as $key => $value) {//value je nar
        $value->setPredmeti();
        $value->setIznos();
        $predmetiUnarudzbi[]=$value->getPredmeti();
        
    }
}
 function dohvatiOglaseKorisnika(){
        if(Sesija::dajKorisnika()){
        $kor=Sesija::dajKorisnika();
        $korimeO=$kor["korisnik"];}
        else{$korimeO="";}
        $veza = new Baza();
        $veza->spojiDB();
        $dajModeratorID="";
        $dajModeratorID=$veza->selectDB("SELECT idkorisnik FROM korisnik WHERE korime='$korimeO'");
        $dajModeratorID=$dajModeratorID->fetch_array();
        $dajModeratorID=$dajModeratorID["idkorisnik"];
        $sqlOglasKorisnika="SELECT o.idoglas,o.naziv,o.opis,o.url_web_stranica_otvori,o.slika,o.broj_klikova,o.početak_prikazivanja,o.kraj_prikazivanja,o.status_potvrdenosti,o.status_aktivnosti,o.idkorisnik,o.vrsta_oglasa_id FROM oglas o LEFT JOIN vrsta_oglasa vo on vo.idvrsta_oglasa=o.vrsta_oglasa_id LEFT JOIN pozicija_oglasa po on po.idpozicija_oglasa=vo.pozicija_oglasa_id WHERE po.moderator_pozicije_id=$dajModeratorID;";
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
/*
foreach ($predmetiUnarudzbi as $key => $value) {//value je nar//predmeti u svim narudzbama
        $value=$value->IzracunajCijenu();
}*/
//var_dump($predmetiUnarudzbi);

//if(empty($narudzbaAnonimniSamoPredmet)){$smarty->assign('naruzdbaA',"");}else{$smarty->assign('naruzdbaA',$narudzbaAnonimniSamoPredmet);}
//if(empty($prikažiPredmete)){$smarty->assign('predmetiA',"");}else{$smarty->assign('predmetiA',$prikažiPredmete);}
if(empty($ispisOglasiKorisnika)){$smarty->assign('ispisOglasiKorisnika',"");}else{$smarty->assign('ispisOglasiKorisnika',$ispisOglasiKorisnika);}
if(empty($narudzbeM)){$smarty->assign('narudzbeM',"");}else{$smarty->assign('narudzbeM',$narudzbeM);}
$smarty->display('templates/narudbeModerator.tpl');
$smarty->display('templates/footer.tpl');
?> 