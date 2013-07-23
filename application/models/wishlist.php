<?php

class Wishlist extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="wishlist";
    
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';

    
   // var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_one=array("user");
    var $has_many=array(
    		"product"=>array(
                'class'=>'product',
                'other_field'=>'wishlist',
                'join_table'=>'tbl_product_wishlist',
    		)
    );
	
    function __construct($id = NULL) {
        parent::__construct($id);
    }
	
	function save_in_wishlist_for_user($user_id=NULL)
	{
		if($user_id!=NULL)
		{
			$this->db->set('user_id',$user_id);
			$this->db->insert('tbl_wishlist');
			return $this->db->insert_id();
		}
	}
	function save_in_wishlist_product_info($product_id=NULL,$type=NULL,$wishlist_id=NULL)
	{
		if($product_id!=NULL && $type!=NULL && $wishlist_id!=NULL)
		{
			if($type=="man" || $type=="woman")
                            $type=$type;
                        else
                            $type="man";
                        
                        $this->db->set('product_id',$product_id);
                        $this->db->set('type',$type);
			$this->db->set('wishlist_id',$wishlist_id);
			$this->db->insert('tbl_product_wishlist');
		}
	}
	
	function delete_wishlist($wishlist_id=NULL)
	{
		if($wishlist_id!=NULL)
		{
			$this->db->where('id',$wishlist_id);
			$this->db->delete('tbl_wishlist');
		}
	}
	
	function delete_wishlist_product($wishlist_id=NULL)
	{
		if($wishlist_id!=NULL)
		{
			$this->db->where('wishlist_id',$wishlist_id);
			$this->db->delete('tbl_product_wishlist');
		}
	
	}
	
	function get_wishlist_id($product_id=NULL,$user_id=NULL)
	{
		if($product_id!=NULL && $user_id!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_product_wishlist');
			$this->db->join('tbl_wishlist','tbl_product_wishlist.wishlist_id=tbl_wishlist.id','left');
			$this->db->where('product_id',$product_id);
			$this->db->where('user_id',$user_id);
			
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				return $result[0]->wishlist_id;
			}
			else
				return NULL;
			
		}
	}
	
	function get_my_wishlist_product($user_id=NULL)
	{
		if($user_id!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_product_wishlist');
			$this->db->join('tbl_wishlist','tbl_product_wishlist.wishlist_id=tbl_wishlist.id','left');
			$this->db->where('user_id',$user_id);
                        
			$query = $this->db->get();
			if($query->num_rows()>0)
				return $query->result();
			else
				return NULL;
		}
	}

}

