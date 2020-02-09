# WebShop

![kalelargaFinal](https://user-images.githubusercontent.com/26230313/74102867-c2baba80-4b47-11ea-85fe-b7fb9a357ed2.png)

Webshop project made while learning web development technologies. (2018) 

Files that contain sensitive data are not uploaded. (eg. database configuration )


# Short description.

This is webshop page. Customers can make orders for products grouped by categories. Product search is enabled. Products can be added to order, product quantity is defined while creating order. 
Customers can see Ads and by clicking on ads links connected with ads are opened. 
Customers can see which products are on discount. 
Registered customers are enabled creating their own Ads, and also can report broken Ads. 
Moderators approve orders. After ordder approval, order bill is created. 
Moderators can view their orders and bills. 
Moderators define products for cactegories  in which they are in chare of.  They can set discounts for choosen time interval. 
For adPositions that moderator moderates , moderator creates ad types. He can also approve or disapprove requests for blocking ads. 
Administrator creates positions and configures system. He also can see statistics. 

# Description (longer, croatian)
U ovoj vitrualnoj trgovini postoje četiri tipa korisnika: anonimni (neregistrirani), registrirani, moderator i administrator. 
        <h3>Anonimni / neregistrirani korisnik</h3>
        Može vidjeti popis kategorija predmeta i odabirom kategorije predmeta dobiva popis
predmeta (posebno su naznačeni oni na akciji) uz mogućnost pretraživanja po nazivu
predmeta.
Odabirom predmeta može kreirati narudžbu. Prilikom naručivanja korisnik mora unijeti ime,
prezime, adresa i količinu.
Predmete koje je pregledavao dodaju se u popis povijesti pregledavanja za trenutno aktivnu
sjednicu (sesiju) anonimnog korištenja.
Vidi aktivne oglase (1-3 po stranici). Ukoliko ima više oglasa za neko mjesto u istom periodu,
oglasi se izmjenjuju ovisno o definiranoj brzinu izmjene za tu vrstu oglasa. Ako za neku
poziciju nema oglasa na tom dijelu prikazuje se informacija „Kupite oglas po cijeni X“. Gdje je
X najniža cijena vrste oglasa na toj poziciji.
Može kliknuti na oglas koji ga vodi na definirano mjesto na webu. Prilikom klika na oglas
uvećava se broj klikova za taj oglas.
Može prevesti (engl. translate) sadržaj stranice na odabrani jezik (npr. engleski, njemački,
francuski, …) koristeći Google Translate API (opcionalno za dodatne bodove).
<h3>Registrirani korisnik</h3>
Ima mogućnost poslati zahtjev za blokiranjem aktivnih oglasa uz obavezno navođenje razloga
(neprimjeren sadržaj, nevažeći url, url ne odgovara slici, …).
Može pregledavati vrste oglasa i kreirati zahtjev za kreiranjem novog oglasa. Prilikom
kreiranja zahtjeva oglasa mora odabrati vrstu oglasa (koju definira moderator) i definirati
naziv, opis, url do stranice na webu koja se otvara klikom na oglas i postavlja sliku oglasa.
Također, definira od kad je oglas aktivan, te na temelju duljine trajanja izračunava se
automatski do kada će se oglas prikazivati.
Vidi popis svojih zahtjeva za oglase u obliku galerije slika i u kojem su trenutno statusu s
mogućnošću ažuriranja istog ako još nije prihvaćen ili odbijen.
Vidi statistiku klikova za svoje oglase koje je moguće filtrirati po vrsti oglasa i sortirati po
broju klikova. Također može definirati vremenski period (od-do) za koji želi vidjeti statistiku.
<h3>Moderator</h3>
Definira predmete (Samsung, iPhone, …) za kategorije za koje je dodijeljen kao moderator sa
količinom i cijenom tog predmeta uz mogućnost definiranja akcije sa postotkom sniženja
cijene i datuma od do kada akcija vrijedi.
 Vidi popis svih narudžbi za koje može potvrditi narudžbu ili pregledati račun. Kod
potvrđivanja narudžbe kreira se račun koji mora sadržavati nužne podatke (datum, vrijeme,
naziv predmeta, količina, cijena, ime, prezime i adresa). Ako je predmet u danom trenutku u
akciji ispostavlja se po akcijskoj cijeni.
 Određuje vrste oglasa za poziciju za koje je zadužen (koje definira administrator), može
definirati više vrsta oglasa po poziciji, a min 2 vrste oglasa po dimenziji (koju definira
administrator). Kod kreiranja vrste oglasa definira trajanje prikazivanja oglasa u satima,
brzinu izmjene oglasa (u sekundama, važno kada ima više od jednog oglasa na nekom mjestu
za isti period), cijenu (koju plaća korisnik kod kreiranja oglasa) i odabire poziciju prikaza
oglasa ukoliko je zadužen za više različitih pozicija.
 Vidi popis zahtjeva za oglašavanjem za oglase na pozicijama za koje je on zadužen te može ih
prihvatiti ili odbiti.
 Vidi popis zahtjeva za blokiranjem oglasa u obliku vremenskog slijeda (engl. timeline) te iste
može blokirati uz automatsko obavještavanje vlasnika oglasa na mail. Ako je oglas blokiran
on se više ne prikazuje.
<h3>Administrator</h3>
Kreira kategorije predmeta (mobiteli, vozila, nekretnine, …) i dodjeljuje moderatore
kategorijama. Jedna kategorija može imati više moderatora. Jedan moderator može
moderirati više kategorijama.
 Definira pozicije prikaza oglasa navođenjem stranice, broj lokacije na stranici i dimenziju
oglasa (širinu i visina oglasa). Stranice moraju fizički postojati i imati definirane lokacije sa
brojevima. Dimenzije oglasa administrator može mijenjati. Prilikom kreiranja pozicije mora
odabrati moderatora koji je za tu poziciju zadužen.
 Vidi statistiku klikova svih oglasa koje može filtrirati po korisniku (vlasniku oglasa). Također
može definirati vremenski period (od-do) za koji želi vidjeti statistiku.
 Vidi statistiku plaćenih (prihvaćenih oglasa) iznosa po vrsti oglasa ili po poziciji prikaza oglasa.
Također može definirati vremenski period (od-do) za koji želi vidjeti statistiku.
Vidi top listu X korisnika sa najviše plaćenih (prihvaćenih oglasa) iznosa. Gdje je X broj za
koliko se korisnika želi prikaz. Također može definirati vremenski period (od-do) za koji želi
vidjeti statistiku.
    </div>
    <div>    
        <h2>Opis projektnog riješenja</h2>
    <div>Za realizaciju projekta koristile su se tehnologije HTML5,CSS3,JQuery,Javascript,AJAX te u potpunosti sustav predložaka Smarty koji omogućava još veće odvajanje strukture od prezentacije </div>
    <h2>Što je Smarty?</h2>
    <div>Smarty – sustav web predložaka koji već dugo vremena koriste profesionalci. Mnogi su ovaj sustav odbacivali jer su ga smatrali nepotrebnim. Zašto onda Smarty? Smarty je PHP klasa koja nudi brzu, promjenjivu i kvalitetnu prezentaciju Vaše web stranice. Omogućava odvajanje dizajna od koda tako što web stranicu radi na principu predložaka pridonoseći na taj način i sugurnosti Vašeg projekta.
Postoji mnoštvo drugih razloga zašto koristiti Smarty:
Vaša web stranica će se učitavati brže! 
Poboljšanje sigurnosti kao rezultat odvajanja aplikacijskog koda od dizajna 
Ubrzani razvoj 
Upravljanje korisničkim dopuštenjima te ciljanom logikom
Efikasnije održavanje Vaše web stranice
Ugrađene funkcije 
Razni društveni plug-inovi i dodaci (izvor:<a class="LinkKlasa">https://www.info-novitas.hr/tehnologija/php-razvojno-okruzenje/smarty-framework/</a>)</div>
        <h2>Smarty datoteke</h2>
        <p>Pozivaju se iz php skripti</p>
        <h3>dokumentacija.tpl</h3>
        <p>Trenutni predložak, sadrži html kod za skriptu dokumentacije</p>
        <h3>footer.tpl</h3>
        <p>Učitava se u svim skriptama, footer za sve stranice</p>
        <h3>header.tpl</h3>
         <p>Zaglavlje za sve stranice, poziva ispis drugačije navigacije po tipovima korisnika</p>
        <h3>index.tpl</h3>
         <p>Predložak za početnu stranicu</p>
        <h3>kategorije.tpl</h3>
         <p>Predložak za kategorije</p>
        <h3>kategorijeRegistracija.tpl</h3>
        <p>Odabir kategorija </p>
        <h3>moderator.tpl</h3>
        <p>Predložak za stranicu moderatora gdje moderator može za svoje kategorije dodjeljivati predmeete ,dodavati im akcije i dodavati vrste oglasa pozicijama koje moderira.</p>
        <h3>narudbaPregled.tpl</h3>
        <p>Korisnici vide svoje narudzbe</p>
        <h3>narudbeModerator.tpl</h3>
         <p>Moderatori mogu potvrditi narudžbe sve. i Zahtjeve za oglas na pozicijama gdje su zaduženi.</p>
        <h3>narudzba.tpl</h3>
         <p>Prikaz i uređivanje trenutne narudžbe</p>
        <h3>o_autoru.tpl</h3>
         <p>Podaci o autoru</p>
        <h3>oglasi.tpl</h3>
         <p>Pregled vrsta oglasa, izrada zahtjeva za novi oglas, pregled galerije vlastitih zahtjeva za oglas</p>
        <h3>prijavaRegistracija.tpl</h3>
         <p>Prijava i registracija</p>
        <h2>CSS</h2>
        <p>Razdvojen za nekoliko veličina medija</p>
        <h3>css1.css</h3>
         <p>Glavni općenitiji css</p>
        <h3>css2.css</h3>
         <p>CSS razdvojen na 3-4 širine ekrana (medija)</p>
        <h2>Javascript JQuery</h2>
        <p>Dohvaćanje ajax poziva i provjere unosa</p>
        <h3>jsFile01.js</h3>
         <p>Provjere kod registracije</p>
        <h3>jsFile02.js</h3>
         <p>Poziv ajax metoda na gumbove primjerice za odabir kategorija, dodavanje predmeta u povijest pregledavanja, odobravanje zahtjeva i sl.</p>
        <h3>slider.js</h3>
         <p>Pokušaj prikaza oglasa u obliku slidera, zbrejkan</p>
        <h2>PHP</h2>
        <h3>korisnici.php</h3>
         <p>Skripta za ispis korisnika u direktoriju privatno</p>
        <p>Ispis korisnika zaštićen pristup</p>
        <h3>o_autoru.php</h3>
         <p>Skripta za poziv predloška o autoru</p>
        <h3>baza.class.php</h3>
         <p>Skripta sadrži klasu za povezivanje s bazom</p>
        <h3>blokirajKorisnika.php</h3>
         <p>Ažuriranje da se korisnik pozivom ove skripte blokira</p>
        <h3>dodajUKosaricu.php</h3>
         <p>Odabrani predmeti se dodaju u košaricu</p>
        <h3>dodijelimoderatora.php</h3>
         <p>Dodavanje pozicija, promjena tipa korisnika, dodjeljivanje kategorije moderatoru, funkcije dohvaćanja poziija i dohvaćanja stranica, dohvaćanja korisnika i moderatora.</p>
        <h3>dohvatiLokacijeZaStranicu.php</h3>
         <p>Dohvaća lokacije u JSON obliku</p>
        <h3>dohvatRacun.php</h3>
         <p>Dohvaća račune po IDju narudžbe i vraća ih u json obliku</p>
        <h3>dokumentacija.php</h3>
         <p>poziv predloška dokumentacije</p>
        <h3>filterPredmetNaziv.php</h3>
         <p>Dohvaća predmete u json obliku</p>
        <h3>funkcije.php</h3>
        <p>U skripti funkcije php nalaze se sve glavne korištene klase sa svojstvima i metodama i ostalim funkcijama vezanim za rad te se često pozivaju u ostalim skriptama.</p>
        <p>Sadrži <strong>KLASE </strong>Pozicija,Oglas,Lokacija,Stranica,Racun,Kategorija,Tip,Konfiguracija,Korisnik, Narudba,Predmet,VrstaOglasa. </p>
         <p>Još sadrži funkcije za dohvaćanja korisničkog imena, kategorija, moderatora, predmeta, predmeta po filteru, dodavanje u košaricu, dohvaćanje predmeta u narudžbi, 
         suma narudžbe, dohvaćanje narudžbe, lokacija, aktivnih oglasa, najmanje cijene oglasa.</p>
        <h3>header.php</h3>
         <p>Funkcija za provjeru uloge korisnika, preusmjeravanja https-http, ispis navigacije, dohvaćanje konfiguracije, brisanje sesije</p>
        <h3>index.php</h3>
         <p>Pozivanje predloška početne stranice i prikaz tamo prisutnih oglasa ili njihovih minimalnih cijena</p>
        <h3>kategorije.php</h3>
         <p>Kategorije i oglasi</p>
        <h3>korime.php</h3>
         <p>Dohvaća korisničko ime (svi korisnici) ispisduje JSON</p>
        <h3>korisnici2.php</h3>
         <p>JOSN svih podataka o korisnicima</p>
        <h3>kreirajKategorije.php</h3>
         <p>Dodavanje i ažuriranje kategorija</p>
        <h3>moderator.php</h3>
         <p>Dohvaćanje pozicija određenog moderatora,dodavanje predmeta, dodavanje akcija, dodavanje vrsta oglasa, </p>
        <h3>narudbaPregled.php</h3>
         <p>Dohvaćanje narudžbi ovisno o tipu korisnika anonimni-registrirani-moderator</p>
        <h3>narudzba.php</h3>
         <p>Finalizacija izrada narudžbe</p>
        <h3>narudzbeModerator.php</h3>
         <p>Potvrda narudžbi i oglasa!</p>
        <h3>o_autoru.php</h3>
         <p>poziv podataka o autoru</p>
        <h3>odaberiKategoriju.php</h3>
         <p>JSON predmeta ovisno o odabranoj kategoriji</p>
        <h3>odbijOglas.php</h3>
         <p>Odbijanje oglasa</p>
        <h3>odblokirajKorisnika.php</h3>
         <p>Odblokiranvanje korisničkog računa</p>
        <h3>oglasi.php</h3>
         <p>Prikaz vrsta oglasa, dodavanje oglasa, i prikaz korisnikovih oglasa galerija</p>
        <h3>potvrdiNarudzbu.php</h3>
         <p>Potvrđivanje narudžbe i izrada računa</p>
        <h3>potvrdiOglas.php</h3>
         <p>Potvrđivanje oglasa</p>
        <h3>povecajKlikove.php</h3>
         <p>Povećanje broja klikova za oglas</p>
        <h3>povijestSesija.php</h3>
         <p>Dohvaćanje povijesti trenutne sesije</p>
        <h3>pozicijaOglasaAzuriraj.php</h3>
         <p>Ažuriranje pozicije oglasa</p>
        <h3>prijavaRegistracija.php</h3>
         <p>Obrađivanje prijave, registracije, aktivacije, slanje maila, generiranje kodova i sl.</p>
        <h3>sesija.class.php</h3>
         <p>Klasa rada sa sesijom dodana povijest i sl</p>
        <h3>ukloniKategoriju.php</h3>
         <p>Brisanje kategorije</p>
        <h3>ukloniKorisnika.php</h3>
         <p>Brisanje korisnika</p>
        <h3>ukloniKosarica.php</h3>
         <p>Uklanjanje predmeta iz košarice (skice trenutne narudžbe)</p>
        <h3>ukloniModeratora.php</h3>
         <p>Oduzimanje moderatorskih ovlasti nad određenom kategorijom određenom korisniku</p>
    </div>
</div>

