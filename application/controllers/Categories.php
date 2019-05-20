<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function index(){
        $data['title'] = "Categories";
        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('categories/index',$data);
        $this->load->view('templates/footer');
    }

    public function create(){
        if(!$this->session->userdata('loggedIn')){
            redirect('users/login');
        }
        
        $data['title'] = "Create Categories";
        $this->form_validation->set_rules('name','Name','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('categories/create',$data);
            $this->load->view('templates/footer');
        }else{
            $this->category_model->create_category();
            redirect('categories');
        }   
    }

    public function blogs($cat_id){
        $data['title'] = "Blogs In   ".$this->category_model->get_category($cat_id)->cat_name;
        $data['blogs'] = $this->Blog_model->get_blogs_by_category($cat_id);

        $this->load->view('templates/header');
        $this->load->view('blogs/index',$data);
        $this->load->view('templates/footer');
    }

}
?>