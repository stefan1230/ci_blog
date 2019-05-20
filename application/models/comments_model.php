<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comments_model extends CI_Model {

	public function __construct(){
		$this->load->database();
    }

    public function create_comment($blog_id){
        $data = array(
            'blog_id'=>$blog_id,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'body' => $this->input->post('body'),
        );
        return $this->db->insert('comments',$data);
    }

    public function get_comments($blog_id){
        $query = $this->db->get_where('comments',array('blog_id'=>$blog_id));
        return $query->result_array();
    }
}
?>