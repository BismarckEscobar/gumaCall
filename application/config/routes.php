<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/******** MIS RUTAS **********/
// LOGIN
$route['login'] = 'login_controller/Acreditar';
$route['salir'] = 'login_controller/Salir';
$route['cambiarPass'] = 'login_controller/cambiarPass';
$route['Guardar_a_Libro'] = 'login_controller/Guardar_a_Libro';
$route['GUARDAR_PAUSA'] = 'login_controller/Guardar_pausa';
// FIN LOGIN

// RUTAS MENU
$route['Main'] = 'main_controller';
// FIN RUTAS MENU

//RUTAS CAMPAÑAS
$route['campanias'] = 'campania_controller';
$route['campaniasVA'] = 'campaniaVistaAdmin_controller/listadoCampanias';
$route['detallesVA/(:any)'] = 'campaniaVistaAdmin_controller/detalle_vista_admin/$1';
$route['crearCampania'] = 'campaniaVistaAdmin_controller/nuevaCampania';
$route['guardarClienteCampania'] = 'campaniaVistaAdmin_controller/subirExcelCampanias';
$route['guardarDataCampania'] = 'campaniaVistaAdmin_controller/guardandoData';
$route['Guardar_llamada'] = 'campania_controller/guardar_llamada';
$route['cambiarEstadoCamp/(:any)/(:any)'] = 'campaniaVistaAdmin_controller/cambiandoEstadoCamp/$1/$2';
$route['editarCampaniaVA'] = 'campaniaVistaAdmin_controller/editandoCampania';

$route['detalles'] = 'campania_controller/detalles_camp/';
$route['cCliente'] = 'campania_controller/get_info_cliente';

$route['cargaAgentesCampania/(:any)'] = 'campaniaVistaAdmin_controller/cargaAgentes/$1';
$route['editarAgentes'] = 'campaniaVistaAdmin_controller/editarAgentesCamp';
$route['agregarArtDatatable/(:any)'] = 'campania_controller/agregarArticulos/$1';
$route['listarArticulos/(:any)'] = 'campania_controller/listarArticulosCamp/$1';
//FIN RUTAS CAMPAÑAS

//RUTAS USUARIOS
$route['usuarios'] = 'Usuario_controller';
$route['agregarUsuario'] = 'Usuario_controller/agregandoUsuario';
$route['cambiarEstado/(:any)/(:any)'] = 'Usuario_controller/cambiarEstado/$1/$2';
//FIN DE RUTAS USUARIOS

//RUTAS GRUPOS
$route['grupos'] = 'grupos_controller';
$route['gestionarGrupo'] = 'grupos_controller/gestionandoGrupo';
$route['nuevoGrupo'] = 'grupos_controller/guardarNuevoGrupo';
$route['buscarGrupo/(:any)'] = 'grupos_controller/buscandoGrupo/$1';
//FIN DE RUTAS GRUPOS

//RUTAS GRUPOS
$route['Monitoreo'] = 'Monitoreo_controller';
$route['monitoreoSesion'] = 'Monitoreo_controller/monitoreoSesion';
$route['ajaxLog'] = 'Monitoreo_controller/ajaxLog';
$route['forzarCierre'] = 'Monitoreo_controller/forzarCierre';
//FIN DE RUTAS GRUPOS

//RUTAS GRUPOS VISTA ADMINISTRADOR
$route['listarVendedoresAct/(:any)'] = 'grupos_controller/listarVendedoresAct/$1';
$route['listarVendedoresAgregados/(:any)'] = 'grupos_controller/listarVendedoresAgregados/$1';
$route['dataCampaniaNueva'] = 'campania_controller/subirExcelCampanias';
$route['guardandoEdicionGrupo'] ='grupos_controller/agregandoInfoGrupo';
//FIN DE RUTAS GRUPOS

//GRAFICA CAMPAÑAS
$route['metaReal/(:any)'] = 'campaniaVistaAdmin_controller/graficarMontoReal/$1';
$route['diasGrafica/(:any)'] = 'campaniaVistaAdmin_controller/graficarDiasCampania/$1';
//FIN GRAFICA CAMPAÑAS

//RUTAS CLIENTES
$route['clientes'] = 'clientes_controller';
$route['agregarClientes'] = 'clientes_controller/agregandoClientes';
$route['guardarUnCl'] = 'clientes_controller/guardarUnCliente';

//RUTAS TIPIFICACIONES
$route['tipificaciones'] = 'tipificaciones_controller';
$route['nuevaTipificacion'] = 'tipificaciones_controller/guardarTipificacion';
$route['cambiarEstadoTipi/(:any)/(:any)'] = 'tipificaciones_controller/cambiarEstado/$1/$2';

//RUTAS REPORTES
$route['reportes'] = 'reportes_controller';
//$route['rpt2'] = 'reportes_controller/rpt2';
$route['tipoRpt/(:any)'] = 'reportes_controller/tipoReporte/$1';
$route['generarRep'] = 'reportes_controller/generarReporte';
$route['filtrarPorCamp'] = 'reportes_controller/filtrarPorCampanias';
$route['filtrarPorCliente'] = 'reportes_controller/filtrarPorClientes';
$route['generarPDF'] = 'reportes_controller/generarReportePDF';
//FIN RUTAS REPORTES