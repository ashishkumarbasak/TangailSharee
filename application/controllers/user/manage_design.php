<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_design extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
    	if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isDesigner()){
                redirect('login?flag=false','refresh');
            }
	    else {
		//redirect('user/member_profile/'.$u->id,'refresh');
	    }
        }  else {
            redirect('login?flag=false','refresh');
        }
    }
    
    public function index()
	{
    	$currency=new Currency();
		$currency->get();
		$user_id=$this->session->userdata('user_id');
    	
		$user=new User($user_id);
		$user->image->get();
		
		$user->address->get();
		
		
		//echo $user->address->city;exit;
    	$this->load->vars(array('user'=>$user,'currencies'=>$currency));
        $this->load->view('user/member_profile');
    }
    
    function addDesign() 
	{
    	$designer_id=$this->session->userdata('user_id');
    	
    	$designer=new User($designer_id);
    	$designer->image->get();
		$designer->address->get();
	
		$desig=new User();
		$desig->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($desig as $d)
		{
	    	$designers[$i]=$d->id;
	    	$i++;
		}
		if(isset($designers) && !empty($designers))
		{
	    	$this->load->vars(array('designers'=>$designers));
		}
		$this->load->vars(array('designer'=>$designer));
		$this->load->view('user/add_design');
    }
    
    function saveDesign()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
	    	$this->addDesign();
		}
		else
		{
	    	$p=new Project();	
	    	$p->title=$this->input->post('title');
	    	$p->description=$this->input->post('description');
	    	$p->date_added=time();
	    	$p->status='In progress';
	    	$p->user_id=$this->session->userdata('user_id');
	    	$p->is_active='1';
	    	if($p->save())
	    	{	
				if($_FILES["design"])
				{
		    		try 
					{
			    		$p->file=new File();
			    		$p->file->file="design";
			    		$p->file->upload_path="images/project_image/original_image";
			    		$p->file->upload();
				    
			    		$ratio=(($p->file->original_width/145)<($p->file->original_height/168))?($p->file->original_width/145):($p->file->original_height/168);
			    		$p->file->width=intval(145*$ratio);
			    		$p->file->height=intval(168*$ratio);
			    		$p->file->x_axis=($p->file->original_width-$p->file->width)/2;
			    		$p->file->y_axis=($p->file->original_height-$p->file->height)/2;
			    		$p->file->maintain_ratio=false;
			    		$p->file->new_image="images/project_image/thumb_image";
			    		$image_thumb=$p->file->crop();
			    
			    		$image_thumb->width=145;
			    		$image_thumb->height=168;
			    		$image_thumb->resize();
			    
			   		 	$ratio=(($p->file->original_width/101)<($p->file->original_height/118))?($p->file->original_width/101):($p->file->original_height/118);
			    		$p->file->width=intval(101*$ratio);
			    		$p->file->height=intval(118*$ratio);
			    		$p->file->x_axis=($p->file->original_width-$p->file->width)/2;
			    		$p->file->y_axis=($p->file->original_height-$p->file->height)/2;
			    		$p->file->maintain_ratio=false;
			    		$p->file->new_image="images/project_image/front_image";
			    		$image_front=$p->file->crop();
			    
			    		$image_front->width=101;
			   			$image_front->height=118;
			    		$image_front->resize();
			    
			    		$ratio=(($p->file->original_width/236)<($p->file->original_height/292))?($p->file->original_width/236):($p->file->original_height/292);
			    		$p->file->width=intval(236*$ratio);
			    		$p->file->height=intval(292*$ratio);
			    		$p->file->x_axis=($p->file->original_width-$p->file->width)/2;
			    		$p->file->y_axis=($p->file->original_height-$p->file->height)/2;
			    		$p->file->maintain_ratio=false;
			    		$p->file->new_image="images/project_image/list_image";
			    		$image_list=$p->file->crop();
			    
			    
			    		$image_list->width=236;
			    		$image_list->height=292;
			    		$image_list->resize();
			    		$p->file->save($p);
		    		}
		   			catch(Exception $e)
					{
			    		//echo $e->getMessage();exit;
		    			//this->editUser($u->id);
		    		}
				}
				redirect('user/manage_design/editDesign/'.$p->id,'refresh');
	    	}
	    	else 
	    	{
				$this->load->vars(array('errors'=>$p->error->all));
				$this->addDesign();
	    	}
		}
    }
    
    function editDesign($project_id){
	$designer_id=$this->session->userdata('user_id');
    	
    	$designer=new User($designer_id);
    	$designer->image->get();
	$designer->address->get();
	
	$desig=new User();
	$desig->where('role_id','3')->get();
	$i=0; $designers=array();
	foreach($desig as $d){
	    $designers[$i]=$d->id;
	    $i++;
	}
	if(isset($designers) && !empty($designers)){
	    $this->load->vars(array('designers'=>$designers));
	}
	
	
	$project=new Project($project_id);
	$project->file->include_join_fields($project)->get();
	/*$i=0;$img = array(); $img_id=array();
	foreach ($project->file as $p ){
		$img[$i] =  $p->filename;
		$img_id[$i]=$p->id;
		$i++;
	}
	*/
	//print_r($img_id); exit;
	$sdate = date("j/n/Y",$project->date_added); 
	if($project->date_accept){
	    $edate = date("j/n/Y",$project->date_accept); 
	    $project->date_accept=$edate;
	}
	$project->date_added=$sdate;
	
    	$project->comment->include_join_fields($project)->get();
    	$project->comment->order_by('date','asc')->get();
    	$i=0;
    	if(isset($project->comment->id)){
	    	foreach($project->comment as $c){
	    		$c->user->get();
	    		$u=array();
	    		$u=new User($c->user->id);
	    		$uname[$i]=$u->first_name.' '.$u->last_name;
	    		$u->image->get();
	    		$user_img[$i]=$u->image->filename;
	    		$i++;
    		}
    		$this->load->vars(array('user_img'=>$user_img,'uname'=>$uname));
    	}
    	$loged_user=new User($this->session->userdata('user_id'));
    	$loged_user->image->get();
    	
    	if(!$loged_user){
    		return false;
    	}
    	
	
	
	$this->load->vars(array('designer'=>$designer,'loged_user'=>$loged_user));
    	$this->load->vars(array('project'=>$project));
    	$this->load->view('user/edit_design');
    }
    
    function saveEditedDesign(){
    	$p=new Project($this->input->post('design_id'));
	$p->is_active='1';
	    if($p->save())
	    {	
		    
		    
		if($_FILES["design1"]){
		try {
			$p->file=new File();
			$p->file->file="design1";
			$p->file->upload_path="images/project_image/original_image";
			$p->file->upload();
				
			$ratio=(($p->file->original_width/145)<($p->file->original_height/168))?($p->file->original_width/145):($p->file->original_height/168);
			$p->file->width=intval(145*$ratio);
			$p->file->height=intval(168*$ratio);
			$p->file->x_axis=($p->file->original_width-$p->file->width)/2;
			$p->file->y_axis=($p->file->original_height-$p->file->height)/2;
			$p->file->maintain_ratio=false;
			$p->file->new_image="images/project_image/thumb_image";
			$image_thumb=$p->file->crop();
			
			$image_thumb->width=145;
			$image_thumb->height=168;
			$image_thumb->resize();
			
			$ratio=(($p->file->original_width/101)<($p->file->original_height/118))?($p->file->original_width/101):($p->file->original_height/118);
			$p->file->width=intval(101*$ratio);
			$p->file->height=intval(118*$ratio);
			$p->file->x_axis=($p->file->original_width-$p->file->width)/2;
			$p->file->y_axis=($p->file->original_height-$p->file->height)/2;
			$p->file->maintain_ratio=false;
			$p->file->new_image="images/project_image/front_image";
			$image_front=$p->file->crop();
			
			$image_front->width=101;
			$image_front->height=118;
			$image_front->resize();
			
			$ratio=(($p->file->original_width/236)<($p->file->original_height/292))?($p->file->original_width/236):($p->file->original_height/292);
			$p->file->width=intval(236*$ratio);
			$p->file->height=intval(292*$ratio);
			$p->file->x_axis=($p->file->original_width-$p->file->width)/2;
			$p->file->y_axis=($p->file->original_height-$p->file->height)/2;
			$p->file->maintain_ratio=false;
			$p->file->new_image="images/project_image/list_image";
			$image_list=$p->file->crop();
			
			
			$image_list->width=236;
			$image_list->height=292;
			$image_list->resize();
			
			/*$p->file->include_join_fields()->get();
			$pcount=count($p->file->id);
			if ($pcount<=3){
			    $file=new File($this->input->post("file_$i"));
			    unlink($file->filepath);
			    unlink("images/project_image/list_image/".$file->filename);
			    unlink("images/project_image/thumb_image/".$file->filename);
			    
			    $file->delete($p);
			    $file->delete();
					
			} */
			$p->file->save($p);
		}
			catch(Exception $e){
				echo $e->getMessage();
			//this->editUser($u->id);
			}
		}	
		redirect('user/manage_design/editDesign/'.$p->id,'refresh');
	    }
    else 
    {
	
	$this->load->vars(array('errors'=>$p->error->all));
	$this->editDesign($p->id);
    }
	    
}

    function saveComment($project_id){
		if ($this->session->userdata('login',TRUE)){
	    	$comment=$this->input->post('comment');
	    	$c=new Comment();
	    	$c->content=$comment;
	    	$c->user_id=$this->session->userdata('user_id');
	    	$format = 'DATE_RFC822';
			$time = time();
			$c->date=$time;
			
			$d=new Project($project_id);
			
			if($c->save()){
				
				$c->save($d);
				redirect('user/manage_design/editDesign/'.$project_id,'refresh');
			}
			else {
				$this->load->vars(array('errors'=>$c->error->all));
			}
		}
		else {
			$this->load->view('user/login_register');
		}
		//$this->load->vars(array('comments'=>$c));
    }
    
	
	function viewDesigns()
    {
		$designer_id=$this->session->userdata('user_id');
    	
    	$designer=new User($designer_id);
    	$designer->image->get();
		$designer->address->get();
	
		$desig=new User();
		$desig->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($desig as $d)
		{
	    	$designers[$i]=$d->id;
	    	$i++;
		}
		if(isset($designers) && !empty($designers))
		{
	    	$this->load->vars(array('designers'=>$designers));
		}
	
	
		$project=new Project();
		$project->where('is_active','1');
    	$project->where('user_id',$designer_id);
    	$project->get();
	
		$count = $project->result_count();
		$page=$this->input->get("page");
        $size=2;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."user/manage_design/viewDesigns?";
		$project->where('is_active','1');
    	$project->where('user_id',$designer_id)->order_by('date_added','DESC')->get_paged($pagination['page'],$pagination['size']);
		//$i=0; $pimg=array(); //$pimg_id=array();
		foreach($project as $p)
		{
	    	$p->file->func('RAND', '1');
	    	$p->file->get();
	    	//$pimg[$i]=$p->file->filename;
	    	//$pimg_id[$i]=$project->file->id;
	    	//$i++;
		}
		//echo "<pre>"; print_r($pimg); die;
		//if(isset($pimg) && !empty($pimg)){
	    ///$this->load->vars(array('pimg'=>$pimg));
		//}
		$this->load->vars(array('designer'=>$designer,'projects'=>$project,'pagination'=>$pagination));
    	//$this->load->vars(array('user'=>$user));
		$is_ajax_pagination=$this->input->get('a_pagination');
		if($is_ajax_pagination=="1")
			$this->load->view('user/list_of_my_designs');
		else
        	$this->load->view('user/my_designs');
		
    }
    
    function deleteDesign($design_id)
	{
		$project=new Project($design_id);
    	//$project->is_active='0';
    	if($project->delete())
		{
    		redirect('user/manage_design/viewDesigns','refresh');
    	}
		else
		{
    		echo "unable to delete";
			redirect('user/manage_design/viewDesigns','refresh');
    	}
    }
    
    function viewProducts()
    {
		$designer_id=$this->session->userdata('user_id');
    	
    	$designer=new User($designer_id);
    	$designer->image->get();
		$designer->address->get();
	
		$desig=new User();
		$desig->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($desig as $d)
		{
	    	$designers[$i]=$d->id;
	    	$i++;
		}
		if(isset($designers) && !empty($designers))
		{
	    	$this->load->vars(array('designers'=>$designers));
		}
	
	
		$product=new Product();
		$product->where('is_active','1');
    	$product->where('user_id',$designer_id);
    	$product->get();
	
	
		$count = $product->result_count();
		$page=$this->input->get("page");
        $size=4;
        $pagination=getPaginationData((int)$count, (int)$page, (int)$size);
        $pagination['url']=base_url()."user/manage_design/viewProducts?";
		$product->where('is_active','1');
    	$product->where('user_id',$designer_id)->get_paged($pagination['page'],$pagination['size']);
	
		//$i=0; $pimg=array(); //$pimg_id=array();
		foreach($product as $p)
		{
	    	$p->file->where_join_field($p,'type','featured');
    	    $p->file->include_join_fields()->get();
	    
	   	 	$p->size->include_join_fields()->get();
	    	$pstock=0;
	    	if(isset($p->id) && isset($p->size))
	    	{ 
	    		foreach($p->size as $psize)
	    		{
		    		$pstock += $psize->join_stock;
				}
	    	}
	    	$stock[$p->id]=$pstock;
	   	}
	   	
	   	//print_r($stock);
	   	
		if($count > 0)
		{
	    	$this->load->vars(array('stock'=>$stock));
		}
		$sys = new System(1);
		$revenue = $sys->revenue;
		//echo "<pre>"; print_r($pimg); die;
		//if(isset($pimg) && !empty($pimg)){
	    ///$this->load->vars(array('pimg'=>$pimg));
		//}
		$this->load->vars(array('designer'=>$designer,'revenue'=>$revenue,'products'=>$product,'pagination'=>$pagination));
    	//$this->load->vars(array('user'=>$user));
		$is_ajax_pagination=$this->input->get('a_pagination');
		if($is_ajax_pagination=="1")
			$this->load->view('user/list_of_member_products');
		else
        	$this->load->view('user/member_products');
    }
	
	
	
	function refundReport()
	{
		$designer_id=$this->session->userdata('user_id');
    	
    	$designer=new User($designer_id);
    	$designer->image->get();
		$designer->address->get();
	
		$desig=new User();
		$desig->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($desig as $d)
		{
	    	$designers[$i]=$d->id;
	    	$i++;
		}
		if(isset($designers) && !empty($designers))
		{
	    	$this->load->vars(array('designers'=>$designers));
		}
		
		$this->load->vars(array('designer'=>$designer));
		$this->load->view('user/member_product_refunds');
	}
	
    
    function viewEarnings() 
	{
		$designer_id=$this->session->userdata('user_id');
    	
    	$designer=new User($designer_id);
    	$designer->image->get();
		$designer->address->get();
	
		$desig=new User();
		$desig->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($desig as $d)
		{
	    	$designers[$i]=$d->id;
	    	$i++;
		}
		if(isset($designers) && !empty($designers))
		{
	    	$this->load->vars(array('designers'=>$designers));
		}
	
	
		$time = time();
		$datestring = "Y-m-d";
		$month = date('m', $time);
        $j=6;
        $cdate = $time; $weekdays = array();
        $result = array();
        for($i=0; $i<7;$i++)
        {        
	    	$curdate = date($datestring, $cdate);
	    	$curmonth = date('m', $cdate);
	    	//$cdate =  $cdate-(24*60*60);
	    	$prevdate = date($datestring, $cdate);
	    	$worder = new Order();
	    	$worder->where('order_date',$curdate);
	    	$worder->where ('status <>','Payment Pending');
	    	$worder->where ('status <>','Payment failed');
			//$worder->where('request_refund !=',"Payment Refunded");
			$worder->where_related('product','user_id',$designer_id)->get();
	    	$count = $worder->result_count();
	    	$total_products = 0; $total_revenue = 0;
	    	foreach($worder as $ord){
		    	$ord->product->include_join_fields()->get();
		    	$qty = 0; $revenue = 0;
		    		foreach($ord->product as $prod){
			    		if($prod->join_request_refund!="Payment Refunded" && $prod->user_id==$designer_id)
						{
							$qty += $prod->join_quantity;
			    			$revenue +=$prod->join_revenue;
						}
		    	}
		    	$ord->quantity = $qty;
		    	$total_products += $qty;
		    	$ord->revenue = $revenue;
		    	$total_revenue += $revenue;
	    }
	    	$result[$i]['date'] = $curdate;
            $result[$i]['total_revenue'] = $total_revenue;
            $result[$i]['total_sales'] = $total_products;

	   /* $order = new Order();
	    $order->where ('status <>','Payment Pending');
	    $order->where ('status <>','Payment failed');
	    $order->where('order_date', $curdate);
	    $order->where_related('product','user_id',$designer_id);
	    $order->select_func('SUM', '@total_amount', 'OrderTotal')->get();

	    
	    if($order->OrderTotal!='')
		    $result[$i]['total_sale'] = $order->OrderTotal;
	    else
		    $result[$i]['total_sale'] = 0;
	   */
		    
	    $cdate =  $cdate-(24*60*60);
	    $j--;
	    if($month != $curmonth){
		break;
	    }
	    
        }
	
	$lastmonth = strtotime("-1 month");
	$lmonth = date('m',$lastmonth);
	$lyear  = date('Y',$lastmonth);
	$ldate = date('F Y',$lastmonth);
	
	$lorder = new Order();
	$lorder->where_func('month','@order_date',$lmonth);
	$lorder->where_func('year','@order_date',$lyear);
	$lorder->where ('status <>','Payment Pending');
	$lorder->where ('status <>','Payment failed');
	//$lorder->where('request_refund <>',"Payment Refunded");
	$lorder->where_related('product','user_id',$designer_id)->get();
	$count = $lorder->result_count();
	if($count > 0){
	    $total_revenue = 0;
	    foreach($worder as $ord){
		    $ord->product->include_join_fields()->get();
		    $revenue = 0;
		    foreach($ord->product as $prod){
			    if($prod->join_request_refund!="Payment Refunded" && $prod->user_id==$designer_id)
				{
					$revenue +=$prod->join_revenue;
				}
		    }
		    $ord->revenue = $revenue;
		    $total_revenue += $revenue;
	    }
	    $payment = new Designer_payment();
	    $payment->where('user_id',$designer_id);
	    $payment->where('month',$lmonth);
	    $payment->where('year',$lyear);
	    $payment->get();
	    $pcount = $payment->result_count();
		
	    if($pcount > 0){
		$payment_status = $payment->payment_status;
	    }
	    else{
		$payment_status = "Payment pending";
	    }
	    $this->load->vars(array('payment_status'=>$payment_status));
	}
	$this->load->vars(array('designer'=>$designer,'results'=>$result,'last_revenue'=>$total_revenue,'last_date'=>$ldate));
    	//$this->load->vars(array('user'=>$user));
	$this->load->view('user/member_earnings');
	
    }
    
    function incomeReport()
	{
		$designer_id=$this->session->userdata('user_id');
    	
    	$designer=new User($designer_id);
    	$designer->image->get();
		$designer->address->get();
	
		$desig=new User();
		$desig->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($desig as $d)
		{
	    	$designers[$i]=$d->id;
	    	$i++;
		}
		if(isset($designers) && !empty($designers))
		{
	    	$this->load->vars(array('designers'=>$designers));
		}
	
	
		$time = time();
		$datestring = "m";
		$month = date($datestring, $time);
		$year = date('Y', $time);
		$cdate = $time;
		$result = array();
	
	
		//$qty = array();
		$j = 2;
        for($i=0; $i<3;$i++)
        {
	    	$datestr = "F Y";
	    	$curdate = date($datestr, $cdate);
	    	//echo $curmonth; die;
	    	$worder = new Order();
	    	$worder->where_func('month','@order_date',$month);
	    	$worder->where_func('year','@order_date',$year);
	    	$worder->where ('status <>','Payment Pending');
	    	$worder->where ('status <>','Payment failed');
	    	$worder->where_related('product','user_id',$designer_id);
	    	$worder->distinct('id')->get();
	    	$count = $worder->result_count();
	    
	    	if($count > 0){
			$products= array(); $l=0;
			foreach($worder as $ord)
			{
                        //if($ord->user_id==$designer_id)
                        {
                            $ord->product->include_join_fields()->get();
			
                            foreach($ord->product as $prod){
								if($prod->user_id==$designer_id)
								{
                                	$products[$l] = array($prod->id,$prod->join_quantity,$prod->name);
                                	$l++;
								}
                            }
                        }
			}
			$id=array('-1');
            foreach($products as $p)
			{
				$id[]= $p[0];
			}
			$ids = array_unique($id);
			$arr = array(); $k = 0;
			foreach($ids as $pid)
			{
		    	$qty = 0; //$title = 0;
		    	foreach($products as $pro){
					if($pro[0]==$pid)
					{
			    		$qty += $pro[1];
			    		$title = $pro[2];
					}
		    }
		    if($qty > 0){
			$arr[$k]['qty'] = $qty;
			$arr[$k]['name'] = $title;
			$k++;
		    }
		}
		 $total_sales = 0;
		foreach($arr as $res)
		{
		    $total_sales += $res['qty'];
		}
		
		$payment = new Designer_payment();
		$payment->where('user_id',$designer_id);
		$payment->where('month',$month);
		$payment->where('year',$year);
		$payment->get();
		$pcount = $payment->result_count();
		
		if($pcount > 0){
		    $result[$i]['payment'] = $payment->payment_status;
		}
		else{
		    $result[$i]['payment'] = "Payment pending";
		}
		//$curmonth = date('F Y',$curdate);
		//echo "<pre>"; print_r($arr); die;
		$result[$i]['date'] = $curdate;
		$result[$i]['total_sales'] = $total_sales;
		$result[$i]['product'] = $arr;
	    }
	    else {
		$result[$i]['date'] = $curdate;
		$result[$i]['total_sales'] = 0;
		$result[$i]['product'] = array();
		$result[$i]['payment'] = "No Record";
	    }
	    $month--;
	    if($month == 0){
		$month = 12;
		$year--;
	    }
	    $j--;
	    $day = date('d',$cdate);
	    $cdate = $cdate - (24*60*60*$day);
	}
	//echo "<pre>"; print_r($result); die;
	
	$this->load->vars(array('designer'=>$designer,'result'=>$result));
    	//$this->load->vars(array('user'=>$user));
	$this->load->view('user/income_report');
    }
    
    function paymentSetting()
	{
		$designer_id=$this->session->userdata('user_id');
    	
    	$designer=new User($designer_id);
    	$designer->image->get();
		$designer->address->get();
	
		$desig=new User();
		$desig->where('role_id','3')->get();
		$i=0; $designers=array();
		foreach($desig as $d)
		{
	    	$designers[$i]=$d->id;
	    	$i++;
		}
		if(isset($designers) && !empty($designers))
		{
	    	$this->load->vars(array('designers'=>$designers));
		}
	
	
		$this->load->vars(array('designer'=>$designer));
    	//$this->load->vars(array('user'=>$user));
		$this->load->view('user/payment_setting');
    }
    
    function savePaymentMethod()
	{
		$designer=new User($this->input->post('designer'));
		$designer->pmt_method = $this->input->post('payment');
		$designer->paypal_address = $this->input->post('paddress');
		$designer->swift_code = $this->input->post('swift_code');
		$designer->bank_account_no = $this->input->post('account_no');
		if($designer->save())
		{
	    	$this->viewEarnings();
		}
		else
		{
	    	$this->load->vars(array('errors'=>$designer->error->all));
	    	$this->paymentSetting();
		}
    }
}