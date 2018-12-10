<?php

class Remove_model extends CI_Model {

    public function __construct() {

    }

    public function get_record($idRec) {

        $where = array(
            'id_record' => $idRec
        );
        $this->db->select('*');
        $this->db->from('card');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_record($status) {//удалить запись
        if ($status != NULL) {
            foreach ($status as $row) {
                $status = $row->status;
            }
        }

        if (($status == 0) || ($status == 2) || (empty($status)) || ($status == NULL)) {//удалить
            $tables = array('staff', 'technics', 'logs', 'mistakes');
            $this->db->where('id_record', $this->input->post('idRecord'));
            $this->db->delete($tables);




            $this->db->where('id', $this->input->post('idRecord'));
            $this->db->delete('records');
            return 1;
        } else {

            $state = array(
                'state' => 5
            );
            $this->db->where('id', $this->input->post('idRecord'));
            $this->db->update('records', $state);
            return 2;
        }
    }

}
