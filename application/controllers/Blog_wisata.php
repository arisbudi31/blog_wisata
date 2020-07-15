<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_wisata extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Blog_model');
        $this->load->model('Category_model');
    }
    

    public function index($offset = 0)
    {
        $this->load->library('pagination');
        $config['base_url'] = site_url('blog_wisata/index');
        $config['total_rows'] = $this->Blog_model->getTotalBlog();
        $config['per_page'] = 3;
        $this->pagination->initialize($config);
        
        $data['content'] = $this->Blog_model->getBlogs($config['per_page'], $offset);
        $post_id = 1;
        $data['total_comments'] = (object) $this->Blog_model->getTotalComment($post_id);
        
       // $data['wisata'] = $this->Blog_model->getCategories('wisata');
       // $data['kuliner'] = $this->Blog_model->getCategories('kuliner');
       // $data['fashion'] = $this->Blog_model->getCategories('fashion');
       $data['kategori'] = [
           'Wisata' => $this->Blog_model->getCategories('wisata'), 
           'Kuliner' => $this->Blog_model->getCategories('kuliner'),
           'Penginapan' => $this->Blog_model->getCategories('penginapan')
       ];

       $data['populer'] = $this->Blog_model->getPopularpost();
        
        $this->load->view('home/index', $data);
    }

    public function add(){
        if($this->input->post()){
            $validation_rules = $this->blog_model->getValidationRules();
            $this->form_validation->set_rules($validation_rules);
            if($this->form_validation->run()===TRUE){
                $data['title'] = $this->input->post('title');
                $data['content'] = $this->input->post('content');
                $data['url'] = $this->input->post('url');
                //upload file
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 1000;
                $config['max_width'] = 2000;
                $config['max_height'] = 1600;
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('cover')){
                    echo $this->upload->display_errors();
                }
                else{
                    $data['cover'] = $this->upload->data('file_name');
                }
                $id=$this->Blog_model->insertBlog($data);
                if ($id) {
                    # code...
                    $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil disimpan</div>');
                    //redirect('/','refresh');
                }
                else{
                    $this->session->set_flashdata('message','<div class="alert alert-warning">Data gagal disimpan</div>');
                    //redirect('/','refresh');
                }
                redirect('/');
            }
        }
        $this->load->view('form_add');
    }

    public function editBlog($id){
        $data['blogs'] = $this->blog_model->getSingleBlog('id',$id);
        if($this->input->post()){
            $validation_rules = $this->blog_model->getValidationRules();
            $this->form_validation->set_rules($validation_rules);
            if($this->form_validation->run()===TRUE){
                $post['title'] = $this->input->post('title');
                $post['content'] = $this->input->post('content');
                $post['url'] = $this->input->post('url');
                //upload file
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 1000;
                $config['max_width'] = 2000;
                $config['max_height'] = 1600;
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('cover')){
                    echo $this->upload->display_errors();
                }
                else{
                    $post['cover'] = $this->upload->data('file_name');
                }
                $id=$this->Blog_model->insertBlog($data);
                if ($id) {
                    # code...
                    $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil disimpan</div>');
                    //redirect('/','refresh');
                }
                else{
                    $this->session->set_flashdata('message','<div class="alert alert-warning">Data gagal disimpan</div>');
                    //redirect('/','refresh');
                }
                redirect('/');
            }
        }
    }

    public function deleteBlog($id){
        $result = $this->blog_model->deleteBlog($id);
        if($result){
            $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus</div>');
						//redirect('/');
			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-warning">Data gagal dihapus</div>');
			}
			redirect('/');
    }

    public function detail($url){
        $data['detail'] = $this->Blog_model->getSingleBlog('url', $url);
        if($data['detail']){
            $this->blog_model->updateViews($data['detail']->id);
        }

        $this->load->view('artikel/detail', $data);
    }

    public function login(){
        if($this->input->post()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if($username=='admin'&&$password=='admin'){
                $_SESSION['username'] = 'admin';
                redirect('/'); 
            }
            else{
                $this->session->set_flashdata('message','<div class="alert alert-warning">Username atau password tidak valid</div>');
                redirect('blog/login');
            }
        }
        $this->load->view('login');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }

}

/* End of file Blog_wisata.php */