<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function __construct(){
		$this->load->database();
    }
    
    public function get_blogs($blog_slug = FALSE , $limit = FALSE , $offset = FALSE){
        if($limit){
            $this->db->limit($limit,$offset);
        }//limit pagination view

        if($blog_slug == FALSE){
            $this->db->order_by('blog.blog_id',"DESC");
            $this->db->join('category','category.cat_id = blog.category_id');
            $query = $this->db->get('blog');
            return $query->result_array();
        }

        $query = $this->db->get_where('blog',array('blog_slug'=>$blog_slug));
        return $query->row_array();
    }

    public function create_blog($blog_image){
        $blog_slug = $this->generate_url_slug($this->input->post('title'),'blog');

        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('body'),
            'blog_slug' => $blog_slug,
            'category_id' => $this->input->post('categories'),
            'author_id'=>$this->session->userdata('user_id'),
            'blog_image'=>$blog_image
        );

        return $this->db->insert('blog',$data);
    }

    public function delete_blog($blog_id){
        $this->db->where('blog_id',$blog_id);
        $this->db->delete('blog');
        return true;
    }

    public function update_blog(){
        $blog_slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('body'),            
            'category_id' => $this->input->post('categories'),
            'blog_slug' => $blog_slug
        );

        $this->db->where('blog_id',$this->input->post('blog_id'));
        return $this->db->update('blog',$data);
    }

    //fucntion to create Unique slugs for a blog.
    function generate_url_slug($string,$table,$field='blog_slug',$key=NULL,$value=NULL){
        $t =& get_instance();
        $slug = url_title($string);
        //$slug = strtolower($slug);
        $i = 0;
        $params = array ();
        $params[$field] = $slug;
     
        if($key)$params["$key !="] = $value; 
     
        while ($t->db->where($params)->get($table)->num_rows())
        {   
            if (!preg_match ('/-{1}[0-9]+$/', $slug ))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
             
            $params [$field] = $slug;
        }   
        return $slug;   
    }


    public function get_categories(){
        $this->db->order_by('cat_name');
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function get_blogs_by_category($cat_id){
        $this->db->order_by('blog.blog_id',"DESC");
        $this->db->join('category','category.cat_id = blog.category_id');
        $query = $this->db->get_where('blog',array('cat_id'=>$cat_id));
        return $query->result_array();
    }
}
