<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH . '/libraries/REST_Controller.php';
	require_once APPPATH . '/libraries/jwt/JWT.php';
	use \Firebase\JWT\JWT;
	
class EmailVerification extends REST_Controller {
	
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
	
	public function emailVerificationact_post() {
        $email = $this->post('email');
        $verify_code = $this->post('verify_code');
        $invalidLogin = ['invalid' => $email];
		
        if(!$email || !$verify_code) $this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
        $data = $this->Apiauth_model->emailverification($email,$verify_code);
        foreach ($data as $row)
        {
            if(!empty($data)) {
                $output = array(
                    "result_code" => "{apps}",
                    "result_message" => "{apps}",
                    "data" => array("id_user" => "".$row->id_user."","username" => "".$row->username."","email" => "".$row->email."","first_name" => "".$row->first_name."","last_name" => "".$row->last_name."","email" => "".$row->email."","password" => "".$row->password."","phone" => "".$row->phone."","id_jenjang" => "".$row->id_jenjang.""),
                );
               
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else {
                $this->set_response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
            }
        }
        
    }
}