<?php
include_once 'funkcije.php';
if(isset($_GET['idPromjenaKosarica'])&&$_GET['idPromjenaKosarica']!=""&&!empty($_GET['idPromjenaKosarica'])){
    $predmetK=$_GET['idPromjenaKosarica'];
    if($predmetK!=""){
    //ukloni iz sesije? pozovi ponovni prikaz    
        $sesijaKosarica=Sesija::dajKosaricu();
        $nova=array();
        if(!empty($sesijaKosarica)){
            //sesija index => predmet kolicina
            foreach($sesijaKosarica as $k=>$v){
                if(!($sesijaKosarica[$k]["predmet"]===$predmetK)){
                    //obrisi iz kosarice??
                    $nova[]=$sesijaKosarica[$k];
                }
            }
            Sesija::kreirajKosaricu($nova);
        }
    }
}
?>