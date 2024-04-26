<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload file
require 'vendor/autoload.php';
class BillingInvoiceController extends CI_Controller
{
    public function __construct()
    {
      
        parent::__construct();
        $this->load->model("Customer_ServicesModel");
        $this->load->model("AppartmentsModel");
        $this->load->model("CustomerModel");
        $this->load->model("ServiceModel");
        $this->load->model("BillingModel");
        $this->load->library('email');
        $this->load->library('session');
    }
    //create customer
    public function invoice()
    {
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        $customer_Id = $this->session->userdata('customer_Id');
        $company_Id = $this->session->userdata('company');
        $invoiceDetails['companyDetails']=$this->BillingModel->getCompanyDetails($company_Id);
      
        $invoiceDetails['customerDetails'] = $this->CustomerModel->getCustomerById($customer_Id);
        $invoiceDetails['billingDetails'] = $this->Customer_ServicesModel->latestInvoiceDetail($customer_Id);
        // $invoiceDetails['customer_ServiceDetails']=$this->Customer_ServicesModel->getCustomerServiceDetails($customer_Id);
        $invoiceDetails['appartmentDetails'] = $this->AppartmentsModel->getAppartmentForBilling($customer_Id);
        $invoiceDetails['service_details'] = $this->ServiceModel->getServiceDetailsForBilling($customer_Id);
        $invoiceDetails['billing_details'] = $this->BillingModel->getBillingDetailsForBilling($customer_Id);
        // //print_r( $invoiceDetails['customer_ServiceDetails']);
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
       
        $this->load->view("billing/billinginvoice", $invoiceDetails);
        $this->load->view('inc/footer');
        $customer_Id = $this->session->userdata('customer_Id');
        //print_r($customer_Id);
    }
    
public function UpdateBillAfterDiscount()
{
     $data['user_id']=$this->input->post('user_id');
     $data['']=$this->input->post('');
     $data['']=$this->input->post('');
     $data['']=$this->input->post('');

}

    //monthwise ccutoemr
    public function getPayment()
    {  $this->authmiddleware->checkAuth();
         $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        
        $customer_Id=$this->input->post('user_id');
        $billing_Id=$this->input->post('billing_Id');
        $this->session->set_userdata('billingId', $billing_Id);
        $totalAmountInput=$this->input->post('totalAmountInput');
        $discontAmont=$this->input->post('discontAmont');
          $result=$this->BillingModel->updateTotalpayment($billing_Id,$discontAmont);
          $company_Id = $this->session->userdata('company');
        
        

         if($result==true)
         {
            $invoiceDetails['companyDetails']=$this->BillingModel->getCompanyDetails($company_Id);
            $invoiceDetails['customerDetails'] = $this->CustomerModel->getCustomerById($customer_Id);
            $invoiceDetails['billingDetails'] = $this->Customer_ServicesModel->latestInvoiceDetail($customer_Id);
            // $invoiceDetails['customer_ServiceDetails']=$this->Customer_ServicesModel->getCustomerServiceDetails($customer_Id);
            $invoiceDetails['appartmentDetails'] = $this->AppartmentsModel->getAppartmentForBilling($customer_Id);
            $invoiceDetails['service_details'] = $this->ServiceModel->getServiceDetailsForBillingLatest($customer_Id);
            $invoiceDetails['billing_details'] = $this->BillingModel->getBillingDetailsForBilling($customer_Id);
            $invoiceDetails['service_Utilities'] = $this->BillingModel->getServiceUtilities($customer_Id);
            //$this->load->view("billing/billinginvoice",$invoiceDetails);
            $this->load->view('inc/header');
            $this->load->view('inc/nav', $data);
            $this->load->view("billing/getpaymentinvoice", $invoiceDetails);
            $this->load->view('inc/footer');
         }
         else 
         {
            redirect(base_url('dashboard'));
         }
        
    }

    public function getutilitiesPaymentInvoice($customer_Id)
    { 
        try{
            $invoiceDetailsbill = $this->BillingModel->getBillingDetailOfPrevousMonth($customer_Id);
            $currentMonth = date('m'); // Get the current month in numeric format (e.g., '04' for April)
            $isPaymentDue = false; // Initialize flag
            $totalPendingInvoices = 1; // Initialize counter for total pending invoices
            $previousMonthAmount=0;
            foreach ($invoiceDetailsbill as $billingDetail) {
                $invoiceMonth = date('m', strtotime($billingDetail->invoice_Date)); // Get the month of the invoice date
                // Check if payment status is 0 and the invoice month is not the current month
                if ($billingDetail->payment_Status == 0 && $invoiceMonth != $currentMonth) {
                    $previousMonthAmount += $billingDetail->customer_TotalAmonut;
                    $isPaymentDue = true; // Set flag to true
                    $totalPendingInvoices++; // Increment total pending invoices counter
                }
            }
            if ($isPaymentDue) {
                $this->authmiddleware->checkAuth();
                $data['page_title'] = 'Dashboard';
                $data['user'] = $this->session->userdata('item');
                $company_Id = $this->session->userdata('company');
                $invoiceDetails['companyDetails']=$this->BillingModel->getCompanyDetails($company_Id);
                $invoiceDetails['customerDetails'] = $this->CustomerModel->getCustomerById($customer_Id);
                $invoiceDetails['billingDetails'] = $this->Customer_ServicesModel->latestInvoiceDetail($customer_Id);
                
                // $invoiceDetails['customer_ServiceDetails']=$this->Customer_ServicesModel->getCustomerServiceDetails($customer_Id);
                $invoiceDetails['appartmentDetails'] = $this->AppartmentsModel->getAppartmentForBilling($customer_Id);
                $invoiceDetails['totalpendingmonth']=$totalPendingInvoices;
                $invoiceDetails['service_details'] = $this->ServiceModel->getServiceDetailsForBillingprevious($customer_Id);
                $invoiceDetails['billing_details'] = $this->BillingModel->getBillingDetailsForBilling($customer_Id);
                $invoiceDetails['previousTotalAmount']=$previousMonthAmount;
                $invoiceDetails['service_Utilities'] = $this->BillingModel->getServiceUtilities($customer_Id);
                //$this->load->view("billing/billinginvoice",$invoiceDetails);
                $this->load->view('inc/header');
                $this->load->view('inc/nav', $data);
                $this->load->view("billing/getinvoicefordefault", $invoiceDetails);
                $this->load->view('inc/footer');

            } else {
              
                $this->authmiddleware->checkAuth();
                $data['page_title'] = 'Dashboard';
                $data['user'] = $this->session->userdata('item');
                $company_Id = $this->session->userdata('company');
                $invoiceDetails['companyDetails']=$this->BillingModel->getCompanyDetails($company_Id);
                $invoiceDetails['customerDetails'] = $this->CustomerModel->getCustomerById($customer_Id);
                $invoiceDetails['billingDetails'] = $this->Customer_ServicesModel->latestInvoiceDetail($customer_Id);

                // $invoiceDetails['customer_ServiceDetails']=$this->Customer_ServicesModel->getCustomerServiceDetails($customer_Id);
                $invoiceDetails['appartmentDetails'] = $this->AppartmentsModel->getAppartmentForBilling($customer_Id);
                $invoiceDetails['service_details'] = $this->ServiceModel->getServiceDetailsForBillingLatest($customer_Id);
                $invoiceDetails['billing_details'] = $this->BillingModel->getBillingDetailsForBilling($customer_Id);
                $invoiceDetails['service_Utilities'] = $this->BillingModel->getServiceUtilities($customer_Id);
                //$this->load->view("billing/billinginvoice",$invoiceDetails);
                $this->load->view('inc/header');
                $this->load->view('inc/nav', $data);
                $this->load->view("billing/getfinalinvoice", $invoiceDetails);
                $this->load->view('inc/footer');
                    }

        }
    catch(Exception $e)
    {
        $file = __FILE__;       // Get the file name
        $function = __FUNCTION__; // Get the function name
        $line = __LINE__;       // Get the line number
    
        echo "Exception caught in file '$file', function '$function', line $line: $message\n";
    }

    }

    public function addUtilityBills($customer_Id,$billing_Id)
    
    {
        $this->session->set_userdata('billing_Id', $billing_Id);
        $billid=$this->session->userdata('billing_Id');
      
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        $data['metersDetail']=$this->AppartmentsModel->getMetersDetail($customer_Id);
        $data['customerDetails'] = $this->CustomerModel->getCustomerById($customer_Id);
        $data['utilitesType'] = $this->BillingModel->getUtilitiesType();
        //print_r($data);
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view("billing/finalizeutilities",$data);
        $this->load->view('inc/footer');
    }

    public function getutilitiesBills()
    {
        $this->authmiddleware->checkAuth();
      
        $totalbillamonuts = 0;
        $customerID = $this->input->post('customerID');
        $bills = $this->input->post('bills');
        $billtypes = $this->input->post('bill_types');
        foreach ($billtypes as $index => $utilityId) {
            
            $billid=$this->session->userdata('billing_Id');
            print_r($billid);

            // Check if the bill amount exists for the current utility
            if (isset($bills[$index])) {
                // Retrieve the bill amount for the current utility
                $billAmount = $bills[$index];
                $totalbillamonuts += $billAmount;
                // Prepare data to be inserted into the database
                $data = array(
                    'customer_Id' => $customerID,
                    'bill_Name' => $utilityId,
                    'bill_Price' => $billAmount,
                    'billing_Id'=>$billid      
                );
                //print_r($data);
                $this->BillingModel->insertUtilityBill($data);
            } else {
                echo "value not found";
            }
        } 
        $customerdata = $this->Customer_ServicesModel->getCustomerBillingDetail($customerID);
        $customerBill = $customerdata->customer_TotalAmonut;
        $finalamont = $customerBill + $totalbillamonuts;
        $billingid = $customerdata->billing_Id;
        $this->Customer_ServicesModel->updateCustomerBill($finalamont, $billingid);
        redirect(base_url("getutilityinvoice/$customerID"));
         $this->BillingModel->getutilitiesBills($data);
    }
    //when final amont reveiced
    public function updatePaymentStatus($customer_Id)
    {
        $billid=$this->session->userdata('billingId');
       
        $this->authmiddleware->checkAuth();
        $this->ServiceModel->updateServiceStatus($customer_Id);
        $this->BillingModel->ReceivedupdatePaymentStatus($customer_Id);
        $this->BillingModel->invoiceClearenceDate($customer_Id);
        $this->BillingModel->updateUtilityRecDate($billid);
       
    }

///update payemtn status first time
    public function updatePaymentStatusinitial($customer_Id)
    {
        $billid=$this->session->userdata('billing_Id');
        $this->authmiddleware->checkAuth();
        $this->ServiceModel->updateServiceStatus($customer_Id);
        $this->BillingModel->ReceivedupdatePaymentStatus($customer_Id);
        $this->BillingModel->invoiceClearenceDate($customer_Id);
    
       
    }

    public function updateUtilityStatus($customer_Id)
    {
        $this->authmiddleware->checkAuth();
        $this->BillingModel->updateUtilityStatus($customer_Id);

    }
    //fiest tyme customer cretes
    public function sendEmailWithPDF($customer_Id)
    {$this->authmiddleware->checkAuth();
        $pdfFilePath = 'D:/';

        $timeout = 2; // Timeout in seconds
        $startTime = time();
        $latestFile = null;
    
        // Wait for the specified time before checking files
        while (time() - $startTime < $timeout) {
            sleep(1); // Wait for 1 second
        }
        $latestFile = $this->getLatestFile($pdfFilePath);
        ob_start();
        //print_r($latestFile);
        if ($latestFile) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $fromEmail = 'ahtishamm2@gmail.com';
                $data = $this->CustomerModel->getCustomerById($customer_Id);
                $this->updatePaymentStatusinitial($customer_Id);
                $userEmail = $data->customer_Email;
                $mail->CharSet = "UTF-8";
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ahtishamm2@gmail.com';
                $mail->Password = 'eqnv fqzi oeud xwju';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->SMTPDebug = 2;
                $mail->setFrom($fromEmail, 'building managment system');
                $mail->addAddress($userEmail);
                // $pdfFilePath = 'D:/invoice (66).pdf';
                $mail->addAttachment($latestFile);
                $mail->Subject = 'Payemnt Receipt';
                $mail->Body = 'Payment Received By Finance Office  .';
                $mail->send();
                ob_end_clean();
                redirect(base_url('dashboard'));
                //$pdf_content = file_get_contents('php://input');
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            echo 'file not found';
        }
    }
// after adding utilti and upadte status of utiltiy 
    public function sendFinalInvoiceEmail($customer_Id)
    { $this->authmiddleware->checkAuth();
        $pdfFilePath = 'D:/';
        $timeout = 2; // Timeout in seconds
        $startTime = time();
        $latestFile = null;
    
        // Wait for the specified time before checking files
        while (time() - $startTime < $timeout) {
            sleep(1); // Wait for 1 second
        }
        $latestFile = $this->getLatestFile($pdfFilePath);
        ob_start();
        if ($latestFile) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $fromEmail = 'ahtishamm2@gmail.com';
                $this->BillingModel->updateUtilityStatus($customer_Id);
                $data = $this->CustomerModel->getCustomerById($customer_Id);
                $userEmail = $data->customer_Email;
               
                $mail->CharSet = "UTF-8";
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ahtishamm2@gmail.com';
                $mail->Password = 'eqnv fqzi oeud xwju';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->SMTPDebug = 2;
                $mail->setFrom($fromEmail, 'Building Managment System');
                $mail->addAddress($userEmail);
                // $pdfFilePath = 'D:/invoice (66).pdf';
                $mail->addAttachment($latestFile);
                $mail->Subject = 'Payable Bill ';
                $mail->Body = ' Current Month BIll   .';
                $mail->send();
                ob_end_clean();
                redirect(base_url('dashboard'));
                //$pdf_content = file_get_contents('php://input');
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            echo 'file not found';
        }
    }
//fincal invoice and update payment status
    public  function sendFinalBillEmail($customer_Id)
    {
       
     $this->authmiddleware->checkAuth();
   
     $pdfFilePath = 'D:/';
    $timeout = 2; // Timeout in seconds
    $startTime = time();
    $latestFile = null;

    // Wait for the specified time before checking files
    while (time() - $startTime < $timeout) {
        sleep(1); // Wait for 1 second
    }
    $latestFile = $this->getLatestFile($pdfFilePath);
        ob_start();
        if ($latestFile) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $fromEmail = 'ahtishamm2@gmail.com';
                $this->updatePaymentStatus($customer_Id);
                $data = $this->CustomerModel->getCustomerById($customer_Id);
                $userEmail = $data->customer_Email;
                //print_r($data);
                $mail->CharSet = "UTF-8";
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ahtishamm2@gmail.com';
                $mail->Password = 'eqnv fqzi oeud xwju';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->SMTPDebug = 2;
                $mail->setFrom($fromEmail, 'Building Managment System');
                $mail->addAddress($userEmail);
                // $pdfFilePath = 'D:/invoice (66).pdf';
                $mail->addAttachment($latestFile);
                $mail->Subject = 'Final Invoice ';
                $mail->Body = 'Payement Received By Accounts Office  .';
                $mail->send();
                ob_end_clean();
                redirect(base_url('dashboard'));
                //$pdf_content = file_get_contents('php://input');
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            echo 'file not found';
        }
    }
    public function getLatestFile($directory)
    {
        $this->authmiddleware->checkAuth();
        $files = glob($directory . '*.pdf');
        $latestFile = null;
        $latestTime = 0;
    
        foreach ($files as $file) {
            // Check if the file name contains "Microsoft Edge PDF Document"
            if (strpos($file, 'Microsoft Edge PDF Document') === false) {
                $fileTime = filemtime($file);
                if ($fileTime > $latestTime) {
                    $latestTime = $fileTime;
                    $latestFile = $file;
                }
                // echo $file . "<br>";
            }
        }
    
        // echo $latestFile . "<br>";
        return $latestFile;
    }
    
public function receivedPayment($customer_Id)
 {
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');

    $invoiceDetails['billingDetails'] = $this->Customer_ServicesModel->latestInvoiceDetail($customer_Id);
    $invoiceDetails['service_Utilities'] = $this->BillingModel->getServiceUtilities($customer_Id);
    $invoiceDetails['service_details'] = $this->ServiceModel->getServiceDetailsForBillingLatest($customer_Id);
    $invoiceDetails['appartmentDetails'] = $this->AppartmentsModel->getAppartmentForBilling($customer_Id);
   // print_r($invoiceDetails);
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $this->load->view("billing/getpayment", $invoiceDetails);
    $this->load->view('inc/footer');


            
}
//   public function installmentplan($customer_Id)
//     {
//         $data['page_title'] = 'Dashboard';
//         $data['user'] = $this->session->userdata('item');

//         $invoiceDetails['customerDetails'] = $this->CustomerModel->getCustomerById($customer_Id);
//         $invoiceDetails['billingDetails'] = $this->Customer_ServicesModel->latestInvoiceDetail($customer_Id);
//         // $invoiceDetails['customer_ServiceDetails']=$this->Customer_ServicesModel->getCustomerServiceDetails($customer_Id);
//         $invoiceDetails['appartmentDetails'] = $this->AppartmentsModel->getAppartmentForBilling($customer_Id);
//         $invoiceDetails['service_details'] = $this->ServiceModel->getServiceDetailsForBillingLatest($customer_Id);
//         $invoiceDetails['billing_details'] = $this->BillingModel->getBillingDetailsForBilling($customer_Id);
//         $invoiceDetails['service_Utilities'] = $this->BillingModel->getServiceUtilities($customer_Id);
//         //$this->load->view("billing/billinginvoice",$invoiceDetails);
//         $this->load->view('inc/header');
//         $this->load->view('inc/nav', $data);
//         $this->load->view("billing/getinstallment", $invoiceDetails);
//         $this->load->view('inc/footer');

//     }


    // public function getPayment($customer_Id)
    // {  $this->authmiddleware->checkAuth();
    //      $data['page_title'] = 'Dashboard';
    //     $data['user'] = $this->session->userdata('item');

    //     $invoiceDetails['customerDetails'] = $this->CustomerModel->getCustomerById($customer_Id);
    //     $invoiceDetails['billingDetails'] = $this->Customer_ServicesModel->latestInvoiceDetail($customer_Id);
    //     // $invoiceDetails['customer_ServiceDetails']=$this->Customer_ServicesModel->getCustomerServiceDetails($customer_Id);
    //     $invoiceDetails['appartmentDetails'] = $this->AppartmentsModel->getAppartmentForBilling($customer_Id);
    //     $invoiceDetails['service_details'] = $this->ServiceModel->getServiceDetailsForBillingLatest($customer_Id);
    //     $invoiceDetails['billing_details'] = $this->BillingModel->getBillingDetailsForBilling($customer_Id);
    //     $invoiceDetails['service_Utilities'] = $this->BillingModel->getServiceUtilities($customer_Id);
    //     //$this->load->view("billing/billinginvoice",$invoiceDetails);
    //     $this->load->view('inc/header');
    //     $this->load->view('inc/nav', $data);
    //     $this->load->view("billing/getpaymentinvoice", $invoiceDetails);
    //     $this->load->view('inc/footer');
    // }
}

