<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_setting extends MY_Controller {
    
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
	$email=new Email();
	$email->get();
	foreach($email as $mail){
	    if($mail->id==1){
		$to_email=$mail->to_email;
	    }
	    else{
		$from_email[$mail->id]=$mail->from_email;
	    }
	    
	    $re_email[$mail->id]=$mail->re_email;
	    $template[$mail->id]=$mail->template;
	}
	$this->load->vars(array('to_email'=>$to_email,'from_email'=>$from_email,'re_email'=>$re_email,'template'=>$template));
    	$this->load->view('admin/email_setting');
    }
    
    function saveEmail($email_id){
	$email=new Email($email_id);
	if($email_id==1){
	    $email->to_email=$this->input->post('to_email');
	}
	else {
	    $email->from_email=$this->input->post('to_email');
	}
	$email->re_email=$this->input->post('re_email');
	$email->template=$this->input->post('template');
	
	if ($email->save()) {
    		redirect('admin/email_setting','refresh');
    	}else {
    		$this->load->vars(array('errors'=>$email->error->all));
    		$this->index();
    		
    	}
    }
	/**function for email template edit
	 *@param id of email model
	 *@author: Krishna
	 */
	 
	function template_edit($id)
	{
		if(!$this->input->post()){
			$email = new Email($id);
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
			//echo "<pre>"; print_r($email);die;
			$this->load->vars($this->data);
			$this->load->vars(array('email'=>$email));
			$this->load->view('admin/template_edit');
			
		}
		else{
			$post = $this->input->post();
			$email = new Email($id);
			$email->id = $post['id'];
			$email->template = $post['template'];
			$email->save();
			redirect('admin/email_setting','refresh');
		}
	}
}