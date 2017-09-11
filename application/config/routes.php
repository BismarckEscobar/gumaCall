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
// FIN LOGIN

// RUTAS MENU
$route['Main'] = 'main_controller';
// FIN RUTAS MENU

//RUTAS CAMPAÑAS
$route['campanias'] = 'campania_controller';
$route['campaniasVA'] = 'campania_controller/listadoCampanias';
$route['detallesVA'] = 'campania_controller/detalle_vista_admin';
$route['crearCampania'] = 'campania_controller/nuevaCampania';
$route['Guardar_llamada'] = 'campania_controller/guardar_llamada';

$route['detalles'] = 'campania_controller/detalles_camp/';
$route['cCliente'] = 'campania_controller/get_info_cliente';
//FIN RUTAS CAMPAÑAS

//RUTAS USUARIOS
$route['usuarios'] = 'Usuario_controller';
$route['agregarUsuario'] = 'Usuario_controller/agregandoUsuario';
$route['cambiarEstado/(:any)/(:any)'] = 'Usuario_controller/cambiarEstado/$1/$2';
//FIN DE RUTAS USUARIOS

//RUTAS GRUPOS
$route['grupos'] = 'grupos_controller';
$route['gestionarGrupo'] = 'grupos_controller/gestionandoGrupo';
$route['buscarGrupo/(:any)'] = 'grupos_controller/buscandoGrupo/$1';
//FIN DE RUTAS GRUPOS


//RUTAS GRUPOS
$route['Monitoreo'] = 'Monitoreo_controller';
//FIN DE RUTAS GRUPOS

//RUTAS GRUPOS VISTA ADMINISTRADOR
$route['listarVendedoresAct/(:any)'] = 'grupos_controller/listarVendedoresAct/$1';
//FIN DE RUTAS GRUPOS
