<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
       /* 
    	if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isSuperAdmin()){
                redirect('admin/login','refresh');
            }
        }  else {
            redirect('admin/login','refresh');
        }
        */
        
        if(isset($_COOKIE["c"]))
           $pref_currency_type = $_COOKIE["c"];
        else
           $pref_currency_type = "GBP";   
        $this->load->vars(array('pref_currency_type'=>$pref_currency_type));
    }
    
    public function index($des_id){
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
        
        $product->where('is_active','1');
        $count=$product->where('user_id',$des_id)->count();
		
        $page=$this->input->get("page");
        $size=12;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."profile/index/".$des_id.'?';
        $product->where('is_active','1');
        $product->where('user_id',$des_id)->get_paged($pagination['page'],$pagination['size']);
        
        foreach($product as $p){
       	   $p->file->where_join_field($p,'default','1');
			$p->file->where_join_field($p,'type <>','featured');
			$p->file->order_by('RAND()');
			$p->file->limit(1);
    		$p->file->include_join_fields()->get();
       	}
        
        $user=new User($des_id);
        //$user->get();
        $user->image->get();
		$user->address->where_join_field('type','shipping')->get();
		$this->load->vars(array('des_profile'=>TRUE));
    	$this->load->vars(array('products'=>$product,'user'=>$user,'pagination'=>$pagination,'wishlist'=>$this->getWishlistProducts()));
        $this->load->view('profile');
    }
}