<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login extends CI_Controller {

    

    public function __construct(){

        parent::__construct();

        $this->load->helper("email");

	

    }

    

    

    function index(){

         if($this->session->userdata('login')===true){

	    if($this->input->get('admin')){

		 $this->load->view('admin/login');

	    }

	    else{

		 redirect('admin/dashboard','refresh');

	    }

	   

	 }else {

	    $this->load->view('admin/login');

	 }

    }

        





    function doLogin(){

	 // Create user object

        

	//echo "<pre>"; print_r($this->input->post('Usrename')); die;

	$u = new User();

        // Put user supplied data into user object

        // (no need to validate the post variables in the controller,

        // if you've set your DataMapper models up with validation rules)

        $u->username = $this->input->post('Usrename');

        $u->password = $this->input->post('password');

	//echo "<pre>"; print_r($u); die;

        // Attempt to log user in with the data they supplied, using the login function setup in the User model

        // You might want to have a quick look at that login function up the top of this page to see how it authenticates the user

        

        

	    if ($u->adminLogin() )

	    { 

		    $this->session->set_userdata("login",true);               

		    $this->session->set_userdata("user_id",$u->id);

		    redirect('admin/dashboard','refresh');

    

	    }

	    else

	    {

		redirect('admin/login','refresh');

	    }

	

    }

    

    

}

    