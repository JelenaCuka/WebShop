<?php
$naslov ="Moderator";
require_once 'header.php';
//error_reporting(0);//produkcija
$greska=array();
function provjeraPristupaTablica(){
    if(KojaUloga()!=3&&KojaUloga()!=2){
    header("Location: index.php");
    exit; 
    }
}
provjeraPristupaTablica();

 function dohvatiPozicijeOdModeratora(){
    if(Sesija::dajKorisnika()){
    $kor=Sesija::dajKorisnika();
    $korimeM=$kor["korisnik"];}else{$korimeM="";}
    //$sql="SELECT idpozicija_oglasa,idlokacija,idstranica,dimenzija_oglasa_sirina,dimenzija_oglasa_visina,moderator_pozicije_id FROM pozicija_oglasa;";
    $sql="SELECT idpozicija_oglasa,pozicija_oglasa.idlokacija,pozicija_oglasa.idstranica,dimenzija_oglasa_sirina,dimenzija_oglasa_visina,moderator_pozicije_id, k.korime,l.broj,s.url FROM pozicija_oglasa LEFT JOIN korisnik k on k.idkorisnik=pozicija_oglasa.moderator_pozicije_id LEFT JOIN lokacija l on pozicija_oglasa.idlokacija=l.idlokacija LEFT JOIN stranica s on l.idstranica=s.idstranica WHERE k.korime='$korimeM';";
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

$kategorijeModerator =  dohvatKategorijeModerator();
$predmetiModeratora=dohvatiPredmeteModeratorKategorije();
$pozicijeModeratora=dohvatiPozicijeOdModeratora();
if(isset($_POST["submitDodajPredmet"])){
        $greska=array();
        $Pnaziv=$_POST["Pnaziv"];
        $Pkategorija=$_POST["Pkategorija"];
        $Popis=$_POST["Popis"];
        $Pcijena=$_POST["Pcijena"];
        if(empty($Pnaziv)){
            $greska[]="Unesite naziv.";
        }
        if(empty($Pkategorija)){
            $greska[]="Odaberite kategoriju.";
        }
        if(empty($Popis)){
            $greska[]="Unesite opis.";
        }
        if(empty($Pcijena)){
            $greska[]="Unesite cijenu.";
        }
        if(!empty($Pcijena)){
            if(!formatCijena($Pcijena)){
                $greska[]="Cijena dozvoljeni brojevi i 1 točka.";
            }
        }
        if(empty($greska)){
            $veza = new Baza();
            $veza->spojiDB();
            $sql="INSERT INTO predmet (naziv,opis,cijena,idkategorija_predmeta) VALUES ('$Pnaziv','$Popis',$Pcijena,$Pkategorija);";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
            header("Location: moderator.php");
        }

}
if(isset($_POST["submitDodajPredmetAkcija"])){
        $greska=array();
        $Pid=$_POST["Apredmet"];
        $PApopust=$_POST["PApopust"];
        $PAod=$_POST["PAod"];
        $PAdo=$_POST["PAdo"];
        if(empty($Pid)){
            $greska[]="Odaberite predmet.";
        }
        if(empty($PApopust)){
            $greska[]="Unesite popust.";
        }
        if(empty($PAod)){
            $greska[]="Unesite datum od.";
        }
        if(empty($PAdo)){
            $greska[]="Unesite datum do.";
        }
        if(!empty($PAod)){
            if(!provjeriDatum($PAod)){
                $greska[]="Unesite datum od u formatu gggg-mm-dd TNX.";
            }
        }if(!empty($PAdo)){
            if(!provjeriDatum($PAdo)){
                $greska[]="Unesite datum do u formatu gggg-mm-dd TNX.";
            }
        }
        

        if(empty($greska)){
            $PApopust=$PApopust*0.01;
            $veza = new Baza();
            $veza->spojiDB();
            $sql="INSERT INTO akcija (iznos_popusta, od, do,idpredmet) VALUES ( $PApopust, '$PAod' , '$PAdo',$Pid);";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
            header("Location: kategorije.php");
        }

}
if(isset($_POST["submitDodajVrstaOglasa"])){
        $greska=array();
        $VOnaziv=$_POST["VOnaziv"];
        $VObrzinaIzmjeneSec=$_POST["VObrzinaIzmjeneSec"];
        $VOtrajanjePrikazivanjaSati=$_POST["VOtrajanjePrikazivanjaSati"];
        $VOcijena=$_POST["VOcijena"];
        $VOpozicijaOglasa=$_POST["VOpozicijaOglasa"];
        //dohvatiti lokID i strID iz baze
        //SELECT idlokacija,idstranica FROM pozicija_oglasa WHERE idpozicija_oglasa=7;//$VOpozicijaOglasa
        //SELECT idlokacija,idstranica FROM pozicija_oglasa WHERE idpozicija_oglasa=$VOpozicijaOglasa;//
        if(empty($VOnaziv)){
            $greska[]="Unesite naziv vrste oglasa.";
        }
        if(empty($VObrzinaIzmjeneSec)){
            $greska[]="Unesite brzinu izmjene.";
        }
        if(empty($VOtrajanjePrikazivanjaSati)){
            $greska[]="Unesite trajanje.";
        }
        if(empty($VOcijena)){
            $greska[]="Unesite cijenu.";
        }
        if(empty($VOpozicijaOglasa)){
            $greska[]="Odaberite poziciju!.";
        }
        if(!empty($VOcijena)){
            if(!formatCijena($VOcijena)){
                $greska[]="Cijena-necjelobrojne vrijednosti odvojite točkom(.)!";
            }
        }
        if(empty($greska)){
            $veza = new Baza();
            $veza->spojiDB();
            $sqlPOZ="SELECT idlokacija,idstranica FROM pozicija_oglasa WHERE idpozicija_oglasa=$VOpozicijaOglasa;";
            $pozicija= mysqli_fetch_array($veza->selectDB($sqlPOZ));
            $stranicaPOZ=$pozicija["idstranica"];
            $lokacijaPOZ=$pozicija["idlokacija"];
            $sql="INSERT INTO vrsta_oglasa ( naziv , brzina_izmjene_sec , duljina_trajanja_prikazivanja_h , cijena , pozicija_oglasa_id , pozicija_oglasa_idlokacija, pozicija_oglasa_idstranica ) VALUES ( '$VOnaziv' , $VObrzinaIzmjeneSec , $VOtrajanjePrikazivanjaSati, $VOcijena , $VOpozicijaOglasa,$lokacijaPOZ,$stranicaPOZ);";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
            header("Location: moderator.php");
        }

}
function formatCijena ($inp){
        $patFormat = "/^[^\.]([0-9]*)*\.?([0-9]*)$/";
        if (preg_match($patFormat, $inp)){
            return true;
        }
        else{
            return false;
        }
}
function provjeriDatum ($inp){
        $patD="/^[0-9]{4}-[0-1]{1}[0-9]{1}-[0-9]{1}[0-9]{1}$/";
        if (preg_match($patD, $inp)){
            return true;
        }
        else{
            return false;
        }
    } 

if(empty($kategorijeModerator)){$smarty->assign('kategorijeM',"");}else{$smarty->assign('kategorijeM',$kategorijeModerator);}

            

/*
$smarty->assign('tablica', $tablicaIma );//ima li rezultata
$smarty->assign('tablicaSadrzaj', dohvatiPodatkeTablica() );
$smarty->assign('ispisGradTh', $gradHref );//order by asc dsc
$smarty->assign('ispisOcjenaTh', $ocjenaHref );//order by asc dsc
$smarty->assign('selectKategorije', dobaviKategorije() );*/
if(empty($pozicijeModeratora)){$smarty->assign('pozicijeModeratora',"");}else{$smarty->assign('pozicijeModeratora',$pozicijeModeratora);}
if(empty($kategorijeModerator)){$smarty->assign('kategorijeModerator',"");}else{$smarty->assign('kategorijeModerator',$kategorijeModerator);}
if(empty($predmetiModeratora)){$smarty->assign('predmetiModeratora',"");}else{$smarty->assign('predmetiModeratora',$predmetiModeratora);}
$smarty->assign('aktivnaSkriptaR',$_SERVER["PHP_SELF"]);
$smarty->assign('greska', $greska);
$smarty->display('templates/moderator.tpl');
$smarty->display('templates/footer.tpl');
?>

       