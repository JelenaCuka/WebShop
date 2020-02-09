<?php 
$naslov ="NARUDŽBA";
require_once 'header.php';
include_once 'funkcije.php';
$greska=array();
$narudzbaUkupno="";
$sesijaKosarica=Sesija::dajKosaricu();
$narudzbaAnonimniSamoPredmet=array();
if(!empty($sesijaKosarica)){
    //sesija index => predmet kolicina
    foreach($sesijaKosarica as $k=>$v){

        $narudzbaAnonimniSamoPredmet[]=dohvatiPredmeteNarudzba($sesijaKosarica[$k]);

    }
}
if(isset($_POST["submitNarudba"])){
        $greska=array();
        foreach ($_POST as $key => $value){
            if(empty($value)){
                    $greska[]="$key nije unesen.";
            }
           // var_dump(sizeof($_POST));
            
        }
        if(sizeof($_POST)<=4){
                $greska[]="Narudzba mora imati barem 1 predmet";
        }
        if(empty($greska)){
            $ime=$_POST["ime"];
            $prez=$_POST["prezime"];
            $adresa=$_POST["adresa"];
            $veza = new Baza();
            $veza->spojiDB();
            
            $sesijaKor=Sesija::dajKorisnika();
            if($sesijaKor["korisnik"]!="anonimni"){
                $korisniK=$sesijaKor["korisnik"];
            }else{
                $korisniK="";
            }
            $sql = "INSERT INTO narudzba (ime,prezime,adresa,idkorisnik) VALUES (";
            $sql.="'$ime',";
            $sql.="'$prez',";
            $sql.="'$adresa',";
            if($korisniK!==""){
                $re=$veza->selectDB("SELECT idkorisnik FROM korisnik WHERE korime='$korisniK';");
                $r = mysqli_fetch_array($re);
                $korisniK=$r["idkorisnik"];
                $sql.="$korisniK";
            }
            else {$sql.="DEFAULT";}
            $sql .=")";
            //var_dump($sql);//insert narudba
            $upitnik=$veza->updateDB($sql);//idNarudba           
            foreach ($_POST as $key => $value){
                if($key!=='ime'&&$key!=='prezime'&&$key!=='adresa'&&$key!=='submitNarudba'){
                    //echo "$key=$value";
                        //insert N_P
                        $sql2="INSERT INTO narudzba_predmet (narudzba_idnarudzba,predmet_idpredmet,kolicina) VALUES (";
                        $sql2.="$upitnik,";
                        $sql2.="$key,";
                        $sql2.="$value";
                        $sql2.=");";
                        //var_dump($sql2);
                }
                $veza->updateDB($sql2);
            }
            $veza->zatvoriDB();
            Sesija::kreirajKosaricu(array());
            header("Location: narudbaPregled.php");
            //ocisti sesiju //ocisti section div stovec//ISPISI DODANO


        }
         
    }

$oglasiLok7=dohvatiAkrivniOglas(15);
$oglasiLok8=dohvatiAkrivniOglas(16);

$minVO7=dohvatiNajmanjuCijenuOglasa(15);
$minVO8=dohvatiNajmanjuCijenuOglasa(16);    
    
if(empty($oglasiLok7)){$smarty->assign('oglasiLok7',"");}else{$smarty->assign('oglasiLok7',$oglasiLok7);}
if(empty($minVO7)){$smarty->assign('minVO7',"");}else{$smarty->assign('minVO7',$minVO7);}
if(empty($oglasiLok8)){$smarty->assign('oglasiLok8',"");}else{$smarty->assign('oglasiLok8',$oglasiLok8);}
if(empty($minVO8)){$smarty->assign('minVO8',"");}else{$smarty->assign('minVO8',$minVO8);}    
    
    
if(empty($narudzbaAnonimniSamoPredmet)){$smarty->assign('naruzdbaA',"");}else{$smarty->assign('naruzdbaA',$narudzbaAnonimniSamoPredmet);}
//if(empty($prikažiPredmete)){$smarty->assign('predmetiA',"");}else{$smarty->assign('predmetiA',$prikažiPredmete);}
$smarty->assign('greska', $greska);
$smarty->display('templates/narudzba.tpl');
$smarty->display('templates/footer.tpl');
?> 