<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function index() {
        if ($this->session->userdata('admin_login')) {
            redirect(site_url('admin'), 'refresh');
        }elseif ($this->session->userdata('user_login')) {
            redirect(site_url('user'), 'refresh');
        }else {
            redirect(site_url('home/login'), 'refresh');
        }
    }

    public function validate_login($from = "") {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $credential = array('email' => $email, 'password' => sha1($password));

        // Checking login credential for admin
        $query = $this->db->get_where('ref_user', $credential);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('id_user', $row->id_user);
            $this->session->set_userdata('id_level', $row->id_level);
            $this->session->set_userdata('role', get_user_role('user_role', $row->id_user));
            $this->session->set_userdata('fullname', $row->fullname);
            $this->session->set_flashdata('flash_message', get_phrase('welcome').' '.$row->fullname);
            if ($row->id_level == 1) { //Administrator
                $this->session->set_userdata('admin_login', '1');
                redirect(site_url('admin/dashboard'), 'refresh');
            }else if($row->id_level == 2){ //Mentor
                $this->session->set_userdata('mentor_login', '1');
                redirect(site_url('mentor/dashboard'), 'refresh');
            }else{
				$this->session->set_userdata('user_login', '1');
                redirect(site_url('home'), 'refresh');
			}
        }else {
            $this->session->set_flashdata('error_message',get_phrase('invalid_login_credentials'));
            redirect(site_url('home/login'), 'refresh');
        }
    }

    public function register() {
        $data['fullname'] = html_escape($this->input->post('fullname'));
        $data['phone']  = html_escape($this->input->post('phone'));
        $data['address']  = html_escape($this->input->post('address'));
        $data['id_jenjang']  = html_escape($this->input->post('id_jenjang'));
        $data['email']  = html_escape($this->input->post('email'));
        $data['password']  = sha1($this->input->post('password'));
        
        if(empty($data['fullname']) || empty($data['phone']) || empty($data['address']) || empty($data['email']) || empty($data['password'])){
            $this->session->set_flashdata('error_message','formulir pendaftaran Anda kosong'.'. '.'isi formulir dengan data valid Anda');
            redirect(site_url('home/sign_up'), 'refresh');
        }

        $verification_code =  rand(100000, 200000);
        $data['verification_code'] = $verification_code;

        if (get_settings('student_email_verification') == 'enable') {
            $data['status_verification'] = 0;
        }else {
            $data['status_verification'] = 1;
        }

        $data['id_level']  = 3;

        $validity = $this->user_model->check_duplication('on_create', $data['email']);

        if($validity === 'unverified_user' || $validity == true) {
            if($validity === true){
                $this->user_model->register_user($data);
            }else{
                $this->user_model->register_user_update_code($data);
            }

            if (get_settings('student_email_verification') == 'enable') {
                $this->email_model->send_email_verification_mail($data['email'], $verification_code);

                if($validity === 'unverified_user'){
                    $this->session->set_flashdata('info_message', get_phrase('you_have_already_registered').'. '.get_phrase('please_verify_your_email_address'));
                }else{
                    $this->session->set_flashdata('flash_message', get_phrase('your_registration_has_been_successfully_done').'. '.get_phrase('please_check_your_mail_inbox_to_verify_your_email_address').'.');
                }
                $this->session->set_userdata('register_email', $this->input->post('email'));
                redirect(site_url('home/verification_code'), 'refresh');
            }else {
                $this->session->set_flashdata('flash_message', get_phrase('your_registration_has_been_successfully_done'));
                redirect(site_url('home/login'), 'refresh');
            }

        }else {
            $this->session->set_flashdata('error_message', get_phrase('you_have_already_registered'));
            redirect(site_url('home/login'), 'refresh');
        }
    }

    public function logout($from = "") {
        //destroy sessions of specific userdata. We've done this for not removing the cart session
        $this->session_destroy();
        redirect(site_url('home/login'), 'refresh');
    }

    public function session_destroy() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('is_instructor');
        if ($this->session->userdata('admin_login') == 1) {
            $this->session->unset_userdata('admin_login');
        }else {
            $this->session->unset_userdata('user_login');
        }
    }

    function forgot_password($from = "") {
        $email = $this->input->post('email');
        //resetting user password here
        $new_password = substr( md5( rand(100000000,20000000000) ) , 0,7);

        // Checking credential for admin
        $query = $this->db->get_where('users' , array('email' => $email));
        if ($query->num_rows() > 0)
        {
            $this->db->where('email' , $email);
            $this->db->update('users' , array('password' => sha1($new_password)));
            // send new password to user email
            $this->email_model->password_reset_email($new_password, $email);
            $this->session->set_flashdata('flash_message', get_phrase('please_check_your_email_for_new_password'));
            if ($from == 'backend') {
                redirect(site_url('login'), 'refresh');
            }else {
                redirect(site_url('home'), 'refresh');
            }
        }else {
            $this->session->set_flashdata('error_message', get_phrase('password_reset_failed'));
            if ($from == 'backend') {
                redirect(site_url('login'), 'refresh');
            }else {
                redirect(site_url('home'), 'refresh');
            }
        }
    }

    public function resend_verification_code(){
        $email = $this->input->post('email');
        $verification_code = $this->db->get_where('users', array('email' => $email))->row('verification_code');
        $this->email_model->send_email_verification_mail($email, $verification_code);
        
        return true;
    }

    public function verify_email_address() {
        $email = $this->input->post('email');
        $verification_code = $this->input->post('verification_code');
        $user_details = $this->db->get_where('users', array('email' => $email, 'verification_code' => $verification_code));
        if($user_details->num_rows() > 0) {        
            $user_details = $user_details->row_array();
            $updater = array(
                'status' => 1
            );
            $this->db->where('id', $user_details['id']);
            $this->db->update('users', $updater);
            $this->session->set_flashdata('flash_message', get_phrase('congratulations').'!'.get_phrase('your_email_address_has_been_successfully_verified').'.');
            $this->session->set_userdata('register_email', null);
            echo true;
        }else{
            $this->session->set_flashdata('error_message', get_phrase('the_verification_code_is_wrong').'.');
            echo false;
        }
    }
}
