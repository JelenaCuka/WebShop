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
        
        <aside id="pozicijaOglas1" class="PopraviPoravnanje">
            <a class="gumb" href="kategorije.php"><div class="gumb">Povratak</div></a>
            </aside>
            <article class="PopraviPoravnanje">
                <h2>POPIS NARUDŽBI:</h2>
                <div id="narudzba" class="opisDuzi grupiranjeParagrafa PopraviPoravnanje">
                   {if isset({$narudzbeR})}
                    {if !empty({$narudzbeR})}
                        <h2 id="tvojeNarudzbeLink">Tvoje narudžbe</h2>
                            <table class="grupiranjeVeciEkrani tablica1 tablicaScroll">  
                            <caption>Narudzbe</caption>
                            <thead class="tablica1_zaglavlje">
                                <tr>
                                    <th><a href="" >Ime</a><br /></th>
                                    <th><a href="" >Prezime</a><br /></th>
                                    <th>Adresa</th>
                                    <th>Proizvodi</th>
                                    <th>IZNOS UK</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            {foreach from=$narudzbeR key=kljuc item=elem}
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
                               <td>{$elem->getIznos()}KN</td>
                               <td>{if {$elem->getStatus()}==1}Potvrđeno{/if}{if {$elem->getStatus()}==0}Čekanje{/if}{if {$elem->getStatus()}==4}Odbijeno{/if}</td>
                               </tr>
                           {/foreach}
                            
                            
                            </tbody>
                            </table>
                        {else}
                            {if !empty({$tip}) and {$tip}!=0 }
                            <h2>Tvoje narudžbe</h2>
                            <div class="infoDiv grupiranjeVeciEkrani PopraviPoravnanje">
                               <p>Nema narudžbi registrirani</p> 
                            </div>
                            {/if}
                        {/if}
                        {/if}
                        <h2>Anonimni:</h2>
                    {*DODATI PREDMETE KOLIČINU I X*}
                    {if isset({$narudzbe})}
                   
                        {if !empty({$narudzbe})}
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
                                </tr>
                            </thead>
                            <tbody>
                            {foreach from=$narudzbe key=kljuc item=elem}
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
                               <td>{$elem->getIznos()}KN</td>
                               <td>{if {$elem->getStatus()}==1}Potvrđeno{/if}{if {$elem->getStatus()}==0}Čekanje{/if}{if {$elem->getStatus()}==4}Odbijeno{/if}</td>
                              
                               </tr>
                           {/foreach}
                            
                            
                            </tbody>
                            </table>
                        {else}
                            <div class="infoDiv grupiranjeVeciEkrani PopraviPoravnanje">
                               <p>Nema narudzbi anonimni</p> 
                            </div>
                            
                        {/if}</div>
                     {/if}    
           </article>

    </div>

