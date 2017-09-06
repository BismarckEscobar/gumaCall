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
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <input id="nombreCampania" type="text" class="validate" value="N° 0504 - PROMOCIÓN RAMOS OCTUBRE 2017">
                            </div>
                        </div>
                        <div class="content-rows">
                            <div class="content-rows-left">
                                <div class="row">                                
                                    <div class="input-field col s6">
                                        <input value="01/08/2017" id="fechaInicioCamp" type="text" class="left validate">
                                        <label for="fechaInicioCamp" class="left">FECHA DE INICIO</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input value="C$ 100,000" id="metaEstimadaCamp" type="text" class="validate textos-cifras">
                                        <label for="metaEstimadaCamp">META ESTIMADA</label>
                                    </div>
                                </div>
                                <div class="row">                                
                                    <div class="input-field col s6">
                                        <input value="01/08/2017" id="fechaInicioCamp" type="text" class="left validate">
                                        <label for="fechaInicioCamp">FECHA FINAL</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input value="C$ 3,000" id="metaEstimadaCamp" type="text" class="validate textos-cifras">
                                        <label for="metaEstimadaCamp">REAL</label>
                                    </div>
                                </div> 
                            </div>
                            <div class="content-rows-right">
                                <div id="container-grafica"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s4 m4">
                                <span class="totales">100</span><br>
                                <span class="totales">TOTAL LLAMADAS</span>
                            </div>
                            <div class="col s4 m4">
                                <span class="totales">3.45 HORAS</span><br>
                                <span class="totales">TIEMPO TOTAL</span>
                            </div>
                            <div class="col s4 m4">
                                <span class="totales">5 MINUTOS</span><br>
                                <span class="totales">TIEMPO PROMEDIO</span>
                            </div>
                        </div>           
                    </div>
                </div><br>
                <div class="row">
                    <table id="tblDetalleCamp" class="TblData">
                        <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>ESTIMADO</th>
                            <th>REAL</th>
                            <th>OBSERVACIONES</th>
                        </tr>
                        </thead>
                        <tbody class="center">
                            <tr>
                                <td><span>00276</span></td>
                                <td><span>FARMCIA MASSIEL</span></td>
                                <td><span>C$ 7,000</span></td>
                                <td><span>C$ 39,000</span></td>
                                <td><span>NINGUNA</span></td>
                            </tr>
                            <tr>
                                <td><span>00276</span></td>
                                <td><span>FARMCIA MASSIEL</span></td>
                                <td><span>C$ 78,000</span></td>
                                <td><span>C$ 34,000</span></td>
                                <td><span>NINGUNA</span></td>
                            </tr>
                            <tr>
                                <td><span>00276</span></td>
                                <td><span>FARMCIA MASSIEL</span></td>
                                <td><span>C$ 74,000</span></td>
                                <td><span>C$ 37,000</span></td>
                                <td><span>NINGUNA</span></td>
                            </tr>
                            <tr>
                                <td><span>00276</span></td>
                                <td><span>FARMCIA MASSIEL</span></td>
                                <td><span>C$ 72,000</span></td>
                                <td><span>C$ 31,000</span></td>
                                <td><span>NINGUNA</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>