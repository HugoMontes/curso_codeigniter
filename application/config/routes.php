<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login_controller';
$route['practica/codeigniter'] = 'welcome';
$route['practica/datos'] = 'practica_controller/mostrardatos';
$route['practica/coleccion'] = 'practica_controller/listallpersonas';
$route['practica/segmento/(:any)/(:num)'] = 'practica_controller/verificaedad/$1/$2';
$route['practica/calculadora/(:num)/(:num)'] = 'practica_controller/realizarCalculo/$1/$2';
$route['practica/autoriza/(:any)/(:any)'] = 'practica_controller/autorizausuario/$1/$2';

$route['curso'] = 'curso_controller';
$route['curso/nuevo'] = 'curso_controller/nuevo';
$route['curso/guardar'] = 'curso_controller/guardar';
$route['curso/detalle/(:num)'] = 'curso_controller/detalle/$1';
$route['curso/editar/(:num)'] = 'curso_controller/editar/$1';
$route['curso/eliminar/(:num)'] = 'curso_controller/eliminar/$1';

$route['login'] = 'login_controller/login';
$route['logout'] = 'login_controller/logout';
$route['escritorio'] = 'principal_controller';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
