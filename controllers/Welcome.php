<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller {
  // Change from private to protected

    public function __construct() {
        parent::__construct();
      
        $this->load->library('AuthMiddleware');
    }
    // Rest of your class code...

    // Rest of your class code...

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function index()
	{
	
	$data['page_script']='inc/js/reg.js';
			$this->load->view('login');
		$this->load->view('inc/footer',$data);
	}
	function login()
	{
		$loginEmail = $this->input->post('loginEmail');
		$loginPassword = $this->input->post('loginPassword');
		$check = $this->settings->checkLogin($loginEmail, md5($loginPassword));
		$newdata = $this->settings->user_details($loginEmail, md5($loginPassword));

		$check_user_acticve = $this->settings->user_active($loginEmail, md5($loginPassword));

		$check_user_expired = $this->settings->is_expired($loginEmail, md5($loginPassword));

		// print_r($newdata);
		// $array = array(
		// 	'key' => 'value'
		// )
		// $this->session->userdata('data', $newdata);
		if (($check != 1)) {
			echo "<script>alert('Username or Password is incorrect');</script>";
			redirect('', 'refresh');
		} else if ($check == 1 && $check_user_acticve != 1) {
			echo "<script>alert('User is not active please call helpline');</script>";
			redirect('', 'refresh');
		} 
		// else if ($check == 1 && $check_user_acticve == 1 && $check_user_expired != 1) {
		// 	echo "<script>alert('Package expired please call helpline');</script>";
		// 	redirect('', 'refresh');
		// } else if ($check == 1 && $check_user_acticve == 1 && $check_user_expired == 1) {
		// 	$this->session->set_userdata('company', $newdata[0]['company_id']);
		// 	$this->session->set_userdata('item', $newdata);
		// 	redirect('dashboard', 'refresh');
		// } 
		else {
			$this->session->set_userdata('company', $newdata[0]['company_id']);
			$this->session->set_userdata('item', $newdata);
			$this->session->set_userdata('logged_in',$newdata);
			redirect('dashboard', 'refresh');
			//redirect('', 'refresh');
		}
	}

	function register()
	{

		$register_name = $this->input->post('compname');
		$register_phone = $this->input->post('compphone');
		$register_username = $this->input->post('compusername');
		$register_pass = $this->input->post('comppassword');
		$register_email = $this->input->post('compemail');
		$expiry  = Date('y:m:d', strtotime('+3 days'));

		$reg_array = array('company_name' => $register_name, 'company_username' => $register_username, 'company_phone_no' => $register_phone, 'company_password' => md5($register_pass), 'company_email' => $register_email, 'company_expiry' => $expiry);
		$comp_id = $this->settings->register($reg_array);
		$user_arr = array('user_username' => $register_username, 'user_password' => md5($register_pass), 'user_name' => $register_name, 'user_BName' => $register_name, 'user_email' => $register_email, 'superadmin' => '1', 'company_id' => $comp_id, 'expiry' => $expiry);
		$create_user = $this->settings->create_user($user_arr);

		$check = $this->settings->checkLogin($register_email, md5($register_pass));
		$newdata = $this->settings->user_details($register_username, md5($register_pass));

		// $check_user_acticve = $this->settings->user_active($register_username, md5($register_pass));


		$this->session->set_userdata('company', $newdata[0]['company_id']);
		$this->session->set_userdata('item', $newdata);
		// $check = $this->settings->checkLogin($register_email, md5($register_pass));
		// $newdata = $this->settings->user_details($register_username, md5($register_pass));
		// print_r($newdata);
		// $array = array(
		// 	'key' => 'value'
		// )

	}

	function checkname()
	{
		$name = $this->input->post('uname');
		$data = $this->settings->check_name($name);
		echo $data;
	}



	function logout()
	{
		 $this->session->sess_destroy();
		redirect('', 'refresh');
	}
	function adminlogout()
	{
		 $this->session->sess_destroy();
		redirect('admin');
	}

	function forgot_password()
	{
		$this->load->view('forgot');
	}

	function dashboard()
	{
		$this->authmiddleware->checkAuth();
		if($this->session->userdata('item'))
		{
			// $this->load->view('welcome_message');
				$data['page_title'] = 'Dash';
				//	$data['total_patients'] = $this->patients->totalPatients();
				//$data['total_doctors'] = $this->doctors->totalDoctors();
				// $data['total_Items'] = $this->Items->totalitems();
				//$data['Name'] = $this->Settings->user_details();
				// $data['item'] = $this->session->all_userdata();
				// $data['total_Sales_today'] = $this->Jobs->todayJobstotal();
				$data['user'] = $this->session->userdata('item');
				$data['exp'] = $this->session->userdata('exp');
				$companyid = $this->session->userdata('company');
				// $data['company'] = $this->session->userdata('company');
                 $data['count']=$this->CustomerModel->getnewcount($companyid);
				 $data['pendingbills']=$this->CustomerModel->getPendingBillCount($companyid);
                //  print_r($data);
				// echo $data;
				// var_dump($this->session->userdata('userdata'));
				// foreach ($data as $row) {
				// 	print_r($row->num_rows());
				// }
				$this->load->view('inc/header');
				$this->load->view('inc/nav', $data);
				$this->load->view('dashboard', $data);
				$this->load->view('inc/footer');
		}
		else{
			redirect('', 'refresh');
		}
			
	}



	function new_job()
	{

		if (!$this->session->userdata('item')) {
			$this->load->view('login');
		} else {

			$data['user'] = $this->session->userdata('item');
			$data['page_title'] = "Add new Job";
			// $data['Employees'] = $this->Employees->allEmployees();
			$data['Items'] = $this->Items->allitems();
			// $data['Sites'] = $this->Sites->allSites();


			$this->load->view('inc/header');
			$this->load->view('inc/nav', $data);
			$this->load->view('new_job_client_wise', $data);
			$this->load->view('inc/footer');
		}
	}

	function calender()
	{
		if($this->session->userdata('item'))
		{
			$data['Jobs'] = $this->Jobs->addToCalender();
			// echo print_r($data['Jobs']);

			$data['page_title'] = "Calendar";

			$this->load->view('inc/header');
			$this->load->view('inc/nav', $data);
			$this->load->view('calender', $data);
			$this->load->view('inc/footer');
		}
		else
		{
			redirect('', 'refresh');
		}
	}




	function Payments()
	{
		if($this->session->userdata('item'))
		{

			// $data['Jobs'] ;
			// $data['Jobs'] = $this->Jobs->addToCalender();
			// echo print_r($data['Jobs']);	

			$data['page_title'] = "Payment";
			$data['Jobs'] = $this->Jobs->showJobs();
			$data['Employees'] = $this->Employees->allEmployees();
			$data['Clients'] = $this->Clients->allClients();


			$this->load->view('inc/header');
			$this->load->view('inc/nav', $data);
			$this->load->view('bill/index', $data);
			$this->load->view('inc/footer');
		}
		else
		{
			redirect('', 'refresh');
		}
	}


	function searcher()
	{
		
		$search = $this->input->post('search');
		$Emp = $this->input->post('Emp');

		if ($search != '' && $Emp == '') {
			$data['results'] = $this->Jobs->searchjobs($search);
		}
		// else if($search==''&&$doc!='')
		// {
		// 	$data['results'] = $this->appointments->searchDoc($doc);
		// }
		// else if($search!=''&&$doc!='')
		// {
		// 	$data['results'] = $this->appointments->searchAppointmentsandDoc($search,$doc);
		// }		
		// else
		// {
		// 	$data['results'] = $this->appointments->searchAppointments($search);
		// }

		echo json_encode($data);
	}


	function MainSearch()

	{

		$Emp = $this->input->post('EmpId');
		// $recived_dates = $this->input->post('Dates');

		// $RfromDate = date("Y-m-01");
		// $RTodate = date("Y-m-31");

		// if ($recived_dates == "") {
		// 	$RfromDate = date("Y-m-d");
		// 	$RTodate = date("Y-m-d");
		// } else {

		// 	$dates = explode('-', $recived_dates);
		// 	$RFdate = $dates[0];
		// 	$REdate = $dates[1];

		// $Rstart = new DateTime($RFdate);
		// $REnd = new DateTime($REdate);

		$RfromDate  =  date("Y-m-d");
		$RTodate  =  date("Y-m-d");
		// }

		$data['results'] = $this->Jobs->mainSearchJobs($Emp, $RfromDate, $RTodate);
		echo json_encode($data);
	}

	// function finance()
	// {

	// 	if (!$this->session->userdata('item')) {
	// 		$this->load->view('login');
	// 	} else {


	// 		$data['page_title'] = 'Reports';
	// 		$data['user'] = $this->session->userdata('item');

	// 		$data['total_sale'] = $this->Jobs->dashboardtotalsale();
	// 		$data['month_sale'] = $this->Jobs->dashboardmonthsale();
	// 		$data['today_sale'] = $this->Jobs->dashboardtodaysale();
	// 		$data['month_discount'] = $this->Jobs->dashboardmonthdiscount();


	// 		$yroc_data = $this->Jobs->get_yearly_saleData_monthly();

	// 		$wroc_data = $this->Jobs->get_weekly_saleData_daily();

	// 		// print_r($proc_data);

	// 		$Bata = [];


	// 		foreach ($yroc_data as $row) {
	// 			$Bata['label'][] = $row->month_name;
	// 			$Bata['data'][] = (int) $row->count;
	// 		}
	// 		$Bata['chart_data'] = json_encode($Bata);



	// 		$Wata = [];
	// 		foreach ($wroc_data as $row) {
	// 			$Wata['label'][] = $row->month_name;
	// 			$Wata['data'][] = (int) $row->count;
	// 		}
	// 		$Bata['week_chart_data'] = json_encode($Wata);


	// 		// print_r($Bata['chart_data']);

	// 		$this->load->view('sales_inc/header');
	// 		$this->load->view('inc/header');
	// 		$this->load->view('inc/nav', $data);
	// 		$this->load->view('sales_dashboard', $Bata);
	// 		$this->load->view('inc/footer');
	// 	}
	// }



	function reps()
	{

		if (!$this->session->userdata('item')) {
			$this->load->view('login');
		} else {

			$data['page_title'] = "Payment";
			//$data['Jobs'] = $this->Jobs->showJobs();
			//$data['Employees'] = $this->Employees->allEmployees();
			// $data['Clients'] = $this->Clients->allClients();
			$data['user'] = $this->session->userdata('item');
			$this->load->view('inc/header');
			$this->load->view('inc/nav', $data);
			$this->load->view('reports/reports_dash', $data);
			$this->load->view('inc/footer');
		}
	}


	// function client_rep()
	// {
	// 	if (!$this->session->userdata('item')) {
	// 		$this->load->view('login');
	// 	} else 
	// 	{


	// 		$data['page_title'] = "Report";
	// 		//$data['Jobs'] = $this->Jobs->showJobs();
	// 		//$data['Employees'] = $this->Employees->allEmployees();
	// 		// $data['Clients'] = $this->Clients->allClients();
	// 		$data['user'] = $this->session->userdata('item');
	// 		$this->load->view('inc/header');
	// 		$this->load->view('inc/nav', $data);
	// 		$this->load->view('reports/client_report', $data);
	// 		$this->load->view('inc/footer');
	// 	}
	// }

	// function dailyjob_rep()
	// {
	// 	if (!$this->session->userdata('item')) {
	// 		$this->load->view('login');
	// 	} else {

	// 		$data['page_title'] = "Report";
	// 		// $data['Jobs'] = $this->Jobs->rep_daily_sales();
	// 		//$data['Employees'] = $this->Employees->allEmployees();
	// 		// $data['Clients'] = $this->Clients->allClients();

	// 		$data['user'] = $this->session->userdata('item');
	// 		$this->load->view('inc/header');
	// 		$this->load->view('inc/nav', $data);
	// 		$this->load->view('reports/daily_job_report', $data);
	// 		$this->load->view('inc/footer');
	// 	}
	// }



	// function new_appointment()
	// {
	// 	$data['page_title'] = "Add new appointment";
	// 	//$data['doctors'] = $this->doctors->allDoctors();         
	// 	//$data['procedures'] = $this->procedures->allProcedures();         
	// 	$this->load->view('inc/header');
	// 	$this->load->view('inc/nav', $data);
	//        $this->load->view('new_appointment', $data);
	//        $this->load->view('inc/footer');
	// }






	// function new_visit()
	// {
	// 	$data['page_title'] = "Add new appointmant";
	// 	$data['page_css'] = 'assets/pages/css/search.min.css';
	// 	$data['page_script'] = 'assets/pages/scripts/search.min.js';
	// 	$data['doctors'] = $this->doctors->allDoctors();
	// 	$data['search'] = $this->input->get('id');
	// 	$data['all'] = $this->appointments->totalAppointments();
	// 	$appointments = $this->appointments->allAppointments();
	// 	$expire = $this->settings->getSetting('appointment_expiry');
	// 	foreach ($appointments as $appointment) {
	// 		$s = $appointment['appointment_date'] . ' ' . $appointment['appointment_time'];
	// 		$date = date_create_from_format('d F Y H:i', $s);
	// 		$diff = ($date->getTimestamp() - time()) / 3600;
	// 		if ($diff < 0 && $appointment['appointment_status'] == 1) {
	// 			if (-1 * $diff > $expire[0]['setting_value']) {
	// 				$update_appointment = array('appointment_status' => 0);
	// 				$update = $this->appointments->updateAppointment($appointment['appointment_id'], $update_appointment);
	// 			}
	// 		}
	// 	}
	// 	$data['appointments'] = $this->appointments->allAppointments();
	// 	$this->load->view('inc/header', $data);
	// 	$this->load->view('inc/nav', $data);
	// 	$this->load->view('new_visit', $data);
	// 	$this->load->view('inc/footer', $data);
	// }


	// function add_appointment()
	// {
	// 	$doctor = $this->input->post('doctor');
	// 	$procedure = $this->input->post('procedure');
	// 	$datetime = explode("-", $this->input->post('datetime'));
	// 	$date = trim($datetime[0]);
	// 	$time = trim($datetime[1]);
	// 	$cnic = $this->input->post('cnic');
	// 	$fname = $this->input->post('fname');
	// 	$lname = $this->input->post('lname');
	// 	$number = $this->input->post('number');
	// 	$condition = $this->input->post('condition');

	// 	$check_patient = $this->patients->checkPatient($number);

	// 	if ($check_patient == 0) {
	// 		$reference = '';
	// 		$array = array('patient_cnic' => $cnic, 'patient_fname' => $fname, 'patient_lname' => $lname, 'patient_number' => $number, 'patient_reference' => $reference);
	// 		$the_patient = $this->patients->addPatient($array);

	// 		$previous = $this->patients->last_reference();
	// 		$last = substr($previous[0]['patient_reference'], 0, 9);
	// 		$start = 'DS-' . date('y') . date('m') . date('d');

	// 		if ($last == $start) {
	// 			$counter = intval(substr($previous[0]['patient_reference'], 0, -9)) + 1;
	// 			$reference = 'DS-' . date('y') . date('m') . date('d') . $counter;
	// 		} else {
	// 			$reference = 'DS-' . date('y') . date('m') . date('d') . '1';
	// 		}

	// 		$update_patient = array('patient_reference' => $reference);

	// 		$update = $this->patients->updatePatient($the_patient, $update_patient);
	// 	} else {
	// 		$get_patient = $this->patients->getPatient($number);

	// 		$the_patient = $get_patient[0]['patient_id'];
	// 	}

	// 	$booking = date('d F Y H:i');

	// 	$the_appointment = array('appointment_date' => $date, 'appointment_time' => $time, 'appointment_doctor' => $doctor, 'appointment_patient' => $the_patient, 'appointment_condition' => $condition, 'appointment_status' => 1, 'appointment_reference' => '', 'appointment_booked' => $booking);
	// 	$add = $this->appointments->addAppointment($the_appointment);

	// 	$ref = 'AP-' . date('y') . date('m') . date('d') . $add;
	// 	$update_appointment = array('appointment_reference' => $ref);
	// 	$uptodate = $this->appointments->updateAppointment($add, $update_appointment);
	// 	$str = ltrim($procedure, ',');
	// 	$all = explode(",", $str);
	// 	for ($i = 0; $i < count($all); $i++) {
	// 		$attach_procedure = array('attach_appointment' => $add, 'attach_procedure' => $all[$i]);
	// 		$addAttach = $this->appointments->addAttach($attach_procedure);
	// 	}

	// 	redirect('new-visit', 'refresh');
	// }

	// function edit_appointment()
	// {
	// 	$id = $this->input->post('id');
	// 	$doctor = $this->input->post('doctor');
	// 	$procedure = $this->input->post('procedure');
	// 	$datetime = explode("-", $this->input->post('datetime'));
	// 	$date = trim($datetime[0]);
	// 	$time = trim($datetime[1]);
	// 	$cnic = $this->input->post('cnic');
	// 	$fname = $this->input->post('fname');
	// 	$lname = $this->input->post('lname');
	// 	$number = $this->input->post('number');
	// 	$condition = $this->input->post('condition');

	// 	$check_patient = $this->patients->checkPatient($number);

	// 	if ($check_patient == 0) {
	// 		$reference = '';
	// 		$array = array('patient_cnic' => $cnic, 'patient_fname' => $fname, 'patient_lname' => $lname, 'patient_number' => $number, 'patient_reference' => $reference);
	// 		$the_patient = $this->patients->addPatient($array);

	// 		$previous = $this->patients->last_reference();
	// 		$last = substr($previous[0]['patient_reference'], 0, 9);
	// 		$start = 'DS-' . date('y') . date('m') . date('d');

	// 		if ($last == $start) {
	// 			$counter = intval(substr($previous[0]['patient_reference'], 0, -9)) + 1;
	// 			$reference = 'DS-' . date('y') . date('m') . date('d') . $counter;
	// 		} else {
	// 			$reference = 'DS-' . date('y') . date('m') . date('d') . '1';
	// 		}

	// 		$update_patient = array('patient_reference' => $reference);

	// 		$update = $this->patients->updatePatient($the_patient, $update_patient);
	// 	} else {
	// 		$get_patient = $this->patients->getPatient($number);

	// 		$the_patient = $get_patient[0]['patient_id'];
	// 	}

	// 	$booking = date('d F Y H:i');

	// 	$the_appointment = array('appointment_date' => $date, 'appointment_time' => $time, 'appointment_doctor' => $doctor, 'appointment_patient' => $the_patient, 'appointment_condition' => $condition, 'appointment_status' => 1, 'appointment_booked' => $booking);
	// 	$update = $this->appointments->updateAppointment($id, $the_appointment);

	// 	$del = $this->appointments->deleteAttach($id);

	// 	$str = ltrim($procedure, ',');
	// 	$all = explode(",", $str);
	// 	for ($i = 0; $i < count($all); $i++) {
	// 		$attach_procedure = array('attach_appointment' => $id, 'attach_procedure' => $all[$i]);
	// 		$addAttach = $this->appointments->addAttach($attach_procedure);
	// 	}

	// 	redirect('new-visit', 'refresh');
	// }

	// function appointment_details()
	// {
	// 	$app = $this->input->post('app');
	// 	$data['appointment'] = $this->appointments->getAppointment($app);
	// 	$data['procedures'] = $this->appointments->getProcedures($app);
	// 	echo json_encode($data);
	// }

	// function reschedule($ref)
	// {
	// 	$data['page_title'] = "Add new appointment";
	// 	$appointment = $this->appointments->getAppointmentdetails($ref);
	// 	$data['procedures'] = $this->appointments->getProcedures($appointment[0]['appointment_id']);
	// 	$data['appointment'] = $this->appointments->getAppointmentdetails($ref);
	// 	$data['doctors'] = $this->doctors->allDoctors();
	// 	$data['all_procedures'] = $this->procedures->allProcedures();
	// 	$data['other_procedures'] = $this->appointments->otherProcedures($appointment[0]['appointment_id']);
	// 	$this->load->view('inc/header');
	// 	$this->load->view('inc/nav', $data);
	// 	$this->load->view('reschedule', $data);
	// 	$this->load->view('inc/footer');
	// }

	// function delete_appointment($id)
	// {
	// 	$delete = $this->appointments->deleteAppointments($id);
	// 	if ($delete) {
	// 		redirect('new-visit', 'refresh');
	// 	}
	// }

	// function start_appointment($app)
	// {
	// 	$update = array('appointment_status' => 2);
	// 	$appointment = $this->appointments->statusAppointment($app, $update);
	// 	if ($appointment) {
	// 		redirect('new-visit', 'refresh');
	// 	}
	// }

	// function reschedule_appointment($app)
	// {
	// 	$date = date('d F Y');
	// 	$time = date('H:i');
	// 	$update = array('appointment_date' => $date, 'appointment_time' => $time, 'appointment_status' => 2);
	// 	$appointment = $this->appointments->statusAppointment($app, $update);
	// 	if ($appointment) {
	// 		redirect('new-visit', 'refresh');
	// 	}
	// }

	// function complete($app)
	// {
	// 	$update = array('appointment_status' => 3);
	// 	$appointment = $this->appointments->statusAppointment($app, $update);
	// 	$bill = $this->patients->getBill($app);
	// 	$appno = $bill[0]['bill_appointment'];
	// 	$pay = $bill[0]['bill_final'];
	// 	$paid = array('bill_paid' => $pay);
	// 	$this->patients->updateBill($appno, $paid);
	// 	if ($appointment) {
	// 		redirect('new-visit', 'refresh');
	// 	}
	// }



	// function reports()
	// {
	// 	$data['page_title'] = 'Reports';
	// 	$this->load->view('inc/header');
	// 	$this->load->view('inc/nav', $data);
	// 	$this->load->view('reports', $data);
	// 	$this->load->view('inc/footer');
	// }

	// function income()
	// {
	// 	$data['page_title'] = 'Income Reports';
	// 	$data['bills'] = $this->patients->allBills();
	// 	$this->load->view('inc/header');
	// 	$this->load->view('inc/nav', $data);
	// 	$this->load->view('income', $data);
	// 	$this->load->view('inc/footer');
	// }

	// function expense()
	// {
	// 	$data['user'] = $this->session->userdata('item');
	// 	$data['page_title'] = 'Expense Reports';
	// 	$data['expenses'] = $this->expenses->allExpenses();
	// 	$this->load->view('inc/header');
	// 	$this->load->view('inc/nav', $data);
	// 	$this->load->view('expense', $data);
	// 	$this->load->view('inc/footer');
	// }

	// function add_expense()
	// {
	// 	$data['user'] = $this->session->userdata('item');
	// 	$data['page_title'] = 'Add Expense';
	// 	$this->load->view('inc/header');
	// 	$this->load->view('inc/nav', $data);
	// 	$this->load->view('expense/add', $data);
	// 	$this->load->view('inc/footer');
	// }

	// function new_expense()
	// {
	// 	$company_id =  $this->session->userdata('company');
	// 	$type = $this->input->post('UtilityType');
	// 	$name = $this->input->post('name');
	// 	$date = $this->input->post('monthdate');

	// 	$s = $date;
	// 	$firstPart = strtok($s, '-');
	// 	$allTheRest = strtok('');

	// 	$cost = $this->input->post('cost');
	// 	$paidDate = $this->input->post('paiddate');
	// 	$R_strat =  new DateTime(str_replace('-', ' ', $paidDate));
	// 	$start =  $R_strat->format('Y-m-d H:i:s');
	// 	$added = array('expense_utility_type' => $type, 'expense_name' => $name, 'expense_amount' => $cost, 'expense_paid_date' => $start, 'expense_month' => $allTheRest, 'expense_year' => $firstPart, 'company_id' => $company_id);

	// 	// print_r($added);

	// 	$add = $this->expenses->addExpense($added);

	// 	// echo $add;

	// 	if ($add) {
	// 		redirect('dashboard');
	// 	}
	// }

	// function edit_expense($eid)
	// {
	// 	$data['page_title'] = 'Edit Expense';
	// 	$data['expense'] = $this->expenses->getExpense($eid);
	// 	$this->load->view('inc/header');
	// 	$this->load->view('inc/nav', $data);
	// 	$this->load->view('expense/edit', $data);
	// 	$this->load->view('inc/footer');
	// }

	// function delete_expense($id)
	// {
	// 	$delete = $this->expenses->deleteExpense($id);
	// 	if ($delete) {
	// 		redirect('expense', 'refresh');
	// 	}
	// }

	// function update_expense()
	// {
	// 	$id = $this->input->post('id');
	// 	$name = $this->input->post('name');
	// 	$cost = $this->input->post('cost');
	// 	$date = $this->input->post('date');

	// 	$updated = array('expense_name' => $name, 'expense_cost' => $cost, 'expense_date' => $date);

	// 	$update = $this->expenses->updateExpense($id, $updated);

	// 	if ($update) {
	// 		redirect('expense', 'refresh');
	// 	}
	// }


	function company()
	{
		$data['user'] = $this->session->userdata('item');
		$data['page_title'] = 'Expense Reports';
		$data['company'] = $this->Comp->comp_Info();
		$this->load->view('inc/header');
		$this->load->view('inc/nav', $data);
		$this->load->view('comp/edit', $data);
		$this->load->view('inc/footer');
	}

	function update_company()
	{

		$id = $this->input->post('id');
		$Loc = $this->input->post('Location');

		$updated = array('company_location' => $Loc);

		$update = $this->Comp->update_comp($id, $updated);
		if ($update) {
			redirect('company', 'refresh');
		}
	}


	function reset_pass()
	{
		$data['user'] = $this->session->userdata('item');
		$data['page_title'] = 'Reset Password';
		$data['company'] = $this->Comp->comp_Info();
		$this->load->view('inc/header');
		$this->load->view('inc/nav', $data);
		$this->load->view('comp/reset', $data);
		$this->load->view('inc/footer');
	}
	function package()
	{
		if (!$this->session->userdata('item')) {
			redirect('', 'refresh');
		} else 
		{
			$data['page_script']='inc/js/upgrade.js';
			$data['user'] = $this->session->userdata('item');
			$data['packages'] = $this->packages->packagesDetail();
			$this->load->view('inc/header');
			$this->load->view('inc/nav', $data);
			$this->load->view('package/upgrade', $data);
			$this->load->view('inc/footer',$data);
		}
	}
	
	function upgradePackage()
	{
		if (!$this->session->userdata('item')) {
			redirect('', 'refresh');
		} else 
		{
			
			$data['user'] = $this->session->userdata('item');
			$data['packages'] = $this->packages->packagesDetail();
			$data['userPackages'] = $this->packages->userpackagesDetail($this->session->userdata('item')[0]['user_id']);
			if($data['userPackages'])
			{
				if($data['userPackages'][0]['paymentConfirmation']=='1')
				{
				$data['activepackage'] = $this->packages->useractivepackagesDetail($this->session->userdata('item')[0]['user_id']);
				$this->load->view('inc/header');
				$this->load->view('inc/nav', $data);
				$this->load->view('package/userPackagesDetail', $data);
				$this->load->view('inc/footer',$data);
					
				}
				else
				{

				$this->load->view('inc/header');
				$this->load->view('inc/nav', $data);
				$this->load->view('package/package-upgrade', $data);
				$this->load->view('inc/footer',$data);
				}
			}
			else
			{
				$this->load->view('inc/header');
				$this->load->view('inc/nav', $data);
				$this->load->view('package/package-upgrade', $data);
				$this->load->view('inc/footer',$data);
			}
			
			
		}
	}
	function newPackage()
	{
		if (!$this->session->userdata('item')) {
			redirect('', 'refresh');
		} else 
		{
			
			$data['user'] = $this->session->userdata('item');
			$data['packages'] = $this->packages->packagesDetail();
			$this->load->view('inc/header');
			$this->load->view('inc/nav', $data);
			$this->load->view('package/newPackage', $data);
			$this->load->view('inc/footer',$data);
			
		}
	}
	function editPackage($id)
	{
		if (!$this->session->userdata('item')) {
			redirect('', 'refresh');
		} else 
		{
			
			$data['userPackages'] = $this->packages->getuserpackagesById($id);
			// print_r($data['userPackages']);
			 $data['user'] = $this->session->userdata('item');
			 $data['packages'] = $this->packages->packagesDetail();
			// $data['userPackages'] = $this->packages->userpackagesDetail($this->session->userdata('item')[0]['user_id']);
			$this->load->view('inc/header');
			$this->load->view('inc/nav', $data);
			$this->load->view('package/editPackage', $data);
			$this->load->view('inc/footer',$data);
		}
	}
	function editPackagedb($id)
	{
		$data = array(
				'user_id' => $this->input->post('user_id'),
				'package_id'=>$this->input->post('package_id'),
				'package_period'=>$this->input->post('package_period'),
				'startDate'=>$this->input->post('startDate'),
				'endDate'=>$this->input->post('endDate'),
				'paymentDate'=>$this->input->post('paymentDate'),
				'paymentPrice'=>$this->input->post('paymentPrice'),
				'paymentMethod'=>$this->input->post('paymentMethod'),
				'paymentConfirmation'=>'0',
				'order_id' => $this->input->post('order_id')
				);
		$result = $this->packages->editExistingPackage($data,$id);
		if($result)
		{
			redirect('confirmPayment/'.$this->input->post('order_id'));
		}
		
		
	}
	function confirmPayment($order)
	{
			$data['user'] = $this->session->userdata('item');
			$data['packages'] = $this->packages->packagesDetail();
			$data['invoice'] = $order;
			$this->load->view('inc/header');
			$this->load->view('inc/nav', $data);
			$this->load->view('package/ConfirmPayment', $data);
			$this->load->view('inc/footer',$data);
	}
	// Start Admin
	function admin()
	{
		$this->load->view('admin/adminLogin');
		
	}
	function adminLoginCheck()
	{

		$loginEmail = $this->input->post('email');
		$loginPassword = $this->input->post('password');
		$check = $this->settings->checkAdminLogin($loginEmail, md5($loginPassword));

		if($check!=1)
		{
			
		}
		else
		{
			$this->session->set_userdata('admin', '1');
			$this->session->set_userdata('adminstatus', true);
			
			redirect('admin/admindashboard');
		}
		
	}
	function admindashboard()
	{
		
			if($this->session->userdata('admin')!=1 && $this->session->userdata('admin')!=true )
			{
				redirect('admin');
			}
			else
			{
			$data['admin'] = $this->session->userdata('admin');
			$data['adminUserCount'] = $this->admin->userCount();
			$data['adminCorderCount'] = $this->admin->confirmedOrdersCount();
			$data['adminPorderCount'] = $this->admin->pendingOrdersCount();
			
			// print_r($data);
			$data['userPackages'] = $this->packages->alluserOrdersDetail();
			$this->load->view('admin/inc/header');
			$this->load->view('admin/admindashboard', $data);
			$this->load->view('admin/inc/footer');
			}
		
		
	}
	function adminAllUsers()
	{
		
			if($this->session->userdata('admin')!=1 && $this->session->userdata('admin')!=true )
			{
				redirect('admin');
			}
			else
			{
			$data['admin'] = $this->session->userdata('admin');
			$data['allUsers'] = $this->admin->allUsers();
			// $data['adminUserCount'] = $this->admin->userCount();
			// $data['adminCorderCount'] = $this->admin->confirmedOrdersCount();
			// $data['adminPorderCount'] = $this->admin->pendingOrdersCount();
			
			// // print_r($data);
			// $data['userPackages'] = $this->packages->alluserOrdersDetail();
			$this->load->view('admin/inc/header');
			$this->load->view('admin/allUsers', $data);
			$this->load->view('admin/inc/footer');
			}
		
		
	}
	// function confirmOrder($order)
	// {
			
	// 		$result = $this->packages->confirmOrder($order);
	// 		if($result)
	// 		{
	// 			redirect('admindashboard');
	// 		}
			
	// }

	// // End Admin
	// function AddTorder()
	// {
	// 	$filename='';
	// 		  $config['upload_path']          = './assets/';
    //             $config['allowed_types']        = 'gif|jpg|png|jpeg';
    //             $config['max_size']             = 1024 * 10;
    //             // $config['max_width']            = 2024;
    //             // $config['max_height']           = 2024;

    //             $this->load->library('upload', $config);

    //             if ( ! $this->upload->do_upload('attachment'))
    //             {
    //                     $error = array('error' => $this->upload->display_errors());
    //                    print_r($error);
    //             }
    //             else
    //             {
    //                     $data1 = array('upload_data' => $this->upload->data());
    //                     $filename=$data1['upload_data']['file_name'];
    //                     $data = array(
	// 				'tOrder_order_id' => $this->input->post('order_id'),
	// 				'tOrder_email'=>$this->input->post('user_email'),
	// 				'tOrder_user'=>$this->input->post('user_id'),
	// 				'tOrder_paymentMethod'=>$this->input->post('method'),
	// 				'tOrder_transactionNo'=>$this->input->post('transactionno'),
	// 				'tOrder_amount'=>$this->input->post('amount'),
	// 				'tOrder_paymentDate'=>$this->input->post('paymentdate'),
	// 				'tOrder_attachRecipt	'=>$filename
	// 				);
    //                 $result = $this->packages->addTorderToDB($data);
	// 				if($result)
	// 				{
	// 					redirect('upgradePackage');
	// 				}
                     
    //             }
			

	// }
	function addNewPackageT()
	{
		$data = array(
				'user_id' => $this->input->post('user_id'),
				'package_id'=>$this->input->post('package_id'),
				'package_period'=>$this->input->post('package_period'),
				'startDate'=>$this->input->post('startDate'),
				'endDate'=>$this->input->post('endDate'),
				'paymentDate'=>$this->input->post('paymentDate'),
				'paymentPrice'=>$this->input->post('paymentPrice'),
				'paymentMethod'=>$this->input->post('paymentMethod'),
				'paymentConfirmation'=>'0',
				'order_id' => $this->input->post('order_id')
				);
		//print_r($data);
		$result = $this->packages->addPackage($data);
		if($result)
		{
			redirect('confirmPayment/'.$this->input->post('order_id'));
		}
		
		
	}
	function addNewPackage()
	{
		$data = array(
				'user_id' => $this->input->post('user_id'),
				'package_id'=>$this->input->post('package_id'),
				'package_period'=>$this->input->post('package_period'),
				'startDate'=>$this->input->post('startDate'),
				'endDate'=>$this->input->post('endDate'),
				'paymentDate'=>$this->input->post('paymentDate'),
				'paymentPrice'=>$this->input->post('paymentPrice'),
				'paymentMethod'=>$this->input->post('paymentMethod'),
				'paymentConfirmation'=>$this->input->post('paymentConfirmation'),
				'order_id' => $this->input->post('order_id')
				);
		$result = $this->packages->addPackage($data);
		print_r($result);
		
		// echo json_encode($result);

		// $added = array('expense_utility_type' => $type, 'expense_name' => $name, 'expense_amount' => $cost, 'expense_paid_date' => $start, 'expense_month' => $allTheRest, 'expense_year' => $firstPart, 'company_id' => $company_id);

		// // print_r($added);

		// $add = $this->expenses->addExpense($added);

		// // echo $add;

		// if ($add) {
		// 	redirect('dashboard');
		// }
	}
	function addOrder()
	{
		$data = array(
				'order_id' => $this->input->post('order_id'),
				'user_id'=>$this->input->post('user_id'),
				'order_description'=>$this->input->post('order_description'),
				'order_mobileNumber'=>$this->input->post('order_mobileNumber'),
				'order_dateTime'=>$this->input->post('order_dateTime'),
				'order_paymentMedthod'=>$this->input->post('order_paymentMedthod'),
				'order_transactionAmount'=>$this->input->post('order_transactionAmount'),
				'order_transactionStatus'=>$this->input->post('order_transactionStatus'),
				'order_uniqueTransactionId'=>$this->input->post('order_uniqueTransactionId')
				);
		$result = $this->packages->addOrder($data);
		// print_r($result);
		
		 echo json_encode($result);

		// $added = array('expense_utility_type' => $type, 'expense_name' => $name, 'expense_amount' => $cost, 'expense_paid_date' => $start, 'expense_month' => $allTheRest, 'expense_year' => $firstPart, 'company_id' => $company_id);

		// // print_r($added);

		// $add = $this->expenses->addExpense($added);

		// // echo $add;

		// if ($add) {
		// 	redirect('dashboard');
		// }
	}
	function creditCard()
	{
		
		$data = 'HS_MerchantId='.$this->input->post('HS_MerchantId').'&HS_StoreId='.$this->input->post('HS_StoreId').'&HS_ChannelId='.$this->input->post('HS_ChannelId').'&HS_MerchantHash='.urlencode($this->input->post('HS_MerchantHash')).'&HS_MerchantUsername='.$this->input->post('HS_MerchantUsername').'&HS_MerchantPassword='.urlencode($this->input->post('HS_MerchantPassword')).'&HS_IsRedirectionRequest=0&HS_ReturnURL='.urlencode($this->input->post('HS_ReturnURL')).'&HS_RequestHash='.urlencode($this->input->post('HS_RequestHash')).'&HS_TransactionReferenceNumber='.$this->input->post('HS_TransactionReferenceNumber').'&__RequestVerificationToken=';
	
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandbox.bankalfalah.com/HS/HS/HS',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'HS_MerchantId=24992&HS_StoreId=034232&HS_ChannelId=1002&HS_MerchantHash=OUU362MB1uqJo2QHiPZhCr4ru7hKhwbweCJ9P5VmWnhSGkf%2FVt8iBQ%3D%3D&HS_MerchantUsername=rofoli&HS_MerchantPassword=E%2Fsh0VuuJs1vFzk4yqF7CA%3D%3D&HS_IsRedirectionRequest=0&HS_ReturnURL=https%3A%2F%2Fposs.pk%2Fdashboard%2Fpackage&HS_RequestHash=Ii3QnfB932vQCCIz74Wz8zJG%2B0aWLKJx%2BjWNSonxnZEObvFRJP4wAWtBiIfcq4aGyY9WGIaPdW2IGALZdXKdWma8zQcSrp5bWz4uXArd7%2B5zp3sL85CEzhMziMcD42h0wVbvEcXHR1O2dm52YKyqfqahrmEmHo6xbYhldiGnMK1AdklMHTLOL36I3eq2I1e9mrRsmfbwfUWvDhUyJkHiLv7ysPPhWX7HwIxa8pzPaQwNVD9%2FkICH0MzOACvKqUOb1uzQogBoBBKMkwDs7CAXAvHKbReey8WoZ0UwiipLlP82vWK92YEwuZF7om85smQiRAhYYCPempkctqdUkuZhy2kkPPEEr0kw7rfvl%2F2yt7xxp5JBECo1KEfTw4Im89ls6PxLCnX9aE%2F8Id1B4sU2Z2iQXV575L0Zj3iMv0%2FDuFHJ5jZspUer8BmWftWAEVjdiYBTY6mfexQKROjnNo0i2g%3D%3D&HS_TransactionReferenceNumber=Poss25364&__RequestVerificationToken=',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: ASP.NET_SessionId=y3p0qtuhmkrkmea4qhlcr5ex; BIGipServerAPG-Sandbox-Pool=!G5zoFIkW94+OFBVdhb37dB69yKuWEJq0PdGKd6QiMn8P/bVEo5DLR0SWLS+w/Ac9+wVx6pYdLICQDA4=; TS016b4fac=01228fab95981a066d7127ff5283c9249b31ee0cc0986bf9811837f2e9c5f834a8227b2c873e76b10b20970569d0cfb501410eb8f72bbb178454f25e12e890a8ddeb5b02db97d00c20d539834589f3229b05be4f4d'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
		 echo json_encode($response['success']);
	}

}
