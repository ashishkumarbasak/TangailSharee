<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_designer extends MY_Controller {
    
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
    
    function index()
	{
    	$designer=new User();
	
	
		if($this->input->get())
		{
	    	$test = $this->input->get();
	    	if(isset($test['fullname']) && !empty($test['fullname'] ))
			$query_array['fullname'] = $test['fullname'];
		
	    	if(isset($test['email']) && !empty($test['email'] ))
			$query_array['email'] = $test['email'];
		
	    	if(isset($test['status']) && !empty($test['status']))
			$query_array['status'] = $test['status'];
			
			if(isset($test['pmt_method']) && !empty($test['pmt_method']))
			$query_array['pmt_method'] = $test['pmt_method'];
		//echo "<pre>";print_r($query_array);die;
	    
	     	if(isset($query_array))
			{
				$query = http_build_query($query_array);
				if(isset($query_array['fullname']))
					$designer->like('first_name',$query_array['fullname']);
			
				if(isset($query_array['email']))
					$designer->like('email',$query_array['email']);
		
				if(isset($query_array['status']))
					$designer->like('status',$query_array['status']);
				
				if(isset($query_array['pmt_method']))
					$designer->like('pmt_method',$query_array['pmt_method']);
	     	}
	    
		}
		$designer->get();
		$count = $designer->result_count();
	
		$page=$this->input->get("page");
		$size=10;
		$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
		if(isset($query))
		{
	    	$pagination['url']=base_url()."admin/manage_designer/index?".$query."&";
		}
		else
		{
	    	$pagination['url']=base_url()."admin/manage_designer/index?";
		}
	

		$designer->where(array('is_active'=>'1','role_id'=>'3'));
    	if(isset($query_array))
		{
	    	if(isset($query_array['fullname']))
		    	$designer->like('first_name',$query_array['fullname']);
			
	    	if(isset($query_array['email']))
		    	$designer->like('email',$query_array['email']);
	    
	    	if(isset($query_array['status']))
		    	$designer->like('status',$query_array['status']);
			
			if(isset($query_array['pmt_method']))
		    	$designer->like('pmt_method',$query_array['pmt_method']);
	    
		}
	
        $designer->get_paged($pagination['page'],$pagination['size']);
        
    	$this->load->vars(array('designers'=>$designer));
    	$this->load->vars(array('pagination'=>$pagination));
    	$this->load->view('admin/manage_designer');
    }
    
    function filter_index()
    {
	    if($this->input->post())
	    {
		    $filter = $this->input->post();
		    $query = http_build_query($filter);
		    redirect("admin/manage_designer/index?$query&");
	    }
    }
    
    function editDesigner($designer_id) {
    	$d=new User($designer_id);
    	$designer=new User();
    	
    	$count=$designer->where(array('is_active'=>'1','role_id'=>'3'))->count();
    	
        $nav_page=$this->input->get("page");
        $size=10;
        $pagination=getPaginationData((int)$count, (int)$nav_page, (int)$size);
        $pagination['url']=base_url()."admin/manage_designer";
        
        $designer->where(array('is_active'=>'1','role_id'=>'3'))->get_paged($pagination['page'],$pagination['size']);
        
    	$this->load->vars(array('designers'=>$designer,'designer'=>$d));
    	$this->load->vars(array('pagination'=>$pagination));
    	$this->load->view('admin/edit_designer');
    }
    
    function saveEditedDesigner() {
    	$des=new User($this->input->post('designer_id'));
    	$des->status=$this->input->post('status');
	$sys = new System(1);
	$revenue = $sys->revenue;
	if($this->input->post('status')){
	    $des->revenue = $revenue;
	}
	else
	{
	    $des->revenue = 0;
	}
    	if ($des->save()) {
    		redirect('admin/manage_designer','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$des->error->all));
    		$this->index();
    		
    	}
    }
    
    function paymentSetting($designer_id){
	$time = time();
	$datestring = "m";
	$month = date($datestring, $time);
	$year = date('Y', $time);
	$cdate = $time;
	$result = array();
	
	$designer = new User($designer_id);
	//$qty = array();
	$j = 2;
        for($i=0; $i<12;$i++)
        {
	    $datestr = "F Y";
	    $curdate = date($datestr, $cdate);
	    //echo $curmonth; die;
	    $lorder = new Order();
	    $lorder->where_func('month','@order_date',$month);
	    $lorder->where ('status <>','Payment Pending');
	    $lorder->where ('status <>','Payment failed');
	    $lorder->where_related('product','user_id',$designer_id)->get();
	    $count = $lorder->result_count();
	    
	    //echo $count; die;
	
	    if($count > 0){
		$total_revenue = 0; $total_sales = 0;
		foreach($lorder as $ord){
			$ord->product->include_join_fields()->get();
			$revenue = 0; $qty = 0;
			foreach($ord->product as $prod){
				$revenue +=$prod->join_revenue;
				$qty +=$prod->join_quantity;
			}
			$ord->revenue = $revenue;
			$total_revenue += $revenue;
			$ord->quantity = $qty;
			$total_sales += $qty;
		}
		$result[$i]['date'] = $curdate;
		$result[$i]['month'] = $month;
		$result[$i]['year'] = $year;
		$result[$i]['total_revenue'] = $total_revenue;
		$result[$i]['total_sales'] = $total_sales;
		
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
		
	    }
	    else {
		$result[$i]['date'] = $curdate;
		$result[$i]['month'] = $month;
		$result[$i]['year'] = $year;
		$result[$i]['total_revenue'] = 0;
		$result[$i]['total_sales'] = 0;
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
	//echo "<pre>"; print_r($result); die;
	
	$this->load->vars(array('results'=>$result,'designer'=>$designer));
    	//$this->load->vars(array('user'=>$user));
	$this->load->view('admin/designer_payment');
    }
    
    function savePayment(){
	$time = time();
	$designer_id = $this->input->post('designer_id');
	$month = $this->input->post('month');
	$year = $this->input->post('year');
	
	$pay = new Designer_payment();
	$pay->where('user_id',$designer_id);
	$pay->where('month',$month);
	$pay->where('year',$year);
	$pay->get();
	$pcount = $pay->result_count();
	
	if($pcount > 0){
	    $payment = new Designer_payment($pay->id);
	}
	else{
	    $payment = new Designer_payment();
	}
	
	
	$payment->user_id = $designer_id;
	$payment->month = $month;
	$payment->year = $year;
	$payment->payment_status = $this->input->post('status');
	$payment->date = $time;
	
	//echo var_dump($payment->save()); die;
	if($payment->save()){
	    //echo "<pre>"; print_r($payment->id); die;
	    $this->paymentSetting($designer_id);
	}
    }
}