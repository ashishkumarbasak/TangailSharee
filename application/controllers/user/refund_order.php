<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Refund_order extends MY_Controller {
    
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
    }
    
    public function index(){
    	$currency=new Currency();
		$currency->get();
		
		$refund=new Refund();
		$refund->order_by('created');
		$user_id=$this->session->userdata('user_id');
		$refund->where_related('order','user_id',$user_id)->get();
		$count = count($refund->all);
		//echo $count;die;
		$page=$this->input->get("page");
		$size=10;
		$pagination=getPaginationData((int)$count, (int)$page, (int)$size);
		$pagination['url']=base_url()."user/refund_order?";
		
		
		
		$user=new User($user_id);
    	$user->image->get();
		
		$user->address->get();
		
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
        $refund->where_related('order','user_id',$user_id)->get_paged($pagination['page'],$pagination['size']);
        
        $this->load->vars(array('orders'=>$refund,'user'=>$user,'currencies'=>$currency,'pagination'=>$pagination));
        $this->load->view('user/refund_order');
    }
    
	/*function saveOrder(){
    	
		//$this->load->view('user/member_profile');
		$user_id=$this->session->userdata('user_id');
    	$o= new Order($user_id);
    	$o->id=$this->input->post('id');
    	$o->status=$this->input->post('status');
    	$o->order_date=$this->input->post('order_date');
    	$o->deliver_date=$this->input->post('gender');
    	$o->total_amount=$this->input->post('total_amount');
    	
   		if($o->save()){
    		echo "you have successfully inserted a Order";
    		echo $o->id;
    	}else {
    		foreach($o->errors->all as $key=>$value){
    			echo $key.$value."<br />";
    		}
    		echo "fail to insert";
    	}
    }
    */
    function deleteOrder($order_id){
    	$order=new Order($order_id);
    	$order->is_active='0';
    	
    	if($order->save()){
    		redirect('user/member_order','refresh');
    	}else{
    		echo "unable to delete";
    	}
    }
}