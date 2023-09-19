<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'home';

// setting route for admin
$route['admin'] = 'admin/auth';

// Admin Locations
$route['admin/location/country/add'] = 'admin/location/country_add';
$route['admin/location/country/edit/(:num)'] = 'admin/location/country_edit/$1';
$route['admin/location/country/del/(:num)'] = 'admin/location/country_del/$1';
$route['admin/location/state/add'] = 'admin/location/state_add';
$route['admin/location/state/edit/(:num)'] = 'admin/location/state_edit/$1';
$route['admin/location/state/del/(:num)'] = 'admin/location/state_del/$1';
$route['admin/location/city/add'] = 'admin/location/city_add';
$route['admin/location/city/edit/(:num)'] = 'admin/location/city_edit/$1';
$route['admin/location/city/del/(:num)'] = 'admin/location/city_del/$1';

// setting route for insurances
$route['admin/insurances'] = 'admin/insurance/index';
$route['admin/insurances/(:num)'] = 'admin/insurance/show/$1';

// setting route for job page
$route['jobs'] = 'jobs/index';
$route['jobs/(:num)'] = 'jobs/index/$1';

// setting route for job detail page
$route['jobs/(:num)/(:any)'] = 'jobs/job_detail/$1/$2';

// setting route for companies
$route['company/(:any)'] = 'company/detail/$1';

// setting route for jobs by category, industry & location
$route['jobs-by-category'] = 'jobs/jobs_by_category';
$route['jobs-by-industry'] = 'jobs/jobs_by_industry';
$route['jobs-by-location'] = 'jobs/jobs_by_location';

// setting blog category
$route['admin/blog/category/add'] = 'admin/blog/category_add';
$route['admin/blog/category/edit/(:num)'] = 'admin/blog/category_edit/$1';
$route['admin/blog/category/del/(:num)'] = 'admin/blog/category_del/$1';

// seo settings
$route['admin/settings/seo'] = 'admin/seo';
$route['admin/settings/seo/(:any)/edit'] = 'admin/seo/edit_seo/$1';
$route['admin/settings/seo/update/(:any)'] = 'admin/seo/update_seo/$1';

$route['employers/dashboard'] = 'employers/account/dashboard';

$route['offers'] = 'home/offers';
$route['details'] = 'home/details';
$route['payment'] = 'home/payment';
$route['quote-insurance'] = 'home/quote_insurance';
$route['about-fast-insurance'] = 'home/about_insurance';
$route['axa-insurance'] = 'home/about_insurer';
$route['who-needs'] = 'home/who_needs';
$route['countries'] = 'home/countries';
$route['coverage'] = 'home/coverage';
$route['pricing'] = 'home/pricing';
$route['travel-insurance-online'] = 'home/travel_online';
$route['verify'] = 'policy/verify';

// seting for contact us page
$route['contact'] = 'home/contact';

$route['p/(:any)'] = 'home/any/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
