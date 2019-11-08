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
$route['default_controller'] = 'home';
$route['translate_uri_dashes'] = FALSE;
// /*AJAX*/
// $route['ajax/insert_enq']='Ajax_Controller/insert_enquiry';


$route['home'] = 'home';
$route['product-one'] = 'Pages/Product_One_Controller';
$route['product-two'] = 'Pages/Product_Two_Controller';
$route['product-three-a'] = 'Pages/Product_Three_A_Controller';
// $route['product-three-b'] = 'Pages/Product_Three_B_Controller';
// $route['product-four'] = 'Pages/Product_Four_Controller';
// $route['product-five-a'] = 'Pages/Product_Five_A_Controller';
// $route['product-five-b'] = 'Pages/Product_Five_B_Controller';
// $route['product-six'] = 'Pages/Product_Six_Controller';
// $route['product-seven-a'] = 'Pages/Product_Seven_A_Controller';
// $route['product-seven-b'] = 'Pages/Product_Seven_B_Controller';
// $route['product-eight'] = 'Pages/Product_Eight_Controller';

$route['cart'] = 'Pages/Cart_Controller';

//ADMIN
$route['admin/login'] = 'Admin/Login_Controller';
$route['admin/dashboard'] = 'Admin/Dashboard_Controller';
$route['admin/product/edit/1'] = 'Admin/ProductEdit_Controller/getData/1';
$route['admin/product/edit/2'] = 'Admin/ProductEdit_Controller/getData/2';
$route['admin/product/edit/3'] = 'Admin/ProductEdit_Controller/getData/3';
$route['admin/product/edit/4'] = 'Admin/ProductEdit_Controller/getData/4';
$route['admin/product/edit/5'] = 'Admin/ProductEdit_Controller/getData/5';
$route['admin/product/edit/6'] = 'Admin/ProductEdit_Controller/getData/6';
$route['admin/product/edit/7'] = 'Admin/ProductEdit_Controller/getData/7';
$route['admin/product/edit/8'] = 'Admin/ProductEdit_Controller/getData/8';
$route['api/fetchProductDetail/$1'] = 'Api/fetchProductDetail/(:any)';
