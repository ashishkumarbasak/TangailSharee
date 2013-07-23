<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_manager extends MY_Controller {
    
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
    	$project=new Project();
	
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
				$project->like('title',$query_array['title']);
				
			if(isset($query_array['designer']))
				$project->like_related_user('first_name',$query_array['designer']);
			
			if(isset($query_array['status']))
				$project->like('status',$query_array['status']);
		    }
		}
		$project->get();
		$count = $project->result_count();
		
		$page=$this->input->get("page");
		$size=10;
		$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
		if(isset($query)){
		    $pagination['url']=base_url()."admin/project_manager/index?".$query."&";
		}
		else{
			$pagination['url']=base_url()."admin/project_manager/index";
		}
		
		$project->where('is_active','1');
		if(isset($query_array)){
		    if(isset($query_array['title']))
			       $project->like('title',$query_array['title']);
			       
		   if(isset($query_array['designer']))
			       $project->like_related_user('first_name',$query_array['designer']);
		       
		   if(isset($query_array['status']))
			       $project->like('status',$query_array['status']);
		}
		$project->order_by('date_added','ASC')->get_paged($pagination['page'],$pagination['size']);
        
    	$this->load->vars(array('projects'=>$project));
    	$this->load->vars(array('pagination'=>$pagination));
    	$this->load->view('admin/list_project');
    }
    
    function filter_index()
	{
		if($this->input->post())
		{
			$filter = $this->input->post();
			$query = http_build_query($filter);
			redirect("admin/project_manager/index?$query&");
		}
	}
    
    
	function addProject(){
    	$designer=new User();
    	$designer->where('role_id','3')->get();
    	
    	$this->load->vars(array('designers'=>$designer));
    	$this->load->view('admin/add_project');    	
    }
    
	function saveProject(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('date_added', 'Date Added', 'required');
		$this->form_validation->set_rules('user_id', 'Designer', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$designer=new User();
	    	$designer->where('role_id','3')->get();
	    	
	    	$this->load->vars(array('designers'=>$designer));
			$this->load->view('admin/add_project');
		}
		else
		{
		
    	$p=new Project();	
    	$p->title=$this->input->post('title');
    	$p->description=$this->input->post('description');
		   	
    	if($this->input->post('date_added')){
	    	$sdate=explode("/",$this->input->post('date_added'));
    		$p->date_added=mktime(0,0,0,$sdate[1],$sdate[0],$sdate[2]);
		}
    	if($this->input->post('date_accept')){
	    	$edate=explode("/",$this->input->post('date_accept'));
			$p->date_accept=mktime(0,0,0,$edate[1],$edate[0],$edate[2]);
    	}
    	$p->user_id=$this->input->post('user_id');
    	$p->status=$this->input->post('status');
		$p->is_active='1';
        
		if($p->save())
		{	
				if($_FILES["design"]){
				try {
					$p->file=new File();
					$p->file->file="design";
					$p->file->upload_path="images/project_image/original_image";
					$p->file->upload();
						
					$ratio=(($p->file->original_width/145)<($p->file->original_height/168))?($p->file->original_width/145):($p->file->original_height/168);
					$p->file->width=intval(145*$ratio);
					$p->file->height=intval(168*$ratio);
					$p->file->x_axis=($p->file->original_width-$p->file->width)/2;
					$p->file->y_axis=($p->file->original_height-$p->file->height)/2;
					$p->file->maintain_ratio=false;
					$p->file->new_image="images/project_image/thumb_image";
					$image_thumb=$p->file->crop();
					
					$image_thumb->width=145;
					$image_thumb->height=168;
					$image_thumb->resize();
					
					$ratio=(($p->file->original_width/236)<($p->file->original_height/292))?($p->file->original_width/236):($p->file->original_height/292);
					$p->file->width=intval(236*$ratio);
					$p->file->height=intval(292*$ratio);
					$p->file->x_axis=($p->file->original_width-$p->file->width)/2;
					$p->file->y_axis=($p->file->original_height-$p->file->height)/2;
					$p->file->maintain_ratio=false;
					$p->file->new_image="images/project_image/list_image";
					$image_list=$p->file->crop();
					
					
					$image_list->width=236;
					$image_list->height=292;
					$image_list->resize();
					$p->file->save($p);
	        		}
				catch(Exception $e){
					//echo $e->getMessage();exit;
				//this->editUser($u->id);
				}
			    }
		
			if($p->status == 'Accepted'){
			    $email = new Email(6);
			    $msg = $email->template;
			    $from = $email->from_email;
			    $to = $p->user->email;
			    $msg = str_Replace("{user_id}",$p->user->first_name,$msg);
			    $config['mailtype']='html';
			    $this->load->library('email',$config);
	    
			    $this->email->from($from, 'Twinne');
			    $this->email->reply_to($email->re_email);
			    $this->email->to($to);
			    
			    $this->email->subject('Design approvel');
			    $this->email->message($msg,TRUE);
			    $this->email->send();
			}
			
			redirect('admin/project_manager','refresh');
	    	}
	    	else 
	    	{
	    		$this->load->vars(array('errors'=>$p->error->all));
	            $this->addProject();
	        }
		}
    }
    
	function editProject($project_id){
		
		$project=new Project($project_id);
		$project->file->include_join_fields($project)->get();
   		/*$i=0;$img = array();
		foreach ($project->file as $p ){
   			$img[$i] =  $p->filename;
   			$img_id[$i]=$p->id;
   			$i++;
   		}*/
		$sdate = date("j/n/Y",$project->date_added); 
		if($project->date_accept){
			$edate = date("j/n/Y",$project->date_accept); 
			$project->date_accept=$edate;
		}
		$project->date_added=$sdate;
		
		$project->comment->include_join_fields($project);
		$project->comment->order_by('date','asc')->get();
   		
		$i=0;
    	if(isset($project->comment->id)){
	    	foreach($project->comment as $c){
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
		
	$designer=new User();
    	$designer->where('role_id','3')->get();
    	
    	$user=new User($project->comment->user_id);
    	$user->image->get();
    	
    	$this->load->vars(array('designers'=>$designer,'user'=>$user));
    	$this->load->vars(array('project'=>$project));
    	$this->load->view('admin/add_project');
    }
    
    function saveEditedProject(){
    	$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('date_added', 'Date Added', 'required');
		$this->form_validation->set_rules('user_id', 'Designer', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/add_project');
		}
		else
		{
    	$p=new Project($this->input->post('project_id'));	
    		
    	$p->title=$this->input->post('title');
    	$p->description=$this->input->post('description');
		   	
    	if($this->input->post('date_added')){
	    	$sdate=explode("/",$this->input->post('date_added'));
    		$p->date_added=mktime(0,0,0,$sdate[1],$sdate[0],$sdate[2]);
		}
    	if($this->input->post('date_accept')){
	    	$edate=explode("/",$this->input->post('date_accept'));
			$p->date_accept=mktime(0,0,0,$edate[1],$edate[0],$edate[2]);
    	}
    	$p->user_id=$this->input->post('user_id');
    	$p->status=$this->input->post('status');
		$p->is_active='1';
        
		if($p->save())
		{	
			if($p->status == 'Accepted')
			{
			    $email = new Email(6);
			    $msg = $email->template;
			    $from = $email->from_email;
			    $to = $p->user->email;
			    $msg = str_Replace("{user_id}",$p->user->first_name,$msg);
			    $config['mailtype']='html';
			    $this->load->library('email',$config);
	    
			    $this->email->from($from, 'Twinne');
			    $this->email->reply_to($email->re_email);
			    $this->email->to($to);
			    
			    $this->email->subject('Design approvel');
			    $this->email->message($msg,TRUE);
			    $this->email->send();
			}
			
			//print_r($_FILES);
			
			if($_FILES["design"])
			{
	        		try {
							$p->file=new File();
					        $p->file->file="design";
					        $p->file->upload_path="images/project_image/original_image";
							//echo  $p->file->upload_path;
					        $p->file->upload();
							
							//print_r($_FILES);
							//exit(0);
			
							$ratio=(($p->file->original_width/145)<($p->file->original_height/168))?($p->file->original_width/145):($p->file->original_height/168);
					        $p->file->width=intval(145*$ratio);
					        $p->file->height=intval(168*$ratio);
					        $p->file->x_axis=($p->file->original_width-$p->file->width)/2;
					        $p->file->y_axis=($p->file->original_height-$p->file->height)/2;
					        $p->file->maintain_ratio=false;
					        $p->file->new_image="images/project_image/thumb_image";
					        $image_thumb=$p->file->crop();
							
							$image_thumb->width=145;
					        $image_thumb->height=168;
					        $image_thumb->resize();
							
							
							$ratio=(($p->file->original_width/101)<($p->file->original_height/118))?($p->file->original_width/101):($p->file->original_height/118);
			    			$p->file->width=intval(101*$ratio);
			    			$p->file->height=intval(118*$ratio);
			    			$p->file->x_axis=($p->file->original_width-$p->file->width)/2;
			    			$p->file->y_axis=($p->file->original_height-$p->file->height)/2;
			    			$p->file->maintain_ratio=false;
			    			$p->file->new_image="images/project_image/front_image";
			    			$image_front=$p->file->crop();
							
							$image_front->width=101;
			   				$image_front->height=118;
			    			$image_front->resize();
						
							$ratio=(($p->file->original_width/236)<($p->file->original_height/292))?($p->file->original_width/236):($p->file->original_height/292);
					        $p->file->width=intval(236*$ratio);
					        $p->file->height=intval(292*$ratio);
					        $p->file->x_axis=($p->file->original_width-$p->file->width)/2;
					        $p->file->y_axis=($p->file->original_height-$p->file->height)/2;
					       	$p->file->maintain_ratio=false;
					        $p->file->new_image="images/project_image/list_image";
					        $image_list=$p->file->crop();
					        
					        
					        $image_list->width=236;
					        $image_list->height=292;
					        $image_list->resize();
					        
					        $p->file->save($p);
	        		}
					catch(Exception $e){
		        	 		//echo $e->getMessage();exit(0);
		              		//this->editUser($u->id);
		        		}
				}
			
				redirect('admin/project_manager','refresh');
    	}
	    	else 
	    	{
	    		$this->load->vars(array('errors'=>$p->error->all));
	            $this->addProject();
	        }
		}
    }
    
	function deleteProject($project_id){
    	$project=new Project($project_id);
    	//echo "<pre>"; print_r($project->delete()); die;
    	if($project->delete()){
    		redirect('admin/project_manager','refresh');
    	}else{
    		redirect('admin/project_manager','refresh');
    	}
    }
    
    function saveComment($project_id){
    	$comment=$this->input->post('comment');
    	$c=new Comment();
    	$c->content=$comment;
    	$c->user_id=$this->session->userdata('user_id');
    	$format = 'DATE_RFC822';
	$time = time();
	$c->date=$time;
	$std_date=standard_date($format, $time);
	
	$d=new Project($project_id);
	
	if($c->save()){
		$c->save($d);
		redirect('admin/project_manager/editProject/'.$project_id);
	}
	else {
		$this->load->vars(array('errors'=>$c->error->all));
	}
		//$this->load->vars(array('comments'=>$c));
    }
    
    function deleteComment($comment_id){
    	$c=new Comment($comment_id);
    	$c->project->get();
    	$project_id=$c->project->id;
    	$c->delete();
    	redirect('admin/project_manager/editProject/'.$project_id);
    }
}  