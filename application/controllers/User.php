<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }


    public function get_protected_routes($method) {
        // IF ANY FUNCTION DOES NOT REQUIRE PUBLIC INSTRUCTOR, PUT THE NAME HERE.
        $unprotected_routes = ['save_course_progress'];

        if (!in_array($method, $unprotected_routes)) {
            if (get_settings('allow_instructor') != 1){
                redirect(site_url('home'), 'refresh');
            }
        }
    }

    public function instructor_authorization($method) {
        // IF THE USER IS NOT AN INSTRUCTOR HE/SHE CAN NEVER ACCESS THE OTHER FUNCTIONS EXCEPT FOR BELOW FUNCTIONS.
        if ($this->session->userdata('is_instructor') != 1) {
            $unprotected_routes = ['become_an_instructor', 'manage_profile', 'save_course_progress'];

            if (!in_array($method, $unprotected_routes)) {
                redirect(site_url('user/become_an_instructor'), 'refresh');
            }
        }
    }

    public function index() {
        if ($this->session->userdata('user_login') == true) {
            $this->dashboard();
        }else {
            redirect(site_url('login'), 'refresh');
        }
    }

    public function dashboard() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = 'Dashboard';
        $this->load->view('frontend/'.get_frontend_settings('theme').'/index', $page_data);
    }
	
	public function kelas_diikuti() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'kelas_diikuti';
        $page_data['page_title'] = 'Kelas saya';
        $this->load->view('frontend/'.get_frontend_settings('theme').'/index', $page_data);
    }
	
	public function status_pesanan() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'status_pesanan';
        $page_data['page_title'] = 'Status pesanan';
        $this->load->view('frontend/'.get_frontend_settings('theme').'/index', $page_data);
    }
	
	public function akun_saya() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'akun_saya';
        $page_data['page_title'] = 'Akun saya';
        $this->load->view('frontend/'.get_frontend_settings('theme').'/index', $page_data);
    }
	
	public function ubah_password() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'ubah_password';
        $page_data['page_title'] = 'Ubah Password';
        $this->load->view('frontend/'.get_frontend_settings('theme').'/index', $page_data);
    }
	
	function manage_password($param1 = '')
    {
        if ($this->session->userdata('user_login') != true){
			redirect(site_url('login'), 'refresh');
        }else{
			$this->user_model->change_password($param1);
			redirect(site_url('user/ubah_password'), 'refresh');
        }
    }


}
