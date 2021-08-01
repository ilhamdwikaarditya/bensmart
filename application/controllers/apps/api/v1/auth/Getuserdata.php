<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH . '/libraries/REST_Controller.php';
	require_once APPPATH . '/libraries/jwt/JWT.php';
	use \Firebase\JWT\JWT;
	
class GetUserData extends REST_Controller {
	
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
	
	public function getuserdataact_post() {
        $id_user = $this->post('id_user');
        $invalidgetuserdata = ['invalid' => $id_user];
		
        if(!$id_user) $this->response($invalidgetuserdata, REST_Controller::HTTP_NOT_FOUND);
        $data = $this->Apiauth_model->getuserdata($id_user);
        foreach ($data as $row)
        {
            if(!empty($data)) {
                
                $output = array(
                    "result_code" => "200",
                    "result_message" => "success",
                    "data" => array("id_user" => "".$row->id_user."","username" => "".$row->email."","email" => "".$row->email."","first_name" => "".$row->firstname."","last_name" => "".$row->lastname."","email" => "".$row->email."","password" => "".$row->password."","phone" => "".$row->phone."","id_jenjang" => "".$row->id_jenjang."","img_profile" => "".$row->photo.""),
                );
               
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else {
                $this->set_response($invalidgetuserdata, REST_Controller::HTTP_NOT_FOUND);
            }
        }
        
    }
}