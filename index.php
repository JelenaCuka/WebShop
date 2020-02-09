<?php 
$naslov ="Početna stranica";
require_once 'header.php';


$oglasiLok1=dohvatiAkrivniOglas(7);
$oglasiLok2=dohvatiAkrivniOglas(10);
$oglasiLok3=dohvatiAkrivniOglas(11);




$minVO1=dohvatiNajmanjuCijenuOglasa(7);
$minVO2=dohvatiNajmanjuCijenuOglasa(10);
$minVO3=dohvatiNajmanjuCijenuOglasa(11);



if(empty($oglasiLok1)){$smarty->assign('oglasiLok1',"");}else{$smarty->assign('oglasiLok1',$oglasiLok1);}
if(empty($minVO1)){$smarty->assign('minVO1',"");}else{$smarty->assign('minVO1',$minVO1);}
if(empty($oglasiLok2)){$smarty->assign('oglasiLok2',"");}else{$smarty->assign('oglasiLok2',$oglasiLok2);}
if(empty($minVO2)){$smarty->assign('minVO2',"");}else{$smarty->assign('minVO2',$minVO2);}
if(empty($oglasiLok3)){$smarty->assign('oglasiLok3',"");}else{$smarty->assign('oglasiLok3',$oglasiLok3);}
if(empty($minVO3)){$smarty->assign('minVO3',"");}else{$smarty->assign('minVO3',$minVO3);}



$smarty->display('templates/index.tpl');
$smarty->display('templates/footer.tpl');
?> 