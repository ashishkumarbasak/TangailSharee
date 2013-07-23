<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_password extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
	if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isCustomer()){
                redirect('login?flag=false','refresh');
            }
	    else {
		//redirect('user/member_profile/'.$u->id,'refresh');
	    }
        }  else {
            redirect('login?flag=false','refresh');
        }
		 //code for currency change
        if(isset($_COOKIE["c"]))
           $pref_currency_type = $_COOKIE["c"];
        else
           $pref_currency_type = "GBP";   
        $this->load->vars(array('pref_currency_type'=>$pref_currency_type));
    }
    
    public function index(){
    	$user_id=$this->session->userdata('user_id');
    	//echo $user_id;
		$user=new User($user_id);
		
		$user->address->where_join_field($user,'type','shipping');
		$user->address->include_join_fields()->get();
		
		$designer=new User();
		$designer->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($designer as $d){
		    $designers[$i]=$d->id;
		    $i++;
		}
		if(isset($designers) && !empty($designers)){
		    $this->load->vars(array('designers'=>$designers));
		}
		
		$this->load->vars(array('user'=>$user,'display_old_pass_field'=>$this->session->userdata('display_old_pass_field')));
		//if($this->session->userdata('display_old_pass_field'))
			//$this->session->unset_userdata('display_old_pass_field');
        $this->load->view('user/change_password');
    }
    
	function saveNewpassword(){
	    $this->load->helper(array('form', 'url'));

	    $this->load->library('form_validation');
    
		if($this->input->post('display_old_pass_field')=="no")
			{
				$is_valid_old_password=true;
			}
		else
	    	{
				$this->form_validation->set_rules('old_password', 'Old Password', 'required');
				$user_id=$this->session->userdata('user_id');
				$is_valid_old_password = $this->user_model->is_valid_old_password($this->input->post('old_password'),$user_id);
				if(!$is_valid_old_password)
					$this->load->vars(array('old_pass_invalid'=>"yes"));
			}
		
	    $this->form_validation->set_rules('new_password', 'New Password', 'required|matches[confirm_password]');
	    $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required');
		
	    if ($this->form_validation->run() == FALSE || !$is_valid_old_password)
	    {
			$this->index();
	    }
	    else
	    {
			$user_id=$this->session->userdata('user_id');
			$u=new User($user_id);
			
			$u->password=$this->input->post('new_password');
                        $u->password_request_code=NULL;
			
			if ($u->save())
			{
                            $this->session->set_userdata('display_message','yes');
                            $this->session->set_userdata('success_message',$this->lang->line('password_changed_successfully'));
                            redirect('user/change_password');
			}
			else
			{
				$this->load->vars(array('errors'=>$u->error->all));
				$this->index();
			}
	    }
	}
}