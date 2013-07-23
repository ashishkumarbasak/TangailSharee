<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            echo form_open_multipart('welcome/doUpload');
            echo "<input type='file' name='my_file' />";
            echo "<input type='submit' name='submit' />";
            echo form_close();
	}
        
        
        
        function doUpload(){
            $image=new File();
            $image->file='my_file';
            $image->upload_path="images/my_images";
            $image->upload();

           echo $image->id;
        }
        
        function resize(){
            $image=new File(1);
            $image->width="75";
            $image->height="75";
            $image->new_image="images/my_images/new";
            $image_id=$image->resize();

           echo $image_id;
        }
        
         function crop(){
            $image=new File(1);
            $image->x_axis="20";
            $image->y_axis="100";
            $image->width="400";
            $image->height="400";
            $image->maintain_ratio=false;
            $image->new_image="images/my_images/new";
            $image_id=$image->crop();

           echo $image_id;
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */