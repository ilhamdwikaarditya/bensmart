<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apiauth_model extends CI_Model
{

	// constructor
	function __construct()
	{
		parent::__construct();
		/*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}

	
	public function login($email, $password) {
        $this->db->select('*');
		$this->db->from('ref_user');
		$this->db->where('email', $email);
		$this->db->where('password', sha1($password));
		$query = $this->db->get();
        if ($query->num_rows() == 1) {
            $result = $query->result();
            return $result;
        }
        return false;
	}
	
	public function signup($firstname,$lastname,$phone,$address,$id_kota,$id_jenjang,$email,$password,$repassword) {

		$this->db->insert('ref_user', $data);
        $query = $this->db->insert_id();
        if ($this->db->affected_rows() == 1) {
            return $query;
        }
        return false;
	}
	
	public function getuserdata($id_user) {
        $this->db->select('*');
		$this->db->from('ref_user');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
        if ($query->num_rows() == 1) {
            $result = $query->result();
            return $result;
        }
        return false;
	}

	public function emailverification($email,$verify_code) {
        $this->db->select('*');
		$this->db->from('ref_user');
		$this->db->where('email', $email);
		$this->db->where('verification_code', $verify_code);
		$query = $this->db->get();
        if ($query->num_rows() == 1) {
            $result = $query->result();
            return $result[0]->id_user;
        }
        return false;
	}
	
}
