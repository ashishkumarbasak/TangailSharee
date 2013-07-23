<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contest_manager extends MY_Controller {
    
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
    	$contest=new Contest();
    	if($this->input->get()){
			//echo test; die;
		$test = $this->input->get();
		if(isset($test['name']) && !empty($test['name'] ))
		    $query_array['name'] = $test['name'];
		    
		if(isset($test['winner']) && !empty($test['winner'] ))
		    $query_array['winner'] = $test['winner'];
		
		 if(isset($query_array)){
		    $query = http_build_query($query_array);
		    if(isset($query_array['name']))
			$contest->like('name',$query_array['name']);
		
		    if(isset($query_array['winner']))
			$contest->like('winner',$query_array['winner']);
		 }
	}
	$contest->get();
	$count = $contest->result_count();
	
	$page=$this->input->get("page");
	$size=10;
	$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
	if(isset($query)){
	    $pagination['url']=base_url()."admin/contest_manager/index?".$query."&";
	}
	else{
		$pagination['url']=base_url()."admin/contest_manager/index?";
	}
	if(isset($query_array)){
		if(isset($query_array['name']))
			$contest->like('name',$query_array['name']);
		
		if(isset($query_array['winner']))
			$contest->like('winner',$query_array['winner']);
	}	
	$contest->order_by('id','desc');	
        $contest->get_paged($pagination['page'],$pagination['size']);
        
       
        
    	$this->load->vars(array('contests'=>$contest,));
    	$this->load->vars(array('pagination'=>$pagination));
    	$this->load->view('admin/list_contest');
    }
    
    function filter_index()
	{
		if($this->input->post())
		{
			$filter = $this->input->post();
			$query = http_build_query($filter);
			redirect("admin/contest_manager/index?$query&");
		}
	}
    
	function addContest(){
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
    	$this->load->view('admin/add_contest');    	
    }
    
	function saveContest(){
    	$c= new Contest();
    		
    	$c->name=$this->input->post('name');
    	$c->description=$this->input->post('description');
		   	
    	if($this->input->post('start_date')){
	    	$sdate=explode("/",$this->input->post('start_date'));
    		$c->start_date=mktime(0,0,0,$sdate[1],$sdate[0],$sdate[2]);
		}
    	if($this->input->post('end_date')){
	    	$edate=explode("/",$this->input->post('end_date'));
			$c->end_date=mktime(0,0,0,$edate[1],$edate[0],$edate[2]);
    	}
		if($this->input->post('enable')){
			$c->is_active='1';
			
			$contest=new Contest();
			$contest->get();
			foreach($contest as $con){
			    $con->is_active='0';
			    $con->save();
			}
		}
		else 
			$c->is_active='0';
		if($c->save()){
		   // $this->session->set_userdata('contest',$c->id);
		    redirect('admin/contest_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$c->error->all));
            $this->addContest();
            }
    }
    
    function editContest($contest_id){
	
		$contest=new Contest($contest_id);
		$contest->graphic->get();
		
		$sdate = date("d/m/Y",$contest->start_date); 

		$edate = date("d/m/Y",$contest->end_date); 
		$contest->start_date=$sdate;
		$contest->end_date=$edate;
		
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
		
    	$this->load->vars(array('contest'=>$contest));
    	$this->load->vars($this->data);
    	$this->load->view('admin/edit_contest');
    }
    
	function saveEditedContest(){
		$c=new Contest($this->input->post('contest_id'));
    		
    	$c->name=$this->input->post('name');
    	$c->description=$this->input->post('description');
    	$sdate=explode("/",$this->input->post('start_date'));
    	$edate=explode("/",$this->input->post('end_date'));

		if($this->input->post('start_date')){
	    	$sdate=explode("/",$this->input->post('start_date'));
    		$c->start_date=mktime(0,0,0,$sdate[1],$sdate[0],$sdate[2]);
		}
    	if($this->input->post('end_date')){
	    	$edate=explode("/",$this->input->post('end_date'));
			$c->end_date=mktime(0,0,0,$edate[1],$edate[0],$edate[2]);
    	}
    	
		if($this->input->post('enable')){
			$c->is_active='1';
			$contest=new Contest();
			$contest->where('id !=',$c->id)->get();
			foreach($contest as $con){
			    $con->is_active='0';
			    $con->save();
			}
			
		}
		else {
			$c->is_active='0';
			//$this->session->unset_userdata('contest');
		    }
		if($c->save()){
		    redirect('admin/contest_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$c->error->all));
            $this->editContest($c->id);
    	}
    }
    
	function deleteContest($contest_id){
	    $contest=new Contest($contest_id);
	    if($contest->delete()){
		    $g=new Graphic();
		    $g->where('contest_id',$contest_id)->get();
		    foreach($g as $gra){
			$gfile=new File($gra->image_id);
			unlink($gfile->filepath);
			unlink("images/graphic_image/thumb_image/".$gfile->filename);
			$gfile->delete();
		    }
		    redirect('admin/contest_manager','refresh');
	    }else{
		    echo "unable to delete";
	    }
    }
    
    
    function saveWinner(){
    	
    	$c= new Contest($this->input->post('contest_id'));
    	$c->winner=$this->input->post('winner');
    	if($c->save()){
    		redirect('admin/contest_manager','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$c->error->all));
		$this->editContest($c->id);
    	}
    }
    
    function contestGraphics($contest_id){
	
	$contest= new Contest($contest_id);
	
	$graphics=new Graphic();
	$graphics->where('contest_id',$contest_id)->get();
	$gfile=array();
	$guser='';
	foreach($graphics as $g){
	   
	    $user=new User($g->user_id);
	    $guser=$user->username;
	    $file=new File($g->file_id);
	    $gfile[$guser]=$g->id.','.$file->filename;
	}
	if(!empty($gfile) && !empty($guser)){
	    $this->load->vars(array('gfile'=>$gfile));
	}
	$this->load->vars(array('graphics'=>$graphics));
	$this->load->view('admin/contest_graphics');
    }
    
    function searchWinner($contest_id)
    {
	//echo 'hekll';die;
	//echo "<pre>"; print_r($uname);die;
        $username = trim($this->input->get('query')); //get term parameter sent via text field. Not sure how secure get() is
	//echo '<pre>';print_r($username);die;
	$graphic=new Graphic();
	$graphic->where('contest_id',$contest_id);
	$graphic->like_related_user('username',$username);
	$graphic->get();
	
	$count=$graphic->result_count();
        $data['query'] = $username; //If username exists set true
        $data['suggestions'] = array();
        if ($count > 0) 
        {
            //$data['message'] = array(); 

            foreach ($graphic as $row)
            {
		//echo $row->user->username; die;
                $data['suggestions'][] =  $row->user->username;
                
		
            }    
        } 
        echo json_encode($data);
    }
    
    function downloadGraphic() {
	$image_name=$this->input->get('name');
	$this->load->helper('download');
	//$image_name = "mypic.jpg';
	
	$data = file_get_contents(base_url().'images/graphic_image/original_image/'.$image_name); // Read the file's contents
	force_download($image_name, $data);
    }
    
    function deleteGraphic($graphic_id) {
	
	$g=new Graphic($graphic_id);
	$file_id=$g->file_id;
	$contest_id=$g->contest_id;
	if($g->delete()){
	    $file= new File($file_id);
	    unlink($file->filepath);
	    unlink("images/graphic_image/thumb_image/".$file->filename);
	    $file->delete();
	    redirect('admin/contest_manager/contestGraphics/'.$contest_id,'refresh');
	}else{
		 echo "unable to delete";
	 }
    }
}  