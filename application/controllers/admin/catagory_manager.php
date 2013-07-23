<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catagory_manager extends CI_Controller {
    
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
    	$catagory=new Catagory();
        
        $count=$catagory->where('is_active','1')->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/catagory_manager";
        
        
        $catagory->where('is_active','1')->get_paged($pagination['page'],$pagination['size']);

        $this->load->vars(array('catagories'=>$catagory));
        $this->load->vars(array('pagination'=>$pagination));
        $this->load->view('admin/list_catagory');
    }
    
	function addCatagory(){
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	$this->load->vars(array('users'=>$user));
    	$this->load->view('admin/add_catagory');
    }
    
	function saveCatagory(){
    	if($this->input->post('catagory_id'))
    		$c=new Catagory($this->input->post('catagory_id'));
    	else
    		$c=new catagory();
    	$c->name=$this->input->post('name');
    	$c->description=$this->input->post('description');
    	$c->no_of_products=$this->input->post('no_of_products');
    	$c->is_active='1';
    	
    	if($c->save()){
    		redirect('admin/catagory_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$c->error->all));
    		if($this->input->post('catagory_id')){
            	$this->editCatagory($c->id);
    		}
            else 
            	$this->addCatagory();
            }
    }
    

    function editCatagory($catagory_id){
	
        $catagory=new Catagory($catagory_id);
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	$this->load->vars(array('catagory'=>$catagory,'users'=>$user));
    	$this->load->view('admin/add_catagory');
    }
	
    
    
    function deleteCatagory($catagory_id){
    	$catagory=new Catagory($catagory_id);
    	$catagory->is_active='0';
    	if($catagory->save()){
    		redirect('admin/catagory_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}