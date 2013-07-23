<?php
class user_model extends CI_Model{
    
    var $user_id = "";
    var $username = "";
    var $password = "";
    var $fb_uid = "";
	var $first_name = "";
	var $last_name = "";
    
    function __construct()
	{
        parent::__construct();
    }
    
	function user_model() 
	{
      parent::Model();
   	}
    
    
    function insertUser($data){
        if($this->checkUserEmail($data['email']) && $this->checkUserEmail($data['username'])){
            $this->db->insert("tbl_user",$data);
            $q=$this->db->query("SELECT LAST_INSERT_ID() as user_id");
            if($q->num_rows==1){
                return $q->row()->user_id;
            }else{
                return false;
            }
        }
        return false;
    }
    
    
    
    
    
    function getUserById($user_id){
        $this->db->where(array("id"=>$user_id));
        $q=$this->db->get("tbl_user");
        if($q->num_rows==1){
            return $q->row();
        }  else {
            return false;
        }
    }
    
    
    
    
    
    function getUserByEmail($email){
        $this->db->where(array("email"=>$email));
        $q=$this->db->get("tbl_user");
        if($q->num_rows==1){
            return $q->row();
        }  else {
            return false;
        }
    }
    
    
    
    
    
    function getUserByUsername($username){
        $this->db->where(array("username"=>$username));
        $q=$this->db->get("tbl_user");
        if($q->num_rows==1){
            return $q->row();
        }  else {
            return false;
        }
    }
    
    
    
    
    
    function updateUser($data){
        if(isset($data['use_id'])){
            $this->db->where(array("user_id"=>$data['userid']));
        }else if(isset($data['username'])){
            $this->db->where(array("username"=>$data['username']));
        }else if(isset($data['email'])){
            $this->db->where(array("email"=>$data['email']));
        }else{
            return false;
        }
        if($this->db->update("tbl_user",$data)){
            return true;
        }  else {
            return false;
        }
    }
    
    
    function checkUserEmail($email){
        $this->db->where(array("email"=>$email));
        $this->db->from("tbl_user");
        if($this->db->count_all_results()==0){
            return true;
        }else{
            return false;
        }
    }
    
    
    
    function checkUsername($username){
        $this->db->where(array("username"=>$username));
        $this->db->from("tbl_user");
        if($this->db->count_all_results()==0){
            return true;
        }else{
            return false;
        }
    }
    
    
    function getUserRole($user_id){
        $this->db->select("role");
        $this->db->where(array("user_id"=>$user_id));
        $q=$this->db->get("tbl_user");
        if($q->num_rows==1){
            return $q->row()->role;
        }  else {
            return false;
        }
    }
    
    function getUserDataById($user_id){
        $this->where(array("user_id"=>$user_id));
        $this->from("tbl_user");
    }
    
    
     function validate_user_facebook($uid = 0) {
		//confirm that facebook session data is still valid and matches
		$this->load->library('fb_connect');
		
   		//see if the facebook session is valid and the user id in the sesison is equal to the user_id you want to validate
		$session_uid = 'fb:' .  $this->fb_connect->fbSession['uid'];
		if(!$this->fb_connect->fbSession || $session_uid != $uid ) {
   	  		return false;
		}
        
   	  	//Receive Data
      	$this->user_id    = $uid;

      //See if User exists
      $this->db->where('user_id', $this->user_id);
      $q = $this->db->get('users');

      if($q->num_rows == 1) {
         //yes, a user exists,
		 return true;
      }

      //no user exists
      return false;
   }
     
   function create_user($db_values = '') {
      $this->user_id       = $db_values["user_id"];
      $this->full_name  = $db_values["full_name"];
	  $this->first_name  = $db_values["first_name"];
	  $this->last_name  = $db_values["last_name"];
      $this->pwd           = md5($db_values["pwd"]);
      if(strlen($db_values['fb_uid']) > 0) {
      	$this->fb_uid 	   = $db_values['fb_uid'];
      } else {
      	 $this->fb_uid = "";
      }
      
      $new_user_data = array(
          'username'  => $this->user_id,
		  'first_name' => $this->first_name,
		  'last_name' => $this->last_name,
          'full_name'  => $this->full_name,
          'pwd'      => $this->pwd,
          'fb_uid' => $this->fb_uid,
      );

      $insert = $this->db->insert('users', $new_user_data);

      return $insert;
   }
   
   function get_user_by_fb_uid($fb_uid = 0) {
	   	//returns the facebook user as an array.
	   	$sql = " SELECT * FROM tbl_user WHERE 0 = 0 AND fb_uid = ?";
	   	$usr_qry = $this->db->query($sql, array('fb:'.$fb_uid));
	   	
	   	if($usr_qry->num_rows == 1) {
	   		//yes, a user exists
	   		return $usr_qry->result();
	   	} else {
	   		// no user exists
	   		return false;
	   	}
   }
   
   function authorize_facebook_login($email=NULL,$facebookid=NULL)
   {
   		if($email!=NULL && $facebookid!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->where('email',$email);
			$this->db->where('fb_uid',$facebookid);
			$query = $this->db->get();
			if($query->num_rows()>0)
				return true;
			else
				return false;
		}
		else
			return false;
   }
   
   function is_exist_facebook_email($email=NULL)
   {
   		if($email!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->where('email',$email);
			$query=$this->db->get();
			if($query->num_rows()>0)
				return true;
			else
				return false;
		}
		else
			return false;
   }	
   
   function get_userid_by_email($email=NULL)
   {
   	if($email!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->where('email',$email);
			$query=$this->db->get();
			if($query->num_rows()>0)
				{
					$result = $query->result();
					return $result[0]->id;
				}
			else
				return NULL;
		}
		else
			return NULL;
   }
   
   function save_facebook_reference($email=NULL, $fb_uid=NULL)
   {
   		if($email!=NULL && $fb_uid!=NULL)
		{
			$this->db->set('fb_uid',$fb_uid);
			$this->db->where('email',$email);
			$this->db->update('tbl_user');
		}
   }
   
   
   function validate_change_password_request($user_id=NULL,$request_code=NULL)
	{
		if($user_id!=NULL && $request_code!=NULL)
		{
			$this->db->select('username');
			$this->db->from('tbl_user');
			$this->db->where('md5(id)',$user_id);
			$this->db->where('password_request_code',$request_code);
			$this->db->where('is_active','1');
			$query = $this->db->get();
		
			if($query->num_rows() > 0)
				return true;
			else
				return false;
		}
		else
			return false;
		
	}
	
	function get_user_details($user_id=NULL)
	{
		if($user_id!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->where('md5(id)',$user_id);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return $query->result();
			}
			else
				return NULL;
		}
		else
			return NULL;
	}
	
	function is_valid_old_password($password=NULL,$user_id=NULL)
	{
		if($password!=NULL && $user_id!=NULL)
		{
			$salt = $this->get_salt($user_id);
			$hash_password =  sha1($salt . $password);
			$query = $this->db->get_where('tbl_user', array('id' => $user_id,'password'=>$hash_password,'is_active'=>'1'));
			$num_row=$query->num_rows();
		
			if( $num_row > 0)
				return true;
			else
				return false;
		}
		else
			return false;
	}
	
	function get_salt($user_id=NULL)
	{
		if($user_id!=NULL)
		{
			$this->db->select('salt');
			$this->db->from('tbl_user');
			$this->db->where('id',$user_id);
			$query = $this->db->get();
			if($query->num_rows()>0)
				{
					$result=$query->result();
					return $result[0]->salt;
				}
			else
				return NULL;
		}
		else
			return NULL;
	}
    
}