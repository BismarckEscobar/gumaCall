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
$route['Campania'] = 'campania_controller';
//FIN RUTAS CAMPAÑAS

//RUTAS USUARIOS
$route['usuarios'] = 'Usuario_controller';
$route['agregarUsuario'] = 'Usuario_controller/agregandoUsuario';
$route['cambiarEstado/(:any)/(:any)'] = 'Usuario_controller/cambiarEstado/$1/$2';
//FIN DE RUTAS USUARIOS

//RUTAS GRUPOS
$route['grupos'] = 'grupos_controller';
$route['nuevoGrupo'] = 'grupos_controller/nuevoGrupo';
//FIN DE RUTAS GRUPOS