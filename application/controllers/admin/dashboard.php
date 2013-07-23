<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
        // Check if User is super_admin....................
        //var_dump($this->session->userdata('login'));exit;
        
        $this->load->library('jpgraph');
        if($this->session->userdata('login')===true){
            $u=new User($this->session->userdata('user_id'));
            if(!$u->isAdmin()){
		redirect('admin/login?admin=false','refresh');
            }
        }  else {
            redirect('admin/login?login=false','refresh');
        }
        
    }
    
    
    function index(){
    	$datestring = "Y-m-d";
		$time = time();
//		echo "<br>";
// 		SELECT *
// 		FROM tbl_order
// 		WHERE order_date <= '2011-12-22'
// 		AND order_date > DATE_SUB( '2011-12-22' , INTERVAL 1 WEEK )
		
		$now = date($datestring, $time);
//		echo "<br>";
//		echo date('Y-m-d H:m:s');
		$order= new Order();
		//$order->where('order_date','2012-02-14');
		$order->where('order_date',date('Y-m-d'));
		$order->where ('status <>','Payment Pending');
		$order->where ('status <>','Payment failed');
    	$order->order_by('order_date','DESC')->get();
    	foreach($order as $ord)
		{
			$ord->product->include_join_fields()->get();
			$qty = 0;
			foreach($ord->product as $prod)
			{
				$qty += $prod->join_quantity;
    		}
    		$ord->quantity = $qty;
		}
    	$user = new User();
    	$user->where('last_login',$now);
    	$user->get();
    	
    	$nuser = new User();
    	$nuser->where('created', $now);
		$nuser->get();
		
		$tuser = new User();
		$tuser->get();
    	$weekpayment = array();
    	
    	$j=6;
    	$cdate = $time;
		$weekdays = array();
    	for($i=0; $i<7;$i++)
    	{	
    		$curdate = date("Y-m-d");
    		//$cdate =  $cdate-(24*60*60);
    		$prevdate = date($datestring, $cdate);
    		$worder = new Order();
    		$sql = "SELECT SUM(total_amount) AS OrderTotal FROM tbl_order WHERE order_date = '".$curdate."'";
    		$worder->query($sql);
    		$worder->get();
    		//echo $worder->OrderTotal.'<br>';
    		if(!empty($worder->OrderTotal))
    			$weekpayment[$j] = $worder->OrderTotal;
    		else 
    			$weekpayment[$j] = 0;
    		$weekdays[$j] = date('D', $cdate);
    		$cdate =  $cdate-(24*60*60);
    		$j--;
    		
    	}
    	//echo "<pre>";print_r($weekpayment);
    	//echo "<pre>";print_r($weekdays);
    	 
    	//die;
    	$cdate = $time;
    	$monthpayment = array();
		for($i=0;$i<4;$i++)
		{
			$curdate = date($datestring, $cdate);
    		$cdate =  $cdate-604800;
    		$prevdate = date($datestring, $cdate);
    		$worder = new Order();
    		$sql = "SELECT SUM(total_amount) AS OrderTotal FROM tbl_order WHERE order_date <= '".$curdate."' AND order_date > '".$prevdate."'";
    		$worder->query($sql);
    		$worder->get();
    		if(!empty($worder->OrderTotal))
    			$monthpayment[$i] = $worder->OrderTotal;
    		else 
    			$monthpayment[$i] = 0;
    		//$cdate =  $cdate-604800;
    		//echo "current date: ".$curdate.'<br> prev date : '.$prevdate.'<br>';
		}
		$yearpayment = array();$cdate = $time;
		$j=12;$month = array();
		for($i=0;$i<12;$i++)
		{
			$curdate = date($datestring, $cdate);
    		$cdate =  $cdate-2628000;
    		$prevdate = date($datestring, $cdate);
    		$worder = new Order();
    		$sql = "SELECT SUM(total_amount) AS OrderTotal FROM tbl_order WHERE order_date <= '".$curdate."' AND order_date > '".$prevdate."'";
    		$worder->query($sql);
    		$worder->get();
    		if(!empty($worder->OrderTotal))
    			$yearpayment[$i] = $worder->OrderTotal;
    		else 
    			$yearpayment[$i] = 0;
    		//$cdate =  $cdate-604800;
    		$month[$i] = date('M',$cdate);
		}
		
		
		$graph = $this->jpgraph->linechart(array_reverse($weekpayment), 'Sales Report');  // add more parameters to plugin function as required  
		
		//$graph->xaxis->title->Set("Sale");
		$graph->xaxis->title->Set("Week");
		$graph->xaxis->SetTickLabels($weekdays);
		// File locations
		// Could possibly add to config file if necessary
		$graph_temp_directory = 'temp';  // in the webroot (add directory to .htaccess exclude)
		$graph_file_name = 'week.png';
		
		$graph_file_location = $graph_temp_directory . '/' . $graph_file_name;
		
		$graph->Stroke('./'.$graph_file_location);  // create the graph and write to file
		
		$data['week'] = $graph_file_location;
		
		
		$graph = $this->jpgraph->linechart(array_reverse($monthpayment), 'Sales Report');  // add more parameters to plugin function as required
		
		//$graph->xaxis->title->Set("Sale");
		$graph->xaxis->title->Set("Month");
		
		// File locations
		// Could possibly add to config file if necessary
		$graph_temp_directory = 'temp';  // in the webroot (add directory to .htaccess exclude)
		$graph_file_name = 'month.png';
		$graph_file_location = $graph_temp_directory . '/' . $graph_file_name;
		
		$graph->Stroke('./'.$graph_file_location);  // create the graph and write to file
		
		$data['month'] = $graph_file_location;
		
		$graph = $this->jpgraph->linechart(array_reverse($yearpayment), 'Sales Report');  // add more parameters to plugin function as required
		
		//$graph->xaxis->title->Set("Sale");
		$graph->xaxis->title->Set("Year");
		$graph->xaxis->SetTickLabels($month);
		// File locations
		// Could possibly add to config file if necessary
		$graph_temp_directory = 'temp';  // in the webroot (add directory to .htaccess exclude)
		$graph_file_name = 'year.png';
		
		$graph_file_location = $graph_temp_directory . '/' . $graph_file_name;
		
		$graph->Stroke('./'.$graph_file_location);  // create the graph and write to file
		
		$data['year'] = $graph_file_location;
		
		$billadd = NULL;
		$shipadd =NULL;
		foreach ($order->ordaddress as $test)
    	{
    		if($test->type=='billing')
    		$billadd = $test;
    		if($test->type=='shipping')
    		$shipadd = $test;
    	}
		
    	$this->load->vars(array('order'=>$order,'shipadd'=>$shipadd,'user'=>$user,'nuser'=>$nuser,'tuser'=>count($tuser->all),'data'=>$data));
    	$this->load->view('admin/dashboard');
    }
    
    	
}  
	

