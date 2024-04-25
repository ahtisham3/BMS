<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Model {

	function addAppointment($add_appointment)
    {
    	$query = $this->db->insert('appointments', $add_appointment);
        $insert_id = $this->db->insert_id();

    	if($query)
    	{
    		return $insert_id;
    	}
    }

    function addAttach($attach_procedure)
    {
    	$query = $this->db->insert('attach', $attach_procedure);

    	if($query)
    	{
    		return 1;
    	}
    }    

    function allAppointments()
    {
        $this->db->join('patients','appointment_patient=patient_id');
        $this->db->join('doctors','appointment_doctor=doctor_id');
        $this->db->order_by('appointment_id','desc');
        $query = $this->db->get('appointments');
        return $query->result_array();
    }

    function updateAppointment($id,$update_appointment)
    {
        $this->db->where('appointment_id', $id);
        $query = $this->db->update('appointments', $update_appointment);
        if($query)
        {
            return 1;
        }
    }

    function statusAppointment($id,$update_appointment)
    {
        $this->db->where('appointment_reference', $id);
        $query = $this->db->update('appointments', $update_appointment);
        if($query)
        {
            return 1;
        }
    }    

    function getAppointment($app)
    {
        $this->db->join('patients','appointment_patient=patient_id');
        $this->db->join('doctors','appointment_doctor=doctor_id');
        $this->db->where('appointment_id', $app);
        $query = $this->db->get('appointments');
        return $query->result_array();
    }

    function getAppointmentdetails($app)
    {
        $this->db->join('patients','appointment_patient=patient_id');
        $this->db->join('doctors','appointment_doctor=doctor_id');
        $this->db->where('appointment_reference', $app);
        $query = $this->db->get('appointments');
        return $query->result_array();
    }

    function getProcedures($app)
    {
        $this->db->join('procedures','attach_procedure=procedure_id');
        $this->db->where('attach_appointment', $app);
        $query = $this->db->get('attach');
        return $query->result_array();
    }

    function otherProcedures($app)
    {        
        $query = $this->db->query('SELECT * FROM procedures WHERE procedure_id NOT IN (SELECT attach_procedure FROM attach WHERE attach_appointment='.$app.')');
        return $query->result_array();
    }

    function checkAppointment($app)
    {        
        $this->db->where('appointment_reference', $app);
        $this->db->where("(appointment_status=2 OR appointment_status=3)", NULL, FALSE);
        $query = $this->db->get('appointments');
        return $query->num_rows();
    }    

    function checkOtherAppointment($app)
     {        
        $this->db->where('appointment_reference', $app);
        $this->db->where("(appointment_status=0 OR appointment_status=1 OR appointment_status=4)", NULL, FALSE);
        $query = $this->db->get('appointments');
        return $query->num_rows();
    }

    function deleteAttach($id)
    {
        $this->db->where('attach_appointment', $id);
        $query = $this->db->delete('attach');

        if($query)
        {
            return 1;
        }
    }

    function totalAppointments()
    {
        $this->db->join('patients','appointment_patient=patient_id');
        $this->db->join('doctors','appointment_doctor=doctor_id');
        $this->db->order_by('appointment_id','desc');
        $query = $this->db->get('appointments');
        return $query->num_rows();
    }

    function searchAppointments($search)
    {
        $this->db->like('patient_cnic',$search);
        $this->db->or_like('patient_reference',$search);
        $this->db->or_like('patient_number',$search);
        $this->db->or_like('patient_fname',$search);
        $this->db->or_like('patient_lname',$search);
        $this->db->or_like('appointment_reference',$search);        
        $this->db->join('patients','appointment_patient=patient_id');
        $this->db->join('doctors','appointment_doctor=doctor_id');
        $this->db->order_by('appointment_id','desc');
        $query = $this->db->get('appointments');
        return $query->result_array();
    }

    function searchDoc($doc)
    {        
        $this->db->like('doctor_name',$doc);
        $this->db->join('patients','appointment_patient=patient_id');
        $this->db->join('doctors','appointment_doctor=doctor_id');
        $this->db->order_by('appointment_id','desc');
        $query = $this->db->get('appointments');
        return $query->result_array();
    }

    function searchAppointmentsandDoc($search,$doc)
    {
        $this->db->wherer('doctor_name',$doc);
        $this->db->where("(patient_cnic like %'$search'% OR patient_reference like %'$search'% OR patient_number like %'$search'% OR patient_fname like %'$search'% OR patient_lname like %'$search'% OR appointment_reference like %'$search'%)", NULL, FALSE);
        $this->db->join('patients','appointment_patient=patient_id');
        $this->db->join('doctors','appointment_doctor=doctor_id');
        $this->db->order_by('appointment_id','desc');
        $query = $this->db->get('appointments');
        return $query->result_array();
    }

    function deleteAppointments($id)
    {
        $this->db->where('appointment_reference', $id);
        $query = $this->db->delete('appointments');

        if($query)
        {
            return 1;
        }
    }    
}
