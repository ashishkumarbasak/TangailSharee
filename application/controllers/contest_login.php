<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contest_login extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper("email");
        $this->load->helper('cookie');
    }
    
    
    function index(){
        // Create user object
        $u = new User();

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        if($this->input->cookie('twinne_username') && $this->input->cookie('twinne_password')){
            $u->username = $this->input->cookie('twinne_username');
            $u->password = $this->input->cookie('twinne_password');
        }else{
            $u->username = $this->input->post('username');
            $u->password = $this->input->post('password');
        }
	
        
        //var_dump($this->input->cookie('username'));exit;
        // Attempt to log user in with the data they supplied, using the login function setup in the User model
        // You might want to have a quick look at that login function up the top of this page to see how it authenticates the user
        
        
        if ($u->login())
        {
            $this->session->set_userdata("login",true);
            $this->session->set_userdata("user_id",$u->id);
            $luser = new User($u->id);
            $datestring = "Y-m-d";
            $time = time();
            $now = date($datestring, $time);
            $luser->last_login = $now;
            $luser->save();
            
            $wp_u = new Wp_users();
			
			$wp_u->get_where(array('user_login' => $this->input->post('username')));
			
			if($wp_u->ID == '')
			{
				
				
				$wpuser = $u->username;
				$wppass = $this->input->post('password');
				
				
				$wp_u->user_login 	= $u->username;
				$wp_u->user_pass  	= md5($this->input->post('password'));
				$wp_u->user_nicename  	= $u->username;
				$wp_u->user_email  	= $u->email;
				$wp_u->user_registered  = "2011-12-08 06:40:01";
				$wp_u->user_status  	= 0;
				$wp_u->display_name 	= $u->username;
				
				$wpuserid = $u->id;
				
				
				//print_r($wp_u);
				//die;
				
				$wp_u->save();
				//$wpuserid = $wp_u->ID;
				
				setcookie('myusername',trim(addslashes($wpuser)),time() + (86400 * 7),'/');
                setcookie('myuserpass',trim(addslashes($wppass)),time() + (86400 * 7),'/');
				setcookie('myuserid',trim(addslashes($wpuserid)),time() + (86400 * 7),'/');
				setcookie('logout','logout',time() + (86400 * 7),'/');
				
			}else{
				
				$wpuser = $u->username;
				$wppass = $this->input->post('password');
				$wpuserid = $u->id;
				
				setcookie('myusername',trim(addslashes($wpuser)),time() + (86400 * 7),'/');
				setcookie('myuserpass',trim(addslashes($wppass)),time() + (86400 * 7),'/');
				setcookie('myuserid',trim(addslashes($wpuserid)),time() + (86400 * 7),'/');
				setcookie('logout','logout',time() + (86400 * 7),'/blog/');
				//exit();
			}
            
            
	        if ($this->input->post('remember_me')){
                    $cookie1 = array(
                        'name'   => 'username',
                        'value'  => $u->username,
                        'expire' => '86500',
                        'prefix' => 'twinne_',
                        
                    );
                    
                    $cookie2 = array(
                        'name'   => 'password',
                        'value'  => $this->input->post('password'),
                        'expire' => '86500',
                        'prefix' => 'twinne_',
                    );
                    $this->input->set_cookie($cookie1);
                    $this->input->set_cookie($cookie2);
                    
	        }
           
            redirect('new_contest/readGuide');

        }
        else
        {
       		if (isset($not_login1)){
            	echo json_decode();
            }
            $this->form_validation->_error_array[0]="Username and/or Password doesn't match.";
            $this->load->vars(array("error"=>"login_error"));
            
            $this->load->view("contest_login");
        }
        
        

    }
}