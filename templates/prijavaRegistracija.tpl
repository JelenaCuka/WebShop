 <h2 class="grupiranjeVeciEkrani"> Dobro došli na stranicu prijave i registracije</h2>
            <div id="porukeUpozorenja" class="Upozorenja sticky">
            {if isset({$greska})}
            {foreach from=$greska key=kljuc item=elem}
                <p>{$elem}</p>
            {/foreach}
            {/if}
            {if isset({$uspjesnaPrijava})}
            {foreach from=$uspjesnaPrijava key=kljuc item=elem}
                <p>{$elem}</p>
            {/foreach}
            {/if}
            </div>
            {if isset($smarty.get.mod) && $smarty.get.mod=="prijava" }
                <section class="gardijentZeleni ">
                <h2 class="grupiranjeVeciEkrani">Prijavi se</h2>
                <form action="{$aktivnaSkriptaP}" method="post" id="prijavaObrazac" class="grupiranjeVeciEkrani" novalidate>
                    <fieldset class="fieldsetBijeli">
                        <legend class="legendBijeli">Prijava:</legend>
                        <label class="labelBijeli" for="korisnicko_ime_prijava" id="korisnicko_ime_prijava_labela">Korisničko ime: </label>
                        <input class="inputBijeli" type="text" name="korisnicko_ime_prijava" id="korisnicko_ime_prijava" value="{$kolacicKorime}" maxlength="20" required="required"><br />
                        <label class="labelBijeli" for="lozinka_prijava" id="lozinka_prijava_labela">Lozinka: </label>
                        <input class="inputBijeli"  type="password" name="password_prijava" id="lozinka_prijava" required="required" ><br />
                        <label class="labelBijeli" for="zapamti_me_prijava">Zapamti me: </label>
                        <input class="inputBijeli" type="checkbox" name="zapamti_me" id="zapamti_me_prijava" checked="checked" /><br />

                        <input type="submit" value="Prijavi se" class="inputBijeli SubmitBotun" name="submitPrijava" />
                        <input type="reset" value="Vrati na inicijalne postavke" class="inputBijeli SubmitBotun" />
                        <input type="submit" value="Trebam novu lozinku" name="submitNovaLozinka" class="inputBijeli SubmitBotun" />
                    </fieldset><br />
                </form>
                    <div class="LoginPrimjeri">
                        <p class="grupiranjeVeciEkrani">Primjer unosa: (TIP - KORIME - LOZINKA)</p>
                        <p id="admin" class="grupiranjeVeciEkrani">ADMIN - a - a </p>
                        <p id="moderator" class="grupiranjeVeciEkrani">MODERATOR - m - m </p>
                        <p id="obicniK" class="grupiranjeVeciEkrani">OBIČNI - o - o </p>
                    </div>    
                
            </section>
            {/if}
            {if isset($smarty.get.mod) && $smarty.get.mod=="registracija" }
            <section >
                <h2 class="grupiranjeVeciEkrani">Registriraj se</h2>
                <form action="{$aktivnaSkriptaR}" method="post" id="registracijaObrazac" class="grupiranjeVeciEkrani novalidate">
                    <fieldset class="regFieldset">
                        <legend class="regLegend">Registracija:</legend>
                        
                        <table id="registracijaTable">
                            <tr class="regRed">
                                <th><label class="regLabel" for="ime_registracija" id="ime_registracija_labela">Ime:</label></th>
                                <td><input class="regInput"  type="text" name="ime" id="ime_registracija"  >
                                    <span id="greskaIme"></span><br /></td>
                            </tr>
                            <tr class="regRed">
                                <th><label class="regLabel" for="prezime_registracija" id="prezime_registracija_labela">Prezime: </label></th>
                                <td><input class="regInput" type="text" name="prezime" id="prezime_registracija" >
                                    <span id="greskaPrezime"></span><br /></td>
                            </tr>
                            <tr class="regRed">
                                <th><label class="regLabel" for="korisnicko_ime_registracija" id="korisnicko_ime_registracija_labela">Korisničko ime: </label></th>
                                <td><input class="regInput" type="text" name="korisnicko_ime" id="korisnicko_ime_registracija" >
                                    <span id="greskaKorime"></span>
                                    <br /></td>
                            </tr>
                            <tr class="regRed">
                                <th><label class="regLabel" for="email_registracija" id="email_registracija_labela">Email: </label></th>
                                <td><input class="regInput" type="text" name="email" id="email_registracija" >
                                   <span id="greskaEmail"></span><br /></td>
                            </tr>
                            <tr class="regRed">
                                <th><label class="regLabel" for="adresa_registracija" id="adresa_registracija_labela">Adresa: </label></th>
                                <td><input class="regInput" type="text" name="adresa_registracija" id="adresa_registracija" >
                                    <span id="greskaAdresa"></span><br /></td>
                            </tr>
                            <tr class="regRed">
                                <th><label class="regLabel" for="lozinka_registracija" id="lozinka_registracija_labela">Lozinka: </label></th>
                                <td><input class="regInput" type="password" name="password" id="lozinka_registracija">
                                    <span id="greskaLozinka"></span><br /></td>
                            </tr>
                            <tr class="regRed">
                                <th><label class="regLabel" for="potvrda_lozinke_registracija" id="potvrda_lozinke_registracija_labela">Potvrda lozinke: </label></th>
                                <td><input class="regInput" type="password" name="confirmpassword" id="potvrda_lozinke_registracija" >
                                    <span id="greskaPotvrdaLozinka"></span><br /> <span id="SubmitGreske"></span> </td>
                            </tr>
                        </table>
                        <div class="g-recaptcha" data-sitekey="6LdabV0UAAAAABMEKxUgU0cKW-RIG4sGXA_dJC1E"></div>
                        <p class="linkRegistracija">
                            <a class="LinkKlasa " href="prijavaRegistracija.php?mod=prijava">Prijava</a>
                        </p>
                        <input class="regInput" type="submit" value="Registriraj se" name="submitRegistracija" />
                    </fieldset>
                </form>
            </section>
            {/if}
            {if isset($smarty.get.mod) && $smarty.get.mod=="aktivacija" }
                <section >
                    <h2 class="grupiranjeVeciEkrani">Aktivacija</h2>
                    <article class="PopraviPoravnanje">
                        <div class="opisDuzi grupiranjeParagrafa PopraviPoravnanje">
                            <h2 class="grupiranjeVeciEkrani">Poruka aktivacije</h2>
                            <p>{$porukaAktivacije}</p>
                        </div>               
                    </article>
                </section>
                
            {/if}
            {if isset($smarty.get.mod) && {$odreziParametar}==="aktivacija" }
                <section >
                    <h2 class="grupiranjeVeciEkrani">Aktivacija</h2>
                    <article class="PopraviPoravnanje">
                        <div class="opisDuzi grupiranjeParagrafa PopraviPoravnanje">
                            <h2 class="grupiranjeVeciEkrani">Poruka aktivacije</h2>
                            <p>{$porukaAktivacije}</p>
                        </div>               
                    </article>
                </section>
                
            {/if}

