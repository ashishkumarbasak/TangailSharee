<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Single_product extends MY_Controller 
{
    
    public function __construct()
    {	 
        parent::__construct();
        //code for currency change
        if(isset($_COOKIE["c"]))
           $pref_currency_type = $_COOKIE["c"];
        else
           $pref_currency_type = "GBP";   
        $this->load->vars(array('pref_currency_type'=>$pref_currency_type));
    }
    
    public function index()
	{
    	$this->checkAccess('Customers');
    	$type=$this->input->get('type');
    	$id=$this->input->get('id');
    	
    	$product=new Product($id);
		$pro_size=new Size();
    	$pro_size->get();
    	$i=0;
		$pid = NULL;
    	foreach ($pro_size as $ps)
		{
    		$ps->product->where_join_field($ps,"stock >=",'0')->get();
	    	$prods=$ps->product;
	    	foreach ($prods as $p){
		    if($p->id != $product->id){
	    		$pid[$i]=$p->id;
			 $i++;
		    }
	    	   
	    	}
    	}
    	
		$prod = @array_unique($pid);
		//print_r($prod);
		$sub_product=new Product();
    	$sub_product->where('is_active','1');
		$tags = explode(',',$product->tag);
		$sub_product->like('tag',$tags[0]);
		for($i=1;$i<count($tags); $i++)
		{
	    	$sub_product->or_like('tag',$tags[$i]);
		}
		$sub_product->where_in('id',$prod);
		$sub_product->order_by('RAND()');
		$sub_product->limit('8');
		$sub_product->get();
		
		$count = $sub_product->result_count();
		//exit(0);
		/* if there is no related match based on tag */
		if($count<=1)
		{
			$sub_product->where('is_active','1');
			$sub_product->where_in('id',$prod);
			$sub_product->order_by('RAND()');
			$sub_product->limit('8');
			$sub_product->get();
		}
		/* if there is no related match based on tag */
		
		$count = $sub_product->result_count();
		$j = 1;
		foreach($sub_product as $p)
		{
			$p->file->where_join_field($p,'default','1');
			$p->file->where_join_field($p,'type <>','featured');
			if($j % 2 != 0)
			{
		    	$p->file->where_join_field($p,'type','man');
		    	$p->file->limit(1);
		    	$p->file->include_join_fields()->get();
		    	if($p->file->filename)
				{
					$p->file->where_join_field($p,'type','man');
		    	}
		    	else
				{
					$p->file->where_join_field($p,'type','woman');
		    	}
			}
			else
			{
		    	$p->file->where_join_field($p,'type','woman');
		    	$p->file->limit(1);
		    	$p->file->include_join_fields()->get();
		    	if($p->file->filename)
				{
					$p->file->where_join_field($p,'type','woman');
		    	}
		    	else
				{
					$p->file->where_join_field($p,'type','man');
		    	}
			}
			$p->file->where_join_field($p,'default','1');
			$p->file->where_join_field($p,'type <>','featured');
			$p->file->limit(1);
			$p->file->include_join_fields()->get();
			$j++;
       	}
	
		if ($type=='man')
		{
			$product->file->where_join_field($product,'type !=','featured');
			$product->file->order_by_join_field($product,'type', 'DESC');
			$product->file->order_by_join_field($product,'default','DESC');
			//$product->size->where_join_field($product,'catagory','man');
			$product->size->where_join_field($product,'stock >=','0');
		}
		elseif ($type=='woman')
		{
			$product->file->where_join_field($product,'type !=','featured');
			$product->file->order_by_join_field($product,'type', 'DESC');
			$product->file->order_by_join_field($product,'default','DESC');
			//$product->size->where_join_field($product,'catagory','woman');
			$product->size->where_join_field($product,'stock >=','0');
		}
    	
    	$product->size->include_join_fields()->get();
    	$product->file->include_join_fields()->get();
    	$currency=new Currency();
		$currency->get();
				
		$i=0; $woman_size=array(); $man_size=array();
		foreach($product->size as $pro_size)
		{
		   if($pro_size->join_catagory=='woman')
		   {
			    $woman_size[$i]=$pro_size->id;
			    $i++;
		    }
		    else
			{
				$man_size[$i]=$pro_size->id;
			    $i++;
		    }
		}
		$this->load->vars(array('woman_size'=>$woman_size,'man_size'=>$man_size));
		$this->load->vars(array('wishlist'=>$this->getWishlistProducts()));
		
     	$this->load->vars(array('product'=>$product,'id'=>$id,'currencies'=>$currency,'type'=>$type,'sub_products'=>$sub_product));
        $this->load->view('single_product');   
    }    
}
?>