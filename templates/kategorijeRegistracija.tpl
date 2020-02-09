 <h2 class="grupiranjeVeciEkrani"> Dobro došli na stranicu kategorija</h2>
            <div id="porukeUpozorenja" class="Upozorenja sticky">
            {if isset({$greska})}
            {foreach from=$greska key=kljuc item=elem}
                <p>{$elem}</p>
            {/foreach}
            {/if}
            </div>
            <section >
                <h2 class="grupiranjeVeciEkrani">Kategorije</h2>
                <form action="{$aktivnaSkriptaR}" method="post" id="registracijaObrazac" class="grupiranjeVeciEkrani novalidate">
                    <fieldset class="regFieldset">
                        <legend class="regLegend">Dodaj kategoriju:</legend>
                        
                        <table id="registracijaTable">
                            <tr class="regRed">
                                <th><label class="regLabel" for="kategorijaUnos" id="kategorijaUnos_labela">Naziv:</label></th>
                                <td><input class="regInput"  type="text" name="kategorijaUnos" id="kategorijaUnos"  >
                                    <span id="greskaIme"></span><br /></td>
                            </tr><br /> <span id="SubmitGreske"></span> </td>
                            </tr>
                        </table>
                        <input class="regInput" type="submit" value="Dodaj kategoriju" name="submitKategorijaDodaj" />
                    </fieldset>
                </form>
                <form action="{$aktivnaSkriptaR}" method="post" id="registracijaObrazac2" class="grupiranjeVeciEkrani novalidate">
                    <fieldset class="regFieldset">
                        <legend class="regLegend">Ažuriraj kategoriju:</legend>
                        
                        <table id="registracijaTable">
                            <tr>
                            <th> <label class="obLabel" for="kategorijaAzurID">Odaberi kategoriju </label></th>
                                <td><select class="obInput" id="kategorijaAzurID" name="kategorijaAzurID" >
                                    {foreach from=$kategorijeA key=kljuc item=elem}
                                        <option value="{$elem->getKategorijaId()}">{$elem->getKategorija()}</option>
                                    {/foreach}
                                    </select><br /></td>
                            </tr>
                            <tr class="regRed">
                                
                                <th><label class="regLabel" for="kategorijaAzur" id="kategorijaUnos_labela">Novi naziv:</label></th>
                                <td><input class="regInput"  type="text" name="kategorijaAzur" id="kategorijaAzur"  >
                                    <span id="greskaIme"></span><br /></td>
                            </tr><br /> <span id="SubmitGreske"></span> </td>
                            </tr>
                        </table>
                        <input class="regInput" type="submit" value="Ažuriraj kategoriju" name="submitKategorijaAžuriraj" />
                    </fieldset>
                </form>
                <div class="grupiranjeVeciEkrani">
                    <h2 class="grupiranjeVeciEkrani">Popis</h2>
                    {foreach from=$kategorijeA key=kljuc item=elem}
                        <p class="kispis" id="k{$elem->getKategorijaId()}">{$elem->getKategorija()}<span id="{$elem->getKategorijaId()}" class="ukloniPredmet">X</span></p>
                    {/foreach}
                </div>
            </section>
  

