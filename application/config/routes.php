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
$route['default_controller'] = 'c_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'c_navigasi';
$route['logout'] = 'c_login/out';

$route['manage_user'] = 'manage_user/c_manage_user';
$route['manage_user/add/user'] = 'manage_user/c_manage_user/add_user';
$route['manage_user/edit/user/(:any)'] = 'manage_user/c_manage_user/view_user/(:any)';
$route['manage_user/view/user/(:any)'] = 'manage_user/c_manage_user/view_user/(:any)';
$route['manage_user/setting/user/(:any)'] = 'manage_user/c_manage_user/password_user/(:any)';

$route['project'] = 'project/c_project';
$route['add/project'] = 'project/c_project/add_project';
$route['edit/project/(:any)'] = 'project/c_project/view_project/(:any)';
$route['view/project/(:any)'] = 'project/c_project/view_project/(:any)';
$route['view/project_user/(:any)'] = 'project/c_project/view_project_user/(:any)'; ///**
$route['report/project/(:any)'] = 'report/c_report/report_project/(:any)';

$route['create/report/(:any)'] = 'report/c_report/create_report';
$route['report'] = 'report/c_report';
$route['list/(:any)/report/(:any)'] = 'report/c_report/list_report/(:any)';
$route['view/report/(:any)'] = 'report/c_report/view_report/(:any)';
$route['edit/report/(:any)'] = 'report/c_report/view_report/(:any)';
