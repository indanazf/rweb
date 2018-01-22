<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Internship_position_model extends CI_Model
{

    public $table = 'internship_position';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->join("internship_type","internship_type.id=internship_position.id_type");
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id type
    function get_by_id_type($id)
    {
        if($id){
        $this->db->where('ID_TYPE', $id);
        }
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID', $q);
	$this->db->or_like('ID_TYPE', $q);
	$this->db->or_like('TITLE', $q);
	$this->db->or_like('DETAIL', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
	$this->db->or_like('ID_TYPE', $q);
	$this->db->or_like('TITLE', $q);
	$this->db->or_like('DETAIL', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Internship_position_model.php */
/* Location: ./application/models/Internship_position_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-12 06:10:37 */
/* http://harviacode.com */