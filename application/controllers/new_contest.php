<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class New_contest extends MY_Controller {
    
    public function __construct(){
    	parent::__construct();
    }
    
    public function index(){
    	$currency=new Currency();
	$currency->get();
	$time=time();
	$contest=new Contest();
	$contest->where('is_active','1');
	$contest->get();
	
	$i=0; $con=array();
	foreach($contest as $c){
	    $con[$i]=$c->id;
	    $i++;
	}
	    
	$event= new Contest($con[0]);
	if($event->result_count() > 0){
	    $this->load->vars(array('currencies'=>$currency,'contest'=>$event));
	    $this->load->view('new_contest'); 
	}
	else{
	    redirect('home','refresh');
	}
	
    }
    
    function readGuide(){
	$currency=new Currency();
	$currency->get();
	
	if($this->session->userdata('user_id')){
	     $this->load->view('read_guidelines');
	}
	else {
	      $this->load->view('contest_login');
	}
    }
    
    function submitDesign(){
	$currency=new Currency();
	$currency->get();
	
	if($this->session->userdata('user_id')){
	     $this->load->view('submit_design');
	}
	else {
	      redirect('contest_login','refresh');
	}
    }
    
    function saveDesign(){
	$this->load->helper(array('form', 'url'));

	$this->load->library('form_validation');

	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('description', 'Description', 'required');
	if ($this->form_validation->run() == FALSE)
	{
	    $this->submitDesign();
	}
	else
	{
	    $graph=new Graphic();
	    $graph->where('user_id',$this->session->userdata('user_id'))->get();
	    if(!isset($graph->id)){
		$g=new Graphic();	
		$g->title=$this->input->post('title');
		$g->description=$this->input->post('description');
		$g->date_added=time();
		$g->user_id=$this->session->userdata('user_id');
		
		$contest=new Contest();
		$contest->where('is_active','1');
		$contest->get();
		
		$i=0; $con=array();
		foreach($contest as $c){
		    $con[$i]=$c->id;
		    $i++;
		}
		
		$event= new Contest($con[0]);
		$g->contest_id=$event->id;
		if($_FILES["design"]){
			try {
				$gimage=new File();
				$gimage->file="design";
				$gimage->upload_path="images/graphic_image/original_image";
				$gimage->upload();
					
				$ratio=(($gimage->original_width/145)<($gimage->original_height/168))?($gimage->original_width/145):($gimage->original_height/168);
				$gimage->width=intval(145*$ratio);
				$gimage->height=intval(168*$ratio);
				$gimage->x_axis=($gimage->original_width-$gimage->width)/2;
				$gimage->y_axis=($gimage->original_height-$gimage->height)/2;
				$gimage->maintain_ratio=false;
				$gimage->new_image="images/graphic_image/thumb_image";
				$image_thumb=$gimage->crop();
				
				$image_thumb->width=145;
				$image_thumb->height=168;
				$image_thumb->resize();
				
				$gimage->save();
				$g->file_id=$gimage->id;
				
			}
			catch(Exception $e){
			       
			}
		    }
		if($g->save())
		{	
		    $this->load->vars(array('graph'=>true));
		    $this->load->view('design_thanks');
		}
		else 
		{
		    $this->load->vars(array('errors'=>$g->error->all));
		    $this->load->view('submit_design');
		}
	    }
	    else {
		 $this->load->vars(array('gerror'=>true));
		 $this->load->view('submit_design');
	    }
	}
    }
}