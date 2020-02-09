<?php
include_once 'funkcije.php';
if(isset($_GET['idOgl'])&&$_GET['idOgl']!=""&&!empty($_GET['idOgl'])){
    $idOgl=$_GET['idOgl'];
    if($idOgl!=""){
            $veza = new Baza();
            $veza->spojiDB();
            $SQLmin="SELECT broj_klikova FROM oglas  WHERE idoglas =$idOgl";
            $rez = $veza->selectDB($SQLmin);
            $brKlikova ="";
            if ($rez != null) {
                 $brKlikova= $rez->fetch_array();
                 $brKlikova =$brKlikova[0];
                 //$prikaz =$prikaz["MIN( vo.cijena )"];
            }
        
            $brKlikova=$brKlikova+1;
            
            $sql="UPDATE oglas SET broj_klikova=$brKlikova WHERE idoglas=$idOgl;";
            $veza->updateDB($sql);
            $veza->zatvoriDB();
    }
}
?>