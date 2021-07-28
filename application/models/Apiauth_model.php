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
		$this->db->where('password', md5($password));
		$query = $this->db->get();
        if ($query->num_rows() == 1) {
            $result = $query->result();
            return $result[0]->id_user;
        }
        return false;
    }
	
}
