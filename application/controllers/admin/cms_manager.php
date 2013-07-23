<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_manager extends MY_Controller {
    
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
    	$page=new Cms();
    	
    	$count=$page->where('is_active','1')->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/cms_manager";
        
        
        $page->where('is_active','1')->get_paged($pagination['page'],$pagination['size']);
    	$this->load->vars(array('pages'=>$page));
    	$this->load->vars(array('pagination'=>$pagination));
    	$this->load->view('admin/list_page');
    }
    
	function addPage(){
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	
    	
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
    	
    	$this->load->vars(array('users'=>$user));
    	$this->load->vars($this->data);
    	$this->load->view('admin/add_page');    	
    }
    
	function savePage(){
    	if ($this->input->post('page_id'))
    		$page=new Cms($this->input->post('page_id'));
    	else
    		$page=new Cms();
    	$page->title=$this->input->post('title');
    	$page->content=$this->input->post('content');
    	
		if(!$this->input->post('active'))
			$page->is_active='0';
		else 
			$page->is_active='1';
		if($page->save()){
    		//echo "you have successfully inserted a Video";
    		//echo $v->id;
    		redirect('admin/cms_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$page->error->all));
    		if ($this->input->post('page_id'))
    			$this->editPage($page->id);
    		else
            	$this->addPage();;
            }
    }
    
	function editPage($page_id){
		$page=new Cms($page_id);
		
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
    	
    	$this->load->vars(array('page'=>$page));
    	$this->load->vars($this->data);
    	$this->load->view('admin/add_page');
    }
    
	function deletePage($page_id){
    	$page=new Cms($page_id);
    	$page->is_active='0';
    	if($page->save()){
    		redirect('admin/cms_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}