<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

    public function create($blog_id){
        $blog_slug = $this->input->post('blog_slug');
        $data['blog'] = $this->Blog_model->get_blogs($blog_slug);
        
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('body','Comment Body','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('blogs/view',$data);
            $this->load->view('templates/footer');
        }else{
            $this->comments_model->create_comment($blog_id);
            redirect('blogs/'.$blog_slug);
        }
    }

}
?>