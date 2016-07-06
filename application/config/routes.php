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

$route['default_controller'] = "loginnreg/log_logged";
$route['login'] = 'loginnreg/login';
$route['registration'] = 'loginnreg/registration';
$route['register']='loginnreg/register_validation';
$route['registerlogin'] = 'loginnreg/registerlogin';
$route['loggedinuser'] = 'loginnreg/login_setup';
$route['logoff'] = 'loginnreg/logoff';

$route['home'] = 'dashboard/display_home';
$route['all_users'] = 'dashboard/display_all_users';
$route['group/(:any)'] = 'dashboard/display_group_page/$1';
$route['view_profile/(:any)'] = 'dashboard/display_other_profile/$1';
$route['add_game/(:any)'] = 'dashboard/display_add_game/$1';
$route['add_score_form'] = 'dashboard/add_potential_game';
$route['notifications'] = 'dashboard/display_notifications';
$route['chat/(:any)'] = 'dashboard/display_chat/$1';
$route['invite/(:any)'] = 'dashboard/add_invite/$1';
$route['confirmation'] = 'dashboard/confirmed';
$route['settings'] = 'dashboard/display_settings';
$route['change_settings'] = 'dashboard/add_settings';
$route['activate_user'] = 'dashboard/change_user_availability';
$route['all_users'] = 'dashboard/display_active_users';


$route['admin'] = 'unicorn/display_admin';
$route['add_group'] = 'unicorn/add_group';
$route['inactivate_group/(:any)'] = 'unicorn/remove_active_group/$1';

$route['chat_api'] = 'mean/api';
$route['group_api/(:any)'] = 'mean/group_api/$1';


$route['404_override'] = '';




/* End of file routes.php */
/* Location: ./application/config/routes.php */