<?php
$naslov = "Prijava i registracija";
require_once 'header.php';
$porukaAktivacije = "";
if (isset($_GET["mod"])) {
    if($_GET["mod"] === 'aktivacija'){
        $porukaAktivacije = "Aktivacija pogrešno izvršena";
    }else{
        $odreziParametar=substr($_GET["mod"] , 0, 10);
        if($odreziParametar ==='aktivacija'){
            $parametri=explode("?",$_GET['mod']);
            $akkod=explode("=",$parametri[1]);
            $akkod=$akkod[1];
            $akid=explode("=",$parametri[2]);
            $akid=$akid[1];
            $akt=explode("=",$parametri[3]);
            $akt=$akt[1];
            //$porukaAktivacije="";
            if (!empty($akt) && !empty($akkod) && !empty($akid)) {
                $vrijednostAkt="";
                $veza = new Baza();
                $veza->spojiDB();
                $sql = "SELECT status_racun_aktivan FROM korisnik WHERE korime ='$akid';";
                $r = $veza->selectDB($sql);
                if ($r) {
                    $vrijednostAkt=mysqli_fetch_array($r);
                    $vrijednostAkt=$vrijednostAkt[0];
                }
                $veza->zatvoriDB();
                if($vrijednostAkt==='1'){
                        $porukaAktivacije = "Ovaj račun je već aktiviran!!";
                } else {
                    if (dohvatiTrajanjeAktivacijskogKoda()) {
                        $POMAK = dohvatiTrajanjeAktivacijskogKoda();
                        //greska
                    } else {
                        $POMAK = 0;
                    }
                    $trenutnoVrijeme = date("Y-m-d H:i:s"); //POZVATI VIRTUALNO TU I KOD REGISTRACIJE
                    $KodVrijediDoProvjera = date("Y-m-d H:i:s", strtotime("+$POMAK hours", strtotime($akt)));
                    if (strtotime($trenutnoVrijeme) > strtotime($KodVrijediDoProvjera)) {
                        $porukaAktivacije = "NEUSPJEŠNA AKTIVACIJA: Isteklo je vrijeme moguće aktivacije vašeg računa, registrirajte se ponovo :( !!";
                    } else {
                        $veza = new Baza();
                        $veza->spojiDB();
                        $sql = "UPDATE korisnik SET status_racun_aktivan=1 WHERE korime ='$akid';";
                        $r = $veza->updateDB($sql);
                        if ($r) {
                            $porukaAktivacije = "YEEEIII aktivirali ste vaš korisnički račun!!";
                        }
                        $veza->zatvoriDB();
                    }
                }
            }    
        }
    }   
}
function provjeraDatumVeci($prvi,$drugi){
    if($prvi<$drugi){
        return true;
        //drugi veci od prvog
    }
    if($prvi>$drugi){
        return false;
    }
}
    $salt = "";
    $uspjesnaPrijava=array();
    $greska=array();
if(isset($_POST["submitPrijava"])){
        $autentificiran=false;
        $greska=array();
        $uspjesnaPrijava=array();
        foreach ($_POST as $key => $value){
            if(empty($value)){
                $greska[]="$key nije unesen.";
            }
        }
        if (empty($greska)) {
        $veza = new Baza();
        $veza->spojiDB();
        $korime = $_POST["korisnicko_ime_prijava"]; //
        $lozinka = $_POST["password_prijava"]; //
        $sql = "SELECT COUNT(idkorisnik) FROM korisnik WHERE korime='$korime' AND pristup_zakljucan<>1 AND status_racun_aktivan<>0"; //ima kor
        $rezultat = $veza->selectDB($sql);
        if ($rezultat != null) {
            while ($red = mysqli_fetch_array($rezultat)) {
                if ($red["COUNT(idkorisnik)"] == 1) {
                    $solDohvatiIzBaze = "";
                    ////dohvati neuspjesne_prijave i pristup_zakljucan
                    //ako je pristup_zakljucan cout RACUN 
                    $dohvatiLozinku = "SELECT lozinka,idtip_korisnika,sol,neuspjesne_prijave  FROM korisnik WHERE korime='$korime'"; //ima kor
                    $dohvatiLozinkuRezultat = mysqli_fetch_array($veza->selectDB($dohvatiLozinku));
                    $BRNEUPRIJAVA = $dohvatiLozinkuRezultat["neuspjesne_prijave"];
                    $KorTip = $dohvatiLozinkuRezultat["idtip_korisnika"];
                    $solDohvatiIzBaze = $dohvatiLozinkuRezultat["sol"];
                    $dohvatiLozinkuRezultat = $dohvatiLozinkuRezultat["lozinka"];
                    if (provjeriLozinku($solDohvatiIzBaze, $lozinka, $dohvatiLozinkuRezultat)) {
                        $uspjesnaPrijava[] = "Prijavljeni ste!";
                        $autentificiran = true;
                        $BRNEUPRIJAVA=0;
                        $SQLupdateKOR="UPDATE korisnik SET neuspjesne_prijave=$BRNEUPRIJAVA WHERE korime='$korime'";
                        $veza->selectDB($SQLupdateKOR);
                        $tip = $KorTip;
                        
                        $cookie_name = "zadnja_prijava";
                        $cookie_value=$korime;
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 365), '/' );
                        
                    } else {
                        $uspjesnaPrijava[] = "Neuspješna prijava (neispravna lozinka)!";
                        $BRNEUPRIJAVA++;//ZAPISI U BAZU NOVI BROJ
                        $neuPR=$KONFA->getNeispravna_prijava_broj_max();
                            if($BRNEUPRIJAVA>=$neuPR){
                                $SQLupdateKOR="UPDATE korisnik SET neuspjesne_prijave=$BRNEUPRIJAVA,pristup_zakljucan=1  WHERE korime='$korime'";
                                $veza->selectDB($SQLupdateKOR);
                            }else{
                                $SQLupdateKOR="UPDATE korisnik SET neuspjesne_prijave=$BRNEUPRIJAVA WHERE korime='$korime'";
                                $veza->selectDB($SQLupdateKOR);
                            }
                        $autentificiran = false;
                    }
                }
                if ($red["COUNT(idkorisnik)"] == 0)
                    $uspjesnaPrijava[] = "Neuspješna prijava";
            }
        }
        $veza->zatvoriDB();
    }
    if ($autentificiran) {
        Sesija::obrisiSesiju();//kraj anonimne!
        Sesija::kreirajSesiju();
        Sesija::kreirajKorisnika($korime, $tip);
        if (isset($uspjesnaPrijava))
            header("Location: index.php");
        //$uspjesnaPrijava[] = "Sesija kreirana korisnik prijavljen";
    }
}
if(isset($_POST["submitNovaLozinka"])){
    if(empty($_POST["korisnicko_ime_prijava"])){
        $greska[]="Za slanje nove lozinke na mail unesite korisničko ime.";
    }else{
        $korisnikTraziLozinkuNovu=$_POST["korisnicko_ime_prijava"];
        $veza = new Baza();
        $veza->spojiDB();
        $rez = $veza->selectDB("SELECT idkorisnik,email FROM korisnik where korime='$korisnikTraziLozinkuNovu';");
        if ($rez != null) {
            list($IDnovaLozinka,$MAILnovaLozink) = $rez->fetch_array();
                $generirajNovuLozinku= generirajKod();
                $LozinkaKriptirano= posoli($generirajNovuLozinku);
                $resetlk=$LozinkaKriptirano["kriptiranaLozinka"];
                $resetls=$LozinkaKriptirano["sol"];
                $SQLnOVAl="UPDATE korisnik SET lozinka='$resetlk',lozinka_nekriptirano='$generirajNovuLozinku',sol='$resetls' WHERE idkorisnik=$IDnovaLozinka;";
                $veza->updateDB($SQLnOVAl);
                posaljiMailNovaLozinka($generirajNovuLozinku,$MAILnovaLozink);
                $greska[]="Poslana nova lozinka na mail";
        }
        else{
            $greska[]="Nepostojeći korisnik?";
        }
        $veza->zatvoriDB();
    } 
}
if(isset($_POST["submitRegistracija"])){
        $greska=array();
        $pomPamtiLozinku="";
        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
        }else{
            $captcha="";
        }
        if(!$captcha){
          $greska[]="Potvrdite da niste robot.";
        }else{
            $secretKey = "6LdabV0UAAAAAOLPWwT4iTxU1YOJ3UVVC7cOE6hH";
            $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            if($response['success'] == false)
            {
              $greska[]="Spamer?";
            } 
        }foreach ($_POST as $key => $value){
            if(empty($value)){
                    $greska[]="$key nije unesen.";
            }
            if(!empty($value)){
                if(provjeriZnakove($value)){
                    $greska[]="$key sadrži nedozvoljene znakove '!?#";
                }
                if ($key == "ime") {
                    if(!provjeriBrojZnakova ($value,2,30)){
                        $greska[]="$key treba imati (2-30) znakova ";
                    }
                }
                if ($key == "prezime") {
                    if(!provjeriBrojZnakova ($value,2,40)){
                        $greska[]="$key treba imati (2-40) znakova";
                    }
                }
                if ($key == "korisnicko_ime") {
                    if(!provjeriBrojZnakova ($value,5,12)){
                        $greska[]="$key treba imati (5-12) znakova";
                    }
                }
                if($key=="korisnicko_ime"){
                    $veza = new Baza();
                    $veza->spojiDB();
                    $sql = "SELECT COUNT( idkorisnik) FROM korisnik WHERE korime='$value' ";
                    $rezultat = $veza->selectDB($sql);
                    while ($red = mysqli_fetch_array($rezultat)) {
                        if ($red["COUNT( idkorisnik)"] >= 1){
                            //vec postoji
                            $greska[]="$key vec postoji odaberite neko drugo";
                        }
                    }
                    $veza->zatvoriDB();
                }//IDE NA KLIJENTA AJAX

                if ($key == "password") {
                    $pomPamtiLozinku = $value;
                }
                if ($key == "password") {
                    if(!provjeriBrojZnakova ($value,5,15)){
                        $greska[]="$key treba imati (5-15) znakova";
                    }
                }
                if ($key == "confirmpassword") {
                    if ($value != $pomPamtiLozinku) {
                        $greska[]= "Lozinka i potvrda lozinke se ne podudaraju";
                    }
                }
        }
    }
        if(empty($greska)){
            $kriptiranoRezultat = posoli($_POST["password"]);//registracija?
            $lozinkaPrava=$kriptiranoRezultat['kriptiranaLozinka'];
            $sol=$kriptiranoRezultat['sol'];
            $ime=$_POST["ime"];
            $prez=$_POST["prezime"];
            $kori=$_POST["korisnicko_ime"];
            $pas=$_POST["password"];
            $posta=$_POST["email"];
            $adresa=$_POST["adresa_registracija"];
            $vrijemeRegistracije=date("Y-m-d H:i:s");
            $aktivacijskiKod=generirajKod();
            $veza = new Baza();
            $veza->spojiDB();
            $sql = "INSERT INTO korisnik (lozinka_nekriptirano , lozinka , ime , prezime , email , adresa ,sol,korime,aktivacijski_token,link_aktiviranje_vrijeme_slanja) VALUES (";
            $sql.="'$pas',";
            $sql.="'$lozinkaPrava',";
            $sql.="'$ime',";
            $sql.="'$prez',";
            $sql.="'$posta',";
            $sql.="'$adresa',";
            $sql.="'$sol',";
            $sql.="'$kori',";
            $sql.="'$aktivacijskiKod',";
            $sql.="'$vrijemeRegistracije');";
            //echo $sql;
            $veza->updateDB($sql);
            $veza->zatvoriDB();
            if(dohvatiTrajanjeAktivacijskogKoda() ){
                $vrijemeTrajanjaAktivacijskogKoda = dohvatiTrajanjeAktivacijskogKoda();
            }else{
                $vrijemeTrajanjaAktivacijskogKoda = 0;
            }
             //PREUZETI PODATAK IZ BAZE/KONSTANTI
            $KodVrijediDo = date("Y-m-d H:i:s", strtotime("+$vrijemeTrajanjaAktivacijskogKoda hours", strtotime($vrijemeRegistracije)));
            posaljiMail($aktivacijskiKod,$KodVrijediDo,$ime,$posta,$vrijemeRegistracije,$kori);
            //POSLATI MAIL S AKTIVACIJSKIM LINKOM
            header("Location: prijavaRegistracija.php?mod=prijava");
        }
         
    }
    function dohvatiTrajanjeAktivacijskogKoda(){
        $veza = new Baza();
        $veza->spojiDB();
        $sql = "SELECT link_za_aktivaciju_trajanje_sati FROM konfiguracija_sustava where aktivna=1;";
        $rezultat = $veza->selectDB($sql);
        if($rezultat!=null){
            while ($red = mysqli_fetch_array($rezultat)) {
                $TrajeSati=$red["link_za_aktivaciju_trajanje_sati"];
            }
        }
        $veza->zatvoriDB();
        return $TrajeSati;
    }
    function provjeriZnakove ($inp){
        $patZnk = "/['!?#]+/";
        if (preg_match($patZnk, $inp)){
            return true;
        }
        else{
            return false;
        }
    }
    
    function provjeriMail ($inp){
        $patFormat = "/^[^\.]([A-Z]*[a-z]*[0-9]*)*\.?([A-Z]*[a-z]*[0-9]*)*@([A-Z]*[a-z]*[0-9]*)*\.([A-Z]|[a-z]){2,}$/";
        $patVelicina = "/^.{10,30}$/";
        if (preg_match($patFormat, $inp)&&preg_match($patVelicina, $inp)){
            return true;
        }
        else{
            return false;
        }
    }
    function provjeriBrojZnakova ($inp,$od,$do){
        $patVelicina = "/^.{".$od.","."$do}$/";
        if (preg_match($patVelicina, $inp)){
            return true;
        }
        else{
            return false;
        }
    }
    function posoli($inp){
        $posoljeno=[];
        $posoljeno['sol']=sha1(time() );
        $posoljeno['kriptiranaLozinka']=sha1($posoljeno['sol']."--".$inp);
        return $posoljeno;   
    }
    function provjeriLozinku($sol,$inpNovi,$inputBaza){
        if(sha1($sol."--".$inpNovi)==$inputBaza){
            return true;
        }
        else{
            return false;
        } 
    }
    function generirajKod(){
        $Kod=rand(0,9).chr(rand(65,90)).rand(0,9).chr(rand(65,90));
        return $Kod;
    }
    function posaljiMail($AK,$DO,$imeK,$posaljiNa,$t,$id){
        try{
        /*the message
        $msg = "Zahvaljujemo se na registraciji na našu stranicu $imeK! \nVaš aktivacijski kod je: $AK";
        $msg.="\nKod vrijedi do $DO .\n";
        $msg.="\nAktivacija se provodi prilikom prve prijave.\n";
        $msg.="\nLP,\nKalelarga\n";
        // use wordwrap() if lines are longer than 70 characters*/
        //id je korime da ne dohvacam iz baze
        $msg = "<p>Zahvaljujemo se na registraciji na našu stranicu $imeK! \nZa aktivaciju kliknite na link:</p>";
        $msg.="<p>\n\nLink vrijedi do $DO .\n</p>";
        $msg.="<p><a href=\"http://barka.foi.hr/WebDiP/2017_projekti/WebDiP2017x031/prijavaRegistracija.php?mod=aktivacija?akkod=$AK?akid=$id?akt=$t\">AKTIVIRAJ</a></p>";
        $msg.="\nLP,\nKalelarga\n";
        $msg = wordwrap($msg,70);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // send email
        //TO DO STAVITI OVO UMJESTO DEFAFULTA MOG $posaljiNa
        mail($posaljiNa,"Aktivacijski Kod",$msg,$headers);
        //mail("jelenacuka@hotmail.com","Aktivacijski Kod",$msg,$headers);  
        }catch(Exception $e){
            
        }
        
    }
        function posaljiMailNovaLozinka($novaLoz,$mailposalji){
        try{
        $msg="<p>Poštovani,</p>";
        $msg.="<p>Vaša nova lozinka je:$novaLoz </p>";
        $msg.="\nLP,\nKalelarga\n";
        $msg = wordwrap($msg,70);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($mailposalji,"Nova lozinka",$msg,$headers);
        }catch(Exception $e){
            
        }
    }
    if(isset($_COOKIE["zadnja_prijava"])) {
        $kolacicKorime=$_COOKIE["zadnja_prijava"];
    } else {
        $kolacicKorime="";
    }
    //$rezSoli=posoli('lozinka3');
    //echo provjeriLozinku($rezSoli['sol'],'lozinka3',$rezSoli['kriptiranaLozinka']);
    $smarty->assign('uspjesnaPrijava', $uspjesnaPrijava);
    $smarty->assign('greska', $greska);
    $smarty->assign('aktivnaSkriptaP',$_SERVER["PHP_SELF"]. "?mod=prijava");
    $smarty->assign('aktivnaSkriptaR',$_SERVER["PHP_SELF"]."?mod=registracija");
    $smarty->assign('porukaAktivacije',$porukaAktivacije);
    $smarty->assign('kolacicKorime',$kolacicKorime);
    if(!empty($odreziParametar)){$smarty->assign('odreziParametar',$odreziParametar);}else{$smarty->assign('odreziParametar',"");}
    $smarty->display('templates/prijavaRegistracija.tpl');
    $smarty->display('templates/footer.tpl');
?>