<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index($user_id){
    	$user=new User($user_id);
    	//echo $user->address->city;
    	$this->load->vars(array('user'=>$user));
        $this->load->view('user/profile');
    }

    
}
