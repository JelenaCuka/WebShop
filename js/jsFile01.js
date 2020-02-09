$(function () {
    //validacija ime prezime 2-30(+)
    ////validacija ime prezime prvo slovo veliko(+)
    ////Broj znakova korime i lozinka 5-12,5-15(+)
    //potvrda lozinke(+)
    //struktura email(+)
    //svi uneseni
    if(document.title=="Prijava i registracija"){
        var nemaGreskeKorIme=true;
        var nemaGreskeLozinka=true;
        var nemaGreskeIme=true;
        var nemaGreskePrezime=true;
        var nemaGreskeEmail=true;
        var nemaGreskePotvrdaLoz=true;
        $( "#korisnicko_ime_registracija" ).blur(function() {
                var korime=$(this).val();
                var nijeZauzeto=false;
                
                //console.log(korime);
                //KOrime AJAX POSTOJI
                if(korime){
                    nemaGreskeKorIme=true;
                    $.ajax({
                        url: "http://barka.foi.hr/WebDiP/2017_projekti/WebDiP2017x031/korime.php",
                        //data: $(this).serialize(),
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            //console.log(data);
                            for (var i=0;i<data.length;i++){
                                if(data[i]["korime"]==korime){
                                    nijeZauzeto=true;                                    
                                }
                            }
                            if(nijeZauzeto){
                                $("#greskaKorime").html("Korisničko ime je zauzeto, odaberite drugo");
                                nemaGreskeKorIme=false;
                                //console.log($(this));
                            }else{
                                var formatKorime= new RegExp(/^.{5,12}$/);
                                var testirajKorime=formatKorime.test(korime);
                                if(testirajKorime){
                                    $("#greskaKorime").html("");
                                }else{
                                    $("#greskaKorime").html("potrebno unijeti 5 do 12 znakova");
                                    nemaGreskeKorIme=false;
                                }
                                
                            }
                        }
                    });
                }
        });
        $( "#lozinka_registracija" ).blur(function() {
            nemaGreskeLozinka=true;
            var lozinka=$(this).val();
            if(lozinka){
                var formatLozinka= new RegExp(/^.{5,15}$/);
                var testirajLozinka=formatLozinka.test(lozinka);
                if(testirajLozinka){
                    $("#greskaLozinka").html("");
                    if($( "#potvrda_lozinke_registracija" ).val()){
                        if($( "#potvrda_lozinke_registracija" ).val()!=lozinka){
                            $("#greskaPotvrdaLozinka").html("Lozinka i potvrda lozinke se ne poklapaju");
                            nemaGreskePotvrdaLoz=false;
                        }else{
                            nemaGreskePotvrdaLoz=true;
                        }
                    }
                }else{
                    $("#greskaLozinka").html("potrebno unijeti 5 do 15 znakova");
                    nemaGreskeLozinka=false;
                }
            }
        });
        $( "#ime_registracija" ).blur(function() {
            nemaGreskeIme=true;
            var ime=$(this).val();
            if(ime){
                $greskaIme="";
                var formatIme= new RegExp(/^.{2,30}$/);
                var testirajIme=formatIme.test(ime);
                if(ime[0]!=ime[0].toUpperCase()){
                    $greskaIme+="Unesite početno slovo veliko";
                    nemaGreskeIme=false;
                }
                if(!testirajIme){
                    nemaGreskeIme=false;
                    $greskaIme+=" Dozvoljeno 2-30 znakova ";
                }
                $("#greskaIme").html($greskaIme);
            }
        });
        $( "#prezime_registracija" ).blur(function() {
            nemaGreskePrezime=true;
            var prezime=$(this).val();
            if(prezime){
                $greskaPrezime="";
                var formatIme= new RegExp(/^.{2,30}$/);
                var testirajPrezime=formatIme.test(prezime);
                if(prezime[0]!=prezime[0].toUpperCase()){
                    $greskaPrezime+="Unesite početno slovo veliko";
                    nemaGreskePrezime=false;
                }
                if(!testirajPrezime){
                    $greskaPrezime+=" Dozvoljeno 2-30 znakova ";
                    nemaGreskePrezime=false;
                }
                $("#greskaPrezime").html($greskaPrezime);
            }
        });
        $( "#potvrda_lozinke_registracija" ).blur(function() {
            var lozinka2=$(this).val();
            var lozinka=$( "#lozinka_registracija" ).val();
            if(lozinka!=lozinka2){
                $("#greskaPotvrdaLozinka").html("Lozinka i potvrda lozinke se ne poklapaju");
                nemaGreskePotvrdaLoz=false;
            }else{
                $("#greskaPotvrdaLozinka").html("");
                nemaGreskePotvrdaLoz=true;
            } 
        });
        $( "#email_registracija" ).keyup(function() {
            nemaGreskeEmail=true;
            if ($(this).val() != "") {
                var re_email = new RegExp(/^[^\.]([A-Z]*[a-z]*[0-9]*)*\.?([A-Z]*[a-z]*[0-9]*)*@([A-Z]*[a-z]*[0-9]*)*\.([A-Z]|[a-z]){2,}$/);
                var re_brzn = new RegExp(/^.{10,30}$/);
                var testiraj = re_email.test($(this).val());
                var testiraj2 = re_brzn.test($(this).val());
                if (testiraj && testiraj2) {
                    //dobro
                    $("#greskaEmail").html("");
                } else {
                    $("#greskaEmail").html("Krivi format ");
                    nemaGreskeEmail=false;
                }
            }else{
                $("#greskaEmail").html("");
            }
        });
        $('#registracijaObrazac').on('submit', function (e) { 
            //e.preventDefault();
            var sviUneseni=false;
            
            $("#SubmitGreske").html("");
            if($( "#korisnicko_ime_registracija" ).val()!=""&&$( "#lozinka_registracija" ).val()!=""&&$( "#ime_registracija" ).val()!=""&&$( "#prezime_registracija" ).val()!=""&&$( "#email_registracija" ).val()!=""&&$( "#adresa_registracija" ).val()!=""&&$( "#potvrda_lozinke_registracija" ).val()!=""){
                sviUneseni=true;
            }else{
                //Unesite sve podatke
                $("#SubmitGreske").html("Za uspješnu registraciju potrebno je unijeti sve podatke");
                e.preventDefault();
            }
            if(sviUneseni){
                if(nemaGreskeKorIme&&nemaGreskeIme&&nemaGreskePrezime&&nemaGreskeEmail&&nemaGreskePotvrdaLoz){
                    //Šalje
                    $("#SubmitGreske").html("");
                }else{
                    e.preventDefault();
                    $("#SubmitGreske").html("Za uspješnu registraciju potrebno je popraviti prisutne greške");
                }/*
                e.preventDefault();
                var greske=[$("#greskaEmail").val(),$("#greskaIme").val(),$("#greskaPrezime").val(),$("#greskaKorime").val(),$("#greskaAdresa").val(),$("#greskaLozinka").val(),$("#greskaPotvrdaLozinka").val()];
                var spoji="";
                for(var i;i<greske.length;i++){
                    console.log(greske[i]);
                    spoji+=greske[i];
                }
                console.log(spoji);
                if(spoji!=""){
                    console.log("PLS");
                }
                
                //greske=$("#greskaEmail").val()+$("#greskaIme").val()+$("#greskaPrezime").val()+$("#greskaKorime").val()+$("#greskaAdresa").val()+$("#greskaLozinka").val()+$("#greskaPotvrdaLozinka").val();
                //$("#greskaEmail").val()!=""||$("#greskaIme").val()!=""||$("#greskaPrezime").val()!=""||$("#greskaKorime").val()!=""||$("#greskaAdresa").val()!=""||$("#greskaLozinka").val()!=""||$("#greskaPotvrdaLozinka").val()!=""
                /*
                if($("#greskaEmail").val()!=""||$("#greskaIme").val()!=""||$("#greskaPrezime").val()!=""||$("#greskaKorime").val()!=""||$("#greskaAdresa").val()!=""||$("#greskaLozinka").val()!=""||$("#greskaPotvrdaLozinka").val()!=""){
                    $("#SubmitGreske").html("Za uspješnu registraciju potrebno je popraviti prisutne greške");
                    e.preventDefault();
                }else{
                    nemaGreske=true;
                    e.preventDefault();
                }*/
            }
        });
    }
});

/*
$(function () {
    $('#prijavaObrazac').on('submit', function (e) {           // When form is submitted
        e.preventDefault();                               // Prevent it being sent
        //Prijava();
        var podaciSlanje=$('#prijavaObrazac').serialize();
        //
         $.ajax({
            type: "POST",
            url: "loginStatus.php",
            data: podaciSlanje, //$('#prijavaObrazac')
            dataType: "json",
            success: function (data) {
                console.log(data);//
                var greskePolje=[];
                for (var i = 0; i < data.ispisGreske.length; i++) {
                    greskePolje.push(data.ispisGreske[i].toString());//push vraca index
                }
                IspisiGreske(greskePolje);
            },
            error: function (data, status) {
                $('#porukeUpozorenja').html(status);
            }
        });//
        
        $.post('loginStatus.php', podaciSlanje, function(data) {  // Use $.post() to send it        
                var greskePolje=[];
                for (var i = 0; i < data.ispisGreske.length; i++) {
                    greskePolje.push(data.ispisGreske[i].toString());//push vraca index
                }
                IspisiGreske(greskePolje);// Where to display result
      });
            // Try to collect JSON data
       
        
    });
    function IspisiGreske(greske){
        $("#porukeUpozorenja").empty();
        for(var i=0;i<greske.length;i++){
            KreirajGresku(greske[i]);
        }
    }
    function KreirajGresku(poruka){                                             
        $("#porukeUpozorenja").append("<p>"+poruka+"</p>");
    }
});

*/
