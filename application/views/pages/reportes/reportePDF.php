
<!doctype html>
<html lang="en">
<head>
	<title>REPORTE DE CAMPAÑA</title>
	<style>
		#footer {			
			padding: 30px 30px;
			width: 90%;
			height: auto;
			margin: 0 auto;
			font-family: 'arial'!important;
		    text-transform: uppercase!important;
        }
        .footer {
        	margin-top: 50px;
        }
		.footer tr td {
			width: 50%;
			text-align: center;
			padding: 5px 5px;
			border: none;
		}
		table {
		    color: black;
		    font-size: 11px;
		    font-family: 'arial'!important;
		    text-transform: uppercase!important;
		    border-collapse: collapse;
		    width: 98%;
		    margin: 0 auto;
		    margin-bottom: 5px;
		}
		.table-control th,td{
			border: 1px solid black;
		    text-align: left;
		    padding: 2px 2px;
		    border: 1px solid black;
		}

		.table, th, td {
   			border: 1px solid black;
   			text-align: center;
		}
		.contenedor {
			width: 100%;
			height: 100%;
			margin: 0 auto;
			border: 1px solid black;
			border-radius: 2px;
			padding: 2px 2px;
		}
		.encabezado {
			width:100%;
			margin: 0 auto;
			margin-bottom:2px;
			margin-top: 5px;
		}
		.table-control {			
			text-align: center;
			width: 98%;
			margin-top: 5px;
		}
		.titulos {
			width: 100%;		
			text-align: center;
			padding: 1px 1px;
			font-weight: bold;
			margin: 0 auto;
			margin-top: 10px;
		}
		.titulos-text {
			font-family: arial;
			font-size: 20px;
			text-transform: uppercase;
			font-weight: bold;
		}

		.subtitulos {
			font-family: arial;
			font-size: 15px;
			text-transform: uppercase;
		}
		.titulos-tablas {
			text-align: center;
		}
		span {
			text-transform: uppercase!important;
			font-weight: bold;
			font-size: 10px;
		}
		.span {
			text-transform: uppercase!important;
			font-family: 'arial'!important;
			font-size: 10px;
			font-weight: normal;
		}
		.encabezado #totales {	
			width: 100%; 
		}
		#totales .subtotales1, .subtotales2, .subtotales3, .subtotales4 {
			display:inline-block;
			float: right;
			margin: 0 auto;
			padding: 0;	
		}
		
	</style>
</head>
<body>
	<div class="contenedor">
		<div class="encabezado">
			<div class="titulos">
				<span class="titulos-text">reporte de Campaña</span>				
			</div>
			<?php
			$temp=array();

			if ($data_campania) {
				foreach ($data_campania as $key) {

					$temp = $key['array_1'];
					foreach ($temp as $key) {
						echo "
						<div class='titulos'>
							<span class='subtitulos'>".$key['ID_Campannas']." - </span>
							<span class='subtitulos'>".$key['nombre']."</span>
						</div>
						<div class='titulos'>
							<span class='subtitulos'>Del ".date('d/m/Y', strtotime($key['fechaInicio']))." al ".date('d/m/Y', strtotime($key['fechaCierre']))." </span>
						</div><br><br>
						<div id='totales'>
							<table class='table'>
								<tr>
									<td>
										<div >
											<span class='subtitulos'>".(int)$key['totalLlamadas']."</span><br>
											<span class='subtitulos'>Total llamadas</span><br>											
										</div>
									</td>
									<td>
										<div>
											<span class='subtitulos'>".$key['tiempoTotal']."</span><br>
											<span class='subtitulos'>Tiempo total</span>										
										</div>
									</td>
									<td>
										<div>
											<span class='subtitulos'>".$key['tiempoPromedio']."</span><br>
											<span class='subtitulos'>Tiempo promedio</span>										
										</div>
									</td>
									<td>
										<div>
											<span class='subtitulos'>".number_format($key['unidad'])."</span><br>
											<span class='subtitulos'>Unidades</span>											
										</div>
									</td>
								</tr>
							</table>







						</div>";
					}
				}
			}
			?>
		</div><br>
		<table class="table-control">
			<thead>
				<tr>
					<th style="text-align:center;">CÓDIGO</th>
					<th style="text-align:center;">NOMBRE</th>
					<th style="text-align:center;">META</th>
					<th style="text-align:center;">MONTO REAL</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($data_campania as $key) {
						$temp = $key['array_2'];
						foreach ($temp as $key) {
							echo "
							<tr>
								<td><span>".$key['ID_Cliente']."</span></td>
								<td><span>".$key['Nombre']."</span></td>
								<td><span>".$key['Meta']."</span></td>
								<td><span>".$key['montoReal']."</span></td>
							</tr>
							";
						}
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>