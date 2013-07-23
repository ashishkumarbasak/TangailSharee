<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_manager extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
        // Check if User is super_admin....................
        //var_dump($this->session->userdata('login'));exit;
        
        
        if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isAdmin()){
                redirect('admin/login','refresh');
            }
        }  else {
            redirect('admin/login','refresh');
        }
        
    }
    
    function index(){
    	//echo $name;exit;
	$role_id = $this->input->get('role_id');
	//echo $role_
    	$role=new Role($role_id);
	
	if($this->input->get()){
	    $test = $this->input->get();
	    if(isset($test['username']) && !empty($test['username'] ))
		$query_array['username'] = $test['username'];
		
	    if(isset($test['email']) && !empty($test['email'] ))
		$query_array['email'] = $test['email'];
		
	    if(isset($test['fullname']) && !empty($test['fullname']))
		$query_array['fullname'] = $test['fullname'];
	    
	   
	    if(isset($query_array)){
		$query = http_build_query($query_array);
		//echo "<pre>";print_r($query_array);die;
		if(isset($query_array['username']))
		    $role->user->like('username',$query_array['username']);
		
		if(isset($query_array['email']))
		    $role->user->like('email',$query_array['email']);
	       
		if(isset($query_array['fullname']))
		    $role->user->like('first_name',$query_array['fullname']);
	    }
	}
	//$role->user->where('is_active','1');
	$role->user->get();
	$count = $role->user->result_count();
	//echo $count;exit;	
        $page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
	if(isset($query)){
			//echo "test";die;
		$pagination['url']=base_url()."admin/user_manager/index?".$query."&role_id=".$role_id."&";
	}
	else{
		$pagination['url']=base_url()."admin/user_manager/index?role_id=".$role_id."&";
	}
        //$pagination['url']=base_url()."admin/user_manager/index/".$role_id."?";
        
        $role=new Role($role_id);
        //$role->user->where('is_active','1');
	
    	if(isset($query_array)){
	   
	    if(isset($query_array['username']))
		$role->user->like('username',$query_array['username']);
		
	    if(isset($query_array['email']))
		$role->user->like('email',$query_array['email']);
	   
	    if(isset($query_array['fullname']))
		$role->user->like('first_name',$query_array['fullname']);
	}
    	
    	$role->user->get_paged($pagination['page'],$pagination['size']);
        
    	$roles=new Role();
    	$roles->get();
    	//echo $this->session->userdata('user_id');exit;
	$logged_user=new User($this->session->userdata('user_id'));
	$this->load->vars(array('logged_user'=>$logged_user));
	
    	$this->load->vars(array('role'=>$role,'pagination'=>$pagination,'roles'=>$roles));
    	$this->load->view('admin/list_user');
    }
    
    function filter_index($role_id)
	{
		if($this->input->post())
		{
			$filter = $this->input->post();
			$query = http_build_query($filter);
			redirect("admin/user_manager/index?".$query."&role_id=".$role_id);
		}
	}
    
    function addUser($role_id){
    	$role=new Role($role_id);
	$roles=new Role();
	$roles->get();
	$supervisor=new User();
	$supervisor->where('role_id','2');
	$supervisor->or_where('role_id','1')->get();
	$this->load->vars(array('roles'=>$roles,'role'=>$role,'supervisors'=>$supervisor));
    	$this->load->view('admin/add_user');
    }
    
    
    function saveEditedUser(){
    	$u=new User($this->input->post('user_id'));
    	
    	$u->username=$this->input->post('username');
    	$u->email=$this->input->post('email');
    	$u->first_name=$this->input->post('first_name');
    	$u->last_name=$this->input->post('last_name');
    	$u->password=$this->input->post('password');
    	$u->confirm_password=$this->input->post('confirm_password');
    	$u->website=$this->input->post('website');
		$u->notification=$this->input->post('notification');
		$u->role_id=$this->input->post('role');
		$u->profile=$this->input->post('profile');
    	if($this->input->post('supervisor')){
	     $u->supervisor=$this->input->post('supervisor');
	}
		$u->is_active="1";
		 
		if($_FILES['userfile']){
		
	    	try{
	        	$u->image=new File();
	        	$u->image->file='userfile';
	        	$u->image->upload_path="images/profile_image/original_image";
	        	$u->image->upload();
	        	
	        	
	        	$ratio=(($u->image->original_width/108)<($u->image->original_height/108))?($u->image->original_width/108):($u->image->original_height/108);
			$u->image->width=intval(108*$ratio);
			$u->image->height=intval(108*$ratio);
			$u->image->x_axis=($u->image->original_width-$u->image->width)/2;
			$u->image->y_axis=($u->image->original_height-$u->image->height)/2;
			$u->image->maintain_ratio=false;
			$u->image->new_image="images/profile_image/main_image";
			$image_main=$u->image->crop();
			
			
			$image_main->width=108;
			$image_main->height=108;
			$image_main->resize();
			
			$ratio=(($u->image->original_width/48)<($u->image->original_height/48))?($u->image->original_width/48):($u->image->original_height/48);
			$u->image->width=intval(48*$ratio);
			$u->image->height=intval(48*$ratio);
			$u->image->x_axis=($u->image->original_width-$u->image->width)/2;
			$u->image->y_axis=($u->image->original_height-$u->image->height)/2;
			$u->image->maintain_ratio=false;
			$u->image->new_image="images/profile_image/short_image";
			$image_short=$u->image->crop();
			 
			$image_short->width=48;
			$image_short->height=48;
			$image_short->resize();	
	        	}
	        	catch(Exception $e){
	        	 	//$this->load->vars(array('upload_errors'=>$e->getMessage()));
	              	//$this->editUser($u->id);
	        }
		}
		if($u->save()){
			if($_FILES['userfile']){
        		$u->image->save_profile($u);
        		$u->image->save_user($u);
			}
				redirect('admin/user_manager/index?role_id='.$u->role_id,'refresh');
		}else{
              $this->load->vars(array('errors'=>$u->error->all));
              $this->editUser($u->id);
            
		}
    }
    
    
    function saveUser(){
    	$u= new User();
    	
    	$u->username=$this->input->post('username');
    	$u->email=$this->input->post('email');
    	$u->first_name=$this->input->post('first_name');
    	$u->last_name=$this->input->post('last_name');
    	$u->website=$this->input->post('website');
        $u->password=$this->input->post('password');
        $u->notification=$this->input->post('notification');
        $u->confirm_password=$this->input->post('confirm_password');
        $u->role_id=$this->input->post('role');
        $u->notification=$this->input->post('notification');
	$u->profile=$this->input->post('profile');
    	if($this->input->post('supervisor')){
	     $u->supervisor=$this->input->post('supervisor');
	}
        $u->is_active="1";
        
        
        if($_FILES['userfile']){
        		try {
        				$u->image=new File();
		        		$u->image->file='userfile';
		        		$u->image->upload_path="images/profile_image/original";
		        		$u->image->upload();
		        		
		        		
		        		$ratio=(($u->image->original_width/108)<($u->image->original_height/108))?($u->image->original_width/108):($u->image->original_height/108);
				        $u->image->width=intval(108*$ratio);
				        $u->image->height=intval(108*$ratio);
				        $u->image->x_axis=($u->image->original_width-$u->image->width)/2;
				        $u->image->y_axis=($u->image->original_height-$u->image->height)/2;
				        $u->image->maintain_ratio=false;
				        $u->image->new_image="images/profile_image/main_image";
				       	$image_main=$u->image->crop();
				       	
				       	
				       	$image_main->width=108;
		        		$image_main->height=108;
		        		$image_main->resize();
		        		
		        		$ratio=(($u->image->original_width/48)<($u->image->original_height/48))?($u->image->original_width/48):($u->image->original_height/48);
				        $u->image->width=intval(48*$ratio);
				        $u->image->height=intval(48*$ratio);
				        $u->image->x_axis=($u->image->original_width-$u->image->width)/2;
				        $u->image->y_axis=($u->image->original_height-$u->image->height)/2;
				        $u->image->maintain_ratio=false;
				        $u->image->new_image="images/profile_image/short_image";
				       	$image_short=$u->image->crop();
				       	 
				       	$image_short->width=48;
		        		$image_short->height=48;
		        		$image_short->resize();
        		}
        		catch(Exception $e){
	        	 	//$this->load->vars(array('upload_errors'=>$e->getMessage()));
	              	//this->editUser($u->id);
	        		}
        }
        if($u->save()){
        	if($u->notification==1){
	        	$config['mailtype']='html';
	        	$this->load->library('email',$config);
	
				$this->email->from('your@example.com', 'sudesh');
				$this->email->to($u->email);
				
				$this->email->subject('Email Test');
				$this->email->message($this->load->view('email','',TRUE));
				$this->email->send();
        	}
        	if($_FILES['userfile']){
        			$u->image->save_profile($u);
        			$u->image->save_user($u);
        	}
        			redirect('admin/user_manager/index?role_id='.$u->role_id,'refresh');
        		
                
        }else{
            $this->load->vars(array('errors'=>$u->error->all));
            $this->addUser($u->role_id);
            
        }
		
    }
    
    function editUser($user_id){
    	$user= new User($user_id);
    	$user->image->get();
	//echo "<pre>"; print_r($user->image->filename); exit;
    	$role=new Role($user->role->id);
	$roles=new Role();
	$roles->get();
	
	$supervisor=new User();
	$supervisor->where('role_id','2');
	$supervisor->or_where('role_id','1')->get();
	$this->load->vars(array('supervisors'=>$supervisor));
	
    	$this->load->vars(array('user'=>$user,'roles'=>$roles,'role'=>$role));
    	$this->load->view('admin/edit_user');
    }
    
	function deleteUser($user_id){
    	$user=new User($user_id);
	$role_id = $user->role->id; 
    	//$user->is_active='0';
    	if($user->delete()){
    		redirect('admin/user_manager/index?role_id='.$role_id,'refresh');
    	}else{
    		echo "unable to delete";
		redirect('admin/user_manager/index?role_id='.$role_id,'refresh');
    	}
    }
}  