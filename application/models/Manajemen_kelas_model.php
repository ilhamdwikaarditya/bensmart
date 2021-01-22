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
            return $this->db->get_where('tr_class', array('id_class' => $id));
        }else{
			/* $this->db->from("tr_class a");
			$this->db->join('ref_materi_group_sub b', 'a.id_materi_group_sub = b.id_materi_group_sub', 'left');
			$this->db->join('ref_jenjang c', 'a.id_jenjang = c.id_jenjang', 'left');
			$this->db->join('ref_mapel d', 'a.id_mapel = d.id_mapel', 'left');
			$this->db->order_by('id_class');
			 */
			//$this->db->select("nm_class, price, discount, nm_mapel, nm_jenjang, nm_materi_group_sub, nm_mentor");
			$this->db->from("tr_class a");
			$this->db->join('ref_materi_group_sub b', 'a.id_materi_group_sub = b.id_materi_group_sub');
			$this->db->join('ref_jenjang c', 'a.id_jenjang = c.id_jenjang');
			$this->db->join('ref_mapel d', 'a.id_mapel = d.id_mapel');
			//$this->db->join('tr_class_mentor e', 'a.id_class = e.id_class', 'left');
			$this->db->order_by('id_class');
			
			return $this->db->get();
        }
    }
	
	public function get_mentor($mentor_id = 0) {
		$this->db->select("a.id_mentor, a.id_user, b.fullname");
		$this->db->from("ref_mentor a");
		$this->db->join('ref_user b', 'a.id_user = b.id_user');
        return $this->db->get();
    }
	
	public function add_manajemen_kelas() {

            $data['nm_class'] = html_escape($this->input->post('nm_class'));
            $data['desc_class'] = html_escape($this->input->post('desc_class'));
            $data['price'] = html_escape($this->input->post('price'));
            $data['discount'] = html_escape($this->input->post('discount'));
            $data['discount_price'] = html_escape($this->input->post('price')) - html_escape($this->input->post('discount'));
            $data['id_mapel'] = html_escape($this->input->post('id_mapel'));
            $data['id_jenjang'] = html_escape($this->input->post('id_jenjang'));
            $data['id_materi_group_sub'] = html_escape($this->input->post('id_materi_group_sub'));
            $data['cuser'] = html_escape($this->session->userdata('id_user'));
            $data['thumbnail'] = md5(rand(10000, 10000000));

            $this->db->insert('tr_class', $data);
            $user_id = $this->db->insert_id();
            $this->upload_thumbnail($data['thumbnail']);
            $this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
    }
	
	public function add_mentor_manajemen_kelas($class_id = "") { // Admin does this editing
        
			$data['id_class']  = html_escape($class_id);
            $data['id_mentor'] = html_escape($this->input->post('id_mentor'));
            $data['nm_mentor'] = html_escape($this->input->post('nm_mentor'));
            $data['cuser']     = html_escape($this->session->userdata('id_user'));
			
			$this->db->where('id_class', $class_id);
			$this->db->delete('tr_class_mentor');
            $this->db->insert('tr_class_mentor', $data);
            $this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
        
    }
	
	public function edit_manajemen_kelas($class_id = "") { // Admin does this editing
        
            $data['nm_class'] = html_escape($this->input->post('nm_class'));
            $data['desc_class'] = html_escape($this->input->post('desc_class'));
            $data['price'] = html_escape($this->input->post('price'));
            $data['discount'] = html_escape($this->input->post('discount'));
            $data['discount_price'] = html_escape($this->input->post('price')) - html_escape($this->input->post('discount'));
            $data['id_mapel'] = html_escape($this->input->post('id_mapel'));
            $data['id_jenjang'] = html_escape($this->input->post('id_jenjang'));
            $data['id_materi_group_sub'] = html_escape($this->input->post('id_materi_group_sub'));
            $data['cuser'] = $this->session->userdata('id_user');
			
			if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != "") {
                unlink('uploads/thumbnail_class/' . $this->db->get_where('tr_classx', array('id_class' => $class_id))->row('thumbnail').'.jpg');
                $data['thumbnail'] = md5(rand(10000, 10000000));
            }

            
            $this->db->where('id_class', $class_id);
            $this->db->update('tr_class', $data);
            $this->upload_thumbnail($data['thumbnail']);
            $this->session->set_flashdata('flash_message', 'Berhasil dirubah');
        
    }
	
	
	public function delete_manajemen_kelas($class_id = "") {
        $this->db->where('id_class', $class_id);
        $this->db->delete('tr_class');
        $this->session->set_flashdata('flash_message', 'Berhasil dihapus');
    }
	

	public function upload_thumbnail($image_code) {
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != "") {
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/thumbnail_class/'.$image_code.'.jpg');
            $this->session->set_flashdata('flash_message', 'Berhasil');
        }
    }	
	
	public function get_thumbnail_url($user_id) {

        $user_profile_image = $this->db->get_where('tr_class', array('id_class' => $user_id))->row('thumbnail');
        if (file_exists('uploads/thumbnail_class/'.$user_profile_image.'.jpg'))
             return base_url().'uploads/thumbnail_class/'.$user_profile_image.'.jpg';
        else
            return base_url().'uploads/photo/placeholder.png';
    }
	
}
