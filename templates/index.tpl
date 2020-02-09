<h2 id="naslovSekcije" class="grupiranjeVeciEkrani">Dobro došli!</h2>
    <div id="sadrzajContent" class="grupiranjeVeciEkrani PopraviPoravnanje">
        <aside id="pozicijaOglas1" class="PopraviPoravnanje">
           <div class="container">
            <div id="slider">
                <ul class="slides">
                        {if !empty({$oglasiLok1})}
                                                     {foreach from=$oglasiLok1 key=kljuc item=elem}
                                                             <figure class="slides slide">
                                                                 <a href="{$elem->geturl_web_stranica_otvori()}" class="KliknutOglas" id="{$elem->getidoglas()}">
                                                             <img class="slide" src="slike/{$elem->getslika()}" class="">
                                                              </a>
                                                             <figcaption>{$elem->getnaziv()}</figcaption>
                                                         </figure>
                                                     {/foreach}
                        {else}
                        {if !empty({$minVO1})}Ovdje možete kupiti oglas po cijeni {$minVO1} {/if}
                        {/if}
                </ul>
            </div>
        </div>
            <div class="container">
            <div id="slider">
                <ul class="slides">
                        {if !empty({$oglasiLok2})}
                                                     {foreach from=$oglasiLok2 key=kljuc item=elem}
                                                             <figure class="slides slide">
                                                                 <a href="{$elem->geturl_web_stranica_otvori()}" class="KliknutOglas" id="{$elem->getidoglas()}">
                                                             <img class="slide" src="slike/{$elem->getslika()}" class="">
                                                              </a>
                                                             <figcaption>{$elem->getnaziv()}</figcaption>
                                                         </figure>
                                                     {/foreach}
                        {else}
                        {if !empty({$minVO2})}Ovdje možete kupiti oglas po cijeni {$minVO2} KN {/if}
                        {/if}
                </ul>
            </div>
        </div>
        </aside>
        <article class="PopraviPoravnanje">
                <h2>Neki tekst</h2>
                <div class="opisDuzi grupiranjeParagrafa PopraviPoravnanje">
                    <p>Dobro dosli na stranicu online trgovine Kalelarga koja je najbolja online trgovina koja postoji. </p>
                    <p>Uživajte u korištenju naše trgovine na kojoj možete kupiti razne najbolje proizvode ili kupiti oglašavanje na našoj stranici! Za oglašavanje potrebno se registrirati! </p>
                    <p>Ova trgovina napravljena je za potrebe projekta iz kolegija WebDiP! HF</p>
                </div> 
                

        </article>  
                        <div id="pozicijaOglas3">
           <div class="container">
            <div id="slider">
                <ul class="slides">
                        {if !empty({$oglasiLok3})}
                                                     {foreach from=$oglasiLok3 key=kljuc item=elem}
                                                             <figure class="slides slide">
                                                                 <a href="{$elem->geturl_web_stranica_otvori()}" class="KliknutOglas" id="{$elem->getidoglas()}">
                                                             <img class="slide" src="slike/{$elem->getslika()}" class="">
                                                              </a>
                                                             <figcaption>{$elem->getnaziv()}</figcaption>
                                                         </figure>
                                                     {/foreach}
                        {else}
                        {if !empty({$minVO3})}Ovdje možete kupiti oglas po cijeni {$minVO3} KN {/if}
                        {/if}
                </ul>
            </div>
        </div>
        </div>  
    </div>