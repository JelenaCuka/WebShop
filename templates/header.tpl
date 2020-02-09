{config_load file="primjer.conf"}
<!DOCTYPE html>
<html lang="hr">
    <head>
        <title>{$naslov}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="naslov" content="{$naslov}">  
        <meta name="datum posljednje promjene" content="{$smarty.now|date_format:"%d.%m.%Y %H:%M:%S"}">
        <meta name="autor" content="{#autor#}"> 

        <link rel="shortcut icon" href="slike/favicon.ico" type="image/x-icon">
        <link rel="icon" href="slike/favicon.ico" type="image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/css1.css">
        <link rel="stylesheet" type="text/css" href="css/css2.css">      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--<script src="js/jsFile01.js"></script>-->
        <script src="js/jsFile01.js"></script>
        <script src="js/jsFile02.js"></script>
        <script src="js/slider.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
            <header class="PopraviPoravnanje">
                <div class="grupiranjeVeciEkrani">
                    <h1 >{$naslov}</h1>    
                    <p id="LastModifiedDateTime" >2.5.2018. 22:00</p><br />
                    {if isset($smarty.session.korisnik)&&$smarty.session.korisnik!='anonimni'}
                        <a href="index.php?odjava=odjava">Odjava</a>
                    {else}
                        <a href="prijavaRegistracija.php?mod=prijava"> Prijava</a>
                    {/if}{**}
                    
                </div>
            </header>
            <nav class="PopraviPoravnanje ">
                <div class="grupiranjeVeciEkrani">
                    <ul >
                        <li><a href="index.php">Početna</a></li>
                        <li><a href="kategorije.php">kategorije</a></li>
                        <li><a href="dokumentacija.php">dokumentacija</a></li>
                        <li><a href="o_autoru.php">O autoru</a></li>
                        <li><a href="prijavaRegistracija.php?mod=prijava">Prijava</a></li>
                        <li><a href="prijavaRegistracija.php?mod=registracija">Registracija</a></li>
                        <li><a href="privatno/korisnici.php">PRIVATNO/korisnici</a></li>
                        {foreach from=$navigacija key=kljuc item=elem}
                        <li><a href="{$elem}">{$kljuc}</a></li>
                        {/foreach}
                </ul>
                </div>
            </nav>
            <section id="sadrzaj" class="PopraviPoravnanje borderDonjiSlabiSivi{if $smarty.server.REQUEST_URI|strstr: 'obrazac.php'}{$pozadinaSekcijaObrazac}{/if}{if $smarty.server.REQUEST_URI|strstr: 'oglasi.php'}{$pozadinaSekcijaObrazac}{/if}">