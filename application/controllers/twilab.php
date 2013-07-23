<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twilab extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
	$design=new Upcoming_design();
        $design->where('status','1');
        $design->order_by('date_added','desc');
        $design->limit(4);
        $design->get();
       	foreach($design as $d){
			$d->file->include_join_fields($d)->get();
       	}
	$this->load->vars(array('designs'=>$design));
	
	$post=new Wp_posts();
	$post->where('post_status','publish');
	$post->order_by('post_date','desc');
	$post->get();
	
	$count=$post->count();
	
	$page=$this->input->get("page");
        $size=3;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."twilab?";
        $post->get_paged($pagination['page'],$pagination['size']);
	
    	$user=array();
	foreach($post as $p){
	    $post_user=new User($p->post_author);
	    $user[$p->post_author]=$post_user->first_name.' '.$post_user->last_name;
	}
	
	$this->load->vars(array('posts'=>$post,'twilab'=>TRUE,'user'=>$user,'pagination'=>$pagination));
	
        $this->load->view('twilab');
      
		//$args = array( 'numberposts' => '5' );
		//$recent_posts = wp_get_recent_posts( $args );
		//echo "<pre>";
		//print_r($recent_posts);
    }
    
}
