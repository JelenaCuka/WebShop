<h2 class="grupiranjeVeciEkrani">Popis ocjena</h2>
            <div id="porukeUpozorenja" class="Upozorenja sticky">
            {if !empty({$greska})}
                {foreach from=$greska key=kljuc item=gr}{*{$greska}*}
                    <p>{$gr}</p>
                {/foreach}
            {/if}
            </div>
            <div class="frame_div grupiranjeVeciEkrani">
                <form action="{$aktivnaSkriptaR}" method="post" id="registracijaObrazac2" class="grupiranjeVeciEkrani novalidate">
                    <fieldset class="regFieldset">
                        <legend class="regLegend">Stranica moderatora:</legend>
                        <table id="registracijaTable" class="grupiranjeVeciEkrani tablica1 tablicaScroll ">
                            <tr class="regRed">
                                <th><label class="regLabel" for="" id="">Naziv: </label></th>
                                <td><input class="regInput" type="text"  name="Pnaziv" id="" ></td>
                            </tr>
                            <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi kategoriju</label></th>
                            
                                <td><select class="obInput" id="kategorijaAzurID" name="Pkategorija" >
                                        {if isset({$kategorijeModerator})}
                                            {if !empty({$kategorijeModerator})}
                                            {foreach from=$kategorijeModerator key=kljuc item=elem}
                                                <option value="{$elem->getKategorijaId()}">{$elem->getKategorija()}</option>
                                         {/foreach}
                                        {/if}
                                        {/if}
                                        
                                    </select><br /></td>
                            </tr>                        
                            <tr class="Red" id="">
                                    <th><label class="regLabel" for="" id="">Opis: </label></th>
                                    <td id=""><textarea class="obInput" rows="20" cols="150" id="unos_opisa" name="Popis" placeholder="Opis predmeta..."></textarea><br /></td>
                            </tr>
                            <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Cijena: </label></th>
                                <td><input class="regInput" type="text"  name="Pcijena" id="prezime_registracija" ></td>
                            </tr>
                            
                        </table>
                        
                    </fieldset>
                        <input class="regInput" type="submit" value="Dodaj predmet" name="submitDodajPredmet" />
                </form>
                <form action="{$aktivnaSkriptaR}" method="post" id="registracijaObrazac2" class="grupiranjeVeciEkrani novalidate">
                    
                            <fieldset class="regFieldset">
                                <legend class="regLegend">Dodaj akciju:</legend>
                                <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi predmet</label></th>
                            
                                <td><select class="obInput" id="kategorijaAzurID" name="Apredmet" >
                                        {if isset({$predmetiModeratora})}
                                            {if !empty({$predmetiModeratora})}
                                            {foreach from=$predmetiModeratora key=kljuc item=elem}
                                                <option value="{$elem->getId()}">{$elem->getNaziv()}</option>
                                         {/foreach}
                                         {/if}
                                        {/if}
                                    </select><br /></td>
                            </tr> 
                                <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Iznos popusta (%): </label></th>
                                <td><input class="regInput" type="number" min="1" max="99"  name="PApopust" id="prezime_registracija" ></td>
                                </tr>
                                <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Vrijedi OD: </label></th>
                                <td><input class="regInput" type="text"  name="PAod" id="prezime_registracija" placeholder="gggg-mm-dd" ></td>
                                </tr>
                                <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Vrijedi DO: </label></th>
                                <td><input class="regInput" type="text"  name="PAdo" id="prezime_registracija" placeholder="gggg-mm-dd" ></td>
                                </tr>
                                
                            </fieldset>
                        <input class="regInput" type="submit" value="Dodaj akciju" name="submitDodajPredmetAkcija" />
                </form>
                                    <form action="{$aktivnaSkriptaR}" method="post" id="registracijaObrazac2" class="grupiranjeVeciEkrani novalidate">
                    
                            <fieldset class="regFieldset">
                                <legend class="regLegend">Dodaj vrstu oglasa:</legend>
                                <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Naziv: </label></th>
                                <td><input class="regInput" type="text" name="VOnaziv" id="prezime_registracija" ></td>
                                </tr>
                                <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Brzina izmjene(sec) : </label></th>
                                <td><input class="regInput" type="number" min="1" max="86400"  name="VObrzinaIzmjeneSec" id="prezime_registracija" ></td>
                                </tr>
                                <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Trajanje prikazivanja(h) : </label></th>
                                <td><input class="regInput" type="number" min="1" max="720"  name="VOtrajanjePrikazivanjaSati" id="prezime_registracija" ></td>
                                </tr>
                                <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Cijena : </label></th>
                                <td><input class="regInput" type="text"  name="VOcijena" id="prezime_registracija" ></td>
                                </tr>
                                <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi poziciju</label></th>
                            
                                <td><select class="obInput regInput" id="kategorijaAzurID" name="VOpozicijaOglasa" >
                                        {if isset({$pozicijeModeratora})}
                                            {if !empty({$pozicijeModeratora})}
                                                {foreach from=$pozicijeModeratora key=kljuc item=elem}
                                                    <option value="{$elem->getidpozicija_oglasa()}">POZICIJA{$elem->getidpozicija_oglasa()}({$elem->getstranica()}-lokacija{$elem->getlokacija()})</option>
                                             {/foreach}
                                         {/if}
                                        {/if}
                                    </select><br /></td>
                            </tr>
                            </fieldset>
                        <input class="regInput" type="submit" value="Dodaj vrstu oglasa" name="submitDodajVrstaOglasa" />
                </form>
                
            </div>
