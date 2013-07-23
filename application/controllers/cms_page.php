<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_page extends MY_Controller {
    
    public function __construct(){
    	parent::__construct();
    }
    
    public function index($page_id){
    	$currency=new Currency();
		$currency->get();
		
		$page=new Cms($page_id);
    	
		$this->load->vars(array('content'=>$page,'currencies'=>$currency));
        $this->load->view('cms_page');
    }
}