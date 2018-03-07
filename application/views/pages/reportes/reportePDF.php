
<!doctype html>
<html lang="en">
<head>
	<title>REPORTE</title>
	<style>
		.titulos {
		    color: #000;    
		    font-family: 'Calibri';
		    font-size: 25px;
		    text-transform: uppercase;
		    font-weight: bold;
		}
		.titulo-var {
		    color: #000;    
		    font-family: 'Calibri';
		    font-size: 15px;
		    font-weight: bold;
		    text-transform: uppercase;	   
		    margin-top: 2px;
		}
		table tr:nth-child(even) {		    
		    background-color: #ffffff;
		}
		table tr:nth-child(odd) {		    
		    background-color: #e7e2f7;
		}
		.titulos-2 {
			font-family: 'Calibri';
			font-size: 12px;
			text-transform: uppercase;
		}
		.titulos-3 {
			font-family: 'Calibri';
			font-size: 12px;
		}
		.titulos-4 {
			font-family: 'Calibri';
			font-size: 20px;
			font-weight: bold;
		}
		table {		    
		    width: 100%;
		    margin: 0 auto;
		    margin-bottom: 5px;
		    border-collapse: separate;
		    border-spacing: 2px;
		}
		.table-control, th, td {
   			padding: 7px 7px;
   			text-align: center;
		}
		.table-control th{
		    background: #1F3C8F;
		    color: #fff;
		    font-size: 12px;
		    font-family: 'Calibri';
		    font-weight: normal;		    
		}
		.table-control td
		{
		    font-family: 'Calibri'; 
		    font-size: 12px;
		}
		.contenedor {
			width: 100%;
			height: 100%;
			margin: 0 auto;			
			padding: 5px 5px;
		}
		.content-div {
			width: 100%;		
			text-align: center;
			padding: 2px 2px;
			margin: 0 auto;	
		}
		.contenedor-primary {
			margin: 0 auto;
			width: 100%;
			height: auto;
		}
		#tll, #tt, #tp, #un  {
			width: 25%;
			float: left;
			text-align: center;
		}
		.text-area {		    
		    border: 1px solid #8b8b8b;
		    font-size: 12px;
		    font-family: 'arial';		    
		    padding: 10px 10px 15px;
		    resize: none;
		    width: 100%;
		    height: 15%;
		}		
	</style>
</head>
<body>
	<div class="contenedor">		
		<?php			
		if ($tipoReporte=='rpt_campania') {
			$temp=array();
			if ($data_reporte) {
				foreach ($data_reporte as $key) {
					$temp = $key['array_1']; $temp2 = $key['array_2'];
					foreach ($temp as $key) {
						echo "
						<div class='content-div'>
							<span class='titulos'>".$key['ID_Campannas']."</span>							
						</div>
						<div class='content-div'>
							<span class='titulo-var'>".$key['nombre']."</span>
						</div>
						<div class='content-div'>
							<span class='titulos-2'>Del ".date('d/m/Y', strtotime($key['fechaInicio']))." al ".date('d/m/Y', strtotime($key['fechaCierre']))." </span>
						</div><br><br>
						<div class='content-div'>
							<span class='titulo-var'>Real: c$".number_format($key['montoReal'],2)."</span>&nbsp;&nbsp;&nbsp;&nbsp;
							<span class='titulo-var'>Meta: c$".number_format($key['meta'], 2)."</span>
						</div><br><br>				
						<div class='contenedor-primary'>								
							<div id='tll'>
								<span class='titulos-4'>".(int)$key['totalLlamadas']."</span><br>
								<span class='titulos-3'>Total llamadas</span><br>											
							</div>			
							<div id='tt'>
								<span class='titulos-4'>".date("H:i:s", strtotime($key['tiempoTotal']))."</span><br>
								<span class='titulos-3'>Tiempo total</span>										
							</div>						
							<div id='tp'>
								<span class='titulos-4'>".date("H:i:s", strtotime($key['tiempoPromedio']))."</span><br>
								<span class='titulos-3'>Tiempo promedio</span>										
							</div>
							<div id='un'>
								<span class='titulos-4'>".number_format($key['unidad'])."</span><br>
								<span class='titulos-3'>Unidades</span>
							</div>
						</div><br><br><br>";
					}						
					echo "
					<div class='content-div'>
						<span class='titulo-var'>CLIENTES POR CAMPAÑA</span>
					</div>
					<table class='table-control'>
						<thead>
							<tr>
								<th>CÓDIGO</th>
								<th>NOMBRE</th>
								<th>META C$</th>
								<th>MONTO REAL C$</th>
							</tr>
						</thead>
						<tbody>";
						foreach ($temp2 as $key) {
							echo"<tr>
								<td><span>".$key['ID_Cliente']."</span></td>
								<td><span>".$key['Nombre']."</span></td>
								<td><span>".number_format($key['Meta'], 2)."</span></td>
								<td><span>".number_format($key['montoReal'], 2)."</span></td>
							</tr>
							";
						}
						echo "</tbody></table>";
				}
			}
		} elseif ($tipoReporte=='rpt_agente') {
			if($data_reporte) {
				foreach ($data_reporte as $key) {
					$array1 = $key['array_1'];
					$array2 = $key['array_2'];

					if ($array1[0]['activo']==1) {
						$estado="ACTUALMENTE ACTIVO";
					}else {
						$estado="ACTUALMENTE INACTIVO";
					}
					echo 
					"<br><div class='content-div'>
						<span class='titulos'>".$array1[0]['usuario']."</span>						
					</div>
					<div class='content-div'>
						<span class='titulos-2'>NOMBRE COMPLETO: ".$$array1[0]['nombre']."</span>
					</div><br>
					<div class='content-div'>
						<span class='titulos-2'>".$estado."</span>
					</div><br><br>";
					echo 
					"<div class='content-div'>
						<span class='titulo-var'>Registro del ".date("d/m/Y", strtotime($array1[0]['fecha1']))." al ".date("d/m/Y", strtotime($array1[0]['fecha2']))."</span>
					</div><br><br>
					<div class='content-div'>
						<span class='titulo-var'>TIEMPO TOTALES</span>
					</div>
					<table class='table-control'>
						<thead>
							<tr>
								<th>HORAS CONECTADO</th>
								<th>TIEMPOS PAUSA</th>
								<th>TIEMPOS TOTAL</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><span>".$array1[0]['tiempoON']."</span></td>
								<td><span>".$array1[0]['tiempoPAUSA']."</span></td>
								<td><span>".$array1[0]['tiempoTotal']."</span></td>
							</tr>
						</tbody>
					</table>
					<div class='content-div'>
						<span class='titulo-var'>DETALLE DE CONEXIÓN</span>
					</div>
					<table class='table-control'>
						<thead>
							<tr>
								<th>INICIO</th>
								<th>FINALIZO</th>
								<th>TIEMPO</th>
								<th>TIPO</th>
							</tr>
						</thead>
						<tbody>";
					foreach ($array2 as $key) {
						echo"
						<tr>
							<td>".date('d/m/Y h:i A', strtotime($key['FechaInicio']))."</td>
							<td>".date('d/m/Y h:i A', strtotime($key['FechaFinal']))."</td>
							<td>".$key['Tiempo_Total']."</td>
							<td>".$key['Tipo']."</td>
						</tr>
						";
					}
					echo "
						</tbody>
						</table>
					";
				}
			}
		}elseif ($tipoReporte=='rpt_cliente') {
			if ($data_reporte) {
				echo 
				"<br>
				<div class='content-div'>
					<span class='titulos'>".$data_reporte[0]['nombre']."</span>						
				</div>
				<div class='content-div'>
					<span class='titulos-2'>CÓDIGO DEL CLIENTE: ".$data_reporte[0]['idCliente']."</span>
				</div><br>
				<div class='content-div' style='text-align:left'>
					&nbsp;&nbsp;<span class='titulos-2'>Dirección: ".$data_reporte[0]['direccion']."</span>						
				</div>
				<div class='content-div' style='text-align:left'>
					&nbsp;&nbsp;<span class='titulos-2'>Teléfonos: ".$data_reporte[0]['telefono1'].", ".$data_reporte[0]['telefono2'].", ".$data_reporte[0]['telefono3']."</span>						
				</div>
				<table class='table-control'>
					<thead>
						<tr>
							<th>CAMPAÑA</th>
							<th>MONTO REAL C$</th>
							<th>META C$</th>
							<th>UNIDADES</th>
							<th>AGENTE</th>
							<th>CANT. LLAMADAS</th>
						</tr>
					</thead>
					<tbody>";
				foreach ($data_reporte as $key) {
					echo"<tr>
							<td><span>".$key['campania']."</span></td>
							<td><span>".number_format($key['monto'], 2)."</span></td>
							<td><span>".number_format($key['meta'], 2)."</span></td>
							<td><span>".$key['unidad']."</span></td>
							<td><span>".$key['agente']."</span></td>
							<td><span>".$key['cantllamadas']."</span></td>
						</tr>";
				}
				echo "</tbody>
					</table>";
			}
		}elseif ($tipoReporte=='rpt_llamadas') {
			if ($data_reporte) {
				echo 
				"<br>
				<div class='content-div'>
					<span class='titulos'>REPORTE DE ACTIVIDAD</span>					
				</div>
				<div class='content-div'>
					<span class='titulo-var'>".$fechas."</span>
				</div><br><br>
				<table class='table-control'>
					<thead>
						<tr>
							<th>CAMPAÑA</th>
							<th>ID CLIENTE</th>
							<th>NOMBRE</th>
							<th>RECUPERADO C$</th>
							<th>REAL C$</th>
							<th>CANT. LLAMADAS</th>
						</tr>
					</thead>
					<tbody>";
				foreach ($data_reporte as $key) {
					echo"<tr>
							<td><span>".$key['campania']."</span></td>
							<td><span>".$key['idCliente']."</span></td>
							<td><span>".$key['nombre']."</span></td>
							<td><span>".number_format($key['recuperado'], 2)."</span></td>
							<td><span>".number_format($key['real1'], 2)."</span></td>
							<td><span>".$key['cantLlamadas']."</span></td>
						</tr>";
				}
				echo "</tbody>
					</table>";
				}
		}elseif ($tipoReporte=='rpt_regLlamadas') {
			$total=0;
			if ($data_reporte) {
				foreach ($data_reporte as $key) {
					$array1 = $key['array_1'];
					$array2 = $key['array_2'];
					$tempo = $key['tiempoTotal'];					
				}
				for ($i=0; $i <= count($array1) ; $i++) { 
					$total=$total+floatval($array1[$i]['Monto']);
				}
				echo 
				"<br>
				<div class='content-div'>
					<span class='titulos'>REGISTRO DE LLAMADAS</span>					
				</div>
				<div class='content-div'>
					<span class='titulo-var'>".$fechas."</span>
				</div><br><br>
				<div class='content-div'>
					<span class='titulo-var'>LLAMADAS POR CAMPAÑA</span>
				</div><br>
				<div class='contenedor-primary'>								
					<div id='tll' style='width:33%'>
						<span class='titulos-4'>".count($array1)."</span><br>
						<span class='titulos-3'>Total llamadas</span><br>											
					</div>			
					<div id='tt' style='width:33%'>
						<span class='titulos-4'>".$array1[0]['tt']."</span><br>
						<span class='titulos-3'>Tiempo total</span>										
					</div>						
					<div id='tp' style='width:33%'>
						<span class='titulos-4'>C$ ".number_format($total, 2)."</span><br>
						<span class='titulos-3'>Total Real</span>										
					</div>
				</div><br>
				<table class='table-control'>
					<thead>
						<tr>							
							<th>EXTENSIÓN</th>
							<th>NOMBRE</th>
							<th>FECHA</th>						
							<th>HORA</th>
							<th>NÚMERO MARCADO</th>
							<th>DURACIÓN</th>
							<th>REAL C$</th>							
						</tr>
					</thead>
					<tbody>";
				foreach ($array1 as $key) {
					echo"<tr>							
							<td><span>".$key['EXT']."</span></td>
							<td><span>".$key['Nombre']."</span></td>
							<td><span>".date('d/m/Y', strtotime($key['Fecha']))."</span></td>
							<td><span>".date('h:i A', strtotime($key['Hora']))."</span></td>
							<td><span>".$key['Num_CLI']."</span></td>
							<td><span>".$key['Duracion']."</span></td>
							<td><span>".number_format($key['Monto'], 2)."</span></td>							
						</tr>";
				}
				echo "</tbody>
					</table><br>
					<div class='content-div'>
						<span class='titulo-var'>LLAMADAS POR PLANTA</span>
					</div><br>
					<div class='contenedor-primary'>								
						<div id='tll' style='width:50%'>
							<span class='titulos-4'>".count($array2)."</span><br>
							<span class='titulos-3'>Total llamadas</span><br>											
						</div>			
						<div id='tt' style='width:50%'>
							<span class='titulos-4'>".$tempo."</span><br>
							<span class='titulos-3'>Tiempo total</span>										
						</div>
					</div><br>
					<table class='table-control'>
						<thead>
							<tr>							
								<th>EXTENSIÓN</th>								
								<th>FECHA</th>						
								<th>HORA</th>
								<th>NÚMERO MARCADO</th>
								<th>DURACIÓN</th>														
							</tr>
						</thead>
						<tbody>
					";					
					foreach($array2 as $key) {
						echo"<tr>							
							<td><span>".$key['ORIGEN']."</span></td>							
							<td><span>".date('d/m/Y', strtotime($key['FECHA']))."</span></td>
							<td><span>".date("h:i A", strtotime($key['Hora']))."</span></td>
							<td><span>".$key['DESTINO']."</span></td>
							<td><span>".$key['DURACION']."</span></td>							
						</tr>";
					}
					echo "
						</tbody>
					</table><br>
					";
				}
		}elseif ($tipoReporte=='tipificaciones') {
			if ($data_reporte) {
				echo 
				"<br>
				<div class='content-div'>
					<span class='titulos'>REPORTE DE TIPIFICACIONES</span><br>
					<span class='titulos'>".$campania."</span>			
				</div>
				<div class='content-div'>
					<span class='titulo-var'>".$fechas."</span>
				</div><br><br>
				<table class='table-control'>
					<thead>
						<tr>
							<th>TIPIFICACIÓN</th>
							<th>CANTIDAD</th>
						</tr>
					</thead>
					<tbody>";
				foreach ($data_reporte as $key) {
					echo"<tr>
							<td><span>".$key['tip']."</span></td>
							<td><span>".$key['CANT']."</span></td>
						</tr>";
				}
				echo "</tbody>
					</table>";
				}
		}elseif ($tipoReporte=='articulos') {
			if ($data_reporte) {
				echo 
				"<br>
				<div class='content-div'>
					<span class='titulos'>REPORTE DE ARTICULOS</span><br>
					<span class='titulos'>".$campania."</span>			
				</div>
				<div class='content-div'>
					<span class='titulo-var'>".$fechas."</span>
				</div><br><br>
				<table class='table-control'>
					<thead>
						<tr>
							<th>ARTICULO</th>
							<th>DESCRIPCION</th>
							<th>CANT. VECES VENDIDOS</th>
						</tr>
					</thead>
					<tbody>";
				foreach ($data_reporte as $key) {
					echo"<tr>
							<td><span>".$key['ARTICULO']."</span></td>
							<td><span>".$key['DESCRIPCION']."</span></td>
							<td><span>".$key['VENDIDO']."</span></td>
						</tr>";
				}
				echo "</tbody>
					</table>";
				}
		}
		?>
		
	</div>
</body>
</html>