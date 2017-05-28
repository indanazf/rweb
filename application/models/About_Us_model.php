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
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('content_category', 'content_category.ID_CATEGORY = content.ID_CATEGORY');
        $this->db->where('content_category.ID_MENU', 24);
        return $this->db->get()->result();
    }

    function get_slider(){
        $this->db->select('content.*');
        $this->db->from($this->table);
        $this->db->join('content_category', 'content_category.ID_CATEGORY = content.ID_CATEGORY');
        $this->db->join('menu', 'menu.id = content_category.ID_MENU');
        $this->db->where('menu.name', 'About Us');
        $this->db->where('content_category.CATEGORY', 'slider_image');
        return $this->db->get()->result();
    }

    function get_introducing(){
        $this->db->select('content.*');
        $this->db->from($this->table);
        $this->db->join('content_category', 'content_category.ID_CATEGORY = content.ID_CATEGORY');
        $this->db->join('menu', 'menu.id = content_category.ID_MENU');
        $this->db->where('menu.name', 'About Us');
        $this->db->where('content_category.CATEGORY', 'introducing');
        return $this->db->get()->result();
    }

    function get_vision(){
        $this->db->select('content.*');
        $this->db->from($this->table);
        $this->db->join('content_category', 'content_category.ID_CATEGORY = content.ID_CATEGORY');
        $this->db->join('menu', 'menu.id = content_category.ID_MENU');
        $this->db->where('menu.name', 'About Us');
        $this->db->where('content_category.CATEGORY', 'vision');
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
