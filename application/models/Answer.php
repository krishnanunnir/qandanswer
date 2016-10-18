<?php
class Answer extends CI_Model{
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}
	public $answer;
	public $answer_by;
	public $question;
    public function get_entry(){
        $query=$this->db->get('answer');
        return $query->result();
    }

}
?>