<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_manager extends MY_Controller {
    
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
        $role=new Role();
        
        $count=$role->where('is_active','1')->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/role_manager";
        
        
        $role->where('is_active','1')->get_paged($pagination['page'],$pagination['size']);

        $this->load->vars(array('roles'=>$role));
        $this->load->vars(array('pagination'=>$pagination));
        $this->load->view('admin/list_role');
    }
    
    
    
	
	
    function addRole(){
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	$this->load->vars(array('users'=>$user));
    	$this->load->view('admin/add_role');
    }
    
    
    
    function saveRole(){
    	if($this->input->post('role_id'))
    		$r=new Role($this->input->post('role_id'));
    	else
    		$r=new Role();
    	$r->name=$this->input->post('name');
    	$r->user_id=$this->session->userdata('user_id');
    	
    	if($r->save()){
    		redirect('admin/role_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$r->error->all));
    		if($this->input->post('role_id')){
            	$this->editRole($r->id);
    		}
            else 
            	$this->addRole();
            }
    }
	
    function editRole($role_id){
	
        $role=new Role($role_id);
	
    	$catagory=new Catagory();
    	$catagory->get();
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	$this->load->vars(array('catagories'=>$catagory,'users'=>$user,'role'=>$role));
    	$this->load->view('admin/add_role');
    }
	
    
    
    function deleteRole($role_id){
    	$role=new Role($role_id);
    	$role->is_active='0';
    	if($video->save()){
    		redirect('admin/role_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}  
	

