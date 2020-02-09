<?php 
$naslov ="KATEGORIJE";
require_once 'header.php';
include_once 'funkcije.php';

$oglasiLok4=dohvatiAkrivniOglas(9);
$oglasiLok5=dohvatiAkrivniOglas(12);
$oglasiLok6=dohvatiAkrivniOglas(14);

$minVO4=dohvatiNajmanjuCijenuOglasa(9);
$minVO5=dohvatiNajmanjuCijenuOglasa(12);
$minVO6=dohvatiNajmanjuCijenuOglasa(14);

$kategorijeAnonimni = dohvatKategorije();


if(empty($oglasiLok4)){$smarty->assign('oglasiLok4',"");}else{$smarty->assign('oglasiLok4',$oglasiLok4);}
if(empty($minVO4)){$smarty->assign('minVO4',"");}else{$smarty->assign('minVO4',$minVO4);}
if(empty($oglasiLok5)){$smarty->assign('oglasiLok5',"");}else{$smarty->assign('oglasiLok5',$oglasiLok5);}
if(empty($minVO5)){$smarty->assign('minVO5',"");}else{$smarty->assign('minVO5',$minVO5);}
if(empty($oglasiLok6)){$smarty->assign('oglasiLok6',"");}else{$smarty->assign('oglasiLok6',$oglasiLok6);}
if(empty($minVO6)){$smarty->assign('minVO6',"");}else{$smarty->assign('minVO6',$minVO6);}


if(empty($kategorijeAnonimni)){$smarty->assign('kategorijeA',"");}else{$smarty->assign('kategorijeA',$kategorijeAnonimni);}
//if(empty($prikažiPredmete)){$smarty->assign('predmetiA',"");}else{$smarty->assign('predmetiA',$prikažiPredmete);}
$smarty->display('templates/kategorije.tpl');
$smarty->display('templates/footer.tpl');
?> 