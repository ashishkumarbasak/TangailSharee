<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
	
        
    }
    
     function index()
	 {
     	$email = $this->input->post('email');
     	$u = new User();
     	$u->where('email',$email)->get();
     	$str = randomString(6);
     	$u->password_request_code = md5($str);
     	
     	if($u->save())
		{
     		$config['mailtype']='html';
	        $this->load->library('email',$config);
	
			$this->email->from('info@twinne.com', 'Twinne');
			$this->email->to($u->email);
			
			$recover_pass_url = base_url()."user/changepassword/index/".md5($u->id)."/".md5($str);
			$this->email->subject('Reset your password');
			$this->email->message($this->load->view('email1',array('recover_pass_url'=>$recover_pass_url),TRUE));
			$this->email->send();
     	}
		
		$this->load->vars(array('msg'=>TRUE));
     	$this->load->view('user/login_register');
     	
     }
}