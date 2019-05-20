<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

	public function __construct(){
		$this->load->database();
    }

    public function register($enc_pass){
        $data = array(
            'name'=>$this->input->post('name'),
            'username'=>$this->input->post('username'),
            'email'=>$this->input->post('email'),
            'password'=>$enc_pass
        );

        return $this->db->insert('users',$data);
    }

    public function login($username,$password){
        $username = $this->db->where('username',$username);
        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            $row = $result->row();
            if (password_verify($password, $row->password)){
                return $result->row(0)->user_id;
            }
        }else{
            return false;
        }

        // $pass = $this->db->where('password',$password);
        // $pass = password_verify($password, $pass);

        


    }

    // public function username_exists($username){
    //     $query = $this->db->get_where('users',array('username'=>$username));
    //     if(empty($query->row_array())){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}

?>