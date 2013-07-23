<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    
    function index(){
        if($this->session->userdata('login')==true){
            
            setcookie('logout','',time() - (86400 * 7),'/');
			setcookie('myusername','',time() - (86400 * 7),'/');
            setcookie('myuserpass','',time() - (86400 * 7),'/');
			setcookie('myuserid','',time() - (86400 * 7),'/');
            
            $this->session->set_userdata("login",false);
            redirect('admin/login',"refresh");
        }else{
            redirect("admin/login","refresh");
        }
    }
}
