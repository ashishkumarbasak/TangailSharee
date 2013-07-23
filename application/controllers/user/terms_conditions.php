<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terms_conditions extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
    }
    
     function index(){
        
        
     	$this->load->view('user/terms_conditions');
     	
     }
     
    
     
}