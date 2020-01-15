<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karma_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database('ci_crud');
        
    }


    public function insert_data($data){
        $this->db->insert('users', $data);
        
    }
    
    public function fetch_data(){
        $query = $this->db->get('users');
        return $query;
        
    }
    public function delete_row($id){
        $this->db->where('id', $id);   
        $this->db->delete('users');
           
       }
    public function edit_row($id){
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query;
        
        
    }
    public function update_data($data, $id){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        
    }

}

/* End of file Karma_model.php */
