<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upcoming_designs extends MY_Controller {
    
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
    	$design=new Upcoming_design();
    	if($this->input->get()){
	     $test = $this->input->get();
	    if(isset($test['title']) && !empty($test['title'] ))
		$query_array['title'] = $test['title'];
		
	    if(isset($test['designer']) && !empty($test['designer'] ))
		$query_array['designer'] = $test['designer'];
		
	    if(isset($test['status']) && !empty($test['status']))
		$query_array['status'] = $test['status'];
	    
			
	    if(isset($query_array)){
		$query = http_build_query($query_array);
		//echo "<pre>";print_r($query_array);die;
		if(isset($query_array['title']))
			$design->like('title',$query_array['title']);
			
		if(isset($query_array['designer']))
			$design->like_related_user('first_name',$query_array['designer']);
		
		if(isset($query_array['status']))
			$design->like('status',$query_array['status']);
	    }
	}
	$design->get();
	$count = $design->result_count();
	
	$page=$this->input->get("page");
	$size=10;
	$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
	if(isset($query)){
		//echo "test";die;
			$pagination['url']=base_url()."admin/upcoming_designs/index?".$query."&";
	}
	else{
		$pagination['url']=base_url()."admin/upcoming_designs/index?";
	}
	
	//$design->where('is_active','1');
	
	if(isset($query_array)){
	     if(isset($query_array['title']))
			$design->like('title',$query_array['title']);
			
	    if(isset($query_array['designer']))
			$design->like_related_user('first_name',$query_array['designer']);
		
	    if(isset($query_array['status']))
			$design->like('status',$query_array['status']);
	}
	$design->order_by('date_added','desc');
	$design->get_paged($pagination['page'],$pagination['size']);
        
    	$this->load->vars(array('designs'=>$design));
    	$this->load->vars(array('pagination'=>$pagination));
    	$this->load->view('admin/upcoming_designs');
    }
    
    function filter_index()
    {
		if($this->input->post())
		{
			$filter = $this->input->post();
			$query = http_build_query($filter);
			redirect("admin/upcoming_designs/index?$query&");
		}
    }
    
    function addUpdesign(){
    	$designer=new User();
    	$designer->where('role_id','3')->get();
    	
    	
    	$this->load->vars(array('designers'=>$designer));
    	$this->load->view('admin/add_updesign');    	
    }
    
	function saveDesign(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('user_id', 'Designer', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$designer=new User();
	    	$designer->where('role_id','3')->get();
	    	
	    	$this->load->vars(array('designers'=>$designer));
			$this->load->view('admin/add_updesign');
		}
		else
		{
		
	    	$d=new Upcoming_design();	
	    	$d->title=$this->input->post('title');
	    	
	    	$d->user_id=$this->input->post('user_id');
	    	$d->status=$this->input->post('status');
	        $d->date_added=now();
			if($d->save())
			{
					if($_FILES["design"]){
					try {		
								$d->file=new File();
								
						        $d->file->file="design";
						        $d->file->upload_path="images/upcoming_images/original_image";
						        $d->file->upload();
								
								$ratio=(($d->file->original_width/145)<($d->file->original_height/168))?($d->file->original_width/145):($d->file->original_height/168);
						        $d->file->width=intval(145*$ratio);
						        $d->file->height=intval(168*$ratio);
						        $d->file->x_axis=($d->file->original_width-$d->file->width)/2;
						        $d->file->y_axis=($d->file->original_height-$d->file->height)/2;
						        $d->file->maintain_ratio=false;
						        $d->file->new_image="images/upcoming_images/thumb_image";
						        $image_thumb=$d->file->crop();
						        
						        $image_thumb->width=145;
						        $image_thumb->height=168;
						       	$image_thumb->resize();
						        
								$ratio=(($d->file->original_width/236)<($d->file->original_height/292))?($d->file->original_width/236):($d->file->original_height/292);
						        $d->file->width=intval(236*$ratio);
						        $d->file->height=intval(292*$ratio);
						        $d->file->x_axis=($d->file->original_width-$d->file->width)/2;
						        $d->file->y_axis=($d->file->original_height-$d->file->height)/2;
						       	$d->file->maintain_ratio=false;
						        $d->file->new_image="images/upcoming_images/list_image";
						        $image_list=$d->file->crop();
						        
						        $image_list->width=236;
						        $image_list->height=292;
						        $image_list->resize();
						         
						        $ratio=(($d->file->original_width/631)<($d->file->original_height/609))?($d->file->original_width/631):($d->file->original_height/609);
						        $d->file->width=intval(631*$ratio);
						        $d->file->height=intval(609*$ratio);
						        $d->file->x_axis=($d->file->original_width-$d->file->width)/2;
						        $d->file->y_axis=($d->file->original_height-$d->file->height)/2;
						       	$d->file->maintain_ratio=false;
						        $d->file->new_image="images/upcoming_images/full_image";
						        $image_full=$d->file->crop();
						        
						        $image_full->width=631;
						        $image_full->height=609;
						        $image_full->resize();
						        
						        
						        $d->file->save($d);
		        		}
						catch(Exception $e){
			        	 		//echo $e->getMessage();exit;
			              		//this->editUser($u->id);
			        		}
					}
					redirect('admin/upcoming_designs','refresh');
		    	}
		    	else 
		    	{
		    		$this->load->vars(array('errors'=>$d->error->all));
		            $this->addUpdesign();
		        }
		}
    }
    
	function editDesign($design_id){
		
		$design=new Upcoming_design($design_id);
		$design->file->include_join_fields($design)->get();
		$design->comment->include_join_fields($design);
		$design->comment->order_by('date','asc')->get();
   		$img=$design->file->filename;
		$img_id=$design->file->id;
		
		$i=0;
    	if(isset($design->comment->id)){
	    	foreach($design->comment as $c){
	    		$c->user->get();
	    		$u=array();
	    		$u=new User($c->user->id);
	    		$uname[$i]=$u->first_name.' '.$u->last_name;
	    		$u->image->get();
	    		$pic[$i]=$u->image->filename;
	    		$i++;
    		}
    		$this->load->vars(array('pic'=>$pic,'uname'=>$uname));
    	}
	
	if($design->subscribors != ''){
	    $sub=$design->subscribors;
	    $emails=explode(',',$sub);
	    $this->load->vars(array('emails'=>$emails));
	}
	$designer=new User();
    	$designer->where('role_id','3')->get();
    	
    	$user=new User($design->comment->user_id);
    	$user->image->get();
    	
    	$this->load->vars(array('designers'=>$designer));
    	$this->load->vars(array('design'=>$design,'img'=>$img,'img_id'=>$img_id,'user'=>$user));
    	$this->load->view('admin/add_updesign');
    }
    
    function saveEditedDesign(){
    	$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('user_id', 'Designer', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$designer=new User();
	    	$designer->where('role_id','3')->get();
	    	
	    	$this->load->vars(array('designers'=>$designer));
			$this->load->view('admin/add_updesign');
		}
		else
		{
		
	    	$d=new Upcoming_design($this->input->post('design_id'));	
	    	$d->title=$this->input->post('title');
	    	
	    	$d->user_id=$this->input->post('user_id');
	    	$d->status=$this->input->post('status');
			$d->date_added=now();
	        
			if($d->save())
			{	
					if($_FILES["design"]){
					try {
								$d->file=new File();
						        $d->file->file="design";
						        $d->file->upload_path="images/upcoming_images/original_image";
						        $d->file->upload();
								
								$ratio=(($d->file->original_width/145)<($d->file->original_height/168))?($d->file->original_width/145):($d->file->original_height/168);
						        $d->file->width=intval(145*$ratio);
						        $d->file->height=intval(168*$ratio);
						        $d->file->x_axis=($d->file->original_width-$d->file->width)/2;
						        $d->file->y_axis=($d->file->original_height-$d->file->height)/2;
						        $d->file->maintain_ratio=false;
						        $d->file->new_image="images/upcoming_images/thumb_image";
						        $image_thumb=$d->file->crop();
						        
						        $image_thumb->width=145;
						        $image_thumb->height=168;
						        $image_thumb->resize();
						        
								$ratio=(($d->file->original_width/236)<($d->file->original_height/292))?($d->file->original_width/236):($d->file->original_height/292);
						        $d->file->width=intval(236*$ratio);
						        $d->file->height=intval(292*$ratio);
						        $d->file->x_axis=($d->file->original_width-$d->file->width)/2;
						        $d->file->y_axis=($d->file->original_height-$d->file->height)/2;
						       	$d->file->maintain_ratio=false;
						        $d->file->new_image="images/upcoming_images/list_image";
						        $image_list=$d->file->crop();
						        
						        
						        $image_list->width=236;
						        $image_list->height=292;
						        $image_list->resize();
						        
						        $ratio=(($d->file->original_width/631)<($d->file->original_height/609))?($d->file->original_width/631):($d->file->original_height/609);
						        $d->file->width=intval(631*$ratio);
						        $d->file->height=intval(609*$ratio);
						        $d->file->x_axis=($d->file->original_width-$d->file->width)/2;
						        $d->file->y_axis=($d->file->original_height-$d->file->height)/2;
						       	$d->file->maintain_ratio=false;
						        $d->file->new_image="images/upcoming_images/full_image";
						        $image_full=$d->file->crop();
						        
						        $image_full->width=631;
						        $image_full->height=609;
						        $image_full->resize();
						        
								if (isset($d->file) && $d->file->id != $this->input->post("file")){
									$file=new File($this->input->post("file"));
									unlink($file->filepath);
									unlink("images/upcoming_images/list_image/".$file->filename);
									unlink("images/upcoming_images/thumb_image/".$file->filename);
									unlink("images/upcoming_images/full_image/".$file->filename);
									$file->delete($d);
									$file->delete();
								}
								
						        $d->file->save($d);
		        		}
						catch(Exception $e){
			        	 		//echo $e->getMessage();exit;
			              		//this->editUser($u->id);
			        		}
					}
					redirect('admin/upcoming_designs','refresh');
		    	}
		    	else 
		    	{
		    		$this->load->vars(array('errors'=>$d->error->all));
		            $this->addUpdesign();
		        }
		}
    }
    
	function deleteDesign($design_id){
    	$design=new Upcoming_design($design_id);
    	$design->file->include_join_fields($design)->get();
    	
    	$file=new File($design->file->id);
    	
		unlink($file->filepath);
		unlink("images/upcoming_images/list_image/".$file->filename);
		unlink("images/upcoming_images/thumb_image/".$file->filename);
		unlink("images/upcoming_images/full_image/".$file->filename);
		$file->delete($design);
		$file->delete();
    	$design->delete();
    	redirect('admin/upcoming_designs','refresh');
    	
    }
    
    function saveComment($design_id){
    	$comment=$this->input->post('comment');
    	$c=new Comment();
    	$c->content=$comment;
    	$c->user_id=$this->session->userdata('user_id');
    	$format = 'DATE_RFC822';
		$time = time();
		$c->date=$time;
		$std_date=standard_date($format, $time);
		
		$d=new Upcoming_design($design_id);
		
		if($c->save()){
			$c->save($d);
			redirect('admin/upcoming_designs/editDesign/'.$design_id);
		}
		else {
			$this->load->vars(array('errors'=>$c->error->all));
		}
		//$this->load->vars(array('comments'=>$c));
    }
    
    function deleteComment($comment_id){
    	$c=new Comment($comment_id);
    	$c->upcoming_design->get();
    	$design_id=$c->upcoming_design->id;
    	$c->delete();
    	redirect('admin/upcoming_designs/editDesign/'.$design_id);
    }
}  
