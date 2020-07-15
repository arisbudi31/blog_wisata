<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function getCategories($value){
        $this->db->where('title', $value);
        $query = $this->db->count_all_results('category');
        return $query;
    }

    public function getContent(){
        
    }

}

/* End of file Category_model.php */