<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_color_manager extends MY_Controller {
    
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
        $pcolor=new Color();
        
        $count=$pcolor->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/product_color_manager";
        
        
        $pcolor->get_paged($pagination['page'],$pagination['size']);

        $this->load->vars(array('pcolors'=>$pcolor));
        $this->load->vars(array('pagination'=>$pagination));
        $this->load->view('admin/list_color');
    }
    
    
    
	
	
    function addPcolor(){
    	$this->load->view('admin/add_color');
    }
    
    
    
    function savePcolor(){
    	if($this->input->post('pcolor_id'))
    		$c=new Color($this->input->post('pcolor_id'));
    	else
    		$c=new Color();
    	$c->name=$this->input->post('name');
    	$c->code=$this->input->post('color_code');
    	
    	if($c->save()){
    		//echo "you have successfully inserted a Video";
    		//echo $v->id;
    		redirect('admin/product_color_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$c->error->all));
    		if($this->input->post('pcolor_id')){
            	$this->editPcolor($c->id);
    		}
            else 
            	$this->addPcolor();
            }
    }
	
    function editPcolor($pcolor_id){
	
        $pcolor=new Color($pcolor_id);
	
    	$this->load->vars(array('pcolor'=>$pcolor));
    	$this->load->view('admin/add_color');
    }
	
    
    
    function deletePcolor($pcolor_id){
    	$pcolor=new Color($pcolor_id);
    	if($pcolor->delete()){
    		redirect('admin/product_color_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}  
	

