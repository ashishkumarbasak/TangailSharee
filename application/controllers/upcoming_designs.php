<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upcoming_designs extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $design=new Upcoming_design();
        $design->where('status','1');
        $design->order_by('date_added','desc');
        $design->limit(8);
        $design->get();
       	foreach($design as $d){
			$d->file->include_join_fields($d)->get();
       	}
		$this->load->vars(array('designs'=>$design,'twilab'=>TRUE));
		$this->load->view("upcoming_design_gallery");
    }
    
    function singleDesign() {
    	$design_id=$this->input->get('id');
    	$design=new Upcoming_design($design_id);
    	$design->file->include_join_fields($design)->get();
    	$design->comment->include_join_fields($design)->get();
    	$design->comment->order_by('date','asc')->get();
    	$i=0;
    	if(isset($design->comment->id)){
	    	foreach($design->comment as $c){
	    		$c->user->get();
	    		$u=array();
	    		$u=new User($c->user->id);
	    		$uname[$i]=$u->first_name.' '.$u->last_name;
	    		$u->image->get();
	    		$img[$i]=$u->image->filename;
	    		$i++;
    		}
    		$this->load->vars(array('img'=>$img,'uname'=>$uname));
    	}
    	$loged_user=new User($this->session->userdata('user_id'));
    	$loged_user->image->get();
    	
    	if(!$loged_user){
    		return false;
    	}
	
	//new arrivals/popular
    	$product=new Product();
	$product->where('is_active','1')->get();
    	
	
    	$pro_size=new Size();
    	$pro_size->get();
    	$i=0;
    	foreach ($pro_size as $ps){
    		$ps->product->where_join_field($ps,"stock >",'0')->get();
	    	$prods=$ps->product;
	    	foreach ($prods as $p){
	    		$pid[$i]=$p->id;
	    		$i++;
	    	}
    	}
    	
    	$prod=array_unique($pid);
	
	$product->where_in('id',$prod);
	$product->order_by('date_added','desc');
	//$product->order_by_func('RAND',4);
	$product->limit(4)->get();
    	//$product->order_by('sold','desc')->get();
	
        foreach($product as $p){
	    $p->file->where_join_field($p,'type','featured');
	    $p->file->include_join_fields()->get();
	   // echo $p->file->filename."<br />"; 
        }
	//die;
    	$this->load->vars(array('design'=>$design,'product'=>$product,'twilab'=>TRUE,'loged_user'=>$loged_user));
    	$this->load->view("upcoming_design");
    }	
    
	function saveComment($design_id){
		if ($this->session->userdata('login',TRUE)){
	    	$comment=$this->input->post('comment');
	    	$c=new Comment();
	    	$c->content=$comment;
	    	$c->user_id=$this->session->userdata('user_id');
	    	$format = 'DATE_RFC822';
			$time = time();
			$c->date=$time;
			
			$d=new Upcoming_design($design_id);
			
			if($c->save()){
				$c->save($d);
				redirect('upcoming_designs/singleDesign?id='.$design_id,'refresh');
			}
			else {
				$this->load->vars(array('errors'=>$c->error->all));
			}
		}
		else {
			$this->load->view('user/login_register');
		}
		//$this->load->vars(array('comments'=>$c));
    }
    
    function notifyEmail(){
    	$design_id=$this->input->post('design_id');
	$design=new Upcoming_design($design_id); 
		
	    	$email=$this->input->post('email_notify');
		$design->subscribors = $design->subscribors.','.$email;
		$design->save();
	    	$config['mailtype']='html';
        	$this->load->library('email',$config);

		$this->email->from('your@example.com', 'sudesh');
		$this->email->to($email);
		
		$this->email->subject('Notify Email');
		$this->email->message($this->load->view('email_notify','',TRUE));
		$this->email->send();
		
		$this->load->vars(array('email_sent'=>TRUE));
		redirect('upcoming_designs/singleDesign?id='.$design_id.'&email=sent','refresh');
    }
}
