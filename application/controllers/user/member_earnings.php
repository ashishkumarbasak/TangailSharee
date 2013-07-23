<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_earnings extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
    	if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isDesigner()){
                redirect('login?flag=false','refresh');
            }
	    else {
		//redirect('user/member_profile/'.$u->id,'refresh');
	    }
        }  else {
            redirect('login?flag=false','refresh');
        }
    }
    
    public function index(){
    	$currency=new Currency();
	$currency->get();
		$user_id=$this->session->userdata('user_id');
    	
		$user=new User($user_id);
		$user->image->get();
		
		$user->address->get();
		
		
		//echo $user->address->city;exit;
    	$this->load->vars(array('user'=>$user,'currencies'=>$currency));
        $this->load->view('user/member_profile');
    }
}