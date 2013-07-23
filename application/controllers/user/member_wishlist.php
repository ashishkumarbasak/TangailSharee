<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_wishlist extends MY_Controller {
    
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
    
    public function index()
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
		foreach($designer as $d)
		{
		    $designers[$i]=$d->id;
		    $i++;
		}
		if(isset($designers) && !empty($designers))
		{
		    $this->load->vars(array('designers'=>$designers));
		}
		
	    	$my_product_id = array();
			$my_product_type = array();
			$products=$this->getWishlistProducts();
                        if(!empty($products))
                        {
			foreach($products as $my_p)
			{
				$explode_array = explode(",",$my_p);
				array_push($my_product_id,$explode_array[0]);
				array_push($my_product_type,$explode_array[1]);
			}
			$products = $my_product_id;
                        }
			//print_r($products);
			//print_r($my_product_type);
	    	if(!empty($products))
			{
		    	$p=new Product();
		    	$p->where_in('id',$products);
		    	$p->get();
		
		    	$j=0; $pro_img=array();
		    	foreach ($p as $pro)
				{
					foreach ($products as $key=>$value)
					{
			    		if($value==$pro->id)
						{
							$pro_image=new File($pro->feature_image);
							$pro_img[$j]=$pro_image->filename;
							$j++;
			    		}
					}
	    		}			
				
	    		$this->load->vars(array('wproducts'=>$p,'currencies'=>$currency,'user'=>$user,'pro_img'=>$pro_img,'my_product_type'=>$my_product_type));
	    		$this->load->view('user/member_wishlist');
			}
			else 
			{
				$this->load->vars(array('currencies'=>$currency,'user'=>$user));
				$this->load->view('user/member_wishlist');
			}
			
    }
    
    function deleteProduct($product_id=NULL) {
		if($product_id==NULL)
			$product_id = $this->input->post('product_id');

		//echo $product_id;
                $user_id=$this->session->userdata('user_id');
                $this->load->model('wishlist');
		$wishlist_id = $this->wishlist->get_wishlist_id($product_id,$user_id);
		$this->wishlist->delete_wishlist($wishlist_id);
		$this->wishlist->delete_wishlist_product($wishlist_id);
    	
		if($this->input->post('product_id')!=NULL)
			echo "1";
		else
                    redirect('user/member_wishlist');	
		
    }
}
?>