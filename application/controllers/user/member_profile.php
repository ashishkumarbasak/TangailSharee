<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_profile extends MY_Controller {
    
    public function __construct()
	{
        parent::__construct();
    	if($this->session->userdata('login')===true)
		{
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isCustomer())
			{
                redirect('login?flag=false','refresh');
        	}
	    	else 
			{
				//redirect('user/member_profile/'.$u->id,'refresh');
	    	}
        }  
		else 
		{
            redirect('login?flag=false','refresh');
        }
        //code for currency change
        //echo $_COOKIE["c"];
        if(isset($_COOKIE["c"]))
           $pref_currency_type = $_COOKIE["c"];
        else
           $pref_currency_type = "GBP";   
        $this->load->vars(array('pref_currency_type'=>$pref_currency_type));
    }
    
    public function index()
	{
    	$currency=new Currency();
		$currency->get();
		$user_id=$this->session->userdata('user_id');

		$user=new User($user_id);
		$user->image->get();
		
		$user->address->get();
	
		$designer=new User();
		$designer->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($designer as $d)
		{
			$designers[$i]=$d->id;
			$i++;
		}
		
		if(isset($designers) && !empty($designers))
		{
			$this->load->vars(array('designers'=>$designers));
		}
		
		$this->load->vars(array('user'=>$user,'currencies'=>$currency));
			
		$this->load->view('user/member_profile');
    }
	
	/** Functio to upload image of member profile using ajax form submit
	 * @access : Protected
	 * 
	 * */
    function uploadUserImage()
	{
		$user_id=$this->session->userdata('user_id');
	    $u= new User($user_id);
	   
		if($_FILES['userfile']){
		    try
			{
			    $u->image=new File();
			    $u->image->file='userfile';
			    $u->image->upload_path="images/profile_image/original_image";
			    $u->image->upload();
					    
					    
			    $ratio=(($u->image->original_width/108)<($u->image->original_height/108))?($u->image->original_width/108):($u->image->original_height/108);
			    $u->image->width=intval(108*$ratio);
			    $u->image->height=intval(108*$ratio);
			    $u->image->x_axis=($u->image->original_width-$u->image->width)/2;
			    $u->image->y_axis=($u->image->original_height-$u->image->height)/2;
			    $u->image->maintain_ratio=false;
			    $u->image->new_image="images/profile_image/main_image";
			    $image_main=$u->image->crop();
					    
					    
			    $image_main->width=108;
			    $image_main->height=108;
			    $image_main->resize();
					    
			    $ratio=(($u->image->original_width/48)<($u->image->original_height/48))?($u->image->original_width/48):($u->image->original_height/48);
			    $u->image->width=intval(48*$ratio);
			    $u->image->height=intval(48*$ratio);
			    $u->image->x_axis=($u->image->original_width-$u->image->width)/2;
			    $u->image->y_axis=($u->image->original_height-$u->image->height)/2;
			    $u->image->maintain_ratio=false;
			    $u->image->new_image="images/profile_image/short_image";
			    $image_short=$u->image->crop();
					     
			    $image_short->width=48;
			    $image_short->height=48;
			    $image_short->resize();
			}
			catch(Exception $e){
					    //echo $e->getMessage();exit;
				    //this->editUser($u->id);
			}
			if($u->save()){
				echo '<img src="'.base_url().'images/profile_image/main_image/'.$u->image->filename.'"alt="profilr-image"/>';
				if($_FILES['userfile']){
				    $u->image->save_profile($u);
				    $u->image->save_user($u);
				}
			}
		}
	}
	
    function saveUser()
	{
    	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('first_name', 'First name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->vars(array('errors'=>validation_errors()));
			$this->index();
		}
		else
		{
			//$this->load->view('user/member_profile');
	    	$user_id=$this->session->userdata('user_id');
	    	$u= new User($user_id);
	    	$u->username=$this->input->post('username');
	    	$u->first_name=$this->input->post('first_name');
	    	$u->last_name=$this->input->post('last_name');
	    	$u->gender=$this->input->post('gender');
	    	$u->currency_id=$this->input->post('currency');
	    	$u->address_id=$this->input->post('address');
	    	$u->profile=$this->input->post('profile');
	    	$u->display_type=$this->input->post('display_type');
	   
	    	//echo $u->display_type;exit;
	    	switch((int)$u->display_type)
			{
		    	case 1:
			    	$u->display_name=$u->first_name." ".$u->last_name;
			    	break;
		    	case 2:
			    	$u->display_name=$u->first_name;
			    	break;
		    	case 3:
			    	$u->display_name=$u->last_name;
			    	break;
		    	case 4:
			    	$u->display_name=$u->username;
			    	break;
		    	default :
			    	$u->display_name=$u->username;
			    	$u->display_type=4;
			    	break;
	    	}
	    
		    if($u->save())
			{
			    //print_r($_POST);
				//die("0");
				if($this->input->post('notification')=="1")
				{
					$user_id=$this->session->userdata('user_id');
					$u = new User($user_id);
					$user_prev_notification = $u->notification;
					$u->notification=$this->input->post('notification');
					$u->save();
					$customer_name = $u->first_name." ".$u->last_name;
					$this->load->vars(array('user'=>$u,'customer_name'=>$customer_name));
					
					$config['mailtype']='html';
					$this->load->library('email',$config);
					
					$this->email->from('admin@tangail-sharee.com', 'tangail-sharee');
					$this->email->to($u->email);
								
					$this->email->subject('tangail-sharee discounts & news notification!');
					$this->email->message($this->load->view('email_notify','',TRUE));
					if($user_prev_notification!=$u->notification)
					$this->email->send();
					
					$email=$u->email;
					if($u->gender=='male'){
							$list_id='3ba39f046c';
						}
					else{
							$list_id='3ba39f046c';
						}
					
					$config = array(
						'apikey' => '4af5bec03c18f0b8b29c46a2513d1298-us4' ,     // Insert your api key
						'secure' => FALSE   // Optional (defaults to FALSE)
						);

					$this->load->library('MCAPI', $config, 'mail_chimp');
					$mergeVars = array('NAME'=>$u->username);
					if($this->mail_chimp->listSubscribe($list_id, $email,$mergeVars)) 
					{
					    // $email is now subscribed to list with id: $list_id
					    //$this->load->vars(array('subscribe'=>TRUE));
					}
				}
				else
				{
					$user_id=$this->session->userdata('user_id');
					$u = new User($user_id);
					$u->notification="0";
					$u->save();
					
					$email=$u->email;
					if($u->gender=='male'){
							$list_id='3ba39f046c';
						}
					else{
							$list_id='3ba39f046c';
						}
					
					$config = array(
						'apikey' => '4af5bec03c18f0b8b29c46a2513d1298-us4' ,     // Insert your api key
						'secure' => FALSE   // Optional (defaults to FALSE)
						);

					$this->load->library('MCAPI', $config, 'mail_chimp');
					$mergeVars = array('NAME'=>$u->username);
					if($this->mail_chimp->listUnsubscribe($list_id, $email)) 
					{
					    // $email is now subscribed to list with id: $list_id
					    //$this->load->vars(array('subscribe'=>TRUE));
					}
				}
			    redirect('user/member_profile','refresh');
	    	}
			else 
			{
		    	$this->load->vars(array('errors'=>$u->error->all));
		    	$this->index();
	    	}
		}
    }
    
}
