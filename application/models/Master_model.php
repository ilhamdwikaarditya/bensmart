<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function get_admin_details()
    {
        return $this->db->get_where('users', array('role_id' => 1));
    }

    public function get_user($user_id = 0)
    {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
        }
        $this->db->where('role_id', 2);
        return $this->db->get('users');
    }

    public function get_all_user($id_user = 0)
    {
        if ($id_user > 0) {
            $this->db->where('id_user', $id_user);
        }
        return $this->db->get('ref_user');
    }

    public function get_all_jenjang($id_jenjang = 0)
    {
        if ($id_jenjang > 0) {
            $this->db->where('id_jenjang', $id_jenjang);
        }
        return $this->db->get('ref_jenjang');
    }
	
	public function get_all_kota($id_kota = 0)
    {
        if ($id_kota > 0) {
            $this->db->where('id_kab', $id_kota);
        }
        return $this->db->get('ref_kab');
    }

    public function get_all_materi_group($id_materi_group = 0)
    {
        if ($id_materi_group > 0) {
            $this->db->where('id_materi_group', $id_materi_group);
        }

        $this->db->from("ref_materi_group a");
        $this->db->join('ref_jenjang b', 'a.id_jenjang = b.id_jenjang', 'left');
        $this->db->order_by('a.id_materi_group');
        return $this->db->get();
    }

    public function get_all_materi_group_sub($id_materi_group_sub = 0)
    {
        if ($id_materi_group_sub > 0) {
            $this->db->where('id_materi_group_sub', $id_materi_group_sub);
        }

        $this->db->from("ref_materi_group_sub a");
        $this->db->join('ref_materi_group b', 'a.id_materi_group = b.id_materi_group', 'left');
        $this->db->join('ref_jenjang c', 'b.id_jenjang = c.id_jenjang', 'left');
        $this->db->order_by('id_materi_group_sub');
        return $this->db->get();
    }

    public function get_all_mapel($id_mapel = 0)
    {
        if ($id_mapel > 0) {
            $this->db->where('id_mapel', $id_mapel);
        }
        return $this->db->get('ref_mapel');
    }

    public function get_jenjang($param1 = "")
    {
        if ($param1 != "") {
            $this->db->where('id_jenjang', $param1);
        }
        return $this->db->get('ref_jenjang');
    }

    public function get_materi_group($param1 = "")
    {
        if ($param1 != "") {
            $this->db->where('id_materi_group', $param1);
        }

        $this->db->from("ref_materi_group a");
        $this->db->join('ref_jenjang b', 'a.id_jenjang = b.id_jenjang', 'left');
        return $this->db->get();
    }

    public function get_materi_group_by_id($id_materi_group)
    {
        $this->db->from("ref_materi_group a");
        $this->db->join('ref_jenjang b', 'a.id_jenjang = b.id_jenjang', 'left');
        $this->db->where('a.id_materi_group', $id_materi_group);
        return $this->db->get();
    }

    public function get_materi_group_id($id = "")
    {
        $materi_details = $this->db->get_where('ref_materi_group', array('id_materi_group' => $id))->row_array();
        return $materi_details['id_materi_group'];
    }

    public function get_materi_group_sub_by_id($id_materi_group_sub)
    {
        $this->db->from("ref_materi_group_sub a");
        $this->db->join('ref_materi_group b', 'a.id_materi_group = b.id_materi_group', 'left');
        $this->db->where('a.id_materi_group_sub', $id_materi_group_sub);
        return $this->db->get();
    }

    public function get_level($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('ref_level', array('id_level' => $id, 'is_instructor' => 1));
        } else {
            return $this->db->get_where('ref_level');
        }
    }
	
	public function get_testimoni($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('ref_testimoni', array('id_testimoni' => $id));
        } else {
            return $this->db->get_where('ref_testimoni');
        }
    }
	
	public function get_bank($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('ref_bank', array('id_bank' => $id));
        } else {
            return $this->db->get_where('ref_bank');
        }
    }

    public function get_member($user_id = 0)
    {
        $this->db->where('id_level =', 3);
        return $this->db->get('ref_user');
    }

    public function get_mentor($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('ref_mentor', array('id_mentor' => $id));
        } else {
            $this->db->select('a.*, b.firstname, b.lastname, b.email, b.phone, b.active');
            $this->db->from('ref_mentor a');
            $this->db->join('ref_user b', 'a.id_user = b.id_user');
            return $this->db->get();
        }
    }

    public function get_mentor_profile($id = 0)
    {
        $this->db->select('a.*, b.id_user, b.firstname, b.lastname, b.email, b.phone, b.address');
        $this->db->from('ref_mentor a');
        $this->db->join('ref_user b', 'a.id_user = b.id_user');
        $this->db->where('b.id_user', $this->session->userdata('id_user'));
        return $this->db->get();
    }

    public function get_tipe_payment($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('ref_type_payment', array('id_payment_type' => $id));
        } else {
            return $this->db->get_where('ref_type_payment');
        }
    }

    public function add_jenjang($is_instructor = false)
    {
        $data['nm_jenjang'] = html_escape($this->input->post('nm_jenjang'));
        $data['kd_jenjang'] = html_escape($this->input->post('kd_jenjang'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->insert('ref_jenjang', $data);
        $id_jenjang = $this->db->insert_id();
        // $this->upload_user_image($data['image']);
        $this->session->set_flashdata('flash_message', 'Berhasil Ditambahkan');
    }

    public function add_materi_group($is_instructor = false)
    {
        $data['nm_materi_group'] = html_escape($this->input->post('nm_materi_group'));
        $data['id_jenjang'] = html_escape($this->input->post('id_jenjang'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->insert('ref_materi_group', $data);
        $id_materi_group = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', 'Berhasil Ditambahkan');
    }

    public function add_materi_group_sub($is_instructor = false)
    {
        $data['nm_materi_group_sub'] = html_escape($this->input->post('nm_materi_group_sub'));
        $data['kd_materi_group_sub'] = html_escape($this->input->post('kd_materi_group_sub'));
        $data['id_materi_group'] = html_escape($this->input->post('id_materi_group'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->insert('ref_materi_group_sub', $data);
        $id_materi_group_sub = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', 'Berhasil Ditambahkan');
    }

    public function add_mapel($is_instructor = false)
    {
        $data['nm_mapel'] = html_escape($this->input->post('nm_mapel'));
        $data['kd_mapel'] = html_escape($this->input->post('kd_mapel'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->insert('ref_mapel', $data);
        $id_mapel = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', 'Berhasil Ditambahkan');
    }

    public function add_level()
    {

        $data['nm_level'] = html_escape($this->input->post('nm_level'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->insert('ref_level', $data);
        $level_id = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
    }
	
	public function add_testimoni()
    {
        $data['nm_testimoni'] = html_escape($this->input->post('nm_testimoni'));
        $data['desc_testimoni'] = html_escape($this->input->post('desc_testimoni'));
        $data['cuser'] = $this->session->userdata('id_user');
		$data['photo'] = md5(rand(10000, 10000000));

        $this->db->insert('ref_testimoni', $data);
        $testimoni_id = $this->db->insert_id();
        $this->upload_photo_testimoni($data['photo']);
		$this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
    }
	
	public function add_bank()
    {
        $data['bank'] = html_escape($this->input->post('bank'));
        $data['kd_bank'] = html_escape($this->input->post('kd_bank'));
        $data['no_rek'] = html_escape($this->input->post('no_rek'));
        $data['nm_rek'] = html_escape($this->input->post('nm_rek'));
		$data['photo'] = md5(rand(10000, 10000000));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->insert('ref_bank', $data);
        $testimoni_id = $this->db->insert_id();
        $this->upload_photo_bank($data['photo']);
		$this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
    }

    public function add_member()
    {
        $validity = $this->check_duplication_member('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        } else {
            $data['firstname'] = html_escape($this->input->post('firstname'));
            $data['lastname'] = html_escape($this->input->post('lastname'));
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

    public function add_mentor()
    {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }else {
            $data['id_user'] = html_escape($this->input->post('id_user'));
            $data['firstname'] = html_escape($this->input->post('firstname'));
            $data['lastname'] = html_escape($this->input->post('lastname'));
            $data['phone'] = html_escape($this->input->post('phone'));
            $data['address'] = html_escape($this->input->post('address'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $data['status_verification'] = '1';
            // $data['cuser'] = $this->session->userdata('id_user');
            $this->db->insert('ref_user', $data);
            $user_id = $this->db->insert_id();
    
            $id_user = $this->db->get_where('ref_user', array('email' => html_escape($this->input->post('email'))))->row('id_user');
            
            $datas['id_user'] = $id_user;
            $datas['bio']      = html_escape($this->input->post('bio'));
            $datas['quotes']  = html_escape($this->input->post('quotes'));
            // $datas['cuser'] = $this->session->userdata('id_user');
            $this->db->insert('ref_mentor', $datas);
            $mentor_id = $this->db->insert_id();
    
            $this->session->set_flashdata('flash_message', 'Berhasil ditambahkan');
        }
    }

    public function add_tipe_payment()
    {

        $data['nm_type_payment'] = html_escape($this->input->post('nm_type_payment'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->insert('ref_type_payment', $data);
        $mentor_id = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', 'Berhasil Ditambahkan');
    }

    public function edit_jenjang($id_jenjang = "")
    { // Admin does this editing
        $data['nm_jenjang'] = html_escape($this->input->post('nm_jenjang'));
        $data['kd_jenjang'] = html_escape($this->input->post('kd_jenjang'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->where('id_jenjang', $id_jenjang);
        $this->db->update('ref_jenjang', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Diubah');
    }

    public function edit_materi_group($id_materi_group = "")
    {
        $data['nm_materi_group'] = html_escape($this->input->post('nm_materi_group'));
        $data['id_jenjang'] = html_escape($this->input->post('id_jenjang'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->where('id_materi_group', $id_materi_group);
        $this->db->update('ref_materi_group', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Diubah');
    }

    public function edit_materi_group_sub($id_materi_group_sub = "")
    {
        $data['nm_materi_group_sub'] = html_escape($this->input->post('nm_materi_group_sub'));
        $data['kd_materi_group_sub'] = html_escape($this->input->post('kd_materi_group_sub'));
        $data['id_materi_group'] = html_escape($this->input->post('id_materi_group'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->where('id_materi_group_sub', $id_materi_group_sub);
        $this->db->update('ref_materi_group_sub', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Diubah');
    }

    public function edit_mapel($id_mapel = "")
    {
        $data['nm_mapel'] = html_escape($this->input->post('nm_mapel'));
        $data['kd_mapel'] = html_escape($this->input->post('kd_mapel'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->where('id_mapel', $id_mapel);
        $this->db->update('ref_mapel', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Diubah');
    }

    public function edit_level($level_id = "")
    { // Admin does this editing
        $data['nm_level'] = html_escape($this->input->post('nm_level'));
        $data['cuser'] = $this->session->userdata('id_user');
        $this->db->where('id_level', $level_id);
        $this->db->update('ref_level', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Diubah');
    }
	
	public function edit_testimoni($testimoni_id = "")
    { // Admin does this editing
        $data['nm_testimoni'] = html_escape($this->input->post('nm_testimoni'));
        $data['desc_testimoni'] = html_escape($this->input->post('desc_testimoni'));
        $data['cuser'] = $this->session->userdata('id_user');
		if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
			unlink('uploads/testimoni/' . $this->db->get_where('ref_testimoni', array('id_testimoni' => $testimoni_id))->row('photo') . '.jpg');
			$data['photo'] = md5(rand(10000, 10000000));
			$this->upload_photo($data['photo']);
		}
		
        $this->db->where('id_testimoni', $testimoni_id);
        $this->db->update('ref_testimoni', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Diubah');
    }
	
	public function edit_bank($bank_id = "")
    { // Admin does this editing
        $data['bank'] = html_escape($this->input->post('bank'));
        $data['kd_bank'] = html_escape($this->input->post('kd_bank'));
        $data['no_rek'] = html_escape($this->input->post('no_rek'));
        $data['nm_rek'] = html_escape($this->input->post('nm_rek'));
        $data['cuser'] = $this->session->userdata('id_user');
		if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
			unlink('uploads/bank/' . $this->db->get_where('ref_bank', array('id_bank' => $bank_id))->row('photo') . '.jpg');
			$data['photo'] = md5(rand(10000, 10000000));
			$this->upload_photo($data['photo']);
		}
		
        $this->db->where('id_bank', $bank_id);
        $this->db->update('ref_bank', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Diubah');
    }

    public function edit_member($id_user = "")
    { // Admin does this editing
        $validity = $this->check_duplication_member('on_update', $this->input->post('email'), $id_user);
        if ($validity) {
            $data['firstname'] = html_escape($this->input->post('firstname'));
            $data['lastname'] = html_escape($this->input->post('lastname'));
            $data['address'] = html_escape($this->input->post('address'));
            $data['phone'] = html_escape($this->input->post('phone'));
            if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                unlink('uploads/user_image/' . $this->db->get_where('ref_user', array('id_user' => $id_user))->row('photo') . '.jpg');
                $data['photo'] = md5(rand(10000, 10000000));
                $this->upload_photo($data['photo']);
            }

            if (isset($_POST['email'])) {
                $data['email'] = html_escape($this->input->post('email'));
            }

            $this->db->where('id_user', $id_user);
            $this->db->update('ref_user', $data);
            $this->session->set_flashdata('flash_message', 'Berhasil diubah');
        } else {
            $this->session->set_flashdata('error_message', 'Email duplikat');
        }
    }

    public function edit_mentor($id_mentor = "")
    { // Admin does this editing
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $this->input->post('id_user'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }else {
            $data['firstname'] = html_escape($this->input->post('firstname'));
            $data['lastname'] = html_escape($this->input->post('lastname'));
            $data['phone'] = html_escape($this->input->post('phone'));
            $data['address'] = html_escape($this->input->post('address'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $data['status_verification'] = '1';
            // $data['cuser'] = $this->session->userdata('id_user');
            $this->db->where('id_user', html_escape($this->input->post('id_user')));
            $this->db->update('ref_user', $data);
    
            $datas['bio']      = html_escape($this->input->post('bio'));
            $datas['quotes']  = html_escape($this->input->post('quotes'));
            // $datas['cuser'] = $this->session->userdata('id_user');
            $this->db->where('id_mentor', $id_mentor);
            $this->db->update('ref_mentor', $datas);
            
            $this->session->set_flashdata('flash_message', 'Berhasil Diubah');
        }
    }

    public function edit_mentor_profile($id_user = "")
    { // Admin does this editing
        $data['firstname'] = html_escape($this->input->post('firstname'));
        $data['lastname'] = html_escape($this->input->post('lastname'));
        // $data['email'] = html_escape($this->input->post('email'));
        $data['phone'] = html_escape($this->input->post('phone'));
        $data['address'] = html_escape($this->input->post('address'));

        if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
            unlink('uploads/user_image/' . $this->db->get_where('ref_user', array('id_user' => $id_user))->row('photo') . '.jpg');
            $data['photo'] = md5(rand(10000, 10000000));
            $this->upload_photo($data['photo']);
        }

        $this->db->where('id_user', $id_user);
        $this->db->update('ref_user', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Dirubah');
    }

    public function edit_mentor_bio($id_user = "")
    { // Admin does this editing
        $data['quotes']  = html_escape($this->input->post('quotes'));
        $data['bio']      = html_escape($this->input->post('bio'));

        $this->db->where('id_user', $id_user);
        $this->db->update('ref_mentor', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Dirubah');
    }

    public function edit_tipe_payment($mentor_id = "")
    { // Admin does this editing
        $data['nm_type_payment'] = html_escape($this->input->post('nm_type_payment'));
        $data['cuser'] = $this->session->userdata('id_user');

        $this->db->where('id_type_payment', $mentor_id);
        $this->db->update('ref_type_payment', $data);
        $this->session->set_flashdata('flash_message', 'Berhasil Dirubah');
    }

    public function delete_jenjang($id_jenjang = "")
    {
        $this->db->where('id_jenjang', $id_jenjang);
        $this->db->delete('ref_jenjang');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }

    public function delete_materi_group($id_materi_group = "")
    {
        $this->db->where('id_materi_group', $id_materi_group);
        $this->db->delete('ref_materi_group');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }

    public function delete_materi_group_sub($id_materi_group_sub = "")
    {
        $this->db->where('id_materi_group_sub', $id_materi_group_sub);
        $this->db->delete('ref_materi_group_sub');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }

    public function delete_mapel($id_mapel = "")
    {
        $this->db->where('id_mapel', $id_mapel);
        $this->db->delete('ref_mapel');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }

    public function delete_level($level_id = "")
    {
        $this->db->where('id_level', $level_id);
        $this->db->delete('ref_level');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }
	
	public function delete_testimoni($testimoni_id = "")
    {
        $this->db->where('id_testimoni', $testimoni_id);
        $this->db->delete('ref_testimoni');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }
	
	public function delete_bank($bank_id = "")
    {
        $this->db->where('id_bank', $bank_id);
        $this->db->delete('ref_bank');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }

    public function delete_member($id_user = "")
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('ref_user', array('active' => '2'));
        $this->session->set_flashdata('flash_message', 'Berhasil Di Non Aktifkan');
    }

    public function active_member($id_user = "")
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('ref_user', array('active' => '1'));
        $this->session->set_flashdata('flash_message', 'Berhasil Di Aktifkan');
    }

    public function delete_mentor($id_user = "")
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('ref_user', array('active' => '2'));
        $this->session->set_flashdata('flash_message', 'Berhasil Di Non Aktifkan');
    }

    public function active_mentor($id_user = "")
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('ref_user', array('active' => '1'));
        $this->session->set_flashdata('flash_message', 'Berhasil Di Aktifkan');
    }

    public function delete_tipe_payment($mentor_id = "")
    {
        $this->db->where('id_type_payment', $mentor_id);
        $this->db->delete('ref_type_payment');
        $this->session->set_flashdata('flash_message', 'Berhasil Dihapus');
    }

    public function check_duplication_member($action = "", $email = "", $id_user = "")
    {
        $duplicate_email_check = $this->db->get_where('ref_user', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->status == 1) {
                    return false;
                } else {
                    return 'unverified_user';
                }
            } else {
                return true;
            }
        } elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id_user == $id_user) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

    public function upload_photo($image_code)
    {
        if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/user_image/' . $image_code . '.jpg');
            $this->session->set_flashdata('flash_message', 'Berhasil');
        }
    }
	
	public function upload_photo_testimoni($image_code)
    {
        if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/testimoni/' . $image_code . '.jpg');
            $this->session->set_flashdata('flash_message', 'Berhasil');
        }
    }
	
	public function upload_photo_bank($image_code)
    {
        if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/bank/' . $image_code . '.png');
            $this->session->set_flashdata('flash_message', 'Berhasil');
        }
    }

    public function get_user_photo_url($user_id)
    {

        $user_profile_image = $this->db->get_where('ref_user', array('id_user' => $user_id))->row('photo');
        if (file_exists('uploads/user_image/' . $user_profile_image . '.jpg'))
            return base_url() . 'uploads/user_image/' . $user_profile_image . '.jpg';
        else
            return base_url() . 'uploads/user_image/placeholder.png';
    }
	
	public function get_testimoni_photo_url($testimoni_id)
    {

        $testimoni_profile_image = $this->db->get_where('ref_testimoni', array('id_testimoni' => $testimoni_id))->row('photo');

		if (file_exists('uploads/testimoni/' . $testimoni_profile_image . '.jpg'))
            return base_url() . 'uploads/testimoni/' . $testimoni_profile_image . '.jpg';
        else
            return base_url() . 'uploads/testimoni/placeholder.png';
    }
	
	public function get_bank_photo_url($bank_id)
    {

        $bank_profile_image = $this->db->get_where('ref_bank', array('id_bank' => $bank_id))->row('photo');

		if (file_exists('uploads/bank/' . $bank_profile_image . '.png'))
            return base_url() . 'uploads/bank/' . $bank_profile_image . '.png';
        else
            return base_url() . 'uploads/bank/placeholder.png';
    }

    public function check_duplication($action = "", $email = "", $id_user = "") {
        $duplicate_email_check = $this->db->get_where('ref_user', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if($duplicate_email_check->row()->status_verification == 1){
                    return false;
                }else{
                    return 'unverified_user';
                }
            }else {
                return true;
            }
        }elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id_user == $id_user) {
                    return true;
                }else {
                    return false;
                }
            }else {
                return true;
            }
        }
    }

    public function change_password($id_user) {
        $data = array();
        if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
            $user_details = $this->get_all_user($id_user)->row_array();
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
                $data['password'] = sha1($new_password);
            }else {
                $this->session->set_flashdata('error_message', get_phrase('mismatch_password'));
                return;
            }
        }

        $this->db->where('id_user', $id_user);
        $this->db->update('ref_user', $data);
        $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
    }

    function filter_class($selected_jenjang = "", $selected_materi = "", $selected_materisub = "", $selected_price = "", $selected_rating = "")
    {
        //echo $selected_materi_id.' '.$selected_price.' '.$selected_level.' '.$selected_language.' '.$selected_rating;
        $this->db->select('a.*, b.kd_jenjang');
        $this->db->from('tr_class a');
        $this->db->join('ref_jenjang b','a.id_jenjang = b.id_jenjang','left');
        
        if ($selected_jenjang != "all") {
            $this->db->where("b.id_jenjang = '$selected_jenjang'");
        }

        if ($selected_materi != "all") {
            $this->db->where("a.id_materi_group = '$selected_materi'");
        }

        if ($selected_materisub != "all") {
            $this->db->where("a.id_materi_group_sub = '$selected_jenjang'");
        }

        // if ($selected_price != "all") {
        //     if ($selected_price == "paid") {
        //         $this->db->where('is_free_course', null);
        //     } elseif ($selected_price == "free") {
        //         $this->db->where('is_free_course', 1);
        //     }
        // }

        // if ($selected_level != "all") {
        //     $this->db->where('id_jenjang', $selected_level);
        // }

        $this->db->where('a.active', '1');
        // $courses = $this->db->get('tr_class')->result_array();
        $courses = $this->db->get()->result_array();
        return array();
    }

    public function get_ratings($ratable_type = "", $ratable_id = "", $is_sum = false)
    {
        if ($is_sum) {
            $this->db->select_sum('rating');
            return $this->db->get_where('rating', array('ratable_type' => $ratable_type, 'ratable_id' => $ratable_id));
        } else {
            return $this->db->get_where('rating', array('ratable_type' => $ratable_type, 'ratable_id' => $ratable_id));
        }
    }
}
