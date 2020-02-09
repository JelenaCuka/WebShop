 <h2 class="grupiranjeVeciEkrani"> Dobro došli na stranicu administratora</h2>
            <div id="porukeUpozorenja" class="Upozorenja sticky">
            {if isset({$greska})}
            {foreach from=$greska key=kljuc item=elem}
                <p>{$elem}</p>
            {/foreach}
            {/if}
            </div>
            <section >
                <form action="{$aktivnaSkriptaR}" method="post" id="registracijaObrazac2" class="grupiranjeVeciEkrani novalidate">
                    <fieldset class="regFieldset">
                        <legend class="regLegend">Promijeni tip korisniku:</legend>
                        <table id="registracijaTable" class="grupiranjeVeciEkrani tablica1 tablicaScroll ">
                            <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi korisnika</label></th>
                                <td><select class="obInput" id="kategorijaAzurID" name="korisnikTip" >
                                        {if isset({$korisniciA})}
                                            {foreach from=$korisniciA key=kljuc item=elem}
                                                <option value="{$elem->getidkorisnik()}">{$elem->getime()} {$elem->getprezime()}-{$elem->getkorime()}</option>
                                         {/foreach}
                                        {/if}
                                        
                                    </select><br /></td>
                            </tr>                        <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi tip</label></th>
                                <td><select class="obInput" id="kategorijaAzurID" name="tipTip" >
                                        {if isset({$tipA})}
                                            {foreach from=$tipA key=kljuc item=elem}
                                                <option value="{$elem->getTipId()}">{$elem->getTip()}</option>
                                         {/foreach}
                                        {/if}
                                    </select><br /></td>
                            </tr>
                        </table>
                        <input class="regInput" type="submit" value="Promijeni tip korisniku" name="submitPromijeniTip" />
                    </fieldset>
                </form>
                        <div class="grupiranjeVeciEkrani">
                            <div class="grupiranjeVeciEkrani tablica1 tablicaScroll ">
                                {if !empty({$korisniciA})}
                                    <table class="grupiranjeVeciEkrani tablica1 ">  
                                    <caption>Korisnici-TIP</caption>
                                    <thead class="tablica1_zaglavlje">
                                        <tr>
                                            <th><a>KORISNIK(KORIME)</a><br /></th>
                                            <th>TIP</th>
                                            <th>OBRIŠI KORISNIKA</th>
                                            <th>STATUS BLOKIRAN</th>
                                            <th>BLOKIRAJ</th>
                                            <th>ODBLOKIRAJ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach from=$korisniciA key=kljuc item=red}
                                            <tr class="Red">
                                                <td>{$red->getkorime()}</td>
                                                <td>{$red->gettip_korisnika()}</td>
                                                <td><button type="button" id="{$red->getidkorisnik()}" class="obrisiKorisnika">X</button></td>
                                                <td>{$red->getpristup_zakljucan()}</td>
                                                <th><button type="button" id="{$red->getidkorisnik()}" class="blokirajKorisnika">BLOKIRAJ</button></th>
                                                <th><button type="button" id="{$red->getidkorisnik()}" class="odblokirajKorisnika">ODBLOKIRAJ</button></th>
                                            </tr>
                                        {/foreach}

                                    </tbody>
                                    </table>
                                {/if}
                                </div>
                        </div>
                <form action="{$aktivnaSkriptaR}" method="post" id="registracijaObrazac2" class="grupiranjeVeciEkrani novalidate">
                    <fieldset class="regFieldset">
                        <legend class="regLegend">Dodijeli moderatora kategoriji:</legend>
                        
                        <table id="registracijaTable" class="grupiranjeVeciEkrani tablica1 tablicaScroll ">
                            <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi kategoriju </label></th>
                                <td><select class="obInput" id="kategorijaAzurID" name="dodajKategorijaModeratorK" >
                                        {if isset({$kategorijeA})}
                                            {foreach from=$kategorijeA key=kljuc item=elem}
                                                <option value="{$elem->getKategorijaId()}">{$elem->getKategorija()}</option>
                                         {/foreach}
                                        {/if}
                                    </select><br /></td>
                            </tr>                        <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi moderatora </label></th>
                                <td><select class="obInput" id="kategorijaAzurID" name="dodajKategorijaModeratorM" >
                                        {if isset({$korisniciM})}
                                            {foreach from=$korisniciM key=kljuc item=elem}
                                                <option value="{$elem->getidkorisnik()}">{$elem->getime()} {$elem->getprezime()}-{$elem->getkorime()}</option>
                                         {/foreach}
                                        {/if}
                                    </select><br /></td>
                            </tr>
                        </table>
                        <input class="regInput" type="submit" value="Dodijeli moderatora kategoriji" name="submitDodajModerator" />
                    </fieldset>
                </form>
                <div class="grupiranjeVeciEkrani">
                    <h2 class="grupiranjeVeciEkrani">ispis kategorija- moderator</h2>
                    {if isset({$kategorijeA})}
                        <table class="grupiranjeVeciEkrani tablica1 tablicaScroll ">  
                        <caption>Kategorije-Moderatori</caption>                        
                        {foreach from=$kategorijeA key=kljuc item=elem}

                                    <thead class="tablica1_zaglavlje">
                                        <tr id="{$elem->getKategorijaId()}">
                                            <th><a>{$elem->getKategorija()}</a><br /></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            {foreach from=$elem->getModeratori() key=k item=moder}
                                <tr class="Red" id="{$moder->getidkorisnik()}">
                                    <td>{$moder->getkorime()}</td>
                                    <td id="{$elem->getKategorijaId()}"><button type="button" id="{$moder->getidkorisnik()}" class="ukloniModeratora">UkLONI</button></td>
                                </tr>
                            {/foreach}
                        {/foreach}
                        </tbody>
                        </table>
                    {/if}
                </div>
                <form action="{$aktivnaSkriptaR}" method="post" id="registracijaObrazac2" class="grupiranjeVeciEkrani novalidate">
                    <fieldset class="regFieldset">
                        <legend class="regLegend">Definiraj poziciju:</legend>
                        <table id="registracijaTable" class="grupiranjeVeciEkrani tablica1 tablicaScroll ">
                            <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi stranicu </label></th>
                                <td><select class="obInput" id="TRENUTNA_STRANICA" name="PozStranica" >
                                        {if isset({$stranice})}
                                            {foreach from=$stranice key=kljuc item=elem}
                                                <option value="{$elem->getStranicaId()}">{$elem->getUrl()}</option>
                                         {/foreach}
                                        {/if}
                                    </select><br /></td>
                            </tr>                        <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi lokaciju:</label></th>
                                <td><select class="obInput" id="LOKACIJE_TRENUTNA_STRANICA" name="PozLokacija" >
                                        {if isset({$stranice1})}
                                            {foreach from=$stranice1 key=kljuc item=elem}
                                                <option value="{$elem->getidlokacija()}">Broj:{$elem->getbroj()}</option>
                                         {/foreach}
                                        {/if}
                                    </select><br /></td>
                            </tr>
                            <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Dimenzija visina: </label></th>
                                <td><input class="regInput" type="number" min="1" max="2000" name="PozVisina" id="prezime_registracija" >
                                    <span id="greskaPrezime"></span><br /></td>
                            </tr>
                            <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Dimenzija širina: </label></th>
                                <td><input class="regInput" type="number" min="1" max="2000" name="PozSirina" id="prezime_registracija" >
                                    <span id="greskaPrezime"></span><br /></td>
                            </tr>
                            <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi moderatora:</label></th>
                                <td><select class="obInput" id="kategorijaAzurID" name="PozMod" >
                                        {if isset({$korisniciM})}
                                            {foreach from=$korisniciM key=kljuc item=elem}
                                                <option value="{$elem->getidkorisnik()}">{$elem->getime()} {$elem->getprezime()}-{$elem->getkorime()}</option>
                                         {/foreach}
                                        {/if}
                                    </select><br /></td>
                            </tr>
                        </table>
                        <input class="regInput" type="submit" value="Dodaj poziciju" name="submitDodajPozicija" />
                    </fieldset>
                </form>
                        <div class="grupiranjeVeciEkrani">
                            <div class="grupiranjeVeciEkrani tablica1 tablicaScroll ">
                                {if !empty({$pozicije})}
                                    <table class="grupiranjeVeciEkrani tablica1 ">  
                                    <caption>POZICIJE OGLASA</caption>
                                    <thead class="tablica1_zaglavlje">
                                        <tr>
                                            <th><a>IDPOZICIJA</a><br /></th>
                                            <th>LOKACIJA</th>
                                            <th>STRANICA</th>
                                            <th>ŠIRINA</th>
                                            <th>VISINA</th>
                                            <th>MODERATOR</th>
                                            <th>AŽURIRAJ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach from=$pozicije key=kljuc item=red}
                                            <tr class="Red">
                                                <td>{$red->getidpozicija_oglasa()}</td>
                                                <td>{$red->getlokacija()}</td>
                                                <td>{$red->getstranica()}</td>
                                                <td><input class="regInput" type="number" min="1" max="2000" name="POS{$red->getidpozicija_oglasa()}" id="POS{$red->getidpozicija_oglasa()}" value="{$red->getdimenzija_oglasa_sirina()}"></td>
                                                <td><input class="regInput" type="number" min="1" max="2000" name="POV{$red->getidpozicija_oglasa()}" id="POV{$red->getidpozicija_oglasa()}"value="{$red->getdimenzija_oglasa_visina()}"></td>
                                                <td>{$red->getmoderator()}</td>
                                                <td><button type="button" id="{$red->getidpozicija_oglasa()}" class="azurirajPozicija">ažuriraj</button></td>
                                            </tr>
                                        {/foreach}

                                    </tbody>
                                    </table>
                                {/if}
                                </div>
                        </div>                                    
                
            </section>{*pozicije*}
  


