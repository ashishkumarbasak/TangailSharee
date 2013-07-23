<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends MY_Controller {
    
    public function __construct(){
    	parent::__construct();
    }
    
    public function index(){
    	$currency=new Currency();
		$currency->get();
		
		$cms=new Cms();
    	$cms->get();
    	
		$this->load->vars(array('content'=>$cms,'currencies'=>$currency));
        $this->load->view('cms/'.$cms->id);
    }
}