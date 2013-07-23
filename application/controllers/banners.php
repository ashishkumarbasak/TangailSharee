<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banners extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
    }
    
    public function index(){
    	$banner=new Banner(1);
		
		if ($banner->rotate=='1') {
			$banner->file->include_join_fields($banner)->get();
		}
		else {
			$banner->file->where('file_id','max');
			$banner->file->get();
		}
		$this->load->vars(array('banners'=>$banner,'home'=>TRUE));
        $this->load->view('top_banner');
        //$this->load->view('profile');
    }
    
    	
}