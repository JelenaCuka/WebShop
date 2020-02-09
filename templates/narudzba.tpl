<h2 id="naslovSekcije" class="grupiranjeVeciEkrani">Dobro došli!</h2>
    <div id="sadrzajContent" class="grupiranjeVeciEkrani PopraviPoravnanje">
        <div id="porukeUpozorenja" class="Upozorenja sticky">
            {if isset({$greska})}
                {foreach from=$greska key=kljuc item=elem}
                    <p>{$elem}</p>
                {/foreach}
            {/if}
        </div>
        <aside id="pozicijaOglas1" class="PopraviPoravnanje">
            <a class="gumb" href="kategorije.php"><div class="gumb">Povratak</div></a>

           <div class="container">
            <div id="slider">
                <ul class="slides">
                        {if !empty({$oglasiLok7})}
                                                     {foreach from=$oglasiLok7 key=kljuc item=elem}
                                                             <figure class="slides slide">
                                                                 <a href="{$elem->geturl_web_stranica_otvori()}" class="KliknutOglas" id="{$elem->getidoglas()}" target="_blank">
                                                             <img class="slide" src="slike/{$elem->getslika()}" class="">
                                                              </a>
                                                             <figcaption>{$elem->getnaziv()}</figcaption>
                                                         </figure>
                                                     {/foreach}
                        {else}
                        {if !empty({$minVO7})}Ovdje možete kupiti oglas po cijeni {$minVO7} {/if}
                        {/if}
                </ul>
            </div>
        </div>
            
            
            
            
            </aside>
            <article class="PopraviPoravnanje">
                <h2>Tvoja narudžba:</h2>
                <div id="narudzba" class="opisDuzi grupiranjeParagrafa PopraviPoravnanje">
                    {*DODATI PREDMETE KOLIČINU I X*}
                        {if !empty({$naruzdbaA})}
                            <form action="" method="post" id="narudbaObrazac" class="grupiranjeVeciEkrani novalidate">
                                <fieldset class="regFieldset">
                                    <legend class="regLegend">Uredi narudžbu:</legend>
                                    <table class="tablicaDodaj">
                                        {foreach from=$naruzdbaA key=kljuc item=elem}
                                        <tr>
                                            <th><label class="regLabel" for="{$elem->getId()}" id="">{$elem->getNaziv()} (Cijena/kom:{$elem->IzracunajCijenu()})</label><span id="{$elem->getId()}" class="narudbaInput ukloniPredmet">X</span><br /></th>
                                            <td><input class="regInput narudbaInput"  type="number" name="{$elem->getId()}" id="{$elem->getId()}" min="1" max="10" value="1" >
                                                </td>
                                        </tr>
                                        {/foreach}
                                    
                                    <p class="linkRegistracija">
                                        {if !empty({$naruzdbaA})}
                                            <tr class="regRed">
                                                <th><label class="regLabel" for="" id="">Ime:</label></th>
                                                <td><input class="regInput"   type="text" name="ime"><br /></td>
                                            </tr>
                                            <tr class="regRed">
                                                <th><label class="regLabel" for="" id="">Prezime: </label></th>
                                                <td><input class="regInput" type="text" name="prezime"><br /></td>
                                            </tr>
                                            <tr class="regRed">
                                                <th><label class="regLabel" for="" id="">Adresa: </label></th>
                                                <td><input class="regInput" type="text" name="adresa"><br /></td>
                                            </tr>
                                    </table>
                                        {/if}
                                    </p>
                                    <input class="regInput" type="submit" value="Kreiraj narudžbu" name="submitNarudba" />
                                </fieldset>
                            </form>
                        {else}
                            <div class="infoDiv grupiranjeVeciEkrani PopraviPoravnanje">
                               <p>Nema stavki u narudžbi</p> 
                            </div>
                        {/if}</div>    
                
           </article>
                <div id="pozicijaOglas2">
                    <div class="container">
            <div id="slider">
                <ul class="slides">
                        {if !empty({$oglasiLok8})}
                                                     {foreach from=$oglasiLok8 key=kljuc item=elem}
                                                             <figure class="slides slide">
                                                                 <a href="{$elem->geturl_web_stranica_otvori()}" class="KliknutOglas" id="{$elem->getidoglas()}">
                                                             <img class="slide" src="slike/{$elem->getslika()}" class="">
                                                              </a>
                                                             <figcaption>{$elem->getnaziv()}</figcaption>
                                                         </figure>
                                                     {/foreach}
                        {else}
                        {if !empty({$minVO8})}Ovdje možete kupiti oglas po cijeni {$minVO8} KN {/if}
                        {/if}
                </ul>
            </div>
        </div>
                </div>    
    </div>
