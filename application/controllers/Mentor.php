<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor extends CI_Controller {
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
        if ($this->session->userdata('mentor_login') == true) {
            $this->dashboard();
        }else {
            redirect(site_url('login'), 'refresh');
        }
    }
	
	public function dashboard() {
        if ($this->session->userdata('mentor_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('backend/index.php', $page_data);
    }

    public function blank_template() {
        if ($this->session->userdata('mentor_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'blank_template';
        $this->load->view('backend/index.php', $page_data);
    }

    public function ajax_get_video_details() {
        $video_details = $this->video_model->getVideoDetails($_POST['video_url']);
        echo $video_details['duration'];
    }

    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('mentor_login') != true)
        redirect(site_url('login'), 'refresh');
        if ($param1 == 'update_profile_info') {
            $this->master_model->edit_mentor_profile($param2);
            redirect(site_url('mentor/manage_profile'), 'refresh');
        }
        if ($param1 == 'update_profile_bio') {
            $this->master_model->edit_mentor_bio($param2);
            redirect(site_url('mentor/manage_profile'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $this->master_model->change_password($param2);
            redirect(site_url('mentor/manage_profile'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = 'Atur Profil';
        $page_data['edit_data'] = $this->master_model->get_mentor_profile()->result_array();
        // $page_data['edit_data']  = $this->db->get_where('ref_user', array(
        //     'id_user' => $this->session->userdata('id_user')
        // ))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function manajemen_kelas($param1 = "", $param2 = "") {
        if ($this->session->userdata('mentor_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->manajemen_kelas_model->add_manajemen_kelas();
            redirect(site_url('mentor/manajemen_kelas'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->manajemen_kelas_model->edit_manajemen_kelas($param2);
            redirect(site_url('mentor/manajemen_kelas'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->manajemen_kelas_model->delete_manajemen_kelas($param2);
            redirect(site_url('mentor/manajemen_kelas'), 'refresh');
        }
		elseif ($param1 == "add_mentor") {
            $this->manajemen_kelas_model->add_mentor_manajemen_kelas($param2);
            redirect(site_url('mentor/manajemen_kelas'), 'refresh');
        }

        $page_data['page_name'] = 'manajemen_kelas';
        $page_data['page_title'] = 'Manajemen Kelas';
        $page_data['manajemen_kelas'] = $this->manajemen_kelas_model->get_manajemen_kelas($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function manajemen_kelas_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('mentor_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_manajemen_kelas_form') {
			$page_data['mapel'] = $this->master_model->get_all_mapel()->result_array();
			$page_data['jenjang'] = $this->master_model->get_all_jenjang()->result_array();
			$page_data['materi_group_sub'] = $this->master_model->get_all_materi_group_sub()->result_array();
            $page_data['page_name'] = 'manajemen_kelas_add';
            $page_data['page_title'] = 'Tambah kelas';
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_manajemen_kelas_form') {
			$page_data['mapel'] = $this->master_model->get_all_mapel()->result_array();
			$page_data['jenjang'] = $this->master_model->get_all_jenjang()->result_array();
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
            redirect(site_url('mentor/manajemen_kelas'), 'refresh');
        }
        elseif ($param1 == 'detmateri_dokumen_manajemen_kelas_form') {
			$page_data['mentor'] = $this->manajemen_kelas_model->get_mentor()->result_array();
			$page_data['page_name'] = 'manajemen_kelas_materi_dokumen_add';
            $page_data['id_class_materi_detail'] = $param2;
            $page_data['page_title'] = 'Tambah Materi Detail Dokumen';
            $this->load->view('backend/index', $page_data);
        }
    }
    
    public function materi_section($param1 = "", $param2 = "", $param3 = "") {
        if ($this->session->userdata('mentor_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param2 == 'add') {
            $this->manajemen_kelas_model->add_materi_section($param1);
            $this->session->set_flashdata('flash_message', 'Materi Section Berhasil Ditambahkan');
            redirect(site_url('mentor/manajemen_kelas_form/detmateri_manajemen_kelas_form/'.$param1));
        }
        elseif ($param2 == 'edit') {
            $this->manajemen_kelas_model->edit_materi_section($param3);
            $this->session->set_flashdata('flash_message', 'Materi Section Berhasil Dirubah');
            redirect(site_url('mentor/manajemen_kelas_form/detmateri_manajemen_kelas_form/'.$param1));
        }
        elseif ($param2 == 'delete') {
            $this->manajemen_kelas_model->delete_materi_section($param1, $param3);
        }
    }

    public function materi_detail($param1 = "", $param2 = "", $param3 = "") {
        if ($this->session->userdata('mentor_login') != true) {
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
        elseif ($param2 == 'send') {
            $this->manajemen_kelas_model->send_materi_detail($param1, $param3);
            $this->session->set_flashdata('flash_message', 'Materi Detail Berhasil Diajukan');
        }
        redirect(site_url('mentor/manajemen_kelas_form/detmateri_manajemen_kelas_form/'.$param1));
    }

    public function materi_detail_dokumen($param1 = "", $param2 = "", $param3 = "") {
        if ($this->session->userdata('mentor_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param2 == "add") {
            $this->manajemen_kelas_model->add_materi_detail_dokumen($param1);
            // $this->session->set_flashdata('flash_message', 'Materi Detail Dokumen Berhasil Ditambahkan');
        }
        elseif ($param2 == 'edit') {
            $this->manajemen_kelas_model->edit_materi_detail_dokumen($param3);
            $this->session->set_flashdata('flash_message', 'Materi Detail Dokumen Berhasil Dirubah');
        }
        elseif ($param2 == 'delete') {
            $this->manajemen_kelas_model->delete_materi_detail_dokumen($param1, $param3);
            $this->session->set_flashdata('flash_message', 'Materi Detail Dokumen Berhasil Dihapus');
        }
        redirect(site_url('mentor/manajemen_kelas_form/detmateri_dokumen_manajemen_kelas_form/'.$param1));
    }
  
}
