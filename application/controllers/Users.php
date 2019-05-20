<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function register(){
        $data['title'] = "Sign Up";

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('pass','Password','required');
        $this->form_validation->set_rules('confirm_pass','Confirm Password','matches[pass]');


        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/register',$data);
            $this->load->view('templates/footer');
        }else{
            $enc_pass = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);
            $this->user_model->register($enc_pass);

            $this->session->set_flashdata('user_registered','You have registered sucessfully. LogIn using your Username and password.');
            redirect('blogs');
        }
    }



    public function login(){
        $data['title'] = "Sign In";

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('pass','Password','required');


        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/login',$data);
            $this->load->view('templates/footer');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('pass');

            $user_id  = $this->user_model->login($username,$password);
            print_r($user_id);

            if($user_id){
                $user_data = array(
                    'user_id'=>$user_id,
                    'username'=>$username,
                    'loggedIn'=>true
                );
                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('user_loggedin','Welcome');
                redirect('blogs');
            }else{
                $this->session->set_flashdata('user_loggProb','Something went wrong');
                redirect('users/login');
            }
            
            
        }
    }



    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('loggedIn');

        $this->session->set_flashdata('user_loggedout','You are logged Out');

        redirect('users/login');
    }


    // public function username_exists($username){
    //     $this->form_validation->set_message('check_username_exists','Username is already taken. Please use another username.');
    //     if($this->user_model->username_exists($username)){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}
?>