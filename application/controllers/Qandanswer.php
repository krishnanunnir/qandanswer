<?php
class Qandanswer extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('answer');
        $this->load->model('user');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $_SESSION['user']='';
    }
    public function login(){

        $data['query']=$this->user->get_entry();
        $this->load->view('login',$data);
    }
    public function display(){
         if(!isset($_SESSION['user'])){
            redirect('qandanswer/login','refresh');
            
        }
        else{
        $data['user']=$_SESSION['user'];
        $data['query']=$this->answer->get_entry();
        $this->load->view('qanda',$data);
        }

    }
    public function loggedin(){

        $name =$this->input->post('user_name');
        if(!isset($_SESSION['user'])){
            $_SESSION['user']=$name;
            redirect('qandanswer/display','refresh');
        }
        else{
            redirect('qandanswer/display','refresh');
        }

    }
    public function update(){
    	$new_data = $_POST['new_answer'];
    	$prev_data = $_POST['prev_answer'];
		$this->db->set('answer',$new_data);
		$this->db->where('answer',$prev_data);
		$this->db->update('answer');

    }
}
?>