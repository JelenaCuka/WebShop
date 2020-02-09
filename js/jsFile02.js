$(function () {
    if (document.title == "KATEGORIJE") {
            console.log("tu");
            $('.KliknutOglas').on('click', function (e) {
                console.log("tu");
                    var idOgl=$(this).attr('id');
                    $.ajax({
                        url: 'povecajKlikove.php',
                        type: 'GET',
                        data: {idOgl: idOgl },
                        success: function (data) {
                        console.log(data);
                        },
                        error: function (data) {
                        //alert("Error: " + data);
                        }
                    });
                    //location.reload();
                });
        
        
        var ispisPredmeti="";
        var trenutnaKategorija="";
        $('li.kategorijeP ').on('click', function () {   
            //console.log($(this));
            //console.log($(this).attr('id'));
            //console.log($(this).attr('id'));
            var queryString = 'kid=' + $(this).attr('id');
            trenutnaKategorija=$(this).attr('id');
            $.get('odaberiKategoriju.php', queryString, function(data) {
                ispisPredmeti="";
                //console.log(data);
                var obj = JSON.parse(data);
                console.log(obj);
                if(obj!=null){
                    for(var i = 0 ; i<obj.length;i++){
                        ispisPredmeti+="<div id=\""+obj[i].id+"\"  class=\"predmet";
                        if(obj[i].akcija!=""){
                            ispisPredmeti+=" akcijaPredmet";
                        }
                        ispisPredmeti+="\">";
                        ispisPredmeti+="<h4>"+obj[i].naziv+"</h4>";
                        ispisPredmeti+="<p>"+obj[i].opis+"</p>";
                        ispisPredmeti+="<p>"+obj[i].cijena+" KN"+"</p>";
                        if(obj[i].akcija!=null)ispisPredmeti+="<p>"+"Na akciji:"+obj[i].akcija*100+"%"+"</p>";
                        ispisPredmeti+="<input id=p"+obj[i].id+" type=\"checkbox\">";
                        ispisPredmeti+="</div>";
                    }
                //ispisPredmeti+="<br><label class=\"regLabel\">Pretražite(naziv): </label><input name=\"pretraziProizvod\" class=\"regInput\" id=\"pretraziProizvod\" type=\"text\">";
                }else{
                   ispisPredmeti="<p>Trenutno nema predmeta u toj kategoriji</p>"; 
                }
                $('#predmeti').html(ispisPredmeti);
            });
            
        });

        $('#predmeti').bind("DOMSubtreeModified",function(){
            $('div.predmet ').on('click', function () {
                console.log($(this).attr("id"));
                console.log($(this));
                //pozovi zapis u sesiju povijest
                var qSesija = 'pid=' + $(this).attr('id');
                trenutnaKategorija=$(this).attr('id');
                $.get('povijestSesija.php', qSesija, function(data) {
                        $("#dodajPovijest").html(data);
                });
            });
        });
        
        
        $('#pretraziProizvod').keyup(function() {
            var queryString ='nazivPredmeta=' + $(this).val();
            //console.log(queryString);
            $.get('filterPredmetNaziv.php', queryString, function(data) {
                ispisPredmeti="";
                //console.log(data);
                var obj = JSON.parse(data);
                //console.log(obj);
                if(obj!=null){for(var i = 0 ; i<obj.length;i++){
                        ispisPredmeti+="<div  class=\"predmet";
                        if(obj[i].akcija!=null){
                            ispisPredmeti+=" akcijaPredmet";
                        }
                        ispisPredmeti+="\">";
                        ispisPredmeti+="<h4>"+obj[i].naziv+"</h4>";
                        ispisPredmeti+="<p>"+obj[i].opis+"</p>";
                        ispisPredmeti+="<p>"+obj[i].cijena+" KN"+"</p>";
                        if(obj[i].akcija!=null)ispisPredmeti+="<p>"+"Na akciji:"+obj[i].akcija*100+"%"+"</p>";
                        ispisPredmeti+="<input id=p"+obj[i].id+" type=\"checkbox\">";
                        ispisPredmeti+="</div>";
                    }
                }else{
                   ispisPredmeti="<p>Nema rezultata pretrage :(</p>"; 
                }
                $('#predmeti').html(ispisPredmeti);
            });
        });
        var oznaceniPredmeti="";
        $('#dodajKosarica').on('click', function (e) { 
            var predmetiKosarica=[];
            e.preventDefault();
            oznaceniPredmeti=$('#predmeti input[type=checkbox]:checked');
            if($('#predmeti input[type=checkbox]:checked').length>0){
                oznaceniPredmeti.each(function(){
                    predmetiKosarica.push( $(this).attr('id') );
                    console.log($(this).attr('id'));
                    //proslijedi polje
                    
                });
            }
            //console.log(predmetiKosarica.length);
            if(predmetiKosarica.length>0){
                //dodaj u sesiju?? tj posalji u php da doda u sesiju
                var queryString = 'noviKosarica=' + predmetiKosarica;
                $.get('dodajUKosaricu.php', queryString, function(data) {
                    console.log(data);
                    $('#porukaDodanoKosarica').html("Predmeti dodani u narudžbu");
                    
                    //console.log(obj);
                    //$('#narudbaKosarica').html(data);
                });
                
            }else{$('#porukaDodanoKosarica').html("");}
            //$('#narudbaKosarica').html(oznaceniPredmeti);
            //console.log($(this).attr('id'));
            //console.log($(this).attr('id'));
            
        });
    }
    if (document.title == "NARUDŽBA") {
        $('.ukloniPredmet').on('click', function (e) { 
            console.log( $(this).attr('id')+ " - " + $(this)  );
            var queryString = 'idPromjenaKosarica=' + $(this).attr('id') ;
            $.get('ukloniKosarica.php',queryString , function(data) {
                    //console.log(data);
                    //console.log(obj);
                    //$('#narudbaKosarica').html(data);
                    //$("#narudzba").load(location.href + " #narudzba");
           });
           //console.log()
           $(this).parent().parent().remove();
        });
    }
    if (document.title == "Kategorije adimn") {
            console.log( "tu" );
            $('.ukloniPredmet').on('click', function (e) { 
                console.log( $(this).attr('id')+ " - " + $(this)  );
                var queryString = 'idKat=' + $(this).attr('id') ;
                $.get('ukloniKategoriju.php',queryString , function(data) {
                        //console.log(data);
                        //console.log(obj);
                        //$('footer').html(data);
                        //$("#narudzba").load(location.href + " #narudzba");
               });
               $(this).parent().remove();
            });
    }
        if (document.title == "Dodijeli moderatora") {
            console.log( "tu" );
            $('.obrisiKorisnika').on('click', function (e) { 
                console.log( $(this).attr('id')+ " - " + $(this)  );
                var queryString = 'idKor=' + $(this).attr('id') ;
                $.get('ukloniKorisnika.php',queryString , function(data) {
                        //console.log(data);
                        //console.log(obj);
                        //$('footer').html(data);
                        //$("#narudzba").load(location.href + " #narudzba");
               });
               $(this).parent().parent().remove();
            });
            $('.blokirajKorisnika').on('click', function (e) { 
                console.log( $(this).attr('id')+ " - " + $(this)  );
                var queryString = 'idKor=' + $(this).attr('id') ;
                $.get('blokirajKorisnika.php',queryString , function(data) {
                        //console.log(data);
                        //console.log(obj);
                        //$('footer').html(data);
                        //$("#narudzba").load(location.href + " #narudzba");
               });
               location.reload();
            });
            $('.odblokirajKorisnika').on('click', function (e) { 
                console.log( $(this).attr('id')+ " - " + $(this)  );
                var queryString = 'idKor=' + $(this).attr('id') ;
                $.get('odblokirajKorisnika.php',queryString , function(data) {
                        //console.log(data);
                        //console.log(obj);
                        //$('footer').html(data);
                        //$("#narudzba").load(location.href + " #narudzba");
               });
               location.reload();
            });
            $('.ukloniModeratora').on('click', function (e) { 
                console.log( $(this).attr('id')+ " - " + $(this)  );
                var queryString = 'idKor=' + $(this).attr('id') + '&idKAT='+ $(this).parent().attr('id') ;
             
                console.log(queryString);
                $.get('ukloniModeratora.php',queryString , function(data) {
                        //console.log(data);
                        //console.log(obj);
                        //$('footer').html(data);
                        //$("#narudzba").load(location.href + " #narudzba");
               });
               location.reload();
            });
            //TRENUTNA_STRANICA CHANGE
            $("#TRENUTNA_STRANICA").change(function(){
                //dohvati nove lokacije
                
                var queryString = 'idStr=' +$(this).val() ;
                //console.log(queryString);
                $.get('dohvatiLokacijeZaStranicu.php',queryString , function(data) {
                        var obj = JSON.parse(data);
                        var dodajLokacije="";
                        if(obj!=null){
                            for(var i = 0 ; i<obj.length;i++){
                                //dodajLokacije+="<option value=\""+obj[i].idlokacija+"\">Broj: "+obj[i].broj+"("+obj[i].idlokacija+")</option>";
                                dodajLokacije+="<option value=\""+obj[i].idlokacija+"\">Broj: "+obj[i].broj+"</option>";
                            }
                        }
                        $('#LOKACIJE_TRENUTNA_STRANICA').html(dodajLokacije);
               });
                
            });
            $('.azurirajPozicija').on('click', function (e) {
                var POID=$(this).attr('id');
                var POS=$('#POS'+POID).val();
                var POV=$('#POV'+POID).val();
                var queryString = 'idPO=' + POID+'&POS'+POID+'='+POS +'&POV'+POID+'='+POV;
                console.log(queryString);
                $.get('pozicijaOglasaAzuriraj.php',queryString , function(data) {
                        //console.log(data);
                        //console.log(obj);
                        //$("#narudzba").load(location.href + " #narudzba");
               });
               location.reload();
            });
    }
    if (document.title == "Pregled narudžbe") {
        
        $('.PotvrdiNarudzbu').on('click', function (e) { 
                //console.log( $(this).attr('id')+ " - " + $(this)  );
                //var queryString = 'idNar=' + $(this).attr('id') ;
                var idNarudzbe=$(this).attr('id');
                var ukNarudzba=$('#NAR_UK'+idNarudzbe).text();
                //console.log(idNarudzbe+'-'+ukNarudzba);
                /*$.get('potvrdiNarudzbu.php',queryString , function(data) {
                        //console.log(data);
                        //console.log(obj);
                        //$('footer').html(data);
                        //$("#narudzba").load(location.href + " #narudzba");
               });*/
            
            $.ajax({
                url: 'potvrdiNarudzbu.php',
                type: 'GET',
                data: {idNar: idNarudzbe, ukNar: ukNarudzba },
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                alert("Error: " + data);
                }
            });
               location.reload();
        });    
        var ispisiRacun="";
        $('.PregledajRacun').on('click', function (e) {
                var idRacun=$(this).attr('id');
            $.ajax({
                url: 'dohvatRacun.php',
                type: 'GET',
                data: {idNar: idRacun },
                success: function (data) {
                //console.log(data);
                ispisiRacun="";
                var obj = JSON.parse(data);
                //console.log(obj);
                if(obj!=null){
                    ispisiRacun+="<div id=\""+obj.idracun+"\"  class=\"racun";
                    ispisiRacun+="\">";
                    ispisiRacun+='<h2>PREGLED RAČUNA</h2>';
                    ispisiRacun+='<p><hr></p>';
                    ispisiRacun+='<p><strong>RAČUN.br '+obj.idracun+'</strong></p>';
                    ispisiRacun+='<p><hr></p>';
                    ispisiRacun+='<p>Datum izdavanja: '+obj.datum+'</p>';
                    ispisiRacun+='<p>Vrijeme: '+obj.vrijeme+'</p>';
                    ispisiRacun+='<p><hr></p>';
                    ispisiRacun+='<p><strong>KUPAC:</strong></p>';
                    ispisiRacun+='<p>Adresa: '+obj.narudzba.adresa+'</p>';
                    ispisiRacun+='<p>Ime: '+obj.narudzba.ime+'</p>';
                    ispisiRacun+='<p>Prezime: '+obj.narudzba.prezime+'</p>';
                    ispisiRacun+='<p><hr></p>';
                    ispisiRacun+='<p><strong>PROIZVODI:</strong></p>';
                    ispisiRacun+='<p><hr></p>';
                    for(var i = 0 ; i<obj.narudzba.predmeti.length;i++){
                        ispisiRacun+='<p>Naziv: '+obj.narudzba.predmeti[i].naziv+'</p>';
                        ispisiRacun+='<p>Količina: '+obj.narudzba.predmeti[i].kolicina+'</p>';
                        ispisiRacun+='<p>Cijena: '+obj.narudzba.predmeti[i].cijena+'KN</p>';
                        if(obj.narudzba.predmeti[i].akcija!=null){
                            ispisiRacun+='<p>Popust: '+obj.narudzba.predmeti[i].akcija*100+'%</p>';
                            ispisiRacun+='<p>Akcijska cijena: '+(1-obj.narudzba.predmeti[i].akcija)*obj.narudzba.predmeti[i].cijena+'KN</p>';
                        }
                        ispisiRacun+='<p><hr></p>';
                    }
                    ispisiRacun+='<p><hr></p>';
                    ispisiRacun+='<p><strong>IZNOS : '+obj.cijena_ukupno+'KN</strong></p>';
                }else{
                   ispisiRacun="<p>Trenutno nema računa</p>"; 
                }
                $('#racunPrikaz').html(ispisiRacun);
                    
                },
                error: function (data) {
                alert("Error: " + data);
                }
            });
        });
        $('.PotvrdiOglas').on('click', function (e) {
                var idOgl=$(this).attr('id');
            $.ajax({
                url: 'potvrdiOglas.php',
                type: 'GET',
                data: {idOgl: idOgl },
                success: function (data) {
                //console.log(data);
                },
                error: function (data) {
                //alert("Error: " + data);
                }
            });
            location.reload();
        });
        $('.OdbijOglas').on('click', function (e) {
                var idOgl=$(this).attr('id');
            $.ajax({
                url: 'odbijOglas.php',
                type: 'GET',
                data: {idOgl: idOgl },
                success: function (data) {
                //console.log(data);
                },
                error: function (data) {
                //alert("Error: " + data);
                }
            });
            location.reload();
        });
    }
    console.log("tu");
    $('.KliknutOglas').on('click', function (e) {
        console.log("tu");
            var idOgl=$(this).attr('id');
            $.ajax({
                url: 'povecajKlikove.php',
                type: 'GET',
                data: {idOgl: idOgl },
                success: function (data) {
                console.log(data);
                },
                error: function (data) {
                //alert("Error: " + data);
                }
            });
            //location.reload();
        });



});
