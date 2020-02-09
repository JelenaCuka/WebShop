<?php
include_once 'funkcije.php';
if(isset($_GET['noviKosarica'])&&$_GET['noviKosarica']!=""&&!empty($_GET['noviKosarica'])){
    $kosara=explode(",",$_GET['noviKosarica']);
    if($kosara!=""){
        //$kosara=substr($kosara,1);
        $kosarax=array();
        foreach ($kosara as $i=>$k){
            $i=substr($k,1);
            $pom=array();
            $pom["predmet"]=$i;
            $pom["kolicina"]=1;//uvijek sprema 1?
            //var_dump($pom);
            $kosarax[]=$pom;
        }
        //$parametri=explode(",",$_GET['noviKosarica']);
        //var_dump($kosarax);
        dodajUKosaricu($kosarax);
       // var_dump(Sesija::dajKosaricu());
    }
}
?>