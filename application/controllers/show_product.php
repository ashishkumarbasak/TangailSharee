<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show_product extends MY_Controller {
    
    public function __construct()
	{
        parent::__construct();
   		$type=$this->input->get('type');
    	if($type=='man'){$types='man';}
		elseif($type=='woman'){$types='woman';}
		else{$types='';}
        
        $size=new Size();
        
        $size->where('catagory',$types)->get();
		$color=new Color();
		$color->get();
        $this->load->vars(array('sizes'=>$size,'colors'=>$color));
        
        //code for currency change
        if(isset($_COOKIE["c"]))
           $pref_currency_type = $_COOKIE["c"];
        else
           $pref_currency_type = "GBP";   
        $this->load->vars(array('pref_currency_type'=>$pref_currency_type));
    }
    
    public function index()
	{
    	$product=new Product();
    	$type=$this->input->get('type');
		$is_ajax_pagination=$this->input->get('a_pagination');
    	if($type=='man'){$types='man';}
		elseif($type=='woman'){$types='woman';}
		else{$types='man';}
    	
    	$product->get();
    	$pro_size=new Size();
    	$pro_size->get();
    	$i=0;

    	foreach ($pro_size as $ps)
		{
    		$ps->product->where_join_field($ps,"catagory",$types);
    		$ps->product->where_join_field($ps,"stock >",'0')->get();
	    	$prods=$ps->product;
	    	foreach ($prods as $p)
			{
	    		$pid[$i]=$p->id;
	    		$i++;
	    	}
    	}
    	
    	$prod=array_unique($pid);
    	$product->where('is_active','1');
    	$count=$product->where_in('id',$prod)->count();
		$page=$this->input->get("page");
        $size=12;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."show_product?type=".$types.'&';
        $product->where('is_active','1');
        $product->where_in('id',$prod)->order_by('date_added','desc')->get_paged($pagination['page'],$pagination['size']);
        
        $k=0;$products = array();
    	foreach ($product as $p)
		{
    		$p->size->where_join_field($p,'stock >','0');
    		$p->size->where_join_field($p,'catagory',$types);
    		$p->size->include_join_fields()->get();
    		
    		$p->file->where_join_field($p,'type',$types);
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();	
		}
    	
		$user=new User($this->session->userdata('user_id'));
		$user->get();
		$this->load->vars(array('user'=>$user));
	
    	$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'type'=>$type,'wishlist'=>$this->getWishlistProducts()));
		if($is_ajax_pagination=="1")
			$this->load->view('show_product_item');
		else
        	$this->load->view('show_product');
    }
    
    
	public function size()
	{
		$size_id=$this->input->get('size');
		$psize=new Size($size_id);
		
		$type=$this->input->get('type');
		if($type=='man'){$types='man';}
		elseif($type=='woman'){$types='woman';}
		else{$types='';}
			
		$count=$psize->product->where_join_field($psize,"stock >",'0')->count();
        $page=$this->input->get("page");
		$size=12;
		$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
		$pagination['url']=base_url()."show_product/size?type=".$types.'&size='.$size_id.'&';
		
		$psize->product->where_join_field($psize,"stock >",'0')->get_paged($pagination['page'],$pagination['size']);
		$product=$psize->product;
		foreach ($product as $p)
		{
			$p->size->where_join_field($p,'stock>0');
			$p->size->include_join_fields()->get();
			$stock=0;
			foreach ($p->size as $psize)
			{
				   if ($psize->catagory==$types)
					{
						$stock +=$psize->join_stock;
				   }
			}
			if ($stock > 0)
			{
				$p->file->where_join_field($p,'type',$types);
				$p->file->where_join_field($p,'default','1');
				$p->file->include_join_fields()->get();
				$p->stock = 1;
			}
    	}
    	
    	$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'selected_size'=>$size_id));
    	$this->load->vars(array('size'=>$size_id,'type'=>$type,'wishlist'=>$this->getWishlistProducts()));
        $is_ajax_pagination=$this->input->get('a_pagination');
		if($is_ajax_pagination=="1")
			$this->load->view('show_product_item');
		else
        	$this->load->view('show_product');
    }

    
    function Pcolor()
	{
		$pcolor_id=$this->input->get('color');
		$pcolor=new Color($pcolor_id);

		$type=$this->input->get('type');
		if($type=='man'){$types='man';}
		elseif($type=='woman'){$types='woman';}
		else{$types='';}
	
	
		$product=new Product();
		$product->get();
		$pro_size=new Size();
    	$pro_size->get();
    	$i=0;
    	foreach ($pro_size as $ps)
		{
    		$ps->product->where_join_field($ps,"catagory",$types);
    		$ps->product->where_join_field($ps,"stock >",'0')->get();
	    	$prods=$ps->product;
	    	foreach ($prods as $p)
			{
	    		$pid[$i]=$p->id;
	    		$i++;
	    	}
    	}
    	
    	$prod=array_unique($pid);
    	$product->where('color_id',$pcolor_id);
    	$product->where('is_active','1');
	
    	$count=$product->where_in('id',$prod)->count();
		
        $page=$this->input->get("page");
        $size=12;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."show_product/Pcolor?type=".$types.'&color='.$pcolor_id.'&';
        $product->where('is_active','1');
        $product->where_in('id',$prod);
		$product->where('color_id',$pcolor_id)->get_paged($pagination['page'],$pagination['size']);

		$prod_id=array();
    	foreach ($product as $p)
		{
    		$p->size->where_join_field($p,'stock >','0');
    		$p->size->where_join_field($p,'catagory',$types);
    		$p->size->include_join_fields()->get();
    		
    		$p->file->where_join_field($p,'type',$types);
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();
			$prod_id[]=$p->id;
		}
		if(empty($prod_id))
		{
		    $this->load->vars(array('prods'=>$prod_id));
		}
		
    	$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'type'=>$type,'wishlist'=>$this->getWishlistProducts()));
		$this->load->vars(array('pcolor'=>$pcolor_id));
        $is_ajax_pagination=$this->input->get('a_pagination');
		if($is_ajax_pagination=="1")
			$this->load->view('show_product_item');
		else
        	$this->load->view('show_product');
    }
    
    function getNewProducts()
	{
		$type=$this->input->get('type');
	    if($type=='man'){$types='man';}
		elseif($type=='woman'){$types='woman';}
		else{$types='';}
    	
		$product=new Product();
    	$product->order_by('date_added','desc');
	
    	$product->where('is_active','1');
		$product->get();
	
    	$pro_size=new Size();
    	$pro_size->get();
    	$i=0;
    	foreach ($pro_size as $ps)
		{
    		$ps->product->where_join_field($ps,"catagory",$types);
    		$ps->product->where_join_field($ps,"stock >",'0')->get();
	    	$prods=$ps->product;
	    	foreach ($prods as $p)
			{
	    		$pid[$i]=$p->id;
	    		$i++;
	    	}
    	}
    	
    	$prod=array_unique($pid);
	
		$count=$product->where_in('id',$prod)->count();
		
        $page=$this->input->get("page");
        $size=12;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."show_product/getNewProducts?type=".$types.'&';
        $product->where('is_active','1');
        $product->where_in('id',$prod);
		$product->order_by('date_added','desc')->get_paged($pagination['page'],$pagination['size']);
        
		$prod_id=array();
    	foreach ($product as $p)
		{
    		$p->file->where_join_field($p,'type',$types);
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();
			$prod_id[]=$p->id;
		}

		if(empty($prod_id))
		{
		    $this->load->vars(array('prods'=>$prod_id));
		}
		
    	$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'type'=>$types,'wishlist'=>$this->getWishlistProducts()));
		$this->load->vars(array('new'=>true));
    
        $is_ajax_pagination=$this->input->get('a_pagination');
		if($is_ajax_pagination=="1")
			$this->load->view('show_product_item');
		else
        	$this->load->view('show_product');
    }
      
    function getPopularProducts()
	{
		$type=$this->input->get('type');
		if($type=='man'){$types='man';}
		elseif($type=='woman'){$types='woman';}
		else{$types='';}

    	$product=new Product();
    	$product->order_by('sold','desc');
		$product->where('is_active','1');
		$product->get();
	
    	$pro_size=new Size();
    	$pro_size->get();
    	$i=0;
    	foreach ($pro_size as $ps)
		{
    		$ps->product->where_join_field($ps,"catagory",$types);
    		$ps->product->where_join_field($ps,"stock >",'0')->get();
	    	$prods=$ps->product;
	    	foreach ($prods as $p)
			{
	    		$pid[$i]=$p->id;
	    		$i++;
	    	}
    	}
    	
    	$prod=array_unique($pid);
		$count=$product->where_in('id',$prod)->count();
		
        $page=$this->input->get("page");
        $size=12;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."show_product/getPopularProducts?type=".$types.'&';
        $product->where('is_active','1');
        $product->where_in('id',$prod);
		$product->order_by('sold','desc')->order_by('date_added','desc')->get_paged($pagination['page'],$pagination['size']);
        
		$prod_id=array();
    	foreach ($product as $p)
		{
    		$p->file->where_join_field($p,'type',$types);
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();
			$prod_id[]=$p->id;
		}
		
		if(empty($prod_id))
		{
		    $this->load->vars(array('prods'=>$prod_id));
		}
		
    	$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'type'=>$types,'wishlist'=>$this->getWishlistProducts()));
		$this->load->vars(array('popular'=>true));
    
        $is_ajax_pagination=$this->input->get('a_pagination');
		if($is_ajax_pagination=="1")
			$this->load->view('show_product_item');
		else
        	$this->load->view('show_product');
    }
    
    function getSaleProducts()
	{
		$type=$this->input->get('type');
		if($type=='man'){$types='man';}
		elseif($type=='woman'){$types='woman';}
		else{$types='';}
    	
		$product=new Product();
    	$product->where('is_active','1');
		$product->where('original_value >','0');
		$product->get();
	
    	$pro_size=new Size();
    	$pro_size->get();
    	$i=0;
    	foreach ($pro_size as $ps)
		{
    		$ps->product->where_join_field($ps,"catagory",$types);
    		$ps->product->where_join_field($ps,"stock >",'0')->get();
	    	$prods=$ps->product;
	    	foreach ($prods as $p)
			{
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
        $pagination['url']=base_url()."show_product/getSaleProducts?type=".$types.'&';
        $product->where('is_active','1');
        $product->where_in('id',$prod);
		$product->where('original_value >','0')->order_by('date_added','desc')->get_paged($pagination['page'],$pagination['size']);

		$prod_id=array();
    	foreach ($product as $p)
		{
    		$p->file->where_join_field($p,'type',$types);
    		$p->file->where_join_field($p,'default','1');
    		$p->file->include_join_fields()->get();
			$prod_id[]=$p->id;
		}
	
		if(empty($prod_id))
		{
		    $this->load->vars(array('prods'=>$prod_id));
		}
		
    	$this->load->vars(array('products'=>$product,'pagination'=>$pagination,'type'=>$types,'wishlist'=>$this->getWishlistProducts()));
		$this->load->vars(array('sale'=>true));
    
        $is_ajax_pagination=$this->input->get('a_pagination');
		if($is_ajax_pagination=="1")
			$this->load->view('show_product_item');
		else
        	$this->load->view('show_product');
    }
   
}
?>