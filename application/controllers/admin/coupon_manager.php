<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupon_manager extends MY_Controller {
    
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
        $coupon = new Coupon();
        $count=$coupon->where('is_active','1')->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/coupon_manager";
        
        
        $coupon->where('is_active','1')->get_paged($pagination['page'],$pagination['size']);
		
        $this->load->vars(array('coupons'=>$coupon));
        $this->load->vars(array('pagination'=>$pagination));
        $this->load->view('admin/list_coupon');
    }
    
    
    
	
	
    function addCoupon(){
    	$this->load->view('admin/add_coupon');
    }
    
    
    
    function saveCoupon(){
	
	$this->load->library('form_validation');

	$this->form_validation->set_rules('name', 'Coupon Name', 'required');
	$this->form_validation->set_rules('total_amount', 'Total Amount', 'required|integer|greater_than[0]');
	$this->form_validation->set_rules('start_date', 'Start Date', 'required');
	if ($this->form_validation->run() == FALSE)
	{
		
		$this->addCoupon();
	}
	else
	{
	    if($this->input->post('coupon_id'))
		    $c=new Coupon($this->input->post('coupon_id'));
	    else
		    $c=new Coupon();
		$c->name=$this->input->post('name');
		if($this->input->post('code'))
			$c->code=$this->input->post('code');
		$c->type=$this->input->post('type');
		$c->discount=$this->input->post('discount');
		$c->total_amount=$this->input->post('total_amount');
		
		if($this->input->post('start_date')){
			$sdate=explode("/",$this->input->post('start_date'));
			$c->start_date=mktime(0,0,0,$sdate[1],$sdate[0],$sdate[2]);
			}
		if($this->input->post('end_date')){
			$edate=explode("/",$this->input->post('end_date'));
				$c->end_date=mktime(0,0,0,$edate[1],$edate[0],$edate[2]);
	    }
	    if($this->input->post('uses_coupon') && $this->input->post('uses_customer')){
		$c->uses_coupon=$this->input->post('uses_coupon');
	    }
	    else{
		$c->uses_coupon='0';
	    }
	    if($this->input->post('uses_customer')){
		$c->uses_customer=$this->input->post('uses_customer');
	    }
	    else{
		$c->uses_customer='0';
	    }
	    
	    if(!$this->input->post('status'))
			    $c->status='0';
		    else 
			    $c->status='1';
		    if($c->save()){
		    redirect('admin/coupon_manager','refresh');
	    }
	    else {
		    //var_dump($c->error->all);
		    $this->load->vars(array('errors'=>$c->error->all));
		    $this->addCoupon();
	    }
	}
	}
	    
	function editCoupon($coupon_id){
	    $coupon=new Coupon($coupon_id);
		    $sdate = date("j/n/Y",$coupon->start_date); 
    
		    $edate = date("j/n/Y",$coupon->end_date); 
		    $coupon->start_date=$sdate;
		    $coupon->end_date=$edate;
		    
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
		    
	    $this->load->vars(array('coupon'=>$coupon));
	    $this->load->vars($this->data);
	    $this->load->view('admin/add_coupon');
    }
	
    
    
    function deleteCoupon($coupon_id){
    	$coupon=new Coupon($coupon_id);
    	if($coupon->delete()){
    		redirect('admin/coupon_manager','refresh');
    	}
    }
    
    /* * function for product history
     * @params coupon id
     * @returns Orders which is placed by using of given coupon
     *  @author Krishna 
     */
    function couponhistory($coupon_id)
    {
    	$order = new Order();
    	$order->where('coupon_id',$coupon_id)->get();
    	$coupon = new Coupon($coupon_id);
    	$this->load->vars(array('order'=>$order, 'coupon'=>$coupon));
    	$this->load->view('admin/couponhistory');
    	//echo "<pre>";print_r($order->user->username);die;
    }
    /*function productManager($coupon_id){
    	$product=new Product();
    	$product->get();
    	
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
    	
    	$product->where('is_active','1');
    	$count=$product->where_in('id',$prod)->count();
		
        $page=$this->input->get("page");
        $size=8;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."admin/coupon_manager/productManager/".$coupon_id;
        $product->where('is_active','1');
        $product->where_in('id',$prod)->get_paged($pagination['page'],$pagination['size']);
        
    	foreach ($product as $p){
    		$p->size->where_join_field($p,'stock >','0');
    		$p->size->include_join_fields()->get();
    		
    		$p->file->where_join_field($p,'type','man');
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();	
    		
    		$p->coupon->where('id',$coupon_id);
            $p->coupon->include_join_fields()->get();
		}
		
		$coupon=new Coupon($coupon_id);
		$coupon->product->include_join_fields($coupon)->get();
    	
    	
    	$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'coupon'=>$coupon));
        $this->load->view('admin/coupon_products');
    }
    
    function saveCouponProduct(){
    	$man_prod=$this->input->post('man');
    	$woman_prod=$this->input->post('woman');
    	$coupon_id=$this->input->post('coupon_id');
    	$coupon=new Coupon($coupon_id);
    	
    	if(!empty($man_prod) || !empty($woman_prod)){
    		$i=0;
	    	foreach($man_prod as $key=>$value){ 
	            $product=new Product($key);
	            
	            if(array_key_exists($key,$woman_prod)){
	                if($product->save($coupon)){
	                    $product->set_join_field($coupon,'type','both');
	                }else{
	                    foreach($product->error->all as $k=>$e){
	                        echo $k.$e;
	                    }
	                }
	                $both[$i]=$key;
	    		}
	    		
	    		else {
	    			if($product->save($coupon)){
	                    $product->set_join_field($coupon,'type','man');
	                }else{
	                    foreach($product->error->all as $k=>$e){
	                        echo $k.$e;
	                    }
	                }
	    		}
	    		$i++;
	        }
	        foreach($woman_prod as $key=>$value){ 
	            $product=new Product($key);
	            
	            if(!in_array($key, $both)){
	            if($product->save($coupon)){
	                    $product->set_join_field($coupon,'type','woman');
	                }else{
	                    foreach($product->error->all as $k=>$e){
	                        echo $k.$e;
	                    }
	                }
	            }
	        }
    	}
        
        redirect("admin/coupon_manager/productManager/".$coupon_id,"refresh");
    }
    */
}  
	

