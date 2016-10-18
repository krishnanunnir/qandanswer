<?php
class User extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public $firstname;
	public $lastname;
	public $email;
	public function get_entry(){
        $query=$this->db->get('user');
        return $query->result();
    }
}
?>