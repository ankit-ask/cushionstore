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
$route['translate_uri_dashes'] = FALSE;
// /*AJAX*/
// $route['ajax/insert_enq']='Ajax_Controller/insert_enquiry';

/*Api Routes */
$route['api/login'] = 'Api/login';
$route['api/employee/add']= 'Api/employeeAdd';
$route['api/employee/get/active']= 'Api/getActiveEmployee';
$route['api/employee/get/inactive']= 'Api/getInActiveEmployee';
$route['api/dropdown/get/(:any)']= 'Api/getDropdown/$1';
$route['api/dropdown/get/(:any)/(:any)']= 'Api/getNestedDropdown/$1/$2';
$route['api/employee/update']= 'Api/editActiveEmployee';
$route['api/employee/updateStatus/(:any)']= 'Api/editStatusEmployee/$1';
$route['api/lead/add']= 'Api/leadAdd';
$route['api/lead/get/all']= 'Api/getAllLeads';
$route['api/lead/get/desc/(:any)']= 'Api/getLeadsDesc/$1';
$route['api/lead/get/desc']= 'Api/getLeadsDesc';
$route['api/lead/get/(:any)']= 'Api/getLeadsByStatus/$1';
$route['api/lead/type/get/(:any)']= 'Api/getLeadsByType/$1';
$route['api/lead/upload_csv']= 'Api/uploadCSV';
$route['api/lead/assign']= 'Api/assignLeads';
$route['api/lead/self/assign']= 'Api/assignLeadsToSelf';
$route['api/lead/ideal']= 'Api/calculateIdealLeads';
$route['api/lead/add/desc/(:any)']= 'Api/addLeadDesc/$1';
$route['api/lead/update/status/(:any)']= 'Api/updateLeadStatus/$1';
$route['api/lead/update/(:any)']= 'Api/updateLead/$1';
$route['api/lead/contact/(:any)']= 'Api/convertLead/$1';
$route['api/lead/book/freetrial/(:any)']= 'Api/bookFreeTrail/$1';
$route['api/sms/add']= 'Api/addSmsTemplate';
$route['api/sms/update/(:any)']= 'Api/editSmsTemplate/$1';
$route['api/sms/category/add']= 'Api/addSmsCategory';
$route['api/sms/category/update/(:any)']= 'Api/editSmsCategory/$1';
$route['api/mail/category/add']= 'Api/addMailCategory';
$route['api/mail/category/update/(:any)']= 'Api/updateMailCategory/$1';
$route['api/mail/add']= 'Api/addMailTemplate';
$route['api/mail/update/(:any)']= 'Api/editMailTemplate/$1';
$route['api/sms/category/get']= 'Api/getSmsCategory';
$route['api/sms/template/get']= 'Api/getSmsTemplate';
$route['api/mail/category/get']= 'Api/getMailCategory';
$route['api/mail/template/get']= 'Api/getMailTemplate';
$route['api/global/delete/(:any)'] = 'Api/delGlobal/$1';
$route['api/global/fetch/(:any)'] = 'Api/fetchGlobal/$1';
$route['api/global/fetch/where/(:any)'] = 'Api/fetchGlobalWhere/$1';
$route['api/services/get'] = 'Api/getServices/$1';
$route['api/services/get'] = 'Api/getServices/$1';
$route['api/target/add'] = 'Api/addTarget';
$route['api/target/get'] = 'Api/getTarget';
$route['api/target/get/single'] = 'Api/getSingleTarget';
$route['api/salesorder/add'] = 'Api/addSalesOrder';
$route['api/salesorder/update/(:any)'] = 'Api/updateSalesOrder/$1';
$route['api/salesorder/get'] = 'Api/getSalesOrder';
$route['api/freetrial/get/(:any)'] = 'Api/getFreeTrial/$1';
$route['api/salesorder/get/(:any)']= 'Api/getSalesOrderByStatus/$1';
$route['api/bank/get']= 'Api/getBank';
$route['api/bank/add']= 'Api/addBank';
$route['api/bank/update/(:any)']= 'Api/updateBank/$1';
$route['api/sms/send']= 'Api/sendSms';
$route['api/email/send']= 'Api/sendEmail';
$route['api/employee/get/dropdown']= 'Api/getEmployeeDropDown';
$route['api/report/get/count/(:any)']= 'Api/getCountReport/$1';
$route['api/report/get/uploadleads']= 'Api/getUploadLeadsReport';

$route['api/test'] = 'Api/test';



// $route['vdb2b/api/category/list/child/(:any)/(:num)/(:num)']= 'Vdb2b/Api/childCategoryFetchPag/$1/$2/$3';
// $route['vdb2b/api/category/list/child']= 'Vdb2b/Api/childCategoryFetch';
// $route['vdb2b/api/product/list/category/(:any)/(:num)/(:num)']= 'Vdb2b/Api/productFetchPag/$1/$2/$3';
// $route['vdb2b/api/product/list/category/all/(:any)']= 'Vdb2b/Api/productFetch/$1';
// $route['vdb2b/api/product/update']= 'Vdb2b/Api/productUpdate';
// $route['vdb2b/api/user/list/customer/(:num)/(:num)']= 'Vdb2b/Api/customerFetchPag/$1/$2';
// $route['vdb2b/api/user/list/all/customer']= 'Vdb2b/Api/customerFetch';
// $route['vdb2b/api/user/list/all/salesman']= 'Vdb2b/Api/salesmanFetch';
// $route['vdb2b/api/user/list/all/salesman/(:num)/(:num)']= 'Vdb2b/Api/salesmanFetchPag/$1/$2';


// JSR CRM
$route['login'] = 'Auth/Login_Controller';
$route['dashboard'] = 'Pages/Dashboard_Controller';
$route['employee/active'] = 'Pages/Employee_Active_Controller';
$route['employee/inactive'] = 'Pages/Employee_Inactive_Controller';
// $route['users'] = 'Pages/Users_Controller';

$route['leads/all'] = 'Pages/Leads_List_Controller';

$route['leads/aone'] = 'Pages/Leads_Aone_Controller';
$route['leads/web'] = 'Pages/Leads_Web_Controller';
$route['leads/smo'] = 'Pages/Leads_Smo_Controller';

$route['leads/unassigned'] = 'Pages/Leads_Unassigned_Controller';
$route['leads/assigned'] = 'Pages/Leads_Assigned_Controller';
$route['leads/fresh'] = 'Pages/Leads_Fresh_Controller';
$route['leads/dnd'] = 'Pages/Leads_DND_Controller';
$route['leads/disposed'] = 'Pages/Leads_Disposed_Controller';
$route['leads/followup'] = 'Pages/Leads_Followup_Controller';
$route['leads/idle'] = 'Pages/Leads_Idle_Controller';

$route['free-trials/active'] = 'Pages/Free_Trials_Active_Controller';
$route['free-trials/past'] = 'Pages/Free_Trials_Past_Controller';

$route['announcement'] = 'Pages/Announcement_Controller';
$route['services'] = 'Pages/Services_Controller';
$route['bank'] = 'Pages/Bank_Controller';

$route['target/all'] = 'Pages/Target_All_Controller';
$route['target/individual'] = 'Pages/Target_Individual_Controller';

$route['accounts'] = 'Pages/Accounts_Controller';

$route['sales/receipt'] = 'Pages/Receipts_Controller';
$route['sales/salesorder/all'] = 'Pages/Salesorder_Controller';
$route['sales/salesorder/accepted'] = 'Pages/Salesorder_Accepted_Controller';
$route['sales/salesorder/pending'] = 'Pages/Salesorder_Pending_Controller';
$route['sales/salesorder/rejected'] = 'Pages/Salesorder_Rejected_Controller';


$route['sms/category'] = 'Pages/Sms_Category_Controller';
$route['sms/template'] = 'Pages/Sms_Template_Controller';

$route['email/category'] = 'Pages/Email_Category_Controller';
$route['email/template'] = 'Pages/Email_Template_Controller';

$route['communication/sms'] = 'Pages/Communication_Sms_Controller';
$route['communication/mail'] = 'Pages/Communication_Mail_Controller';

// Controllers & View Pending
$route['reports'] = 'Pages/Reports_Controller';

//TODO
//--Fix Breadcrumps
//--Lead Management
