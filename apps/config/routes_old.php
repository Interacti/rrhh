<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
 
//$route['default_controller'] = "frontend/login/formLogin";

$route['default_controller'] = "frontend/home";
$route['404_override'] = ''; 





$route['login'] = "frontend/login";
$route['login/(:any)/(:any)/(:any)'] = "frontend/login/validaLogin/$1/$2/$3";
$route['preview'] ="frontend/login/formLoginAdmin";
$route['validar/(:any)'] ="frontend/login/validaPreview/$1";
$route['logout'] = "frontend/login/Logout";
$route['oscura/(:any)'] ="frontend/login/validaLoginDns/$1";

//MENU INFERIOR
$route['preguntas-frecuentes'] = "frontend/home/faqs";
$route['que-es-rutaparaiso'] = "frontend/home/quees";
$route['terminos-y-condiciones'] = "frontend/home/terminos";
$route['como-ganar'] = "frontend/home/como";
$route['contactanos'] = "frontend/home/contacto";
$route['enviacontacto'] = "frontend/home/enviarcontacto";

//TEMAS
$route['temas/(:any)'] = "frontend/temas/VerTema/$1";

//CARTOLA
$route['cartola'] = "frontend/cartola";
$route['solicitudes'] = "frontend/solicitudes";
$route['solicitudes/detalle/(:any)'] = "frontend/solicitudes/detalle/$1";

//CONCURSO VENTA
$route['concursoventas'] = "frontend/concursoventas";
$route['concursoventas/abonar'] = "frontend/concursoventas/abonar";
$route['concursoventas/eliminar/(:any)'] = "frontend/concursoventas/eliminar/$1";
//$route['concursoventas/agentes'] = "frontend/concursoventas/Agentes";
//$route['concursoventas/abonar/'] = "frontend/concursoventas/abonarpuntos";


//TELEVENTA
$route['televenta'] = "frontend/televenta";
$route['televenta/abonarteleventa'] = "frontend/televenta/abonarteleventa";
//ACTUALIZACION
$route['actualizar'] = "frontend/actualizacion";
$route['actualizar/actualizar'] = "frontend/actualizacion/Actualizar";
//CATALOGO
$route['catalogo'] = "frontend/catalogo";
$route['catalogo/(:any)/(:any)'] = "frontend/catalogo/$1/$2";
$route['catalogo/solicitud'] = "frontend/catalogo/solicitud";
$route['catalogo/enviarsolicitud'] = "frontend/catalogo/SaveSolicitud";
$route['catalogo/cancelarsolicitud'] = "frontend/catalogo/CancelarSolicitud";


//BACK OFFICE



$route['bo'] = "backend/login";
$route['bo'] = "backend/login";
$route['bo/(:any)'] = "backend/$1";
$route['bo/(:any)/(:any)'] = "backend/$1/$2";
$route['bo/(:any)/(:any)/(:any)'] = "backend/$1/$2/$3"; //probando

$route['bo/reportes/canjes-negocios'] = "backend/reportes/CanjesNegocios"; //probando
$route['bo/reportes/canjes-sucursal'] = "backend/reportes/CanjeSucursal";






/* End of file routes.php */
/* Location: ./application/config/routes.php */ 