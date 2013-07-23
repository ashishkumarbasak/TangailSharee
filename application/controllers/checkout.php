<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
   		 if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isCustomer()){
            	$this->load->vars(array('login_error'=>TRUE));
                redirect('login','refresh');
            }
        }  else {
        	redirect('login','refresh');
        }
    }
    
    public function index(){
    
        $this->load->view('checkout');
    }
    
    	
}