<?php

class Auth_model extends CI_Model {

    public function __construct() {

    }

    public function get_user() {
        $where = array(
            'l' => $this->input->post('login'),
            'passw' => $this->input->post('password')
        );
        $this->db->select('*');
        $this->db->from('permissions');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row_array();
    }

}
