<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_order extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
   	   if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isCustomer()){
                redirect('login?flag=false','refresh');
            }
	    else {
		//redirect('user/member_profile/'.$u->id,'refresh');
	    }
        }  else {
            redirect('login?flag=false','refresh');
        }
		
		 //code for currency change
        if(isset($_COOKIE["c"]))
           $pref_currency_type = $_COOKIE["c"];
        else
           $pref_currency_type = "GBP";   
        $this->load->vars(array('pref_currency_type'=>$pref_currency_type));
    }
    
    public function index(){
    	$currency=new Currency();
		$currency->get();
		
		$order=new Order();
		$order->order_by('order_date');
    	
		$user_id=$this->session->userdata('user_id');
		$user=new User($user_id);
		$user->image->get();
		$user->address->get();
		
		$designer=new User();
		$designer->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($designer as $d){
		    $designers[$i]=$d->id;
		    $i++;
		}
		if(isset($designers) && !empty($designers)){
		    $this->load->vars(array('designers'=>$designers));
		}
		
		$order->where('is_active','1');
		$count = $order->where('user_id',$user_id)->count();
		$page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."user/member_order?";
        $order->where('user_id',$user_id);
        $order->order_by('order_date','desc');
        $order->where('is_active','1')->get_paged($pagination['page'],$pagination['size']);
		foreach($order as $ord)
		{
			if($ord->status == 'completed')
			{
				$orderh=new Order_history();
				$orderh->where('order_id', $ord->id);
				$orderh->where('status','completed');
				$orderh->get();
				if($orderh->id)
				{
					$start_time = strtotime($orderh->created);
					$end_time = $start_time + (15*24*60*60);
					$curr_time = time();
					//echo $start_time.'<br>'.$end_time.'<br>'.$curr_time;die;
					
					if($end_time>=$curr_time)
					{
						$ord->refund_status = 1;
					}
					else
					{
						$ord->refund_status = 0;
					}
					//echo "<pre>";print_r($ord);die;
				}
        
			}
		}
		//echo "<pre>";print_r($order);die;
        $this->load->vars(array('orders'=>$order,'user'=>$user,'currencies'=>$currency,'pagination'=>$pagination));
        $this->load->view('user/member_order');
    }
	
	function details($order_sku=NULL)
	{
		$currency=new Currency();
		$currency->get();
		
		$user_id=$this->session->userdata('user_id');
		$user=new User($user_id);
		$user->image->get();
		$user->address->get();
		
		$designer=new User();
		$designer->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($designer as $d){
		    $designers[$i]=$d->id;
		    $i++;
		}
		if(isset($designers) && !empty($designers)){
		    $this->load->vars(array('designers'=>$designers));
		}
		
		$this->load->model('order');
		$order_id = $this->order->get_orderID_from_orderSKU($order_sku);
		
		$order=new Order($order_id);
    	$order->product->include_join_fields()->get();
    	foreach($order->product as $p)
		{
    		$size = new Size($p->join_size_id);
    		$p->size_name=$size->name;
    		$p->size_catagory = $size->catagory;
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();
    		foreach($p->file as $file)
			{
    			if($file->join_type=='man')
				{
    				$p->man=$file;
    			}
				else if($file->join_type=='woman')
				{
    				$p->woman=$file;
    			}
    		}
    	}
    	 
    	$billadd = '';$shipadd = '';
    	foreach ($order->ordaddress as $test)
    	{
    		if($test->type=='billing')
    		$billadd = $test;
    		if($test->type=='shipping')
    		$shipadd = $test;
    	}
    	if($order->coupon_id != 0){
    		$discount = new Coupon($order->coupon_id);
    		$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd,'discount'=>$discount));
    		 
    	}else{
    		$this->load->vars(array('order'=>$order,'user'=>$user,'currencies'=>$currency,'billadd'=>$billadd, 'shipadd'=>$shipadd));
    	}
    	$this->load->view('user/order_products');
		
		
		
	}
	
	
	function ProductRefundRequest()
	{
		$this->load->model('order');
		$this->load->model('product');
		$order_sku = $this->input->post('order_sku');
		$order_id = $this->order->get_orderID_from_orderSKU($order_sku);
		$product_sku = $this->input->post('product_sku');
		$product_id = $this->product->get_productID_from_productSKU($product_sku);
		$user_id=$this->session->userdata('user_id');
		
		$order = new Order($order_id);
		if(($order->user_id == $user_id) && $order_id!=NULL)
		{
			$this->load->model('order');
			$this->order->process_refund_product($order_id,$product_id);
			
			$now = date("Y-m-d");
			$page=new Order_history(); //($this->input->post('id'));
			//$page->comment 
			$page->created = $now;
			$page->order_id = $order_id;
			$page->comment = 'refund requested by user';
			$page->status = 'Refund Processing';
			$page->notified = 1 ; 
				
			if($page->save())
			{
				if($page->status != $order->status)
				{	
					if($page->status == 'Refund Processing')
					{
						//echo $page->status;die;
						$ref=new Refund();//($this->input->post('id'));
						//$page->comment
						$ref->date_added = $now;
						$ref->order_id = $order_id; 
						$ref->product_sku = $this->input->post('refund_product_sku'); 
						$ref->reason = $this->input->post('refund_reason');
						$ref->status = 'Refund Processing';
						$ref->notified = $this->input->post('notity');
						$ref->save();
						
						$ref_h = new Refund_history();
						$ref_h->order_id = $order_id; 
						$ref_h->product_sku = $this->input->post('refund_product_sku'); 
						$ref_h->date_added = $now;
						$ref_h->comment = $this->input->post('refund_reason');
						$ref_h->status = "Refund Processing";
						$ref_h->notified = "1";
						
						$ref_h->save();
						
					}
					$order->status = $page->status;
					$order->save();
				}
				if($page->notified == 1)
				{
					
					//email sending code
    				$config['protocol'] = 'mail';
					$config['wordwrap'] = FALSE;
					$config['mailtype'] = 'html';
					$config['charset'] = 'utf-8';
					$config['crlf'] = "\r\n";
					$config['newline'] = "\r\n"; 
    				$this->load->library('email',$config);
    		
    				//email to admin
    				$user_id=$this->session->userdata('user_id');
					$customer_name = $order->user->first_name.' '.$order->user->last_name;
    				$this->load->vars(array('order'=>$order,'order_sku'=>$order->SKU,'customer_name'=>$customer_name));
    				$this->email->from('admin@twinne.com', 'Twinne');
    				$this->email->to($order->user->email);
    				$this->email->reply_to('admin@twinne.com');
    				$this->email->subject('Product refund request received notification!');
    				$this->email->message($this->load->view('email_template/refund_request_notification_to_customer','',TRUE));
    				$this->email->send();
				}
			}
		}
		
		redirect('user/member_order/details/'.$order_sku,'refresh');
	}
	
	
	function process_refund()
	{
		$val = $this->input->post();
		$order = new Order($this->input->post('order_id'));
		$user_id=$this->session->userdata('user_id');
		
		if($order->user_id == $user_id){
			$datestring = "Y-m-d";
			$time = time();
			$now = date($datestring, $time);
			$page=new Order_history();//($this->input->post('id'));
			//$page->comment 
			$page->created = $now;
			$page->order_id = $this->input->post('order_id');
			$page->comment = 'refund requested by user';
			$page->status = 'refunded';
			$page->notified = 1 ; 
				
			if($page->save()){
				if($page->status != $order->status)
				{	
					if($page->status == 'refunded')
					{
						//echo $page->status;die;
						$ref=new Refund();//($this->input->post('id'));
						//$page->comment
						$ref->date_added = $now;
						$ref->order_id = $this->input->post('order_id');
						$ref->reason = $this->input->post('refund_reason');
						$ref->status = 'Awaiting for the pack';
						$ref->notified = $this->input->post('notity');
						$ref->save();
					}
					$order->status = $page->status;
					$order->save();
				}
				if($page->notified == 1)
				{
					//mail sending code
					$subject = 'Order Status';
					$to = $order->user->email;
					//$to = 'krishna.sharma@deemtech.com';
					 
					$body = "Dear ".$order->user->first_name.",\n";
					$body .= "Status of your order with ref no.: ".$order->id."is now given below.\n";
					$body .= "Status :".$order->status."\n";
					$body .= "Comment :".$ref->comment."\n";
					$body .= "\n\n\n";
					$body .= "Thanks,\n";
					$body .= "Team Twinne";
					mail($to, $subject, $body);
				}
			}
			
		}
		
		redirect('user/member_order','refresh');
	}
	
	function cancel_order($order_sku)
	{
		$this->load->model('order');
		$order_id = $this->order->get_orderID_from_orderSKU($order_sku);
		$order = new Order($order_id);
		$user_id=$this->session->userdata('user_id');
		if(($order->user_id == $user_id) && $order_id!=NULL )
		{
			
			$this->load->model('order');
			$this->order->cancel_order_product($order_id,$product_id=NULL);
			
			$datestring = "Y-m-d";
			$time = time();
			$now = date($datestring, $time);
			$page=new Order_history();//($this->input->post('id'));
			//$page->comment 
			$page->created = $now;
			$page->order_id = $order_id;
			$page->comment = 'Order canceled by user';
			$page->status = 'canceled';
			$page->notified = 1 ; 
				
			if($page->save())
			{
				if($page->status != $order->status)
				{	
					$order->status = $page->status;
					$order->save();
				}
				if($page->notified == 1)
				{
					//mail sending code
					$subject = 'Order Status';
					$to = $order->user->email;
					//$to = 'krishna.sharma@deemtech.com';
					 
					$body = "Dear ".$order->user->first_name.",\n";
					$body .= "Status of your order with ref no.: ".$order->id."is now given below.\n";
					$body .= "Status :".$order->status."\n";
					$body .= "Comment :".$page->comment."\n";
					$body .= "\n\n\n";
					$body .= "Thanks,\n";
					$body .= "Team Twinne";
					mail($to, $subject, $body);
				}
			}
		}
		redirect('user/member_order','refresh');
	}
    
	/*function saveOrder(){
    	
		//$this->load->view('user/member_profile');
		$user_id=$this->session->userdata('user_id');
    	$o= new Order($user_id);
    	$o->id=$this->input->post('id');
    	$o->status=$this->input->post('status');
    	$o->order_date=$this->input->post('order_date');
    	$o->deliver_date=$this->input->post('gender');
    	$o->total_amount=$this->input->post('total_amount');
    	
   		if($o->save()){
    		echo "you have successfully inserted a Order";
    		echo $o->id;
    	}else {
    		foreach($o->errors->all as $key=>$value){
    			echo $key.$value."<br />";
    		}
    		echo "fail to insert";
    	}
    }
    */
    function deleteOrder($order_id){
    	$order=new Order($order_id);
    	$order->is_active='0';
    	
    	if($order->save()){
    		redirect('user/member_order','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}