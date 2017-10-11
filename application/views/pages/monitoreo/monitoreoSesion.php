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
        <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">MONITOREO DE SESIONES</div></div>
          <div class="row" id="content">
            <div class="container">
                <div class="input-field col s6 m4 s6">
                    <label for="">Fecha Inicio</label>
                    <input type="text" name="" id="FechaInicio" class="datepicker" placeholder="ELIJA UNA FECHA INICIAL">
                </div>  
                <div class="input-field col s6 m4 s6">
                    <label for="lblfechafin">Fecha Fin</label>
                    <input type="text" name="" id="FechaFin" class="datepicker"  placeholder="ELIJA UNA FECHA FINAL">
                </div>  
                <div class="col s6 m4 s6">
                    <button onclick="Filtrar()" class="BtnBlue btn" id="btnFiltrar">Filtrar</button>    
                </div>  
            </div> 
         </div>
        <div class="row" id="table-log">
            <div class="progress" style="display:none;" id="carga">
                <div class="indeterminate"></div>
            </div>
            <table class="TblData table center col s12 m12 s12" id="tblLog">
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
                <tbody>
                </tbody>
            </table>
        </div>
	</div>
</main>