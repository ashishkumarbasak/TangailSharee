<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipping_info extends MY_Controller {
    
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
        if(isset($_COOKIE["c"]))
           $pref_currency_type = $_COOKIE["c"];
        else
           $pref_currency_type = "GBP";   
        $this->load->vars(array('pref_currency_type'=>$pref_currency_type));
    }
    
    public function index()
	{
    	$user_id=$this->session->userdata('user_id');
		$user=new User($user_id);
		
		$user->address->where_join_field($user,'type','shipping');
		$user->address->include_join_fields()->get();
		
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
		
		$this->load->model('country');
		$country = new country();
		$list_of_countries = $country->order_by('country_name','ASC')->get();

		$this->load->vars(array('user'=>$user,'list_of_countries'=>$list_of_countries));
        $this->load->view('user/shipping_info');
    }
    
	function saveShippingInfo()
	{
    	$user_id=$this->session->userdata('user_id');
		$u=new User($user_id);
		
		$u->address->where_join_field($u,'type','shipping');
		$u->address->include_join_fields()->get();
		//echo "<pre>";print_r($u->address->id);die;
		if(isset($u->address->id) && !empty($u->address->id))
		{
			$add = new Address($u->address->id);
		}
		else
		{
			$add= new Address();
		}
    	$add->city=$this->input->post('city');
    	$add->country=$this->input->post('country');
    	$add->state=$this->input->post('state');
		$add->postcode=$this->input->post('post_code');
    	$add->address_line1=$this->input->post('address_line1');
    	$add->address_line2=$this->input->post('address_line2');
    	$add->address_line3=$this->input->post('address_line3');
    	
		if ($add->save($u))
		{
			$u->set_join_field($add,'type','shipping');
			$u->set_join_field($add,'default','1');
			redirect('user/shipping_info','refresh');	
		}
		else
		{
			$this->load->vars(array('errors'=>$add->error->all));
			$this->index();
		}	
	}
	
}