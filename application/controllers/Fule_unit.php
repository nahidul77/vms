<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fule_unit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$user_id = $this->session->userdata('user_id');
		if ($user_id == NULL) {
			redirect('admin');
		}
		$this->load->model('fule_unit_model');
	}

	//=================this fubction for view fule unit list(start) ===================//
	public function index()
	{
		$data['m_fuel'] = "active";
		$data['units'] = $this->fule_unit_model->fule_unit();
		$data['content'] = $this->load->view('pages/fule_unit_view', $data, TRUE);
		$this->load->view('wrapper_main', $data);
	}
	//=================this fubction for view fule rate list(End) ===================//

	//=============== This function for create/insert fule unit (Start) =============================//


	public function create()
	{
		$data['m_fuel'] = "active";
		$data['units'] = (object) array('unit_id' => '', 'unit_name' => '');
		$data['content'] = $this->load->view('pages/fule_unit_form', $data, TRUE);
		$this->load->view('wrapper_main', $data);
	}
	//=============== This function for create/insert fule unit (Start) =============================//



	//=============== This function for Save fule unit (Start) =============================//


	public function save()
	{
		$data['m_fuel'] = "active";
		$unit_id = $this->input->post('unit_id');
		$unit_name = trim($this->input->post('unit_name')); //this name for get fule
		$is_active = trim($this->input->post('active')); //this name for get fule

		// $data['v_id'] = $this->fule_rate_model->get_vehicle_model();
		$data['units'] = (object) array('unit_id' => $unit_id, 'unit_name' => $unit_name);
		//============================ for form validation (start) ====================//
		$this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
		$this->form_validation->set_rules('active', 'Is Active', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = $this->load->view('pages/fule_unit_form', $data, TRUE);
			$this->load->view('wrapper_main', $data);
		} else {
			$saveData = array(
				'unit_id' => $unit_id,
				'unit_name' => $unit_name,
				'active' => $is_active
			);
			$this->fule_unit_model->save($saveData);
			if (!empty($unit_id)) {
				$this->session->set_flashdata('success', display('updatesuccessfully'));
			} else {
				$this->session->set_flashdata('success', display('savesuccessfully'));
			}

			redirect('fule_unit');
		}
	}
	//=============== This function for Save Fuel Rate (End) =============================//

	//================this Function for edit Fuel Rate(Start) ============================//


	public function rate_edit($v_fuel_id = '')
	{
		if (
			$this->session->userdata('isLogin') == FALSE
			|| $this->session->userdata('user_type') != 9
		) {
			redirect('admin');
		}
		#
		$data['m_fuel'] = "active";
		// $data['v_id'] = $this->fule_rate_model->get_vehicle_model();
		$rateList = $this->fule_rate_model->edit_rate($v_fuel_id);
		$data['rates'] = $rateList[0];
		$data['content'] = $this->load->view('pages/fule_rate_form', $data, TRUE);
		$this->load->view('wrapper_main', $data);
	}
	//================this Function for edit Fuel Rate(End) ============================//
	//================this Function for Delete Fuel Rate(Start) ============================//

	public function delete_rate($v_fuel_id = '')
	{
		if (
			$this->session->userdata('isLogin') == FALSE
			|| $this->session->userdata('user_type') != 9
		) {
			redirect('admin');
		} else {
			$this->fule_rate_model->delete_rate($v_fuel_id);
			$this->session->set_flashdata('success', display('deletesuccessfully'));
			redirect('fule_rate');
		}
		#

	}
	//================this Function for Delete Fuel Rate(End) ============================//


}