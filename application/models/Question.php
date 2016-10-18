<?php
class Question extends CI_Model{
	public function __construct(){
			parent::construct();
	}
	public $question;
	public $asked_by;
	public function get_entry(){
        $query=$this->db->get('question');
        return $query->result();
    }
	
}
?>