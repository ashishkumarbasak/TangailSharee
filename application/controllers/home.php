<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct() {
		parent::__construct();

		if(isset($_COOKIE["c"]))
			$pref_currency_type = $_COOKIE["c"];
		else
			$pref_currency_type = "GBP";

		$this->load->vars(array('pref_currency_type'=>$pref_currency_type));
	}

	public function index() {
		$currency=new Currency();
		$currency->get();

		$product=new Product();
		$product->where('is_active','1')->get();

		$pro_size=new Size();
		$pro_size->get();
		$i=0;

		$pid=NULL;

		foreach ($pro_size as $ps) {
			$ps->product->where_join_field($ps,"stock >",'0')->get();
			$prods=$ps->product;

			foreach ($prods as $p) {
				$pid[$i]=$p->id;
				$i++;
			}
		}

		$prod = array('-1');
		if($pid!=NULL)
			$prod=array_unique($pid);
    		
    	$product->where_in('id',$prod);
    	$product->order_by('RAND()');
    	$product->limit(8)->get();

    	$i = 1;
    	foreach($product as $p) {
    		$p->size->where_join_field($p,'stock>0');
    		$p->size->include_join_fields()->get();

    		$p->file->where_join_field($p,'default','1');
    		$p->file->where_join_field($p,'type <>','featured');
    		if($i % 2 != 0) {
    			$p->file->where_join_field($p,'type','man');
    			$p->file->limit(1);
    			$p->file->include_join_fields()->get();
    			if($p->file->filename) {
    				$p->file->where_join_field($p,'type','man');
    			}
    			else {
    				$p->file->where_join_field($p,'type','woman');
    			}
    		}
    		else {
    			$p->file->where_join_field($p,'type','woman');
    			$p->file->limit(1);
    			$p->file->include_join_fields()->get();
    			if($p->file->filename) {
    				$p->file->where_join_field($p,'type','woman');
    			}
    			else {
    				$p->file->where_join_field($p,'type','man');
    			}
    		}

    		$p->file->where_join_field($p,'default','1');
    		$p->file->where_join_field($p,'type <>','featured');
    		$p->file->limit(1);
    		$p->file->include_join_fields()->get();
    		$i++;
    	}

    	if(isset($_COOKIE["c"]))
    		$pref_currency_type = $_COOKIE["c"];
    	else
    		$pref_currency_type = "GBP";

    	$this->load->vars(array('topbanner'=>$this->getTopBanner()));
    	$this->load->vars(array('products'=>$product,'currencies'=>$currency,'wishlist'=>$this->getWishlistProducts(),'is_home_page'=>'1','pref_currency_type'=>$pref_currency_type));
    	$this->load->view('home');
    }

    function selectgateway() {
    	if($this->_user->id) {
    		$this->load->view('selectgateway');
    	} else {
    		redirect('login');
    	}
    }

    function getNewProducts() {
    	$product=new Product();
    	$product->where('is_active','1')->get();
    	$pro_size=new Size();
    	$pro_size->get();
    	$i=0;

    	foreach ($pro_size as $ps) {
    		$ps->product->where_join_field($ps,"stock >",'0')->get();
    		$prods=$ps->product;
    		foreach ($prods as $p) {
    			$pid[$i]=$p->id;
    			$i++;
    		}
    	}

    	$prod=array_unique($pid);
    	$count=$product->where_in('id',$prod)->count();
    	$page=$this->input->get("page");
    	$size=12;
    	$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
    	$pagination['url']=base_url()."home/getNewProducts?";
    	$product->where('is_active','1');
    	$product->where_in('id',$prod);
    	$product->order_by('date_added','desc')->get_paged($pagination['page'],$pagination['size']);

    	$i=1;
    	foreach($product as $p) {
    		$p->file->where_join_field($p,'default','1');
    		$p->file->where_join_field($p,'type <>','featured');

    		if($i % 2 != 0) {
    			$p->file->where_join_field($p,'type','man');
    			$p->file->limit(1);
    			$p->file->include_join_fields()->get();
    			if($p->file->filename) {
    				$p->file->where_join_field($p,'type','man');
    			} else {
    				$p->file->where_join_field($p,'type','woman');
    			}
    		}
    		else {
    			$p->file->where_join_field($p,'type','woman');
    			$p->file->limit(1);
    			$p->file->include_join_fields()->get();
    			if($p->file->filename) {
    				$p->file->where_join_field($p,'type','woman');
    			}
    			else {
    				$p->file->where_join_field($p,'type','man');
    			}
    		}

    		$p->file->where_join_field($p,'default','1');
    		$p->file->where_join_field($p,'type <>','featured');
    		$p->file->limit(1);
    		$p->file->include_join_fields()->get();
    		$i++;
    	}

    	$this->load->vars(array('new'=>true));
    	$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'wishlist'=>$this->getWishlistProducts()));
    	$is_ajax_pagination=$this->input->get('a_pagination');

    	if($is_ajax_pagination=="1")
    		$this->load->view('home_page_item');
    	else
    		$this->load->view('home');
    }

    function getPopularProducts() {
    	$product=new Product();
    	$product->where('is_active','1')->get();

    	$pro_size=new Size();
    	$pro_size->get();
    	$i=0;

    	foreach ($pro_size as $ps) {
    		$ps->product->where_join_field($ps,"stock >",'0')->get();
    		$prods=$ps->product;
    		foreach ($prods as $p) {
    			$pid[$i]=$p->id;
    			$i++;
    		}
    	}

    	$prod=array_unique($pid);
    	$count=$product->where_in('id',$prod)->count();
    	$page=$this->input->get("page");
    	$size=12;
    	$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
    	$pagination['url']=base_url()."home/getPopularProducts?";
    	$product->where('is_active','1');
    	$product->where_in('id',$prod);
    	$product->order_by('sold','desc')->order_by('date_added','desc')->get_paged($pagination['page'],$pagination['size']);


    	$i = 1;
    	foreach($product as $p) {
    		$p->file->where_join_field($p,'default','1');
    		$p->file->where_join_field($p,'type <>','featured');

    		if($i % 2 != 0) {
    			$p->file->where_join_field($p,'type','man');
    			$p->file->limit(1);
    			$p->file->include_join_fields()->get();

    			if($p->file->filename) {
    				$p->file->where_join_field($p,'type','man');
    			}
    			else {
    				$p->file->where_join_field($p,'type','woman');
    			}
    		}
    		else {
    			$p->file->where_join_field($p,'type','woman');
    			$p->file->limit(1);
    			$p->file->include_join_fields()->get();

    			if($p->file->filename) {
    				$p->file->where_join_field($p,'type','woman');
    			}
    			else {
    				$p->file->where_join_field($p,'type','man');
    			}
    		}

    		$p->file->where_join_field($p,'default','1');
    		$p->file->where_join_field($p,'type <>','featured');
    		$p->file->limit(1);
    		$p->file->include_join_fields()->get();
			$i++;
		}

		$this->load->vars(array('popular'=>true));
		$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'wishlist'=>$this->getWishlistProducts()));
		$is_ajax_pagination=$this->input->get('a_pagination');

		if($is_ajax_pagination=="1")
			$this->load->view('home_page_item');
		else
			$this->load->view('home');
	}
    
    function getSaleProducts() {
    	$product=new Product();
    	$product->where('is_active','1')->get();

    	$pro_size=new Size();
    	$pro_size->get();
    	$i=0;

    	foreach ($pro_size as $ps) {
    		$ps->product->where_join_field($ps,"stock >",'0')->get();
    		$prods=$ps->product;
    		foreach ($prods as $p) {
    			$pid[$i]=$p->id;
    			$i++;
    		}
    	}

    	$prod=array_unique($pid);
    	$product->where('is_active','1');
    	$product->where('original_value >','0');
    	$count=$product->where_in('id',$prod)->count();

    	$page=$this->input->get("page");
    	$size=12;
    	$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
    	$pagination['url']=base_url()."home/getSaleProducts?";
    	$product->where('is_active','1');
    	$product->where_in('id',$prod);
    	$product->where('original_value >','0')->order_by('date_added','desc')->get_paged($pagination['page'],$pagination['size']);

		$i = 1;
		foreach($product as $p) {
			$p->file->where_join_field($p,'default','1');
			$p->file->where_join_field($p,'type <>','featured');

			if($i % 2 != 0) {
				$p->file->where_join_field($p,'type','man');
				$p->file->limit(1);
				$p->file->include_join_fields()->get();

				if($p->file->filename) {
					$p->file->where_join_field($p,'type','man');
				}
				else {
					$p->file->where_join_field($p,'type','woman');
				}
			}
			else {
				$p->file->where_join_field($p,'type','woman');
				$p->file->limit(1);
				$p->file->include_join_fields()->get();

				if($p->file->filename) {
					$p->file->where_join_field($p,'type','woman');
				}
				else {
					$p->file->where_join_field($p,'type','man');
				}
			}

			$p->file->where_join_field($p,'default','1');
			$p->file->where_join_field($p,'type <>','featured');
			$p->file->limit(1);
			$p->file->include_join_fields()->get();
			$i++;
		}

		$this->load->vars(array('sale'=>true));
		$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'wishlist'=>$this->getWishlistProducts()));
		$is_ajax_pagination=$this->input->get('a_pagination');
		if($is_ajax_pagination=="1")
			$this->load->view('home_page_item');
		else
			$this->load->view('home');
	}

	function searchProducts() {
		$input=$this->input->post('search_string');
		$word=explode(" ",$input);
		$unique1=array_unique($word);
		
		foreach($unique1 as $key=>$value) {
			$word1=$this->getsymbol($value);
			$unique2[]=$word1;
		}

		$unique3=array_unique($unique2);

		$product=new Product();
		$product->get();

		$pro_size=new Size();
		$pro_size->get();
		$i=0;

		foreach ($pro_size as $ps) {
			$ps->product->where_join_field($ps,"stock >",'0')->get();
			$prods=$ps->product;
			foreach ($prods as $p) {
				$pid[$i]=$p->id;
				$i++;
			}
		}

		$prod=array_unique($pid);

		$product->where('is_active','1');
		$product->where_in('id',$prod);

		foreach($unique3 as $unq) {
			$product->like_related_user('first_name',$unq);
			$product->or_like_related_user('last_name',$unq);
			$product->or_like('name',$unq);
			$product->or_like('tag',$unq);
			$product->or_like_related_color('name',$unq);
			$product->or_like_related_size('name',$unq);
		}

		$product->distinct();
		$product->get();
		$count = $product->result_count();

		$nav_page=$this->input->get("page");
		$size=12;
		$pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
		$pagination['url']=base_url()."home/searchProducts?str=".$input.'&';

		$product->where('is_active','1');
		$product->where_in('id',$prod);

		foreach($unique3 as $unq) {
			$product->like_related_user('first_name',$unq);
			$product->or_like_related_user('last_name',$unq);
			$product->or_like('name',$unq);
			$product->or_like('tag',$unq);
			$product->or_like_related_color('name',$unq);
			$product->or_like_related_size('name',$unq);
		}

		$product->distinct();
		$product->order_by('date_added','desc')->get_paged($pagination['page'],$pagination['size']);

		$k=0;$products = array(); $l=0;
		foreach ($product as $p) {
			$p->size->where_join_field($p,'stock >','0');
			$p->size->include_join_fields()->get();

			$p->file->where_join_field($p,'default','1');
			$p->file->include_join_fields()->get();
			$search_products[$l]=$p->id;
			$l++;
		}

		if(empty($search_products)) {
			$this->load->vars(array('search_page'=>TRUE));
		}

		$this->load->vars(array('search_page'=>TRUE));
		$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'wishlist'=>$this->getWishlistProducts()));
		$is_ajax_pagination=$this->input->get('a_pagination');

		if($is_ajax_pagination=="1")
			$this->load->view('home_page_item');
		else
			$this->load->view('home');
	}

	function getsymbol($string) {
		$symbol=array("<",">","/",".","[","]","{","}","(",")","-","_","=","+","!","@","#","$","%","^","&","*",",","?","'",":",";","\t","\r\n");

		foreach($symbol as $key=>$val) {
			$xyz=str_replace($val,'',$string);
			$string=$xyz;
		}

		return $string;
	}
}