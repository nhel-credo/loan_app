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
$route['loan'] = 'loan/borrowers';
$route['loan'] = 'loan/index';
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['registration_form'] = 'registration_form/index';
$route['user']='user/add_user';
$route['user']='user/insert_user';
$route['loan']='loan/loanForm';
$route['user_model']='user_model/insert_user';
$route['confirm_dialog']='confirm_dialog/success_dialog';
$route['get_user']='user/get_user';
$route['view_user']='user/view_user';
$route['check_email']='user/if_email_exist';
$route['check_email']='user_model/email_exists';
$route['by_id']='user_model/getuserby_id';
$route['by_id']='user/getuserby_id';
$route['add_borrower']='borrower/insert_borrower';
$route['get_borrower']='borrower/get_borrower';
$route['add_borrower']='borrowers_model/insert_borrower';
$route['get_borrower']='borrowers_model/get_borrower';
$route['get_borrower']='borrower/borrowers_list';
$route['getdatatable']='borrowers_model/_get_datatables_query';
$route['getdatatable']='borrowers_model/get_datatables';
$route['get_byid']='borrowers_model/getby_id';
$route['get_byid']='borrowers/getby_id';
$route['borrower']='borrower/on_update';
$route['borrowers_model']='borrowers_model/on_update';
$route['loan_type']='loan/get_loan_type';
$route['sessionex'] = 'Session_Controller';
$route['active_loans']='borrower/active_loans';
$route['get_previous_ledger']='borrower_controller/get_ledger';
