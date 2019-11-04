var BASE_URL = "http://jsr.technomize.com/api/";
var DASHBOARD_URL = "http://jsr.technomize.com/dashboard";

var WEB_URL = "http://localhost/cushionstore";

var COMAPNY_NAME = "JSR Global Research";

var LOGIN_API = "login";

var LOCK_ENABLED = 'lock_status';

var LOCK_CRM_PSWD = 'lock_paswd';

var GLOBAL_DELETE_API = "global/delete";
var GLOBAL_FETCH_API = "global/fetch";
var GLOBAL_FETCH_WHERE_API = "global/fetch/where"; //method: POST || i/p: db tableName - key value pair for where condition|| eg: global/fetch/where/{tableName} 

var GLOBAL_REPORT_COUNT_API = "report/get/count"; //method: POST || i/p: db tableName - key value pair for where condition|| eg: report/get/count/{tableName} 

var USER_TOKEN = "token";
var EXPIRY_DATE = "expiryDate";
var EMPLOYEE_ID = "emp_id";
var EMPLOYEE_NAME = "name";
var USER_TYPE = "user_type";

var EMPLOYEE_ADD_API = "employee/add";
var EMPLOYEE_UPDATE_API = "employee/update";
var EMPLOYEE_UPDATE_STATUS_API = "employee/updateStatus";
var EMPLOYEE_GET_ACTIVE_API = "employee/get/active";
var EMPLOYEE_GET_INACTIVE_API = "employee/get/inactive";

var EMPLOYEE_DROPDOWN_GET_API = "dropdown/get";
var EMPLOYEE_FORMATTED_DROPDOWN_GET_API = "employee/get/dropdown";

var ADD_LEAD_API = "lead/add";
var GET_ALL_LEADS_API = 'lead/get/all';
var GET_DND_LEADS_API = 'lead/get/DND';
var GET_FRESH_LEADS_API = 'lead/get/FRESH';
var GET_FOLLOWUP_LEADS_API = 'lead/get/FOLLOWUP';
var GET_DISPOSED_LEADS_API = 'lead/get/DISPOSED';
var GET_ASSIGNED_LEADS_API = 'lead/get/ASSIGNED';
var GET_UNASSIGNED_LEADS_API = 'lead/get/UNASSIGNED';
var GET_IDLE_LEADS_API = 'lead/get/IDLE';

var UPDATE_LEAD_STATUS_API = 'lead/update/status';

var UPDATE_LEAD_API = 'lead/update';
var CONVERT_LEAD_TO_CONTACT_API = 'lead/contact';
var BOOK_FREE_TRIAL_API = 'lead/book/freetrial';

var ADD_CALL_DESCRIPTION_API = 'lead/add/desc';

var UPLOAD_CSV_LEAD_API = 'lead/upload_csv';
var ASSIGN_LEADS_API = 'lead/assign';
var GET_AONE_LEADS_API ='lead/type/get/AONE';
var GET_WEB_LEADS_API ='lead/type/get/WEB';
var GET_SMO_LEADS_API ='lead/type/get/SMO';

var ASSIGN_LEADS_TO_SELF_API = 'lead/self/assign';

var GET_LEADS_ACCOUNT_API ='lead/get/ACCOUNT';
var GET_LEADS_CALL_DESCRIPTION_API ='lead/get/desc'; //method: GET || i/p: lead_id || eg: lead/get/desc/{lead_id} 


var GET_SMS_CATEGORY_API ='sms/category/get';
var ADD_SMS_CATEGORY_API ='sms/category/add';
var UPDATE_SMS_CATEGORY_API ='sms/category/update';

var ADD_SMS_TEMPLATE_API ='sms/add';
var GET_SMS_TEMPLATE_API ='sms/template/get';
var UPDATE_SMS_TEMPLATE_API ='sms/update';

var SEND_SMS_API ='sms/send';
var SEND_MAIL_API ='email/send';

var GET_MAIL_CATEGORY_API ='mail/category/get';
var ADD_MAIL_CATEGORY_API ='mail/category/add';
var UPDATE_MAIL_CATEGORY_API ='mail/category/update';

var GET_MAIL_TEMPLATE_API ='mail/template/get';
var ADD_MAIL_TEMPLATE_API ='mail/add';
var UPDATE_MAIL_TEMPLATE_API ='mail/update';

var GET_SERVICES_API ='services/get';

var ADD_SALESORDER_API = 'salesorder/add';
var GET_SALESORDER_API = 'salesorder/get';
var GET_SALESORDER_ACCEPTED_API = 'salesorder/get/ACCEPTED';
var GET_SALESORDER_PENDING_API = 'salesorder/get/PENDING';
var GET_SALESORDER_REJECTED_API = 'salesorder/get/REJECTED';
var UPDATE_SALESORDER_STATUS_API = 'salesorder/update';

var GET_TARGET_API ='target/get';
var GET_SINGLE_TARGET_API ='target/get/single';
var ADD_TARGET_API ='target/add';

var GET_FREETRIAL_ACTIVE_API ='freetrial/get/ACTIVE';
var GET_FREETRIAL_PAST_API ='freetrial/get/PAST';

var GET_BANK_ACCOUNTS_API ='bank/get';
var ADD_BANK_ACCOUNT_API ='bank/add';
var UPDATE_BANK_ACCOUNT_API ='bank/update';
