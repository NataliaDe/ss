<?php

class Tables_model extends CI_Model {

    public function __construct() {

    }

    public function index() { //count all organs
        $this->db->select('*');
        $this->db->from('countorg');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_radmins($id) { //radmins table
        $this->db->select('*');
        $this->db->from('radmins');

        if ($id != NULL) {
            $where = array(
                'id_admin' => $id
            );
            $this->db->where($where);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function get_radmin_region($id) { //radmins table
        $this->db->select('radmin_region.id, regions.name, radmins.fio, radmins.id_admin');
        $this->db->from('radmin_region left join radmins on radmin_region.id_admin=radmins.id_admin left join regions on radmin_region.id_region=regions.id');

        if ($id != NULL) {
            $where = array(
                'radmin_region.id' => $id
            );
            $this->db->where($where);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function set_radmins($id, $fio, $psw) { //radmins table
        if ($id == NULL) {
            $data = array(
                'fio' => $fio,
                'pssw' => $psw
            );
            $this->db->insert('radmins', $data);
          // var_dump($this->db);
        } else {

            $where = array(
                'id_admin' => $id
            );

            $data = array(
                'fio' => $fio,
                'pssw' => $psw
            );

            $this->db->where($where);
            $this->db->update('radmins', $data);
        }
    }

    public function check_radmins($id, $psw, $fio) {

        $this->db->select('*');
        $this->db->from('radmins');
        if ($id == NULL) {
            $this->db->where('pssw = ', $psw);
            $this->db->where('fio = ', $fio);
            $this->db->or_where('pssw = ', $psw);
            $this->db->or_where('fio = ', $fio);
        } else {



            $this->db->where('id_admin != ', $id);
            $this->db->where('pssw = ', $psw);
            $this->db->or_where('fio = ', $fio);
            $this->db->where('id_admin != ', $id);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function check_radmins_delete() {
        $this->db->select('id_admin');
        $this->db->from('radmin_region');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_radmins($id) {
        $this->db->where('id_admin', $id);
        $this->db->delete('radmins');
    }

    public function check_radmin_region($region, $fio) {

        $this->db->select('*');
        $this->db->from('radmin_region');

        $this->db->where('id_admin = ', $fio);
        $this->db->where('id_region = ', $region);


        $query = $this->db->get();
        return $query->result();
    }

    public function set_radmin_region($id, $fio) { //radmin_region table
        $where = array(
            'id' => $id
        );

        $data = array(
            'id_admin' => $fio
        );

        $this->db->where($where);
        $this->db->update('radmin_region', $data);
    }

    public function get_users() {

        $this->db->select('*');
        $this->db->from('permissions');

        $query = $this->db->get();
        return $query->result();
    }

}
