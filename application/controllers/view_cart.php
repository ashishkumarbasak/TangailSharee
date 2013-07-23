<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_cart extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
   	 if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isCustomer()){
            	$this->load->vars(array("login_error1"=>TRUE));
                redirect('login','refresh');
            }
        }  else {
            redirect('login','refresh');
        }
    }
    
	function index(){
		
		$this->load->view('view_cart');
	}
}