<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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

//$route['default_controller'] = "welcome";
//$route['404_override'] = '';
$route['auth/logoff'] = 'auth/logoff';
//$route['news/create'] = 'news/create';
//$route['news/(:any)'] = 'news/view/$1';
//$route['news'] = 'news';
$route['fill'] = 'fill/index';
$route['auth'] = 'auth';
$route['news'] = 'news/index';
$route['edit'] = 'edit/index';
$route['requests'] = 'requests/index';
$route['query'] = 'query/index';
$route['classif'] = 'classif/index';
$route['classif/(:num)'] = 'classif/index';
$route['classif/remove/(:num)'] = 'classif/remove';
$route['edit/complete'] = 'edit/complete';
$route['edit/create'] = 'edit/create';
$route['edit/record/(:any)'] = 'edit/record/';
$route['edit/record'] = 'edit/record/';
$route['remove/(:any)'] = 'remove/index/';
$route['remove/delete'] = 'remove/delete/';
$route['edit/work'] = 'edit/work';
$route['requests/write'] = 'requests/write';
$route['query/work/(:num)'] = 'query/work';
$route['query/view/(:any)/(:any)'] = 'query/view';
$route['query/view/(:any)'] = 'query/view';
$route['query/view'] = 'query/view';
$route['query/complete'] = 'query/complete';
$route['query/refuse'] = 'query/refuse';
$route['query/auth'] = 'query/auth';
$route['query/logoff'] = 'query/logoff';
$route['result'] = 'result';
$route['card/rb'] = 'card/rb';
$route['export'] = 'export/index';
$route['card/(:any)/(:any)'] = 'card';
$route['card/(:any)'] = 'card';
$route['report'] = 'report/index';
$route['report/export'] = 'report/export';
$route['query/returnn/(:num)/(:num)'] = 'query/returnn';

$route['tables'] = 'tables';
$route['tables/edit'] = 'tables/edit';
$route['tables/edit/(:any)'] = 'tables/edit';
$route['tables/remove/(:any)'] = 'tables/remove';
$route['tables/remove'] = 'tables/remove';
$route['tables/newrecord'] = 'tables/newrecord';
$route['tables/(:any)'] = 'tables/index';



$route['default_controller'] = 'result';
$route['pages'] = 'pages/index';

$route['(:any)'] = 'pages/view/$1';
//$route['default_controller'] = 'pages/view';


/* End of file routes.php */
/* Location: ./application/config/routes.php */