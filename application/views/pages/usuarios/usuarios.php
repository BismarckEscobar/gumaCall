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
	    <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">USUARIOS DEL SISTEMA</div></div>
	    <div class="noMargen Buscar row column">
	        <div id="agregarUsuario" class="col offset-s2 s2 right">
	            <a href="#modalNuevoUsuario" class="BtnBlue waves-effect btn modal-trigger">AGREGAR</a>
	        </div>
	    </div><br>
	    <div class="row">
	        <table id="tblUsuario" class="TblData">
	            <thead>
	                <tr>
	                    <th>CÓDIGO</th>
	                    <th>NOMBRE</th>
	                    <th>USUARIO</th>
	                    <th>ESTADO</th>
	                    <th>ACCIÓN</th>
	                </tr>
	            </thead>
	            <tbody class="center">
	                <?php
	                    if ($dataUsuario) {
	                        foreach ($dataUsuario as $key ) {
	                        	if ($key['Activo']==1) {
	                        		$estado="Activo";
	                        		$clase_estado="usuario_activo";
	                        		$val=0;
	                        		$texto="<a onclick='bajaUsuario(".'"'.$key['IdUser'].'","'.$val.'"'.")' href='#' class='btn-floating blue'><i class='small material-icons'>create</i></a>";
	                        	}else {
	                        		$estado="Inactivo";
	                        		$val=1;
	                        		$clase_estado="usuario_inactivo";
	                        		$texto="<a onclick='bajaUsuario(".'"'.$key['IdUser'].'","'.$val.'"'.")' href='#' class='btn-floating blue'><i class='small material-icons'>create</i></a>";
	                        	}
		                        echo"<tr>
	                                    <td>".$key['IdUser']."</td>
	                                    <td>".$key['Nombre']."</td>
	                                    <td>".$key['Usuario']."</td>
	                                    <td><span class='".$clase_estado."'>".$estado."</span></td>
	                                    <td class='center'>
	                                    ".$texto."
	                                    </td>
		                            </tr>";
		                        }
		                    }
	                ?>
	            </tbody>
	        </table>
	    </div>
	</div>
</main>
<!--MODAL: INGRESO NUEVO USUARIO-->
<div id="modalNuevoUsuario" class="modal">
    <div class="modal-content"><br>
        <div class="row center">
            <span class="titulosModales">INFORMACIÓN DEL USUARIO</span>
        </div>
        <form id="formNuevoUsuario" action="<?PHP echo base_url('index.php/agregarUsuario');?>" method="post" name="formNuevoUsuario">
            <div class="row">
                <div class="input-field offset-l1 col s12 m12 l6">
                    <input name="nombreUsuario" id="nombreUsuario" type="text" class="validate mayuscula">
                    <label for="nombreUsuario">NOMBRE COMPLETO</label>
                </div>
                <div class="input-field col s12 m12 l4">
                    <input name="usuario" id="usuario" type="text" class="validate mayuscula">
                    <label for="usuario">NOMBRE DE USUARIO</label>
                </div>
            </div>
            <div class="row">
            	<div class="input-field offset-l1 col s12 m6 l5">
                    <input name="contrasenia" id="contrasenia" type="text" class="validate">
                    <label for="contrasenia">CONTRASEÑA</label>
                </div>
                <div class="input-field col s12 m6 l5">
                    <input name="rpContrasenia" id="rpContrasenia" type="text" class="validate">
                    <label for="rpContrasenia">REPITA LA CONTRASEÑA</label>
                </div>
            </div>
            <div class="row">
	    	    <div class="input-field offset-l1 col s12 m12 l10 ">
	                <select class="chosen-select browser-default" name="tipoUsuario" id="tipoUsuario">
	                    <option value="" disabled selected><span>PERMISOS</span></option>
	                    <?php
		                    if ($roles) {
		                    	foreach ($roles as $key) {
			                    	echo "
					                    <option value=".$key['tipo']."><span>".$key['descripcion']."</span></option>
					                    ";
				                }
		                    }
			            ?>
	                </select>
	            </div>
            </div>
        </form><br><br><br>
        <div class="row center">
            <a id="guardarUsuario" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>
            <a id="cancelarProceso" class="modal-action modal-close BtnCancelar waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>