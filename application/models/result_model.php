<?php

class Result_model extends CI_Model {

    public function __construct() {

    }

    public function index() { //count all organs
        $this->db->select('*');
        $this->db->from('countorg');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_organs_name() {
        $this->db->select('*');
        $this->db->from('nameorg');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_date_today() {
        $today = date("d.m.Y");
        return $today;
    }

    public function get_count_divizions() {//без учета пасч, пасп ПАСО объекта
        $this->db->select('*');
        $this->db->from('pasp');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_count_all() {//без учета пасч, пасп ПАСО объекта
        $this->db->select('*');
        $this->db->from('paspall');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_paspobject() {//без учета пасч, пасп ПАСО объекта
        $this->db->select('*');
        $this->db->from('paspobject');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_rosnresult() {// области, где есть РОСН
        $this->db->select('*');
        //$this->db->from('rosnresult');
        $this->db->from('rosnview');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_cou_by_local()
    {
        $this->db->select('*');
        $this->db->from('cou_by_local');

        $query = $this->db->get();
        return $query->result();
    }
}
