<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Category_model');
    }
    

    public function index()
    {
        $data['judul'] = $this->Category_model->getCategories('wisata');
       $this->load->view('support/sidebar', $data);

       return $this;
    }

}

/* End of file Category.php */