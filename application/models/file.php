<?php
class File extends DataMapper {

    var $prefix = "tbl_";
    var $table  = "files";

    var $CI = NULL;

    var $original_width     = NULL;
    var $original_height    = NULL;
    
    var $upload_path        = NULL;
    var $file               = NULL;
    var $allowed_types      = array('jpg','png','jpeg','gif');
    var $overwrite          = FALSE;
    var $max_size           = '2048';
    var $max_width          = 0;
    var $max_height         = 0;
    
    var $source_image       = NULL;
    var $create_thumb       = FALSE;
    var $maintain_ratio     = TRUE;
    var $width              = NULL;
    var $height             = NULL;
    var $new_image          = NULL;
    
    var $x_axis             = NULL;
    var $y_axis             = NULL;
    
    var $has_many = array(
        'profile' => array(
            'class'         => 'user',
            'other_field'   => 'image',
            'join_table'    => 'tbl_user_file'
        )
    );

    var $has_one=array(
        'user' => array(
            'class'         => 'user',
            'other_field'   => 'file',
            'join_table'    => 'tbl_user_file'
        ),
        'product' => array(
            'class'         => 'product',
            'other_field'   => 'file',
            'join_table'    => 'tbl_product_file'
        ),
        'project' => array(
            'class'         => 'project',
            'other_field'   => 'file',
            'join_table'    => 'tbl_project_file'
        ),
        'upcoming_design' => array(
            'class'         => 'upcoming_design',
            'other_field'   => 'file',
            'join_table'    => 'tbl_upcoming_design_file'
        ),
        'banner' => array(
            'class'         => 'banner',
            'other_field'   => 'file',
            'join_table'    => 'tbl_banner_file'
        ),
        'graphic'
    );

    var $validation = array(
        'filename' => array(
            'label' => 'File',
            'rules' => array('required'),
        )
    );

    function __construct($id = NULL) {
        parent::__construct($id);
        $this->CI =& get_instance();
    }

    function upload() {
        $config =  $this->getUploadConfig();
        $this->CI->upload->initialize($config);

        if(!$this->CI->upload->do_upload($this->file)){
            throw new Exception($this->CI->upload->display_errors());
        }

        $image_data             = $this->CI->upload->data();

        $this->original_height  = $image_data['image_height'];
        $this->original_width   = $image_data['image_width'];

        $this->filetype         = $image_data['file_type'];
        $this->filename         = $image_data['file_name'];
        $this->filesize         = $image_data['file_size'];
        $this->filepath         = str_replace(FCPATH, "", $image_data['full_path']);
        $this->status           = 1;
        $this->timestamp        = time();
        $this->save();
    }

    function getUploadConfig() {
        $config = array(
            'upload_path'   => FCPATH.$this->upload_path,
            'overwrite'     => $this->overwrite,
            'max_size'      => $this->max_size,
            'max_width'     => $this->max_width,
            'max_height'    => $this->max_height
        );

        $allowed=NULL;
        foreach($this->allowed_types as $type) {
            $allowed.=$type."|";
        }

        if($allowed!='') {
            $allowed = substr($allowed, 0, strlen($allowed)-1);
        }

        $config['allowed_types']=$allowed;
        return $config;
    }

    function resize() {
        $config = $this->getResizeConfig();
        $this->CI->image_lib->clear();
        $this->CI->image_lib->initialize($config);

        if(!$this->CI->image_lib->resize()) {
            throw new Exception($this->CI->image_lib->display_errors());
        }

        if($this->new_image!=NULL|| $this->create_thumb==TRUE) {
            $new_file               = new File();
            $new_file->filetype     = $this->filetype;
            $new_file->filename     = $this->filename;
            $new_file->filesize     = 0;
            $new_file->filepath     = $this->new_image."/".$this->filename;
            $new_file->status       = 1;
            $new_file->timestamp    = time();
            return $new_file;
        }
        else {
            $this->timestamp=time();
            return $this;
        }
    }

    function getResizeConfig() {
        $config=array(
            'image_library'     => "GD2",
            'source_image'      =>  FCPATH.$this->filepath,
            'maintain_ratio'    =>  $this->maintain_ratio,
            'width'             =>  $this->width,
            'height'            =>  $this->height
        );

        if($this->new_image!=NULL)
            $config['new_image'] = FCPATH.$this->new_image;

        return $config;
    }

    function crop() {
        $config=  $this->getCropConfig();
        $this->CI->image_lib->clear();
        $this->CI->image_lib->initialize($config);

        if(!$this->CI->image_lib->crop()) {
            throw new Exception($this->CI->image_lib->display_errors());
        }
        $this->CI->image_lib->clear();

        if($this->new_image!=NULL|| $this->create_thumb==TRUE) {
            $new_file               = new File();
            $new_file->filetype     = $this->filetype;
            $new_file->filename     = $this->filename;
            $new_file->filesize     = 0;
            $new_file->filepath     = $this->new_image."/".$this->filename;
            $new_file->status       = 1;
            $new_file->timestamp    = time();
            
            return $new_file;
        }
        else {
            $this->timestamp=time();
            return $this;
        }
    }

    function getCropConfig() {
        $config=array(
            'image_library'     => 'GD2',
            'x_axis'            => $this->x_axis,
            'y_axis'            => $this->y_axis,
            'width'             => $this->width,
            'height'            => $this->height,
            'maintain_ratio'    => $this->maintain_ratio,
            'source_image'      => FCPATH.$this->filepath,
        );

        if($this->new_image!=NULL)
            $config['new_image']=FCPATH.$this->new_image;

        return $config;
    }
}