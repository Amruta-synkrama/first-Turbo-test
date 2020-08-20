<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Company_profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if(!$this->session->userdata('user_data')) {
			redirect('dashboard');	
		} elseif($this->session->userdata('user_data')->entity != 'RPF') {
			redirect('dashboard');
		}
	}
	
	public function index()
	{
		$user_id = $this->session->userdata('id');
		$this->load->model('company_profile_model');
		$data['company_data'] = $this->company_profile_model->get_company_data($user_id);
		$data['user_data'] = $this->company_profile_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$this->load->view('templates/header', $data);
		$this->load->view('company_profile', $data);
		$this->load->view('templates/footer', $data);
	}
		
	public function get($id)
	{
		$id = intval($id);
		$user_id = $this->session->userdata('id');
		if($id!=0)
		{
			$this->load->model('company_profile_model');
			$data['company_data'] = $this->company_profile_model->get_company_data($user_id);
			$data['user_data'] = $this->company_profile_model->get_user_data($user_id);
			$data['session'] = $this->session->userdata('user_data');
			$this->load->view('templates/header', $data);
			$this->load->view('company_profile', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			redirect(site_url(),'refresh');
		}
	}
	
	public function add()
	{
		$this->form_validation->set_rules('element','Element label','trim|required');
		if($this->form_validation->run()===FALSE)
		{
			$data['input_element'] = array('name'=>'element', 'id'=>'element', 'value'=>set_value('element'));
			$data['session'] = $this->session->userdata('user_data');
			$this->load->view('templates/header', $data);
			$this->load->view('company_profile', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$field = $this->input->post('element');
			$this->load->model('company_profile_model');
			if($this->company_profile_model->add(array('field_name'=>$field)))
			{
				$this->load->view('company_profile_success_page_view');
			}
			else
			{
				$this->load->view('company_profile_error_page_view');
			}
		}
	}
	
	public function edit()
	{
		$this->form_validation->set_rules('element','Element label','trim|required');
		$this->form_validation->set_rules('id','ID','trim|is_natural_no_zero|required');
		if($this->form_validation->run()===FALSE)
		{
			if(!$this->input->post())
			{
				$id = intval($this->uri->segment($this->uri->total_segments()));
			}
			else
			{
				$id = set_value('id');
			}
			$data['input_element'] = array('name'=>'element', 'id'=>'element', 'value'=>set_value('element'));
			$data['hidden'] = array('id'=>set_value('id',$id));
			$data['session'] = $this->session->userdata('user_data');
			$this->load->view('templates/header', $data);
			$this->load->view('company_profile', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$element = $this->input->post('element');
			$id = $this->input->post('id');
			$this->load->model('company_profile_model');
			if($this->company_profile_model->update(array('element'=>$element),array('id'=>$id)))
			{
				$this->load->view('company_profile_success_page_view', $data);
			}
			else
			{
				$this->load->view('company_profile_error_page_view');
			}
		}
	}
}
/* End of file '/Company_profile.php' */
/* Location: ./application/controllers//Company_profile.php */
