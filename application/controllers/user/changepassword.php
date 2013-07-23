<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changepassword extends MY_Controller {
    public function __construct()
	{
        parent::__construct();
		$this->load->model('user_model');
    }
	
	function index($user_id=NULL,$request_code=NULL)
	{
		if($user_id!=NULL && $request_code!=NULL)
			{
				$is_valid = $this->user_model->validate_change_password_request($user_id,$request_code);
				if($is_valid) 
				{
					if($this->input->post('save_settings'))
					{
						$submitok=$this->validation_change_password();
						if($submitok)
						{
							$this->user_model->update_user_password($this->myvalidation->data,$this->userauthentication->get_loggedin_userid());
							$this->user_model->update_password_request_code_after_change($this->userauthentication->get_loggedin_userid());
							$this->template->assign('message',$this->lang->line('update_password_success'));
							$this->template->assign('update_success','true');
							
							$this->phpsession->clear();
							
							$this->phpsession->save('display_error','yes');
							$this->phpsession->save('error_message',$this->lang->line('update_password_success'));
							redirect('user/login','refresh');
						}
					}
					
					
					$userdetails = $this->user_model->get_user_details($user_id);
					if($userdetails!=NULL)
						{
							$this->session->set_userdata("login",true);
            				$this->session->set_userdata("user_id",$userdetails[0]->id);
							$this->session->set_userdata("display_old_pass_field",'no');
							redirect('user/change_password','refresh');
							//$this->template->assign('old_password_from_link', "true");
						}
					
					//$this->template->assign('acocunt_head',$this->lang->line('user_settings'));	
					//$this->template->assign('header','layout/header_inner.tpl');
					//$this->template->assign('page','user/change_password.tpl');
					//$this->template->display('layout/layout.tpl');
				}
				else
				{
					$this->session->set_userdata('display_error','yes');
					$this->session->set_userdata('error_message',$this->lang->line('not_valid_link_for_cp'));
					redirect('user/login','refresh');
				}
			}
	}
}
?>