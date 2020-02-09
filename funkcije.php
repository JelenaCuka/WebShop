<?php
include_once 'sesija.class.php';
include_once 'baza.class.php';
class Pozicija { 
    public $idpozicija_oglasa = '';
    public $idlokacija = ''; 
    public $idstranica='';
    public $dimenzija_oglasa_sirina='';
    public $dimenzija_oglasa_visina='';
    public $moderator_pozicije_id='';
    public $moderator='';
    public $lokacija='';
    public $stranica='';
    
    public function __construct($i,$l,$s,$ds,$dv,$m,$kor,$broj,$url) {
        $this->idpozicija_oglasa=$i;
        $this->idlokacija =$l;
        $this->idstranica =$s;
        $this->dimenzija_oglasa_sirina =$ds;
        $this->dimenzija_oglasa_visina=$dv;
        $this->moderator_pozicije_id =$m;
        $this->moderator =$kor;
        $this->lokacija =$broj;
        $this->stranica =$url;
    }
    public function getidpozicija_oglasa() {
        return $this->idpozicija_oglasa;
    }
    public function getidlokacija() {
        return $this->idlokacija;
    }
    public function getidstranica() {
        return $this->idstranica;
    }
    public function getdimenzija_oglasa_sirina() {
        return $this->dimenzija_oglasa_sirina;
    }
    public function getdimenzija_oglasa_visina() {
        return $this->dimenzija_oglasa_visina;
    }
    public function getmoderator_pozicije_id() {
        return $this->moderator_pozicije_id;
    }
    public function getmoderator() {
        return $this->moderator;
    }
    public function getlokacija() {
        return $this->lokacija;
    }
    public function getstranica() {
        return $this->stranica;
    }
}
class Oglas { 
    public $idoglas = '';
    public $naziv = ''; 
    public $opis='';
    public $url_web_stranica_otvori='';
    public $slika='';
    public $broj_klikova = '';
    public $početak_prikazivanja = ''; 
    public $kraj_prikazivanja='';
    public $status_potvrdenosti='';
    public $status_aktivnosti = '';
    public $idkorisnik = ''; 
    public $vrsta_oglasa_id='';
    public function __construct($i,$n,$o,$u,$slika,$bk,$pp,$kp,$sp,$sa,$ik,$vo) {
        $this->idoglas=$i;
        $this->naziv =$n;
        $this->opis =$o;
        $this->url_web_stranica_otvori =$u;
        $this->slika =$slika;
        $this->broj_klikova=$bk;
        $this->pocetak_prikazivanja =$pp;
        $this->kraj_prikazivanja =$kp;
        $this->status_potvrdenosti =$sp;
        $this->status_aktivnosti=$sa;
        $this->idkorisnik =$ik;
        $this->vrsta_oglasa_id =$vo;
    }
    public function getidoglas() {
        return $this->idoglas;
    }
    public function getnaziv() {
        return $this->naziv;
    }
    public function getopis() {
        return $this->opis;
    }
    public function geturl_web_stranica_otvori() {
        return $this->url_web_stranica_otvori;
    }
    public function getslika() {
        return $this->slika;
    }
    public function getbroj_klikova() {
        return $this->broj_klikova;
    }
    public function getpocetak_prikazivanja() {
        return $this->pocetak_prikazivanja;
    }
    public function getkraj_prikazivanja() {
        return $this->kraj_prikazivanja;
    }
    public function getstatus_potvrdenosti() {
        return $this->status_potvrdenosti;
    }
    public function getstatus_aktivnosti() {
        return $this->status_aktivnosti;
    }
    public function getidkorisnik() {
        return $this->idkorisnik;
    }
    public function getvrsta_oglasa_id() {
        return $this->vrsta_oglasa_id;
    }

}
class Lokacija { 
    public $idlokacija = '';
    public $broj = ''; 
    public $idstranica='';
    public $url='';
    public function __construct($i,$b,$s,$u) {
        $this->idlokacija=$i;
        $this->broj =$b;
        $this->idstranica =$s;
        $this->url =$u;
    }
    public function getidlokacija() {
        return $this->idlokacija;
    }
    public function getbroj() {
        return $this->broj;
    }
    public function getidstranica() {
        return $this->idstranica;
    }
    public function geturl() {
        return $this->url;
    }
    public function setidlokacija($l) {
        $this->idlokacija=$l;
    }
    public function setbroj($b) {
        $this->broj=$b;
    }
    public function setidstranica($s) {
        $this->idstranica=$s;
    }
    public function seturl($u) {
        $this->url=$u;
    }
}
class Stranica { 
    public $idstranica = '';
    public $url = ''; 
    public $lokacije='';
    public function __construct($i,$u) {
        $this->idstranica=$i;
        $this->url =$u;
        
        $sql="SELECT l.idlokacija,l.broj,l.idstranica,s.url FROM lokacija l LEFT JOIN stranica s on l.idstranica=s.idstranica WHERE l.idstranica=$i;";
            $veza = new Baza();
            $veza->spojiDB();
            $rez = $veza->selectDB($sql);
            $prikaz = array();
            if ($rez != null) {
                while (list($idlokacija,$broj,$idstranica,$url) = $rez->fetch_array()) {
                    //tu inicijaliziram objekt? i njega dodam u array??hmm
                    $prikaz[] = new Lokacija($idlokacija,$broj,$idstranica,$url);
                }
            }
            $veza->zatvoriDB();
        if(!empty($prikaz))$this->lokacije=$prikaz;
    }
    public function getStranicaId() {
        return $this->idstranica;
    }
    public function getUrl() {
        return $this->url;
    }
    public function getLokacije() {
        return $this->lokacije;
    }
    public function setLokacije() {
            $sql="SELECT l.idlokacija,l.broj,l.idstranica,s.url FROM lokacija l LEFT JOIN stranica s on l.idstranica=s.idstranica WHERE l.idstranica=$this->idstranica;";
            $veza = new Baza();
            $veza->spojiDB();
            $rez = $veza->selectDB($sql);
            $prikaz = array();
            if ($rez != null) {
                while (list($idlokacija,$broj,$idstranica,$url) = $rez->fetch_array()) {
                    //tu inicijaliziram objekt? i njega dodam u array??hmm
                    $prikaz[] = new Lokacija($idlokacija,$broj,$idstranica,$url);
                }
            }
            $veza->zatvoriDB();
            if(!empty($prikaz))$this->lokacije=$prikaz;
            
    }
}
class Racun { 
    public $idracun = '';
    public $datum = ''; 
    public $vrijeme='';
    public $cijena_ukupno='';
    public $idnarudzba='';
    public $narudzba='';
    public function __construct($i) {
        $sqlracun="SELECT r.idracun,r.datum,r.vrijeme,r.cijena_ukupno,r.idnarudzba FROM racun r WHERE r.idnarudzba=$i;";
        $veza = new Baza();
            $veza->spojiDB();
            $rez = $veza->selectDB($sqlracun);
            $prikaz = "";
            if ($rez != null) {
                while (list($ir,$d,$v,$cu,$idn) = $rez->fetch_array()) {
                    $this->idracun=$ir;
                    $this->datum =$d;
                    $this->vrijeme =$v;
                    $this->cijena_ukupno =$cu;
                    $this->idnarudzba =$idn;
                }
            }
            $veza->zatvoriDB();
        
            $upit="SELECT n.idnarudzba,n.ime,n.prezime,n.adresa,n.status_potvrde,n.idkorisnik from narudzba n LEFT JOIN korisnik k ON k.idkorisnik=n.idkorisnik WHERE n.idnarudzba=$i;";
            $veza = new Baza();
            $veza->spojiDB();
            $rez = $veza->selectDB($upit);
            $prikaz = "";
            if ($rez != null) {
                while (list($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik) = $rez->fetch_array()) {
                    $prikaz = new Narudba($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik);
                    $prikaz->setPredmeti();
                    $prikaz->setIznos();
                    $this->narudzba =$prikaz;
                }
            }
            $veza->zatvoriDB();
    }
    public function getidracun() {
        return $this->idracun;
    }
    public function getdatum() {
        return $this->datum;
    }
    public function getvrijeme() {
        return $this->vrijeme;
    }
    public function getcijena_ukupno() {
        return $this->cijena_ukupno;
    }
    public function getidnarudzba() {
        return $this->idnarudzba;
    }
    public function getnarudzba() {
        return $this->narudzba;
    }
}
class Kategorija { 
    public $idkategorija_predmeta = '';
    public $naziv = ''; 
    public $moderatori='';
    public function __construct($i,$k,$m=array()) {
        $this->idkategorija_predmeta=$i;
        $this->naziv =$k;
        $this->moderatori =$m;

    }
    public function getKategorijaId() {
        return $this->idkategorija_predmeta;
    }
    public function getKategorija() {
        return $this->naziv;
    }
    public function getModeratori() {
        return $this->moderatori;
    }
    public function setModeratori() {
            $sql="SELECT k.idkorisnik , k.lozinka_nekriptirano ,k.ime , k.prezime , k.email , k.adresa , k.status_racun_aktivan , k.pristup_zakljucan,k.idtip_korisnika,tip_korisnika.naziv, k.korime,k.neuspjesne_prijave FROM korisnik k LEFT JOIN tip_korisnika on k.idtip_korisnika= tip_korisnika.idtip_korisnika LEFT JOIN moderatorKategorije mk on k.idkorisnik=mk.idkorisnik LEFT JOIN kategorija_predmeta on kategorija_predmeta.idkategorija_predmeta=mk.idkategorija_predmeta  WHERE  mk.idkategorija_predmeta=$this->idkategorija_predmeta;";
            $veza = new Baza();
            $veza->spojiDB();
            $rez = $veza->selectDB($sql);
            $prikaz = array();
            if ($rez != null) {
                while (list($idkorisnik,$lozinka,$ime,$prezime,$email,$adresa,$status_racun_aktivan,$pristup_zakljucan,$idtip_korisnika,$tip_korisnika,$korime,$neuspjesne_prijave) = $rez->fetch_array()) {
                    //tu inicijaliziram objekt? i njega dodam u array??hmm
                    $prikaz[] = new Korisnik($idkorisnik,$lozinka,$ime,$prezime,$email,$adresa,$status_racun_aktivan,$pristup_zakljucan,$idtip_korisnika,$tip_korisnika,$korime,$neuspjesne_prijave);
                }
            }
            $veza->zatvoriDB();
            if(!empty($prikaz))$this->moderatori=$prikaz;
    }
}
class Tip { 
    public $idtip_korisnika = '';
    public $naziv = ''; 
    public function __construct($i,$t) {
        $this->idtip_korisnika=$i;
        $this->naziv =$t;

    }
    public function getTipId() {
        return $this->idtip_korisnika;
    }
    public function getTip() {
        return $this->naziv;
    }
}
class Konfiguracija { 
    public $idkonfiguracija_sustava;
    public $trajanje_kolacica;
    public $stranicenje_broj_zapisa ;
    public $virtualni_pomak_vremena ; 
    public $trajanje_sesije_max ; 
    public $neispravna_prijava_broj_max;
    public $link_za_aktivaciju_trajanje_sati;
    public $broj_top_korisnika ;
    public $prikazi_statistiku_od;
    public $prikazi_statistiku_do;
    public $aktivna;
    
    
    public function __construct($i,$t,$s,$vp,$tsm,$nsm,$lat,$btk,$so,$sd,$a) {
        $this->idkonfiguracija_sustava=$i;
        $this->trajanje_kolacica =$t;
        $this->stranicenje_broj_zapisa =$s;
        $this->virtualni_pomak_vremena =$vp;
        $this->trajanje_sesije_max =$tsm;
        $this->neispravna_prijava_broj_max=$nsm;
        $this->link_za_aktivaciju_trajanje_sati=$lat;
        $this->broj_top_korisnika =$btk;
        $this->prikazi_statistiku_od =$so;
        $this->prikazi_statistiku_do =$sd;
        $this->aktivna =$a;
    }
    public function postaviVrijednosti($i,$t,$s,$vp,$tsm,$nsm,$lat,$btk,$so,$sd,$a) {
        $this->idkonfiguracija_sustava=$i;
        $this->trajanje_kolacica =$t;
        $this->stranicenje_broj_zapisa =$s;
        $this->virtualni_pomak_vremena =$vp;
        $this->trajanje_sesije_max =$tsm;
        $this->neispravna_prijava_broj_max=$nsm;
        $this->link_za_aktivaciju_trajanje_sati=$lat;
        $this->broj_top_korisnika =$btk;
        $this->prikazi_statistiku_od =$so;
        $this->prikazi_statistiku_do =$sd;
        $this->aktivna =$a;
    }
    public function getNeispravna_prijava_broj_max() {
        return $this->neispravna_prijava_broj_max;
    }

}

class Korisnik { 
    public $idkorisnik = ''; 
    public $lozinka = ''; 
    public $ime = ''; 
    public $prezime = ''; 
    public $email = ''; 
    public $adresa = ''; 
    public $status_racun_aktivan = '';
    public $pristup_zakljucan = '';
    public $idtip_korisnika = '';
    public $tip_korisnika = '';
    public $korime = '';
    public $neuspjesne_prijave = '';
    
    
    public function __construct($idkorisnik,$lozinka,$ime,$prezime,$email,$adresa,$status_racun_aktivan,$pristup_zakljucan,$idtip_korisnika,$tip_korisnika,$korime,$neuspjesne_prijave) {
        $this->idkorisnik=$idkorisnik;
        $this->lozinka =$lozinka;
        $this->ime=$ime;
        $this->prezime =$prezime;
        $this->email=$email;
        $this->adresa =$adresa;
        $this->status_racun_aktivan=$status_racun_aktivan;
        $this->pristup_zakljucan =$pristup_zakljucan;
        $this->idtip_korisnika=$idtip_korisnika;
        $this->tip_korisnika =$tip_korisnika;
        $this->korime=$korime;
        $this->neuspjesne_prijave =$neuspjesne_prijave;
    }
    public function getidkorisnik() {
        return $this->idkorisnik;
    }
    public function getlozinka() {
        return $this->lozinka;
    }
    public function getime() {
        return $this->ime;
    }
    public function getprezime() {
        return $this->prezime;
    }
    public function getemail() {
        return $this->email;
    }
    public function getadresa() {
        return $this->adresa;
    }
    public function getstatus_racun_aktivan() {
        return $this->status_racun_aktivan;
    }
    public function getpristup_zakljucan() {
        return $this->pristup_zakljucan;
    }
    public function getidtip_korisnika() {
        return $this->idtip_korisnika;
    }
    public function gettip_korisnika() {
        return $this->tip_korisnika;
    }
    public function getkorime() {
        return $this->korime;
    }
    public function getneuspjesne_prijave() {
        return $this->neuspjesne_prijave;
    }
    public function dohvatiKorisnike($idkorisnik,$lozinka,$ime,$prezime,$email,$adresa,$status_racun_aktivan,$pristup_zakljucan,$idtip_korisnika,$tip_korisnika,$korime,$neuspjesne_prijave){

            $this->idkorisnik=$idkorisnik;
            $this->lozinka =$lozinka;
            $this->ime=$ime;
            $this->prezime =$prezime;
            $this->email=$email;
            $this->adresa =$adresa;
            $this->status_racun_aktivan=$status_racun_aktivan;
            $this->pristup_zakljucan =$pristup_zakljucan;
            $this->idtip_korisnika=$idtip_korisnika;
            $this->tip_korisnika =$tip_korisnika;
            $this->korime=$korime;
            $this->neuspjesne_prijave =$neuspjesne_prijave;
        
    }
} 
 
class Narudba { 
    public $id = '';
    public $ime = ''; 
    public $prezime = ''; 
    public $adresa = '';
    public $status_potvrde = '';
    public $idkorisnik = '';
    public $predmeti = array();
    public $iznoSKUNE = 0;
    
    
    
    public function __construct($i,$ime,$prez,$adr,$sta,$idKor,$predm=array()) {
        $this->id=$i;
        $this->ime =$ime;
        $this->prezime =$prez;
        $this->adresa =$adr;
        $this->status_potvrde =$sta;
        $this->idkorisnik =$idKor;
        $this->predmeti =$predm;
    }
    public function getId() {
        return $this->id;
    }
    public function getIme() {
        return $this->ime;
    }
    public function getPrezime() {
        return $this->prezime;
    }
    public function getAdresa() {
        return $this->adresa;
    }
    public function getStatus() {
        return $this->status_potvrde;
    }
    public function getKorisnikID() {
        return $this->idkorisnik;
    }
    public function getPredmeti() {
                return $this->predmeti;
    }
    
    public function setPredmeti($predm=array()) {
            $n=$this->id;
            $upit="SELECT p.idpredmet,p.naziv,p.opis,p.cijena,p.idkategorija_predmeta,a.iznos_popusta, np.kolicina FROM narudzba_predmet np LEFT JOIN   predmet p on np.predmet_idpredmet=p.idpredmet  LEFT JOIN akcija a on p.idpredmet=a.idpredmet WHERE np.narudzba_idnarudzba=$n ;";
            $veza = new Baza();
            $veza->spojiDB();
            $rez = $veza->selectDB($upit);
            $prikaz = array();
            if ($rez != null) {
                while (list($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta,$iznos_popusta,$kolicina) = $rez->fetch_array()) {
                    //tu inicijaliziram objekt? i njega dodam u array??hmm
                    $prikaz[] = new Predmet($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta,$iznos_popusta,$kolicina);
                }
            }
            $veza->zatvoriDB();
            if(!empty($prikaz)){
                $this->predmeti=$prikaz;
            }else{
                $this->predmeti=$predm;
            }
    }
    //public function setIznos($dodaj=0.0) {
    public function setIznos() {
        foreach ($this->predmeti as $key => $value) {
            $this->iznoSKUNE+=$value->IzracunajCijenu();
        }
    }
    public function getIznos() {
       return $this->iznoSKUNE;
    }

} 
class Predmet { 
    public $id = '';
    public $naziv = ''; 
    public $opis = ''; 
    public $cijena = ''; 
    public $kategorija = ''; 
    public $akcija = '';
    public $kolicina=1;
    
    public function __construct($i,$n,$o,$c,$k,$a="",$kol=1) {
        $this->id=$i;
        $this->naziv =$n;
        $this->opis =$o;
        $this->cijena =$c;
        $this->kategorija =$k;
        $this->akcija =$a;
        $this->kolicina =$kol;
    }
    public function getId() {
        return $this->id;
    }
    public function getNaziv() {
        return $this->naziv;
    }
    public function getOpis() {
        return $this->opis;
    }
    public function getCijena() {
        return $this->cijena;
    }
    public function getKategorijaPredmeta() {
        return $this->kategorija;
    }
    public function getAkcija() {
        return $this->akcija;
    }
    public function getKolicina() {
        return $this->kolicina;
    }
    public function IzracunajCijenu($kolicinaPre=1) {
        if(!empty($this->akcija)){     
            return $this->kolicina*(doubleval($this->cijena))-doubleval($this->akcija)*doubleval($this->cijena)*$this->kolicina;
        }
        else{
            return $this->kolicina*doubleval($this->cijena);
        } 
    }

} 
class VrstaOglasa { 
    public $idvrsta_oglasa = '';
    public $naziv = ''; 
    public $brzina_izmjene_sec='';
    public $duljina_trajanja_prikazivanja_h='';
    public $cijena = '';
    public $pozicija_oglasa_id = ''; 
    public $pozicija_oglasa_idlokacija='';
    public $pozicija_oglasa_idstranica='';
    public $dimenzija_oglasa_sirina = '';
    public $dimenzija_oglasa_visina = ''; 
    public $broj='';
    public $url='';
    public function __construct($i,$n,$bis,$bth,$c,$poid,$polid,$posid,$Ds,$Dv,$brL,$u) {
        $this->idvrsta_oglasa=$i;
        $this->naziv =$n;
        $this->brzina_izmjene_sec =$bis;
        $this->duljina_trajanja_prikazivanja_h =$bth;
        $this->cijena=$c;
        $this->pozicija_oglasa_id =$poid;
        $this->pozicija_oglasa_idlokacija =$polid;
        $this->pozicija_oglasa_idstranica =$posid;
        $this->dimenzija_oglasa_sirina=$Ds;
        $this->dimenzija_oglasa_visina =$Dv;
        $this->broj =$brL;
        $this->url =$u;
        
    }
    public function getidvrsta_oglasa() {
        return $this->idvrsta_oglasa;
    }
    public function getnaziv() {
        return $this->naziv;
    }
    public function getbrzina_izmjene_sec() {
        return $this->brzina_izmjene_sec;
    }
    public function getduljina_trajanja_prikazivanja_h() {
        return $this->duljina_trajanja_prikazivanja_h;
    }
    public function getcijena() {
        return $this->cijena;
    }
    public function pozicija_oglasa_id() {
        return $this->pozicija_oglasa_id;
    }
    public function getpozicija_oglasa_idlokacija() {
        return $this->pozicija_oglasa_idlokacija;
    }
    public function getpozicija_oglasa_idstranica() {
        return $this->pozicija_oglasa_idstranica;
    }
    public function getdimenzija_oglasa_sirina() {
        return $this->dimenzija_oglasa_sirina;
    }
    public function getdimenzija_oglasa_visina() {
        return $this->dimenzija_oglasa_visina;
    }
    public function getbroj() {
        return $this->broj;
    }
    public function geturl() {
        return $this->url;
    }


}

function dohvatiKorime() {
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB("SELECT korime, lozinka_nekriptirano ,tk.naziv as 'tip',prezime , ime ,  email      FROM korisnik LEFT JOIN tip_korisnika tk ON korisnik.idtip_korisnika = tk.idtip_korisnika ;");
    $prikaz = array();
    if ($rez != null) {
        while ($red = $rez->fetch_assoc()) {
            $prikaz[] = $red;
        }
    }
    $veza->zatvoriDB();
    return $prikaz;
}
function dohvatKategorije(){
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB("SELECT idkategorija_predmeta, naziv FROM kategorija_predmeta;");
    $prikaz = array();
    if ($rez != null) {
        while (list($id,$kategorija) = $rez->fetch_array()) {
            $novi=new Kategorija($id, $kategorija);
            $novi->setModeratori();
            $prikaz[] = $novi;
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz;
}
function dohvatKategorijeModerator(){
    $veza = new Baza();
    $veza->spojiDB();
    if(Sesija::dajKorisnika()){
    $kor=Sesija::dajKorisnika();
    $korimeM=$kor["korisnik"];}else{$korimeM="";}
    $sql="SELECT kp.idkategorija_predmeta, kp.naziv FROM kategorija_predmeta kp LEFT JOIN moderatorKategorije mk on kp.idkategorija_predmeta=mk.idkategorija_predmeta LEFT JOIN korisnik k on mk.idkorisnik=k.idkorisnik WHERE k.korime='$korimeM' ;";
    $rez = $veza->selectDB($sql);
    $prikaz = array();
    if ($rez != null) {
        while (list($id,$kategorija) = $rez->fetch_array()) {
            $novi=new Kategorija($id, $kategorija);
            //$novi->setModeratori();
            $prikaz[] = $novi;
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz;
}
function dohvatTipovi(){
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB("SELECT idtip_korisnika,naziv FROM tip_korisnika;;");
    $prikaz = array();
    if ($rez != null) {
        while (list($id,$tip) = $rez->fetch_array()) {
            $prikaz[] = new Tip($id, $tip);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz;
}
function dohvatiPredmete($k){
    $upit="SELECT p.idpredmet,p.naziv,p.opis,p.cijena,p.idkategorija_predmeta,a.iznos_popusta FROM predmet p LEFT JOIN akcija a on p.idpredmet=a.idpredmet WHERE p.idkategorija_predmeta=$k AND CURDATE( ) BETWEEN a.od AND a.do ;";
    $upitNisuNaAkciji="SELECT p.idpredmet,p.naziv,p.opis,p.cijena,p.idkategorija_predmeta FROM predmet p WHERE p.idkategorija_predmeta=$k AND p.idpredmet NOT IN ( SELECT p.idpredmet FROM predmet p LEFT JOIN akcija a ON p.idpredmet = a.idpredmet WHERE CURDATE( ) BETWEEN a.od AND a.do ) ;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    $prikaz = array();
    if ($rez != null) {
        while (list($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta,$iznos_popusta) = $rez->fetch_array()) {
            $prikaz[] = new Predmet($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta,$iznos_popusta);
        }
    }
    $rez = $veza->selectDB($upitNisuNaAkciji);
    if ($rez != null) {
        while (list($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta) = $rez->fetch_array()) {
            $prikaz[] = new Predmet($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
}
function dohvatiPredmeteNazivFilter($n){
    $n=strtolower($n);
    $upit="SELECT p.idpredmet,p.naziv,p.opis,p.cijena,p.idkategorija_predmeta,a.iznos_popusta FROM predmet p LEFT JOIN akcija a on p.idpredmet=a.idpredmet WHERE LOWER(p.naziv) LIKE '%$n%' ;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    $prikaz = array();
    if ($rez != null) {
        while (list($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta,$iznos_popusta) = $rez->fetch_array()) {
            $prikaz[] = new Predmet($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta,$iznos_popusta);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
}
function dodajUKosaricu($proizvodiK){
    //"predmet"
    if($proizvodiK!=null&&$proizvodiK!=""){
        if(Sesija::dajKosaricu()){
            $kosaRica=Sesija::dajKosaricu();
            if(!empty($kosaRica)){
                for($i=0;$i<sizeof($proizvodiK);$i++){
                    $nije=true;
                    foreach($kosaRica as $k=>$v){
                        if(($kosaRica[$k]["predmet"]===$proizvodiK[$i]["predmet"])){
                            $nije=false;
                        }
                    }
                    if($nije){
                        $kosaRica[]=$proizvodiK[$i];
                    }
                }
                
            }
            Sesija::kreirajKosaricu($kosaRica);
        }else{
            $nova= array();
            for($i=0;$i<sizeof($proizvodiK);$i++){
                $nova[]=$proizvodiK[$i];
            }
            Sesija::kreirajKosaricu($nova);
        }
    }
}
function dohvatiPredmeteNarudzba($p){
    $trenutniPredmet=$p["predmet"];
    $trenutniPredmetKol=$p["kolicina"];
    $upit="SELECT p.idpredmet,p.naziv,p.opis,p.cijena,p.idkategorija_predmeta,a.iznos_popusta FROM predmet p LEFT JOIN akcija a on p.idpredmet=a.idpredmet WHERE p.idpredmet=$trenutniPredmet;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    $prikaz;
    if ($rez != null) {
        while (list($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta,$iznos_popusta) = $rez->fetch_array()) {
            $prikaz = new Predmet($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta,$iznos_popusta,intval($trenutniPredmetKol));
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
}
function sumaNarudzbe($predmeti){
    $suma=0;
    if (!empty($predmeti)) {
        foreach ($predmeti as $key => $value) {
            $suma += $value->IzracunajCijenu();
        }
    }
    return $suma;
}
function dohvatiNarudbe(){
    $upit="SELECT idnarudzba,ime,prezime,adresa,status_potvrde,idkorisnik from narudzba;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    $prikaz = array();
    if ($rez != null) {
        while (list($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik) = $rez->fetch_array()) {
            $prikaz[] = new Narudba($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
}
function dohvatiNarudbeAnonimni(){
    $upit="SELECT idnarudzba,ime,prezime,adresa,status_potvrde,idkorisnik from narudzba WHERE idkorisnik IS NULL;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    $prikaz = array();
    if ($rez != null) {
        while (list($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik) = $rez->fetch_array()) {
            //tu inicijaliziram objekt? i njega dodam u array??hmm
            $prikaz[] = new Narudba($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
}
function dohvatiNarudbeRegistrirani($korime){
    $upit="SELECT n.idnarudzba,n.ime,n.prezime,n.adresa,n.status_potvrde,n.idkorisnik from narudzba n LEFT JOIN korisnik k ON k.idkorisnik=n.idkorisnik WHERE korime='$korime';";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    $prikaz = array();
    if ($rez != null) {
        while (list($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik) = $rez->fetch_array()) {
            $prikaz[] = new Narudba($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
}
function dohvatiNarudbeModerator(){
    $upit="SELECT idnarudzba,ime,prezime,adresa,status_potvrde,idkorisnik from narudzba;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    $prikaz = array();
    if ($rez != null) {
        while (list($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik) = $rez->fetch_array()) {
            //tu inicijaliziram objekt? i njega dodam u array??hmm
            $prikaz[] = new Narudba($idnarudzba,$ime,$prezime,$adresa,$status_potvrde,$idkorisnik);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
}
function dohvatiSamoNazivPredmeta($id){
    $upit="SELECT naziv FROM predmet WHERE idpredmet=$id ;";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    $naziv = "";
    if ($rez != null) {
        $naziv=$rez->fetch_array();
    }
    $veza->zatvoriDB();
    if(!empty($naziv))return $naziv["naziv"]; 
}
function dohvatiLokacije($stranicaTrenutna) {
            $sql="SELECT l.idlokacija,l.broj,l.idstranica,s.url FROM lokacija l LEFT JOIN stranica s on l.idstranica=s.idstranica WHERE l.idstranica=$stranicaTrenutna;";
            $veza = new Baza();
            $veza->spojiDB();
            $rez = $veza->selectDB($sql);
            $prikaz = array();
            if ($rez != null) {
                while (list($idlokacija,$broj,$idstranica,$url) = $rez->fetch_array()) {
                    //tu inicijaliziram objekt? i njega dodam u array??hmm
                    $prikaz[] = new Lokacija($idlokacija,$broj,$idstranica,$url);
                }
            }
            $veza->zatvoriDB();
            if(!empty($prikaz)) return $prikaz;
    }
    function dohvatiPredmeteModeratorKategorije(){
    if(Sesija::dajKorisnika()){
    $kor=Sesija::dajKorisnika();
    $korimeM=$kor["korisnik"];}else{$korimeM="";}
    $upit="SELECT p.idpredmet,p.naziv,p.opis,p.cijena,p.idkategorija_predmeta FROM predmet p LEFT JOIN kategorija_predmeta kp on kp.idkategorija_predmeta=p.idkategorija_predmeta LEFT JOIN moderatorKategorije mk on mk.idkategorija_predmeta=kp.idkategorija_predmeta LEFT JOIN korisnik k on k.idkorisnik=mk.idkorisnik WHERE korime='$korimeM';";
    $veza = new Baza();
    $veza->spojiDB();
    $rez = $veza->selectDB($upit);
    $prikaz = array();
    if ($rez != null) {
        while (list($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta) = $rez->fetch_array()) {
            $prikaz[] = new Predmet($idpredmet,$naziv,$opis,$cijena,$idkategorija_predmeta);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
}
 function dohvatiAkrivniOglas($pozicija){
    $veza = new Baza();
    $veza->spojiDB();
    $UPITdohvatiOglas="SELECT o.idoglas,o.naziv,o.opis,o.url_web_stranica_otvori,o.slika,o.broj_klikova,o.početak_prikazivanja,o.kraj_prikazivanja,o.status_potvrdenosti,o.status_aktivnosti,o.idkorisnik,o.vrsta_oglasa_id,vo.cijena FROM oglas o LEFT JOIN vrsta_oglasa vo on vo.idvrsta_oglasa=o.vrsta_oglasa_id LEFT JOIN pozicija_oglasa po on po.idpozicija_oglasa=vo.pozicija_oglasa_id WHERE po.idpozicija_oglasa=$pozicija AND o.status_potvrdenosti=1 AND  NOW() BETWEEN o.početak_prikazivanja AND o.kraj_prikazivanja;";
    //$UPITdohvatiOglas="SELECT o.idoglas,o.naziv,o.opis,o.url_web_stranica_otvori,o.slika,o.broj_klikova,o.početak_prikazivanja,o.kraj_prikazivanja,o.status_potvrdenosti,o.status_aktivnosti,o.idkorisnik,o.vrsta_oglasa_id,vo.cijena FROM oglas o LEFT JOIN vrsta_oglasa vo on vo.idvrsta_oglasa=o.vrsta_oglasa_id LEFT JOIN pozicija_oglasa po on po.idpozicija_oglasa=vo.pozicija_oglasa_id WHERE po.idpozicija_oglasa=$pozicija AND  NOW() BETWEEN o.početak_prikazivanja AND o.kraj_prikazivanja;";
    $rez = $veza->selectDB($UPITdohvatiOglas);
    $prikaz = array();
    if ($rez != null) {
        while (list($i, $n, $o, $u, $slika, $bk, $pp, $kp, $sp, $sa, $ik, $vo) = $rez->fetch_array()) {
            $prikaz[] = new Oglas($i, $n, $o, $u, $slika, $bk, $pp, $kp, $sp, $sa, $ik, $vo);
        }
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz; 
} 
function dohvatiNajmanjuCijenuOglasa($pozicija){
    $veza = new Baza();
    $veza->spojiDB();
    $SQLmin="SELECT MIN( vo.cijena ) FROM vrsta_oglasa vo LEFT JOIN pozicija_oglasa po ON po.idpozicija_oglasa = vo.pozicija_oglasa_id WHERE po.idpozicija_oglasa =$pozicija";
    $rez = $veza->selectDB($SQLmin);
    $prikaz ="";
    if ($rez != null) {
         $prikaz= $rez->fetch_array();
         $prikaz =$prikaz[0];
         //$prikaz =$prikaz["MIN( vo.cijena )"];
    }
    $veza->zatvoriDB();
    if(!empty($prikaz))return $prikaz;
}
?>