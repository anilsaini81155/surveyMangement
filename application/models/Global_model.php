<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Global_model extends CI_Model {

    function select_single($select, $where, $table) {
        if (!empty($select)) {
            $this->db->select($select);
        }

        if (!empty($where)) {
            $this->db->where($where);
        }

        return $this->db->get($table)->row_array();
    }

    function select_multiple($select, $where, $table, $order = '') {
        if (!empty($select)) {
            $this->db->select($select);
        }

        if (!empty($where)) {
            $this->db->where($where);
        }

        if ($order) {
            $this->db->order_by($order);
        }

        return $this->db->get($table)->result_array();
    }

    function insert($data, $table, $returnId = FALSE) {
        if ($returnId === TRUE) {
            $this->db->insert($table, $data);
//            $this->db->insert($table, $data, FALSE);
            return $this->db->insert_id();
        } else {
            return $this->db->insert($table, $data);
        }
    }

    function insert_batch($data, $table) {
        return $this->db->insert_batch($table, $data);
    }

    function update($data, $where, $table) {
        if (is_array($where)) {
            $this->db->where($where);
        } else {
            $this->db->where($where, NULL, FALSE);  // check if where clause is sent as a string for e.g where a = 'b' or c = 'd'
        }

        return $this->db->update($table, $data);
    }

    function update_batch($data, $table, $col) {
        return $this->db->update_batch($table, $data, $col);
    }

    function delete($where, $table) {
        $this->db->where($where);
        return $this->db->delete($table);
    }

}
