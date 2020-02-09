<h2 id="naslovSekcije" class="grupiranjeVeciEkrani">Dobro došli!</h2>
    <div id="sadrzajContent" class="grupiranjeVeciEkrani PopraviPoravnanje">
        {*
        <div id="porukeUpozorenja" class="Upozorenja sticky">
            {if isset({$greska})}
                {foreach from=$greska key=kljuc item=elem}
                    <p>{$elem}</p>
                {/foreach}
            {/if}
        </div>
        *}
        <aside id="racunPrikaz" class="PopraviPoravnanje">
            
        </aside>
        <article class="PopraviPoravnanje">
                <h2>POPIS NARUDŽBI:</h2>
                <div id="narudzba" class="opisDuzi grupiranjeParagrafa PopraviPoravnanje">
                    {if isset({$narudzbeM})}
                    {if !empty({$narudzbeM})}
                        <h2>Potvrdi narudžbe</h2>
                            <table class="grupiranjeVeciEkrani tablica1 tablicaScroll ">  
                            <caption>Narudzbe</caption>
                            <thead class="tablica1_zaglavlje">
                                <tr>
                                    <th><a href="" >Ime</a><br /></th>
                                    <th><a href="" >Prezime</a><br /></th>
                                    <th>Adresa</th>
                                    <th>Proizvodi</th>
                                    <th>IZNOS UK</th>
                                    <th>Status</th>
                                    <th>Potvrdi?</th>
                                </tr>
                            </thead>
                            <tbody>
                            {foreach from=$narudzbeM key=kljuc item=elem}
                               <tr class="Red">
                               <td>{$elem->getIme()}</td> 
                               <td>{$elem->getPrezime()}</td>
                               <td>{$elem->getAdresa()}</td>
                               <td>
                                   {foreach from=$elem->getPredmeti() key=index item=predmet}
                                       <p>{$predmet->getNaziv()}</p>
                                       <p>{$predmet->getCijena()}(kn/kom)</p>
                                       <p>Količina:{$predmet->getKolicina()}kom</p>
                                       <p>Ukupno predmet:{$predmet->IzracunajCijenu()}kn</p><hr>
                                    {/foreach}
                               </td>
                               <td><span id="NAR_UK{$elem->getId()}">{$elem->getIznos()}</span>KN</td>
                               <td>{if {$elem->getStatus()}==1}Potvrđeno{/if}{if {$elem->getStatus()}==0}Čekanje{/if}</td>
                               <td>
                                   {if {$elem->getStatus()}==1}
                                       <button type="button" id="{$elem->getId()}" class="PregledajRacun">Pregledaj račun</button>
                                   {/if}
                                   {if {$elem->getStatus()}==0}
                                           <button type="button" id="{$elem->getId()}" class="PotvrdiNarudzbu">Potvrdi</button>
                                   {/if}
                               </td>
                               </tr>
                           {/foreach}
                            </tbody>
                            </table>
                        {else}
                            <h2>Sve narudžbe (Moderator)</h2>
                            <div class="infoDiv grupiranjeVeciEkrani PopraviPoravnanje">
                               <p>Nema narudzbi moderator</p> 
                            </div>
                    {/if}
                    {/if}
                    {if !empty({$ispisOglasiKorisnika})}
                        <h2>Potvrdi zahtjev za oglas!</h2>
                            <table class="grupiranjeVeciEkrani tablica1 tablicaScroll ">  
                            <caption>Oglasi</caption>
                            <thead class="tablica1_zaglavlje">
                                <tr>
                                    <th><a href="" >naziv</a><br /></th>
                                    <th><a href="" >opis</a><br /></th>
                                    <th>url_web_stranica_otvori</th>
                                    <th>slika</th>
                                    <th>početak_prikazivanja</th>
                                    <th>kraj_prikazivanja</th>
                                    <th>Potvrdi?</th>
                                </tr>
                            </thead>
                            <tbody>
                            {foreach from=$ispisOglasiKorisnika key=kljuc item=elem}
                               <tr class="Red">
                               <td>{$elem->getnaziv()}</td> 
                               <td>{$elem->getopis()}</td>
                               <td>{$elem->geturl_web_stranica_otvori()}</td>
                               <td>{$elem->getslika()}</td> 
                               <td>{$elem->getpocetak_prikazivanja()}</td>
                               <td>{$elem->getkraj_prikazivanja()}</td>
                               <td>
                                   {if {$elem->getstatus_potvrdenosti()}==0}
                                       <button type="button" id="{$elem->getidoglas()}" class="OdbijOglas">Odbij</button>
                                       <button type="button" id="{$elem->getidoglas()}" class="PotvrdiOglas">Potvrdi</button>
                                   {/if}
                                   {if {$elem->getstatus_potvrdenosti()}==1}
                                       <strong>Oglas potvrđen</strong>
                                   {/if}
                                   {if {$elem->getstatus_potvrdenosti()}==4}
                                   <strong>Oglas odbijen</strong>
                                   {/if}
                               </td>
                               </tr>
                           {/foreach}
                            </tbody>
                            </table>
                    {/if}
                
           </div> 
    </article>
    </div>


