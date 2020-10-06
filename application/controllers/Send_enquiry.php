<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_enquiry extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('enquiry_data_model');
	}
	
	public function index() {
		$form_data = $this->input->post();
		/*print_r($form_data);
		die();*/
		if(!empty($form_data)) {
			if(isset($form_data['form_data']) && !empty($form_data['form_data'])) {
				$form_unfilter = $form_data['form_data'];
				$form_filter = array();
				foreach ($form_unfilter as $value) {
					if(!empty($value['value'])) {
						$form_filter[$value['name']] = $value['value'];
					} else {
						echo 0;
						die();
					}
				}
				$response = $this->enquiry_data_model->insert_contact_enquiry($form_data['form_id'], $form_filter);
				print_r($response);
				die();
			}
		}

	}

	public function get_enquiry_data() {
		$results = $this->enquiry_data_model->get_contact_data();
		if(!empty($results)) {
			$room_count = 0;
			foreach ($results as $result) {
				$form_values = unserialize($result->form_data);
				if(isset($form_values['number_of_rooms'])) {
					$room_count = $room_count + $form_values['number_of_rooms'];
				} if(isset($form_values['number-of-rooms'])) {
					$room_count = $room_count + $form_values['number-of-rooms'];
				}
			}
		$room_count = 10000 + $room_count;
		$invID = str_pad($room_count, 5, '0', STR_PAD_LEFT);
		$invIDArray = str_split((string)$invID);
			echo $invID;
			die();
		} else {
			echo '00787';
			die();
		}
	}


	public function send_email_otp() {
		/*
		ini_set("SMTP","ssl://smtp.gmail.com");
		ini_set("smtp_port","587");

		$config = Array(
		  'protocol'    => 'smtp',
		  '_smtp_auth'  => TRUE,
		  'smtp_host'   => 'smtp.gmail.com',
		  'smtp_port'   => 587,
		  'smtp_user'   => 'willmartin9797@gmail.com',
		  'smtp_pass'   => 'martin?123',
		  'mailtype'    => 'html',
		  'charset'     => 'utf-8',
		  'wordwrap'    => TRUE,
		  'smtp_timeout' => '60'
		);
		// $message = $row2['content'];
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from("willmartin9797@gmail.com");
		$this->email->to("willmartin9797@gmail.com");
		$this->email->subject('Turbores Login OTP'); 
		$otp = 12345;
        $message = "Hello,

        You or somebody else have tried to login to portal.turbores.com using your credentials. Here is your one time OTP for the same $otp. Hope you would like to be part of turbores family.

        Thank you,
        Turbores.";
        $this->email->message($message);
		if($this->email->send()) {
		  echo 'Email sent.';
		} else {
		 show_error($this->email->print_debugger());
		}

		*/
		/*
		$to = "ajay@synkrama.com";
		$subject = "HTML email";
		$message = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body>
		<p>This email contains HTML Tags!</p>
		<table>
		<tr>
		<th>Firstname</th>
		<th>Lastname</th>
		</tr>
		<tr>
		<td>John</td>
		<td>Doe</td>
		</tr>
		</table>
		</body>
		</html>
		";
		// Always set content-type when sending HTML email
		// $headers = "MIME-Version: 1.0" . "\r\n";
		// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		// $headers .= 'From: <willmartin9797@gmail.com>' . "\r\n";


		$headers .= "Reply-To: Turbores <sales@turbores.com>\r\n"; 
		  $headers .= "Return-Path: Turbores <sales@turbores.com>\r\n"; 
		  $headers .= "From: Turbores <sales@turbores.com>\r\n";  
		  $headers .= "Organization: Turbores\r\n";
		  $headers .= "MIME-Version: 1.0\r\n";
		  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		  $headers .= "X-Priority: 3\r\n";
		  $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

		// $headers .= 'Cc: myboss@example.com' . "\r\n";
		mail($to,$subject,$message,$headers);
		*/
		

		/*
		$to = 'ajay@synkrama.com';
		$subject = 'Turbores OTP' ;
		$body = "<div> hi hi .. </div>";
		$headers = 'From: Turbores sales@turbores.com' . "\r\n" ;
		$headers .='Reply-To: '. $to . "\r\n" ;
		$headers .='X-Mailer: PHP/' . phpversion();
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";   
		if(mail($to, $subject, $body,$headers)) {
			echo('<br>'."Email Sent ;D ".'</br>');
		} 
		else 
		{
			echo("<p>Email Message delivery failed...</p>");
		}
		*/

		/*
		$to = "ajay@synkrama.com";
		$subject = "your subject";
		$body = "<p>Your Body</p>";
		$headers  = "From: Turbores <sales@turbores.com>" . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		mail($to, $subject, $body, $headers);
		*/
		$message = 'test message';
		$message = wordwrap($message, 70);  
	    $to = "ajay@synkrama.com";  // change this propperty for your own email
	    $subject = "Een gebruiker heeft een vraag of opmerking";
	    $body = 'yadidyadi'. $message ;
	    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	    $headers .= "From: sales@turbores.com"; // make this one static.. i made mine noreply
	    if (mail ($to, $subject, $body, $headers)) {
	    	echo 'yay, mail send';
	    }
		

	}
	
}
/* End of file '/Send_enquiry.php' */
/* Location: ./application/controllers//Send_enquiry.php */
