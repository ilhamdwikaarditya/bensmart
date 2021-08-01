<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH . '/libraries/REST_Controller.php';
	require_once APPPATH . '/libraries/jwt/JWT.php';
	use \Firebase\JWT\JWT;
	
class EditUserData extends REST_Controller {
	
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
	
	public function edituserdataact_post() {
        $username = $this->post('username');
        $email = $this->post('email');
        $first_name = $this->post('first_name');
        $last_name = $this->post('last_name');
        $password = $this->post('password');
        $phone = $this->post('phone');
        $id_jenjang = $this->post('id_jenjang');

        $invalidedituserdata = ['invalid' => $email];
		
        if(!$username || !$email || !$first_name || !$last_name || !$password || !$phone || !$id_jenjang ) $this->response($invalidedituserdata, REST_Controller::HTTP_NOT_FOUND);
        $data = $this->Apiauth_model->edituserdata($username,$email,$first_name,$last_name,$password,$phone,$id_jenjang);
        foreach ($data as $row)
        {
            if(!empty($data)) {
                $output = array(
                    "result_code" => "200",
                    "result_message" => "success",
                    "data" => array("status" => "".$status."","message" => "".$message.""),
                );
               
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else {
                $this->set_response($invalidedituserdata, REST_Controller::HTTP_NOT_FOUND);
            }
        }
        
    }
}