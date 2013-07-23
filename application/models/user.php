<?php



class User extends DataMapper {

    

    var $prefix = "tbl_";

    var $table="user";

    

    

    var $error_prefix = '<span>';

    var $error_suffix = '</span>';



    

    //var $auto_populate_has_many = TRUE;

    var $auto_populate_has_one = TRUE;

    

    

    var $has_many=array(

    	    'video',

	    	'designer_payment',

            'product',

            'comment',

    		'order',

    		'wishlist',

            

            "file"=>array(

                'class'=>'file',

                'other_field'=>'user',

            	'join_table'=>'tbl_user_file',

            ),

            "admin"=>array(

                'class'=>'user',

                'other_field'=>'designer',

                'join_table'=>'tbl_admin_designer',

            ),

            "cms"=>array(

            	'class'=>'cms',

            	'other_field'=>'user',

            	'join_table'=>'tbl_user_cms'

            ),

            "coupon"=>array(

            	'class'=>'coupon',

            	'other_field'=>'user',

            	'join_table'=>'tbl_user_coupon'

            ),

            

	    "address"=>array(

		'class'=>'address',

		'other_field'=>'user',

		'join_table'=>'tbl_user_address',

	    ),

            "project",

            "upcoming_design"

          );

    var $has_one=array(

		'graphic',

    		'wishlist',

    		'role',

            'currency',

           

    		"image"=>array(

                'class'=>'file',

                'other_field'=>'profile',

                'join_table'=>'tbl_user_file',

            )

	    );

    

    

    function __construct($id = NULL) {

        parent::__construct($id);

    }

    

    

    

    

    

    

    var $validation = array(

        'username' => array(

            'label' => 'Username',

            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 3, 'max_length' => 20),

        ),

        'password' => array(

            'label' => 'Password',

            'rules' => array('required', 'min_length' => 6, 'encrypt'),

        ),

        'confirm_password' => array(

            'label' => 'Re-type Password',

            'rules' => array('required', 'encrypt', 'matches' => 'password'),

        ),

        'email' => array(

            'label' => 'Email Address',

            'rules' => array('required', 'trim', 'unique', 'valid_email')

        )

        

    );



    function login()

    {

        if(isset($_COOKIE['fbsr_'.FACEBOOK_API_KEY])){

			$fbdata = $this->_get_facebook_cookie(FACEBOOK_API_KEY,FACEBOOK_API_SECREAT);

			//echo "<pre>";print_r($fbdata);die;

			$us = new User();

			$us->where('fb_uid', $fbdata['user_id'])->get();

			if(!empty($us->id))

				return true;

		}

		// Create a temporary user object

        $u = new User();

		

		 // Get this users stored record via their username

        

        if($this->username){

            $u->where('username', $this->username)->get();

        	

        }else

            $u->where('email', $this->email)->get();

		//echo '<pre>';print_r($u);die;

        if(empty($u->id)){

        	return false;

        }

            

        // Give this user their stored salt

        $this->salt = $u->salt;



        // Validate and get this user by their property values,

        // this will see the 'encrypt' validation run, encrypting the password with the salt

        $this->validate()->get();

        // this user object would be fully populated, complete with their ID.



        // If there was no matching record, this user would be completely cleared so their id would be empty.

        if (empty($this->id))

        {

            // Login failed, so set a custom error message

            

            $this->error_message('login', 'Username or password invalid');



            return FALSE;

        }

        else

        {

			// Login succeeded

            return TRUE;

        }

    }

    

    function is_valid_login($user_name=NULL,$password=NULL)

    {

    	if($user_name!=NULL && $password!=NULL)

    	{

    		$this->db->select('*');

    		$this->db->from('tbl_user');

    		$this->db->where('username',$user_name);

    		$this->db->or_where('email',$user_name);

    		$this->db->where('md5(password)',$password);

    		$query = $this->db->get();

    		if($query->num_rows()>0)

    			return true;

    		else

    			return false;

    	}

    	else

    		return false;

    	

    }

    

    

    function changePassword()

    {

    	// Create a temporary user object

        $u = new User();

        $u->where('id',$this->id)->get();

        // Get this users stored record via their username

        

        // Give this user their stored salt

        $this->salt = $u->salt;

        



        // Validate and get this user by their property values,

        // this will see the 'encrypt' validation run, encrypting the password with the salt

       $this->validate()->get();

        // this user object would be fully populated, complete with their ID.

	

        // If there was no matching record, this user would be completely cleared so their id would be empty.

        if (empty($this->id))

        {

            // Login failed, so set a custom error message

           

            $this->error_message('password', ' invalid');



            return FALSE;

        }

        else

        {

            // Login succeeded

            return TRUE;

        }

    }

    



    // Validation prepping function to encrypt passwords

    // If you look at the $validation array, you will see the password field will use this function

    function _encrypt($field)

    {

        // Don't encrypt an empty string

        if (!empty($this->{$field}))

        {

            // Generate a random salt if empty

            if (empty($this->salt))

            {

                $this->salt = md5(uniqid(rand(), true));

            }

            $this->{$field} = sha1($this->salt . $this->{$field});

        }

    }

    

	

	function _get_facebook_cookie($app_id, $application_secret) {

		if(isset($_COOKIE['fbsr_' . $app_id])){

			list($encoded_sig, $payload) = explode('.', $_COOKIE['fbsr_' . $app_id], 2);

				

			$sig = base64_decode(strtr($encoded_sig, '-_', '+/'));

			$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

	

			/*

			 if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {

			return null;

			}

			$expected_sig = hash_hmac('sha256', $payload,

			$application_secret, $raw = true);

			if ($sig !== $expected_sig) {

			return null;

			}

			$token_url = "https://graph.facebook.com/oauth/access_token?"

			. "client_id=" . $app_id . "&client_secret=" . $application_secret. "&redirect_uri=" . "&code=" . $data['code'];

				

			$response = @file_get_contents($token_url);

			$params = null;

			parse_str($response, $params);

			echo '<pre>';

			print_r($data);

			*/

			return $data;

		}else{

			return null;

		}

	}

    

    

    function adminLogin()

    {

        // Create a temporary user object

        $u = new User();


        // Get this users stored record via their username

        $u->where('username', $this->username)->get();

        // Give this user their stored salt
		//var_dump($u); die;
        $this->salt = $u->salt;



        // Validate and get this user by their property values,

        // this will see the 'encrypt' validation run, encrypting the password with the salt

        //$this->role->name='Super Admins';

        $this->validate()->get();

        // this user object would be fully populated, complete with their ID.

	

	

	$log_user=new User();

	$log_user->where('role_id','1');

	$log_user->or_where('role_id','2')->get();


	$i=0;

	$luser_id=array();

	$luser_username=array();

	foreach($log_user as $luser){

	    $luser_id[$i]=$luser->id;

	    $luser_username[$i]=$luser->username;

	    $i++;

	}

	//echo $this->username; exit;

	

	//var_dump(in_array($this->username,$luser_username)); exit;

	

        // If there was no matching record, this user would be completely cleared so their id would be empty.

        if (empty($this->id) && !in_array($this->username,$luser_username))

        {

            // Login failed, so set a custom error message

            //echo $this->username; exit;

            $this->error_message('login', 'Username or password invalid');



            return FALSE;

        }

        else

        {
            // Login succeeded

            return TRUE;

        }

    }

    

    

    function isSuperAdmin(){

        if($this->role->name=='Super Admins'){

            return true;

        }else{

            return false;

        }

    }

    

    function isAdmin(){

        if($this->role->name=='Adminstrators'){

            return true;

        }else if($this->isSuperAdmin()){

            return true;

        }else{

            return false;

        }

    }

    

    function isDesigner(){

        if($this->role->name=='Designers'){

            return true;

        }else if($this->isAdmin()){

            return true;

        }else if($this->isSuperAdmin()){

            return true;

        }else{

            return false;

        }

    }

    

    

	function isCustomer(){

        if($this->role->name=='Customers'){

            return true;

        }else if($this->isAdmin()){

            return true;

        }else if($this->isSuperAdmin()){

            return true;

        }else if($this->isDesigner()){

        	return true;

        }else {

            return false;

        }

    }

}



/* End of file user.php */

/* Location: ./application/models/user.php */

