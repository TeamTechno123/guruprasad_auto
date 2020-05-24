<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->view('Website/index');
	}
	public function about()
	{
		$this->load->view('Website/about');
	}
	public function product()
	{
		$this->load->view('Website/product');
	}
	public function workshop()
	{
		$this->load->view('Website/workshop');
	}

	public function award()
	{
		$this->load->view('Website/award');
	}
	public function contact()
	{
		$this->load->view('Website/contact');
	}

	public function send_mail(){
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('email');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$message = $this->input->post('message');
		$message1 ='
			 <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
			 Sender: '.$first_name.' '.$last_name.'
			 </p><br> <hr>
			 <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
			Mobile No.: '.$mobile.'
			</p><br> <hr>
			 <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
			 Message: '.$message.'
			 </p>
		 ';

		// $message.' First Name'.$first_name."\r\n".' Last Name'.$last_name."\r\n".'Designation'.$designation."\r\n".' Organization'.$organization."\r\n".' mobile No.'."\r\n".$mobile."\r\n".' Country'."\r\n".$country;
		$from_email = $email;
		$recipient = "dhananjay.technothinksup@gmail.com";
		$subject = "Mail From Website - ";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from_email."\r\n".
		'Reply-To: '.$from_email."\r\n" .
		'X-Mailer: PHP/' . phpversion();

		$send = mail($recipient, $subject, $message1, $headers);
		if($send){
			$this->session->set_flashdata('send_email_sucess','Sucess');
		}
		else{
			$this->session->set_flashdata('send_email_error','error');
		}
		header('Location:'.base_url('Welcome/contact'));
	}

}
