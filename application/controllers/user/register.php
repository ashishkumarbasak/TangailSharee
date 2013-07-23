<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {
    
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
                  )
            );

    public function __construct()
	{
        parent::__construct();
		$this->load->library('MCAPI');
		$this->load->model('facebook_model');
		if($this->session->userdata("login") && !$this->input->post('sub_button')){
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
		
		$u = new User();
		// Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $this->input->post('username');
        $u->password = $this->input->post('password');
        $u->confirm_password = $this->input->post('passwordconf');
        $u->email = $this->input->post('email');
        $u->gender = $this->input->post('gender');
		$u->fb_uid = $this->input->post('fb_uid');
		
		
		if(isset($_COOKIE['fbsr_'.FACEBOOK_API_KEY]))
		{
			$fbdata = $this->_get_facebook_cookie(FACEBOOK_API_KEY,FACEBOOK_API_SECREAT);
			$u->fb_uid =  $fbdata['user_id'];
		}
        
		$wp_u = new Wp_users();
		$wp_u->user_login 		= $this->input->post('username');
        $wp_u->user_pass  		= md5($this->input->post('password'));
        $wp_u->user_nicename  	= $this->input->post('username');
        $wp_u->user_email  		= $this->input->post('email');
		$wp_u->user_registered  = "2011-12-08 06:40:01";
		$wp_u->user_status  	= 0;
		$wp_u->display_name 	= $this->input->post('username');
		
		
        if($this->input->post('notification')){$u->notification='1';}  
		else{$u->notification='0';}
        $u->is_active='1';
        // Attempt to save the user into the database
		if ($this->input->post('user_register'))
		{	
			//print_r($this->session->all_userdata());
			
			if($u->save())
			{
				$wp_u->save();
					
				$role=new Role();
				$role->where('name','Customers')->get();
				$u->save($role);
				
				$email = new Email(5);
				$from = $email->from_email;
				$to = $u->email;
				$this->load->vars(array('customer_name'=>$this->input->post('username')));
				
				$config['mailtype']='html';
				$this->load->library('email',$config);
		
				$this->email->from($from, 'Twinne');
				$this->email->reply_to($email->re_email);
				$this->email->to($to);
				
				$this->email->subject('Welcome to the Twinne community!');
				$this->email->message($this->load->view('email_template/registration_success_to_customer','',TRUE));
				$this->email->send();
				
				if($u->notification=="1")
				{
					$config['mailtype']='html';
					$this->load->library('email',$config);
			
					$this->email->from('admin@twinne.com', 'Twinne');
					$this->email->to($u->email);
						
					$this->email->subject('Twinne Member Notification');
					$this->email->message($this->load->view('email','',TRUE));
					//$this->email->send();
					//$this->storeAddress($u->email,$u->username,$u->gender);
					$email=$u->email;
					if($u->gender=='male'){
							$list_id='2b3f512a26';
						}
					else{
							$list_id='77a05496e5';
						}
					
					$config = array(
						'apikey' => '4af5bec03c18f0b8b29c46a2513d1298-us4' ,     // Insert your api key
						'secure' => FALSE   // Optional (defaults to FALSE)
						);
					
					$this->load->library('MCAPI', $config, 'mail_chimp');
					$mergeVars = array('NAME'=>$u->username);
					if($this->mail_chimp->listSubscribe($list_id, $email,$mergeVars)) 
					{
					    //die("Yes done !!!");
						// $email is now subscribed to list with id: $list_id
					    //$this->load->vars(array('subscribe'=>TRUE));
					}

				}
				
				$this->session->set_userdata("login",true);
			    $this->session->set_userdata("user_id",$u->id);
				if($this->input->post('comes_from')=="cart/checkout")
					{
						$this->session->unset_userdata('ref_url');
						redirect("cart/checkout","refresh");
					}
				else
			    	redirect("user/member_profile","refresh");
			}
			else
			{
		    	$this->load->vars(array('errors'=>$u->error->all));
		    	if (!$this->input->post('terms_conditions'))
				{
					$this->load->vars(array("terms"=>TRUE));
		    	}
		    	if (!$this->input->post('privacy_policy'))
				{
			    	$this->load->vars(array("privacy"=>TRUE));
		   	 	}
				
				if($this->session->userdata('ref_url'))
				{
					$ref = $this->session->userdata('ref_url');
					$this->load->vars(array("ref_url"=>$ref));
					//$this->session->unset_userdata('ref_url');
				}
				
		     	$this->load->view("user/register_new");
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
			
			if($this->session->userdata('ref_url'))
			{
				$ref = $this->session->userdata('ref_url');
				$this->load->vars(array("ref_url"=>$ref));
				//$this->session->unset_userdata('ref_url');
			}
			
			
			if($this->session->userdata('signin_through_facebook')=="yes")
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
				}
				
				if (!empty($user_profile )) 
				{
        			# User info ok? Let's print it (Here we will be adding the login and registering routines)
  					$fb_username = $user_profile['name'];
					$fb_uid = $user_profile['id'];
		 			$fb_email = $user_profile['email'];
					$this->load->vars(array("fb_username"=>$fb_username,"fb_email"=>$fb_email,'fb_uid'=>$fb_uid));
				}
				
				
			}
			
            $this->load->view("user/register_new");
        }

    }
    
    
    
    
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
            $this->load->view("user/register_new");
            return false;
        }
        return true;
    }
	
	function is_exist_username()
	{
		$username = $this->input->post("username");
		if($username!=NULL)
		{
			if(!$this->user_model->checkUsername($username))
				echo "0";
			else
				echo "1";
		}
	}
	
	function is_exist_email()
	{
		$email = $this->input->post("email");
		if($email!=NULL)
		{
			if(!$this->user_model->checkUserEmail($email))
				echo "0";
			else
				echo "1";
		}
	}
    
    function subscribeNews(){
	
	    $email=$this->input->post('email');
	    $name=$this->input->post('NAME');
	    $button=$this->input->post('sub_button');
	    if($button=='MEN'){
		$list_id='2b3f512a26';
	    }
	    else{
		$list_id='77a05496e5';
	    }
		
		$config = array('apikey' => '4af5bec03c18f0b8b29c46a2513d1298-us4' ,     // Insert your api key
						'secure' => FALSE   // Optional (defaults to FALSE)
						);
    
	    $this->load->library('MCAPI', $config, 'mail_chimp');
	    $mergeVars = array('NAME'=>$name);
		if($this->mail_chimp->listSubscribe($list_id, $email,$mergeVars)) {
		    // $email is now subscribed to list with id: $list_id
		    $this->load->vars(array('subscribe'=>TRUE,'name'=>$name));
		    $this->load->view('subscription');
		}
		else{
		    $this->load->vars(array('subscribe1'=>TRUE,'name'=>$name));
		    $this->load->view('subscription');
		}
    }
	
	function _get_facebook_cookie($app_id, $application_secret) 
	{
		if(isset($_COOKIE['fbsr_' . $app_id])){
			list($encoded_sig, $payload) = explode('.', $_COOKIE['fbsr_' . $app_id], 2);
				
			$sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
			$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
			return $data;
		}else{
			return null;
		}
	}

// If being called via ajax, autorun the function
//if($_GET['ajax']){ echo storeAddress(); }
}