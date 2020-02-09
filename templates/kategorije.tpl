<h2 id="naslovSekcije" class="grupiranjeVeciEkrani">Dobro došli!</h2>
    <div id="sadrzajContent" class="grupiranjeVeciEkrani PopraviPoravnanje">
        <aside id="pozicijaOglas1" class="PopraviPoravnanje">
            <a class="gumb" href="narudzba.php"><div class="gumb">Uredi i dovrši narudžbu</div></a>
            <a class="gumb" href="narudbaPregled.php"><div class="gumb">Pregled narudžbi</div></a>
            
            
           <div class="container">
            <div id="slider">
                <ul class="slides">
                        {if !empty({$oglasiLok4})}
                                                     {foreach from=$oglasiLok4 key=kljuc item=elem}
                                                             <figure class="slides slide">
                                                                 <a href="{$elem->geturl_web_stranica_otvori()}" class="KliknutOglas" id="{$elem->getidoglas()}">
                                                             <img class="slide" src="slike/{$elem->getslika()}" class="">
                                                              </a>
                                                             <figcaption>{$elem->getnaziv()}</figcaption>
                                                         </figure>
                                                     {/foreach}
                        {else}
                        {if !empty({$minVO4})}Ovdje možete kupiti oglas po cijeni {$minVO4} {/if}
                        {/if}
                </ul>
            </div>
        </div>
            <div class="container">
            <div id="slider">
                <ul class="slides">
                        {if !empty({$oglasiLok5})}
                                                     {foreach from=$oglasiLok5 key=kljuc item=elem}
                                                             <figure class="slides slide">
                                                                 <a href="{$elem->geturl_web_stranica_otvori()}" class="KliknutOglas" id="{$elem->getidoglas()}">
                                                             <img class="slide" src="slike/{$elem->getslika()}" class="">
                                                              </a>
                                                             <figcaption>{$elem->getnaziv()}</figcaption>
                                                         </figure>
                                                     {/foreach}
                        {else}
                        {if !empty({$minVO5})}Ovdje možete kupiti oglas po cijeni {$minVO5} KN {/if}
                        {/if}
                </ul>
            </div>
        </div>
            </aside>
            <article class="PopraviPoravnanje">
                <h2>kategorije</h2>
                <div id="kategorije" class="opisDuzi grupiranjeParagrafa PopraviPoravnanje">
                    <ul>
                {foreach from=$kategorijeA key=kljuc item=elem}
                    <li id="k{$elem->getKategorijaId()}" class="kategorijeP">{$elem->getKategorija()}</li>
                {/foreach}</ul>
                <div><label class="regLabel">Pretražite(naziv): </label><input name="pretraziProizvod" class="regInput" id="pretraziProizvod" type="text"></div>
                <div id="predmeti">
                    
                </div>
                <a class="gumb" href="" id="dodajKosarica"><div class="gumb">Dodaj u "košaricu"</div></a><span id="porukaDodanoKosarica"></span>
                
                
                </div>    
                
           </article>
                <h3>Povijest pregledavanja:</h3>
            <div id="dodajPovijest">(prazno)
            </div>
                        <div id="pozicijaOglas3">
           <div class="container">
            <div id="slider">
                <ul class="slides">
                        {if !empty({$oglasiLok6})}
                                                     {foreach from=$oglasiLok6 key=kljuc item=elem}
                                                             <figure class="slides slide">
                                                                 <a href="{$elem->geturl_web_stranica_otvori()}" class="KliknutOglas" id="{$elem->getidoglas()}">
                                                             <img class="slide" src="slike/{$elem->getslika()}" class="">
                                                              </a>
                                                             <figcaption>{$elem->getnaziv()}</figcaption>
                                                         </figure>
                                                     {/foreach}
                        {else}
                        {if !empty({$minVO6})}Ovdje možete kupiti oglas po cijeni {$minVO6} KN {/if}
                        {/if}
                </ul>
            </div>
        </div>
        </div>  
    </div>