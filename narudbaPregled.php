<?php 
$naslov ="NARUDŽBE";
require_once 'header.php';
include_once 'funkcije.php';

//DOHVATI NARUDZBE ZA ANONIMNOG
//DOHVATI NARUDZBE ZA REG
//DOHVATI NARUDZBE ZA ADMINA
$narudzbe=array();
$narudzbeR=array();
$narudzbeM=array();
$sesija=Sesija::dajKorisnika();
$tip=$sesija["tip"];
$korime=$sesija["korisnik"];
if($tip!=0){
        if(dohvatiNarudbeRegistrirani($korime)){
            $narudzbeR=dohvatiNarudbeRegistrirani($korime);
        }else{
            $narudzbeR=array();
        }
}
if($tip!=0&&$tip!=1){
    if(dohvatiNarudbeModerator()){
        $narudzbeM=dohvatiNarudbeModerator();
    }else{
        $narudzbeM=array();
    }
}
//anonimni
if(dohvatiNarudbeAnonimni()){
        $narudzbe=dohvatiNarudbeAnonimni();
}else{
        $narudzbe=array();
}

//var_dump($narudzbe);
$predmetiUnarudzbi=array();
//$predmetiUnarudzbi=dohvatiPredmeteIzJedneNarudzbe($n)
if(isset($narudzbe)&&!empty($narudzbe)){
    foreach ($narudzbe as $key => $value) {//value je nar
        $value->setPredmeti();
        $value->setIznos();
        //$predmetiUnarudzbi[]=$value->getPredmeti();
        $value->getPredmeti();
        
    }
}
if(isset($narudzbeR)&&!empty($narudzbeR)){
    foreach ($narudzbeR as $key => $value) {//value je nar
        $value->setPredmeti();
        $value->setIznos();
        $predmetiUnarudzbi[]=$value->getPredmeti();
        
    }
}
if(isset($narudzbeM)&&!empty($narudzbeM)){
    foreach ($narudzbeM as $key => $value) {//value je nar
        $value->setPredmeti();
        $value->setIznos();
        $predmetiUnarudzbi[]=$value->getPredmeti();
        
    }
}
/*
foreach ($predmetiUnarudzbi as $key => $value) {//value je nar//predmeti u svim narudzbama
        $value=$value->IzracunajCijenu();
}*/
//var_dump($predmetiUnarudzbi);

//if(empty($narudzbaAnonimniSamoPredmet)){$smarty->assign('naruzdbaA',"");}else{$smarty->assign('naruzdbaA',$narudzbaAnonimniSamoPredmet);}
//if(empty($prikažiPredmete)){$smarty->assign('predmetiA',"");}else{$smarty->assign('predmetiA',$prikažiPredmete);}
if(empty($narudzbe)){$smarty->assign('narudzbe',"");}else{$smarty->assign('narudzbe',$narudzbe);}
if(empty($narudzbeR)){$smarty->assign('narudzbeR',"");}else{$smarty->assign('narudzbeR',$narudzbeR);}
if(empty($tip)){$smarty->assign('tip',"");}else{$smarty->assign('tip',$tip);}
if(empty($narudzbeM)){$smarty->assign('narudzbeM',"");}else{$smarty->assign('narudzbeM',$narudzbeM);}
$smarty->display('templates/narudbaPregled.tpl');
$smarty->display('templates/footer.tpl');
?> 