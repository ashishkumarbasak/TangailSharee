<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_size_manager extends MY_Controller {
    
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
        $psize=new Size();
        
        $count=$psize->where('is_active','1')->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/product_size_manager";
        
        
        $psize->where('is_active','1')->get_paged($pagination['page'],$pagination['size']);

        $this->load->vars(array('psizes'=>$psize));
        $this->load->vars(array('pagination'=>$pagination));
        $this->load->view('admin/list_product_size');
    }
    
    
    
	
	
    function addPsize(){
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	$this->load->vars(array('users'=>$user));
    	$this->load->view('admin/add_product_size');
    }
    
    
    
    function savePsize(){
    	if($this->input->post('psize_id'))
    		$s=new Size($this->input->post('psize_id'));
    	else
    		$s=new Size();
    	$s->name=$this->input->post('name');
    	$s->description=$this->input->post('description');
    	$s->catagory=$this->input->post('catagory');
    	$s->user_id=$this->session->userdata('user_id');
    	
    	if($s->save()){
    		//echo "you have successfully inserted a Video";
    		//echo $v->id;
    		redirect('admin/product_size_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$s->error->all));
    		if($this->input->post('psize_id')){
            	$this->editPsize($s->id);
    		}
            else 
            	$this->addPsize();
            }
    }
	
    function editPsize($psize_id){
	
        $psize=new Size($psize_id);
	
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	$this->load->vars(array('users'=>$user,'psize'=>$psize));
    	$this->load->view('admin/add_product_size');
    }
	
    
    
    function deletePsize($psize_id){
    	$psize=new Size($psize_id);
    	$psize->is_active='0';
    	if($psize->save()){
    		redirect('admin/product_size_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}  
	

