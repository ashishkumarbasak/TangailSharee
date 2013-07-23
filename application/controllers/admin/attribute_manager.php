<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attribute_manager extends CI_Controller {
    
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
        $attribute=new Attribute();
        
        $count=$attribute->where('is_active','1')->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/attribute_manager";
        
        
        $attribute->where('is_active','1')->get_paged($pagination['page'],$pagination['size']);

        $this->load->vars(array('attributes'=>$attribute));
        $this->load->vars(array('pagination'=>$pagination));
        $this->load->view('admin/list_attribute');
    }
    
    
    
	
	
    function addAttribute(){
    	
    	$this->load->view('admin/add_attribute');
    }
    
    
    
    function saveAttribute(){
    	if($this->input->post('attribute_id'))
    		$v = new Attribute($this->input->post('attribute_id'));
    	else
    		$v=new Video();
    	$v->title=$this->input->post('title');
    	$v->description=$this->input->post('description');
    	$v->link=$this->input->post('link');
    	$v->date=now();
    	$v->user_id=$this->session->userdata('user_id');
    	
    	if($v->save()){
    		//echo "you have successfully inserted a Video";
    		//echo $v->id;
    		redirect('admin/video_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$v->error->all));
    		if($this->input->post('video_id')){
            	$this->editVideo($v->id);
    		}
            else 
            	$this->addVideo();
            }
    }
	
    function editVideo($video_id){
	
        $video=new Video($video_id);
	
    	$catagory=new Catagory();
    	$catagory->get();
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	$this->load->vars(array('catagories'=>$catagory,'users'=>$user,'video'=>$video));
    	$this->load->view('admin/add_video');
    }
	
    
    
    function deleteVideo($video_id){
    	$video=new Video($video_id);
    	$video->is_active='0';
    	if($video->save()){
    		redirect('admin/video_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}  
	

