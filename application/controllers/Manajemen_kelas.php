<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_kelas extends CI_Controller {
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

    public function manajemen_kelas($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->manajemen_kelas_model->add_manajemen_kelas();
            redirect(site_url('manajemen_kelas/manajemen_kelas'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->manajemen_kelas_model->edit_manajemen_kelas($param2);
            redirect(site_url('manajemen_kelas/manajemen_kelas'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->manajemen_kelas_model->delete_manajemen_kelas($param2);
            redirect(site_url('manajemen_kelas/manajemen_kelas'), 'refresh');
        }
		elseif ($param1 == "add_mentor") {
            $this->manajemen_kelas_model->add_mentor_manajemen_kelas($param2);
            redirect(site_url('manajemen_kelas/manajemen_kelas'), 'refresh');
        }

        $page_data['page_name'] = 'manajemen_kelas';
        $page_data['page_title'] = 'Manajemen Kelas';
        $page_data['manajemen_kelas'] = $this->manajemen_kelas_model->get_manajemen_kelas($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function manajemen_kelas_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_manajemen_kelas_form') {
			$page_data['mapel'] = $this->master_model->get_all_mapel()->result_array();
			$page_data['jenjang'] = $this->master_model->get_all_jenjang()->result_array();
			$page_data['materi_group'] = $this->master_model->get_all_materi_group()->result_array();
			$page_data['materi_group_sub'] = $this->master_model->get_all_materi_group_sub()->result_array();
            $page_data['page_name'] = 'manajemen_kelas_add';
            $page_data['page_title'] = 'Tambah kelas';
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_manajemen_kelas_form') {
			$page_data['mapel'] = $this->master_model->get_all_mapel()->result_array();
			$page_data['jenjang'] = $this->master_model->get_all_jenjang()->result_array();
			$page_data['materi_group'] = $this->master_model->get_all_materi_group()->result_array();
			$page_data['materi_group_sub'] = $this->master_model->get_all_materi_group_sub()->result_array();
            $page_data['page_name'] = 'manajemen_kelas_edit';
            $page_data['id_class'] = $param2;
            $page_data['page_title'] = 'Edit kelas';
            $this->load->view('backend/index', $page_data);
        }
		elseif ($param1 == 'mentor_manajemen_kelas_form') {
			$page_data['mentor'] = $this->manajemen_kelas_model->get_mentor()->result_array();
			$page_data['mentor_kelas'] = $this->manajemen_kelas_model->get_mentor_kelas($param2);
			$page_data['page_name'] = 'manajemen_kelas_mentor_add';
            $page_data['id_class'] = $param2;
            $page_data['page_title'] = 'Tambah Mentor kelas';
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'detmateri_manajemen_kelas_form') {
			$page_data['mentor'] = $this->manajemen_kelas_model->get_mentor()->result_array();
			$page_data['page_name'] = 'manajemen_kelas_materi_add';
            $page_data['id_class'] = $param2;
            $page_data['page_title'] = 'Tambah Section Materi dan Materi Detail';
            $this->load->view('backend/index', $page_data);
        }
		elseif ($param1 == 'delete_mentor_manajemen_kelas') {
			$this->manajemen_kelas_model->delete_mentor_manajemen_kelas($param2);
            redirect(site_url('manajemen_kelas/manajemen_kelas'), 'refresh');
        }
    }
    
    public function materi_section($param1 = "", $param2 = "", $param3 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param2 == 'add') {
            $this->manajemen_kelas_model->add_materi_section($param1);
            $this->session->set_flashdata('flash_message', 'Materi Section Berhasil Ditambahkan');
        }
        elseif ($param2 == 'edit') {
            $this->manajemen_kelas_model->edit_materi_section($param3);
            $this->session->set_flashdata('flash_message', 'Materi Section Berhasil Dirubah');
        }
        elseif ($param2 == 'delete') {
            $this->manajemen_kelas_model->delete_materi_section($param1, $param3);
            $this->session->set_flashdata('flash_message', 'Materi Section Berhasil Dihapus');
        }
        redirect(site_url('manajemen_kelas/manajemen_kelas_form/detmateri_manajemen_kelas_form/'.$param1));
    }

    public function materi_detail($param1 = "", $param2 = "", $param3 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param2 == 'add') {
            $this->manajemen_kelas_model->add_materi_detail($param1);
            $this->session->set_flashdata('flash_message', 'Materi Detail Berhasil Ditambahkan');
        }
        elseif ($param2 == 'edit') {
            $this->manajemen_kelas_model->edit_materi_detail($param3);
            $this->session->set_flashdata('flash_message', 'Materi Detail Berhasil Dirubah');
        }
        elseif ($param2 == 'delete') {
            $this->manajemen_kelas_model->delete_materi_detail($param1, $param3);
            $this->session->set_flashdata('flash_message', 'Materi Detail Berhasil Dihapus');
        }
        redirect(site_url('manajemen_kelas/manajemen_kelas_form/detmateri_manajemen_kelas_form/'.$param1));
    }
  
}
