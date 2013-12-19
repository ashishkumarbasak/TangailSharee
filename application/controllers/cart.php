<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('max_execution_time',0);

//Sandbox account information
define('API_USERNAME', 'ashish_1218103483_biz_api1.noocleusmediabd.com');
define('API_PASSWORD', '1218103494');
define('API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AWiaOSKSZ1xtDemMg84xWSQW-zSq');

//define('API_USERNAME', 'sebastiano_api1.tangail-sharee.com');
//define('API_PASSWORD', 'USW3EL4HA8PPL7B8');
//define('API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AIB7-IFlf4g5EH62I9W7ahDjaz.Q');


define('API_ENDPOINT', 'https://api-3t.paypal.com/nvp');
define('USE_PROXY',FALSE);
define('PROXY_HOST', '208.113.213.78');
define('PROXY_PORT', '808');
define('PAYPAL_URL', 'https://sandbox.paypal.com/webscr&cmd=_express-checkout&token=');
define('VERSION', '53.0');



class Cart extends MY_Controller {
    
    public $API_UserName=API_USERNAME;
    public $API_Password=API_PASSWORD;
    public $API_Signature=API_SIGNATURE;
    public $API_Endpoint =API_ENDPOINT;
    public $version=VERSION;
    public $data=array();

	public function __construct(){
        parent::__construct();
       
         $this->_user=new User($this->session->userdata('user_id'));
         if(isset($_COOKIE["c"]))
           $pref_currency_type = $_COOKIE["c"];
         else
           $pref_currency_type = "GBP";     
        
        
        $this->load->vars(array('pref_currency_type'=>$pref_currency_type));
        
        
        }
    
    
	function index(){
		
		//Retrieving the posted information by url
    	$type=$this->uri->segment(6);
    	$pid=$this->uri->segment(5);
    	$psize_id=$this->uri->segment(3);
    	$qty=$this->uri->segment(4);
    	
    	//Getting products and size information
    	
    	$product=new Product($pid);
    	
    	$product->file->where_join_field($product,'type',$type);
    	$product->file->where_join_field($product,'default','1')->get();
    	$product->size->include_join_fields()->get_by_id($psize_id);
    	
    	if($qty<=$product->size->join_stock)
    	
    	{
    		$designer=$product->user->first_name.' '.$product->user->last_name;
    		
       		if(isset($product)){
			    $data = array(
               		'id'     => $product->id,
               		'qty'    => $qty,
               		'price'  => $product->price,
               		'name'   => $product->name,
			//'options'	 => array('size'=>$product->size->name,'type'=>$type,'image'=>$product->file->filename,'designer'=>$designer,'product_id'=>$product->id,'size_id'=>$product->size->id)
			'options'	 => array('size'=>$product->size->name,'type'=>$type,'image'=>$product->file->filename,'designer'=>$designer,'product_id'=>$product->id,'size_id'=>$product->size->id,'actual_price'=>0,'redeem'=>0,'rdmqty'=>0,'discount'=>0)
            	);

				$this->cart->insert($data);
				
       		}	
				
				
		}
    	
    	$this->load->view('cart');
    	
    }
    function printcart(){
    	foreach ($this->cart->contents() as $items){
    		echo "<pre>";print_r($items);
    	}
    	
    }
    function redeempoint()
    {
    	//$this->_chklogin();
    	if(!$this->_user->id){
			$this->session->set_userdata('ref_url','cart/viewCart');
    		return;
    	}
    	$test = $this->input->post();
    	//check for already redeemd producs in cart
    	$products = array();
    	foreach ($this->cart->contents() as $items){
    		$options=$this->cart->product_options($items['rowid']);
    		if($options['redeem']!=0)
    			$products[$items['id']] = $options['rdmqty'];
    		
    	}
    	//check the points used already
    	$usedpoints = 0;
    	foreach ($products as $pid=>$qty){
    		$product = new Product($pid);
    		$usedpoints += $product->points_to_buy * $qty;
    	}
    	//process for current product redeemption
    	foreach ($this->cart->contents() as $items){
    		$options=$this->cart->product_options($items['rowid']);
    		if($items['rowid']== $test['row_id']){
    			$prod = new Product($items['id']);
    			$reqpnt = $prod->points_to_buy;
    			$accountpoints = $this->_user->reward_points;
    			$j=0;
    			for($i=1;$i<=$items['qty'];$i++){
    				if($accountpoints >= $usedpoints+($reqpnt*$i) && $reqpnt>0 ) {
    					$j++;
    				}
    			}
    			if($j>0){
    				$opt = $options;
    				$opt['redeem'] = 1;
    				$opt['rdmqty'] = $j;
    				$data = array(
    				              'rowid'  => $items['rowid'],
    				              'qty'    => $items['qty'],
    				              'options'	 => $opt
    				);
    				$this->cart->update($data);
    				$msg =  'Product is redeemed by reward points';
    			}else{
    				$msg =  'Insufficient reward points or product can not redeemed ';
    			}
    			
    		}
    	}
    	if(isset($j) && $j>0){
	    	$amount = 0;
		    foreach($this->cart->contents() as $items){
		    	$options=$this->cart->product_options($items['rowid']);
		    		
		    	if($options['redeem']!=0){
		    		$rdmval = $items['price']*$options['rdmqty'];
		    	
		    		$amount += $items['subtotal'] - $rdmval;
		    	}else{
		    		$amount += $items['subtotal'];
		    	}
		    }//echo $amount;
		    
		    
		    foreach($this->cart->contents() as $items){
		    	$options=$this->cart->product_options($items['rowid']);
		    	 
		    	if($options['discount']!=0){
		    		$coupon = new Coupon($options['discount']);
		    		
		    		if($amount < $coupon->total_amount){
		    			$opt = $options;
		    			$opt['discount'] = 0;
		    			$data = array(
		    			              'rowid'  => $items['rowid'],
		    			              'qty'    => $items['qty'],
		    			              'options'	 => $opt
		    			);
		    			$this->cart->update($data);
		    		}
		    	}
		    }
    	}
    	echo $msg;
    }
    function redeemback()
    {
    	$test = $this->input->post();
    	foreach ($this->cart->contents() as $items){
    		$options=$this->cart->product_options($items['rowid']);
    		if($items['rowid']== $test['row_id']){
    			$opt = $options;
    			$opt['redeem'] = 0;
    			$opt['rdmqty'] = 0;
    			$data = array(
    			    	     'rowid'  => $items['rowid'],
    			    	     'qty'    => $items['qty'],
    			    	     'options'	 => $opt
    			);
    			$this->cart->update($data);
    		}	
    	}
    }
    function val_coupon()
    {
    	if(!$this->_user->id){
    		$res = array('usable'=>2);
    		$str=json_encode($res);
			echo $str; 
    	}else{
	    	$test = $this->input->post();
	    	$cpn = $test['couponval'];
	    	$usable = 0;
	    	$time = time();
	    	$amount = 0;
	    	foreach($this->cart->contents() as $items)
	    	{
	    		$options=$this->cart->product_options($items['rowid']);
	    		if($options['redeem']!=0){
	    			$rdmval = $items['price']*$options['rdmqty'];
	    			
	    			$amount += $items['subtotal'] - $rdmval;
	    		}else{
	    			$amount += $items['subtotal'];
	    		}
	    	}
	    	$coupon = new Coupon();
	    	$array = array('is_active'=>'1','status'=>'1', 'code' =>$cpn,'start_date <='=>$time,'end_date >='=>$time, 'total_amount <='=>$amount);
	    	$coupon->where($array)->get();
	    	if($coupon->id){
	    		if($coupon->uses_coupon > 0)
	    		{
	    			$order = new Order();
	    			$order->where('coupon_id',$coupon->id)->get();
	    			$used =  count($order->all);
	    			if($used < $coupon->uses_coupon)
	    			{	
	    				if($coupon->uses_customer > 0){
		    				$orders = new Order();
		    				$cond = array('user_id'=>$this->_user->id,'coupon_id'=>$coupon->id);
		    				$orders->where($cond)->get();
		    				$usedc =  count($orders->all);
		    				//echo $usedc.'--'.$coupon->uses_customer;die;
		    				if($usedc < $coupon->uses_customer)
		    				{
		    					$usable = 1;
		    				}
	    				}
	    				else 
	    				{
	    					$usable = 1;
	    				}
	    			}
	    		}
	    		else 
	    		{
	    			if($coupon->uses_customer > 0){
		    			$orders = new Order();
		    			$cond = array('user_id'=>$this->_user->id,'coupon_id'=>$coupon->id);
		    			$orders->where($cond)->get();
		    			$usedc =  count($orders->all);
		    			if($usedc < $coupon->uses_coustomer)
		    			{
		    				$usable = 1;
		    			}
	    			}
	    			else 
	    			{
	    				$usable = 1;
	    			}
	    		}
	    	}	
	    	if($usable == 1)
	    	{
	    		foreach ($this->cart->contents() as $items){
	    			$options=$this->cart->product_options($items['rowid']);
	    			$opt = $options;
	    			$opt['discount'] = $coupon->id;
	    			$data = array(
	    			    	     'rowid'  => $items['rowid'],
	    			    	     'qty'    => $items['qty'],
	    			    	     'options'	 => $opt
	    				);
	    				$this->cart->update($data);
	    		}
	    	}
	    	else {
	    		foreach ($this->cart->contents() as $items){
	    			$options=$this->cart->product_options($items['rowid']);
	    			$opt = $options;
	    			$opt['discount'] = 0;
	    			$data = array(
	    			    		 'rowid'  => $items['rowid'],
	    			    		 'qty'    => $items['qty'],
	    			    		 'options'	 => $opt
	    			);
	    			$this->cart->update($data);
	    		
	    		}
	    	}	
	    	
	    	$res = array('usable'=>$usable);
    			$str=json_encode($res);
				echo $str;
	 	}
    }
    
    function curr()
    {
    	$test = $this->input->post();
    	//echo '<pre>';print_r($test);die;
    	$val = $this->_currency('GBP',$test['to_cur'],$test['total']);
		echo $val; die;
		if ($test['to_cur']=='USD')
    		echo '$'.$val;
    	elseif($test['to_cur']=='EUR')
    		echo $val.'&euro;';
    	//else 
    		//echo '';
    }
    function _currency($from_Currency,$to_Currency,$amount) {
    	//	echo $from_Currency;die;
    	$amount = urlencode($amount);
    	$from_Currency = urlencode($from_Currency);
    	$to_Currency = urlencode($to_Currency);
    	$url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
		//echo $url; die;
    	$ch = curl_init();
    	$timeout = 0;
    	curl_setopt ($ch, CURLOPT_URL, $url);
    	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    	$rawdata = curl_exec($ch);
		curl_close($ch);
    	$data = explode('"', $rawdata);
    	$data = explode(' ' , $data[3]);
    	$var = $data[0];
		$conversion = preg_replace('/[x00-x08x0B-x1F]/', '', $var);
		//echo money_format('%i',$var);die;
		//echo $conversion;die;
		return $var;
    	//return round($conversion,2);
    }
    function shippingadd(){
    	$shipid=$this->uri->segment(3);
    	 
    	$shipping=new Shipping($shipid);
    	$this->load->vars(array('shipping'=>$shipping));
    	$this->load->view('shippingcart');
    	 
    }
	function viewCart(){
		//echo "tset";die;
		$get = $this->input->get();
		
		
		foreach ($this->cart->contents() as $items){
			$options=$this->cart->product_options($items['rowid']);
			
			$product=new Product($options['product_id']);
			//var_dump($product->discount->start_date);
			//var_dump($product->id);exit;
		
		}
		if($get)
		{
			$this->load->vars(array('msg'=>$get));
		}
		$this->load->view('view_cart');
	}
	
	function _get_client_ip() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			//check ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			//to check ip is pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	function setQty(){
		
		$psize_id=$this->uri->segment(3);
		$p=new Product($this->uri->segment(4));
		$p->size->where_join_field($p,'size_id',$psize_id);
		$p->size->include_join_fields()->get();
		
		if($p->size->join_stock==0)
			echo "<option value=''>Out of Stock</option>";
		else
		{
			if($p->size->join_stock>5)
				$loop_linit = 5;
			else
				$loop_linit = $p->size->join_stock;
				
			for ($i=1;$i<=$loop_linit;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
		}

    }
    
    function deleteItem()
	{
    	$row_id=$this->uri->segment(3);
	     $data = array(
	               'rowid'  => $row_id,
	               'qty'    => 0
	            );
	
		$this->cart->update($data);
		$this->load->view('cart');
    }
    
    function pmtgateway()
    {
    	//echo "<pre>";
    	$amount = 0;
    	foreach($this->cart->contents() as $cartproduct)
    	{
    		$amount += $cartproduct['subtotal'];
    	}
    	$amount += 10;
    	//echo $amount;die;
    	
    	$gateway = $this->input->post('payment');
    	//echo $gateway;die;
    	if($gateway =='paypal')
    	{
    		
    		$order = new Order();
    		$order->user_id = $this->_user->id;
    		$order->payment = $amount;
    		$order->status = 'Payment Pending';
    		$datestring = "Y-m-d";
    		$time = time();
    		$now = date($datestring, $time);
    		$order->order_date = $now;
    		$order->total_amount = $amount;
    		$order->shipping_amount = 10;
    		$user = new User($this->_user->id);
    		//echo "<pre>";print_r($user->Address);die;
    		$order->shipping_address = $user->Address->address_line1.', '.$user->Address->address_line2.', '.$user->Address->address_line3.' City : '.$user->Address->city.', State :  '.$user->Address->state.', Country : '.$user->Address->country.', Postcode : '.$user->Address->postcode;
    		//create order with payment underprocess status
    		//echo "<pre>";print_r($orderp);die;
    		
    		if($order->save()){
				$oid = $order->id;
				foreach($this->cart->contents() as $cartproduct)
    			{
					$order_product = new Order_product();
					$order_product->order_id = $oid;
					$order_product->product_id = $cartproduct['id'];
					$order_product->quantity = $cartproduct['qty'];
					$order_product->original_value = $cartproduct['price'];
					$order_product->prize = $cartproduct['price'];
					$order_product->size_id = $cartproduct['options']['size_id'];
					$order_product->save();
				}
    			
    		}
    		    		
    		$this->load->library('Paypal');
    		$myPaypal = new Paypal();
    		$myPaypal->addField('business', 'krishn_1309608662_biz@deemtech.com');
    		$myPaypal->addField('currency_code', 'USD');
    		$myPaypal->addField('return', base_url().'/cart/paymentreturn/success/'.$oid);
    		$myPaypal->addField('cancel_return', base_url().'/cart/paymentreturn/failure');
    		$myPaypal->addField('notify_url', 'http://YOUR_HOST/payment/paypal_ipn.php');
    		$myPaypal->addField('amount', $amount);
    		$myPaypal->enableTestMode();
    		$myPaypal->submitPayment();
    	}
    	elseif($gateway =='authorize')
    	{
    		$this->load->vars(array('amount'=>$amount));
    		$this->load->view('authorize');
    	}
    }
    
    function authorize()
    {
    	$amount = 0;
    	foreach($this->cart->contents() as $cartproduct)
    	{
    		$amount += $cartproduct['subtotal'];
    	}
    	$amount += 10;
    	 
    	$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');
    	
    	$this->form_validation->set_rules('first_name', 'First Name', 'required');
    	$this->form_validation->set_rules('last_name', 'Last Name', 'required');
    	$this->form_validation->set_rules('address', 'Address', 'required');
    	$this->form_validation->set_rules('state', 'State', 'required');
    	 
    	if ($this->form_validation->run() == FALSE)
    	{
    		
    		$this->load->vars(array('amount'=>$amount));
    		$this->load->view('authorize');
    	}
    	else
    	{
    		$order = new Order();
    		$order->user_id = $this->_user->id;
    		$order->payment = $amount;
    		$order->status = 'Payment Pending';
    		$datestring = "Y-m-d";
    		$time = time();
    		$now = date($datestring, $time);
    		$order->order_date = $now;
    		$order->total_amount = $amount;
    		$order->shipping_amount = 10;
    		$user = new User($this->_user->id);
    		//echo "<pre>";print_r($user->Address);die;
    		$order->shipping_address = $user->Address->address_line1.', '.$user->Address->address_line2.', '.$user->Address->address_line3.' City : '.$user->Address->city.', State :  '.$user->Address->state.', Country : '.$user->Address->country.', Postcode : '.$user->Address->postcode;
    		//create order with payment underprocess status
    		//echo "<pre>";print_r($orderp);die;
    		
    		if($order->save()){
	    		$oid = $order->id;
	    		foreach($this->cart->contents() as $cartproduct)
	    		{
		    		$order_product = new Order_product();
		    		$order_product->order_id = $oid;
		    		$order_product->product_id = $cartproduct['id'];
		    		$order_product->quantity = $cartproduct['qty'];
		    		$order_product->original_value = $cartproduct['price'];
		    		$order_product->prize = $cartproduct['price'];
		    		$order_product->size_id = $cartproduct['options']['size_id'];
		    		$order_product->save();
	    		}
    		 
    		}
    		
	    	//create order with payment underprocess status
	    	$amount = 0;
	    	foreach($this->cart->contents() as $cartproduct)
	    	{
	    		$amount += $cartproduct['subtotal'];
	    	}
	    	$amount += 10;
	    	$post_url = "https://test.authorize.net/gateway/transact.dll";
	    	$post_values = array(
	    		"x_login"			=> "8H5wF4qTE4",
	    		"x_tran_key"		=> "3WxJ93qU9yfv6x3X",
	    	
	    		"x_version"			=> "3.1",
	    		"x_delim_data"		=> "TRUE",
	    		"x_delim_char"		=> "|",
	    		"x_relay_response"	=> "FALSE",
	    	
	    		"x_type"			=> "AUTH_CAPTURE",
	    		"x_method"			=> "CC",
	    		"x_card_num"		=> $this->input->post('card_no'),
	    		"x_exp_date"		=> $this->input->post('exp_date'),
	    	
	    		"x_amount"			=> $amount,
	    		"x_description"		=> "Test Transaction",
	    	
	    		"x_first_name"		=> $this->input->post('first_name'),
	    		"x_last_name"		=> $this->input->post('last_name'),
	    		"x_address"			=> $this->input->post('address'),
	    		"x_state"			=> $this->input->post('state'),
	    		"x_zip"				=> $this->input->post('zip'),
	    	);
	    	
	    	$post_string = "";
	    	foreach( $post_values as $key => $value )
	    	{
	    		$post_string .= "$key=" . urlencode( $value ) . "&";
	    	}
	    	$post_string = rtrim( $post_string, "& " );
	    	$request = curl_init($post_url); // initiate curl object
	    	curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
	    	curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
	    	curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
	    	curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
	    	$post_response = curl_exec($request); // execute curl post and store results in $post_response
	    	curl_close ($request); // close curl object
	    	
	    	$response_array = explode($post_values["x_delim_char"],$post_response);
	    	if($response_array[6]==0){
	    		$error = $response_array[3];
	    		$this->load->vars(array('payment_error'=>$error,'amount'=>$amount));
    			$this->load->view('authorize');
    		//payment unsuccessful code
    		}else{
	    		$this->paymentreturn('success',$oid);
	    	}
    	}
    }
    
    function paymentreturn($ack,$sku)
    {
    	if($ack == 'success')
    	{
    		$this->load->model('order');
			$test=$this->order->get_orderID_from_orderSKU($sku);
			if($test!=NULL && $sku!=NULL)
			{
				$order = new Order($test);
    			$order->product->include_join_fields()->get();
    		
    			foreach($this->cart->contents() as $cartproduct)
    			{
    			
    				$options=$this->cart->product_options($cartproduct['rowid']);
    				$product = new Product($cartproduct['id']);
    				$user_id=$this->session->userdata('user_id');
    				$user=new User($user_id);
    				if($options['redeem']!=0)
					{
    					$pointreq = $product->points_to_buy*$options['rdmqty'];
    					$user->reward_points = $user->reward_points - $pointreq; 
    				}
    				
    				$user->reward_points = $user->reward_points + ($product->points_you_get*$cartproduct['qty']);
    				$user->save();
    				if($options['discount']!=0)
					{
    					$d = $options['discount'];
    				}
    				$row_id= $cartproduct['rowid'];
    				//echo $row_id;die;
    				$data = array(
    						'rowid'  => $row_id,
    				        'qty'    => 0
    				);
    				$this->cart->update($data);
    		}
    		
    		
    		//$order->status = 'Payment Successful';
			$order->id=$test;
    		if(isset($d))
    			$order->coupon_id = $d;
    		$order->save();
    		//order history update payment status
    		$order_h=new Order_history();
    		$order_h->where('order_id',$order->id )->get();
    		$order_h->status = $order->status;
    		$order_h->save();
    		
    		//email sending code
    		$config['mailtype']='html';
    		$this->load->library('email',$config);
    		
    		//email to admin
			/*
    		$adminemail = new Email(1);
    		$adminemail->template =  str_replace('{order_id}',$sku,$adminemail->template);
    		$user_id=$this->session->userdata('user_id');
    		$adminemail->template =  str_replace('{user_id}',$user_id,$adminemail->template);
    		$this->load->vars(array('order'=>$order));
    		$this->email->from('support@tangail-sharee.com', 'tangail-sharee Admin');
    		$this->email->to($adminemail->to_email);
    		$this->email->reply_to($adminemail->re_email);
    		$this->email->subject('New order detail');
    		$this->email->message($adminemail->template);
    		$this->email->send();
    		*/
    		//end of email sending code to admin
    			
    		//email to user
			/*
    		$useremail = new Email(2);
    		$useremail->template =  str_replace('{order_id}',$sku,$useremail->template);
    		$user_id=$this->session->userdata('user_id');
    		$useremail->template =  str_replace('{user_id}',$user_id,$useremail->template);
    		$this->load->vars(array('order'=>$order));
    		$this->email->from($useremail->from_email, 'tangail-sharee Admin');
    		$this->email->to($this->_user->email);
    		$this->email->reply_to($useremail->re_email);
    		$this->email->subject('New order detail');
    		$this->email->message($useremail->template);
    		$this->email->send();
			*/
    		//end of email sending code to user
    		
    		$order = new Order($test);
    		$this->load->vars(array('order'=>$order,'order_sku'=>$sku));
    		$this->load->view('payment_status');
    		//payment successful code
    		//update order status and update avialable product quantity
			}
    	}
    	elseif($ack == 'failure')
    	{
    		$this->load->model('order');
			$test=$this->order->get_orderID_from_orderSKU($sku);
			$order = new Order($test);
    		$order->status = 'Payment failed';
    		$order->save();
    		$this->load->vars(array('order'=>$order));
    		$this->load->view('payment_failure');
    		//echo "fail";
    	}
    	
    }
    
    
    function updateOrder()
	{
    	$qty=$this->input->post('qty');
    	
    	if(is_array($qty))
		{
    		foreach($qty as $rowid=>$value)
			{
    			$items=$this->cart->product_options($rowid);
    			
    			$product=new Product($items['product_id']);
    			$product->size->include_join_fields()->get_by_id($items['size_id']);
    			if($value<=$product->size->join_stock){
	    			$data = array(
				               'rowid'  => $rowid,
				               'qty'    => $value
				            );
				 $this->cart->update($data);	
    			}
    			else {
    				$error="Error: There is not enough stock for this category.";
    				$this->load->vars(array('update_error'=>$error));
    			}
    		}
    	}
    	
		$this->load->view('view_cart');
    }
    
	function deleteItemCartPage(){
    	$row_id=$this->uri->segment(3);
	     $data = array(
	               'rowid'  => $row_id,
	               'qty'    => 0
	            );
	
		$this->cart->update($data);
		$this->viewCart();
    	
    }
    
    function _chklogin($ref_url)
    {
    	if($this->session->userdata('login')===true){
    		$u=new User($this->session->userdata('user_id'));
    		if(!$u->isCustomer()){
				$this->load->vars(array('login_error'=>TRUE,'ref_url'=>$ref_url));
    			redirect('login','refresh');
    		}
    	}  else {
			$this->session->set_userdata("ref_url",$ref_url);
			redirect('login','refresh');
    	}
    }
    
    function checkout()
    {
    	$this->_chklogin('cart/checkout');
		
		$order_id = $this->session->userdata('order_id');
		$order_sku = $this->session->userdata('order_sku');
    	$user_id=$this->session->userdata('user_id');
    	$user=new User($user_id);
		
		/*
		foreach($this->cart->contents() as $cartproduct)
		{	
    		$product_options = $this->cart->product_options($cartproduct['rowid'])
			$product_id = $product_options['product_id'];
			$product_size = $product_options['product_id'];
			$product_quantity = $cartproduct['qty'];
			$this->load->mode('product_model');
			$this->product_model->update_product_processing_order($product_id,$product_size,$product_quantity);
			
		}
		*/
		
    	//echo $order_id;die;
    	if($order_id)
		{
			$order = new Order($order_id);
			$order->ordaddress->get();
			$bill_add=NULL; $billadd=array();
			$ship_add=NULL; $shipadd=array();
			
			foreach($order->ordaddress as $test)
			{
				if($test->type=='billing')
					$bill_add = $test;
				else
					$ship_add = $test;
			}
			
				if($ship_add!=NULL)
				{
					$shipadd['id'] = $ship_add->id;
					$shipadd['first_name'] = $ship_add->first_name;
					$shipadd['last_name'] = $ship_add->last_name;
					$shipadd['address_line1'] = $ship_add->address_line1;
					$shipadd['address_line2'] = $ship_add->address_line2;
					$shipadd['address_line3'] = $ship_add->address_line3;
					$shipadd['city'] = $ship_add->city;
					$shipadd['state'] = $ship_add->state;
					$shipadd['country'] = $ship_add->country;
					$shipadd['postcode'] = $ship_add->postcode;
				}
				if($bill_add!=NULL)
				{	
					$billadd['id'] = $bill_add->id;
					$billadd['first_name'] = $bill_add->first_name;
					$billadd['last_name'] = $bill_add->last_name;
					$billadd['address_line1'] = $bill_add->address_line1;
					$billadd['address_line2'] = $bill_add->address_line2;
					$billadd['address_line3'] = $bill_add->address_line3;
					$billadd['city'] = $bill_add->city;
					$billadd['state'] = $bill_add->state;
					$billadd['country'] = $bill_add->country;
					$billadd['postcode'] = $bill_add->postcode;
				}
			
				if($ship_add==NULL && $bill_add==NULL)
				{
					$user_id=$this->session->userdata('user_id');
					$user=new User($user_id);
					$user->address->where_join_field($user,'type','shipping');
					$user->address->include_join_fields()->get();
					$shipadd['first_name'] = $user->first_name;
					$shipadd['last_name'] = $user->last_name;
					$shipadd['address_line1'] = $user->address->address_line1;
					$shipadd['address_line2'] = $user->address->address_line2;
					$shipadd['address_line3'] = $user->address->address_line3;
					$shipadd['city'] = $user->address->city;
					$shipadd['state'] = $user->address->state;
					$shipadd['country'] = $user->address->country;
					$shipadd['postcode'] = $user->address->postcode;
					
					$buser=new User($user_id);
					$buser->address->where_join_field($user,'type','billing');
					$buser->address->include_join_fields()->get();
					$billadd['first_name'] = $buser->first_name;
					$billadd['last_name'] = $buser->last_name;
					$billadd['address_line1'] = $buser->address->address_line1;
					$billadd['address_line2'] = $buser->address->address_line2;
					$billadd['address_line3'] = $buser->address->address_line3;
					$billadd['city'] = $buser->address->city;
					$billadd['state'] = $buser->address->state;
					$billadd['country'] = $buser->address->country;
					$billadd['postcode'] = $buser->address->postcode;
				}
			
			
				//echo '<pre>';print_r($ship_add);die;
				$shipping = new Shipping($order->shipping_id);
				
				$this->load->model('country');
				$country = new country();
				$list_of_countries = $country->order_by('country_name','ASC')->get();
				
				
				$this->load->vars(array('user'=>$user,'billadd'=>$billadd,'shipadd'=>$shipadd,'shipping'=>$shipping,'list_of_countries'=>$list_of_countries));
				//echo 'test';die;
				$this->load->view('checkout_1');
    		
    		}
			else
			{
				$user_id=$this->session->userdata('user_id');
				$user=new User($user_id);
				$user->address->where_join_field($user,'type','shipping');
				$user->address->include_join_fields()->get();
				$shipadd['first_name'] = $user->first_name;
				$shipadd['last_name'] = $user->last_name;
				$shipadd['address_line1'] = $user->address->address_line1;
				$shipadd['address_line2'] = $user->address->address_line2;
				$shipadd['address_line3'] = $user->address->address_line3;
				$shipadd['city'] = $user->address->city;
				$shipadd['state'] = $user->address->state;
				$shipadd['country'] = $user->address->country;
				$shipadd['postcode'] = $user->address->postcode;
				
				$buser=new User($user_id);
				$buser->address->where_join_field($user,'type','billing');
				$buser->address->include_join_fields()->get();
				$billadd['first_name'] = $buser->first_name;
				$billadd['last_name'] = $buser->last_name;
				$billadd['address_line1'] = $buser->address->address_line1;
				$billadd['address_line2'] = $buser->address->address_line2;
				$billadd['address_line3'] = $buser->address->address_line3;
				$billadd['city'] = $buser->address->city;
				$billadd['state'] = $buser->address->state;
				$billadd['country'] = $buser->address->country;
				$billadd['postcode'] = $buser->address->postcode;
				
				//$shipping = new Shipping();
				//$shipping->get();
				
				$this->load->model('country');
				$country = new country();
				$list_of_countries = $country->order_by('country_name','ASC')->get();
		
				$this->load->vars(array('user'=>$user, 'buser'=>$buser,'billadd'=>$billadd,'shipadd'=>$shipadd,'list_of_countries'=>$list_of_countries));
				$this->load->view('checkout_1');
    		}
    }
    function checkout_shipping()
    {
    	$this->_chklogin('cart/checkout');
    	if(!$this->input->post())
		{
    		//$this->session->unset_userdata('order_id');
    		$session = $this->session->userdata('order_id');
			$order_sku = $this->session->userdata('order_sku');
    		if($session)
			{
    			$shipping = new Shipping();
    			$shipping->get();
    			
    			$order = new Order($session);
				$order->ordaddress->get();
    			foreach($order->ordaddress as $test)
    			{
    				if($test->type=='billing')
    					$billadd = $test;
    				else 
    					$shipadd = $test;
    			}
				
				if(isset($shipadd->country) && $shipadd->country!=NULL)
				{
					$this->load->model('country');
					$shipping_methods = $this->country->get_shipping_methods($shipadd->country);
				}
				else
					$shipping_methods = $shipping;
				
    			if($order->shipping_id>0)
				{
    				
					$ship = new Shipping($order->shipping_id);
    				$this->load->vars(array('shipping'=>$shipping_methods,'ship_pr'=>$ship));
    			}
				else
				{
    				$this->load->vars(array('shipping'=>$shipping_methods));
    			}
    			$this->load->view('checkout_2');
    		}
			else
			{
    			redirect('cart/checkout','refresh');
    		}
    	}
    	else 
		{
    		$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	if($this->input->post('group1')=='same')
			{
		    	/*
				$this->form_validation->set_rules('data[billing][first_name]', 'First Name', 'required');
		    	$this->form_validation->set_rules('data[billing][last_name]', 'Last Name', 'required');
		    	$this->form_validation->set_rules('data[billing][address_line1]', 'Address', 'required');
		    	$this->form_validation->set_rules('data[billing][city]', 'City', 'required');
		    	$this->form_validation->set_rules('data[billing][country]', 'Country', 'required');
		    	$this->form_validation->set_rules('data[billing][state]', 'State', 'required');
		    	$this->form_validation->set_rules('data[billing][postcode]', 'Postal Code', 'required');
				*/
				$this->form_validation->set_rules('data[shipping][first_name]', 'First Name', 'required');
	    		$this->form_validation->set_rules('data[shipping][last_name]', 'Last Name', 'required');
	    		$this->form_validation->set_rules('data[shipping][address_line1]', 'Address', 'required');
	    		$this->form_validation->set_rules('data[shipping][city]', 'City', 'required');
	    		$this->form_validation->set_rules('data[shipping][country]', 'Country', 'required');
	    		$this->form_validation->set_rules('data[shipping][state]', 'State', 'required');
	    		$this->form_validation->set_rules('data[shipping][postcode]', 'Postal Code', 'required');
	    	}
	    	else
	    	{
	    		$this->form_validation->set_rules('data[shipping][first_name]', 'First Name', 'required');
	    		$this->form_validation->set_rules('data[shipping][last_name]', 'Last Name', 'required');
	    		$this->form_validation->set_rules('data[shipping][address_line1]', 'Address', 'required');
	    		$this->form_validation->set_rules('data[shipping][city]', 'City', 'required');
	    		$this->form_validation->set_rules('data[shipping][country]', 'Country', 'required');
	    		$this->form_validation->set_rules('data[shipping][state]', 'State', 'required');
	    		$this->form_validation->set_rules('data[shipping][postcode]', 'Postal Code', 'required');
	    		
	    		$this->form_validation->set_rules('data[billing][first_name]', 'First Name', 'required');
	    		$this->form_validation->set_rules('data[billing][last_name]', 'Last Name', 'required');
	    		$this->form_validation->set_rules('data[billing][address_line1]', 'Address', 'required');
	    		$this->form_validation->set_rules('data[billing][city]', 'City', 'required');
	    		$this->form_validation->set_rules('data[billing][country]', 'Country', 'required');
	    		$this->form_validation->set_rules('data[billing][state]', 'State', 'required');
	    		$this->form_validation->set_rules('data[billing][postcode]', 'Postal Code', 'required');
	    	}	 
	    	//$this->form_validation->set_rules('state', 'State', 'required');
	    	
	    	if ($this->form_validation->run() == FALSE)
	    	{
	    		$this->checkout();
	    	}
	    	else 
	    	{
	    		$test = $this->input->post();
	    		
	    		//$billingadd = $test['data']['billing'];
				$shippingadd = $test['data']['shipping'];
	    		if ($test['group1']=='same')
				{
	    			//$shippingadd = $billingadd;
					$billingadd = $shippingadd;
	    			if(isset($test['data']['shipping']['id']))
	    				$shippingadd["id"] = $test['data']['shipping']['id'];
	    		}
	    		else
	    			{
						//$shippingadd = $test['data']['shipping'];
						$billingadd = $test['data']['billing'];
					}
	    		
	    		//check wheather order is already created
	    		$order_id = $this->session->userdata('order_id');
				$order_sku = $this->session->userdata('order_sku');
	    		if($order_id)
	    			$order = new Order($order_id);
	    		else
					$order = new Order();
	    		
	    		$order->user_id = $this->_user->id;
	    		$order->status = 'Payment Pending';
	    		$datestring = "Y-m-d";
	    		$time = time();
	    		$now = date($datestring, $time);
	    		$order->order_date = $now;
	    		$order->ip_address = $this->_get_client_ip();
	    		$user = new User($this->_user->id);
				
				$user->id = $this->_user->id;
				if($user->first_name==NULL)
					$user->first_name = $shippingadd["first_name"];
				if($user->last_name==NULL)
					$user->last_name = $shippingadd["last_name"];
				if($user->display_name==NULL)
					$user->display_name = $shippingadd["first_name"]." ".$shippingadd["last_name"];						
					$user->save();
					
					 
	    		
				if(!isset($user->address->id) && empty($user->address->id))
				{
					$user_billadd= new Address();
					$user_billadd->city=$billingadd["city"];
    				$user_billadd->country=$billingadd["country"];
    				$user_billadd->state=$billingadd["state"];
					$user_billadd->postcode=$billingadd["postcode"];
    				$user_billadd->address_line1=$billingadd["address_line1"];
    				$user_billadd->address_line2=$billingadd["address_line2"];
    				$user_billadd->address_line3=$billingadd["address_line3"];
					if ($user_billadd->save($user))
					{
						$user->set_join_field($user_billadd,'type','billing');
						$user->set_join_field($user_billadd,'default','1');
					}
					
					$user_shipadd= new Address();
					$user_shipadd->city = $shippingadd["city"];
    				$user_shipadd->country = $shippingadd["country"];
    				$user_shipadd->state = $shippingadd["state"];
    				$user_shipadd->postcode = $shippingadd["postcode"];
					$user_shipadd->address_line1 = $shippingadd["address_line1"];
    				$user_shipadd->address_line2 = $shippingadd["address_line2"];
    				$user_shipadd->address_line3 = $shippingadd["address_line3"];
					if ($user_shipadd->save($user))
					{
						$user->set_join_field($user_shipadd,'type','shipping');
						$user->set_join_field($user_shipadd,'default','1');
					}
					
				}
				
	    		$add1=new Ordaddress();
	    		if(isset($billingadd["id"]))
	    			$add1->id =  $billingadd["id"];
	    		 
	    		$add1->address_line1=$billingadd["address_line1"];
	    		$add1->address_line2=$billingadd["address_line2"];
	    		$add1->address_line3=$billingadd["address_line3"];
	    		$add1->city=$billingadd["city"];
	    		$add1->state=$billingadd["state"];
	    		$add1->country=$billingadd["country"];
	    		$add1->postcode=$billingadd["postcode"];
	    		$add1->first_name=$billingadd["first_name"];
	    		$add1->last_name=$billingadd["last_name"];
	    		$add1->type="billing";
	    		$add1->save();
	    		
	    		$add=new Ordaddress();
	    		if(isset($shippingadd["id"]))
	    		$add->id =  $shippingadd["id"];
	    		 
	    		$add->address_line1 = $shippingadd["address_line1"];
	    		$add->address_line2 = $shippingadd["address_line2"];
	    		$add->address_line3 = $shippingadd["address_line3"];
	    		$add->city = $shippingadd["city"];
	    		$add->state = $shippingadd["state"];
	    		$add->country = $shippingadd["country"];
	    		$add->postcode = $shippingadd["postcode"];
	    		$add->first_name = $shippingadd["first_name"];
	    		$add->last_name = $shippingadd["last_name"];
	    		$add->type = "shipping";
	    		//echo '<pre>';print_r($add);die;
	    		$add->save();
	    		
	    		if($order->save()){
	    			 
	    			$order->save($add);
	    			$order->save($add1);
	    			$oid = $order->id;
					
					if($order->SKU==NULL)
						{
							//$this->load->library('skulib');
							$order = new Order($oid);
							$order_sku = $this->skulibrary->generate_order_sku($oid);
							$order->SKU = $order_sku;
							$order->save();
						}
					else
						{
							$order_sku = $order->SKU;
						}
						
						//$this->generateOrderSKU();
					
	    			
	    			$order_h=new Order_history();
	    			$order_h->created = $order->order_date;
	    			$order_h->order_id = $order->id;
	    			$order_h->status = $order->status;
	    			$order_h->notified = 0;
	    			$order_h->save(); 
	    			
	    			$this->session->set_userdata("order_id",$oid);
					$this->session->set_userdata("order_sku",$order_sku);
	    			$this->session->set_userdata('checkoutstep',2);
	    			//$d=0;
		    		foreach($this->cart->contents() as $items)
	    			{
	    				$options=$this->cart->product_options($items['rowid']);
			    	 
			    		if($options['discount']!=0){
			    			$d = new Coupon($options['discount']);	
			    		}
	    			}
	    			
	    			if(isset($d) && $d->type=='Free shipping'){
	    				redirect('cart/checkout_detail','refresh');
	    			}
	    			else{
						$this->load->model('country');
						$shipping_methods = $this->country->get_shipping_methods($shippingadd["country"]);
						
						$shipping = new Shipping();
		    			$shipping->get();
		    			if($order->shipping_id>0){
		    				$ship = new Shipping($order->shipping_id);
		    				$this->load->vars(array('shipping'=>$shipping_methods,'ship_pr'=>$ship));
		    			}else{
		    				$this->load->vars(array('shipping'=>$shipping_methods));
		    			}
		    			$this->load->view('checkout_2');
	    			}
	    		}
    	
	    	}
    
    	}
    }
    
    function checkout_detail()
    {
    	$this->_chklogin('cart/checkout');
    	foreach($this->cart->contents() as $items)
    	{
    		$options=$this->cart->product_options($items['rowid']);
    		 
    		if($options['discount']!=0)
			{
    			$d = new Coupon($options['discount']);
    		}
    	}
    	
    	if(isset($d) && $d->type=='Free shipping')
		{
    		$this->load->view('checkout_3');
    	}
		else
		{
	        if(!$this->input->post())
			{
	        	$oid = $this->session->userdata('order_id');
				$order_sku = $this->session->userdata('order_sku');
	        	if($oid)
				{
	        		$order = new Order($oid);
	        		if($order->shipping_id>0)
					{ 
	    				$shipping = new Shipping($order->shipping_id);
						$payment =  new Paymentmethod();
						$payment->where('status','1')->get();
					
	    				$this->load->vars(array('shipping'=>$shipping,'payment'=>$payment));
						$this->load->view('checkout_3');
	        		}
					else
					{
	        			redirect('cart/checkout_shipping','refresh');
	        		}
	        		
	        	}
				else
				{
	        		redirect('cart/checkout','refresh');
	        	}
	    	}
	    	else 
			{
	    		$test = $this->input->post();
	    		$order = new Order($this->session->userdata('order_id'));
				if($order->SKU==NULL){
						$order_sku = $this->skulibrary->generate_order_sku($this->session->userdata('order_id'));
						$order->SKU = $order_sku;
				}else{
						$order_sku = $order->SKU;
					 }
				$this->session->set_userdata("order_sku",$order_sku);		
				$order_sku = $this->session->userdata('order_sku');
	    		$order->shipping_id = $test['shipmethod']; 
	    		if($order->save())
				{
					$this->session->set_userdata("order_id",$order->id);
	    			$this->session->set_userdata('checkoutstep',3);
	    			$payment =  new Paymentmethod();
					$payment->where('status','1')->get();
						
	    			$shipping = new Shipping($order->shipping_id);
	    			$this->load->vars(array('shipping'=>$shipping,'payment'=>$payment));
	    			$this->load->view('checkout_3');	    			
	    		}
	    	}
    	}
    }
    
    function review_order()
    {
    	$this->_chklogin('cart/checkout');
		if(!$this->cart->total_items())
		{
			redirect('cart/checkout','refresh');
		}
		
    	if(!$this->input->post())
		{
			//print_r($this->session->all_userdata());
			$oid = $this->session->userdata('order_id');
			$order_sku = $this->session->userdata('order_sku');
    		$order = new Order($oid);
    		$order->ordaddress->get();
    		foreach($order->ordaddress as $test)
    		{
    			if($test->type=='billing')
    				$billadd = $test;
    			else 
    				$shipadd = $test;
    		}
    		
    		$user_id=$this->session->userdata('user_id');
    		$user=new User($user_id);
    		 
    		$shipping = new Shipping($order->shipping_id);
    		
    		$this->load->vars(array('shipping'=>$shipping,'billadd'=>$billadd,'shipadd'=>$shipadd,'user'=>$user,'pmtmethod'=>$order->pmtmethod));
    		$this->load->view('checkout_4');
    	}
    	else
    	{
			$test = $this->input->post();
    		if($this->input->post('pmtmethod') == 'opt2')
    		{
    			$pmtmethod = 'paypal';
    		}
    		elseif($this->input->post('pmtmethod') == 'opt1')
    		{
    			$pmtmethod = 'Credit Card';
				$this->session->set_userdata('userdetail',$test['ccard']);
    		}
			
			$oid = $this->session->userdata('order_id');
			$order_sku = $this->session->userdata('order_sku');
    		$order = new Order($oid);
    		$order->pmtmethod = $pmtmethod;
    		$order->save();
			
    		$order = new Order($oid);
    		$order->ordaddress->get();
    		foreach ($order->ordaddress as $test)
    		{
    			if($test->type=='billing')
    				$billadd = $test;
    			else 
    				$shipadd = $test;
    		}
    		
    		$user_id=$this->session->userdata('user_id');
    		$user=new User($user_id);
    		 
    		$shipping = new Shipping($order->shipping_id);
    		//echo '<pre>';print_r($order->pmtmethod);die;
    		
    		$this->load->vars(array('shipping'=>$shipping,'billadd'=>$billadd,'shipadd'=>$shipadd,'user'=>$user,'pmtmethod'=>$order->pmtmethod));
    		$this->load->view('checkout_4');    		
    	}    		 
    }

    
    function process_order()
    {
    	$this->_chklogin('cart/checkout');
		
		$oid = $this->session->userdata('order_id');
		$order_sku = $this->session->userdata('order_sku');
		if($oid!=NULL)
		{
    		$order = new Order($oid);
    		$amount = 0;
                    foreach($this->cart->contents() as $items)
                    {
                            $options=$this->cart->product_options($items['rowid']);
                            if($options['redeem']!=0)
							{
                                    if($this->input->post('toal_amount_charge_currency')=="USD")
									{
										$converted_item_price_price = currency("GBP","USD",($items['price'])); 
										$converted_subtotal =  $converted_item_price_price*$items['qty'];
									}
									elseif($this->input->post('toal_amount_charge_currency')=="EUR")
									{
									   $converted_item_price_price = currency("GBP","EUR",($items['price']));
									   $converted_subtotal = $converted_item_price_price*$items['qty'];
									}
									else
									{
									   $converted_item_price_price = $items['price'];
									   $converted_subtotal = $converted_item_price_price*$items['qty'];
									   
									}
									
									$rdmval = $converted_item_price_price*$options['rdmqty'];
                                    $amount += ($converted_subtotal - $rdmval);
                            }
                            else
							{
                                    if($this->input->post('toal_amount_charge_currency')=="USD")
									{
										$converted_item_price_price = currency("GBP","USD",($items['price'])); 
										$converted_subtotal  =  $converted_item_price_price*$items['qty'];
									}
									elseif($this->input->post('toal_amount_charge_currency')=="EUR")
									{
									   	$converted_item_price_price = currency("GBP","EUR",($items['price'])); 
										$converted_subtotal  =  $converted_item_price_price*$items['qty'];
									}
									else
									{
									   $converted_subtotal  =  $items['price']*$items['qty'];
									}
									
									$amount += $converted_subtotal;
                            }

                            if($options['discount']!=0)
                            {
                                    $d = $options['discount'];
                            }
                    }
		
                    if(isset($d) && !empty($d))
                            {
                            $discount = new Coupon($d);
                            if($discount->type=='Percentage')
                            {
                                    $amount -= $amount*$discount->discount/100;
                            }
                            elseif($discount->type=='Fixed')
                            {
                                    $amount -= $discount->discount;
                            }
                        }
		
    		$tax = new Taxes();
    		$tax->where('default','1')->get();
		
    		if(isset($tax->id)&& !empty($tax->id))
			{
    			$aptax = $amount*$tax->rate/100; 
    			$amount += $aptax;
				$order->tax = $aptax;
    		}
    		$shipping = new Shipping($order->shipping_id);
    			
				if($this->input->post('toal_amount_charge_currency')=="USD")
                {
                 	$converted_shipping_price = currency("GBP","USD",($shipping->price)); 
                }
                elseif($this->input->post('toal_amount_charge_currency')=="EUR")
                {
                   $converted_shipping_price = currency("GBP","EUR",($shipping->price));
                }
                else
                {
                   $converted_shipping_price = $shipping->price;
                }
			$amount += $converted_shipping_price;
			//echo $amount;
			//exit(0);
    		
                if($this->input->post('toal_amount_charge_currency')=="USD")
                {
                    $order->paid_currency = "USD";
					$order->payment = $amount;
                    $order->total_amount = $amount;
                    $order->shipping_amount = $converted_shipping_price;
                }
                elseif($this->input->post('toal_amount_charge_currency')=="EUR")
                {
                    $order->paid_currency = "EUR";
                    $order->payment = $amount;
                    $order->total_amount = $amount;
                    $order->shipping_amount = $converted_shipping_price;
                }
                else
                {
                    $order->paid_currency = "GBP";
                    $order->payment = $amount;
                    $order->total_amount = $amount;
                    $order->shipping_amount = $converted_shipping_price;
                }
			//print_r($_POST);
    	
    		if($order->save())
			{
    			$oid = $order->id;
    			$item_name = '';
    			foreach($this->cart->contents() as $cartproduct)
    			{
				$options=$this->cart->product_options($cartproduct['rowid']);
				$product = new Product($cartproduct['id']);
				
    				$item_name .= $cartproduct['name'].', ';
    				
                                $order_product = new Order_product();
                                $is_exist = $order_product->where('order_id', $oid)->where('product_id', $cartproduct['id'])->count();
                                if($is_exist<1)
                                {
                                    $order_product = new Order_product();
                                }
                                else
                                {
                                    $order_product = new Order_product();
                                    $order_product->where('order_id', $oid);  //inactivate these three line because of show same product in order display 
                                    $order_product->where('product_id', $cartproduct['id']);
                                    $order_product->where('size_id', $cartproduct['options']['size_id']);
                                    $order_product->get();
                                }
                                    $order_product->order_id = $oid;
                                    $order_product->product_id = $cartproduct['id'];
                                    $order_product->quantity = $cartproduct['qty'];
                                    $order_product->original_value = $cartproduct['price'];
                                    $order_product->prize = $cartproduct['price'];

                                    if($this->input->post('toal_amount_charge_currency')=="USD")
                                    {
                                        $order_product->converted_orginal_value = currency("GBP","USD",$cartproduct['price']);
                                        $order_product->converted_price = currency("GBP","USD",$cartproduct['price']);
                                        $order_product->product_paid_currency = "USD";
                                    }
                                    elseif($this->input->post('toal_amount_charge_currency')=="EUR")
                                    {
                                        $order_product->converted_orginal_value = currency("GBP","EUR",$cartproduct['price']);
                                        $order_product->converted_price = currency("GBP","EUR",$cartproduct['price']);
                                        $order_product->product_paid_currency = "EUR";
                                    }
                                    else
                                    {
                                        $order_product->converted_orginal_value = $cartproduct['price'];
                                        $order_product->converted_price = $cartproduct['price'];
                                        $order_product->product_paid_currency = "GBP";
                                    }


                                    $order_product->size_id = $cartproduct['options']['size_id'];
                                            if($options['redeem']!=0)
                                            {
                                                    $pointreq = $product->points_to_buy*$options['rdmqty'];
                                                    $order_product->points_used = $pointreq;
                                                    $order_product->rdm_quantity = $options['rdmqty'];
                                            }
                                            $system = new System(1);
                                            $order_product->revenue = $system->revenue/100 * $cartproduct['price']*$cartproduct['qty'];
                                    $order_product->save();
                               
    			}
    		}
		
    		//print_r($_POST);
		
    		if($order->pmtmethod == 'paypal')
    		{
    			$this->load->library('Paypal');
    			$myPaypal = new Paypal();
    			//$myPaypal->addField('business', 'sebastiano@tangail-sharee.com');
                $myPaypal->addField('business', 'ashish_1207733105_biz@gmail.com');
    			$myPaypal->addField('currency_code', $order->paid_currency);
    			$myPaypal->addField('return', base_url().'cart/paymentreturn/success/'.$order->SKU);
    			$myPaypal->addField('cancel_return', base_url().'cart/paymentreturn/failure/'.$order->SKU);
    			$myPaypal->addField('notify_url',  base_url().'cart/ipn_notification');
    		
                        if($this->input->post('toal_amount_charge_currency')=="USD")
                        {
                            $total_item_price = ($order->total_amount-($order->tax+$order->shipping_amount));
                            $paypal_amount = $total_item_price;
                            $paypal_tax = $order->tax;
                            $paypal_shipping = $order->shipping_amount;
                        }
                        elseif($this->input->post('toal_amount_charge_currency')=="EUR")
                        {
                            $total_item_price = ($order->total_amount-($order->tax+$order->shipping_amount));
                            $paypal_amount = $total_item_price;
                            $paypal_tax = $order->tax;
                            $paypal_shipping = $order->shipping_amount;
                        }
                        else
                        {
                            $total_item_price = ($order->total_amount-($order->tax+$order->shipping_amount));
                            $paypal_amount = $total_item_price;
                            $paypal_tax = $order->tax;
                            $paypal_shipping = $order->shipping_amount;
                        }
                                
    			$myPaypal->addField('item_name', "tangail-sharee Purchase");
    			$myPaypal->addField('custom', $order->id);
    			$myPaypal->addField('amount', $paypal_amount);
				$myPaypal->addField('tax', $paypal_tax);
				$myPaypal->addField('shipping', $paypal_shipping);
    		
    		
				$this->session->unset_userdata('order_id');
				$this->session->unset_userdata('order_sku');
    			//$myPaypal->enableTestMode();
    			$myPaypal->submitPayment();
    		} 
    		else
    		{
    			
				$creditcard_data = $this->session->userdata('userdetail');
				$oid = $this->session->userdata('order_id');
				$order = new Order($oid);
				$order->ordaddress->get();
				foreach ($order->ordaddress as $test)
				{
					if($test->type=='billing')
						$billadd = $test;
					else 
						$shipadd = $test;
				}
				$billadd->first_name;
				
			
				$this->data['paymentType']="Sale";
				
				$this->data['billing_firstname']=urlencode($billadd->first_name);
				$this->data['billing_lastname']=urlencode($billadd->last_name);
				$this->data['billing_addressline1']=urlencode($billadd->address_line1);
				$this->data['billing_addressline2']=urlencode($billadd->address_line2);
				$this->data['billing_country']=urlencode($billadd->country); //need to code here
				$this->load->model('country');
				$this->data['billing_country_code']=strtoupper($this->country->get_country_code($billadd->country)); //need to code here
				$this->data['billing_city']=urlencode($billadd->city);
				$this->data['billing_state']=urlencode($billadd->state);
				$this->data['billing_postal_code']=urlencode($billadd->postcode);
				
				$this->data['amount'] = urlencode(number_format($order->total_amount,2));
				$this->data['currencyCode'] = urlencode($order->paid_currency);
				//$this->data['credit_card_type']=urlencode($_POST['creditCardType']);
				$this->data['credit_card_number'] = urlencode($creditcard_data['ccno']);
				$this->data['expDateMonth'] = urlencode($creditcard_data['month']);
				$this->data['expDateYear'] = urlencode( $creditcard_data['year']);
				$this->data['cvv2Number'] = urlencode($creditcard_data['cvv']);
				$this->data['user_id']=urlencode($this->session->userdata('user_id'));
				
				
				//print_r($this->data);
				
				
				$nvpstr="&PAYMENTACTION=".$this->data['paymentType']."&AMT=".$this->data['amount']."&ACCT=".$this->data['credit_card_number']."&EXPDATE=".$this->data['expDateMonth'].$this->data['expDateYear']."&CVV2=".$this->data['cvv2Number']."&FIRSTNAME=".$this->data['billing_firstname']."&LASTNAME=".$this->data['billing_lastname']."&STREET=".$this->data['billing_addressline1']." ".$this->data['billing_addressline2']."&CITY=".$this->data['billing_city']."&STATE=".$this->data['billing_state']."&ZIP=".$this->data['billing_postal_code']."&COUNTRYCODE=".$this->data['billing_country_code']."&CURRENCYCODE=".$this->data['currencyCode']."";
                                //echo $nvpstr;
                                //exit(0);
				$resArray=$this->hash_call("doDirectPayment",$nvpstr);
				//print_r($resArray);
				$ack1 = strtoupper($resArray["ACK"]);
				//$ack1="SUCCESS";
				if($ack1=="SUCCESS")
				{
					$order_sku = $this->session->userdata('order_sku');
					$this->session->unset_userdata('order_id');
					$this->session->unset_userdata('order_sku');
                    $this->payment_success_through_paypal_credit_card($oid,$order_sku);
					$this->paymentreturn('success',$order_sku);
				}
				else
				{
					$this->session->set_userdata('credit_card_invalid','true');
					$this->session->set_userdata('receive_error',$resArray["L_LONGMESSAGE0"]);
                                        redirect('cart/checkout_detail','refresh');
				}
				
				
				
				
				
				
				
				
				/*
				
				
				
				$test = $this->session->userdata('userdetail');
    			$expdate = $test['month'].$test['year'];
    			$post_url = "https://test.authorize.net/gateway/transact.dll";
    			$post_values = array(
    			    		"x_login"			=> "8H5wF4qTE4",
    			    		"x_tran_key"		=> "3WxJ93qU9yfv6x3X",
    		
    			    		"x_version"			=> "3.1",
    			    		"x_delim_data"		=> "TRUE",
    			    		"x_delim_char"		=> "|",
    			    		"x_relay_response"	=> "FALSE",
    		
    			    		"x_type"			=> "AUTH_CAPTURE",
    			    		"x_method"			=> "CC",
    			    		"x_card_num"		=> $test['ccno'],
    			    		"x_exp_date"		=> $expdate,
    		
    			    		"x_amount"			=> $amount,
    			    		"x_description"		=> "Test Transaction",
    		
    			    		"x_first_name"		=> $test['name'],
    			    		//"x_last_name"		=> $billingadd['last_name'],
    			    		//"x_address"			=> $this->input->post('address'),
    			    		//"x_state"			=> $billingadd['state'],
    			    		//"x_zip"				=> $billingadd['postcode'],
    						);
    		
    			$post_string = "";
    			foreach( $post_values as $key => $value )
    			{
    				$post_string .= "$key=" . urlencode( $value ) . "&";
    			}
    			$post_string = rtrim( $post_string, "& " );
    			$request = curl_init($post_url); // initiate curl object
    			curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
    			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
    			curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
    			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
    			$post_response = curl_exec($request); // execute curl post and store results in $post_response
    			curl_close ($request); // close curl object
    		
    			$response_array = explode($post_values["x_delim_char"],$post_response);
    			if($response_array[6]==0)
				{
    				$this->session->set_userdata('credit_card_invalid','true');
				
					$this->session->unset_userdata('order_id');
					$this->session->unset_userdata('order_sku');
    				redirect('cart/checkout_detail','refresh');
    				//payment unsuccessful code
    			}else{
				$order_sku = $this->session->userdata('order_sku');
				$this->session->unset_userdata('order_id');
				$this->session->unset_userdata('order_sku');
    			$this->payment_success_through_authorize($oid,$order_sku);
				$this->paymentreturn('success',$order_sku);
    			}
				
				*/
    		}	
		}
		else
		{
			redirect('','refresh');
		}
    }
	
	
	
	function hash_call($methodName,$nvpStr)
	{
		//declaring of global variables
		//global $API_Endpoint,$version,$API_UserName,$API_Password,$API_Signature,$nvp_Header;

		//setting the curl parameters.
		$ch = curl_init();

		//print_r($ch);

		//echo 'unuss'.$ch.'cc'.$this->API_Endpoint;
		curl_setopt($ch, CURLOPT_URL,$this->API_Endpoint);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		//turning off the server and peer verification(TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, 1);
		//if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
	   //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php
		if(USE_PROXY)
		curl_setopt ($ch, CURLOPT_PROXY, PROXY_HOST.":".PROXY_PORT);

		//NVPRequest for submitting to server
		$nvpreq="METHOD=".urlencode($methodName)."&VERSION=".urlencode($this->version)."&PWD=".urlencode($this->API_Password)."&USER=".urlencode($this->API_UserName)."&SIGNATURE=".urlencode($this->API_Signature).$nvpStr;

		//echo $nvpreq;
		//setting the nvpreq as POST FIELD to curl
		curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpreq);

		//getting response from server
		$response = curl_exec($ch);
	    	//echo '<br>';
		//print($response);
		//convrting NVPResponse to an Associative Array
		$nvpResArray=$this->deformatNVP($response);
		$nvpReqArray=$this->deformatNVP($nvpreq);
		$_SESSION['nvpReqArray']=$nvpReqArray;

		if (curl_errno($ch)) {
			// moving to display page to display curl errors
			  $this->session->set_userdata('curl_error_no',curl_errno($ch));
			  $this->session->set_userdata('curl_error_msg',curl_error($ch));

				$this->session->set_userdata("receive_error","There was an error processing your credit card information. Please ensure all information is correct. <br>If errors persist, try another credit card.");  ////  Change the messgae
				//echo "receive error, please check coding";
				$this->session->set_userdata('credit_card_invalid','true');
				redirect('cart/checkout_detail','refresh');

				//redirect('index.php/secure/APIError','refresh');
			 /* $location = "APIError.php";
			  header("Location: $location");*/
		 } else {
			 //closing the curl
				curl_close($ch);
		  }

	return $nvpResArray;
	}

	function deformatNVP($nvpstr)
	{

		$intial=0;
		$nvpArray = array();


		while(strlen($nvpstr)){
			//postion of Key
			$keypos= strpos($nvpstr,'=');
			//position of value
			$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

			/*getting the Key and Value values and storing in a Associative Array*/
			$keyval=substr($nvpstr,$intial,$keypos);
			$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
			//decoding the respose
			$nvpArray[urldecode($keyval)] =urldecode( $valval);
			$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
		 }
		return $nvpArray;
	}
	
	
	
	function payment_success_through_paypal_credit_card($test,$sku)
	{
		$order = new Order($test);
    	$order->product->include_join_fields()->get();
    		
    	foreach($this->cart->contents() as $cartproduct)
    	{
    			
    		$options=$this->cart->product_options($cartproduct['rowid']);
    		$product = new Product($cartproduct['id']);
    		$user_id=$this->session->userdata('user_id');
    		$user=new User($user_id);
    		if($options['redeem']!=0)
			{
    			$pointreq = $product->points_to_buy*$options['rdmqty'];
    			$user->reward_points = $user->reward_points - $pointreq; 
    		}
    				
    		$user->reward_points = $user->reward_points + ($product->points_you_get*$cartproduct['qty']);
    		$user->save();
    		if($options['discount']!=0)
			{
    			$d = $options['discount'];
    		}
    		$row_id= $cartproduct['rowid'];
    		//echo $row_id;die;
    		$data = array(
    					'rowid'  => $row_id,
    				    'qty'    => 0
    					);
    		$this->cart->update($data);
    	}
    		
    	foreach($order->product->all as $prod)
		{
    		$product=new Product($prod->id);
    		$product->sold = $product->sold + $prod->join_quantity;
    		$product->save();
    			
    		$product->size->include_join_fields()->get_by_id($prod->join_size_id);
    			
    		$prod_size = new Product_size($product->size->join_id);
    		$prod_size->stock = $prod_size->stock - $prod->join_quantity ;
    		$prod_size->save();
    	}
    		
    	$order->status = 'Payment Successful';
    	if(isset($d))
    		$order->coupon_id = $d;
    	$order->save();
    	//order history update payment status
    	$order_h=new Order_history();
    	$order_h->where('order_id',$order->id )->get();
    	$order_h->status = $order->status;
    	$order_h->save();
    	
		
		$order=new Order($test);
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
    		$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd));
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
    	$adminemail = new Email(1);
    	$user_id=$this->session->userdata('user_id');
    	//$this->load->vars(array('order'=>$order));
    	$this->email->from('admin@tangail-sharee.com', 'tangail-sharee');
    	$this->email->to($adminemail->to_email);
    	$this->email->reply_to($adminemail->re_email);
    	$this->email->subject('New order has been placed at tangail-sharee!');
    	$this->email->message($this->load->view('email_template/order_notification_to_admin','',TRUE));
    	$this->email->send();
		
		//end of email sending code to admin
    			
    	//email to user
    	$useremail = new Email(2);
    	$user_id = $this->session->userdata('user_id');
		if($user_id!=NULL)
			{
				$user_data = new User($user_id);
				$profile_name = $user_data->first_name." ".$user_data->last_name;
			}
		else	
			$profile_name = $this->_user->first_name." ".$this->_user->last_name;
			
    	$this->load->vars(array('order'=>$order,'profile_name'=>$profile_name));
    	$this->email->from($useremail->from_email, 'tangail-sharee');
    	$this->email->to($this->_user->email);
    	$this->email->reply_to($useremail->re_email);
    	$this->email->subject('Thank you for choosing to buy from tangail-sharee!');
    	$this->email->message($this->load->view('email_template/order_notification_to_customer','',TRUE));
    	$this->email->send();
		// To send HTML mail, the Content-type header must be set
		
    	//end of email sending code to user
	}
	
	
	
	function ipn_notification()
	{
		if($this->input->post('ipn_track_id'))
		{
			$order_id=$this->input->post('custom');
			if($order_id!=NULL)
			{
				$order = new Order($order_id);
				$order->product->include_join_fields()->get();
				
				foreach($order->product->all as $prod)
				{
					$product=new Product($prod->id);
					$product->sold = $product->sold + $prod->join_quantity;
					$product->save();
					
					$product->size->include_join_fields()->get_by_id($prod->join_size_id);
					
					$prod_size = new Product_size($product->size->join_id);
					$prod_size->stock = $prod_size->stock - $prod->join_quantity ;
					$prod_size->save();
				}
				
				$order->status = 'Payment Successful';
				$order->save();
				
				//order history update payment status
				$order_h=new Order_history();
				$order_h->where('order_id',$order->id )->get();
				$order_h->status = $order->status;
				$order_h->save();
				
				
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
				if($order->coupon_id != 0)
				{
					$discount = new Coupon($order->coupon_id);
					$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd,'discount'=>$discount));
				 }
				 else
				 {
					$this->load->vars(array('order'=>$order,'billadd'=>$billadd, 'shipadd'=>$shipadd));
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
				$adminemail = new Email(1);
				$user_id=$order->user_id;
				//$this->load->vars(array('order'=>$order));
                                //$adminemail->to_email = 'ashish021@gmail.com';
				$this->email->from('admin@tangail-sharee.com', 'tangail-sharee');
				$this->email->to($adminemail->to_email);
				$this->email->reply_to($adminemail->re_email);
				$this->email->subject('New order has been placed at tangail-sharee!');
				$this->email->message($this->load->view('email_template/order_notification_to_admin','',TRUE));
				$this->email->send();
				
				//end of email sending code to admin
					
			
				//email to user
				$useremail = new Email(2);
				$user_id=$order->user_id;
				$user = new User($user_id);
				$profile_name = $this->_user->first_name." ".$this->_user->last_name;
				$this->load->vars(array('order'=>$order,'profile_name'=>$profile_name));
				$this->email->from($useremail->from_email, 'tangail-sharee');
				//$user->email = 'ashish021@gmail.com';
                                $this->email->to($user->email);
				$this->email->reply_to($useremail->re_email);
				$this->email->subject('Thank you for choosing to buy from tangail-sharee!');
				$this->email->message($this->load->view('email_template/order_notification_to_customer','',TRUE));
				$this->email->send();
				
			}
		}
	}
	
    function processorder()
    {
    	//$this->_chklogin();
    	//$oid = $this->session->userdata('order_id');
    	///$order = new Order($oid);
    	
    	$test = $this->input->post();
    	$expdate = $test['ccard']['month'].$test['ccard']['year'];
    	//echo "<pre>"; print_r($test);die;
    	$shippingadd = $test['data']['shipping'];
    	if ($test['group1']=='same')
    		$billingadd = $shippingadd;
    	else
    		$billingadd = $test['data']['billing'];
    	
    	
    	$user = new User($this->_user->id);
    	
    	if($order->save()){
    	
	    	$order->save($add);
	    	$order->save($add1);
	    	$oid = $order->id;
	    }
    	
    	if($test['pmtmethod']=='opt2')
    	{
    		//echo "paypal ";die;
    		$this->session->unset_userdata('order_id');
    		$this->load->library('Paypal');
    		$myPaypal = new Paypal();
    		$myPaypal->addField('business', 'krishn_1309608662_biz@deemtech.com');
    		$myPaypal->addField('currency_code', 'USD');
    		$myPaypal->addField('return', base_url().'/cart/paymentreturn/success/'.$oid);
    		$myPaypal->addField('cancel_return', base_url().'/cart/paymentreturn/failure/'.$oid);
    		$myPaypal->addField('notify_url', 'http://YOUR_HOST/payment/paypal_ipn.php');
    		$myPaypal->addField('amount', $amount);
    		$myPaypal->enableTestMode();
    		$myPaypal->submitPayment();
    		
    	}
    	else 
    	{
    		//echo "test";die;
    		$post_url = "https://test.authorize.net/gateway/transact.dll";
    		$post_values = array(
    			    		"x_login"			=> "8H5wF4qTE4",
    			    		"x_tran_key"		=> "3WxJ93qU9yfv6x3X",
    		
    			    		"x_version"			=> "3.1",
    			    		"x_delim_data"		=> "TRUE",
    			    		"x_delim_char"		=> "|",
    			    		"x_relay_response"	=> "FALSE",
    		
    			    		"x_type"			=> "AUTH_CAPTURE",
    			    		"x_method"			=> "CC",
    			    		"x_card_num"		=> $test['ccard']['ccno'],
    			    		"x_exp_date"		=> $expdate,
    		
    			    		"x_amount"			=> $amount,
    			    		"x_description"		=> "Test Transaction",
    		
    			    		"x_first_name"		=> $billingadd['first_name'],
    			    		"x_last_name"		=> $billingadd['last_name'],
    			    		//"x_address"			=> $this->input->post('address'),
    			    		"x_state"			=> $billingadd['state'],
    			    		"x_zip"				=> $billingadd['postcode'],
    		);
    		
    		$post_string = "";
    		foreach( $post_values as $key => $value )
    		{
    			$post_string .= "$key=" . urlencode( $value ) . "&";
    		}
    		$post_string = rtrim( $post_string, "& " );
    		$request = curl_init($post_url); // initiate curl object
    		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
    		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
    		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
    		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
    		$post_response = curl_exec($request); // execute curl post and store results in $post_response
    		curl_close ($request); // close curl object
    		
    		$response_array = explode($post_values["x_delim_char"],$post_response);
    		$this->session->unset_userdata('order_id');
    		if($response_array[6]==0){
    			$this->paymentreturn('failure',$oid);
    			//payment unsuccessful code
    		}else{
    			$this->paymentreturn('success',$oid);
    		}
    	}
    	
    }
    
    function checkLogin(){
    	$this->load->vars(array('not_login'=>TRUE));
  			
        $this->load->view('user/login_register');
    }
    
    function ManageCoupon(){
    	foreach($this->cart->contents() as $cartproduct)
    	{
    		$row_id= $cartproduct['rowid'];     
	        $amount= $cartproduct['subtotal'];
	        $discount=0;
	        $actual_amount=0;
	        $time=time();
	    	//if (isset($this->input->post('coupon_code'))){
	    		$coupon=new Coupon();
	    		$coupon->where('code',$this->input->post('coupon_code'))->get();
	    		
	    		$product->coupon->where('id',$coupon->id);
	           	$product->coupon->include_join_fields()->get();
	           	
	           	foreach ($product->coupon as $pcpn){
	           		$pcpn_id[]=$pcpn->id;
	           	}
	           	
	          	if(in_array($coupon->id, $pcpn_id)){
	           		if ($coupon->total_amount <= $amount && $coupon->end_date >= $time && $coupon->start_date <= $time){
		           		if ($coupon->type=='Fixed'){
		    				$discount +=$coupon->discount;
		    				$actual_amount +=$amount-$coupon->discount;
		    				
		    				$data = array(
					               'rowid'  => $row_id,
					               'options' => array('discount'=> $coupon->discount,'actual_price'=>$amount-$coupon->discount)
	           					 );
		    			}
		    			elseif ($coupon->type=='Percentage'){
		    				$discount +=(int($amount)*int($coupon->discount))/100;
		    				$actual_amount +=$amount-(int($amount)*int($coupon->discount))/100;
		    				
		    				$data = array(
					               'rowid'  => $row_id,
					               'options' => array('discount'=> (int($amount)*int($coupon->discount))/100,'actual_price'=>$amount-(int($amount)*int($coupon->discount))/100)
					            );
		    			}
	           		}
	           		else {
	           			$coupon_error="Error: This coupon is not valid or expired.";
    					$this->load->vars(array('coupon_error'=>$coupon_error));
	           		}
	           	}
	           	
	           	
	    		
	    		
	    	//}
	    	
		
			$this->cart->update($data);	
    	}
    }
    
}