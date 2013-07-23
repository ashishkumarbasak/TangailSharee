<?php

class Country extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="country";
    
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';

    
    var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
            
    function __construct($id = NULL) {
        parent::__construct($id);
    }
	
	function get_shipping_methods($country_name=NULL)
	{
		if($country_name!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_country_shipping');
			$this->db->join('tbl_country','tbl_country_shipping.country_id=tbl_country.country_id');
			$this->db->join('tbl_shipping','tbl_country_shipping.shipping_id=tbl_shipping.id');
			$this->db->where('country_name',$country_name);
			
			$query = $this->db->get();
			if($query->num_rows()>0)
				{
					return $query->result();
				}
			else
				{
					$this->db->select('*');
					$this->db->from('tbl_shipping');
					$this->db->where('id','5');
					$query = $this->db->get();
					if($query->num_rows()>0)
						return $query->result();
					else
						return NULL;
				}
		}
		else
			return NULL;
	}
	
	function get_country_code($country_name=NULL)
	{
		if($country_name!=NULL)
		{
			$this->db->select('country_short_code');
			$this->db->from('tbl_country');
			$this->db->like('country_name',$country_name);
			$query = $this->db->get();
			if($query->num_rows() > 0)
				{
					$result =$query->result();
					return strtoupper($result[0]->country_short_code);
				}
			else
				return "GB";
		}
		else
			return "GB";
	}

}
?>