<h2 class="grupiranjeVeciEkrani">Dobro došli na stranicu oglasa</h2>
            <section id="galerijaSlika" class="PopraviPoravnanje SlikeiVideo">
                 {if !empty({$ispisVrsteOglasa})}
                        <h2>Pregled vrsta oglasa</h2>
                            <table class="grupiranjeVeciEkrani tablica1 tablicaScroll ">  
                            <caption>Vrste oglasa!</caption>
                            <thead class="tablica1_zaglavlje">
                                <tr>
                                    <th><a href="" >Naziv</a><br /></th>
                                    <th><a href="" >Brzina izmjene sekunde</a><br /></th>
                                    <th>Duljina trajanja prikazivanja(h)</th>
                                    <th>Cijena</th>
                                    <th>Dimenzija širina</th>
                                    <th>Dimenzija visina</th>
                                    <th>Broj lokacije</th>
                                    <th>Stranica</th>
                                </tr>
                            </thead>
                            <tbody>
                            {foreach from=$ispisVrsteOglasa key=kljuc item=elem}
                               <tr class="Red">
                               <td>{$elem->getnaziv()}</td> 
                               <td>{$elem->getbrzina_izmjene_sec()} sekundi</td>
                               <td>{$elem->getduljina_trajanja_prikazivanja_h()}sati</td> 
                               <td>{$elem->getcijena()}KN</td>
                               <td>{$elem->getdimenzija_oglasa_sirina()}px</td> 
                               <td>{$elem->getdimenzija_oglasa_visina()}px</td>
                               <td>{$elem->getbroj()}</td> 
                               <td>{$elem->geturl()}</td>
                               </tr>
                           {/foreach}
                            </tbody>
                            </table>
                        {else}
                            <h2>Vrste oglasa</h2>
                            <div class="infoDiv grupiranjeVeciEkrani PopraviPoravnanje">
                               <p>Nema vrsta oglasa???</p> 
                            </div>
                        {/if}
                 <h2>ZAHTJEV NOVI OGLAS FORMA TO DO</h2>
                 <div id="porukeUpozorenja" class="Upozorenja sticky">
            {if isset({$greska})}
            {if !empty({$greska})}    
            {foreach from=$greska key=kljuc item=elem}
                <p>{$elem}</p>
            {/foreach}
            {/if}
            {/if}
            </div>
            <form class="grupiranjeVeciEkrani obrazacKlasa" action="oglasi.php" method="post" id="dodavanje_sadrzaja_obrazac" novalidate enctype="multipart/form-data" >
                <fieldset class="obFieldset pozadina2">
                    <legend class="obLegend pozadina2">Kreiraj svoj oglas!</legend>
                    <table id="obTable">
                         <tr>
                            <th> <label class="obLabel" for="odaberi_nesto">Odaberi vrstu oglasa! </label></th>
                            <td><select class="obInput " id="odaberi_nesto" name="VOvrsta" >
                                    {if !empty({$ispisVrsteOglasa})}
                                        {foreach from=$ispisVrsteOglasa key=kljuc item=elem}
                                            <option value="{$elem->getidvrsta_oglasa()}">{$elem->getnaziv()}({$elem->getbrzina_izmjene_sec()}s,{$elem->getduljina_trajanja_prikazivanja_h()}h,{$elem->getcijena()}kn,({$elem->getdimenzija_oglasa_sirina()}x{$elem->getdimenzija_oglasa_visina()}px),{$elem->geturl()},lok{$elem->getbroj()})</option>
                                        {/foreach}
                                    {/if}
                                </select><br /></td>
                        </tr>
                        <tr>
                            <th><label class="obLabel" for="" id="">Naziv </label></th>
                            <td><input class="obInput" type="text" id="" name="VOnaziv" ><br /></td>
                        </tr>
                        <tr>
                            <th><label class="obLabel" for="unos_opisa" id="unos_opisa_labela">Opis </label></th>
                            <td><textarea class="obInput" rows="40" cols="60" id="unos_opisa" name="VOopis" placeholder="Ovo je mjesto na kojem trebate opisati vaše iskustvo s željenim proizvodom..."></textarea><br /></td>
                        </tr>
                        <tr>
                            <th><label class="obLabel" for="" id="unos_opisa_labela">URL do stranice na Web-u </label></th>
                            <td><input class="obInput" type="text" id="" name="VOurl" ><br /></td>
                        </tr>
                        <tr>
                            <th><label class="obLabel" for="VOslika" id="">Slika </label></th>
                            <td><input class="obInput" type="file" id="VOslika" name="VOslika" ><br /></td>
                        </tr>
                        <tr>
                            <th> <label class="obLabel" for="unos_datum_vrijeme">Aktivan OD</label></th>
                            <td><input class="obInput " type="text" name="VOod" id="VOod" placeholder="gggg-mm-dd hh:mm:ss"><br /></td>
                        </tr>
                    </table>
                </fieldset><br />
                
                <input class="obInput" type="submit" value="Dodaj oglas!" name="submitOglas">
            </form>
                 <h2>POPIS SVOJIH ZAHTJEVA ZA OGLASE</h2>
            <section id="galerijaSlika" class="PopraviPoravnanje SlikeiVideo">
                <h2>Tvoji oglasi!</h2>
                {if !empty({$ispisOglasiKorisnika})}
                
                    {foreach from=$ispisOglasiKorisnika key=kljuc item=elem}
                        <div class="galerijaSlike">
                        <figure><img src="slike/{$elem->getslika()}" alt="slika1Alt"><figcaption>{$elem->getnaziv()}</figcaption></figure>
                        <div class="XD">
                            {if {$elem->getstatus_potvrdenosti()}==1}
                                <p><strong>Status:</strong> Potvrđeno</p>
                            {/if}
                            {if {$elem->getstatus_potvrdenosti()}==0}
                                <p><strong>Status:</strong> Čekanje</p>
                            {/if}
                            <p><strong>Opis:</strong>{$elem->getopis()}</p>
                            <p><a href="{$elem->geturl_web_stranica_otvori()}" target="_blank">URL:{$elem->geturl_web_stranica_otvori()}</a></p>
                            <p><strong>Od:</strong>{$elem->getpocetak_prikazivanja()}<strong>Do:</strong>{$elem->getkraj_prikazivanja()}</p>
                            <p><strong>Broj klikova:</strong>{$elem->getbroj_klikova() }</p>
                        </div>
                        </div>
                    {/foreach}
                {/if}
            </section>
            </section>

