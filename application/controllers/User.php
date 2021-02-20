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
		$page_data['my_class'] = $this->user_model->get_all_my_class()->result_array();
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

    public function kelas_diikuti_isi($id_class) {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $id_class_materi_detail = "0";

        // Get materi
        if (isset($_GET['materi']) && !empty($_GET['materi'])) {
            $id_class_materi_detail = $_GET['materi'];
        }

        $page_data['page_name'] = 'kelas_diikuti_isi';
        $page_data['page_title'] = 'Kelas saya';
        $this->db->select("a.*, b.kd_jenjang, b.nm_jenjang, substring(desc_class, 1, 100) as desc_short, c.nm_mentor, count(e.id_class_materi_section) jmlmateri, ifnull(SEC_TO_TIME( SUM( TIME_TO_SEC(duration))),'00:00:00') as sumduration, f.bio, f.quotes");
        $this->db->from('tr_class a');
        $this->db->join('ref_jenjang b', 'a.id_jenjang = b.id_jenjang', 'left');
        $this->db->join('tr_class_mentor c','a.id_class = c.id_class', 'left');
        $this->db->join('tr_class_materi_section d','a.id_class = d.id_class', 'left');
        $this->db->join('tr_class_materi_detail e','d.id_class_materi_section = e.id_class_materi_section', 'left');
        $this->db->join('ref_mentor f','c.id_mentor = f.id_mentor', 'left');
        $this->db->where('a.active', '1');
        $this->db->where('a.id_class', $id_class);
        $page_data['course']   = $this->db->get()->row_array();
        $page_data['id_class_materi_detail']   = $id_class_materi_detail;
        $this->load->view('frontend/'.get_frontend_settings('theme').'/index', $page_data);
    }

    public function tandai_materi($id_class, $id_class_materi_detail, $id_user) {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'kelas_diikuti_isi';
        $page_data['page_title'] = 'Kelas saya';
        $page_data['id_class_materi_detail'] = $id_class_materi_detail;
        $this->manajemen_kelas_model->add_tandai_materi($id_class_materi_detail, $id_user);
        redirect(site_url('user/kelas_diikuti_isi/'.$id_class.'?materi='.$id_class_materi_detail));
    }

    public function rating_materi($id_class, $id_class_materi_detail) {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $this->manajemen_kelas_model->add_rating_materi($id_class, $this->session->userdata('id_user'));
        $page_data['page_name'] = 'kelas_diikuti_isi';
        $page_data['page_title'] = 'Kelas saya';
        redirect(site_url('user/kelas_diikuti_isi/'.$id_class.'?materi='.$id_class_materi_detail));
    }

    public function kelas_saya() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'bensmart_class';
        $page_data['page_title'] = 'Kelas saya';
        $this->load->view('frontend/'.get_frontend_settings('theme').'/index', $page_data);
    }

}
