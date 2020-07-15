<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function getBlogs($limit, $offset){
        $filter = $this->input->get('find');
        $this->db->like('title',$filter);
		$this->db->limit($limit, $offset);
        $this->db->order_by('date','desc');
        
        $query =  $this->db->get('blogs')->result_array();
        return $query; 
        
    }

    public function getSingleBlog($field, $value){
        $this->db->where($field, $url);
        $query =  $this->db->get('blogs')->row_array();
        return $query;
        
    }

    public function getCategories($value){
        $this->db->select(
            'blogs.*, category.id AS id_category, category.title_category');
            $this->db->join('category', 'blogs.id_category = category.id');
            $this->db->from('blogs');
            $this->db->where('title_category', $value);
            $query = $this->db->count_all_results();
            return $query;
    }

    public function getPopularpost(){
        $this->db->order_by('views', 'desc');
        $this->db->limit(3);
        $query = $this->db->get('blogs')->result_array();
        return $query;
    }

    public function getTotalComment($id){
        $this->db->select('blogs.id AS id_blog', 'blogs.writer', 'blogs.date', 'respons.*');
        $this->db->join('respons', 'respons.id_blog=blogs.id','LEFT');
        $this->db->from('blogs');
        $this->db->where('id_blog', $id);
        $this->db->count_all_results();
        return $this;
    }

    public function updateViews($id){
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('blogs');
        return $this;
    }
    
    public function insertBlog($data){
        $this->db->insert('blogs', $data);
        return $this->db->insert_id();
    }

    public function updateBlog($id, $data){
        $this->db->where('id', $id);
        $this->db->update('blogs', $data);
        return $this->db->affected_rows();
    }

    public function deleteBlog($id){
        $this->db->where('id', $id);
        $this->db->delete('blogs');
        return $this->db->affected_rows();
    }

    public function getTotalBlog(){
        $filter = $this->input->get('find');
        $this->db->like('title',$filter);
        return $this->db->count_all_results('blogs');
    }

    public function getValidationRules(){
        $rules = [
            [
              'field' =>  'title',
              'label' =>  'Judul',
              'rules' =>  'required|min_lenght[8]'
            ],

            [
              'field' =>  'content',
              'label' =>  'Deskripsi',
              'rules' =>  'required|min_lenght[250]'
            ],

            [
              'field' =>  'url',
              'label' =>  'URL',
              'rules' =>  'required|alpha_dash'
            ],

            [
              'field' =>  'writer',
              'label' =>  'Penulis',
              'rules' =>  'required|min_lenght[8]'
            ],

          ];

          return $rules;
    }

}

/* End of file Blog_model.php */