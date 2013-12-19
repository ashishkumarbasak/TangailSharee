<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contest_register extends MY_Controller {
    public $validation = array(
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'required|min_length[6]|matches[passwordconf]'
                  ),
              array(
                     'field'   => 'passwordconf',
                     'label'   => 'Re-type Password',
                     'rules'   => 'required'
                  ),
              array(
                     'field'   => 'email',
                     'label'   => 'e-mail',
                     'rules'   => 'required|valid_email'
                  ),
            );
    public function __construct(){
        parent::__construct();
    }
    
    
    
    function index(){
        $u = new User();

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $this->input->post('username');
        $u->password = $this->input->post('password');
        $u->confirm_password = $this->input->post('passwordconf');
        $u->email = $this->input->post('email');
        
		
		$wp_u = new Wp_users();
		$wp_u->user_login 		= $this->input->post('username');
        $wp_u->user_pass  		= md5($this->input->post('password'));
        $wp_u->user_nicename  	= $this->input->post('username');
        $wp_u->user_email  		= $this->input->post('email');
		$wp_u->user_registered  = "2011-12-08 06:40:01";
		$wp_u->user_status  	= 0;
		$wp_u->display_name 	= $this->input->post('username');
		
		
        if($this->input->post('notification')){
            $u->notification='1';
        }  else {
            $u->notification='0';
        }
        
		$u->is_active='1';
        // Attempt to save the user into the database
		
        if ($u->save())
        {
        	if ($this->input->post('terms_conditions') && $this->input->post('privacy_policy')){
				$wp_u->save();
				
	        	$role=new Role();
	        	$role->where('name','Customers')->get();
	        	$u->save($role);
	        	
	        	
	        	if($u->notification==1){
		        	$config['mailtype']='html';
		        	$this->load->library('email',$config);
		
					$this->email->from('admin@tangail-sharee.com', 'tangail-sharee Admin');
					$this->email->to($u->email);
					
					$this->email->subject('Registration');
					$this->email->message($this->load->view('email','',TRUE));
					$this->email->send();
	        	}
				
				
	        	
	            $this->session->set_userdata("login",true);
	            $this->session->set_userdata("user_id",$u->id);
	            $this->load->view("read_guidelines");
        	}
		}
        else
        {
        	$this->load->vars(array('errors'=>$u->error->all));
        	if (!$this->input->post('terms_conditions')){
            	$this->load->vars(array("terms"=>TRUE));
        	}
        	if (!$this->input->post('privacy_policy')){
        		$this->load->vars(array("privacy"=>TRUE));
        	}
            $this->load->view("contest_login");
        }

    }
    
    
    
    /*
    public function index(){
        $this->form_validation->set_rules($this->validation);
        
        if($this->form_validation->run()==false){
            $this->load->vars(array("error"=>"register_error"));
            $this->load->view("user/login_register");
        }else{
            if(isset($_POST['user_register'])){
                $data=elements(array("username","password","email","notification"), $_POST, false);
                if($data['notification']){
                    $data['notification']='1';
                }  else {
                    $data['notification']='0';
                }
                $data['role']="user";
                $data['password']=md5($data['password']);
                
                if($this->checkUsernameEmail($data)){
                     $user_id=$this->user_model->insertUser($data);
                     if($user_id){
                        $this->session->set_userdata("login",true);
                        $this->session->set_userdata("user_id",$user_id);
                        redirect("home","refresh");
                     }else{
                        redirect("home","refresh"); 
                     }
                }
               
            }  else {
                redirect("home","refresh");
            }
        }
    }
    
    */
    
    function checkUsernameEmail($data){
        $error=false;
        if(!$this->user_model->checkUserEmail($data['email'])){
            $this->form_validation->_error_array[]="you are already registered with this email ID";
            $error=true;
        }
        if(!$this->user_model->checkUsername($data['username'])){
            $this->form_validation->_error_array[]="Username not available";
            $error=true;
        }
        
        if($error){
            $this->load->vars(array("error"=>"register_error"));
            $this->load->view("contest_login");
            return false;
        }
        return true;
    }
    
    
    
    
}