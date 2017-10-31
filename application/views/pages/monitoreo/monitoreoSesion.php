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
                <div class="noMargen row TextColor center"><div class="col s12 m12">MONITOREO DE SESIONES</div></div><br><br>
                <div class="row center">
                    <div class="col s12 m12">
                        <div style="width:50%; margin: 0 auto;">
                            <div class="input-field col s6">
                                <label for="">Desde</label>
                                <input type="text" name="" id="FechaInicio" class="datepicker">
                            </div>  
                            <div class="input-field col s6">
                                <label for="lblfechafin">Hasta</label>
                                <input type="text" name="" id="FechaFin" class="datepicker">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row center">
                    <div class="col s12">
                        <button onclick="Filtrar()" class="BtnBlue btn" id="btnFiltrar">Filtrar</button>    
                    </div> 
                </div>             
            </div>
        </div>
        <div class="row" id="table-log">
            <div class="progress" style="display:none;" id="carga">
                <div class="indeterminate"></div>
            </div>
            <table class="TblData" id="tblLog">
                <thead>
                    <tr>
                        <th>ID SESION</th>
                        <th>USERNAME</th>
                        <th>NOMBRE</th>
                        <th>FECHAINICIO</th>
                        <th>FECHAFIN</th>
                        <th>TIEMPO_TOTAL</th>
                        <th>TIPO</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody class="center">
                </tbody>
            </table>
        </div>
	</div>
</main>