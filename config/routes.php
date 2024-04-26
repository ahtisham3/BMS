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

$route['default_controller'] = 'welcome'; //login page
$route['dashboard'] = 'welcome/dashboard';
$route['login'] = 'welcome/login';
$route['register'] = 'welcome/register';
$route['logout'] = 'welcome/logout';
$route['adminlogout'] = 'welcome/adminlogout';

$route['checkname'] = 'welcome/checkname';

$route['Items'] = 'Item/Item_list';
$route['add-item'] = 'Item/add_item';
$route['new-item'] = 'Item/new_item';
$route['update-item'] = 'Item/update_item';
$route['edit-item/(:any)'] = 'Item/edit_item/$1';


$route['new-sale'] = 'welcome/new_job';
$route['add-job'] = 'Job/add_job';
$route['sales'] = 'Job/all_job';
$route['Edit-job/(:any)'] = 'Job/Edit_Job/$1';
$route['view-job/(:any)'] = 'Job/view_job/$1';
$route['update-job'] = 'Job/Update_job';
$route['void-job/(:any)'] = 'Job/void_Job/$1';

$route['Search'] = 'welcome/MainSearch';

$route['expense'] = 'welcome/expense';
$route['add-expense'] = 'welcome/add_expense';
$route['new-expense'] = 'welcome/new_expense';
$route['edit-expense/(:num)'] = 'welcome/edit_expense/$1';
$route['delete-expense/(:num)'] = 'welcome/delete_expense/$1';
$route['update-expense'] = 'welcome/update_expense';

$route['company'] = 'welcome/company';
$route['update-company'] = 'welcome/update_company';
$route['reset'] = 'welcome/reset_pass';
$route['reset_do'] = 'welcome/reset_pass';


$route['package'] = 'welcome/package';
$route['addNewPackage'] = 'welcome/addNewPackage';
$route['addNewPackageT'] = 'welcome/addNewPackageT';

$route['AddTorder'] = 'welcome/AddTorder';

$route['addOrder'] = 'welcome/addOrder';
$route['creditCard'] = 'welcome/creditCard';
$route['newPackage'] = 'welcome/newPackage';
$route['upgradePackage'] = 'welcome/upgradePackage';
$route['editPackage/(:any)'] = 'welcome/editPackage/$1';
$route['editPackagedb/(:any)'] = 'welcome/editPackagedb/$1';

$route['admin/admindashboard'] = 'welcome/admindashboard';
$route['admin'] = 'welcome/admin';
$route['admin/adminLoginCheck'] = 'welcome/adminLoginCheck';
$route['admin/users'] = 'welcome/adminAllUsers';



$route['confirmOrder/(:any)'] = 'welcome/confirmOrder/$1';


$route['confirmPayment/(:any)'] = 'welcome/confirmPayment/$1';
// $route['getRecord/(:any)'] = 'GetRecord/record/$1';


$route['my-profile'] = 'welcome/my_profile';
$route['forgot-password'] = 'welcome/forgot_password';
$route['add-appointment'] = 'welcome/add_appointment';
$route['edit-appointment'] = 'welcome/edit_appointment';
$route['new-visit'] = 'welcome/new_visit';
$route['get-appointment'] = 'welcome/appointment_details';
$route['reschedule/(:any)'] = 'welcome/reschedule/$1';
$route['delete-appointment/(:any)'] = 'welcome/delete_appointment/$1';



$route['job-regenrate'] = 'Job/regenrate';
$route['calender'] = 'welcome/calender';
$route['payments'] = 'welcome/Payments';




$route['Employees'] = 'Employee/Employee_list';
$route['add-Employee'] = 'Employee/add_Employee';
$route['new-Employee'] = 'Employee/new_Employee';
$route['update-employee'] = 'Employee/update_Employee';
$route['delete-procedure/(:num)'] = 'Employee/delete_procedure/$1';
$route['edit-employee/(:any)'] = 'Employee/edit_employee/$1';


$route['Expiry'] = 'Employee/Expiring';
$route['sites'] = 'Site/Sites_list';
$route['add-site'] = 'site/add_site';
$route['new-site'] = 'site/new_site';
$route['update-site'] = 'site/update_site';
$route['edit-site/(:any)'] = 'site/edit_site/$1';


$route['clients'] = 'Client/Clients_list';
$route['add-client'] = 'Client/add_client';
$route['new-client'] = 'Client/new_client';
$route['update-client'] = 'Client/update_client';
$route['edit-client/(:any)'] = 'Client/edit_client/$1';





$route['pay'] = 'welcome/Payments';
$route['View_Pay/(:any)'] = 'Pay/View_Pay/$1';
$route['delete-Pay/(:num)'] = 'Pay/delete_Pay/$1';

$route['start/(:any)'] = 'welcome/start_appointment/$1';
$route['restart/(:any)'] = 'welcome/reschedule_appointment/$1';
$route['complete/(:any)'] = 'welcome/complete/$1';

$route['searcher'] = 'welcome/searcher';
$route['reports'] = 'welcome/reports';
$route['income'] = 'welcome/income';
// building
$route['createbuilding']='Building/BuildingController/create';
$route['createbuildingdetail']='Building/BuildingController/createBuilding';
$route['getbuildingdetails']='Building/BuildingController/index';
$route['editbuilding/(:any)'] = 'Building/BuildingController/updateBuilding/$1';
$route['deletebuilding/(:any)'] = 'Building/BuildingController/deleteBuilding/$1';
$route['updatebuilding/(:any)'] = 'Building/BuildingController/handleUpdateBuilding/$1';
$route['expencebuilding'] = 'Building/BuildingController/expencebuilding';
$route['new_expence']='Building/BuildingController/new_expence';

//floor
$route['createfloor']='Floor/FloorController/create';
$route['createfloordetail']='Floor/FloorController/createFloor';
$route['getfloordetails']='Floor/FloorController/index';
$route['editfloor/(:any)'] = 'Floor/FloorController/updateFloor/$1';
$route['deletefloor/(:any)'] = 'Floor/FloorController/deleteFloor/$1';
$route['updatefloor/(:any)'] = 'Floor/FloorController/handleUpdateFloor/$1';

//appartment
$route['createappartment']='Appartments/AppartmentsController/create';
$route['createappartmentdetail']='Appartments/AppartmentsController/createAppartment';
$route['getappartmentdetails']='Appartments/AppartmentsController/index';
$route['editappartment/(:any)'] = 'Appartments/AppartmentsController/updateAppartment/$1';
$route['deleteappartment/(:any)'] = 'Appartments/AppartmentsController/deleteAppartment/$1';
$route['updateappartment/(:any)'] = 'Appartments/AppartmentsController/handleUpdateAppartment/$1';
//service
$route['createservice']='Service/ServiceController/create';
$route['createservicedetail']='Service/ServiceController/createService';
$route['getservicedetails']='Service/ServiceController/index';
$route['editservice/(:any)'] = 'Service/ServiceController/updateService/$1';
$route['deleteservice/(:any)'] = 'Service/ServiceController/deleteService/$1';
$route['updateservice/(:any)']='Service/ServiceController/handleUpdateService/$1';

//custmer
$route['createcustomer']='Customer/CustomerController/create';
$route['createcustomerdetail']='Customer/CustomerController/createCustomer';
$route['getcustomerdetails']='Customer/CustomerController/index';
$route['editcustomer/(:any)'] = 'Customer/CustomerController/updateCustomer/$1';
$route['updatecustomer/(:any)']='Customer/CustomerController/handleUpdateCustomer/$1';
$route['deletecustomer/(:any)'] = 'Customer/CustomerController/deleteCustomer/$1';
$route['customerHistory/(:any)']='Customer/CustomerController/customerHistory/$1';
$route['editCustomerService/(:any)']='Customer/CustomerController/editCustomerService/$1';
$route['updateCustomerService/(:any)']='Customer/CustomerController/updateCustomerService/$1';

//cucomter service

$route['addcustomerservices']='Customer_Services/Customer_ServicesController/create';
$route['createcustomerservices']='Customer_Services/Customer_ServicesController/createCustomer_Services';


//new invoice
$route['initialinvoice']='Billing/billingInvoiceController/invoice';
$rotue['InitialInvoicepdf/(:any)']='Billing/BillingInvoiceController/sendEmailWithPDF/$1';
$route['AddUtilities/(:any)/(:any)'] = 'Billing/BillingInvoiceController/addUtilityBills/$1/$2';
$route['getutilityinvoice/(:any)']='Billing/billingInvoiceController/getutilitiesPaymentInvoice/$1';
$route['finalizebill']="BillingReport/BillingReportController/finalizeUtilities";
$route['customerByBuilding/(:any)']='Customer/CustomerController/getCustomerByBuildingIdForBillingReport/$1';
$route['receivedPayment/(:any)']= 'Billing/BillingInvoiceController/receivedPayment/$1';

//billingrepots
$route['getbillingreportdetails']='BillingReport/BillingReportController/index';
$route['salesReport']='BillingReport/BillingReportController/salesReport';
$route['expencereport']='BillingReport/BillingReportController/expenceReport';
$route['expencehistory/(:any)']='BillingReport/BillingReportController/expencehistory/$1';
$route['financelReport']='BillingReport/BillingReportController/financelReport';
//received payemtn
$route['getfinalinvoice']='Billing/BillingInvoiceController/getPayment';
//update final amount after disocut
$route['getdiscount']='Billing/BillingInvoiceController/UpdateBillAfterDiscount';


//dashboard 
$route['financials']='Dashboard/DashboardController/index';

//reporting
$route['reps'] = 'welcome/reps';
$route['ds_rep'] = 'welcome/dailyjob_rep';
$route['c_rep'] = 'welcome/client_rep';
//$route['financials'] = 'welcome/finance';
$route['all-Sales-data'] = 'Pay/Show_list';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
