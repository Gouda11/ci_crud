<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karma extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('karma_model');
        $this->load->library('form_validation');
        
        
    }
	public function index()
	{
        $data['title'] = 'CRUD OPERATION';
       $data['fetch_data'] = $this->karma_model->fetch_data();
        $this->load->view('karma', $data);
	}


public function add_user(){
    $this->form_validation->set_rules('add_name', 'enter name', 'trim|required');
    $this->form_validation->set_rules('add_email', 'enter email', 'trim|required');
    $this->form_validation->set_rules('add_date', 'select date', 'trim|required');
    $this->form_validation->set_rules('add_address', 'enter address', 'trim|required');
   
    if ($this->form_validation->run())
     {

         $data=array(
            'name'    =>$this->input->post('add_name'),
            "email"   =>$this->input->post('add_email'),
            "date"    =>$this->input->post('add_date'),
            "address" =>$this->input->post('add_address')
        
        );

        if($this->input->post("update")){
            $this->karma_model->update_data($data, $this->input->post('hidden_id'));
            
            redirect(base_url() . 'karma/updated','refresh');
            
        }
        if($this->input->post("insert")){
            $this->karma_model->insert_data($data);
            redirect(base_url() . 'karma/inserted','refresh');        
        
        }
        
    } else {
        
    $this->index();        
      }
  }
  public function inserted(){
    $this->index();
    
  }
  public function delete_data(){
      $id = $this->uri->segment(3);
      $this->karma_model->delete_row($id); 
      $this->index();
}
   
public  function update_data(){
    $user_id = $this->uri->segment(3);
    $data["user_data"] = $this->karma_model->edit_row($user_id);
    $data['fetch_data'] = $this->karma_model->fetch_data();
    $data['title'] = 'CRUD OPERATION';

    $this->load->view('karma', $data);
       
}

public function updated(){
    $this->index();
}

}