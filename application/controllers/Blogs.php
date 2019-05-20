<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

        public function index($offset = 0){
                $config['base_url'] = base_url().'blogs/index';
                $config['total_rows'] = $this->db->count_all('blog');
                $config['per_page'] = 3;
                $config["uri_segment"] = 3;//blogs/index/"uri_segment".
                $config['attributes'] = array('class' => 'pagination-links');

                $this->pagination->initialize($config);

                $data['title'] = "Latest Blogs";
                $data['blogs'] = $this->Blog_model->get_blogs(FALSE,$config['per_page'],$offset);

                
                $this->load->view('templates/header');
                $this->load->view('blogs/index',$data);
                $this->load->view('templates/footer');

        }
        

        public function view($blog_slug = NULL){

                $data['blog'] = $this->Blog_model->get_blogs($blog_slug);

                $blog_id = $data['blog']['blog_id'];

                $data['comments'] = $this->comments_model->get_comments($blog_id);

                if(empty($data['blog'])){
                        show_404();
                }

                $data['title'] = $data['blog']['title'];
                
                $this->load->view('templates/header');
                $this->load->view('blogs/view',$data);
                $this->load->view('templates/footer');

        }
        
        public function create(){
                if(!$this->session->userdata('loggedIn')){
                        redirect('users/login');
                }

                $data['title'] = "Create blog ";

                $data['categories'] = $this->Blog_model->get_categories();

                $this->form_validation->set_rules('title','Title','required');
                $this->form_validation->set_rules('body','Blog Body','required');

                if($this->form_validation->run() == FALSE){
                        $this->load->view('templates/header');
                        $this->load->view('blogs/create',$data);
                        $this->load->view('templates/footer');
                }else{
                        $config['upload_path'] = './assets/images/blogs';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '2048';
                        $config['max_width'] = '3000';
                        $config['max_height'] = '3000';

                        $this->load->library('upload',$config);

                        if(!$this->upload->do_upload()){
                                $error = array('error'=>$this->upload->display_errors());
                                $blog_image = 'noimage.png';
                        }else{
                                $data = array('upload_data'=>$this->upload->data());
                                $blog_image = $_FILES['userfile']['name'];
                        }


                        $this->Blog_model->create_blog($blog_image);
                        $this->session->set_flashdata('blog_created','Your blog has been created successfully');
                        redirect('blogs');
                }    
        }
        
        public function delete($blog_id){
                if(!$this->session->userdata('loggedIn')){
                        redirect('users/login');
                }
                $this->Blog_model->delete_blog($blog_id);
                redirect('blogs');
        }


        public function edit($blog_slug){
                if(!$this->session->userdata('loggedIn')){
                        redirect('users/login');
                }
                $data['title'] = "Edit blog ";

                $data['blog'] = $this->Blog_model->get_blogs($blog_slug);

                if($this->session->userdata('user_id') != $this->Blog_model->get_blogs($blog_slug)['author_id']){
                        redirect('blogs');
                }

                $data['categories'] = $this->Blog_model->get_categories();

                if(empty($data['blog'])){
                        show_404();
                }
                
                $this->load->view('templates/header');
                $this->load->view('blogs/edit',$data);
                $this->load->view('templates/footer');
        }

        public function update(){
                if(!$this->session->userdata('loggedIn')){
                        redirect('users/login');
                }
                $this->Blog_model->update_blog();
                redirect('blogs');
        }

}
