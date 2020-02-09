# WebShop
Webshop project made while learning web development technologies. (2018) 

Files that contain sensitive data are not uploaded. (eg. database configuration )


Short description.

This is webshop page. Customers can make orders for products grouped by categories. Product search is enabled. Products can be added to order, product quantity is defined while creating order. 
Customers can see Ads and by clicking on ads links connected with ads are opened. 
Customers can see which products are on discount. 
Registered customers are enabled creating their own Ads, and also can report broken Ads. 
Moderators approve orders. After ordder approval, order bill is created. 
Moderators can view their orders and bills. 
Moderators define products for cactegories  in which they are in chare of.  They can set discounts for choosen time interval. 
For adPositions that moderator moderates , moderator creates ad types. He can also approve or disapprove requests for blocking ads. 
Administrator creates positions and configures system. He also can see statistics. 

Description (longer, croatian)
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
