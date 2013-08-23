<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {
    public function __construct(){
        parent::__construct();
    }
    
    function index(){
        
		if($this->session->userdata('login')===true){
             $cookie1 = array(
                'name'   => 'username',
                'value'  => NULL,
                'expire' => '86500',
				'path'  => '/',
                'prefix' => 'tangailsharee_',

            );

            $cookie2 = array(
                'name'   => 'password',
                'value'  => NULL,
                'expire' => '86500',
				'path'  => '/',
                'prefix' => 'tangailsharee_',
            );
            $this->input->set_cookie($cookie1);
            $this->input->set_cookie($cookie2);
			
            //$this->removeWishlistlogout();

            $this->session->unset_userdata("login");
            $this->session->unset_userdata("user_id");
			
			
            setcookie('logout',"",(time() - (86400 * 7)),'/');
            setcookie('myusername',"",(time() - (86400 * 7)),'/');
            setcookie('myuserpass',"",(time() - (86400 * 7)),'/');
            setcookie('myuserid',"",(time() - (86400 * 7)),'/');
			
			$this->session->unset_userdata('ref_url');
			$this->session->unset_userdata('display_old_pass_field'); 
	    
			$redirect = (isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'');
                        $base = base_url();
			$this->session->sess_destroy();
			/*
			if($redirect!='')
				redirect($redirect);
			else
				redirect($base);
			*/
			//print_r($this->session->all_userdata());
			//exit(0);
			redirect("","refresh");
        }else{
			//echo "There";
			//exit(0);
			redirect("","refresh");
        }
    }
}
