<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_Us_model extends CI_Model
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
        $this->db->where('menu.name', 'About Us');
        return $this->db->get()->result();
    }


    function get_by_category($category){
        $this->db->select('content.*');
        $this->db->from($this->table);
        $this->db->join('content_category', 'content_category.ID_CATEGORY = content.ID_CATEGORY');
        $this->db->join('menu', 'menu.id = content_category.ID_MENU');
        $this->db->where('menu.name', 'About Us');
        $this->db->where('content_category.CATEGORY', $category);
        return $this->db->get()->result();
    }

    function get_by_category_type($category, $type=null){
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
        $this->db->where('menu.name', 'About Us');
        $this->db->where('content_category.CATEGORY', $category);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID_CONTENT', $q);
	$this->db->or_like('ID_TYPE', $q);
	$this->db->or_like('ID_CATEGORY', $q);
	$this->db->or_like('SUBJECT', $q);
	$this->db->or_like('CONTENT', $q);
	$this->db->or_like('CONTENT_NUMMBER', $q);
	$this->db->or_like('TAGS', $q);
	$this->db->or_like('CREATED_BY', $q);
	$this->db->or_like('CREATED_DATE', $q);
	$this->db->or_like('UPDATE_BY', $q);
	$this->db->or_like('LAST_UPDATE', $q);
	$this->db->or_like('ICON_TYPE', $q);
	$this->db->or_like('IMG', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_CONTENT', $q);
	$this->db->or_like('ID_TYPE', $q);
	$this->db->or_like('ID_CATEGORY', $q);
	$this->db->or_like('SUBJECT', $q);
	$this->db->or_like('CONTENT', $q);
	$this->db->or_like('CONTENT_NUMMBER', $q);
	$this->db->or_like('TAGS', $q);
	$this->db->or_like('CREATED_BY', $q);
	$this->db->or_like('CREATED_DATE', $q);
	$this->db->or_like('UPDATE_BY', $q);
	$this->db->or_like('LAST_UPDATE', $q);
	$this->db->or_like('ICON_TYPE', $q);
	$this->db->or_like('IMG', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }


    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }


}
