<?php get_header(); ?>

    <div class="lightbox">
       <h1>S&Eacute; EL PRIMERO EN CONOCER LAS NUEVAS GORRAS DE TUS EQUIPOS FAVORITOS</h1>
       <form action="#" method="post" id="suscribirse">
                <!-- Name -->
                <div class="campo-texto campo-nombre"><input type="text" name="name" placeholder="Nombre" id="name"/><p id="error-nombre">&nbsp;</p></div>
                <!-- Email field (required) -->
                <div class="campo-texto campo-mail"><input type="text" name="email" placeholder="Email" id="email"/><p id="error-email">&nbsp;</div>
                <div class="caja">
                    <p class="amarillo elige">Elige tus equipos favoritos de cada deporte</p>
                    <div id="tabs" >
                        <ul>
                            <li class="tab-fut" style="border-right:0 !important;"><a href="#tabs-1"><img src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/lightbox/tiendas-new-era-futbol.png" alt="futbol">FUTBOL <span class="flecha"></span></a><div></div></li>
                            <li class="tab-nfl" style="border-right:0 !important;"><a href="#tabs-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/lightbox/tiendas-new-era-futbol-NFL.png" alt="nfl">NFL<span class="flecha"></span></a><div></div></li>
                            <li class="tab-nba" style="border-right:0 !important;"><a href="#tabs-3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/lightbox/tiendas-new-era-NBA.png" alt="mlb">NBA<span class="flecha"></span></a><div></div></li>
                            <li class="tab-mlb" style="border-right:0 !important;"><a href="#tabs-4"><img src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/lightbox/tiendas-new-era-MLB.png" alt="mlb">BEISBOL MLB<span class="flecha"></span></a><div></div></li>
                            <li class="tab-lmb" style="border-right:0 !important;"><a href="#tabs-5"><img src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/lightbox/tiendas-new-era-LMB.png" alt="lmb">BEISBOL LMB<span class="flecha"></span></a><div></div></li>
                            <li class="tab-lmp" ><a href="#tabs-6"><img src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/lightbox/tiendas-new-era-LMP.png" alt="lmp">BEISBOL LMP<span class="flecha"></span></a><div></div></li>
                        </ul>
                        <div id="tabs-1" class="futbol">

                            <div class="bloque1">
                                <p>Nacional</p>
                                <div class="grupo grupo-fut-1">
                                    <div class="campo"><input id="webform_futbol_nacional_0" type="checkbox" name="custom_futbol_nacional[]" value="Atlas" /> <label for="webform_futbol_nacional_0"  class="paloma"></label><label for="webform_futbol_nacional_0" class="nombre">Atlas</label></div>
                                    <div class="campo"> <input id="webform_futbol_nacional_1" type="checkbox" name="custom_futbol_nacional[]" value="Chivas" /> <label for="webform_futbol_nacional_1"  class="paloma"></label><label for="webform_futbol_nacional_1" class="nombre">Chivas</label></div>

                                    <div class="campo"><input id="webform_futbol_nacional_3" type="checkbox" name="custom_futbol_nacional[]" value="Gallos" /><label class="paloma" for="webform_futbol_nacional_3"></label> <label for="webform_futbol_nacional_3" class="nombre">Gallos</label></div>
                                     <div class="campo"><input id="webform_futbol_nacional_20" type="checkbox" name="custom_futbol_nacional[]" value="Jaguares" /><label class="paloma" for="webform_futbol_nacional_20" ></label> <label for="webform_futbol_nacional_20" class="nombre">Jaguares</label> </div>

                                </div>
                                <div class="grupo grupo-fut-2">
                                  <!--  <div class="campo"> <input id="webform_futbol_nacional_4" type="checkbox" name="custom_futbol_nacional[]" value="Jaguares" /> <label class="paloma" for="webform_futbol_nacional_4"></label><label for="webform_futbol_nacional_4" class="nombre">Jaguares</label> </div>-->

                                    <div class="campo"><input id="webform_futbol_nacional_6" type="checkbox" name="custom_futbol_nacional[]" value="Necaxa" /> <label class="paloma" for="webform_futbol_nacional_6"></label><label for="webform_futbol_nacional_6" class="nombre">Necaxa</label> </div>
                                      <div class="campo"><input id="webform_futbol_nacional_5" type="checkbox" name="custom_futbol_nacional[]" value="Monarcas" /> <label class="paloma" for="webform_futbol_nacional_5"></label><label for="webform_futbol_nacional_5" class="nombre">Monarcas</label> </div>
                                    <div class="campo"><input id="webform_futbol_nacional_7" type="checkbox" name="custom_futbol_nacional[]" value="Rayados" /><label class="paloma" for="webform_futbol_nacional_7"></label> <label for="webform_futbol_nacional_7" class="nombre">Rayados</label></div>
                                    <div class="campo"> <input id="webform_futbol_nacional_8" type="checkbox" name="custom_futbol_nacional[]" value="Santos" /> <label class="paloma" for="webform_futbol_nacional_8"></label><label for="webform_futbol_nacional_8" class="nombre">Santos</label></div>



                                </div>
                                <div class="grupo grupo-fut-3">
                                       <div class="campo"> <input id="webform_futbol_nacional_9" type="checkbox" name="custom_futbol_nacional[]" value="Tiburones" /> <label class="paloma" for="webform_futbol_nacional_9"></label><label for="webform_futbol_nacional_9" class="nombre">Tiburones</label> </div>
                                     <div class="campo"><input id="webform_futbol_nacional_10" type="checkbox" name="custom_futbol_nacional[]" value="Tigres" /><label class="paloma" for="webform_futbol_nacional_10" ></label> <label for="webform_futbol_nacional_10" class="nombre">Tigres</label> </div>

                                    <div class="campo"><input id="webform_futbol_nacional_11" type="checkbox" name="custom_futbol_nacional[]" value="Xolos" /> <label class="paloma" for="webform_futbol_nacional_11"></label><label for="webform_futbol_nacional_11" class="nombre">Xolos</label> </div>
                                      <div class="campo"> <input id="webform_futbol_nacional_2" type="checkbox" name="custom_futbol_nacional[]" value="Dorados" /> <label class="paloma" for="webform_futbol_nacional_2"></label><label for="webform_futbol_nacional_2" class="nombre">Dorados</label> </div>
                                </div>
                            </div>
                            <div class="bloque2 grupo-fut-4">
                                <p>Internacional</p><div class="campo"><input id="webform_futbol_internacional_0" type="checkbox" name="custom_futbol_internacional[]" value="Manchester United" /> <label class="paloma" for="webform_futbol_internacional_0"></label><label  style="padding-top: 0;" class="nombre" for="webform_futbol_internacional_0">Manchester United</label> </div>
                            </div>
                        </div>
                        <div id="tabs-2" class="nfl">
                            <div class="grupo grupo-nfl-1">
                                <div class="campo"><input id="webform_nfl_0" type="checkbox" name="custom_nfl[]" value="49ers" /><label class="paloma" for="webform_nfl_0"></label> <label for="webform_nfl_0" class="nombre">49ers</label> </div>
                                <div class="campo"><input id="webform_nfl_4" type="checkbox" name="custom_nfl[]" value="Broncos" /> <label class="paloma" for="webform_nfl_4"></label><label for="webform_nfl_4" class="nombre">Broncos</label></div>
                                <div class="campo"><input id="webform_nfl_11" type="checkbox" name="custom_nfl[]" value="Cowboys" /><label class="paloma" for="webform_nfl_11"></label> <label for="webform_nfl_11" class="nombre">Cowboys</label> </div>
                                <div class="campo"><input id="webform_nfl_22" type="checkbox" name="custom_nfl[]" value="Patriotas" /> <label class="paloma" for="webform_nfl_22"></label><label for="webform_nfl_22" class="nombre">Patriots</label></div>
                            </div>

                            <div class="grupo grupo-nfl-2">
                                <div class="campo"><input id="webform_nfl_23" type="checkbox" name="custom_nfl[]" value="Raiders" /><label class="paloma" for="webform_nfl_23"></label> <label for="webform_nfl_23" class="nombre">Raiders</label></div>
                                <div class="campo"><input id="webform_nfl_28" type="checkbox" name="custom_nfl[]" value="Seahawks" /><label class="paloma" for="webform_nfl_28"></label>  <label for="webform_nfl_28" class="nombre">Seahawks</label></div>
                                <div class="campo"><input id="webform_nfl_29" type="checkbox" name="custom_nfl[]" value="Steelers" /> <label class="paloma" for="webform_nfl_29"></label> <label for="webform_nfl_29" class="nombre">Steelers</label> </div>
                                <div class="campo"><input id="webform_nfl_16" type="checkbox" name="custom_nfl[]" value="Green Bay" /> <label class="paloma" for="webform_nfl_16" ></label> <label for="webform_nfl_16" class="nombre">Packers</label> </div>
                            </div>
                            <div class="grupo grupo-nfl-3">
                                <div class="campo"><input id="webform_nfl_1" type="checkbox" name="custom_nfl[]" value="Bears" /> <label class="paloma" for="webform_nfl_1" ></label> <label for="webform_nfl_1" class="nombre">Bears</label> </div>
                                <div class="campo"><input id="webform_nfl_2" type="checkbox" name="custom_nfl[]" value="Bengals" /> <label class="paloma" for="webform_nfl_2" ></label> <label for="webform_nfl_2" class="nombre">Bengals</label></div>
                                <div class="campo"> <input id="webform_nfl_3" type="checkbox" name="custom_nfl[]" value="Bills" /> <label class="paloma" for="webform_nfl_3"></label> <label for="webform_nfl_3" class="nombre">Bills</label> </div>
                                <div class="campo"> <input id="webform_nfl_5" type="checkbox" name="custom_nfl[]" value="Browns" /> <label class="paloma" for="webform_nfl_5" ></label> <label for="webform_nfl_5" class="nombre">Browns</label> </div>
                            </div>
                            <div class="grupo grupo-nfl-4">
                                <div class="campo"><input id="webform_nfl_6" type="checkbox" name="custom_nfl[]" value="Buccaneers" /> <label class="paloma" for="webform_nfl_6"></label> <label for="webform_nfl_6" class="nombre">Buccaneers</label></div>

                                <div class="campo"> <input id="webform_nfl_7" type="checkbox" name="custom_nfl[]" value="Cardinals" /><label class="paloma" for="webform_nfl_7"></label>  <label for="webform_nfl_7" class="nombre">Cardinals</label></div>
                                <div class="campo"> <input id="webform_nfl_8" type="checkbox" name="custom_nfl[]" value="Chargers" /> <label class="paloma"  for="webform_nfl_8" ></label> <label for="webform_nfl_8" class="nombre">Chargers</label> </div>
                                <div class="campo"><input id="webform_nfl_9" type="checkbox" name="custom_nfl[]" value="Chiefs" /> <label class="paloma" for="webform_nfl_9" ></label> <label for="webform_nfl_9" class="nombre">Chiefs</label></div>
                            </div>
                            <div class="grupo grupo-nfl-5">
                                <div class="campo"> <input id="webform_nfl_10" type="checkbox" name="custom_nfl[]" value="Colts" /><label class="paloma" for="webform_nfl_10"></label>  <label for="webform_nfl_10" class="nombre">Colts</label></div>

                                <div class="campo"><input id="webform_nfl_12" type="checkbox" name="custom_nfl[]" value="Dolphins" /> <label class="paloma" for="webform_nfl_12"></label> <label for="webform_nfl_12" class="nombre">Dolphins</label></div>
                                <div class="campo"> <input id="webform_nfl_13" type="checkbox" name="custom_nfl[]" value="Eagles" /><label class="paloma" for="webform_nfl_13" ></label> <label for="webform_nfl_13" class="nombre">Eagles</label></div>
                                <div class="campo"><input id="webform_nfl_14" type="checkbox" name="custom_nfl[]" value="Falcons" /><label class="paloma" for="webform_nfl_14" ></label>  <label for="webform_nfl_14" class="nombre">Falcons</label> </div>
                            </div>
                            <div class="grupo grupo-nfl-6">
                                <div class="campo"><input id="webform_nfl_15" type="checkbox" name="custom_nfl[]" value="Giants" /><label class="paloma" for="webform_nfl_15" ></label>  <label for="webform_nfl_15" class="nombre">Giants</label> </div>

                                <div class="campo"><input id="webform_nfl_17" type="checkbox" name="custom_nfl[]" value="Jaguars" /> <label class="paloma" for="webform_nfl_17" ></label> <label for="webform_nfl_17" class="nombre">Jaguars</label></div>
                                <div class="campo"><input id="webform_nfl_18" type="checkbox" name="custom_nfl[]" value="Jets" /><label class="paloma" for="webform_nfl_18" ></label>  <label for="webform_nfl_18" class="nombre">Jets</label> </div>
                                <div class="campo"><input id="webform_nfl_19" type="checkbox" name="custom_nfl[]" value="Lions" /><label class="paloma" for="webform_nfl_19" ></label>  <label for="webform_nfl_19" class="nombre">Lions</label></div>

                            </div>
                            <div class="grupo grupo-nfl-7">

                                <div class="campo"><input id="webform_nfl_21" type="checkbox" name="custom_nfl[]" value="Panthers" /><label class="paloma" for="webform_nfl_21"></label>  <label for="webform_nfl_21" class="nombre">Panthers</label> </div>
                                <div class="campo"><input id="webform_nfl_24" type="checkbox" name="custom_nfl[]" value="Rams" /> <label class="paloma" for="webform_nfl_24"></label> <label for="webform_nfl_24" class="nombre">Rams</label> </div>
                                <div class="campo"><input id="webform_nfl_25" type="checkbox" name="custom_nfl[]" value="Ravens" /> <label class="paloma" for="webform_nfl_25"></label> <label for="webform_nfl_25" class="nombre">Ravens</label></div>
                                <div class="campo"><input id="webform_nfl_26" type="checkbox" name="custom_nfl[]" value="Redskins" /> <label class="paloma" for="webform_nfl_26"></label> <label for="webform_nfl_26" class="nombre">Redskins</label></div>

                            </div>
                            <div class="grupo grupo-nfl-8">
                                <div class="campo"><input id="webform_nfl_27" type="checkbox" name="custom_nfl[]" value="Saints" /> <label class="paloma" for="webform_nfl_27"></label> <label for="webform_nfl_27" class="nombre">Saints</label> </div>
                                <div class="campo"><input id="webform_nfl_30" type="checkbox" name="custom_nfl[]" value="Texans" /> <label class="paloma" for="webform_nfl_30"></label> <label for="webform_nfl_30" class="nombre">Texans</label> </div>
                                <div class="campo"><input id="webform_nfl_31" type="checkbox" name="custom_nfl[]" value="Titans" /> <label class="paloma" for="webform_nfl_31"></label> <label for="webform_nfl_31" class="nombre">Titans</label> </div>
                                <div class="campo"><input id="webform_nfl_32" type="checkbox" name="custom_nfl[]" value="Vikings" /> <label class="paloma" for="webform_nfl_32"></label> <label for="webform_nfl_32" class="nombre">Vikings</label></div>

                            </div>
                            <div class="navegacion">
                                <div class="div-ant"><a href="#" class="ant-nfl ant" ><</a></div>
                                <div class="div-sig"><a href="#" class="sig-nfl sig">></a></div>
                            </div>
                        </div>
                        <div id="tabs-3" class="nba">
                            <div class="grupo grupo-nba-1">
                                <div class="campo"> <input id="nba1" type="checkbox" name="nba1" value="76ers" /> <label class="paloma" for="nba1"></label> <label for="nba1" class="nombre">76ers</label></div>
                                <div class="campo"> <input id="nba2" type="checkbox" name="nba2" value="Bucks" /> <label class="paloma" for="nba2"></label> <label for="nba2" class="nombre">Bucks</label></div>
                                <div class="campo"> <input id="nba3" type="checkbox" name="nba3" value="Bulls" /> <label class="paloma" for="nba3"></label> <label for="nba3" class="nombre">Bulls</label></div>
                                <div class="campo"> <input id="nba4" type="checkbox" name="nba4" value="Cavaliers" /> <label class="paloma" for="nba4"></label> <label for="nba4" class="nombre">Cavaliers</label></div>
                            </div>
                            <div class="grupo grupo-nba-2">
                                <div class="campo"> <input id="nba5" type="checkbox" name="nba5" value="Celtics" /> <label class="paloma" for="nba5"></label> <label for="nba5" class="nombre">Celtics</label></div>
                                <div class="campo"> <input id="nba6" type="checkbox" name="nba6" value="Clippers" /> <label class="paloma" for="nba6"></label> <label for="nba6" class="nombre">Clippers</label></div>
                                <div class="campo"> <input id="nba7" type="checkbox" name="nba7" value="Grizzlies" /> <label class="paloma" for="nba7"></label> <label for="nba7" class="nombre">Grizzlies</label></div>
                                <div class="campo"> <input id="nba8" type="checkbox" name="nba8" value="Hawks" /> <label class="paloma" for="nba8"></label> <label for="nba8" class="nombre">Hawks</label></div>
                            </div>
                            <div class="grupo grupo-nba-3">
                                <div class="campo"> <input id="nba9" type="checkbox" name="nba9" value="Heat" /> <label class="paloma" for="nba9"></label> <label for="nba9" class="nombre">Heat</label></div>
                                <div class="campo"> <input id="nba10" type="checkbox" name="nba10" value="Hornets" /> <label class="paloma" for="nba10"></label> <label for="nba10" class="nombre">Hornets</label></div>
                                <div class="campo"> <input id="nba11" type="checkbox" name="nba11" value="Jazz" /> <label class="paloma" for="nba11"></label> <label for="nba11" class="nombre">Jazz</label></div>
                                <div class="campo"> <input id="nba12" type="checkbox" name="nba12" value="Kings" /> <label class="paloma" for="nba12"></label> <label for="nba12" class="nombre">Kings</label></div>
                            </div>
                            <div class="grupo grupo-nba-4">
                                <div class="campo"> <input id="nba13" type="checkbox" name="nba13" value="Knicks" /> <label class="paloma" for="nba13"></label> <label for="nba13" class="nombre">Knicks</label></div>
                                <div class="campo"> <input id="nba14" type="checkbox" name="nba14" value="Lakers" /> <label class="paloma" for="nba14"></label> <label for="nba14" class="nombre">Lakers</label></div>
                                <div class="campo"> <input id="nba15" type="checkbox" name="nba15" value="Magic" /> <label class="paloma" for="nba15"></label> <label for="nba15" class="nombre">Magic</label></div>
                                <div class="campo"> <input id="nba16" type="checkbox" name="nba16" value="Mavericks" /> <label class="paloma" for="nba16"></label> <label for="nba16" class="nombre">Mavericks</label></div>
                            </div>
                            <div class="grupo grupo-nba-5">
                                <div class="campo"> <input id="nba17" type="checkbox" name="nba17" value="Nets" /> <label class="paloma" for="nba17"></label> <label for="nba17" class="nombre">Nets</label></div>
                                <div class="campo"> <input id="nba34" type="checkbox" name="nba34" value="Nuggets" /> <label class="paloma" for="nba34"></label> <label for="nba34" class="nombre">Nuggets</label></div>
                                <div class="campo"> <input id="nba18" type="checkbox" name="nba18" value="Pacers" /> <label class="paloma" for="nba18"></label> <label for="nba18" class="nombre">Pacers</label></div>
                                <div class="campo"> <input id="nba19" type="checkbox" name="nba19" value="Pelicans" /> <label class="paloma" for="nba19"></label> <label for="nba19" class="nombre">Pelicans</label></div>

                            </div>

                            <div class="grupo grupo-nba-6">
                                 <div class="campo"> <input id="nba20" type="checkbox" name="nba20" value="Pistons" /> <label class="paloma" for="nba20"></label> <label for="nba20" class="nombre">Pistons</label></div>
                                <div class="campo"> <input id="nba21" type="checkbox" name="nba21" value="Raptors" /> <label class="paloma" for="nba21"></label> <label for="nba21" class="nombre">Raptors</label></div>
                                <div class="campo"> <input id="nba22" type="checkbox" name="nba22" value="Rockets" /> <label class="paloma" for="nba22"></label> <label for="nba22" class="nombre">Rockets</label></div>
                                <div class="campo"> <input id="nba23" type="checkbox" name="nba23" value="Spurs" /> <label class="paloma" for="nba23"></label> <label for="nba23" class="nombre">Spurs</label></div>

                            </div>
                            <div class="grupo grupo-nba-7">
                                <div class="campo"> <input id="nba24" type="checkbox" name="nba24" value="Suns" /> <label class="paloma" for="nba24"></label> <label for="nba24" class="nombre">Suns</label></div>
                                <div class="campo"> <input id="nba25" type="checkbox" name="nba25" value="Thunder" /> <label class="paloma" for="nba25"></label> <label for="nba25" class="nombre">Thunder</label></div>
                                <div class="campo"> <input id="nba26" type="checkbox" name="nba26" value="Timberwolves" /> <label class="paloma" for="nba26"></label> <label for="nba26" class="nombre">Timberwolves</label></div>
                                <div class="campo"> <input id="nba27" type="checkbox" name="nba27" value="Trail Blazers" /> <label class="paloma" for="nba27"></label> <label for="nba27" class="nombre">Trail Blazers</label></div>

                            </div>
                            <div class="grupo grupo-nba-8">
                                <div class="campo"> <input id="nba28" type="checkbox" name="nba28" value="Warriors" /> <label class="paloma" for="nba28"></label> <label for="nba28" class="nombre">Warriors</label></div>
                                <div class="campo"> <input id="nba33" type="checkbox" name="nba33" value="Wizards" /> <label class="paloma" for="nba33"></label> <label for="nba33" class="nombre">Wizards</label></div>
                            </div>
                            <div class="navegacion">
                                <div class="div-ant"><a href="#" class="ant-nba ant" ><</a></div>
                                <div class="div-sig"><a href="#" class="sig-nba sig">></a></div>
                            </div>
                        </div>
                        <div id="tabs-4" class="mlb">
                            <div class="grupo grupo-mlb-1">
                                <div class="campo">  <input id="webform_mlb2_28" type="checkbox" name="custom_mlb2[]" value="Yankees" /> <label class="paloma" for="webform_mlb2_28" ></label> <label for="webform_mlb2_28" class="nombre">Yankees</label></div>
                                <div class="campo"> <input id="webform_mlb2_10" type="checkbox" name="custom_mlb2[]" value="Dodgers" /> <label class="paloma" for="webform_mlb2_10"></label> <label for="webform_mlb2_10" class="nombre">Dodgers</label></div>
                                <div class="campo">  <input id="webform_mlb2_11" type="checkbox" name="custom_mlb2[]" value="Giants" /><label class="paloma" for="webform_mlb2_11"></label> <label for="webform_mlb2_11" class="nombre">Giants</label></div>
                                <div class="campo"> <input id="webform_mlb2_21" type="checkbox" name="custom_mlb2[]" value="Red Sox" /><label class="paloma" for="webform_mlb2_21"></label> <label for="webform_mlb2_21" class="nombre">Red Sox</label> </div>


                            </div>
                            <div class="grupo grupo-mlb-2">
                                  <div class="campo"> <input id="webform_mlb2_4" type="checkbox" name="custom_mlb2[]" value="Blue Jays" /> <label class="paloma" for="webform_mlb2_4"></label> <label for="webform_mlb2_4" class="nombre">Blue Jays</label> </div>
                                <div class="campo"> <input id="webform_mlb2_0" type="checkbox" name="custom_mlb2[]" value="Angels of Anaheim" /> <label class="paloma" for="webform_mlb2_0"></label> <label for="webform_mlb2_0" class="nombre">Angels</label></div>
                                <div class="campo"><input id="webform_mlb2_1" type="checkbox" name="custom_mlb2[]" value="Astros" /><label class="paloma" for="webform_mlb2_1" ></label>  <label for="webform_mlb2_1" class="nombre">Astros</label></div>
                                <div class="campo"><input id="webform_mlb2_2" type="checkbox" name="custom_mlb2[]" value="Athletics" /> <label class="paloma" for="webform_mlb2_2" ></label> <label for="webform_mlb2_2" class="nombre">Athletics</label></div>

                            </div>
                            <div class="grupo grupo-mlb-3">
                                <div class="campo"><input id="webform_mlb2_3" type="checkbox" name="custom_mlb2[]" value="Bay Rays" /><label class="paloma" for="webform_mlb2_3"></label>  <label for="webform_mlb2_3" class="nombre">Rays</label></div>
                                <div class="campo"><input id="webform_mlb2_5" type="checkbox" name="custom_mlb2[]" value="Braves" /> <label class="paloma" for="webform_mlb2_5"></label> <label for="webform_mlb2_5" class="nombre">Braves</label></div>
                                <div class="campo"><input id="webform_mlb2_6" type="checkbox" name="custom_mlb2[]" value="Brewers" /> <label class="paloma" for="webform_mlb2_6" ></label> <label for="webform_mlb2_6" class="nombre">Brewers</label> </div>
                                <div class="campo"><input id="webform_mlb2_7" type="checkbox" name="custom_mlb2[]" value="Cardinals" /><label class="paloma"  for="webform_mlb2_7"></label>  <label for="webform_mlb2_7" class="nombre">Cardinals</label> </div>

                            </div>
                            <div class="grupo grupo-mlb-4">
                                <div class="campo"><input id="webform_mlb2_8" type="checkbox" name="custom_mlb2[]" value="Cubs" /><label class="paloma" for="webform_mlb2_8"></label> <label for="webform_mlb2_8" class="nombre">Cubs</label></div>
                                <div class="campo"><input id="webform_mlb2_9" type="checkbox" name="custom_mlb2[]" value="Diamondbacks" /> <label class="paloma" for="webform_mlb2_9" ></label> <label for="webform_mlb2_9" class="nombre">Diamondbacks</label></div>
                                <div class="campo"><input id="webform_mlb2_12" type="checkbox" name="custom_mlb2[]" value="Indians" /> <label class="paloma"  for="webform_mlb2_12" ></label> <label for="webform_mlb2_12" class="nombre">Indians</label></div>
                                <div class="campo"><input id="webform_mlb2_13" type="checkbox" name="custom_mlb2[]" value="Mariners" /> <label class="paloma"  for="webform_mlb2_13" ></label> <label for="webform_mlb2_13" class="nombre">Mariners</label> </div>

                            </div>
                            <div class="grupo grupo-mlb-5">
                                <div class="campo"><input id="webform_mlb2_14" type="checkbox" name="custom_mlb2[]" value="Marlins" /> <label class="paloma" for="webform_mlb2_14" ></label> <label for="webform_mlb2_14" class="nombre">Marlins</label></div>
                                <div class="campo"><input id="webform_mlb2_15" type="checkbox" name="custom_mlb2[]" value="Mets" /> <label class="paloma" for="webform_mlb2_15"></label> <label for="webform_mlb2_15" class="nombre">Mets</label> </div>
                                 <div class="campo"><input id="webform_mlb2_30" type="checkbox" name="custom_mlb2[]" value="Nationals" /> <label class="paloma" for="webform_mlb2_30"></label> <label for="webform_mlb2_30" class="nombre">Nationals</label> </div>
                                <div class="campo"><input id="webform_mlb2_16" type="checkbox" name="custom_mlb2[]" value="Orioles" /> <label class="paloma" for="webform_mlb2_16"></label> <label for="webform_mlb2_16" class="nombre">Orioles</label> </div>


                            </div>
                            <div class="grupo grupo-mlb-6">
                                <div class="campo"><input id="webform_mlb2_17" type="checkbox" name="custom_mlb2[]" value="Padres" /><label class="paloma"  for="webform_mlb2_17"></label>  <label for="webform_mlb2_17" class="nombre">Padres</label> </div>
                                <div class="campo"><input id="webform_mlb2_18" type="checkbox" name="custom_mlb2[]" value="Phillies" /> <label class="paloma"  for="webform_mlb2_18"></label> <label for="webform_mlb2_18" class="nombre">Phillies</label> </div>
                                <div class="campo"><input id="webform_mlb2_19" type="checkbox" name="custom_mlb2[]" value="Pirates" /> <label class="paloma" for="webform_mlb2_19" ></label> <label for="webform_mlb2_19" class="nombre">Pirates</label> </div>
                                <div class="campo"><input id="webform_mlb2_20" type="checkbox" name="custom_mlb2[]" value="Rangers" /> <label class="paloma" for="webform_mlb2_20"></label> <label for="webform_mlb2_20" class="nombre">Rangers</label> </div>


                            </div>
                            <div class="grupo grupo-mlb-7">
                                 <div class="campo"><input id="webform_mlb2_22" type="checkbox" name="custom_mlb2[]" value="Reds" /> <label class="paloma" for="webform_mlb2_22" ></label> <label for="webform_mlb2_22" class="nombre">Reds</label> </div>
                                <div class="campo"><input id="webform_mlb2_23" type="checkbox" name="custom_mlb2[]" value="Rockies" /> <label class="paloma" for="webform_mlb2_23"></label> <label for="webform_mlb2_23" class="nombre">Rockies</label> </div>
                                <div class="campo"><input id="webform_mlb2_24" type="checkbox" name="custom_mlb2[]" value="Royals" /> <label class="paloma" for="webform_mlb2_24"></label> <label for="webform_mlb2_24" class="nombre">Royals</label> </div>
                                <div class="campo"><input id="webform_mlb2_25" type="checkbox" name="custom_mlb2[]" value="Tigers" /> <label class="paloma" for="webform_mlb2_25" ></label> <label for="webform_mlb2_25" class="nombre">Tigers</label> </div>

                            </div>
                            <div class="grupo grupo-mlb-7">
                                  <div class="campo"><input id="webform_mlb2_26" type="checkbox" name="custom_mlb2[]" value="Twins" /><label class="paloma" for="webform_mlb2_26"></label>  <label for="webform_mlb2_26" class="nombre">Twins</label> </div>
                                <div class="campo"><input id="webform_mlb2_27" type="checkbox" name="custom_mlb2[]" value="White Sox" /><label class="paloma" for="webform_mlb2_27"></label>  <label for="webform_mlb2_27" class="nombre">White Sox</label> </div>
                            </div>
                            <div class="navegacion">
                                <div class="div-ant"><a href="#" class="ant-mlb ant"><</a></div>
                                <div class="div-sig"><a href="#" class="sig-mlb sig">></a></div>
                            </div>
                        </div>
                        <div id="tabs-5" class="lmb">
                            <div class="grupo">
                                <div class="campo"><input id="webform_lmb_3" type="checkbox" name="custom_lmb[]" value="Diablos" /> <label class="paloma" for="webform_lmb_3"></label> <label for="webform_lmb_3" class="nombre">Diablos</label></div>
                                <div class="campo"><input id="webform_lmb_12" type="checkbox" name="custom_lmb[]" value="Sultanes" /> <label class="paloma" for="webform_lmb_12"></label> <label for="webform_lmb_12" class="nombre">Sultanes</label> </div>
                                <div class="campo"><input id="webform_lmb_13" type="checkbox" name="custom_lmb[]" value="Tigres" /> <label class="paloma" for="webform_lmb_13" ></label> <label for="webform_lmb_13" class="nombre">Tigres</label> </div>
                                <div class="campo"><input id="webform_lmb_14" type="checkbox" name="custom_lmb[]" value="Toros" /> <label class="paloma" for="webform_lmb_14"></label> <label for="webform_lmb_14" class="nombre">Toros</label></div>
                            </div>

                            <div class="grupo">

                                <div class="campo"><input id="webform_lmb_0" type="checkbox" name="custom_lmb[]" value="Acereros" /><label class="paloma" for="webform_lmb_0"></label>  <label for="webform_lmb_0" class="nombre">Acereros</label> </div>
                                <div class="campo"><input id="webform_lmb_1" type="checkbox" name="custom_lmb[]" value="Broncos" /> <label class="paloma" for="webform_lmb_1"></label> <label for="webform_lmb_1" class="nombre">Broncos</label></div>
                                <div class="campo"><input id="webform_lmb_2" type="checkbox" name="custom_lmb[]" value="Delfines" /><label class="paloma" for="webform_lmb_2"></label> <label for="webform_lmb_2" class="nombre">Delfines</label> </div>
                                <div class="campo"><input id="webform_lmb_4" type="checkbox" name="custom_lmb[]" value="Guerreros" /> <label class="paloma"  for="webform_lmb_4"></label> <label for="webform_lmb_4" class="nombre">Guerreros</label></div>

                            </div>
                            <div class="grupo">
                                <div class="campo"><input id="webform_lmb_5" type="checkbox" name="custom_lmb[]" value="Leones" /><label class="paloma" for="webform_lmb_5" ></label>  <label for="webform_lmb_5" class="nombre">Leones</label> </div>
                                <div class="campo"><input id="webform_lmb_6" type="checkbox" name="custom_lmb[]" value="Olmecas" /> <label class="paloma" for="webform_lmb_6" ></label> <label for="webform_lmb_6" class="nombre">Olmecas</label> </div>
                                <div class="campo"><input id="webform_lmb_7" type="checkbox" name="custom_lmb[]" value="Pericos" /> <label class="paloma" for="webform_lmb_7"></label> <label for="webform_lmb_7" class="nombre">Pericos</label> </div>
                                <div class="campo"><input id="webform_lmb_8" type="checkbox" name="custom_lmb[]" value="Piratas" /> <label class="paloma" for="webform_lmb_8" ></label> <label for="webform_lmb_8" class="nombre">Piratas</label></div>

                            </div>
                            <div class="grupo">
                                <div class="campo"><input id="webform_lmb_9" type="checkbox" name="custom_lmb[]" value="Rieleros" /><label class="paloma" for="webform_lmb_9"></label> <label for="webform_lmb_9" class="nombre">Rieleros</label> </div>
                                <div class="campo"><input id="webform_lmb_10" type="checkbox" name="custom_lmb[]" value="Rojos" /><label class="paloma" for="webform_lmb_10"></label>  <label for="webform_lmb_10" class="nombre" style="width: 130px;">Rojos del &Aacute;guila</label> </div>
                                <div class="campo"><input id="webform_lmb_11" type="checkbox" name="custom_lmb[]" value="Saraperos" /><label class="paloma" for="webform_lmb_11"></label>  <label for="webform_lmb_11" class="nombre">Saraperos</label></div>
                                <div class="campo"><input id="webform_lmb_15" type="checkbox" name="custom_lmb[]" value="Vaqueros" /> <label class="paloma" for="webform_lmb_15"></label> <label for="webform_lmb_15" class="nombre">Vaqueros</label> </div>
                            </div>
                        </div>
                        <div id="tabs-6" class="lmp">
                            <div class="grupo">
                                <div class="campo"><input id="webform_lmp_4" type="checkbox" name="custom_lmp[]" value="Naranjeros" /><label class="paloma" for="webform_lmp_4"></label>  <label for="webform_lmp_4" class="nombre">Naranjeros</label> </div>
                                <div class="campo"><input id="webform_lmp_5" type="checkbox" name="custom_lmp[]" value="Tomateros" /><label class="paloma" for="webform_lmp_5"></label>  <label for="webform_lmp_5" class="nombre">Tomateros</label> </div>
                                <div class="campo"><input id="webform_lmp_0" type="checkbox" name="custom_lmp[]" value="Aguilas"/><label class="paloma" for="webform_lmp_0"></label>  <label for="webform_lmp_0" class="nombre">&Aacute;guilas</label></div>
                                <div class="campo"><input id="webform_lmp_1" type="checkbox" name="custom_lmp[]" value="Caneros" /> <label class="paloma" for="webform_lmp_1"></label> <label for="webform_lmp_1" class="nombre">Ca&ntilde;eros</label></div>

                            </div>
                            <div class="grupo">
                                <div class="campo"><input id="webform_lmp_2" type="checkbox" name="custom_lmp[]" value="Charros" /><label class="paloma" for="webform_lmp_2"></label>  <label for="webform_lmp_2" class="nombre">Charros</label> </div>
                                <div class="campo"><input id="webform_lmp_3" type="checkbox" name="custom_lmp[]" value="Mayos" /><label class="paloma" for="webform_lmp_3" ></label>  <label for="webform_lmp_3" class="nombre">Mayos</label></div>
                                <div class="campo"><input id="webform_lmp_6" type="checkbox" name="custom_lmp[]" value="Venados" /><label class="paloma" for="webform_lmp_6"></label>  <label for="webform_lmp_6" class="nombre">Venados</label> </div>
                                <div class="campo"><input id="webform_lmp_7" type="checkbox" name="custom_lmp[]" value="Yaquis" /> <label class="paloma" for="webform_lmp_7"></label> <label for="webform_lmp_7" class="nombre">Yaquis</label></div>
                            </div>

                        </div>
                    </div>
                    <p id="error-equipos"></p>
                </div>
                <div class="campo campo-style">
                    <input id="webform_style_0" type="checkbox" name="custom_style[]" value="Completa tu estilo, completa otras colecciones" class="street-style"/> <label class="paloma" for="webform_style_0"></label> <label for="webform_style_0" class="style nombre"><strong>Street Style</strong>, mis gorras son simplemente parte de mi estilo</label></div>
                <!-- Campaign token -->
                <!-- Get the token at: https://app.getresponse.com/campaign_list.html -->
                <input type="hidden" name="campaign_token" value="n4gDm" />
                <input type="hidden" name="thankyou_url" value="http://seo-consultoria.com/new-era/gracias-por-suscribirte.html"/>
                <input type="hidden" name="already_subscribed_url" value="http://seo-consultoria.com/new-era/gracias-por-suscribirte.html"/>

                <!-- Subscriber button -->
                <div class="boton">
                    <a href="javascript: validar();">CLIC AQUÍ ></a>
                </div>
                <div class="politicas"><a href=" " class="amarillo" target="_blank">Pol&iacute;ticas de privacidad</a></div>
            </form>
    </div>

<?php get_footer(); ?>