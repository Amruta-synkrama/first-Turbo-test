<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_employee extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if(!$this->session->userdata('user_data')) {
			redirect('dashboard');	
		}
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('register_employee_model');
	}

	public function index() {
		$user_id = $this->session->userdata('id');
		$data['user_data'] = $this->register_employee_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$this->load->view('templates/header', $data);
		$this->load->view('register_employee', $data);
		$this->load->view('templates/footer', $data);
	}

	public function validation() {
		$this->form_validation->set_rules('name', 'Name', 'required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim|min_length[10]|max_length[15]|regex_match[/^[0-9-()]+$/]');
		$this->form_validation->set_rules('entity', 'User Role', 'required|trim');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[tr_users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('admin_user', 'Main User', 'required');
		$this->form_validation->set_rules('emp_id', 'Employee ID', 'required');
		if($this->form_validation->run()) {
			$verification_key = md5(rand());
			$encrypted_password = $this->encryption->encrypt($this->input->post('password'));
			$data = array(
				'name'  => $this->input->post('name'),
				'email'  => $this->input->post('email'),
				'username'  => $this->input->post('username'),
				'phone_number'  => $this->input->post('phone_number'),
				'entity'  => $this->input->post('entity'),
				'password' => $encrypted_password,
				'admin_user' => $this->input->post('admin_user'),
				'emp_id' => $this->input->post('emp_id')
			);
			$id = $this->register_employee_model->reg_insert($data);
			if($id > 0) {
				$this->session->set_flashdata('success_message', 'Register successfully');
				if($data['entity'] == 'Hotel_EMP') {
					redirect('hotels');
				} elseif($data['entity'] == 'RFP_EMP') {
					redirect('companies');
				}
			}
		} else {
			$this->index();
		}
	}


	public function get_users() {
		$value = $this->input->post();
		// print_r($value['value']); 
		$user_data = $this->register_employee_model->get_users($value['value']);
		ob_start();
		?>
		<option selected disabled>Select one</option>
		<?php
		foreach ($user_data as $user) :
		?>
		<option value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
		<?php
		endforeach;
		$html = ob_get_clean();
		echo $html;
		// print_r($location_data);
	}
}
/* End of file '/Register_employee.php' */
/* Location: ./application/controllers//Register_employee.php */
