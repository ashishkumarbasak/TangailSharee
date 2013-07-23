<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_manager extends CI_Controller {
    
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
    	$post=new Post();
    	
    	$count=$post->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/post_manager";
        
        $post->get_paged($pagination['page'],$pagination['size']);
        
        
    	$this->load->vars(array('posts'=>$post));
    	$this->load->vars(array('pagination'=>$pagination));
    	$this->load->view('admin/list_post');
    }
    
	function addPost(){
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
    	$this->load->view('admin/add_post');    	
    }
    
	function savePost(){
    	$p= new Post();
    		
    	$p->title=$this->input->post('title');
    	$p->description=$this->input->post('description');
		   	
    	if($this->input->post('date')){
	    	$date=explode("/",$this->input->post('date'));
    		$c->date=mktime(0,0,0,$date[0],$date[1],$date[2]);
		}
		
		if($p->save()){
    		redirect('admin/post_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$p->error->all));
            $this->addPost();
            }
    }
    
    
	function deleteContest($post_id){
    	$post=new Post($post_id);
    	$post->delete();
    	if($post->save()){
    		redirect('admin/post_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
    
}