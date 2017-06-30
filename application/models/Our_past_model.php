<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_past_model extends CI_Model
{

    public $table = 'our_past';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID', $q);
	$this->db->or_like('ID_CONTENT', $q);
	$this->db->or_like('JUDUL', $q);
	$this->db->or_like('OBJECTIVE', $q);
	$this->db->or_like('MARGIN_X', $q);
	$this->db->or_like('MARGIN_Y', $q);
	$this->db->or_like('LOCATION', $q);
	$this->db->or_like('SECTOR', $q);
	$this->db->or_like('BENEFICIARIES', $q);
	$this->db->or_like('VALUE', $q);
	$this->db->or_like('PARTNER', $q);
	$this->db->or_like('YEAR_AWARDED', $q);
	$this->db->or_like('YEAR_COMPLETED', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
	$this->db->or_like('ID_CONTENT', $q);
	$this->db->or_like('JUDUL', $q);
	$this->db->or_like('OBJECTIVE', $q);
	$this->db->or_like('MARGIN_X', $q);
	$this->db->or_like('MARGIN_Y', $q);
	$this->db->or_like('LOCATION', $q);
	$this->db->or_like('SECTOR', $q);
	$this->db->or_like('BENEFICIARIES', $q);
	$this->db->or_like('VALUE', $q);
	$this->db->or_like('PARTNER', $q);
	$this->db->or_like('YEAR_AWARDED', $q);
	$this->db->or_like('YEAR_COMPLETED', $q);
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

/* End of file Our_past_model.php */
/* Location: ./application/models/Our_past_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-28 06:58:23 */
/* http://harviacode.com */