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
        <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">LISTADO DE CAMPAÑAS</div></div>
        <div class="noMargen Buscar row column">
            <div id="agregarUsuario" class="col offset-s10 s10 right">
                <a href="crearCampania" class="BtnBlue waves-effect btn modal-trigger"><i class="material-icons left">add</i>CREAR CAMPAÑA</a>
            </div>
        </div>
        <div class="row">
            <table id="tblcampaniasVA" class="TblData">
                <thead>
                <tr>
                    <th>Nº CAMPAÑA</th>
                    <th>ACTIVA</th>
                    <th>NOMBRE</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA CIERRE</th>
                    <th>ESTADO</th>
                    <th>META</th>
                    <th>REAL</th>
                    <th>OBSERVACIONES</th>
                </tr>
                </thead>
                <tbody class="center">
                <tr>
                    <td><a href="detallesVA">0503</a></td>
                    <td>
                        <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                        <label for="filled-in-box"></label>
                    </td>
                    <td>
                        <span>PROMOCION RAMOS ADOSTO 2017</span>
                    </td>
                    <td>
                        <span>01/08/2017</span>
                    </td>
                    <td>
                        <span>15/08/2017</span>
                    </td>
                    <td>
                        <span>PROCESANDO</span>
                    </td>
                    <td>
                        <span>C$ 100,000</span>
                    </td>
                    <td>
                        <span>C$ 3,000</span>
                    </td>
                    <td>
                        <span>LOREM IPSUM</span>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</main>
</div>
</div>