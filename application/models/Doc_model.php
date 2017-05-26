<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doc_model extends CI_Model {

    public $table = 'doc';
    public $id = 'id_doc';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all($id_partisipan = null) {
        $this->db->order_by($this->id, $this->order);
        if ($id_partisipan) {
            $this->db->where("doc.id_partisipan", $id_partisipan);
        }
        $this->db->join("partisipan", "partisipan.id_partisipan=doc.id_partisipan");
        $this->db->join("jenis_doc", "jenis_doc.id_jenis_doc=doc.id_jenis_doc");
        $this->db->join("company", "company.id_company=partisipan.id_company");
        $this->db->join("company_type", "company.id_company_type=company_type.id_company_type");
        $this->db->where("doc.is_deleted", 0);
        $this->db->where("jenis_doc.is_deleted", 0);
        $this->db->where("partisipan.is_deleted", 0);
        $this->db->where("company.is_deleted", 0);
        $this->db->where("company_type.is_deleted", 0);
        return $this->db->get($this->table)->result();
    }

    //search
    function get_search($nik = null, $nama = null, $id_company = null, $id_jenis_doc = null) {
        $this->db->order_by($this->id, $this->order);
        if ($nik) {
            $this->db->like("partisipan.nik", $nik);
        }
        if ($nama) {
            $this->db->like("partisipan.nama", $nama);
        }
        if ($id_company) {
            $this->db->where("partisipan.id_company", $id_company);
        }
        if ($id_jenis_doc) {
            $this->db->where("doc.id_jenis_doc", $id_jenis_doc);
        }
        $this->db->join("partisipan", "partisipan.id_partisipan=doc.id_partisipan");
        $this->db->join("jenis_doc", "jenis_doc.id_jenis_doc=doc.id_jenis_doc");
        $this->db->join("company", "company.id_company=partisipan.id_company");
        $this->db->join("company_type", "company.id_company_type=company_type.id_company_type");
        $this->db->where("doc.is_deleted", 0);
        $this->db->where("jenis_doc.is_deleted", 0);
        $this->db->where("partisipan.is_deleted", 0);
        $this->db->where("company.is_deleted", 0);
        $this->db->where("company_type.is_deleted", 0);
        return $this->db->get($this->table)->result();
    }

    // get all by jenis doc
    function get_all_by_jenis($id_jenis_doc = null) {
        $this->db->order_by($this->id, $this->order);
        if ($id_jenis_doc) {
            $this->db->where("doc.id_jenis_doc", $id_jenis_doc);
        }
        $this->db->join("partisipan", "partisipan.id_partisipan=doc.id_partisipan");
        $this->db->join("jenis_doc", "jenis_doc.id_jenis_doc=doc.id_jenis_doc");
        $this->db->join("company", "company.id_company=partisipan.id_company");
        $this->db->join("company_type", "company.id_company_type=company_type.id_company_type");
        $this->db->where("doc.is_deleted", 0);
        $this->db->where("jenis_doc.is_deleted", 0);
        $this->db->where("partisipan.is_deleted", 0);
        $this->db->where("company.is_deleted", 0);
        $this->db->where("company_type.is_deleted", 0);
        return $this->db->get($this->table)->result();
    }

    // get all by company
    function get_all_by_company($id_company = null) {
        $this->db->order_by($this->id, $this->order);
        if ($id_company) {
            $this->db->where("company.id_company", $id_company);
        }
        $this->db->join("partisipan", "partisipan.id_partisipan=doc.id_partisipan");
        $this->db->join("jenis_doc", "jenis_doc.id_jenis_doc=doc.id_jenis_doc");
        $this->db->join("company", "company.id_company=partisipan.id_company");
        $this->db->join("company_type", "company.id_company_type=company_type.id_company_type");
        $this->db->where("doc.is_deleted", 0);
        $this->db->where("jenis_doc.is_deleted", 0);
        $this->db->where("partisipan.is_deleted", 0);
        $this->db->where("company.is_deleted", 0);
        $this->db->where("company_type.is_deleted", 0);
        return $this->db->get($this->table)->result();
    }

    // get all by company_type
    function get_all_by_company_type($id_company_type = null) {
        $this->db->order_by($this->id, $this->order);
        if ($id_company_type) {
            $this->db->where("company.id_company_type", $id_company_type);
        }
        $this->db->join("partisipan", "partisipan.id_partisipan=doc.id_partisipan");
        $this->db->join("jenis_doc", "jenis_doc.id_jenis_doc=doc.id_jenis_doc");
        $this->db->join("company", "company.id_company=partisipan.id_company");
        $this->db->join("company_type", "company.id_company_type=company_type.id_company_type");
        $this->db->where("doc.is_deleted", 0);
        $this->db->where("jenis_doc.is_deleted", 0);
        $this->db->where("partisipan.is_deleted", 0);
        $this->db->where("company.is_deleted", 0);
        $this->db->where("company_type.is_deleted", 0);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        $this->db->join("partisipan", "partisipan.id_partisipan=doc.id_partisipan");
        $this->db->join("jenis_doc", "jenis_doc.id_jenis_doc=doc.id_jenis_doc");
        $this->db->where("doc.is_deleted", 0);
        $this->db->where("jenis_doc.is_deleted", 0);
        $this->db->where("partisipan.is_deleted", 0);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_doc', $q);
        $this->db->or_like('id_jenis_doc', $q);
        $this->db->or_like('id_partisipan', $q);
        $this->db->or_like('path', $q);
        $this->db->or_like('date', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('is_deleted', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_doc', $q);
        $this->db->or_like('id_jenis_doc', $q);
        $this->db->or_like('id_partisipan', $q);
        $this->db->or_like('path', $q);
        $this->db->or_like('date', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('is_deleted', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Doc_model.php */
/* Location: ./application/models/Doc_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-28 09:05:17 */
/* http://harviacode.com */