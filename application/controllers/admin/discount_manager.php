<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discount_manager extends CI_Controller {
    
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
        $discount=new Discount();
        
        $count=$discount->where('is_active','1')->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/discount_manager";
        
        
        $discount->where('is_active','1')->get_paged($pagination['page'],$pagination['size']);
        $this->load->vars(array('discounts'=>$discount));
        $this->load->vars(array('pagination'=>$pagination));
        $this->load->view('admin/list_discount');
    }
    
    
    
	
	
    function addDiscount($product_id){
    	$product=new Product($product_id);
    	$this->load->helper('ckeditor');
    	$this->data['ckeditor'] = array(
		
			//ID of the textarea that will be replaced
			'id' 	=> 	'content_body_1',
			'path'	=>	'js/ckeditor',
		
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'200px',	//Setting a custom height
					
			),
		
			//Replacing styles from the "Styles tool"
			'styles' => array(
			
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Blue',
						'font-weight' 		=> 	'bold'
					)
				),
				
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 		=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
    	
    	$this->load->vars($this->data);
    	$this->load->vars(array('product'=>$product));
    	$this->load->view('admin/add_discount');
    }
    
    
    
    function saveDiscount(){
    	if($this->input->post('discount_id'))
    		$d=new Discount($this->input->post('discount_id'));
    	else
    		$d=new Discount();
    	$d->quantity=$this->input->post('quantity');
    	$d->price=$this->input->post('price');
    	if($this->input->post('start_date')){
	    	$sdate=explode("/",$this->input->post('start_date'));
    		$d->start_date=mktime(0,0,0,$sdate[0],$sdate[1],$sdate[2]);
		}
    	if($this->input->post('end_date')){
	    	$edate=explode("/",$this->input->post('end_date'));
			$d->end_date=mktime(0,0,0,$edate[0],$edate[1],$edate[2]);
    	}
    	
    
		if($d->save()){
    		redirect('admin/discount_manager','refresh');
    	}
    	else {
    		//var_dump($c->error->all);
    		$this->load->vars(array('errors'=>$d->error->all));
            $this->addDiscount();
        }
    }	
    function editDiscount($discount_id){
        $discount=new Discount($discount_id);
		$sdate = date("j/n/Y",$discount->start_date); 

		$edate = date("j/n/Y",$discount->end_date); 
		$discount->start_date=$sdate;
		$discount->end_date=$edate;
		
		$this->load->helper('ckeditor');
    	$this->data['ckeditor'] = array(
		
			//ID of the textarea that will be replaced
			'id' 	=> 	'content_body_1',
			'path'	=>	'js/ckeditor',
		
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'200px',	//Setting a custom height
					
			),
		
			//Replacing styles from the "Styles tool"
			'styles' => array(
			
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Blue',
						'font-weight' 		=> 	'bold'
					)
				),
				
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 		=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
 		
    	$this->load->vars(array('discount'=>$discount));
    	$this->load->vars($this->data);
    	$this->load->view('admin/add_discount');
    }
	
    
    
    function deleteDiscount($discount_id){
    	$discount=new Discount($discount_id);
    	$discount->is_active='0';
    	if($discount->save()){
    		redirect('admin/discount_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}  
	

