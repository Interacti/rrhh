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

$route['default_controller'] = "frontend/home/home2";
$route['404_override'] = ''; 



 
// Login Clientes
$route['login']         =   "frontend/login";

$route['home/actualizar']  =   "frontend/home/change";
$route['home/cambiar']     =   "frontend/home/change_pass";
$route['home/success']     =   "frontend/home/success";

$route['home-alt']  =   "frontend/home/home2";


$route['login/validar'] =   "frontend/login/validar";
// Cerrar sesion
$route['logout'] = "frontend/login/Logout";



//carrera 360

$route['carrera360']     =   "frontend/carrera";



//Encuesta
$route['encuesta'] = "frontend/encuesta";
$route['encuesta/save'] = "frontend/encuesta/save";

$route['inicio/(:any)'] = "frontend/home/inicio/$1";


// Beneficios
$route['bienestar/beneficios-y-convenios']="frontend/beneficios/index";
$route['bienestar/beneficios-y-convenios/(:num)']="frontend/beneficios/index/$1";
$route['bienestar/beneficios-y-convenios/detalle/(:any)']="frontend/beneficios/details/$1";


$route['bienestar/noticias-internas']="frontend/noticias/index";
$route['bienestar/noticias-internas/(:num)']="frontend/noticias/index/$1";
$route['bienestar/noticias-internas/detalle/(:any)'] = "frontend/noticias/details/$1";
//$route['bienestar/noticias-internas/listado/(:num)'] = "frontend/noticias/listado/$1";
// CHARLAS DE SEGURIDAD
$route['bienestar/charlas-de-seguridad']="frontend/charlas/index";
$route['bienestar/charlas-de-seguridad/(:num)']="frontend/charlas/index/$1";
$route['bienestar/charlas-de-seguridad/detalle/(:any)'] = "frontend/charlas/details/$1";

$route['bienestar/personal-destacado']="frontend/personal/index";
$route['bienestar/personal-destacado/(:num)']="frontend/personal/index/$1";
$route['bienestar/personal-destacado/detalle/(:any)'] = "frontend/personal/details/$1";

$route['bienestar/galeria-de-fotos']="frontend/galeria/index";
$route['bienestar/galeria-de-fotos/(:num)']="frontend/galeria/index/$1";
$route['bienestar/galeria-de-fotos/detalle/(:any)'] = "frontend/galeria/details/$1";



$route['rrhh/nuevos-a-bordo-equipo-caren']="frontend/abordo/index";
$route['rrhh/nuevos-a-bordo-equipo-caren/(:num)']="frontend/abordo/index/$1";
$route['rrhh/nuevos-a-bordo-equipo-caren/detalle/(:any)'] = "frontend/abordo/details/$1";

$route['rrhh/liquidaciones-de-sueldo'] = "frontend/liquidaciones";
$route['rrhh/liquidaciones-de-sueldo/descargar/(:any)'] = "frontend/liquidaciones/descargar/$1";

$route['rrhh/cobranzas'] = "frontend/cobranza";
$route['rrhh/cobranzas/descargar/(:any)'] = "frontend/cobranza/descargar/$1";

$route['comercial-e-incentivo/productos-y-servicio-destacados']="frontend/productos/index";
$route['comercial-e-incentivo/productos-y-servicio-destacados/(:num)']="frontend/productos/index/$1";
$route['comercial-e-incentivo/productos-y-servicio-destacados/detalle/(:any)'] = "frontend/productos/details/$1";

$route['comercial-e-incentivo/noticias-comerciales']="frontend/noticiascom/index";
$route['comercial-e-incentivo/noticias-comerciales/(:num)']="frontend/noticiascom/index/$1";
$route['comercial-e-incentivo/noticias-comerciales/detalle/(:any)'] = "frontend/noticiascom/details/$1";


$route['comercial-e-incentivo/concursos']="frontend/concurso/index";
$route['comercial-e-incentivo/concursos/(:num)']="frontend/concurso/index/$1";
$route['comercial-e-incentivo/concursos/detalle/(:any)'] = "frontend/concurso/details/$1";

$route['temas/idea'] = "frontend/temas/idea";

$route['temas/descargar/(:any)'] = "frontend/temas/descargar/$1";



//MENU INFERIOR

$route['mision'] = "frontend/home/mision";
$route['induccion-a-la-compania'] = "frontend/home/induccion";
$route['politicas-y-procedimientos-internos'] = "frontend/home/politicas";
$route['reglamento-interno'] = "frontend/home/reglamento";
$route['vision'] = "frontend/home/vision";
$route['linea-etica'] = "frontend/home/linea_etica";

//MENU INFERIOR
$route['preguntas-frecuentes'] = "frontend/home/faqs";
$route['que-es-rutaparaiso'] = "frontend/home/quees";
$route['terminos-y-condiciones'] = "frontend/home/terminos";
$route['como-ganar'] = "frontend/home/como";
$route['contactanos'] = "frontend/home/contacto";
$route['enviacontacto'] = "frontend/home/enviarcontacto";

$route['autocomplete']='frontend/temas/autocomplete';
$route['calcular']='frontend/temas/calcular'; 
$route['anexo']='frontend/temas/anexo';
$route['area']='frontend/temas/area';

//TEMAS


$route['pdf']="frontend/temas/pdf";

//$route['temas/(:any)/(:any)/(:any)'] = "frontend/temas/detalle/$1/$2/$3";


$route['temas/(:any)/(:any)'] = "frontend/temas/contenido/$1/$2";



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
$route['mis-datos'] = "frontend/actualizacion";
$route['mis-datos/actualizar'] = "frontend/actualizacion/change";
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