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
        <span id="USI"><?php echo $this->session->userdata('UserN');?></span>
        <span id="USN"><?php echo $this->session->userdata('UserName');?></span>
        <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">mis campañas asignadas</div></div>
        <div class="row" id="monitoreo1">
            <table id="tblcampanias" class="TblData">
                <thead>
                <tr>
                    <th>Nº CAMPAÑA</th>
                    <th>FECHA INCIO</th>
                    <th>FECHA CIERRE</th>
                    <th>NOMBRE</th>
                    <th>META</th>
                    <th>REAL</th>
                    <th>OBSERVACIóN</th>
                </tr>
                </thead>
                <tbody class="center">
                <tr>
                    <td><a href="detalles">0503</a></td>
                    <td>01/08/2017</td>
                    <td>15/08/2017</td>
                    <td>PROMOCION</td>
                    <td>C$ 100,00</td>
                    <td>C$ 3,00</td>
                    <td>OBSERVACIONES</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</main>
</div>
</div>

<div id="mTiempoFuera" class="modal">
    <div class="modal-content">
        <h2 class="center sKronos"  id="ttPausa">00:00:00</h2>
    </div>
</div>