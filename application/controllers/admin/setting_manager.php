<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_manager extends MY_Controller {
    
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
    	$system=new System(1);
    	$this->load->vars(array('system'=>$system));
    	$this->load->view('admin/system_config');
    }
    function terms(){
       	$page=new Terms(1);
		
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
    	
    	$this->load->vars(array('page'=>$page));
    	$this->load->vars($this->data);
    	$this->load->view('admin/terms');
    }
    function saveTerms(){
    	$page=new Terms($this->input->post('id'));
    	
    	$page->terms=$this->input->post('terms');
    	 
    	if($page->save()){
    		//echo "you have successfully inserted a Video";
    		//echo $v->id;
    		redirect('admin/setting_manager/terms','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$page->error->all));
    		$this->terms();
    		
    	}
    }
    
    function saveSetting(){
    	$s= new System($this->input->post('system_id'));
    	
    	$s->website_name=$this->input->post('website_name');
    	$s->site_email=$this->input->post('site_email');
    	
		$s->meta_desc=$this->input->post('meta_desc');
		$s->keywords=$this->input->post('keywords');
		$s->address=$this->input->post('address');
		$s->contact_no=$this->input->post('contact_no');
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
    
    function banner_setting(){
    	$banner= new Banner();
    	$banner->get();
	$i = 0;
	foreach($banner as $b){
	    $url[$i] =  $b->url;
	    $i++;
	}
	if(isset($url) && !empty($url)){
	    $this->load->vars(array('url'=>$url));
	}
    	
    	$this->load->view('admin/banners');
    }
    
    function saveBanner(){	
			if(isset($_FILES["banner_1"])){
						try {
								$image=new File();
			       					$image->file="banner_1";
			        				$image->upload_path="images/banner_images";
			       					$image->upload();
			       					
			       					$ratio=(($image->original_width/260)<($image->original_height/25))?($image->original_width/260):($image->original_height/25);
							        $image->width=intval(260*$ratio);
							        $image->height=intval(25*$ratio);
							        $image->x_axis=($image->original_width-$image->width)/2;
							        $image->y_axis=($image->original_height-$image->height)/2;
							        $image->maintain_ratio=false;
							        $image->new_image="images/banner_images/thumb_image";
							        
							        $image_thumb=$image->crop();
							        $image_thumb->width=260;
							        $image_thumb->height=25;
							        $image_thumb->resize();
							        
			  					$b=new Banner(1);
			       					if ($this->input->post('rotate')){
			       						$b->rotate='1';
			       					}
			       					else {
			       						$b->rotate='0';
			       					}
								$b->url = $this->input->post('url');
			       					$b->save();
							        $b->save($image);
			        		}
							catch(Exception $e){
				        	 		$this->load->vars(array('excep'=>$e));
				        		}	
			}
			
			if(isset($_FILES["banner_2"])){
								try {
											$image=new File();
					       					$image->file="banner_2";
					        				$image->upload_path="images/banner_images";
					       					$image->upload();
					       					
					       					$ratio=(($image->original_width/260)<($image->original_height/25))?($image->original_width/260):($image->original_height/25);
									        $image->width=intval(260*$ratio);
									        $image->height=intval(25*$ratio);
									        $image->x_axis=($image->original_width-$image->width)/2;
									        $image->y_axis=($image->original_height-$image->height)/2;
									        $image->maintain_ratio=false;
									        $image->new_image="images/banner_images/thumb_image";
									        
									        $image_thumb=$image->crop();
									        $image_thumb->width=260;
									        $image_thumb->height=25;
									        $image_thumb->resize();
									        
					  						$b=new Banner(2);
					       					if ($this->input->post('rotate')){
					       						$b->rotate='1';
					       					}
					       					else {
					       						$b->rotate='0';
					       					}
										$b->url = $this->input->post('url');
					       					$b->save();
									        $b->save($image);
					        		}
									catch(Exception $e){
						        	 		$this->load->vars(array('excep'=>$e));
						              		//this->editUser($u->id);
						        		}	
					}
					
					if(isset($_FILES["banner_3"])){
								try {
											$image=new File();
					       					$image->file="banner_3";
					        				$image->upload_path="images/banner_images";
					       					$image->upload();
					       					
					       					$ratio=(($image->original_width/250)<($image->original_height/168))?($image->original_width/250):($image->original_height/168);
									        $image->width=intval(250*$ratio);
									        $image->height=intval(168*$ratio);
									        $image->x_axis=($image->original_width-$image->width)/2;
									        $image->y_axis=($image->original_height-$image->height)/2;
									        $image->maintain_ratio=false;
									        $image->new_image="images/banner_images/thumb_image";
									        
									        $image_thumb=$image->crop();
									        $image_thumb->width=250;
									        $image_thumb->height=168;
									        $image_thumb->resize();
					       					
					  						$b=new Banner(3);
					       					if ($this->input->post('rotate')){
					       						$b->rotate='1';
					       					}
					       					else {
					       						$b->rotate='0';
					       					}
										$b->url = $this->input->post('url');
					       					$b->save();
									        $b->save($image);
					        		}
									catch(Exception $e){
						        	 		$this->load->vars(array('excep'=>$e));
						              		//this->editUser($u->id);
						        		}	
						
					}
					$this->load->view('admin/banners');
	  }
	  
	  function bannerImages($banner_id){
	  	$banner=new Banner($banner_id);
        
        $image=new File();
        
        $banner->file->include_join_fields($banner)->get();
        
        $this->load->vars(array('banner'=>$banner,'images'=>$image));
        $this->load->view('admin/banner_images');
	  }
	  
	function deleteBannerImage($image_id){
	    $image=new File($image_id);
	    $image->banner->include_join_fields()->get();
	    
	    $banner_id= $image->banner->id;
	    
	    unlink($image->filepath);
		    unlink("images/banner_images/thumb_image/".$image->filename);
		    
	    $image->delete($image->banner);
	    
	    $this->bannerImages($banner_id);
	}
    
	function taxes(){
	    $tax = new Taxes();
	    $count=$tax->count();
	    
	    $nav_page=$this->input->get("page");
	    $size=10;
	    $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
	    $pagination['url']=base_url()."admin/setting_manager/taxes";
	    
	    
	    $tax->get_paged($pagination['page'],$pagination['size']);
		    
	    $this->load->vars(array('taxes'=>$tax));
	    $this->load->vars(array('pagination'=>$pagination));
	    $this->load->view('admin/list_taxes');

	}
	
	function paymentcredit()
	{
		if(!$this->input->post()){
			$payment = new Paymentmethod(1);
			$this->load->vars(array('method'=>$payment));
			$this->load->view('admin/paymentmethod_1');
		}else
		{
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('name', 'Payment method name', 'required');
			if ($this->form_validation->run() == FALSE)
	    	{
			//	echo "test";die;
			$payment = new Paymentmethod(1);
	    		$this->load->vars(array('method'=>$payment));
				$this->load->view('admin/paymentmethod_1');
	    	}else
			{
				$payment = new Paymentmethod(1);
				$payment->name = $this->input->post('name');
				$payment->status = $this->input->post('status');
				$payment->save();
				$this->load->vars(array('method'=>$payment));
				$this->load->view('admin/paymentmethod_1');
			}
		}
		
	}
	function paymentpaypal()
	{
		if(!$this->input->post()){
			$payment = new Paymentmethod(2);
			$this->load->vars(array('method'=>$payment));
			$this->load->view('admin/paymentmethod_2');
		}else
		{
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('name', 'Payment method name', 'required');
			if ($this->form_validation->run() == FALSE)
	    	{
			//	echo "test";die;
			$payment = new Paymentmethod(2);
	    		$this->load->vars(array('method'=>$payment));
				$this->load->view('admin/paymentmethod_2');
	    	}else
			{
				$payment = new Paymentmethod(2);
				$payment->name = $this->input->post('name');
				$payment->status = $this->input->post('status');
				$payment->save();
				$this->load->vars(array('method'=>$payment));
				$this->load->view('admin/paymentmethod_2');
			}
		}
		
	}
	
	function addTaxes(){
	    $this->load->view('admin/add_taxes');
	}
	
	function saveTaxes(){
	    if($this->input->post('tax_id'))
    		$tax=new Taxes($this->input->post('tax_id'));
	    else
    		$tax=new Taxes();
    	
	    $tax->name=$this->input->post('name');
	    $tax->apply_to=$this->input->post('apply_to');
	    $tax->rate=$this->input->post('rate');
	    if($this->input->post('default')){
		$tax->default='1';
		$t=new Taxes();
		$t->where('id !=',$tax->id)->get();
		foreach($t as $ptax){
		    $ptax->default='0';
		    $ptax->save();
		}
	    }
	    else{
		$tax->default='0';
	    }
	   if($tax->save()){
		   //echo "you have successfully inserted a Video";
		   //echo $v->id;
		   redirect('admin/setting_manager/taxes','refresh');
	   }else {
		   $this->load->vars(array('errors'=>$tax->error->all));
		   $this->taxes();
		   
	   }
	}
	
	function editTaxes($tax_id){
	    $tax= new Taxes($tax_id);
	    $this->load->vars(array('tax'=>$tax));
	    $this->load->view('admin/add_taxes');
	 }
    
	function deleteTaxes($tax_id){
	    $tax=new Taxes($tax_id);
    
	    if($tax->delete()){
		    redirect('admin/setting_manager/taxes','refresh');
	    }else{
		    echo "unable to delete";
	    }
    }
    
    function saveTaxSetting(){
	$t=new Taxes($this->input->post('default'));
	$t->default='1';
	$tax=new Taxes();
	$tax->where('id !=',$t->id)->get();
	foreach($tax as $ptax){
	    $ptax->default='0';
	    $ptax->save();
	}
	 if($t->save()){
		   //echo "you have successfully inserted a Video";
		   //echo $v->id;
		   redirect('admin/setting_manager/taxes','refresh');
	   }else {
		   $this->load->vars(array('errors'=>$t->error->all));
		   $this->taxes();
		   
	   }
    }
}
?>