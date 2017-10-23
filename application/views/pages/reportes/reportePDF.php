
<!doctype html>
<html lang="en">
<head>
	<title>REPORTE</title>
	<style>
		.titulos {
		    color: #000;    
		    font-family: 'arial';
		    font-size: 25px;
		    text-transform: uppercase;
		    font-weight: bold;
		}
		.titulo-var {
		    color: #000;    
		    font-family: 'arial';
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
			font-family: arial;
			font-size: 12px;
			text-transform: uppercase;
		}
		.titulos-3 {
			font-family: arial;
			font-size: 12px;
		}
		.titulos-4 {
			font-family: arial;
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
		    font-size: 14px;
		    font-family: 'arial';
		    font-weight: normal;
		    
		}
		.table-control td
		{
		    font-family: 'arial';		    
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
					if ($key['activo']==1) {
						$estado="ACTUALMENTE ACTIVO";
					}else {
						$estado="ACTUALMENTE INACTIVO";
					}
					echo 
					"<br><div class='content-div'>
						<span class='titulos'>".$key['usuario']."</span>						
					</div>
					<div class='content-div'>
						<span class='titulos-2'>NOMBRE COMPLETO: ".$key['nombre']."</span>
					</div><br>
					<div class='content-div'>
						<span class='titulos-2'>".$estado."</span>
					</div><br><br>";
					echo 
					"<div class='content-div'>
						<span class='titulo-var'>Registro del ".date("d/m/Y", strtotime($key['fecha1']))." al ".date("d/m/Y", strtotime($key['fecha2']))."</span>
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
								<td><span>".$key['tiempoON']."</span></td>
								<td><span>".$key['tiempoPAUSA']."</span></td>
								<td><span>".$key['tiempoTotal']."</span></td>
							</tr>
						</tbody>
					</table>";
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