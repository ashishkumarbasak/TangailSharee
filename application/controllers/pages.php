<?php

class Pages extends CI_Controller {

	public function __construct()
       {
            parent::__construct();
			           
       }
	   
	 
	function faq()
	{
		$this->load->view('static_pages/faq.php');
	}
	
	function terms()
	{
		$this->load->view('static_pages/terms.php');
	}
	
	function delivery_returns_terms_conditions()
	{
		$this->load->view('static_pages/delivery_returns.php');
	}
	function about_us()
	{
		$this->load->view('static_pages/about_us.php');
	}
	function contact_us()
	{
		$this->load->view('static_pages/contact_us.php');
	}
	function cookies_policy()
	{
		$this->load->view('static_pages/cookies-privacy.php');
	}
	 
	   
}
?>