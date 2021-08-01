<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH . '/libraries/REST_Controller.php';
	require_once APPPATH . '/libraries/jwt/JWT.php';
	use \Firebase\JWT\JWT;
	
class Login extends REST_Controller {
	
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
	
	public function loginact_post() {
        $email = $this->post('email');
        $password = $this->post('password');
        $sign_method = $this->post('sign_method');
        $sign_platform = $this->post('sign_platform');
        $invalidLogin = ['invalid' => $email];
		
        if(!$email || !$password) $this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
        $data = $this->Apiauth_model->login($email,$password);
        foreach ($data as $row)
        {
            if(!empty($data)) {
                
                $id = $row->id_user;
                $token['id'] = $id;
                $token['email'] = $email;
                $date = new DateTime();
                $token['iat'] = $date->getTimestamp();
                $token['exp'] = $date->getTimestamp() + 60*60*5;
                $output = array(
                    "sign_method" => "".$sign_method."",
                    "sign_platform" => "".$sign_platform."",
                    "data" => array("id" => "".$row->id_user."","password" => "".$password."","type" => "".$row->id_level."","token" => "".JWT::encode($token, "sinauobenpinter!")."","expired_date" => "".$token['exp'].""),
                );
               
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else {
                $this->set_response($invalidgetuserdata, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
}