<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    
    function index(){
        //$this->load->view('admin/index');
        $this->load->view('admin/login');
    }
    
    
    function addProduct(){
    	$catagory=new Catagory();
    	$catagory->get();
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	$this->load->vars(array('catagories'=>$catagory,'users'=>$user));
    	$this->load->view('admin/add_product');
    }
    
	function editProduct($product_id){
	
		$product=new Product($product_id);
	
    	$catagory=new Catagory();
    	$catagory->get();
    	$user= new User();
    	$user->role->where('name','super_admin');
    	$user->role->or_where('name','admin');
    	$user->role->or_where('name','designer');
    	$user->get();
    	$this->load->vars(array('catagories'=>$catagory,'users'=>$user,'product'=>$product));
    	$this->load->view('admin/add_product');
    }
    
    function saveProduct(){
    	if($this->input->post('product_id'))
    		$p=new Product($this->input->post('product_id'));
    	else
    		$p=new Product();
    	$p->name=$this->input->post('name');
    	$p->price=$this->input->post('price');
    	$p->original_value=$this->input->post('original_value');
    	$p->man_image=$this->input->post('man_image');
    	$p->woman_image=$this->input->post('woman_image');
    	$p->catagory_id=$this->input->post('catagory_id');
    	$p->user_id=$this->input->post('user_id');
    	if($p->save()){
    		echo "you have successfully inserted a product";
    		echo $p->id;
    	}else {
    		foreach($p->errors->all as $key=>$value){
    			echo $key.$value."<br />";
    		}
    		echo "fail to insert";
    	}
    	
    }
    
	function listProduct(){
    	$product=new Product();
    	$product->where('is_active','1')->get();
    	
    	$this->load->vars(array('products'=>$product));
    	
    	$this->load->view('admin/list_product');
    }
    
    function deleteProduct($product_id){
    	$product=new Product($product_id);
    	$product->is_active='0';
    	if($product->save()){
    		redirect('admin/listProduct','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
    
    
    
    
	function saveCatagory(){
    	$c=new Catagory();
    	$c->name=$this->input->post('name');
    	$c->description=$this->input->post('description');
    	if($c->save()){
    		echo "you have successfully inserted a Catagory";
    		echo $c->id;
    	}else {
    		foreach($c->errors->all as $key=>$value){
    			echo $key.$value."<br />";
    		}
    		echo "fail to insert";
    	}
    	
    }
    
    
	function login(){
	 // Create user object
        $u = new User();

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $this->input->post('username');
        $u->password = $this->input->post('password');

        // Attempt to log user in with the data they supplied, using the login function setup in the User model
        // You might want to have a quick look at that login function up the top of this page to see how it authenticates the user
        
        
        if ($u->adminLogin())
        {
        	$this->session->set_userdata("login",true);
        	$this->session->set_userdata("role",'super_admin');
        	$this->session->set_userdata("user_id",$u->id);
            redirect("admin/listProduct","refresh");

        }
        else
        {
             echo "Invalid";
        }
    }
    
	
	
    function addVideo(){
    	$this->load->view('admin/add_video');
    }
    
    function listVideo(){
    	$video=new Video();
    	$video->where('is_active','1')->get();
    	
    	$this->load->vars(array('videos'=>$video));
    	$this->load->view('admin/list_video');
    }
    
	function saveVideo(){
    	if($this->input->post('video_id'))
    		$v=new Video($this->input->post('video_id'));
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
    		redirect('admin/listVideo','refresh');
    	}else {
    		foreach($v->errors->all as $key=>$value){
    			echo $key.$value."<br />";
    		}
    		echo "fail to insert";
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
    		redirect('admin/listVideo','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
    function addCatagory(){
    	$this->load->view('admin/add_catagory');
    }
    
    function listCatagory(){
    	$catagory=new Catagory();
    	$catagory->get();
    	
    	$this->load->vars(array('catagories'=>$catagory));
    	
    	$this->load->view('admin/list_catagory');
    }
    
	function addCurrency(){
    	$this->load->view('admin/add_currency');
    }
    
	function addUser(){
		$role=new Role();
		$role->get();
		$this->load->vars(array('roles'=>$role));
    	$this->load->view('admin/add_user');
    }
    
	function listUser($page=1){
    	$user=new User();
    	
    	$user->where('is_active','1')->get();
    	
    	$this->load->vars(array('users'=>$user));
    	$this->load->view('admin/list_user');
    }
    
    
    function saveEditedUser(){
    	$u=new User($this->input->post('user_id'));
    	
    	$u->username=$this->input->post('username');
    	$u->email=$this->input->post('email');
		$u->notification=$this->input->post('notification');
		$u->role_id=$this->input->post('role');
		
		if($u->save()){
			redirect('admin/listUser','refresh');
		}else{
			foreach($u->errors->all as $key=>$value){
    			echo $key.$value."<br />";
    		}
		}
    }
    function saveUser(){
    	$u= new User();
    	
    	$u->username=$this->input->post('username');
    	$u->email=$this->input->post('email');
		$u->password=$this->input->post('password');
		$u->notification=$this->input->post('notification');
		$u->confirm_password=$this->input->post('confirm_password');
		$u->role_id=$this->input->post('role');
		
		if($u->save()){
			redirect('admin/listUser','refresh');
		}else{
			foreach($u->errors->all as $key=>$value){
    			echo $key.$value."<br />";
    		}
		}
		
    }
    
    function editUser($user_id){
    	$role=new Role();
		$role->get();
    	$user= new User($user_id);
    	
    	$this->load->vars(array('user'=>$user,'roles'=>$role));
    	$this->load->view('admin/edit_user');
    }
    
	function deleteUser($user_id){
    	$user=new User($user_id);
    	$user->is_active='0';
    	if($user->save()){
    		redirect('admin/listUser','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}  
	

