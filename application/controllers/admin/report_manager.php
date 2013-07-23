<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_manager extends MY_Controller {
    
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

/**Function for display sales report of last week
 *@author: krishna Sharma
 *@access: Admin
**/
	function index(){
		$time = time();$datestring = "Y-m-d";
		$j=6;
    	$cdate = $time;$weekdays = array();
		$result = array();
    	for($i=0; $i<7;$i++)
    	{	
    		$curdate = date($datestring, $cdate);
    		//$cdate =  $cdate-(24*60*60);
    		$prevdate = date($datestring, $cdate);
    		$worder = new Order();
			$worder->where('order_date',$curdate);
			$worder->where ('status <>','Payment Pending');
			$worder->where ('status <>','Payment failed');
			$worder->get();
			$count = $worder->result_count();
			$total_products = 0;
			foreach($worder as $ord){
				$ord->product->include_join_fields()->get();
				$qty = 0;
				foreach($ord->product as $prod){
					$qty += $prod->join_quantity;
				}
				$ord->quantity = $qty;
				$total_products += $qty;
			}
			
			$order = new Order();
			$order->where ('status <>','Payment Pending');
			$order->where ('status <>','Payment failed');
			$order->where('order_date', $curdate);
			$order->select_func('SUM', '@total_amount', 'OrderTotal');
			$order->select_func('SUM', '@tax', 'TotalTax')->get();
			$result[$i]['date'] = $curdate;
			$result[$i]['total_orders'] = $count;
			$result[$i]['total_products'] = $total_products;
			if($order->TotalTax!='')
				$result[$i]['total_tax'] = $order->TotalTax;
			else
				$result[$i]['total_tax'] = 0;
			
			if($order->OrderTotal!='')
				$result[$i]['total_sale'] = $order->OrderTotal;
			else
				$result[$i]['total_sale'] = 0;
				
			$cdate =  $cdate-(24*60*60);
    		$j--;
    		
		}
		if(isset($result))
			$this->load->vars(array('result'=>$result));
    	$this->load->view('admin/week_orders');
		
	}
	/**Function for display sales report of last Month week wise
	 *@author: krishna Sharma
	 *@access: Admin
	**/

	function month_orders(){
		$time = time();$datestring = "Y-m-d";
		//$time -= 24*60*60*14;
		$j=4;
    	$cdate = $time;$weekdays = array();
		$result = array();
    	for($i=0; $i<4;$i++)
    	{	
    		$end_date = date($datestring, $cdate);
			$cdate -= 24*60*60*7;
			$start_date = date($datestring, $cdate );
    		$worder = new Order();
			$worder->where('order_date >=',$start_date);
			$worder->where('order_date <',$end_date);
			
			$worder->where ('status <>','Payment Pending');
			$worder->where ('status <>','Payment failed');
			$worder->get();
			$count = $worder->result_count();
			//echo $count;die;
			$total_products = 0;
			foreach($worder as $ord){
				$ord->product->include_join_fields()->get();
				$qty = 0;
				foreach($ord->product as $prod){
					$qty += $prod->join_quantity;
				}
				$ord->quantity = $qty;
				$total_products += $qty;
			}
			
			//$worder->select_func('SUM', 'total_amount', 'OrderTotal');
			//echo '<pre>';print_r($count);die;
			$order = new Order();
			$order->where ('status <>','Payment Pending');
			$order->where ('status <>','Payment failed');
			$order->where('order_date >=',$start_date);
			$order->where('order_date <',$end_date);
			$order->select_func('SUM', '@total_amount', 'OrderTotal');
			$order->select_func('SUM', '@tax', 'TotalTax')->get();
			$result[$i]['start_date'] = $start_date;
			$result[$i]['end_date'] = $end_date;
			
			$result[$i]['total_orders'] = $count;
			$result[$i]['total_products'] = $total_products;
			if($order->TotalTax!='')
				$result[$i]['total_tax'] = $order->TotalTax;
			else
				$result[$i]['total_tax'] = 0;
			
			if($order->OrderTotal!='')
				$result[$i]['total_sale'] = $order->OrderTotal;
			else
				$result[$i]['total_sale'] = 0;
				
		//	$cdate =  $cdate-(24*60*60);
    		$j--;
    		
    	}
		//echo "<pre>";print_r($result);die;
		//$this->pagination->initialize($config);
		if(isset($result))
			$this->load->vars(array('result'=>$result));
    	$this->load->view('admin/month_orders');
		
    }
	/**Function for display sales report of last Year
	 *@author: krishna Sharma
	 *@access: Admin
	**/

	function year_orders(){
		$time = time();
		$datestring = "m";
		$month = date($datestring, $time);
		$year = date('Y',$time);
		
		$result = array();
		for($i=0;$i<12;$i++){
			$order = new Order();
			$order->where ('status <>','Payment Pending');
			$order->where ('status <>','Payment failed');
			$order->where_func('year','@order_date',$year);
			$order->where_func('month','@order_date',$month);
			$order->get();
			$count = $order->result_count();
			$total_products = 0;
			foreach($order as $ord){
				$ord->product->include_join_fields()->get();
				$qty = 0;
				foreach($ord->product as $prod){
					$qty += $prod->join_quantity;
				}
				$ord->quantity = $qty;
				$total_products += $qty;
			}
			$order = new Order();
			$order->select_func('year','@order_date', 'year');
			$order->select_func('month','@order_date', 'month');
			$order->select_func('sum','@total_amount', 'amount');
			$order->select_func('sum','@tax', 'total_tax');
			$order->where ('status <>','Payment Pending');
			$order->where ('status <>','Payment failed');
			$order->where_func('year','@order_date',$year);
			$order->where_func('month','@order_date',$month);
			$order->group_by('YEAR(order_date)');
			$order->group_by('MONTH(order_date)');
			$order->get();
			//echo "<pre>";print_r(count($order->all));die;
			$result[$i]['Year'] = $year;
			$result[$i]['Month'] = $month;
			$result[$i]['total_orders'] = $count;
			$result[$i]['total_products'] = $total_products;
			if($order->total_tax!='')
				$result[$i]['total_tax'] = $order->total_tax;
			else
				$result[$i]['total_tax'] = 0;
			
			if($order->amount!='')
				$result[$i]['total_sale'] = $order->amount;
			else
				$result[$i]['total_sale'] = 0;
			
			/////////////////////////////////////////
			$month--;
			if($month==0){
				$month = 12;
				$year--;
			}
					
		}
		if(isset($result))
			$this->load->vars(array('result'=>$result));
    	$this->load->view('admin/year_orders');
		
    }
	/**Function for generate sales report of given period in desired grouping like weekly,monthly etc.
	 *@author:Krishna Sharma
	 *@access:Admin
	 */
	function search_sales()
	{
		if(!$this->input->post()){
			$this->load->view('admin/search_orders');
			
		}else{
			
	    	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
			$this->form_validation->set_rules('start_date', 'start date', 'required');
			$this->form_validation->set_rules('end_date', 'end date', 'required');
			
	    	if ($this->form_validation->run() == FALSE)
	    	{
	    		$this->load->view('admin/search_orders');
	    	}
			else{
				$sdate=explode("/",$this->input->post('start_date'));
				$start_date = $sdate[2].'-'.$sdate[1].'-'.$sdate[0];
				
				$edate=explode("/",$this->input->post('end_date'));
				$end_date = $edate[2].'-'.$edate[1].'-'.$edate[0];
				
				$end_date = strtotime($end_date);
				$start_date = strtotime($start_date);
				if($start_date < $end_date){
					//echo '<pre>'; print_r($start_date);die;
					$post = $this->input->post();
					if($post['group']=='week'){
						$j=0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							for($i=0;$i<6;$i++){
								if($end<$end_date)
									$end += 24*60*60; 
							}
							$s = date('Y-m-d',$start);
							$e = date('y-m-d',$end);
							
							$order = new Order();
							$order->where ('status <>',$post['status']);
							$order->where ('order_date >=',$s);
							$order->where ('order_date <=',$e);
							$order->get();
							$count = $order->result_count();
							$total_products = 0;
							foreach($order as $ord){
								$ord->product->include_join_fields()->get();
								$qty = 0;
								foreach($ord->product as $prod){
									$qty += $prod->join_quantity;
								}
								$ord->quantity = $qty;
								$total_products += $qty;
							}
							$order = new Order();
							$order->select_func('year','@order_date', 'year');
							$order->select_func('month','@order_date', 'month');
							$order->select_func('sum','@total_amount', 'amount');
							$order->select_func('sum','@tax', 'total_tax');
							$order->where ('status <>',$post['status']);
							$order->where ('order_date >=',$s);
							$order->where ('order_date <=',$e);
							$order->group_by('YEAR(order_date)');
							$order->group_by('MONTH(order_date)');
							$order->get();
							
							$result[$j]['start_date'] = $s;
							$result[$j]['end_date'] = $e;
							$result[$j]['total_orders'] = $count;
							$result[$j]['total_products'] = $total_products;
							if($order->total_tax!='')
								$result[$j]['total_tax'] = $order->total_tax;
							else
								$result[$j]['total_tax'] = 0;
				
							if($order->amount!='')
								$result[$j]['total_sale'] = $order->amount;
							else
								$result[$j]['total_sale'] = 0;
							
							if($end_date == $end)
								$start_date = $end;
							else
								$start_date = $end +(24*60*60);
							$j++;			
						}
						$this->load->vars(array('result'=>$result));
						$this->load->view('admin/search_sales');
					}
					elseif($post['group']=='month'){
						$j = 0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							$m = date('m',$start);
							
							for($i=0;$i<30;$i++){
								if($end<$end_date)
								{
									$r_m = date('m',$end +(24*60*60));
									
									if($r_m == $m)
										$end += 24*60*60;
								}
							}
							$s = date('Y-m-d',$start);
							$e = date('Y-m-d',$end);
							//echo $s.'-----';
							//echo $e.'<br>';//die;
							$order = new Order();
							$order->where ('status <>',$post['status']);
							$order->where ('order_date >=',$s);
							$order->where ('order_date <=',$e);
							$order->get();
							$count = $order->result_count();
							$total_products = 0;
							foreach($order as $ord){
								$ord->product->include_join_fields()->get();
								$qty = 0;
								foreach($ord->product as $prod){
									$qty += $prod->join_quantity;
								}
								$ord->quantity = $qty;
								$total_products += $qty;
							}
							$order = new Order();
							$order->select_func('year','@order_date', 'year');
							$order->select_func('month','@order_date', 'month');
							$order->select_func('sum','@total_amount', 'amount');
							$order->select_func('sum','@tax', 'total_tax');
							$order->where ('status <>',$post['status']);
							$order->where ('order_date >=',$s);
							$order->where ('order_date <=',$e);
							$order->group_by('YEAR(order_date)');
							$order->group_by('MONTH(order_date)');
							$order->get();
							
							$result[$j]['start_date'] = $s;
							$result[$j]['end_date'] = $e;
							$result[$j]['total_orders'] = $count;
							$result[$j]['total_products'] = $total_products;
							if($order->total_tax!='')
								$result[$j]['total_tax'] = $order->total_tax;
							else
								$result[$j]['total_tax'] = 0;
				
							if($order->amount!='')
								$result[$j]['total_sale'] = $order->amount;
							else
								$result[$j]['total_sale'] = 0;
							
							if($end_date == $end)
								$start_date = $end;
							else
								$start_date = $end +(24*60*60);
							$j++;			
						}
						$this->load->vars(array('result'=>$result));
						$this->load->view('admin/search_sales');
						
					}
					elseif($post['group']=='year'){
						$j = 0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							$m = date('Y',$start);
							
							for($i=0;$i<365;$i++){
								if($end<$end_date)
								{
									$r_m = date('Y',$end +(24*60*60));
									
									if($r_m == $m)
										$end += 24*60*60;
								}
							}
							$s = date('Y-m-d',$start);
							$e = date('Y-m-d',$end);
							//echo $s.'-----';
							//echo $e.'<br>';//die;
							$order = new Order();
							$order->where ('status <>',$post['status']);
							$order->where ('order_date >=',$s);
							$order->where ('order_date <=',$e);
							$order->get();
							$count = $order->result_count();
							$total_products = 0;
							foreach($order as $ord){
								$ord->product->include_join_fields()->get();
								$qty = 0;
								foreach($ord->product as $prod){
									$qty += $prod->join_quantity;
								}
								$ord->quantity = $qty;
								$total_products += $qty;
							}
							$order = new Order();
							$order->select_func('year','@order_date', 'year');
							$order->select_func('month','@order_date', 'month');
							$order->select_func('sum','@total_amount', 'amount');
							$order->select_func('sum','@tax', 'total_tax');
							$order->where ('status <>',$post['status']);
							$order->where ('order_date >=',$s);
							$order->where ('order_date <=',$e);
							$order->group_by('YEAR(order_date)');
							$order->group_by('MONTH(order_date)');
							$order->get();
							
							$result[$j]['start_date'] = $s;
							$result[$j]['end_date'] = $e;
							$result[$j]['total_orders'] = $count;
							$result[$j]['total_products'] = $total_products;
							if($order->total_tax!='')
								$result[$j]['total_tax'] = $order->total_tax;
							else
								$result[$j]['total_tax'] = 0;
				
							if($order->amount!='')
								$result[$j]['total_sale'] = $order->amount;
							else
								$result[$j]['total_sale'] = 0;
							
							if($end_date == $end)
								$start_date = $end;
							else
								$start_date = $end +(24*60*60);
							$j++;			
						}
						if(isset($result))
							$this->load->vars(array('result'=>$result));
						$this->load->view('admin/search_sales');
						
					}
				}
				else
				{
					$this->load->view('admin/search_sales');
				}
				//echo "<pre>";print_r($post);die;
			}
		}
		
	}
	/**function for report based on designer
	 *@author:Krishna Sharma
	 *@access:admin
	 */
	function designer_report()
	{
		$now = time();
		$e = date('Y-m-d',$now);
		$s = date('Y-m-d',$now-(24*60*60*30));
		
		$user = new User();
		$user->where('role_id',3)->get();
		$result = array();
		foreach ($user as $user_arr){
			$order = new Order();
			$order->where ('status <>','Payment Pending');
			$order->where ('status <>','Payment failed');
			$order->where ('order_date >=',$s);
			$order->where ('order_date <=',$e);
			$order->where_related('product', 'user_id', $user_arr->id);
			$order->get();
			$count = $order->result_count();
			if($count>0){
				$total_products = 0;
				$k=0;$products = array();
				foreach($order as $ord){
					$ord->product->include_join_fields()->get();
					foreach($ord->product as $prod){
						$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_prize,$prod->join_rdm_quantity,$prod->join_revenue);
						$k++;
						}
					}
				foreach($products as $p){
					$id[] = $p[0];
				}
				$ids = array_unique($id);
				$arr = array();$l=0;
				foreach($ids as $i)
				{
					
					$qty = 0; $rdm_qty = 0; $revenue = 0;						
					foreach($products as $p){
						if($p[0]==$i){
							$qty += $p[1];
							$price = $p[2];
							$rdm_qty +=$p[3];
							$revenue +=$p[4];
						}
					}
					if($qty>0){
						$arr[$l]['qty'] = $qty;
						$arr[$l]['price'] = $price;
						$arr[$l]['rdm_qty'] =$rdm_qty;
						$arr[$l]['revenue'] =$revenue;
						$l++;
					}
					
					
				}
				$total_price = 0;$total_qty = 0; $total_revenue=0;
				foreach ($arr as $res){
					$total_qty += $res['qty'];//echo $user_arr->id;
					$total_price += $res['price'] * $res['qty'];
					$total_revenue += $res['revenue'] * $res['qty'];
				}
				$result[$user_arr->id]['no_of_products'] = count($arr);
				$result[$user_arr->id]['total_sale'] = $total_qty;
				$result[$user_arr->id]['total_amount'] = $total_price;
				$result[$user_arr->id]['total_revenue'] = $total_revenue;
				$result[$user_arr->id]['name'] = $user_arr->first_name.' '.$user_arr->last_name;
				$result[$user_arr->id]['start_date'] = $s;
				$result[$user_arr->id]['end_date'] = $e;
			}
		}
		//echo '<pre>';print_r($result);die;
		if(isset($result))
			$this->load->vars(array('result'=>$result));
			$this->load->view('admin/designer_report');
			
	}
	
	/**Function for generate sales report of given period in desired grouping like weekly,monthly etc.
	 *@author:Krishna Sharma
	 *@access:Admin
	 */
	function search_designer()
	{
		$user = new User();
		$user->where('role_id',3);
		$user->get();
		if(!$this->input->post()){
			
			$this->load->vars(array('user'=>$user));
			$this->load->view('admin/search_designers');
			
		}else{
			
	    	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
			$this->form_validation->set_rules('start_date', 'start date', 'required');
			$this->form_validation->set_rules('end_date', 'end date', 'required');
			
	    	if ($this->form_validation->run() == FALSE)
	    	{
				$user = new User();
				$user->where('role_id',3);
				$user->get();
				$this->load->vars(array('user'=>$user));
	    		$this->load->view('admin/search_designers');
	    	}
			else{
				$sdate=explode("/",$this->input->post('start_date'));
				$start_date = $sdate[2].'-'.$sdate[1].'-'.$sdate[0];
				
				$edate=explode("/",$this->input->post('end_date'));
				$end_date = $edate[2].'-'.$edate[1].'-'.$edate[0];
				
				$end_date = strtotime($end_date);
				$start_date = strtotime($start_date);
				if($start_date < $end_date){
					//echo '<pre>'; print_r($start_date);die;
					$post = $this->input->post();
					//echo "<pre>";print_r($post);die;
				
					if($post['group']=='week'){
						$j=0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							for($i=0;$i<6;$i++){
								if($end<$end_date)
									$end += 24*60*60; 
							}
							$s = date('Y-m-d',$start);
							$e = date('y-m-d',$end);
							//echo $s;echo "----".$e;die;
							$order = new Order();
							$order->where ('status <>','Payment Pending');
							$order->where ('status <>','Payment failed');
							$order->where ('order_date >=',$s);
							$order->where ('order_date <=',$e);
							$order->where_related('product', 'user_id', $post['user']);
							$order->get();
							$count = $order->result_count();
							if($count>0){
								$total_products = 0;
								$k=0;$products = array();
								foreach($order as $ord){
									$ord->product->include_join_fields()->get();
									foreach($ord->product as $prod){
										$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_prize,$prod->join_rdm_quantity,$prod->join_revenue);
										$k++;
										}
									}
								foreach($products as $p){
									$id[] = $p[0];
								}
								$ids = array_unique($id);
								$arr = array();$l=0;
								foreach($ids as $i)
								{
									
									$qty = 0; $rdm_qty = 0; $revenue = 0;						
									foreach($products as $p){
										if($p[0]==$i){
											$qty += $p[1];
											$price = $p[2];
											$rdm_qty +=$p[3];
											$revenue +=$p[4];
										}
									}
									if($qty>0){
										$arr[$l]['qty'] = $qty;
										$arr[$l]['price'] = $price;
										$arr[$l]['rdm_qty'] =$rdm_qty;
										$arr[$l]['revenue'] =$revenue;
										$l++;
									}
									
									
								}
								$total_price = 0;$total_qty = 0; $total_revenue=0;
								foreach ($arr as $res){
									$total_qty += $res['qty'];//echo $user_arr->id;
									$total_price += $res['price'] * $res['qty'];
									$total_revenue += $res['revenue'] * $res['qty'];
								}
								$result[$j]['no_of_products'] = count($arr);
								$result[$j]['total_sale'] = $total_qty;
								$result[$j]['total_amount'] = $total_price;
								$result[$j]['total_revenue'] = $total_revenue;
								$designer = new User($post['user']);
								$result[$j]['name'] = $designer->first_name.' '.$designer->last_name;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
								
									
							}
							else
							{
								$result[$j]['no_of_products'] = 0;
								$result[$j]['total_sale'] = 0;
								$result[$j]['total_amount'] = 0;
								$result[$j]['total_revenue'] = 0;
								$designer = new User($post['user']);
								$result[$j]['name'] = $designer->first_name.' '.$designer->last_name;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
							}
							
							if($end_date == $end)
									$start_date = $end;
								else
									$start_date = $end +(24*60*60);
								$j++;	
						}
						//echo "<pre>";print_r($result);die;
						$this->load->vars(array('result'=>$result));
						$this->load->view('admin/designer_search');
					}
					elseif($post['group']=='month'){
						$j = 0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							$m = date('m',$start);
							
							for($i=0;$i<30;$i++){
								if($end<$end_date)
								{
									$r_m = date('m',$end +(24*60*60));
									
									if($r_m == $m)
										$end += 24*60*60;
								}
							}
							$s = date('Y-m-d',$start);
							$e = date('Y-m-d',$end);
							//echo $s.'-----';
							//echo $e.'<br>';//die;
							$order = new Order();
							$order->where ('status <>','Payment Pending');
							$order->where ('status <>','Payment failed');
							$order->where ('order_date >=',$s);
							$order->where ('order_date <=',$e);
							$order->where_related('product', 'user_id', $post['user']);
							$order->get();
							$count = $order->result_count();
							if($count>0){
								$total_products = 0;
								$k=0;$products = array();
								foreach($order as $ord){
									$ord->product->include_join_fields()->get();
									foreach($ord->product as $prod){
										$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_prize,$prod->join_rdm_quantity,$prod->join_revenue);
										$k++;
										}
									}
								foreach($products as $p){
									$id[] = $p[0];
								}
								$ids = array_unique($id);
								$arr = array();$l=0;
								foreach($ids as $i)
								{
									
									$qty = 0; $rdm_qty = 0; $revenue = 0;						
									foreach($products as $p){
										if($p[0]==$i){
											$qty += $p[1];
											$price = $p[2];
											$rdm_qty +=$p[3];
											$revenue +=$p[4];
										}
									}
									if($qty>0){
										$arr[$l]['qty'] = $qty;
										$arr[$l]['price'] = $price;
										$arr[$l]['rdm_qty'] =$rdm_qty;
										$arr[$l]['revenue'] =$revenue;
										$l++;
									}
									
									
								}
								$total_price = 0;$total_qty = 0; $total_revenue=0;
								foreach ($arr as $res){
									$total_qty += $res['qty'];//echo $user_arr->id;
									$total_price += $res['price'] * $res['qty'];
									$total_revenue += $res['revenue'] * $res['qty'];
								}
								$result[$j]['no_of_products'] = count($arr);
								$result[$j]['total_sale'] = $total_qty;
								$result[$j]['total_amount'] = $total_price;
								$result[$j]['total_revenue'] = $total_revenue;
								$designer = new User($post['user']);
								$result[$j]['name'] = $designer->first_name.' '.$designer->last_name;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
								
									
							}
							if($end_date == $end)
									$start_date = $end;
								else
									$start_date = $end +(24*60*60);
								$j++;	
						}
						//echo "<pre>";print_r($result);die;
						if(isset($result))
							$this->load->vars(array('result'=>$result));
						$this->load->view('admin/designer_search');
						
					}
					elseif($post['group']=='year'){
						$j = 0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							$m = date('Y',$start);
							
							for($i=0;$i<365;$i++){
								if($end<$end_date)
								{
									$r_m = date('Y',$end +(24*60*60));
									
									if($r_m == $m)
										$end += 24*60*60;
								}
							}
							$s = date('Y-m-d',$start);
							$e = date('Y-m-d',$end);
							//echo $s.'-----';
							//echo $e.'<br>';//die;
							$order = new Order();
							$order->where ('status <>','Payment Pending');
							$order->where ('status <>','Payment failed');
							$order->where ('order_date >=',$s);
							$order->where ('order_date <=',$e);
							$order->where_related('product', 'user_id', $post['user']);
							$order->get();
							$count = $order->result_count();
							if($count>0){
								$total_products = 0;
								$k=0;$products = array();
								foreach($order as $ord){
									$ord->product->include_join_fields()->get();
									foreach($ord->product as $prod){
										$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_prize,$prod->join_rdm_quantity,$prod->join_revenue);
										$k++;
										}
									}
								foreach($products as $p){
									$id[] = $p[0];
								}
								$ids = array_unique($id);
								$arr = array();$l=0;
								foreach($ids as $i)
								{
									
									$qty = 0; $rdm_qty = 0; $revenue = 0;						
									foreach($products as $p){
										if($p[0]==$i){
											$qty += $p[1];
											$price = $p[2];
											$rdm_qty +=$p[3];
											$revenue +=$p[4];
										}
									}
									if($qty>0){
										$arr[$l]['qty'] = $qty;
										$arr[$l]['price'] = $price;
										$arr[$l]['rdm_qty'] =$rdm_qty;
										$arr[$l]['revenue'] =$revenue;
										$l++;
									}
									
									
								}
								$total_price = 0;$total_qty = 0; $total_revenue=0;
								foreach ($arr as $res){
									$total_qty += $res['qty'];//echo $user_arr->id;
									$total_price += $res['price'] * $res['qty'];
									$total_revenue += $res['revenue'] * $res['qty'];
								}
								$result[$j]['no_of_products'] = count($arr);
								$result[$j]['total_sale'] = $total_qty;
								$result[$j]['total_amount'] = $total_price;
								$result[$j]['total_revenue'] = $total_revenue;
								$designer = new User($post['user']);
								$result[$j]['name'] = $designer->first_name.' '.$designer->last_name;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
								
									
							}
							if($end_date == $end)
									$start_date = $end;
								else
									$start_date = $end +(24*60*60);
								$j++;	
						}
						//echo "<pre>";print_r($result);die;
						if(isset($result))
							$this->load->vars(array('result'=>$result));
						$this->load->view('admin/designer_search');
						
					}
				}
				else
				{
					$this->load->view('admin/search_designers');
				}
				//echo "<pre>";print_r($post);die;
			}
		}
		
	}
	
	/**function for report based on products
	 *@author:Krishna Sharma
	 *@access:admin
	 */
	function product_report()
	{
		$now = time();
		$e = date('Y-m-d',$now);
		$s = date('Y-m-d',$now-(24*60*60*7));
		$result = array();
		$order = new Order();
		$order->where('status <>','Payment Pending');
		$order->where('status <>','Payment failed');
		$order->where('order_date >=',$s);
		$order->where('order_date <=',$e);
		//$order->where_related('product', 'user_id', $user_arr->id);
		$order->get();
		$count = $order->result_count();
		if($count>0){
			$total_products = 0;
			$k=0;$products = array();
			foreach($order as $ord){
				$ord->product->include_join_fields()->get();
				foreach($ord->product as $prod){
					$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_prize,$prod->join_rdm_quantity,$prod->join_revenue,$prod->user_id,$prod->name);
					$k++;
				}
			}
			//echo "<pre>";print_r($products);die;
			foreach($products as $p){
				$id[] = $p[0];
			}
			$ids = array_unique($id);
			//echo "<pre>";print_r($ids);die;
			
			$arr = array();$l=0;
			foreach($ids as $i)
			{
				$qty = 0; $rdm_qty = 0; $revenue = 0;						
				foreach($products as $p){
					if($p[0]==$i){
						$qty += $p[1];
						$price = $p[2];
						$rdm_qty +=$p[3];
						$revenue +=$p[4];
						$user_id  = $p[5];
						$product_name = $p[6];
					}
				}
				if($qty>0){
					$result[$l]['product'] = $product_name;
					$result[$l]['qty'] = $qty;
					$result[$l]['price'] = $price;
					$result[$l]['rdm_qty'] =$rdm_qty;
					$result[$l]['revenue'] =$revenue;
					$result[$l]['timeline'] = $s.' To '.$e;
					$designer = new User($user_id);
					$result[$l]['designer'] = $designer->first_name.' '.$designer->last_name;
					$l++;
				}
				
				
			}
			
		}
		
		//echo '<pre>';print_r($result);die;
		if(isset($result))
			$this->load->vars(array('result'=>$result));
			$this->load->view('admin/product_report');
			
	}
	
	/**Function for generate sales report of given period in desired grouping like weekly,monthly etc.
	 *@author:Krishna Sharma
	 *@access:Admin
	 */
	function search_product()
	{
		$user = new User();
		$user->where('role_id',3);
		$user->get();
		if(!$this->input->post()){
			
			$this->load->vars(array('user'=>$user));
			$this->load->view('admin/search_products');
			
		}else{
			
	    	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
			$this->form_validation->set_rules('start_date', 'start date', 'required');
			$this->form_validation->set_rules('end_date', 'end date', 'required');
			
	    	if ($this->form_validation->run() == FALSE)
	    	{
				$this->load->vars(array('user'=>$user));
	    		$this->load->view('admin/search_products');
	    	}
			else{
				$sdate=explode("/",$this->input->post('start_date'));
				$start_date = $sdate[2].'-'.$sdate[1].'-'.$sdate[0];
				
				$edate=explode("/",$this->input->post('end_date'));
				$end_date = $edate[2].'-'.$edate[1].'-'.$edate[0];
				
				$end_date = strtotime($end_date);
				$start_date = strtotime($start_date);
				if($start_date < $end_date){
					$post = $this->input->post();
					$s = date('Y-m-d',$start_date);
					$e = date('y-m-d',$end_date);
					//echo $s;echo "----".$e;die;
					$result = array();
					$order = new Order();
					$order->where('status <>','Payment Pending');
					$order->where('status <>','Payment failed');
					$order->where('order_date >=',$s);
					$order->where('order_date <=',$e);
					$order->where_related('product', 'user_id', $post['user']);
					$order->get();
					$count = $order->result_count();
					if($count>0){
						$total_products = 0;
						$k=0;$products = array();
						foreach($order as $ord){
							$ord->product->include_join_fields()->get();
							foreach($ord->product as $prod){
								$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_prize,$prod->join_rdm_quantity,$prod->join_revenue,$prod->user_id,$prod->name);
								$k++;
							}
						}
						//echo "<pre>";print_r($products);die;
						foreach($products as $p){
							$id[] = $p[0];
						}
						$ids = array_unique($id);
						//echo "<pre>";print_r($ids);die;
						
						$arr = array();$l=0;
						foreach($ids as $i)
						{
							$qty = 0; $rdm_qty = 0; $revenue = 0;						
							foreach($products as $p){
								if($p[0]==$i){
									$qty += $p[1];
									$price = $p[2];
									$rdm_qty +=$p[3];
									$revenue +=$p[4];
									$user_id  = $p[5];
									$product_name = $p[6];
								}
							}
							if($qty>0){
								$result[$l]['product'] = $product_name;
								$result[$l]['qty'] = $qty;
								$result[$l]['price'] = $price;
								$result[$l]['rdm_qty'] =$rdm_qty;
								$result[$l]['revenue'] =$revenue;
								$result[$l]['timeline'] = $s.' To '.$e;
								$designer = new User($user_id);
								$result[$l]['designer'] = $designer->first_name.' '.$designer->last_name;
								$l++;
							}
							
							
						}
						
					}
		
					//echo '<pre>';print_r($result);die;
					if(isset($result))
						$this->load->vars(array('result'=>$result));
						$this->load->view('admin/search_product');
					}
				else
				{
					$this->load->view('admin/search_products');
				}
				//echo "<pre>";print_r($post);die;
			}
		}
		
	}
	
	/**function for report based on customers as per country
	 *@author:Krishna Sharma
	 *@access:admin
	 */
	function customer_report()
	{
		$now = time();
		$e = date('Y-m-d',$now);
		$s = date('Y-m-d',$now-(24*60*60*30));
		$result = array();
		$order = new Order();
		$order->where('status =','completed');
		$order->get();
		//echo $order->result_count();die;
		$country = array();
    	foreach ($order as $test)
    	{
			$test->ordaddress->get();
			
			foreach($test->ordaddress as $address){
				if($address->type=='billing'){
					$country[] = strtoupper($address->country);
					}
			}
			
    	}
		$countries = array_unique($country);
		$result = array();$t=0;$amount = array();
		foreach($countries as $cnt){
			$order->where('status =','completed');
			$order->where_related_ordaddress('country',$cnt);
			$order->get();
			$quantity = 0;$qty = 0;
			foreach($order as $ord){
				$ord->product->include_join_fields()->get();
				
				foreach($ord->product as $prod){
					$qty += 1;
				}
				$quantity = $qty;
			}
			$result[$t]['quantity'] = $quantity;
		
			$order = new Order();
			$order->select_func('sum','@total_amount', 'amount');
			$order->where('status =','completed');
			$order->where_related_ordaddress('country',$cnt);
			$order->get();
			$result[$t]['total'] = $order->amount;
			$result[$t]['country'] = $cnt;
			$amount[$t] = $order->amount;
			$contry[$t] = $cnt;
			$t++;
		}
		$this->load->library('piechart');

		// Set variables etc
		$this->piechart->showLabel(true);
		$this->piechart->showPercent(true);
		$this->piechart->showParts(true);
		$this->piechart->setWidth(250);
		//$this->piechart->setFont('c:/wamp/www/classroombookings/tahoma.ttf', 9);
		$this->piechart->setLegend('round');
		$this->piechart->setData($amount);
		$this->piechart->setLabels( $contry );
		
		// Make unique filename
		//$hash = md5("report-pie-".$this->school_id);
		
		// Generate pie and save it
		$this->piechart->Generate("temp/testpie.png");
		
				
		//echo '<pre>';print_r($result);die;
		
		if(isset($result))
			$this->load->vars(array('result'=>$result));
			$this->load->view('admin/customer_report');
			
	}
	/**Function for generate sales report by customer based on country.
	 *@author:Krishna Sharma
	 *@access:Admin
	 */
	function search_customer()
	{
		if(!$this->input->post()){
			
			$this->load->view('admin/search_customer');
			
		}else{
			
	    	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
			$this->form_validation->set_rules('start_date', 'start date', 'required');
			$this->form_validation->set_rules('end_date', 'end date', 'required');
			
	    	if ($this->form_validation->run() == FALSE)
	    	{
				$this->load->view('admin/search_customer');
	    	}
			else{
				$sdate=explode("/",$this->input->post('start_date'));
				$start_date = $sdate[2].'-'.$sdate[1].'-'.$sdate[0];
				
				$edate=explode("/",$this->input->post('end_date'));
				$end_date = $edate[2].'-'.$edate[1].'-'.$edate[0];
				
				$end_date = strtotime($end_date);
				$start_date = strtotime($start_date);
				if($start_date < $end_date){
					$s = date('Y-m-d',$start_date);
					$e = date('y-m-d',$end_date);
					$result = array();
					$order = new Order();
			$order->where('status =','completed');
					$order->where('order_date >=',$s);
					$order->where('order_date <=',$e);
					$order->get();
					//echo $order->result_count();die;
					$country = array();
					foreach ($order as $test)
					{
						$test->ordaddress->get();
						
						foreach($test->ordaddress as $address){
							if($address->type=='billing'){
								$country[] = strtoupper($address->country);
								}
						}
						
					}
					$countries = array_unique($country);
					$result = array();$t=0;$amount = array();
					foreach($countries as $cnt){
			$order->where('status =','completed');
						$order->where('order_date >=',$s);
						$order->where('order_date <=',$e);
						$order->where_related_ordaddress('country',$cnt);
						$order->get();
						$quantity = 0;$qty = 0;
						foreach($order as $ord){
							$ord->product->include_join_fields()->get();
							
							foreach($ord->product as $prod){
								$qty += $prod->join_quantity;
							}
							$quantity = $qty;
						}
						$result[$t]['quantity'] = $quantity;
					
						$order = new Order();
						$order->select_func('sum','@total_amount', 'amount');
			$order->where('status =','completed');
						$order->where('order_date >=',$s);
						$order->where('order_date <=',$e);
						$order->where_related_ordaddress('country',$cnt);
						$order->get();
						$result[$t]['total'] = $order->amount;
						$result[$t]['country'] = $cnt;
						$amount[$t] = $order->amount;
						$contry[$t] = $cnt;
						$t++;
					}
					$this->load->library('piechart');
			
					// Set variables etc
					$this->piechart->showLabel(true);
					$this->piechart->showPercent(true);
					$this->piechart->showParts(true);
					$this->piechart->setWidth(250);
					//$this->piechart->setFont('c:/wamp/www/classroombookings/tahoma.ttf', 9);
					$this->piechart->setLegend('round');
					$this->piechart->setData($amount);
					$this->piechart->setLabels( $contry );
					
					// Make unique filename
					//$hash = md5("report-pie-".$this->school_id);
					
					// Generate pie and save it
					$this->piechart->Generate("temp/testpie.png");
					
							
					//echo '<pre>';print_r($result);die;
					
					if(isset($result))
						$this->load->vars(array('result'=>$result));
						$this->load->view('admin/customer_search');
				}
				else
				{
					$this->load->view('admin/search_customer');
				}
				//echo "<pre>";print_r($post);die;
			}
		}
		
	}
	
	/**function to display reward point use in given period
	 *@author:Krishna Sharma
	 *@access:admin
	 */
	function reward_report()
	{
		$now = time();
		
		$result = array();
			
		for($i=0;$i<7;$i++){
			//$s = date('Y-m-d',$now-(24*60*60*30));
			$e = date('Y-m-d',$now);
			$order = new Order();
			$order->where('status <>','Payment Pending');
			$order->where('status <>','Payment failed');
			$order->where('order_date',$e);
			//$order->where('order_date <=',$e);
			$order->get();
			$k=0;$products = array();
			foreach($order as $ord){
				$ord->product->include_join_fields()->get();
				foreach($ord->product as $prod){
					$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_rdm_quantity,$prod->join_points_used);
					$k++;
				}
			}
			$quantity = 0; $points = 0;
			foreach($products as $p){
				$quantity += $p[2];
				$points += $p[3];
			}
			$result[$i]['date'] = $e;
			$result[$i]['points_used'] = $points;
			$result[$i]['quantity'] = $quantity;
			
			$now -= 24*60*60;
		
		}
		//echo '<pre>';print_r($result);die;
		if(isset($result))
			$this->load->vars(array('result'=>$result));
			$this->load->view('admin/reward_report');
			
	}
	
	/**Function for generate reward point report as per given date.
	 *@author:Krishna Sharma
	 *@access:Admin
	 */
	function search_reward()
	{
		if(!$this->input->post()){
			
			$this->load->view('admin/search_reward');
			
		}else{
			
	    	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
			$this->form_validation->set_rules('start_date', 'start date', 'required');
			$this->form_validation->set_rules('end_date', 'end date', 'required');
			
	    	if ($this->form_validation->run() == FALSE)
	    	{
				$this->load->view('admin/search_reward');
	    	}
			else{
				$sdate=explode("/",$this->input->post('start_date'));
				$start_date = $sdate[2].'-'.$sdate[1].'-'.$sdate[0];
				
				$edate=explode("/",$this->input->post('end_date'));
				$end_date = $edate[2].'-'.$edate[1].'-'.$edate[0];
				
				$end_date = strtotime($end_date);
				$start_date = strtotime($start_date);
				if($start_date < $end_date){
					$post = $this->input->post();
					
					if($post['group']=='week'){
						$j=0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							for($i=0;$i<6;$i++){
								if($end<$end_date)
									$end += 24*60*60; 
							}
							$s = date('Y-m-d',$start);
							$e = date('y-m-d',$end);
							//echo $s;echo "----".$e;die;
							$order = new Order();
							$order->where('status <>','Payment Pending');
							$order->where('status <>','Payment failed');
							$order->where('order_date >=',$s);
							$order->where('order_date <=',$e);
							$order->get();
							$count = $order->result_count();
							if($count>0){
								$k=0;$products = array();
								foreach($order as $ord){
									$ord->product->include_join_fields()->get();
									foreach($ord->product as $prod){
										$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_rdm_quantity,$prod->join_points_used);
										$k++;
									}
								}
								$quantity = 0; $points = 0;
								foreach($products as $p){
									$quantity += $p[2];
									$points += $p[3];
								}
								
								$result[$j]['points_used'] = $points;
								$result[$j]['quantity'] = $quantity;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
								
									
							}
							else
							{
								$result[$j]['points_used'] = 0;
								$result[$j]['quantity'] = 0;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
							}
							
							if($end_date == $end)
									$start_date = $end;
								else
									$start_date = $end +(24*60*60);
								$j++;	
						}
					}
					elseif($post['group']=='month'){
						$j = 0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							$m = date('m',$start);
							
							for($i=0;$i<30;$i++){
								if($end<$end_date)
								{
									$r_m = date('m',$end +(24*60*60));
									
									if($r_m == $m)
										$end += 24*60*60;
								}
							}
							$s = date('Y-m-d',$start);
							$e = date('Y-m-d',$end);
							//echo $s.'-----';
							//echo $e.'<br>';//die;
							$order = new Order();
							$order->where('status <>','Payment Pending');
							$order->where('status <>','Payment failed');
							$order->where('order_date >=',$s);
							$order->where('order_date <=',$e);
							$order->get();
							$count = $order->result_count();
							if($count>0){
								$k=0;$products = array();
								foreach($order as $ord){
									$ord->product->include_join_fields()->get();
									foreach($ord->product as $prod){
										$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_rdm_quantity,$prod->join_points_used);
										$k++;
									}
								}
								$quantity = 0; $points = 0;
								foreach($products as $p){
									$quantity += $p[2];
									$points += $p[3];
								}
								
								$result[$j]['points_used'] = $points;
								$result[$j]['quantity'] = $quantity;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
								
									
							}
							else
							{
								$result[$j]['points_used'] = 0;
								$result[$j]['quantity'] = 0;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
							}
							if($end_date == $end)
									$start_date = $end;
								else
									$start_date = $end +(24*60*60);
								$j++;	
						}
						
					}
					elseif($post['group']=='year'){
						$j = 0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							$m = date('Y',$start);
							
							for($i=0;$i<365;$i++){
								if($end<$end_date)
								{
									$r_m = date('Y',$end +(24*60*60));
									
									if($r_m == $m)
										$end += 24*60*60;
								}
							}
							$s = date('Y-m-d',$start);
							$e = date('Y-m-d',$end);
							//echo $s.'-----';
							//echo $e.'<br>';//die;
							$order = new Order();
							$order->where('status <>','Payment Pending');
							$order->where('status <>','Payment failed');
							$order->where('order_date >=',$s);
							$order->where('order_date <=',$e);
							$order->get();
							$count = $order->result_count();
							if($count>0){
								$k=0;$products = array();
								foreach($order as $ord){
									$ord->product->include_join_fields()->get();
									foreach($ord->product as $prod){
										$products[$k] = array($prod->id,$prod->join_quantity,$prod->join_rdm_quantity,$prod->join_points_used);
										$k++;
									}
								}
								$quantity = 0; $points = 0;
								foreach($products as $p){
									$quantity += $p[2];
									$points += $p[3];
								}
								
								$result[$j]['points_used'] = $points;
								$result[$j]['quantity'] = $quantity;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
								
									
							}
							else
							{
								$result[$j]['points_used'] = 0;
								$result[$j]['quantity'] = 0;
								$result[$j]['start_date'] = $s;
								$result[$j]['end_date'] = $e;
							}
							if($end_date == $end)
									$start_date = $end;
								else
									$start_date = $end +(24*60*60);
								$j++;	
						}
						
					}
					
					if(isset($result))
						$this->load->vars(array('result'=>$result));
						$this->load->view('admin/reward_search');
				}
				else
				{
					$this->load->view('admin/search_customer');
				}
				//echo "<pre>";print_r($post);die;
			}
		}
		
	}
	
	/** Fucntion to generate report of coupons
	 * @author: Krishna Sharma
	 * @copyright: Deemtech Softwares
	 * @access: Admin
	 * */
	function coupon_report()
	{
		$now = time();
		$result = array();
		for($i=0;$i<7;$i++){
			//$s = date('Y-m-d',$now-(24*60*60*30));
			$e = date('Y-m-d',$now);
			$order = new Order();
			$order->where('status <>','Payment Pending');
			$order->where('status <>','Payment failed');
			//$order->where('order_date >=',$s);
			$order->where('order_date',$e);
			$order->where('coupon_id <>',0)->get();
			
			$result[$i]['date'] = $e;
			$result[$i]['coupon_used'] = $order->result_count();
			
			$now -= 24*60*60;
		}
		//echo '<pre>';print_r($result);die;
		if(isset($result))
			$this->load->vars(array('result'=>$result));
			$this->load->view('admin/coupon_report');
		
	}
	
	/**Function for generate coupon report as per given date.
	 *@author:Krishna Sharma
	 *@access:Admin
	 */
	function search_coupon()
	{
		if(!$this->input->post()){
			
			$this->load->view('admin/search_coupon');
			
		}else{
			
	    	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
			$this->form_validation->set_rules('start_date', 'start date', 'required');
			$this->form_validation->set_rules('end_date', 'end date', 'required');
			
	    	if ($this->form_validation->run() == FALSE)
	    	{
				$this->load->view('admin/search_coupon');
	    	}
			else{
				$sdate=explode("/",$this->input->post('start_date'));
				$start_date = $sdate[2].'-'.$sdate[1].'-'.$sdate[0];
				
				$edate=explode("/",$this->input->post('end_date'));
				$end_date = $edate[2].'-'.$edate[1].'-'.$edate[0];
				
				$end_date = strtotime($end_date);
				$start_date = strtotime($start_date);
				if($start_date < $end_date){
					$post = $this->input->post();
					
					if($post['group']=='week'){
						$j=0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							for($i=0;$i<6;$i++){
								if($end<$end_date)
									$end += 24*60*60; 
							}
							$s = date('Y-m-d',$start);
							$e = date('y-m-d',$end);
							//echo $s;echo "----".$e;die;
							$order = new Order();
							$order->where('status <>','Payment Pending');
							$order->where('status <>','Payment failed');
							$order->where('order_date >=',$s);
							$order->where('order_date <=',$e);
							$order->where('coupon_id <>',0)->get();
							
							$result[$j]['start_date'] = $s;
							$result[$j]['end_date'] = $e;
							$result[$j]['coupon_used'] = $order->result_count();
							
							
							if($end_date == $end)
									$start_date = $end;
								else
									$start_date = $end +(24*60*60);
								$j++;	
						}
					}
					elseif($post['group']=='month'){
						$j = 0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							$m = date('m',$start);
							
							for($i=0;$i<30;$i++){
								if($end<$end_date)
								{
									$r_m = date('m',$end +(24*60*60));
									
									if($r_m == $m)
										$end += 24*60*60;
								}
							}
							$s = date('Y-m-d',$start);
							$e = date('Y-m-d',$end);
							//echo $s.'-----';
							//echo $e.'<br>';//die;
							$order = new Order();
							$order->where('status <>','Payment Pending');
							$order->where('status <>','Payment failed');
							$order->where('order_date >=',$s);
							$order->where('order_date <=',$e);
							$order->where('coupon_id <>',0)->get();
							
							$result[$j]['start_date'] = $s;
							$result[$j]['end_date'] = $e;
							$result[$j]['coupon_used'] = $order->result_count();
							if($end_date == $end)
									$start_date = $end;
								else
									$start_date = $end +(24*60*60);
								$j++;	
						}
						
					}
					elseif($post['group']=='year'){
						$j = 0;
						while($start_date!=$end_date){
							$start = $start_date;
							$end = $start_date;
							$m = date('Y',$start);
							
							for($i=0;$i<365;$i++){
								if($end<$end_date)
								{
									$r_m = date('Y',$end +(24*60*60));
									
									if($r_m == $m)
										$end += 24*60*60;
								}
							}
							$s = date('Y-m-d',$start);
							$e = date('Y-m-d',$end);
							//echo $s.'-----';
							//echo $e.'<br>';//die;
							$order = new Order();
							$order->where('status <>','Payment Pending');
							$order->where('status <>','Payment failed');
							$order->where('order_date >=',$s);
							$order->where('order_date <=',$e);
							$order->where('coupon_id <>',0)->get();
							
							$result[$j]['start_date'] = $s;
							$result[$j]['end_date'] = $e;
							$result[$j]['coupon_used'] = $order->result_count();
							if($end_date == $end)
									$start_date = $end;
								else
									$start_date = $end +(24*60*60);
								$j++;	
						}
						
					}
					//echo '<pre>';print_r($result);die;
					if(isset($result))
						$this->load->vars(array('result'=>$result));
						$this->load->view('admin/coupon_search');
				}
				else
				{
					$this->load->view('admin/search_customer');
				}
				//echo "<pre>";print_r($post);die;
			}
		}
		
	}

}