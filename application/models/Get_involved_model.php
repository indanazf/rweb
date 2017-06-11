<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Get_involved_model extends CI_Model
{

    public $table = 'content';
    public $id = 'ID_CONTENT';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
    // get all
    function get_all()
    {
        $this->db->select('content.*,content_category.*, content_type.*, updated_users.username as u_user, created_users.username as c_user');
        $this->db->from($this->table);
        $this->db->join('content_category', 'content_category.ID_CATEGORY = content.ID_CATEGORY','LEFT');
        $this->db->join('content_type', 'content_type.ID_TYPE = content.ID_TYPE','LEFT');
        $this->db->join('users AS updated_users', 'updated_users.ID = content.UPDATE_BY');
        $this->db->join('users AS created_users', 'created_users.ID = content.CREATED_BY');
        $this->db->join('menu', 'menu.id = content_category.ID_MENU');
        $this->db->where('menu.name', 'Get Involved');
        return $this->db->get()->result();
    }

    function get_by_category($category){
        $this->db->select('content.*');
        $this->db->from($this->table);
        $this->db->join('content_category', 'content_category.ID_CATEGORY = content.ID_CATEGORY');
        $this->db->join('menu', 'menu.id = content_category.ID_MENU');
        $this->db->where('menu.name', 'Get Involved');
        $this->db->where('content_category.CATEGORY', $category);
        return $this->db->get()->result();
    }

    function get_by_category_type($category=null, $type=null){
        $this->db->select('content.*');
        $this->db->from($this->table);
        $this->db->join('content_category', 'content_category.ID_CATEGORY = content.ID_CATEGORY');
        $this->db->join('menu', 'menu.id = content_category.ID_MENU');
        if($type != null){
            $this->db->join('content_type', 'content.ID_TYPE = content_type.ID_TYPE');
            $this->db->where('content_type.TYPE', $type);
        }else{
            $this->db->where('content.ID_TYPE', 0);
        }
        $this->db->where('menu.name', 'Get Involved');
        $this->db->where('content_category.CATEGORY', $category);
        return $this->db->get()->result();
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    


}
