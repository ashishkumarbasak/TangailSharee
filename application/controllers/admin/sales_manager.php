<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_manager extends MY_Controller {
    
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
  /** Function to display sales(orders)
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package :Orders
   *  @var: order contains order model class object
   *  @var: query_array contains filter values
   */ 
	function index(){
		
		$order1= new Order();
		
		if($this->input->get())
		{
		    $test = $this->input->get();
		    if(isset($test['order_id']) && !empty($test['order_id']))
			$query_array['order_id'] = $test['order_id'];
		    if(isset($test['customer']) && !empty($test['customer'] ))
			$query_array['customer'] = $test['customer'];
		    if(isset($test['status']) && !empty($test['status'] ))
			$query_array['status'] = $test['status'];
		    if(isset($test['total']) && !empty($test['total'] ))
			$query_array['total'] = $test['total'];	
			//echo "<pre>"; print_r($test); die;
		    if(isset($query_array)){
			$query = http_build_query($query_array);
		    
			if(isset($query_array['order_id']))
			    $order1->like('id',$query_array['order_id']);
		    
			if(isset($query_array['customer']))
			    $order1->like_related_user('first_name',$query_array['customer']);
		    
			if(isset($query_array['status']))
			    $order1->like('status',$query_array['status']);
		    
			if(isset($query_array['total']))
			    $order1->like('total_amount',$query_array['total']);
		    }
		}
		$order1->get();
		$count = $order1->result_count();
		
		$page=$this->input->get("page");
		$size=10;
		$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
		if(isset($query)){
			//echo "test";die;
				$pagination['url']=base_url()."admin/sales_manager/index?".$query."&";
		}
		else{
			$pagination['url']=base_url()."admin/sales_manager/index?";
		}
		
		
		$order = new Order();
		if(isset($query_array)){
			
			if(isset($query_array['order_id']))
				$order->like('id',$query_array['order_id']);
			
			if(isset($query_array['customer']))
				$order->like_related_user('first_name',$query_array['customer']);
			
			if(isset($query_array['status']))
				$order->like('status',$query_array['status']);
			
			if(isset($query_array['total']))
				$order->like('total_amount',$query_array['total']);
		}
		$order->order_by('id','desc');
		
		$order->get_paged($pagination['page'],$pagination['size']);
		
		$shipadd = array();
		$billadd = array();
		
		foreach($order as $ord)
		{
			$ord->product->include_join_fields()->get();
			$qty = 0;
			foreach($ord->product as $prod)
			{
				$qty += $prod->join_quantity;
    		}
    		$ord->quantity = $qty;
			
			
			
			foreach($ord->ordaddress as $test)
    		{
    			if($test->type=='billing')
    				$billadd[$ord->id] = $test;
				
    			if($test->type=='shipping')
    				$shipadd[$ord->id] = $test;
    		}
			
		}
		
		
		$this->load->vars(array('order'=>$order,'pagination'=>$pagination,'shipadd'=>$shipadd));
    	$this->load->view('admin/sales_index');
		
    }
	
	/** Function to display sales(orders) by given filter values
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package :Orders
   * @var $filter contains values to be filtered 
   *  */ 
	function filter_index()
	{
		if($this->input->post())
		{
			$filter = $this->input->post();
			$query = http_build_query($filter);
			redirect("admin/sales_manager/index?$query&");
		}
	}
    
	/** Function to display orders processed for refund
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package : Refund
   *  @var: refund contains order model class object
   */ 
    function refunds(){
    	
		$page=$this->input->get("page");
    	$size=10;
    	
    	$refund = new Refund();
		if($this->input->get()){
		    $test = $this->input->get();
		    
		    if(isset($test['order_id']) && !empty($test['order_id']))
			$query_array['order_id'] = $test['order_id'];
		    if(isset($test['customer']) && !empty($test['customer'] ))
			$query_array['customer'] = $test['customer'];
		    if(isset($test['status']) && !empty($test['status'] ))
			$query_array['status'] = $test['status'];
		    if(isset($test['total']) && !empty($test['total'] ))
			$query_array['total'] = $test['total'];	
			//echo test; die;
			
		    if(isset($query_array)){	
			$query = http_build_query($query_array);
			if(isset($query_array['order_id']))
				$refund->like_related_order('id',$query_array['order_id']);
			
			if(isset($query_array['customer']))
				$refund->like_related('order/user','first_name', $query_array['customer']);
			
			if(isset($query_array['status']))
				$refund->like_related('order','status',$query_array['status']);
			
			if(isset($query_array['total']))
				$refund->like_related('order','total_amount',$query_array['total']);
		    }
		}
		
		$count=$refund->count();
    	
    	$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
		if(isset($query)){
				$pagination['url']=base_url()."admin/sales_manager/refunds?".$query."&";
		}
		else{
			$pagination['url']=base_url()."admin/sales_manager/refunds?";
		}
    	
    	$refund = new Refund();
    	if(isset($query_array)){
			if(isset($query_array['order_id']))
				$refund->like_related_order('id',$query_array['order_id']);
			
			if(isset($query_array['customer']))
				$refund->like_related('order/user','first_name', $query_array['customer']);
			
			if(isset($query_array['status']))
				$refund->like_related('order','status',$query_array['status']);
			
			if(isset($query_array['total']))
				$refund->like_related('order','total_amount',$query_array['total']);
    	
		}
    	$refund->order_by('created','desc');
    	$refund->get_paged($pagination['page'],$pagination['size']);
    	 
    
    	$this->load->vars(array('refund'=>$refund,'pagination'=>$pagination));
    	$this->load->view('admin/refund');
    }
	
	/** Function to display refund orders based on filter
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package :Refunds
   *  @var : $filter contains values to be filtered 
   *  */ 
    function filter_refund()
	{
		if($this->input->post())
		{
			$filter = $this->input->post();
			$query = http_build_query($filter);
			redirect("admin/sales_manager/refunds?$query&");
		}
	}
	
	/** Function to display order detail
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package :Orders
   *  @param: Order id to retrieve the specific order detail
   *  @var: order contains order model class object
   *  @var: billadd contains billing address of the order
   *  @var: shipadd contains shipping address of the order
   */ 
    function orderDetail($order_id){
       	$order=new Order($order_id);
       	$order->product->include_join_fields()->get();
       	foreach($order->product as $p){
       		$size = new Size($p->join_size_id);
       		$p->size_name=$size->name;
       		$p->size_catagory = $size->catagory;
       		$p->file->where_join_field($p,'default','1');
       		$p->file->include_join_fields()->get();
       		foreach($p->file as $file){
       			if($file->join_type=='man'){
       				$p->man=$file;
       			}else if($file->join_type=='woman'){
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
		if($order->coupon_id!=0){
			$discount = new Coupon($order->coupon_id);
			$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd,'discount'=>$discount));
			 
		}else{
			$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd));
		}
		
		if($order->shipping_id!=NULL)
		{
			$this->load->model('shipping');
			$shipping_name = $this->shipping->get_shipping_name($order->shipping_id);
			$shipping_price = $this->shipping->get_shipping_price($order->shipping_id);
			$this->load->vars(array('shipping_name'=>$shipping_name,'shipping_price'=>$shipping_price));
		}
		
    	$this->load->view('admin/order_detail');
    }
    /** Function to display refund detail of specific order
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package :Refunds
   *  @param: Order id to diplay specific order refund detail
   *  @var: order contains order model class object
   */ 
    function refundDetail($order_id){
    	$order=new Order($order_id);
    	$order->product->include_join_fields()->get();
    	//$order->product->join_quantity;
    	foreach($order->product as $p){
    		$size = new Size($p->join_size_id);
    		$p->size_name=$size->name;
    	}
    	$refund = new Refund();
    	$refund->where('order_id',$order_id);
    	$refund->get();
    	//echo "<pre>";print_r($refund);die;
    	$this->load->vars(array('order'=>$order,'reason'=>$refund->reason));
    	$this->load->view('admin/refunddtl');
    }
    
	/** Function to display order payment detail
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package :Orders
   *  @param: order id 
   *  @var: order contains order model class object
   *  @var: billadd contains billing address of order
   *  @var: shipadd contains shipping address of order
   */ 
    function paymentDetail($order_id){
    	$order=new Order($order_id);
    	$order->product->include_join_fields()->get();
    	foreach($order->product as $p){
    		$size = new Size($p->join_size_id);
    		$p->size_name=$size->name;
    		$p->size_catagory = $size->catagory;
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();
    		foreach($p->file as $file){
    			if($file->join_type=='man'){
    				$p->man=$file;
    			}else if($file->join_type=='woman'){
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
    	if($order->coupon_id!=0){
    		$discount = new Coupon($order->coupon_id);
    		$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd,'discount'=>$discount));
    	
    	}else{
    		$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd));
    	}
    	$this->load->view('admin/payment_detail');
    }
    
	/** Function to display shipping detail of given order
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package :Orders
   *  @param: order id 
   *  @var: order contains order model class object
   *  @var: billadd contains billing address of order
   *  @var: shipadd contains shipping address of order
   */ 
    function shippingDetail($order_id)
	{
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
    	if($order->coupon_id!=0)
		{
    		$discount = new Coupon($order->coupon_id);
    		$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd,'discount'=>$discount));
    	
    	}
		else
		{
    		$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd));
    	}
    	$this->load->view('admin/shipping_detail');
    }
    
	/** Function to display product list of order
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package :Orders
   *  @param: order id 
   *  @var: order contains order model class object
   *  @var: billadd contains billing address of order
   *  @var: shipadd contains shipping address of order
   */ 
    function products($order_id){
    	$order=new Order($order_id);
    	$order->product->include_join_fields()->get();
    	foreach($order->product as $p){
    		$size = new Size($p->join_size_id);
    		$p->size_name=$size->name;
    		$p->size_catagory = $size->catagory;
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();
    		foreach($p->file as $file){
    			if($file->join_type=='man'){
    				$p->man=$file;
    			}else if($file->join_type=='woman'){
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
    		$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd));
    	}
    	$this->load->view('admin/products');
    }
	
	
	function change_RefundRequestStatus()
	{
		$order_id = $this->input->post('order_id');
		$product_id = $this->input->post('product_id');
		$refund_status = $this->input->post('refund_status');
		if($refund_status!="" || $refund_status!=NULL)
		{
			if($order_id!=NULL && $product_id!=NULL)
			{
				if($refund_status=="Payment Refunded")
				{
					$this->load->model('order_product');
					$num_of_request = $this->order_product->get_num_of_request($order_id,$product_id);
					if($num_of_request<=1)
					{
						$order  = new order($order_id);
						$order->status = "completed";
						$order->save();
					}
					
					$this->load->model('order_product');
					$this->order_product->accept_refund_request($order_id,$product_id);
					$product_price = $this->order_product->get_product_sales_price($order_id,$product_id);
					$order  = new order($order_id);
					$order->payment = $order->payment - $product_price;
					$order->total_amount = $order->total_amount - $product_price;
					$order->save();
					
					$this->load->model('refund');
					$this->refund->change_refund_status_to_accept($order_id,$this->input->post('refund_product_sku'));
					
					$this->load->model('product');
					$product_sku = $this->product->get_productID_from_productSKU($product_id);
					$ref_h = new Refund_history();
					$ref_h->order_id = $order_id;
					$ref_h->product_sku = $this->input->post('refund_product_sku');
					$ref_h->date_added = date("Y-m-d");
					$ref_h->comment = $this->input->post('notify_message');
					$ref_h->status = "Payment Refunded";
					if($this->input->post('notify_user') == 1)
						$ref_h->notified = "1";
					else
						$ref_h->notified = "0";
					$ref_h->save();
					
					if($this->input->post('notify_user') == 1)
						{
							$order = new Order($order_id);
							$subject = 'Order Refund Status';
							$to = $order->user->email;
							//$to = 'krishna.sharma@deemtech.com';
							
							
							$body = "Dear ".$order->user->first_name.",\n";
							$body .= "Detail of your order with ref no.: ".$order->SKU."is given below.\n";
							$body .= "Refund Status : Payment Refunded\n";
							$body .= "comment : ".$this->input->post('notify_message')."\n";
							$body .= "\n\n\n";
							$body .= "Thanks,\n";
							$body .= "Team Twinne";
							
							mail($to, $subject, $body);
							//mail sending code
						}
					
					redirect('admin/sales_manager/products/'.$order_id,'refresh');
				}
				
				
				if($refund_status=="Reject Refund Request")
				{
					$this->load->model('order_product');
					$num_of_request = $this->order_product->get_num_of_request($order_id,$product_id);
					if($num_of_request<=1)
					{
						$order  = new order($order_id);
						$order->status = "completed";
						$order->save();
					}
					
					$this->load->model('order_product');
					$this->order_product->reject_refund_request($order_id,$product_id);
					
					$this->load->model('refund');
					$this->refund->change_refund_status_to_reject($order_id,$this->input->post('refund_product_sku'));
					
					$this->load->model('product');
					$product_sku = $this->product->get_productID_from_productSKU($product_id);
					$ref_h = new Refund_history();
					$ref_h->order_id = $order_id;
					$ref_h->product_sku = $this->input->post('refund_product_sku');
					$ref_h->date_added = date("Y-m-d");
					$ref_h->comment = $this->input->post('notify_message');
					$ref_h->status = "Refund Request Rejected";
					if($this->input->post('notify_user') == 1)
						$ref_h->notified = "1";
					else
						$ref_h->notified = "0";
					$ref_h->save();
					
					if($this->input->post('notify_user') == 1)
						{
							$order = new Order($order_id);
							$subject = 'Order Refund Status';
							$to = $order->user->email;
							//$to = 'krishna.sharma@deemtech.com';
							
							
							$body = "Dear ".$order->user->first_name.",\n";
							$body .= "Detail of your order with ref no.: ".$order->SKU."is given below.\n";
							$body .= "Refund Status : Refund Request Rejected\n";
							$body .= "comment : ".$this->input->post('notify_message')."\n";
							$body .= "\n\n\n";
							$body .= "Thanks,\n";
							$body .= "Team Twinne";
							
							mail($to, $subject, $body);
							//mail sending code
						}
					
					redirect('admin/sales_manager/products/'.$order_id,'refresh');
				}
				
				
				if($refund_status=="Awaiting for Pack")
				{
						$this->load->model('order_product');
						$num_of_request = $this->order_product->get_num_of_request($order_id,$product_id);
						if($num_of_request<=1)
						{
							$order  = new order($order_id);
							$order->status = "Awaiting for Pack";
							$order->save();
						}
						
						$this->load->model('order_product');
						$this->order_product->awaiting_for_pack_refund_request($order_id,$product_id);
						
						$this->load->model('refund');
						$this->refund->change_refund_status_to_awaiting($order_id,$this->input->post('refund_product_sku'));	
						
						$this->load->model('product');
						$product_sku = $this->product->get_productID_from_productSKU($product_id);
						$ref_h = new Refund_history();
						$ref_h->order_id = $order_id;
						$ref_h->product_sku = $this->input->post('refund_product_sku');
						$ref_h->date_added = date("Y-m-d");
						$ref_h->comment = $this->input->post('notify_message');
						$ref_h->status = "Awaiting for Pack";
						if($this->input->post('notify_user') == 1)
							$ref_h->notified = "1";
						else
							$ref_h->notified = "0";
						$ref_h->save();
						
						if($this->input->post('notify_user') == 1)
						{
							$order = new Order($order_id);
							$subject = 'Order Refund Status';
							$to = $order->user->email;
							//$to = 'krishna.sharma@deemtech.com';
							
							
							$body = "Dear ".$order->user->first_name.",\n";
							$body .= "Detail of your order with ref no.: ".$order->SKU."is given below.\n";
							$body .= "Refund Status : Awaiting for Pack\n";
							$body .= "comment : ".$this->input->post('notify_message')."\n";
							$body .= "\n\n\n";
							$body .= "Thanks,\n";
							$body .= "Team Twinne";
							
							mail($to, $subject, $body);
							//mail sending code
						}
						
						redirect('admin/sales_manager/products/'.$order_id,'refresh');
						
						
				}
				
			}
		}
		
	}
    
	/** Function to display order history
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package :Orders
   *  @param: order id 
   *  @var: order contains order model class object
   *  @var: billadd contains billing address of order
   *  @var: shipadd contains shipping address of order
   */ 
    function orderHistory($order_id){
    	$order=new Order($order_id);
    	$order->product->include_join_fields()->get();
    	foreach($order->product as $p){
    		$size = new Size($p->join_size_id);
    		$p->size_name=$size->name;
    		$p->size_catagory = $size->catagory;
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();
    		foreach($p->file as $file){
    			if($file->join_type=='man'){
    				$p->man=$file;
    			}else if($file->join_type=='woman'){
    				$p->woman=$file;
    			}
    		}
    	}
    	$orderh=new Order_history();
    	$orderh->where('order_id', $order_id);
    	$orderh->get();
    	
    	$billadd = '';$shipadd = '';
    	foreach ($order->ordaddress as $test)
    	{
    		if($test->type=='billing')
    		$billadd = $test;
    		if($test->type=='shipping')
    		$shipadd = $test;
    	}
    	if($order->coupon_id!=0){
    		$discount = new Coupon($order->coupon_id);
    		$this->load->vars(array('orderh'=>$orderh,'order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd,'discount'=>$discount));
    		 
    	}else{
    		$this->load->vars(array('orderh'=>$orderh,'order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd));
    	}
    	$this->load->view('admin/orderhistory');
    }
    
	/** Function to display refund history
   *  @access: Protected
   *  @author: Deemtech
   *  @Category: Sales
   *  @package : Refund
   *  @param: order id 
   *  @var: order contains order model class object
   */ 
    function refundHistory($order_id){
    	$order=new Order($order_id);
    	$orderh=new Refund_history();
    	$orderh->where('order_id', $order_id);
    	$orderh->get();
    	$this->load->vars(array('orderh'=>$orderh,'order'=>$order));
    	$this->load->view('admin/refundhistory');
    }
	
    /** Function to Save refund history submitted by post and send mail to user
	 * Save refund history and send mail to user
	 * @access: Protected
	 * @author: Deemtech
	 * @Category: Sales
	 * @package :Refunds
	 * @var: order contains order model class object
	 */
	
	function saverhistory(){
    	$order = new Order($this->input->post('order_id'));
    	//echo "<pre>";print_r($order->user);die;
    	$refund = new Refund();
    	$refund->where('order_id',$this->input->post('order_id') );
    	$refund->get();
    	$datestring = "Y-m-d";
    	$time = time();
    	$now = date($datestring, $time);
    	$page=new Refund_history();//($this->input->post('id'));
    	//$page->comment
    	$page->date_added = $now;
    	$page->order_id = $this->input->post('order_id');
    	$page->comment = $this->input->post('comment');
    	if($this->input->post('status')=="")
			$page->status = $order->status;
		else
			$page->status = $this->input->post('status');
		
    	$page->notified = $this->input->post('notity');
    	if($page->save()){
    		if($page->status != $refund->status)
    		{
    			$refund->status = $page->status;
    			$refund->save();
    		}
    		if($page->notified == 1)
    		{
    			$subject = 'Order Status';
    			$to = $order->user->email;
    			//$to = 'krishna.sharma@deemtech.com';
    			
    			
    			$body = "Dear ".$order->user->first_name.",\n";
    			$body .= "Detail of your order with ref no.: ".$order->id."is given below.\n";
    			$body .= "Status : ".$order->status."\n";
				$body .= "comment : ".$page->comment."\n";
				$body .= "\n\n\n";
    			$body .= "Thanks,\n";
    			$body .= "Team Twinne";
    			
    			mail($to, $subject, $body);
    			//mail sending code
    		}
    		
    		redirect('admin/sales_manager/refundhistory/'.$page->order_id ,'refresh');
    	}else {
    		$this->load->vars(array('errors'=>$page->error->all));
    		$this->orderHistory($page->order_id);
    
    	}
    }
    
	/** Function to edit ordered product
	 * @access: Protected
	 * @author: Deemtech
	 * @Category: Sales
	 * @package : Orders
	 * @param : order_product_id
	 * @var: order contains order model class object
	 */
    function editProduct($ord_prod_id){
    	$orderp=new Order_product($ord_prod_id);
    	$order=new Order($orderp->order_id);
    	
    	$order->product->include_join_fields()->get();
    	foreach($order->product as $p){
    		$size = new Size($p->join_size_id);
    		$p->size_name=$size->name;
    	}
    	$this->load->vars(array('order'=>$order,'orderp'=>$orderp));
    	$this->load->view('admin/edit_products');
    	
    }
    
	/** Function to save edited ordered product
	 * @access: Protected
	 * @author: Deemtech
	 * @Category: Sales
	 * @package : Orders
	 */
    
    function saveEditedProduct(){
    	$page=new Order_product($this->input->post('id'));//($this->input->post('id'));
    	$page->quantity = $this->input->post('quantity');
    	if($page->save()){
    		redirect('admin/sales_manager/products/'.$page->order_id ,'refresh');
    	}else {
    		$this->load->vars(array('errors'=>$page->error->all));
    		$this->terms();
    		
    	}
    }
	
	/** Function to Save order history submitted by post and send mail to user
	 * Save refund history and send mail to user
	 * @access: Protected
	 * @author: Deemtech
	 * @Category: Sales
	 * @package :Order
	 */
    function savehistory(){
            $order = new Order($this->input->post('order_id'));
            $datestring = "Y-m-d";
            $time = time();
            $now = date($datestring, $time);
            $page=new Order_history();//($this->input->post('id'));
            //$page->comment 
            $tracking_number = $this->input->post('tracking_number');
            $comment = $this->input->post('comment')." <br><b>Tracking Number: ".$tracking_number."</b>";
            $page->created = $now;
            $page->order_id = $this->input->post('order_id');
            $page->comment = $comment;
			if($this->input->post('status')=="")
				$page->status = $order->status;
			else
            	$page->status = $this->input->post('status');
			
            $page->notified = $this->input->post('notity'); 
    	   	
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
    				$ref->comment = $comment;
    				$ref->status = 'Awaiting for the pack';
    				$ref->notified = $this->input->post('notity');
    				$ref->save();
    			}
    			if($page->status=="")
				{
					//$order->status = $page->status;
				}
				else
				{
					$order->status = $page->status;
				}
    			$order->save();
    		}
    		if($page->notified == 1)
    		{
    			if($page->status == 'completed')
			{
                            $order=new Order($this->input->post('order_id'));
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
								$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd,'discount'=>$discount,'tracking_number'=>$tracking_number));
										}else{
								$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd,'tracking_number'=>$tracking_number));
                            }   
			
                            //email sending code
                            $config['protocol'] = 'mail';
                            $config['wordwrap'] = FALSE;
                            $config['mailtype'] = 'html';
                            $config['charset'] = 'utf-8';
                            $config['crlf'] = "\r\n";
                            $config['newline'] = "\r\n"; 
                            $this->load->library('email',$config);
    		
                            //email to admin
                            //$this->load->vars(array('order'=>$order));
                            $profile_name = $order->user->first_name." ".$order->user->last_name;
                            $this->load->vars(array('profile_name'=>$profile_name));
                            
                            $this->email->from('admin@twinne.com', 'Twinne');
                            $this->email->to($order->user->email);
                            $this->email->reply_to('admin@twinne.com');
                            $this->email->subject('Your online order with Twinne has been despatched!');
                            $this->email->message($this->load->view('email_template/order_has_been_despatched','',TRUE));
                            $this->email->send();
				}
				else
				{
				
				
				
				//mail sending code
                $subject = 'Order Status';
    			$to = $order->user->email;
    			//$to = 'krishna.sharma@deemtech.com';
    			 
    			$body = "Dear ".$order->user->first_name.",\n";
    			$body .= "Status of your order with ref no.: ".$order->id."is now given below.\n";
				$body .= "Status :".$order->status."\n";
                                $body .= "Tracking Number :".$tracking_number."\n";
				$body .= "Comment :".$this->input->post('comment')."\n";
                                
                                
    			$body .= "\n\n\n";
    			$body .= "Thanks,\n";
    			$body .= "Team Twinne";
    			mail($to, $subject, $body);
				}
    		}
    		//echo "you have successfully inserted a Video";
    		redirect('admin/sales_manager/orderhistory/'.$page->order_id ,'refresh');
    	}else {
    		$this->load->vars(array('errors'=>$page->error->all));
    		$this->orderHistory($page->order_id);
    
    	}
    }
    
	/** Function to delete ordered product
	 * Save refund history and send mail to user
	 * @access: Protected
	 * @author: Deemtech
	 * @Category: Sales
	 * @package :Refunds
	 * @param : order product id
	 */
    function deleteProduct($ord_prod_id){
    	$orderp=new Order_product($ord_prod_id);
    	$oid = $orderp->order_id;
    	//echo "<pre>";print_r($orderp);die;
    	if($orderp->delete()){
    		redirect('admin/sales_manager/products/'.$oid,'refresh');
    	}
    	redirect('admin/sales_manager/products/'.$oid,'refresh');
    	//}else{
    		//echo "unable to delete";
    	//}
    }
    
	 function saveSetting(){
    	$s= new System($this->input->post('system_id'));
    	
    	$s->website_name=$this->input->post('website_name');
    	$s->site_email=$this->input->post('site_email');
    	
		$s->paypal_uname=$this->input->post('paypal_uname');
		$s->paypal_password=$this->input->post('paypal_password');
		$s->language=$this->input->post('language');
		$s->out_emails=$this->input->post('out_emails');
		$s->auto_renew=$this->input->post('auto_renew');
		if($s->save()){
   			$s->is_active='1';
    		redirect('admin/system_manager','refresh');
    	}
    	else {
    		foreach($s->errors->all as $key=>$value){
    			echo $key.$value."<br />";
    		}
    		echo "fail to insert";
            }
    }
}