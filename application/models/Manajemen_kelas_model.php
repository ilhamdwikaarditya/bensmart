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
			$this->db->select("a.id_class, nm_class, price, discount, nm_mapel, nm_jenjang, nm_materi_group_sub, group_concat(nm_mentor) nm_mentor");
			$this->db->from('tr_class a');
			$this->db->join('ref_materi_group_sub b', 'a.id_materi_group_sub = b.id_materi_group_sub');
			$this->db->join('ref_jenjang c', 'a.id_jenjang = c.id_jenjang');
			$this->db->join('ref_mapel d', 'a.id_mapel = d.id_mapel');
			$this->db->join('tr_class_mentor e', 'a.id_class = e.id_class', 'left');
			$this->db->group_by('a.id_class');
			$this->db->order_by('a.id_class');
			
			return $this->db->get();
        }
    }
	
	public function get_mentor_kelas($id = 0) {
        
			#$this->db->select("a.id_class, d.id_user, b.id_class_mentor, d.photo, c.nm_mentor");
			$this->db->from('tr_class a');
			$this->db->join('tr_class_mentor b', 'a.id_class = b.id_class');
			$this->db->join('ref_mentor c', 'b.id_mentor = c.id_mentor');
			$this->db->join('ref_user d', 'c.id_user = d.id_user');
			$this->db->where('a.id_class',$id);
			
			return $this->db->get();
        
    }
	
	public function get_mentor($mentor_id = 0) {
		$this->db->select("a.id_mentor, a.id_user, b.fullname");
		$this->db->from("ref_mentor a");
		$this->db->join('ref_user b', 'a.id_user = b.id_user');
        return $this->db->get();
    }

    public function get_materi_section_admin($type_by, $id) {
        if ($type_by == 'class') {
            $this->db->from('tr_class_materi_section a');
			$this->db->where('a.id_class',$id);
			$this->db->where("a.active in ('1', '2', '3')");
			return $this->db->get();
            // return $this->db->get_where('tr_class_materi_section', array('id_class' => $id));
        } elseif ($type_by == 'section') {
            $this->db->from('tr_class_materi_section a');
			$this->db->where('a.id_class_materi_section',$id);
			$this->db->where("a.active in ('1', '2', '3')");
			return $this->db->get();
            // return $this->db->get_where('tr_class_materi_section', array('id_class_materi_section' => $id));
        }
        // return $this->db->get_where('tr_class_materi_section', array('id_class' => $id_class));
    }

    public function get_materi_section($type_by, $id) {
        if ($type_by == 'class') {
            return $this->db->get_where('tr_class_materi_section', array('id_class' => $id));
        } elseif ($type_by == 'section') {
            return $this->db->get_where('tr_class_materi_section', array('id_class_materi_section' => $id));
        }
        // return $this->db->get_where('tr_class_materi_section', array('id_class' => $id_class));
    }

    public function get_materi_detail($type_by, $id) {
        if ($type_by == 'section') {
            return $this->db->get_where('tr_class_materi_detail', array('id_class_materi_section' => $id));
        } elseif ($type_by == 'detail') {
            return $this->db->get_where('tr_class_materi_detail', array('id_class_materi_detail' => $id));
        }
        // return $this->db->get_where('tr_class_materi_detail', array('id_class_materi_section' => $id_class_materi_section));
    }

    public function get_materi_detail_dokumen($type_by, $id) {
        if ($type_by == 'detail') {
            return $this->db->get_where('tr_class_materi_dokumen', array('id_class_materi_detail' => $id));
        } elseif ($type_by == 'dokumen') {
            return $this->db->get_where('tr_class_materi_dokumen', array('id_class_materi_dokumen' => $id));
        }
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
			
			
            $this->db->insert('tr_class_mentor', $data);
            $this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
        
    }

    public function add_materi_section($id_class)
    {
        $data['nm_class_materi_section'] = html_escape($this->input->post('nm_class_materi_section'));
        $data['position'] = html_escape($this->input->post('position'));
        $data['id_class'] = $id_class;
        $this->db->insert('tr_class_materi_section', $data);
        $id_class = $this->db->insert_id();
    }

    public function add_materi_detail($id_class)
    {
        $data['nm_class_materi_detail'] = html_escape($this->input->post('nm_class_materi_detail'));
        $data['position'] = html_escape($this->input->post('position'));
        $data['duration'] = html_escape($this->input->post('duration'));
        $data['url_materi'] = html_escape($this->input->post('url_materi'));
        $data['desc'] = html_escape($this->input->post('desc'));
        $data['id_class_materi_section'] = html_escape($this->input->post('id_class_materi_section'));
        $this->db->insert('tr_class_materi_detail', $data);
        $id_class_materi_section = $this->db->insert_id();
    }

    public function add_materi_detail_dokumen($param1) {

        $data['nm_materi_dokumen'] = html_escape($this->input->post('nm_materi_dokumen'));
        $data['id_class_materi_detail'] = $param1;
        $data['cuser'] = html_escape($this->session->userdata('id_user'));
        $data['file_materi_dokumen'] = html_escape($this->input->post('nm_materi_dokumen'));

        $this->db->insert('tr_class_materi_dokumen', $data);
        $id_class_materi_dokumen = $this->db->insert_id();
        $this->upload_materi_detail_dokumen($data['file_materi_dokumen']);
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

    public function edit_materi_section($id_class_materi_section)
    {
        $data['nm_class_materi_section'] = html_escape($this->input->post('nm_class_materi_section'));
        $data['position'] = html_escape($this->input->post('position'));
        $this->db->where('id_class_materi_section', $id_class_materi_section);
        $this->db->update('tr_class_materi_section', $data);
    }

    public function edit_materi_detail($id_class_materi_detail)
    {
        $data['nm_class_materi_detail'] = html_escape($this->input->post('nm_class_materi_detail'));
        $data['position'] = html_escape($this->input->post('position'));
        $data['duration'] = html_escape($this->input->post('duration'));
        $data['url_materi'] = html_escape($this->input->post('url_materi'));
        $data['desc'] = html_escape($this->input->post('desc'));
        $this->db->where('id_class_materi_detail', $id_class_materi_detail);
        $this->db->update('tr_class_materi_detail', $data);
    }
	
	
	public function delete_manajemen_kelas($class_id = "") {
        $this->db->where('id_class', $class_id);
        $this->db->delete('tr_class');
        $this->session->set_flashdata('flash_message', 'Berhasil dihapus');
    }
	
	public function delete_mentor_manajemen_kelas($mentor_class_id = "") {
        $this->db->where('id_class_mentor', $mentor_class_id);
        $this->db->delete('tr_class_mentor');
        $this->session->set_flashdata('flash_message', 'Berhasil dihapus');
    }
    
    public function delete_materi_section($id_class, $id_class_materi_section)
    {
        $this->db->where('id_class_materi_section', $id_class_materi_section);
        $this->db->from('tr_class_materi_detail');
        $cek_data =  $this->db->count_all_results();
        if ($cek_data > 0) {
            $this->session->set_flashdata('flash_message', 'Gagal, Tidak Bisa Menghapus Section yang Mempunyai Detail');
            redirect(site_url('mentor/manajemen_kelas_form/detmateri_manajemen_kelas_form/'.$id_class));
        } else {
            $this->db->where('id_class_materi_section', $id_class_materi_section);
            $this->db->delete('tr_class_materi_section');
            $this->session->set_flashdata('flash_message', 'Materi Section Berhasil Dihapus');
            redirect(site_url('mentor/manajemen_kelas_form/detmateri_manajemen_kelas_form/'.$id_class));
        }

        // $this->db->where('id_class_materi_section', $id_class_materi_section);
        // $this->db->delete('tr_class_materi_detail');
    }
    
    public function delete_materi_detail($id_class, $id_class_materi_detail)
    {
        $this->db->where('id_class_materi_detail', $id_class_materi_detail);
        $this->db->delete('tr_class_materi_detail');
    }

    public function delete_materi_detail_dokumen($id_class_materi_detail, $id_class_materi_dokumen)
    {
        $this->db->where('id_class_materi_dokumen', $id_class_materi_dokumen);
        $this->db->delete('tr_class_materi_dokumen');
    }

    public function send_materi_detail($id_class, $id_class_materi_detail)
    {
        $data['active'] = '1'; 
        $this->db->where('id_class_materi_detail', $id_class_materi_detail);
        $this->db->update('tr_class_materi_detail', $data);
    }

	public function upload_thumbnail($image_code) {
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != "") {
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/thumbnail_class/'.$image_code.'.jpg');
            $this->session->set_flashdata('flash_message', 'Berhasil');
        }
    }
    
    public function upload_materi_detail_dokumen($dokumen) {
        if (isset($_FILES['file_materi_dokumen']) && $_FILES['file_materi_dokumen']['name'] != "") {
            move_uploaded_file($_FILES['file_materi_dokumen']['tmp_name'], 'uploads/materi_detail_dokumen/'.$dokumen);
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
