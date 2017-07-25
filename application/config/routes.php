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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Public routes
$route['home']='welcome/index';
$route['login'] = 'welcome/login';
$route['signup'] = 'welcome/signup';
$route['search'] = 'welcome/search';
$route['ticket'] = 'welcome/ticket';
$route['contactus'] = 'welcome/contact';
$route['group'] = 'welcome/groupBook';

//redirect routes
$route['redirectsuc'] = 'welcome/signup_success';
$route['redirecterr'] = 'welcome/signup_error';
$route['verifiedLogin'] = 'welcome/verification_login';
$route['redirectSuccess'] = 'admin/red_success';
$route['redirectError'] = 'admin/red_error';


//Form routes
$route['signupAction'] = 'welcome/signupCompany';
$route['signinAction'] = 'welcome/auth_login';
$route['verify/(:any)'] = 'welcome/activate_account/$1';
$route['add-schedule'] = 'admin/add_opp_schedule';
$route['update-schedule'] = 'admin/update_opp_schedule';
$route['delete-schedule'] = 'admin/delete_opp_schedule';
$route['ticketSubmit'] = 'welcome/ticket_succs';
$route['cancel-ticket'] = 'admin/cancel_opp_ticket';
$route['confirm-ticket'] = 'admin/confirm_opp_ticket';

//operator routes
$route['op'] = 'admin/index';
$route['signout'] = 'admin/signout';
$route['addOperation'] = 'admin/add_operations';
$route['active-operation'] = 'admin/active_operations';
$route['schedule-view'] = 'admin/schedule_preview';
$route['opp-ticket'] = 'admin/operation_tickets';
$route['active-ticket'] = 'admin/active_tickets';
$route['search-ticket'] = 'admin/search_ticket';
$route['ticket-view'] = 'admin/ticket_preview';
$route['ticket_success'] = 'welcome/ticket_success';
$route['ticket-code'] = 'welcome/ticket_code';
$route['active-group'] = 'admin/active_groups';
$route['ticket_view'] = 'welcome/tickets_view';
$route['group_success'] = 'welcome/gp_success';
$route['edit-profile'] = 'admin/edit_profile';

//documentation routes
$route['Terms'] = 'welcome/terms';
$route['faqs'] = 'welcome/faqs';
$route['howitWorks'] = 'welcome/howitworks';