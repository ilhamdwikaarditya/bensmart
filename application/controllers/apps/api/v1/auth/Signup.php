<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH . '/libraries/REST_Controller.php';
	require_once APPPATH . '/libraries/jwt/JWT.php';
	use \Firebase\JWT\JWT;
	
class Signup extends REST_Controller {
	
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model("Apiauth_model");
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        
    }
	
	public function signupact_post() {
        $data['firstname'] = html_escape($this->input->post('firstname'));
        $data['lastname']  = html_escape($this->input->post('lastname'));
        $data['phone']     = html_escape($this->input->post('phone'));
        $data['address']   = html_escape($this->input->post('address'));
        $data['id_kota']   = html_escape($this->input->post('id_kota'));
        $data['id_jenjang']= html_escape($this->input->post('id_jenjang'));
        $data['email']     = html_escape($this->input->post('email'));
        $data['password']  = sha1($this->input->post('password'));
        $data['rand_code'] = rand(100000000,20000000000);
        $data['verification_code'] =  md5(sha1($this->input->post('password')));
        if (get_settings('student_email_verification') == 'enable') {
            $data['status_verification'] = 0;
        }else {
            $data['status_verification'] = 1;
        }
        $data['id_level'] = 3;
        $invalidSign = ['invalid' => $data['email']];
		
        if(!$data['firstname'] || !$lastname || !$phone || !$address || !$id_kota || !$id_jenjang || !$email || !$password) $this->response($invalidSign, REST_Controller::HTTP_NOT_FOUND);
        $id = $this->Apiauth_model->signup($firstname,$lastname,$phone,$address,$id_kota,$id_jenjang,$email,$password,$repassword);
        
        if($id) {
            $output = array(
				"result_code" => "{200}",
				"result_message" => "{success}",
				"data" => array("status" => "{".$status."}","message" => "".$massage.""),
			);
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        else {
            $this->set_response($invalidSign, REST_Controller::HTTP_NOT_FOUND);
        }

    }
}