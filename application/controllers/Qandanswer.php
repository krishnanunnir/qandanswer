<?php
class Qandanswer extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('answer');
        $this->load->model('user');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');

    }
    public function login(){
        if(!isset($_SESSION['user'])){
            $this->load->view('login');
        }
        else{
            redirect('qandanswer/display');
        }
    }
    public function display(){
        if(!isset($_SESSION['user'])){
            redirect('qandanswer/login');
        }
        else{
        
        $data['user']=$_SESSION['user'];
        $data['query']=$this->answer->get_entry();
        $this->load->view('qanda',$data);
        }

    }
    public function loggedin(){
        $name =$_POST['user_name'];
        $_SESSION['user']=$name;
        redirect('qandanswer/display');
    }

    public function update(){
    	$new_data = $_POST['new_answer'];
    	$prev_data = $_POST['prev_answer'];
		$this->db->set('answer',$new_data);
		$this->db->where('answer',$prev_data);
		$this->db->update('answer');

    }
    public function add_data(){
        $data['answer']=$_POST['new_answer'];
        $data['answer_by']=$_POST['answer_by'];
        $data['question']=$_POST['question'];
        $this->db->insert('answer',$data);
        redirect('qandanswer/display');
    }
    public function logout(){
        session_destroy();
        redirect('qandanswer/login');
    }
    public function add_question(){
        $data['user']=$_SESSION['user'];
        $this->load->view("new_question",$data);
    }
    public function added_question(){
        $data['question']=$_POST['new_question'];
        $data['asked_by']=$_POST['asked_by'];

        $this->db->insert('question',$data);
        redirect('qandanswer/display');
    }
}
?>
