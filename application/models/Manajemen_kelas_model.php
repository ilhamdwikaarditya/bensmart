<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_kelas_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	public function get_manajemen_kelas($id = 0) {
        if ($id > 0) {
            return $this->db->get_where('ref_level', array('id' => $id, 'is_instructor' => 1));
        }else{
            return $this->db->get_where('ref_level');
        }
    }
	
	public function add_jenjang($is_instructor = false)
    {
        $data['nm_jenjang'] = html_escape($this->input->post('nm_jenjang'));
        $data['kd_jenjang'] = html_escape($this->input->post('kd_jenjang'));

        $this->db->insert('ref_jenjang', $data);
        $id_jenjang = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', 'jenjang added successfully');
    }

    public function add_materi_group($is_instructor = false)
    {
        $data['nm_materi_group'] = html_escape($this->input->post('nm_materi_group'));
        $data['id_jenjang'] = html_escape($this->input->post('id_jenjang'));

        $this->db->insert('ref_materi_group', $data);
        $id_materi_group = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', 'materi group added successfully');
    }

    public function add_materi_group_sub($is_instructor = false)
    {
        $data['nm_materi_group_sub'] = html_escape($this->input->post('nm_materi_group_sub'));
        $data['kd_materi_group_sub'] = html_escape($this->input->post('kd_materi_group_sub'));
        $data['id_materi_group'] = html_escape($this->input->post('id_materi_group'));

        $this->db->insert('ref_materi_group_sub', $data);
        $id_materi_group_sub = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', 'materi group sub added successfully');
    }

    public function add_mapel($is_instructor = false)
    {
        $data['nm_mapel'] = html_escape($this->input->post('nm_mapel'));
        $data['kd_mapel'] = html_escape($this->input->post('kd_mapel'));

        $this->db->insert('ref_mapel', $data);
        $id_mapel = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', 'mapel added successfully');
    }

    public function add_level() {
        
            $data['nm_level'] = html_escape($this->input->post('nm_level'));

            $this->db->insert('ref_level', $data);
            $level_id = $this->db->insert_id();
            $this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
    }
	
	public function add_member() {
        $validity = $this->check_duplication_member('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }else {
            $data['fullname'] = html_escape($this->input->post('fullname'));
            $data['address'] = html_escape($this->input->post('address'));
            $data['phone'] = html_escape($this->input->post('phone'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $data['id_level'] = 3;
            $data['photo'] = md5(rand(10000, 10000000));

            $this->db->insert('ref_user', $data);
            $user_id = $this->db->insert_id();
            $this->upload_photo($data['photo']);
            $this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
        }
    }
	
	public function add_mentor() {
        
            $data['id_user'] = html_escape($this->input->post('id_user'));
            $data['bio'] 	 = html_escape($this->input->post('bio'));
            $data['quotes']  = html_escape($this->input->post('quotes'));

            $this->db->insert('ref_mentor', $data);
            $mentor_id = $this->db->insert_id();
            $this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
    }
	
	public function add_tipe_payment() {
        
            $data['nm_type_payment'] = html_escape($this->input->post('nm_type_payment'));

            $this->db->insert('ref_type_payment', $data);
            $mentor_id = $this->db->insert_id();
            $this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
    }
	
	public function edit_jenjang($id_jenjang = "")
    { // Admin does this editing
        $data['nm_jenjang'] = html_escape($this->input->post('nm_jenjang'));
        $data['kd_jenjang'] = html_escape($this->input->post('kd_jenjang'));

        $this->db->where('id_jenjang', $id_jenjang);
        $this->db->update('ref_jenjang', $data);
        $this->session->set_flashdata('flash_message', 'jenjang update successfully');
    }

    public function edit_materi_group($id_materi_group = "")
    { 
        $data['nm_materi_group'] = html_escape($this->input->post('nm_materi_group'));
        $data['id_jenjang'] = html_escape($this->input->post('id_jenjang'));

        $this->db->where('id_materi_group', $id_materi_group);
        $this->db->update('ref_materi_group', $data);
        $this->session->set_flashdata('flash_message', 'materi group update successfully');
    }

    public function edit_materi_group_sub($id_materi_group_sub = "")
    { 
        $data['nm_materi_group_sub'] = html_escape($this->input->post('nm_materi_group_sub'));
        $data['kd_materi_group_sub'] = html_escape($this->input->post('kd_materi_group_sub'));
        $data['id_materi_group'] = html_escape($this->input->post('id_materi_group'));

        $this->db->where('id_materi_group_sub', $id_materi_group_sub);
        $this->db->update('ref_materi_group_sub', $data);
        $this->session->set_flashdata('flash_message', 'materi group sub update successfully');
    }

    public function edit_mapel($id_mapel = "")
    { 
        $data['nm_mapel'] = html_escape($this->input->post('nm_mapel'));
        $data['kd_mapel'] = html_escape($this->input->post('kd_mapel'));

        $this->db->where('id_mapel', $id_mapel);
        $this->db->update('ref_mapel', $data);
        $this->session->set_flashdata('flash_message', 'mapel update successfully');
    }

    public function edit_level($level_id = "") { // Admin does this editing
            $data['nm_level'] = html_escape($this->input->post('nm_level'));
            $this->db->where('id_level', $level_id);
            $this->db->update('ref_level', $data);
            $this->session->set_flashdata('flash_message', 'Berhasil Dirubah');
    }
	
	public function edit_member($member_id = "") { // Admin does this editing
        $validity = $this->check_duplication_member('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            $data['fullname'] = html_escape($this->input->post('fullname'));
            $data['address'] = html_escape($this->input->post('address'));
            $data['phone'] = html_escape($this->input->post('phone'));
			if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                unlink('uploads/photo/' . $this->db->get_where('ref_user', array('id_user' => $member_id))->row('photo').'.jpg');
                $data['photo'] = md5(rand(10000, 10000000));
            }

            if (isset($_POST['email'])) {
                $data['email'] = html_escape($this->input->post('email'));
            }
            
            
            $this->db->where('id_user', $member_id);
            $this->db->update('ref_user', $data);
            $this->upload_photo($data['photo']);
            $this->session->set_flashdata('flash_message', 'Berhasil dirubah');
        }else {
            $this->session->set_flashdata('error_message', 'Email duplikat');
        }

    }
	
	public function edit_mentor($mentor_id = "") { // Admin does this editing
            $data['id_user'] = html_escape($this->input->post('id_user'));
            $data['bio'] 	 = html_escape($this->input->post('bio'));
            $data['quotes']  = html_escape($this->input->post('quotes'));
            $this->db->where('id_mentor', $mentor_id);
            $this->db->update('ref_mentor', $data);
            $this->session->set_flashdata('flash_message', 'Berhasil Dirubah');
    }
	
	public function edit_tipe_payment($mentor_id = "") { // Admin does this editing
            $data['nm_type_payment'] = html_escape($this->input->post('nm_type_payment'));
			
            $this->db->where('id_type_payment', $mentor_id);
            $this->db->update('ref_type_payment', $data);
            $this->session->set_flashdata('flash_message', 'Berhasil Dirubah');
    }
	
	public function delete_jenjang($id_jenjang = "")
    {
        $this->db->where('id_jenjang', $id_jenjang);
        $this->db->delete('ref_jenjang');
        $this->session->set_flashdata('flash_message', 'jenjang deleted successfully');
    }

    public function delete_materi_group($id_materi_group = "")
    {
        $this->db->where('id_materi_group', $id_materi_group);
        $this->db->delete('ref_materi_group');
        $this->session->set_flashdata('flash_message', 'materi group deleted successfully');
    }

    public function delete_materi_group_sub($id_materi_group_sub = "")
    {
        $this->db->where('id_materi_group_sub', $id_materi_group_sub);
        $this->db->delete('ref_materi_group_sub');
        $this->session->set_flashdata('flash_message', 'materi group sub deleted successfully');
    }

    public function delete_mapel($id_mapel = "")
    {
        $this->db->where('id_mapel', $id_mapel);
        $this->db->delete('ref_mapel');
        $this->session->set_flashdata('flash_message', 'mapel deleted successfully');
    }

	public function delete_level($level_id = "") {
        $this->db->where('id_level', $level_id);
        $this->db->delete('ref_level');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }
	
	public function delete_member($user_id = "") {
        $this->db->where('id_user', $user_id);
        $this->db->delete('ref_user');
        $this->session->set_flashdata('flash_message', get_phrase('user_deleted_successfully'));
    }
	
	public function delete_mentor($mentor_id = "") {
        $this->db->where('id_mentor', $mentor_id);
        $this->db->delete('ref_mentor');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }
	
	public function delete_tipe_payment($mentor_id = "") {
        $this->db->where('id_type_payment', $mentor_id);
        $this->db->delete('ref_type_payment');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }
	
	public function check_duplication_member($action = "", $email = "", $user_id = "") {
        $duplicate_email_check = $this->db->get_where('ref_user', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if($duplicate_email_check->row()->status == 1){
                    return false;
                }else{
                    return 'unverified_user';
                }
            }else {
                return true;
            }
        }elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                }else {
                    return false;
                }
            }else {
                return true;
            }
        }
    }

	public function upload_photo($image_code) {
        if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/photo/'.$image_code.'.jpg');
            $this->session->set_flashdata('flash_message', 'Berhasil');
        }
    }	
	
	public function get_user_photo_url($user_id) {

        $user_profile_image = $this->db->get_where('ref_user', array('id_user' => $user_id))->row('photo');
        if (file_exists('uploads/photo/'.$user_profile_image.'.jpg'))
             return base_url().'uploads/photo/'.$user_profile_image.'.jpg';
        else
            return base_url().'uploads/photo/placeholder.png';
    }
	
}
