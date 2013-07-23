<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System_manager extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
        // Check if User is super_admin....................
        //var_dump($this->session->userdata('login'));exit;
        
        
        if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isSuperAdmin()){
                redirect('admin/login','refresh');
            }
        }  else {
            redirect('admin/login','refresh');
        }
        
    }
    
	function index(){
    	$system=new System(1);
    	$this->load->vars(array('system'=>$system));
    	$this->load->view('admin/system_config');
    }
    
	function saveSetting(){
	$this->load->helper(array('form', 'url'));

	$this->load->library('form_validation');

	$this->form_validation->set_rules('revenue', 'Revenue', 'integer|less_than[100]');
	$this->form_validation->set_rules('telephone', 'Telephone', 'integer');

	if ($this->form_validation->run() == FALSE)
	{
		
		$this->index();
	}
	else
	{
	    $s= new System($this->input->post('system_id'));
	    
	    $s->website_name=$this->input->post('website_name');
	    $s->site_email=$this->input->post('site_email');
	    
		    $s->meta_desc=$this->input->post('meta_desc');
		    $s->keywords=$this->input->post('keywords');
		    $s->address=$this->input->post('address');
		    $s->telephone=$this->input->post('telephone');
		    $s->revenue = $this->input->post('revenue');
		    if($s->save()){
			    $s->is_active='1';
		    redirect('admin/system_manager','refresh');
	    }
	    else {
		    foreach($s->errors->all as $key=>$value){
			    echo $key.$value."<br />";
		    }
		}
	}
    }
}