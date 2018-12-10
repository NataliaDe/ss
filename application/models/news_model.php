<?php

class News_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function isset_records() {
        $where = array(
            'id_loc_org' => $this->session->userdata('locorg_id')
        );
        $this->db->select('*');
        $this->db->from('records');
        $this->db->where($where);
        $query = $this->db->get();
         return $query->result();
    }

    public function get_status() {

        $where = array(
            'id_card' => $this->session->userdata('locorg_id')
        );

        $this->db->select('*');
        $this->db->from('statuscards');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    //заполнен ли номерной знак в карточке
    public function is_numbsign() {
          $where = array(
            'id_card' => $this->session->userdata('locorg_id'),
              'numbsign'=>NULL
        );
          
        $this->db->from('card');
        $this->db->where($where);
        return $this->db->count_all_results();
//        $query = $this->db->get();
//        return $query->result();
        
    }

}
