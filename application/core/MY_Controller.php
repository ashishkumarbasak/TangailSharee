<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller{
	public $_user;
	
	function __construct() 
	{
		parent::__construct();
		if(!$this->session->userdata('login'))
		{
			$this->session->set_userdata('user_id',null);	
		}
		
		$this->_user=new User($this->session->userdata('user_id'));
	 	$this->getWishlist();
	 	$this->getfooterMenu();
		$this->getContest();
		if(!$this->session->userdata('login') && !$this->input->cookie('twinne_currency')){
			$this->getDefaultCurrency();
		}
	 	if($this->uri->segment($this->uri->total_segments())=='home'){
	 		$this->getTopBanner();
	 	}
	 	else{
	 		$this->getOtherBanner();
	 	}
	 	if($this->uri->segment($this->uri->total_segments())=='single_product' || $this->uri->segment($this->uri->total_segments())=='singleDesign' ){
	 		$this->getBottomBanner();
	 	}
		$term_page=new Terms(1);
		$this->load->vars(array('term_page'=>$term_page));
		
		$admuser=new User($this->session->userdata('user_id'));
		$this->load->vars(array('admuser'=>$admuser));
		
		$tax = new Taxes();
		$tax->where('default','1')->get();
		$this->load->vars(array('tax'=>$tax));
		
		$query = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
		$current_loc= $this->uri->uri_string();
		$cur=$current_loc.''.$query;
		$this->load->vars(array('current_loc'=>$current_loc,'query_str'=>$query,'cur_url'=>$cur));
		
	foreach ($this->cart->contents() as $items){
			$rowid = $items['rowid'];
			$item=$this->cart->product_options($rowid);
			if(isset($items['options']['discount']) && $items['options']['discount']!= 0)
			{
				$applied_discount = new Coupon($items['options']['discount']);
				$this->load->vars(array('applied_discount'=>$applied_discount));
				//echo '<pre>';print_r($applied_discount);die;
			}
		}
	}
	
	
	function removeFromWishlist($product_id=NULL){
		//echo $cat;exit;
		if(!$this->_user->id || $product_id==NULL ){
			echo json_encode(false);
			return;
		}
		//$product=new Product($product_id);		
		//$this->_user->wishlist->delete($product);
		//$this->_user->wishlist->product->get();
		
		$this->obj =& get_instance();
		$this->obj->load->model('wishlist');
		$wishlist_id = $this->wishlist->get_wishlist_id($product_id,$this->_user->id);
		$this->wishlist->delete_wishlist($wishlist_id);
		$this->wishlist->delete_wishlist_product($wishlist_id);
		
		
		echo json_encode(true);
		
	}
	function removeWishlistlogout(){
		if(!$this->_user->id){
			return;
		}
		$this->_user->wishlist->delete();
	}
	
	function addToWishlist($product_id=NULL,$cat=NULL){
		if(!$this->_user->id || $product_id==NULL || $cat==NULL ){
			echo json_encode(false);
			return;
		}
		//$product=new Product($product_id);
		
		//if($cat!=NULL)
                //if($type!=NULL)
		//$this->_user->wishlist->product->set_join_field('type',$type);
		
		//$this->_user->wishlist->save($product);
		//print_r($this->_user->wishlist->product->get());
		$this->obj =& get_instance();
		$this->obj->load->model('wishlist');
		$wishlist_id = $this->obj->wishlist->save_in_wishlist_for_user($this->_user->id);
		$this->obj->wishlist->save_in_wishlist_product_info($product_id,$cat,$wishlist_id);
		
		echo json_encode(true);
		
	}
	
	
	function checkAccess($type){
		
		$u=new User($this->session->userdata('user_id'));
		
		switch($type){
			case 'Customers':
				return $u->isCustomer();
			case 'Adminstrators':
				return $u->isAdmin();
			case 'Super Admins':
				return $u->isSuperAdmin();
			case 'Designers':
				return $u->isDesigner();
			default :
				return false;
		}
	}

	
	function getWishlist(){
		if(!$this->_user->id)
			return false;
			
		$this->_user->wishlist->get();
		if(!$this->_user->wishlist->id)
		{
			$this->_user->wishlist=new Wishlist();
			$this->_user->wishlist->save($this->_user);
		}
		$this->_user->wishlist->product->get();
	}
	
	function getWishListProducts()
	{
		if(!$this->_user->id)
			return array();
		//$this->_user->wishlist->product->include_join_fields($this->_user->wishlist)->get();	
		$array=array();
		
		$this->obj =& get_instance();
		$this->obj->load->model('wishlist');
		$wishlist_product = $this->obj->wishlist->get_my_wishlist_product($this->_user->id);
		
		if($wishlist_product!=NULL)
                foreach($wishlist_product as $p){
			//echo $p->join_type;  exit;
			if($p->product_id!=NULL)
				{
					$array[]=$p->product_id.",".$p->type;
					
				}
			
		}
		//print_r($array);
		return $array;
	}
	
	function removeWishlist(){
		if(!$this->_user->id){
			echo json_encode(false);
			return;
		}
		$this->_user->wishlist->delete();
	}
	
	function removeProduct($product_id){
		if(!$this->_user->id){
			return False;
		}
		
		$this->obj =& get_instance();
		$this->obj->load->model('wishlist');
		$wishlist_id = $this->obj->wishlist->get_wishlist_id($product_id,$this->_user->id);
		$this->obj->wishlist->delete_wishlist($wishlist_id);
		$this->obj->wishlist->delete_wishlist_product($wishlist_id);
		
		//$product=new Product($product_id);
		//$this->_user->wishlist->delete($product);
		//$this->_user->wishlist->product->get();
		
		
	}
	function getCmsMenu() {
		$cms=new Cms();
		$cms->get();
		$this->load->vars(array('menus'=>$cms));
	}
	
	function getTopBanner(){
		$banner=new Banner(1);
		$banner->file->include_join_fields($banner)->get();
		foreach ($banner->file as $bfile){
			$bimg[]=$bfile->id;
		}
		if ($banner->rotate=='1') {
			$banner->file->include_join_fields($banner)->get();
			foreach ($banner->file as $bfile){
				$bimg[]=$bfile->id;
			}
			if (isset($bimg) && !empty($bimg)){
				$rand_id=rand(MIN($bimg),MAX($bimg));
				if (in_array($rand_id, $bimg)){
					$banner->file->where('file_id',$rand_id)->get();
				}
			}
			$this->load->vars(array('banners'=>$banner,'home'=>TRUE));
		}
		else {
			if (isset($bimg) && !empty($bimg)){
				$banner->file->where('file_id',MAX($bimg))->get();
			}
			//$banner->file->get();
			$this->load->vars(array('banners'=>$banner,'home'=>TRUE));
		}
		
    	
	}
	function getOtherBanner(){
		$banner=new Banner(2);
		$banner->file->include_join_fields($banner)->get();
		foreach ($banner->file as $bfile){
			$bimg[]=$bfile->id;
		}
		if ($banner->rotate=='1') {
			if (isset($bimg) && !empty($bimg)){
				$rand_id=rand(MIN($bimg),MAX($bimg));
					if (in_array($rand_id, $bimg)){
						$banner->file->where('file_id',$rand_id)->get();
					}
					
			}
			$this->load->vars(array('banners'=>$banner,'others'=>TRUE));
		}
		else {
			if (isset($bimg) && !empty($bimg)){
				$banner->file->where('file_id',MAX($bimg))->get();
			}
			$this->load->vars(array('banners'=>$banner,'others'=>TRUE));
		}
    	
	}
	
	function getBottomBanner(){
		$banner=new Banner(3);
		$banner->file->include_join_fields($banner)->get();
			foreach ($banner->file as $bfile){
				$bimg[]=$bfile->id;
			}
		if ($banner->rotate=='1') {
			if (isset($bimg) && !empty($bimg)){
				$rand_id=rand(MIN($bimg),MAX($bimg));
				if (in_array($rand_id, $bimg)){
					$banner->file->where('file_id',$rand_id)->get();
				}
				
			}
			$this->load->vars(array('bottom_banner'=>$banner,'bottom'=>TRUE));
			
		}
		else {
			
			if (isset($bimg) && !empty($bimg)){
				$banner->file->where('file_id',MAX($bimg))->get();
			}
			$this->load->vars(array('bottom_banner'=>$banner,'bottom'=>TRUE));
		}
		
    	
	}
	
	function getDefaultCurrency(){
		if($this->input->cookie('twinne_currency')){
			$cur_id=$this->input->cookie('twinne_currency');

			$c= new Currency($cur_id);
			//echo $c->name;exit;
		}
		else{
			$currency=new Currency();
			$currency->where('default','1')->get();
			foreach($currency as $cur){
				$cur_id=$cur->id;
			}
			$c= new Currency($cur_id);
			
			$cur_cookie= array(
				'name'   => 'currency',
				'value'  => $cur_id,
				'expire' => '86500',
				'prefix' => 'twinne_',
                    );
                    
			$this->input->set_cookie($cur_cookie);
			
		}
		
		
		
		//echo $c->name;exit;

		$this->load->vars(array('currency'=>$c));
		
	}
	
	function getContest(){
		$time = time();
		$contest=new Contest();
		$contest->where('is_active','1');
		$contest->where('start_date <',$time);
		$contest->where('end_date >',$time);
		$contest->get();
		
		$count = $contest->result_count();
		//echo $count; die;
		if($count > 0){
			$this->load->vars(array('new_event'=>TRUE));
		}
		else {
			return false;
		}
	}
	
	function curl_download($Url){
 
 		
		// is cURL installed yet?
		if (!function_exists('curl_init')){
		    die('Sorry cURL is not installed!');
		}
	     
		// OK cool - then let's create a new cURL resource handle
		$ch = curl_init();
	     
		// Now set some options (most are optional)
	     
		// Set URL to download
		curl_setopt($ch, CURLOPT_URL, $Url);
	     
		// Set a referer
		//curl_setopt($ch, CURLOPT_REFERER, "http://hostingmachine.net/dev/twinne");
	     
		// User agent
		//curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	     
		// Include header in result? (0 = yes, 1 = no)
		curl_setopt($ch, CURLOPT_HEADER, 0);
	     
		// Should cURL return or print out the data? (true = return, false = print)
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	     
		// Timeout in seconds
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	     
		// Download the given URL, and return output
		$output = curl_exec($ch);
	     
		// Close the cURL resource, and free system resources
		curl_close($ch);
		//echo $output; die;
		return $output;
	}


	
	function getfooterMenu()
	{
		//$base_url=base_url();
		$footer_menu=$this->curl_download('http://localhost/twinne/blog/footermenu/');
		$this->load->vars(array('footer_menu'=>$footer_menu));
		
	}
	
}