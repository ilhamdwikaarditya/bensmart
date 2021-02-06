<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }
    }

    public function index() {
        if ($this->session->userdata('admin_login') == true) {
            $this->dashboard();
        }else {
            redirect(site_url('login'), 'refresh');
        }
    }
	
	public function dashboard() {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('backend/index.php', $page_data);
    }

    public function blank_template() {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'blank_template';
        $this->load->view('backend/index.php', $page_data);
    }

    public function jenjang($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->master_model->add_jenjang();
            redirect(site_url('master/jenjang'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->master_model->edit_jenjang($param2);
            redirect(site_url('master/jenjang'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->master_model->delete_jenjang($param2);
            redirect(site_url('master/jenjang'), 'refresh');
        }

        $page_data['page_name'] = 'jenjang';
        $page_data['page_title'] = 'Jenjang';
        $page_data['jenjang'] = $this->master_model->get_all_jenjang($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function jenjang_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_jenjang_form') {
            $page_data['page_name'] = 'jenjang_add';
            $page_data['page_title'] = 'Tambah Jenjang';
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_jenjang_form') {
            $page_data['page_name'] = 'jenjang_edit';
            $page_data['id_jenjang'] = $param2;
            $page_data['page_title'] = 'Ubah Jenjang';
            $this->load->view('backend/index', $page_data);
        }
    }

    public function materi_group($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->master_model->add_materi_group();
            redirect(site_url('master/materi_group'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->master_model->edit_materi_group($param2);
            redirect(site_url('master/materi_group'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->master_model->delete_materi_group($param2);
            redirect(site_url('master/materi_group'), 'refresh');
        }

        $page_data['page_name'] = 'materi_group';
        $page_data['page_title'] = 'Grup Materi';
        $page_data['materi_group'] = $this->master_model->get_all_materi_group($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function materi_group_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_materi_group_form') {
            $page_data['page_name'] = 'materi_group_add';
            $page_data['page_title'] = 'Tambah Grup Materi';
            $page_data['jenjang'] = $this->master_model->get_jenjang()->result_array();
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_materi_group_form') {
            $page_data['page_name'] = 'materi_group_edit';
            $page_data['id_materi_group'] = $param2;
            $page_data['page_title'] = 'Ubah Grup Materi';
            $page_data['jenjang'] = $this->master_model->get_jenjang()->result_array();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function materi_group_sub($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->master_model->add_materi_group_sub();
            redirect(site_url('master/materi_group_sub'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->master_model->edit_materi_group_sub($param2);
            redirect(site_url('master/materi_group_sub'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->master_model->delete_materi_group_sub($param2);
            redirect(site_url('master/materi_group_sub'), 'refresh');
        }

        $page_data['page_name'] = 'materi_group_sub';
        $page_data['page_title'] = 'Sub Grup Materi';
        $page_data['materi_group_sub'] = $this->master_model->get_all_materi_group_sub($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function materi_group_sub_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_materi_group_sub_form') {
            $page_data['page_name'] = 'materi_group_sub_add';
            $page_data['page_title'] = 'Tambah Sub Grub Materi';
            $page_data['materi_group'] = $this->master_model->get_materi_group()->result_array();
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_materi_group_sub_form') {
            $page_data['page_name'] = 'materi_group_sub_edit';
            $page_data['id_materi_group_sub'] = $param2;
            $page_data['page_title'] = 'Ubah Sub Grub Materi';
            $page_data['materi_group'] = $this->master_model->get_materi_group()->result_array();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function mapel($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->master_model->add_mapel();
            redirect(site_url('master/mapel'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->master_model->edit_mapel($param2);
            redirect(site_url('master/mapel'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->master_model->delete_mapel($param2);
            redirect(site_url('master/mapel'), 'refresh');
        }

        $page_data['page_name'] = 'mapel';
        $page_data['page_title'] = 'Mata Pelajaran';
        $page_data['mapel'] = $this->master_model->get_all_mapel($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function mapel_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_mapel_form') {
            $page_data['page_name'] = 'mapel_add';
            $page_data['page_title'] = 'Tambah Mata Pelajaran';
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_mapel_form') {
            $page_data['page_name'] = 'mapel_edit';
            $page_data['id_mapel'] = $param2;
            $page_data['page_title'] = 'Ubah Mata Pelajaran';
            $this->load->view('backend/index', $page_data);
        }
    }

    public function level($param1 = "", $param2 = "") {
		
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->master_model->add_level();
            redirect(site_url('master/level'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->master_model->edit_level($param2);
            redirect(site_url('master/level'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->master_model->delete_level($param2);
            redirect(site_url('master/level'), 'refresh');
        }

        $page_data['page_name'] = 'level';
        $page_data['page_title'] = 'Level';
        $page_data['level'] = $this->master_model->get_level($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function level_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_level_form') {
            $page_data['page_name'] = 'level_add';
            $page_data['page_title'] = 'Tambah Level';
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_level_form') {
            $page_data['page_name'] = 'level_edit';
            $page_data['level_id'] = $param2;
            $page_data['page_title'] = 'Edit Level';
            $this->load->view('backend/index', $page_data);
        }
    }
	
	public function mentor($param1 = "", $param2 = "") {
		
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->master_model->add_mentor();
            redirect(site_url('master/mentor'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->master_model->edit_mentor($param2);
            redirect(site_url('master/mentor'), 'refresh');
        }
        elseif ($param1 == "nonactive") {
            $this->master_model->delete_mentor($param2);
            redirect(site_url('master/mentor'), 'refresh');
        }
        elseif ($param1 == "active") {
            $this->master_model->active_mentor($param2);
            redirect(site_url('master/mentor'), 'refresh');
        }

        $page_data['page_name'] = 'mentor';
        $page_data['page_title'] = 'Mentor';
        $page_data['mentor'] = $this->master_model->get_mentor($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function mentor_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_mentor_form') {
			$page_data['user'] = $this->master_model->get_member()->result_array();
            $page_data['page_name'] = 'mentor_add';
            $page_data['page_title'] = 'Tambah Mentor';
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_mentor_form') {
			$page_data['user'] = $this->master_model->get_member()->result_array();
            $page_data['page_name'] = 'mentor_edit';
            $page_data['mentor_id'] = $param2;
            $page_data['page_title'] = 'Ubah Mentor';
            $this->load->view('backend/index', $page_data);
        }
    }
	
	public function tipe_payment($param1 = "", $param2 = "") {
		
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->master_model->add_tipe_payment();
            redirect(site_url('master/tipe_payment'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->master_model->edit_tipe_payment($param2);
            redirect(site_url('master/tipe_payment'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->master_model->delete_tipe_payment($param2);
            redirect(site_url('master/tipe_payment'), 'refresh');
        }

        $page_data['page_name'] = 'tipe_payment';
        $page_data['page_title'] = 'Tipe Pembayaran';
		
        $page_data['tipe_payment'] = $this->master_model->get_tipe_payment($param2);

        $this->load->view('backend/index', $page_data);
    }

    public function tipe_payment_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_tipe_payment_form') {
            $page_data['page_name'] = 'tipe_payment_add';
            $page_data['page_title'] = 'Tambah Tipe Pembayaran';
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_tipe_payment_form') {
            $page_data['page_name'] = 'tipe_payment_edit';
            $page_data['id_type_payment'] = $param2;
            $page_data['page_title'] = 'Edit Tipe Pembayaran';
            $this->load->view('backend/index', $page_data);
        }
    }
	
	public function member($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->master_model->add_member();
            redirect(site_url('master/member'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->master_model->edit_member($param2);
            redirect(site_url('master/member'), 'refresh');
        }
        elseif ($param1 == "nonactive") {
            $this->master_model->delete_member($param2);
            redirect(site_url('master/member'), 'refresh');
        }
        elseif ($param1 == "active") {
            $this->master_model->active_member($param2);
            redirect(site_url('master/member'), 'refresh');
        }

        $page_data['page_name'] = 'member';
        $page_data['page_title'] = 'Member';
        $page_data['member'] = $this->master_model->get_member($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function member_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_member_form') {
            $page_data['page_name'] = 'member_add';
            $page_data['page_title'] = 'Tambah Member';
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_member_form') {
            $page_data['page_name'] = 'member_edit';
            $page_data['member_id'] = $param2;
            $page_data['page_title'] = 'Ubah Member';
            $this->load->view('backend/index', $page_data);
        }
    }
	
  
}
