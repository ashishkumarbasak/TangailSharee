<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper("email");
        $this->load->helper('cookie');
		$this->load->model('facebook_model');
		//$this->load->model('user_model');
		if($this->session->userdata("login")){
			redirect("user/member_profile/index/".$this->session->userdata('user_id'),"refresh"); 
		}
		
		//code for currency change
        if(isset($_COOKIE["c"]))
           $pref_currency_type = $_COOKIE["c"];
        else
           $pref_currency_type = "GBP";   
        $this->load->vars(array('pref_currency_type'=>$pref_currency_type));
    }
    
    
    function index()
	{
	 	// Create user object
		//$this->session->sess_destroy();
		//print_r($this->session->all_userdata());
       	$u = new User();
	   	$cookie_login_is_valid = false;
        if($this->input->cookie('twinne_username') && $this->input->cookie('twinne_password'))
		{
            $u->username = $this->input->cookie('twinne_username');
            $u->password = $this->input->cookie('twinne_password');
        }else
		{
            $u->username = $this->input->post('username');
            $u->password = $this->input->post('password');
        }
        
		//$current_url= $this->input->post('current_loc');
		$current_url= $this->session->userdata('ref_url');
		$query= $this->input->post('query_str');
		
		if($this->session->userdata('ref_url'))
		{
			$ref = $this->session->userdata('ref_url');
		}
		//$ref_url = $this->input->post('ref_url');
		$ref_url = $this->session->userdata('ref_url');
        
        //if($this->input->cookie('twinne_username')!=NULL && $this->input->cookie('twinne_password'))
        //{
        	//$this->load->model('user');
        	//$cookie_login_is_valid = $this->user->is_valid_login($this->input->cookie('twinne_username'),$this->input->cookie('twinne_password'));
        	
        //}
        
        if ($u->login())
        {
            $this->session->set_userdata("login",true);
            $this->session->set_userdata("user_id",$u->id);
            $luser = new User($u->id);
            $datestring = "Y-m-d";
            $time = time();
            $now = date($datestring, $time);
            $luser->last_login = date("Y-m-d");
            $luser->save();
           
			$wp_u = new Wp_users();
			
			$wp_u->get_where(array('user_login' => $this->input->post('username')));
			
			if($wp_u->ID == '')
			{
				$wpuser = $u->username;
				$wppass = $this->input->post('password');
				
				$wp_u->user_login 		= $u->username;
				$wp_u->user_pass  		= md5($this->input->post('password'));
				$wp_u->user_nicename  	= $u->username;
				$wp_u->user_email  		= $u->email;
				$wp_u->user_registered  = "2011-12-08 06:40:01";
				$wp_u->user_status  	= 0;
				$wp_u->display_name 	= $u->username;
				
				$wpuserid = $u->id;
				
				$wp_u->save();
				
				setcookie('myusername',trim(addslashes($wpuser)),time() + (86400 * 7),'/');
                setcookie('myuserpass',trim(addslashes(md5($wppass))),time() + (86400 * 7),'/');
				setcookie('myuserid',trim(addslashes($wpuserid)),time() + (86400 * 7),'/');
				setcookie('logout','logout',time() + (86400 * 7),'/');
				
			}else{
				
				$wpuser = $u->username;
				$wppass = $this->input->post('password');
				$wpuserid = $u->id;
				
				setcookie('myusername',trim(addslashes($wpuser)),time() + (86400 * 7),'/');
                setcookie('myuserpass',trim(addslashes(md5($wppass))),time() + (86400 * 7),'/');
				setcookie('myuserid',trim(addslashes($wpuserid)),time() + (86400 * 7),'/');
			    setcookie('logout','logout',time() + (86400 * 7),'/blog/');
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
                        'value'  => md5($this->input->post('password')),
                        'expire' => '86500',
                        'prefix' => 'twinne_',
                    );
                    $this->input->set_cookie($cookie1);
                    $this->input->set_cookie($cookie2);
                    
	        }
		
			$cur_cookie= array(
                        'name'   => 'currency',
                        'value'  => $u->currency->id,
                        'expire' => '86500',
                        'prefix' => 'twinne_',
                    );
                    
			if($this->session->userdata('ref_url'))
	    	{
				$base = base_url();
				$ref_url = $this->session->userdata('ref_url');
				$this->session->unset_userdata('ref_url');
				redirect($base.$ref_url);
			}
			else
			{
				//die("here it is");
				$this->input->set_cookie($cur_cookie);
				$base = base_url();
				redirect($base.$current_url);
			}
        }
        else
        {
			if(isset($ref) && !empty($ref))
			{
				$this->load->vars(array("ref_url"=>$ref));
				$this->form_validation->_error_array[0]="Username and/or Password doesn't match.";
		    	$this->load->vars(array("error"=>"login_error","error_message"=>$this->form_validation->_error_array[0]));
			}
			elseif($this->input->get('msg'))
			{
				$this->load->vars(array("not_login1"=>TRUE));
				$this->form_validation->_error_array[0]="Username and/or Password doesn't match.";
		    	$this->load->vars(array("error"=>"login_error","error_message"=>$this->form_validation->_error_array[0])); 
			}
			elseif(!$this->input->get('flag')) 
			{
				$this->form_validation->_error_array[0]="Username and/or Password doesn't match.";
		    	$this->load->vars(array("error"=>"login_error","error_message"=>$this->form_validation->_error_array[0]));
			}
		
			$fb_data = $this->session->userdata('fb_data');
			$data = array(
                    'fb_data' => $fb_data,
                    );
					
			$this->load->view("user/login_register",$data);
        }
    }
	
	function _get_facebook_cookie($app_id, $application_secret) {
		if(isset($_COOKIE['fbsr_' . $app_id])){
			list($encoded_sig, $payload) = explode('.', $_COOKIE['fbsr_' . $app_id], 2);
				
			$sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
			$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
			return $data;
		}else{
			return null;
		}
	} 
	
	
	
	
	
	function facebook() 
	{
		print_r($fb_data = $this->session->userdata('fb_data')); // This array contains all the user FB information
 
        if((!$fb_data['uid']) or (!$fb_data['me']))
        {
            // If this is a protected section that needs user authentication
            // you can redirect the user somewhere else
            // or take any other action you need
            redirect('user/login');
        }
        else
        {
            $data = array(
                    'fb_data' => $fb_data,
                    );
 			print_r($data);
            $this->load->view("user/login_register",$data);
        }	
   	} 
	
	
	
	
	function facebooklogin()
	{
		$this->load->config('facebook');
		$facebook = new Facebook(array(
            'appId' => $this->config->item('facebook_api_key'),
            'secret' => $this->config->item('facebook_secret_key'),
            ));
		$user = $facebook->getUser();

		if ($user) {
  			try {
    			// Proceed knowing you have a logged in user who's authenticated.
    			$user_profile = $facebook->api('/me');
			  	} 
				catch (FacebookApiException $e) 
				{
    				//error_log($e);
    				$user = null;
  				}

				if (!empty($user_profile )) 
				{
					# User info ok? Let's print it (Here we will be adding the login and registering routines)
					$username = $user_profile['name'];
					$uid = $user_profile['id'];
					$email = $user_profile['email'];
					$this->load->model('user_model');
					if($this->user_model->is_exist_facebook_email($email))
					{
						$user_id = $this->user_model->get_userid_by_email($email);
						$this->user_model->save_facebook_reference($email,$uid);
						$this->session->set_userdata("login",true);
						$this->session->set_userdata("user_id",$user_id);
						$this->session->set_userdata("display_old_pass_field",'no');
						if($this->session->userdata('ref_url'))
						{
							$base = base_url();
							$ref_url = $this->session->userdata('ref_url');
							$this->session->unset_userdata('ref_url');
							if(isset($ref_url))
								redirect($base.$ref_url);
							else
							{
								$current_url = "user/member_profile/index/".$user_id;
								$base = base_url();
								redirect($base.$current_url);
							}
							
						}
						else
						{
							$current_url = "user/member_profile/index/".$user_id;
							$base = base_url();
							redirect($base.$current_url);
						}
						
					}
					else
					{
						$this->session->set_userdata('signin_through_facebook','yes');
						redirect('user/register','refresh');
					}
					
				} 
				else 
				{
					# For testing purposes, if there was an error, let's kill the script
					//die("There was an error.");
					# There's no active session, let's generate one
					$login_url = $facebook->getLoginUrl(array( 'scope' => 'email'));
    				header("Location: " . $login_url);
				}
	} 
	else 
	{
    	# There's no active session, let's generate one
		$login_url = $facebook->getLoginUrl(array( 'scope' => 'email'));
    	header("Location: " . $login_url);
	}
}
	
	
	
	
	
	
	
	
	
	
	
	 
}

?>