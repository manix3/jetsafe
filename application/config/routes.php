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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;




/*
*    Rutas del modulo Inventario;
*
*/
$route['minv_seguimiento'] = "minv/Inv_seguimiento";
$route['minv_inventario'] = "minv/Inv_inventarios";
$route['minv_mantenimiento'] = "minv/Inv_mantenimiento";
$route['minv_mantenimiento_tipo_movimiento'] = "minv/Inv_mantenimiento/tipo_movimiento";
$route['minv_mantenimiento_detalle_movimiento'] = "minv/Inv_mantenimiento/detalle_movimiento";
$route['minv_mantenimiento_almacen'] = "minv/Inv_almacen/mant_almacen";
$route['minv_mantenimiento/familia'] = "minv/Inv_familia";
$route['minv_mantenimiento/almacen'] = "minv/Inv_almacen";
$route['minv_mantenimiento/almacen/'.$this->uri->segment(3)] = "minv/Inv_almacen/almacen/".$this->uri->segment(4);
$route['Movimientos'] = "minv/Inv_movimientos";

/*
*   Rutas de Productos
*
*/


$route['Productos'] = "Productos";
$route['tipo_productos'] = "Productos/tip_prod";




/*
* Rutas de Cotizacion
*
*/


$route['Cotizacion/cotizar'] = "coti/Cot_cotizacion";
$route['Cotizacion/buscar'] = "coti/Cot_cotizacion/cot_busqueda";
$route['Cotizacion/Administrar'] = "coti/Cot_Admin";
$route['Cotizacion/Nueva'] = "coti/Cot_cotizacion/nueva_cotizacion";
$route['Cotizacion/Productos'] = "Productos/vista_cotizacion";
$route['Cotizacion/clientes'] = "public/Clientes/vista_cotizacion";
$route['Cotizacion/vendedores'] = "coti/Cot_vendedor";
$route['Cotizacion/coti_seguimiento'] = "coti/Cot_seguimiento";
$route['Cotizacion/coti_mantenimiento_estado'] = "coti/Cot_mantenimiento/vista_est_coti";
$route['Cotizacion/coti_mantenimiento_moneda'] = "coti/Cot_mantenimiento/vista_tip_moneda";
$route['Cotizacion/rep1'] = "coti/Cot_reportes/repor1";
$route['Cotizacion/rep2'] = "coti/Cot_reportes/repor2";
$route['Cotizacion/rep3'] = "coti/Cot_reportes/repor3";

/*
* Rutas Public
*
*/

$route['modulos'] = "public/Modulos";
$route['listarmodulos'] = "public/Modulos/listar";
$route['clientes'] = "public/Clientes";
$route['Trabajadores'] = "public/Trabajador";
$route['periodo'] = "public/Mantenimiento/vista_periodo";
$route['Reservas'] = "Tc_reserva/res_index";
$route['Notificaciones'] = "Notificaciones";
$route['Usuarios/lista'] = "Usuario/usu_ver_index";
$route['Empresas'] = "public/Empresas";




/*
* Rutas Academia
*
*/


$route['Academia'] = "academia/Academia";
$route['Mantenimiento'] = "academia/Mantenimiento";
$route['Profesores'] = "academia/Profesor";
$route['Pagos'] = "academia/Pagos";
$route['Actividades'] = "academia/Actividades";
$route['Estudiantes'] = "academia/Estudiante";
$route['Asistencia'] = "academia/Asistencia";
$route['Reportes/Reporte-por-asistencia'] = "academia/Reportes/rep_asis_gru_index";
$route['Asistencia/actividad'] = "academia/Asistencia/tom_asis_index";
$route['Asistencia/Ver'] = "academia/Asistencia/ver_asis_index";
$route['Asistencia/actividad/tomar_asistencia/'.$this->uri->segment(4).'/'.$this->uri->segment(5)] = "academia/Asistencia/vista_asis_act_asis_index/".$this->uri->segment(4).'/'.$this->uri->segment(5);
$route['Asistencia/actividad/ediar_asistencia/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6)] = "academia/Asistencia/asis_upd_alu_index/";
$route['Estudiantes/nuevo'] = "academia/Estudiante/est_nuevo_index";
$route['Actividades/editar'] = "academia/Actividades/list";

$route['Academia/Mantenimiento/Lugares'] = "academia/Mantenimiento/mant_lugares_index";
$route['Academia/Mantenimiento/Tipo-de-pagos'] = "academia/Mantenimiento/mant_tip_pago_index";
$route['Academia/Mantenimiento/Forma-de-pagos'] = "academia/Mantenimiento/mant_for_pago_index";
$route['Academia/Mantenimiento/Estado-de-pagos'] = "academia/Mantenimiento/mant_est_pago_index";
$route['Academia/Mantenimiento/periodo-de-pagos'] = "academia/Mantenimiento/mat_per_pag_index";
$route['Academia/Mantenimiento/Tipos-de-evaluacion'] = "academia/Mantenimiento/mant_tip_eva_index";
$route['Academia/Mantenimiento/Calificaciones'] = "academia/Mantenimiento/mant_cali_index";
$route['Academia/Mantenimiento/Categorias'] = "academia/Mantenimiento/mant_cat_index";
$route['Academia/Mantenimiento/Grupos'] = "academia/Mantenimiento/mant_grup_index";
$route['Academia/Mantenimiento/Grupos/actu'] = "academia/Mantenimiento/act_grup";

/*
* Rutas Social
*
*/


$route['social'] = "social/Academia";
$route['Mantenimiento'] = "academia/Mantenimiento";
$route['Profesores'] = "academia/Profesor";
$route['soc_pagos'] = "social/Pagos";
$route['soc_act'] = "social/Actividades";
$route['soc_act/int_no_eve/(:any)'] = "social/Actividades/int_no_eve/$1";
$route['soc_act/int_si_eve/(:any)'] = "social/Actividades/int_si_eve/$1";
$route['soc_cal'] = "social/Calendario";
$route['soc_dashboard'] = "social/Dashboard";
$route['soc_presu'] = "social/Presupuesto";
$route['soc_donaciones'] = "social/Donaciones";


$route['integrantes'] = "social/Estudiante";
$route['integrantes_act'] = "social/Estudiante/actintegrantes";
$route['Asistencia'] = "academia/Asistencia";
$route['Reportes/Reporte-por-asistencia'] = "academia/Reportes/rep_asis_gru_index";
$route['Asistencia/actividad'] = "academia/Asistencia/tom_asis_index";
$route['Asistencia/Ver'] = "academia/Asistencia/ver_asis_index";
$route['Asistencia/actividad/tomar_asistencia/'.$this->uri->segment(4).'/'.$this->uri->segment(5)] = "academia/Asistencia/vista_asis_act_asis_index/".$this->uri->segment(4).'/'.$this->uri->segment(5);
$route['Asistencia/actividad/ediar_asistencia/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6)] = "academia/Asistencia/asis_upd_alu_index/";
$route['Estudiantes/nuevo'] = "academia/Estudiante/est_nuevo_index";
$route['Actividades/editar'] = "academia/Actividades/list";
$route['Academia/Mantenimiento/Lugares'] = "academia/Mantenimiento/mant_lugares_index";
$route['Academia/Mantenimiento/Tipo-de-pagos'] = "academia/Mantenimiento/mant_tip_pago_index";
$route['Academia/Mantenimiento/Forma-de-pagos'] = "academia/Mantenimiento/mant_for_pago_index";
$route['Academia/Mantenimiento/Estado-de-pagos'] = "academia/Mantenimiento/mant_est_pago_index";
$route['Academia/Mantenimiento/periodo-de-pagos'] = "academia/Mantenimiento/mat_per_pag_index";
$route['Academia/Mantenimiento/Tipos-de-evaluacion'] = "academia/Mantenimiento/mant_tip_eva_index";
$route['Academia/Mantenimiento/Calificaciones'] = "academia/Mantenimiento/mant_cali_index";
$route['Academia/Mantenimiento/Categorias'] = "academia/Mantenimiento/mant_cat_index";
$route['Academia/Mantenimiento/Grupos'] = "academia/Mantenimiento/mant_grup_index";
$route['Academia/Mantenimiento/Grupos/actu'] = "academia/Mantenimiento/act_grup";


/*
* Rutas Agencia
*
*/


$route['Agencia'] = "agencia/Agencia";
$route['Agencia/Guias'] = "agencia/Guias";
$route['Agencia/Grupos'] = "agencia/Grupos";
$route['Agencia/Clientes'] = "agencia/Clientes";
$route['Agencia/Pagos'] = "agencia/Pagos";
$route['Agencia/Actividades'] = "agencia/Actividades";
$route['Agencia/Cliente/nuevo'] = "agencia/Clientes/cli_nuevo_index";
$route['Agencia/Asistencia/Ver'] = "agencia/Asistencia/ver_asis_index";
$route['Agencia/Asistencia/actividad'] = "agencia/Asistencia/tom_asis_index";
$route['Agencia/Asistencia/actividad/tomar_asistencia/'.$this->uri->segment(5).'/'.$this->uri->segment(6)] = "agencia/Asistencia/vista_asis_act_asis_index/".$this->uri->segment(5).'/'.$this->uri->segment(6);
$route['Agencia/Asistencia'] = "agencia/Asistencia";
$route['Agencia/actividad/ediar_asistencia/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6)] = "agencia/Asistencia/asis_upd_alu_index/";
$route['Agencia/Actividades/editar'] = "agencia/Actividades/list";
$route['Agencia/Mantenimiento/Lugares'] = "agencia/Mantenimiento/mant_lugares_index";
$route['Agencia/Mantenimiento/Tipo-de-pagos'] = "agencia/Mantenimiento/mant_tip_pago_index";
$route['Agencia/Mantenimiento/Forma-de-pagos'] = "agencia/Mantenimiento/mant_for_pago_index";
$route['Agencia/Mantenimiento/Estado-de-pagos'] = "agencia/Mantenimiento/mant_est_pago_index";
$route['Agencia/Mantenimiento/periodo-de-pagos'] = "agencia/Mantenimiento/mat_per_pag_index";
$route['Agencia/Mantenimiento/Tipos-de-evaluacion'] = "agencia/Mantenimiento/mant_tip_eva_index";
$route['Agencia/Mantenimiento/Calificaciones'] = "agencia/Mantenimiento/mant_cali_index";
$route['Agencia/Mantenimiento/Tipo-de-Grupo'] = "agencia/Mantenimiento/mant_cat_index";
$route['Agencia/Mantenimiento/Grupos'] = "agencia/Mantenimiento/mant_grup_index";
$route['Agencia/Mantenimiento/Grupos/actu'] = "agencia/Mantenimiento/act_grup";
// $route['Mantenimiento'] = "academia/Mantenimiento";
// $route['Pagos'] = "academia/Pagos";
// $route['Actividades'] = "academia/Actividades";
// $route['Estudiantes'] = "academia/Estudiante";
// $route['Reportes/Reporte-por-asistencia'] = "academia/Reportes/rep_asis_gru_index";
//


/*
  Rutas Factura

*/


$route['Factura'] = "factu/Facturas";
$route['Factura/nueva'] = "factu/Facturas/nueva";

$route['Facturar'] = "factu/Facturar";
$route['Factura/mantenimiento'] = "factu/Factu_mantenimiento";



/*
  Rutas Ventas

*/


$route['Ventas'] = "ventas/Ventas";
$route['tc/ventas'] = "ventas/Ventas_tc";
$route['tc/lista'] = "ventas/Ventas_tc/list_ven";


/*
  Rutas Caja

*/


$route['Ventas'] = "ventas/Ventas";
$route['tc/caja'] = "caja/Caja_tc";
