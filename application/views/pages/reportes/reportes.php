<header class="demo-header mdl-layout__header ">
    <div class="row center ColorHeader">        
        <div class="container_reloj">
            <div class="clock">
                <ul class="ul_r">
                    <li id="hours"></li>
                    <li id="point">:</li>
                    <li id="min"></li>
                    <li id="type"></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor">
        <div class="row">
            <div class="col s12 m12">
                <div class="noMargen row TextColor center"><div class="col s12 m12">REPORTES</div></div><br><br>
                <div class="row" style="display:none">
                    <div class="col s3 m3">
                        <center>
                            <a href='<?php echo base_url("index.php/tipoRpt/rptcampania")?>'>
                                <i class="material-icons icons-menu-rpt">shopping_cart</i>
                                <center><span class="titulo-menu-rpt">campaña</span></center>
                            </a>
                        </center>
                    </div>
                    <div class="col s3 m3">
                        <center>
                            <a href='<?php echo base_url("index.php/monitoreoSesion")?>'>
                                <i class="material-icons icons-menu-rpt">desktop_windows</i>
                                <center><span class="titulo-menu-rpt">MONITOREO</span></center>
                            </a>
                        </center>
                    </div>
                    <div class="col s3 m3">
                        <center>
                            <a href='<?php echo base_url("index.php/tipoRpt/rptagentes")?>'>
                                <i class="material-icons icons-menu-rpt">group</i>
                                <center><span class="titulo-menu-rpt">agentes</span></center>
                            </a>
                        </center>
                    </div>
                    <div class="col s3 m3">
                        <center>
                            <a href='<?php echo base_url("index.php/tipoRpt/rptclientes")?>'>
                                <i class="material-icons icons-menu-rpt">group</i>
                                <center><span class="titulo-menu-rpt">clientes</span></center>
                            </a>
                        </center>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col s3 m3">
                        <center>
                            <a href='<?php echo base_url("index.php/tipoRpt/RegLlmdRealizadas")?>'>
                                <i class="material-icons icons-menu-rpt">phone_forwarded</i>
                                <center><span class="titulo-menu-rpt">Llamadas</span></center>
                            </a>
                        </center>
                    </div>
                    <div class="col s3 m3" style="display:none">
                        <center>
                            <a href='<?php echo base_url("index.php/tipoRpt/rptLlamadas")?>'>
                                <i class="material-icons icons-menu-rpt">find_in_page</i>
                                <center><span class="titulo-menu-rpt">General</span></center>
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>        
    </div>

</main>