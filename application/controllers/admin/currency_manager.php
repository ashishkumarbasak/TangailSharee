<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency_manager extends MY_Controller {
    
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
        $currency=new Currency();
    	$currency->count=$currency->where('is_active','1')->count();
        $currency->where('is_active','1')->get();
    	$this->load->vars(array('currencies'=>$currency));
    	
    	
        $this->load->view('admin/list_currency');
    }
    
    
    
    
    function addCurrency(){
    	$this->load->view('admin/add_currency');
    }
    
    function editCurrency($currency_id){
        $currency=new Currency($currency_id);
	
    	$this->load->vars(array('currency'=>$currency));
    	$this->load->view('admin/add_currency');
    }
    
    
    function deleteCurrency($currency_id){
        
        $currency=new Currency($currency_id);
    	$currency->is_active='0';
    	if($currency->save()){
    		redirect('admin/currency_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
        
    }
    
    function saveCurrency(){
    	if($this->input->post('currency_id'))
    		$c=new Currency($this->input->post('currency_id'));
    	else
    		$c=new Currency();
        $c->name=$this->input->post('name');
    	$c->value=floatval($this->input->post('value'));
        $c->short_name=$this->input->post('short_name');
    	$c->description=$this->input->post('description');
    	
        if($c->save()){
                redirect('admin/currency_manager','refresh');
    		//echo "you have successfully inserted a product";
    		//echo $p->id;
    	}else {
            foreach($p->errors->all as $key=>$value){
                echo $key.$value."<br />";
            }
    		echo "fail to insert";
    	}
    	
    }
    
    
    
}  
	

