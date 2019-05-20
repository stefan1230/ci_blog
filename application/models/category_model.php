<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category_model extends CI_Model {

	public function __construct(){
		$this->load->database();
    }

    public function create_category(){
        $data = array(
            'cat_name' => $this->input->post('name')
        );
        return $this->db->insert('category',$data);
    }

    public function get_categories(){
        $this->db->order_by('cat_name');
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function get_category($cat_id){
        $query = $this->db->get_where('category',array('cat_id'=>$cat_id));
        return $query->row();
    }
}
?>