<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_manager extends MY_Controller {
    
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
        
        $product=new Product();

	if($this->input->get()){
	    $test = $this->input->get();
		//echo "<pre>"; print_r($test['designer']); die;
			//echo test; die;
	    if(isset($test['name']) && !empty($test['name'] ))
		$query_array['name'] = $test['name'];
		
	    if(isset($test['designer']) && !empty($test['designer'] ))
		$query_array['designer'] = $test['designer'];
		
	    if(isset($test['color']) && !empty($test['color']))
		$query_array['color'] = $test['color'];
	    
	    //echo "<pre>";print_r($query_array);die;
	    /*
	    $query_array = array(
		    'name' => $this->input->get('name'),
		    'designer' => $this->input->get('designer'),
		    'color' => $this->input->get('color'),
	    );*/
	    if(isset($query_array)){
		$query = http_build_query($query_array);
		//echo "<pre>";print_r($query_array);die;
	    
	    
	    if(isset($query_array['name']))
		    $product->like('name',$query_array['name']);
		    
	    if(isset($query_array['designer']))
		    $product->like_related_user('first_name',$query_array['designer']);
	    
	    if(isset($query_array['color']))
		    $product->like('color_id',$query_array['color']);
	    }
	    
	}
	$product->get();
	$count = $product->result_count();
	
	$page=$this->input->get("page");
	$size=10;
	$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
	if(isset($query)){
	    $pagination['url']=base_url()."admin/product_manager/index?".$query."&";
	}
	else{
	    $pagination['url']=base_url()."admin/product_manager/index?";
	}
	
	
	$product->where('is_active','1');
	$product->order_by('date_added','desc');
	
	if(isset($query_array)){
	    if(isset($query_array['name']))
		    $product->like('name',$query_array['name']);
		    
	    if(isset($query_array['designer']))
		    $product->like_related_user('first_name',$query_array['designer']);
	    
	    if(isset($query_array['color']))
		    $product->like('color_id',$query_array['color']);
	    
	}

	$product->get_paged($pagination['page'],$pagination['size']);
	
        foreach($product as $p){
            $p->file->where_join_field($p,'default','1');
            $p->file->include_join_fields()->get();
	    
	    $p->size->include_join_fields()->get();
	    
	    
	    $pstock=0;
	    if(isset($p->id) && isset($p->size)){ 
	    foreach($p->size as $psize){
		    $pstock += $psize->join_stock;
	            
	        }
	    }
            $stock[$p->id]=$pstock;
	    
	    if(isset($p->id) && $p->feature_image!=0){
			$pimage=new File($p->feature_image);
			$pimg[$p->id]=$pimage->filename;
			$this->load->vars(array('pimg'=>$pimg));
	    }
           
            foreach($p->file as $file){
	         	if($file->join_type=='man'){
	        		$p->man=$file;
	        	}else if($file->join_type=='woman'){
	        		$p->woman=$file;
	        	}
	        }
        }
	
	$color=new Color();
	$color->get();
	$this->load->vars(array('colors'=>$color));
	
        $this->load->vars(array('products'=>$product,'pagination'=>$pagination,'stock'=>$stock));
    	$this->load->view('admin/list_product');
    }
    
    function filter_index()
    {
	    if($this->input->post())
	    {
		    $filter = $this->input->post();
		    $query = http_build_query($filter);
		    redirect("admin/product_manager/index?$query&");
	    }
    }
    
    function addProduct()
	{
    	$role=new Role();
    	$role->where('name','Designers')->get();
    	$user=$role->user->get();
    	
		$color=new Color();
		$color->get();
    	$this->load->vars(array('users'=>$user,'colors'=>$color));
    	$this->load->view('admin/add_product');
    }
    
    function saveProduct()
	{
		$time=time();
		$flag=0;
        	if($this->input->post('product_id'))
    			$p=new Product($this->input->post('product_id'));
    		else{
    				$p=new Product();
					$flag=1;
    			}
    	 	$p->name=$this->input->post('name');
    		//$p->price=$this->input->post('price');
    		$p->product_info=$this->input->post('product_info');
			$p->size_info=$this->input->post('size_info');
			$p->delivery_info=$this->input->post('delivery_info');
        	$p->user_id=$this->input->post('user_id');
        	$p->color_id=$this->input->post('color_id');
			$p->meta_tags=$this->input->post('meta_tag');
			$p->tag=$this->input->post('tag');
			if($flag==1)
			{
	    		$p->date_added=$time;
			}
			$p->status = "Out of stock";
        	$p->is_active='1';
        
        	if($this->input->post('for_man')=='1')
			{
            	$p->for_man='1';
        	}
			else
			{
            	$p->for_man='0';
        	}
        
        	if($this->input->post('for_woman')=='1')
			{
            	$p->for_woman='1';
        	}  
			else 
			{
            	$p->for_woman='0';
        	}
        	//echo $flag; die;
        
        	if($p->save())
			{
	    		if($p->SKU==NULL)
				{
					$this->load->library('skulibrary');
					$productSKU = $this->skulibrary->generate_product_sku($p->id);
					$p->SKU = $productSKU;
					$p->save();
				}
				
				if($flag==1)
				{
					$pcolor=new Color($p->color_id);
					$pcolor->product_count +=1;
					$pcolor->save();
	    		}
	    
	   	 		$p->size->include_join_fields()->get();
            
	    if ($_FILES['productfile']){
        	try{
			
		        $image=new File();
		        $image->file='productfile';
		        $image->upload_path="images/product_image/original_image";
		        $image->upload();
			
			$ratio=(($image->original_width/145)<($image->original_height/168))?($image->original_width/145):($image->original_height/168);
		        $image->width=intval(145*$ratio);
		        $image->height=intval(168*$ratio);
		        $image->x_axis=($image->original_width-$image->width)/2;
		        $image->y_axis=($image->original_height-$image->height)/2;
		        $image->maintain_ratio=false;
		        $image->new_image="images/product_image/feature_image";
		        $image_feature=$image->crop();
		        
		        $image_feature->width=145;
		        $image_feature->height=168;
		        $image_feature->resize();
			
			$ratio=(($image->original_width/101)<($image->original_height/118))?($image->original_width/101):($image->original_height/118);
			$image->width=intval(101*$ratio);
			$image->height=intval(118*$ratio);
			$image->x_axis=($image->original_width-$image->width)/2;
			$image->y_axis=($image->original_height-$image->height)/2;
			$image->maintain_ratio=false;
			$image->new_image="images/product_image/front_image";
			$image_front=$image->crop();
			    
			$image_front->width=101;
			$image_front->height=118;
			$image_front->resize();
			
			$ratio=(($image->original_width/638)<($image->original_height/612))?($image->original_width/638):($image->original_height/612);
		        $image->width=intval(638*$ratio);
		        $image->height=intval(612*$ratio);
		        $image->x_axis=($image->original_width-$image->width)/2;
		        $image->y_axis=($image->original_height-$image->height)/2;
		        $image->maintain_ratio=false;
		        $image->new_image="images/product_image/full_image";
			
		        $image_full=$image->crop();
		        $image_full->width=638;
		        $image_full->height=612;
		        $image_full->resize();
			
			$ratio=(($image->original_width/50)<($image->original_height/50))?($image->original_width/50):($image->original_height/50);
		        $image->width=intval(50*$ratio);
		        $image->height=intval(50*$ratio);
		        $image->x_axis=($image->original_width-$image->width)/2;
		        $image->y_axis=($image->original_height-$image->height)/2;
		        $image->maintain_ratio=false;
		        $image->new_image="images/product_image/short_image";
		        $image_short=$image->crop();
		        
		        
		        $image_short->width=50;
		        $image_short->height=50;
		        $image_short->resize();
		        
		        $ratio=(($image->original_width/236)<($image->original_height/292))?($image->original_width/236):($image->original_height/292);
		        $image->width=intval(236*$ratio);
		        $image->height=intval(292*$ratio);
		        $image->x_axis=($image->original_width-$image->width)/2;
		        $image->y_axis=($image->original_height-$image->height)/2;
		        $image->maintain_ratio=false;
		        $image->new_image="images/product_image/list_image";
		        $image_list=$image->crop();
		        
		        
		        $image_list->width=236;
		        $image_list->height=292;
		        $image_list->resize();
			
			//echo $flag; die;
			if($flag==1){
			    $image->save($p);
			    
			    $image->set_join_field($p, 'type','featured');
			    $p->feature_image=$image->id;
			    $p->save();
			}
			else if($flag==0){
			    $p->file->where_join_field($p,'type','featured')->get();
			    //echo count($p->file->all); die;
			    if(count($p->file->all) > 0){
				$img=new File($p->file->id);
				unlink($img->filepath);
				unlink("images/product_image/feature_image/".$img->filename);
				unlink("images/product_image/short_image/".$img->filename);
				unlink("images/product_image/list_image/".$img->filename);
				unlink("images/product_image/full_image/".$img->filename);
				unlink("images/product_image/front_image/".$img->filename);
				$img->delete($p);
			    }
			    $image->save($p);
			    //echo $image->id; die;
			    $image->set_join_field($p, 'type','featured');
			    $p->feature_image=$image->id;
			    $p->save();
			}
        	}
        	catch (Exception $e){
		   // echo $flag; die;
			$this->load->vars(array('excep'=>$e));
        	}
		 
        }
	    
            redirect('admin/product_manager/stockManager/'.$p->id,'refresh');
        }else{
            $this->load->vars(array('errors'=>$p->error->all));
            if($this->input->post('product_id'))
            	$this->editProduct($p->id);
            else 
            	$this->addProduct();
        }
    }
    
    
    function editProduct($product_id){
	
	$product=new Product($product_id);
	
    	$role=new Role();
    	$role->where('name','Designers')->get();
    	$user=$role->user->get();
    	
    	$color=new Color();
	$color->get();
	
	$fimage=array();
	$fimage=new File($product->feature_image);
	$fimg[$product_id]=$fimage->filename;
	
    	$this->load->vars(array('users'=>$user,'colors'=>$color,'fimg'=>$fimg));
    	$this->load->vars(array('product'=>$product));
        
    	$this->load->view('admin/add_product');
    }
    
    
    function imageManager($product_id){
        $product=new Product($product_id);
        
        $image=new File();
        
        $product->file->include_join_fields($product)->get();
        
        $this->load->vars(array('product'=>$product,'images'=>$image));
        $this->load->view('admin/product_image');
    }
    
    
    function saveImage(){
        
        $product_id=$this->input->post('product');
        $product=new Product($product_id);
        //var_dump($_FILES);exit;
        if ($_FILES['userfile']){
        	try{
		        $image=new File();
		        $image->file='userfile';
		        $image->upload_path="images/product_image/original_image";
		        $image->upload();
		        
		        $ratio=(($image->original_width/638)<($image->original_height/612))?($image->original_width/638):($image->original_height/612);
		        $image->width=intval(638*$ratio);
		        $image->height=intval(612*$ratio);
		        $image->x_axis=($image->original_width-$image->width)/2;
		        $image->y_axis=($image->original_height-$image->height)/2;
		        $image->maintain_ratio=false;
		        $image->new_image="images/product_image/full_image";
		        $image_full=$image->crop();
		        $image_full->width=638;
		        $image_full->height=612;
		        $image_full->resize();
		        
		        
		        $ratio=(($image->original_width/145)<($image->original_height/168))?($image->original_width/145):($image->original_height/168);
		        $image->width=intval(145*$ratio);
		        $image->height=intval(168*$ratio);
		        $image->x_axis=($image->original_width-$image->width)/2;
		        $image->y_axis=($image->original_height-$image->height)/2;
		        $image->maintain_ratio=false;
		        $image->new_image="images/product_image/thumb_image";
		        $image_thumb=$image->crop();
		        
		        $image_thumb->width=145;
		        $image_thumb->height=168;
		        $image_thumb->resize();
		        
		        
		        $ratio=(($image->original_width/50)<($image->original_height/50))?($image->original_width/50):($image->original_height/50);
		        $image->width=intval(50*$ratio);
		        $image->height=intval(50*$ratio);
		        $image->x_axis=($image->original_width-$image->width)/2;
		        $image->y_axis=($image->original_height-$image->height)/2;
		        $image->maintain_ratio=false;
		        $image->new_image="images/product_image/short_image";
		        $image_short=$image->crop();
		        
		        
		        $image_short->width=50;
		        $image_short->height=50;
		        $image_short->resize();
		        
		        $ratio=(($image->original_width/236)<($image->original_height/292))?($image->original_width/236):($image->original_height/292);
		        $image->width=intval(236*$ratio);
		        $image->height=intval(292*$ratio);
		        $image->x_axis=($image->original_width-$image->width)/2;
		        $image->y_axis=($image->original_height-$image->height)/2;
		        $image->maintain_ratio=false;
		        $image->new_image="images/product_image/list_image";
		        $image_list=$image->crop();
		        
		        
		        $image_list->width=236;
		        $image_list->height=292;
		        $image_list->resize();
		        
		        $image->save($product);
        	}
        	catch (Exception $e){
        		$this->load->vars(array('excep'=>$e));
        	}
        }
        
        if($this->input->post("man")){
            $image->set_join_field($product, 'type','man');
            
        }else{
            $image->set_join_field($product, 'type','woman');
            
        }
        
        $this->imageManager($product->id);
        //this->load->vars(array('excep'=>$e));
    }
    
    
    
    function setImageDefault($image_id){
        $image=new File($image_id);
        
        
        $image->product->include_join_fields()->get();
        $image->product->file->include_join_fields()->get();
        
        
        foreach($image->product->file as $file){
            if($file->join_type==$image->product->join_type)
            $file->set_join_field($image->product,'default','0');
        }
        
        
        $image->product->set_join_field($image,'default','1');
	$prod=new Product($image->product->id);
        $this->imageManager($image->product->id);
        
    }
    
    function deleteImage($image_id){
        $image=new File($image_id);
        $image->product->include_join_fields()->get();
        
        $product_id= $image->product->id;
        
	unlink($image->filepath);
	unlink("images/product_image/list_image/".$image->filename);
	unlink("images/product_image/thumb_image/".$image->filename);
	unlink("images/product_image/full_image/".$image->filename);
	unlink("images/product_image/short_image/".$image->filename);
        
        $image->delete($image->product);
       
	//unlink("images/product_image/feature_image/".$image->filename);
	unlink("images/product_image/short_image/".$image->filename);
        $this->imageManager($product_id);
    }
    
    
    function stockManager($product_id){
        $product=new Product($product_id);
        $product->size->include_join_fields($product)->get();
        
        $size=new Size();
        $size->get();
        
        foreach($size as $s){
            $s->product->where('id',$product_id);
            $s->product->include_join_fields()->get();
            
        }
        $this->load->vars(array("product"=>$product,'sizes'=>$size));
        $this->load->view("admin/product_stock");
        
    }
    
    
    function saveStock(){
        $product_id=$this->input->post('product');
        $catagory=$this->input->post('catagory');
        $product=new Product($product_id);
        
        $stock=$this->input->post('stock');
        
        foreach($stock as $key=>$value){
            
            $size=new Size($key);
            if($size->catagory==$catagory){
                if($size->save($product)){
                    $size->set_join_field($product,'stock',(int)$value);
                    $size->set_join_field($product,'catagory',$catagory);
                }else{
                    $this->load->vars(array('errors'=>$size->error->all));
                }

            }
        }
        
        redirect("admin/product_manager/imageManager/$product_id","refresh");
        
    }
    
    
    function deleteProduct($product_id){
    	$product=new Product($product_id);
    	//$product->is_active='0';
    	if($product->delete()){
    		redirect('admin/product_manager','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
    
    function rewardPointsManager($product_id){
    	 $product=new Product($product_id);
    	  $this->load->vars(array("product"=>$product));
          $this->load->view("admin/reward_points");
    }

    function saveRewardPoints(){
    	$product_id=$this->input->post('product');
    	$product=new Product($product_id);
    	$product->points_to_buy=$this->input->post('points_to_buy');
    	$product->points_you_get=$this->input->post('points_you_get');
    	if ($product->save()){
    		redirect('admin/product_manager','refresh');
    	}else{
    		$this->load->vars(array('errors'=>$product->error->all));
    	}
    }
    
    function savePrice(){
	$product_id=$this->input->post('product');
	$this->load->helper(array('form', 'url'));

	$this->load->library('form_validation');

	$this->form_validation->set_rules('price', 'Current Price', 'required|numeric|greater_than[0]');

	if ($this->form_validation->run() == FALSE)
	{
		//echo form_error('price'); die;
		$this->stockManager($product_id);
	}
	else
	{
	    $product=new Product($product_id);
	    $product->price=$this->input->post('price');
	    $product->original_value=$this->input->post('original_price');
	    if ($product->save()){
		    redirect('admin/product_manager/stockManager/'.$product_id,'refresh');
	    }else{
		    $this->load->vars(array('errors'=>$product->error->all));
	    }
	}
    }
}  