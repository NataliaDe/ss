<?php

class Query_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_list($region, $status) {//список органов, где есть карточка и требует подтверждения
        if ($region != NULL) {
            $where = array(
                'region' => $region,
                'st' => $status
            );
        } else {
            $where = array(
                'st' => $status
            );
        }
        $this->db->select('*');
        $this->db->from('maintable');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_fio_work($action) {//список органов, где есть карточка и требует подтверждения
        $where = array(
            //'idCard' => $idCard,
            'id_action' => $action
        );

        $this->db->select('*');
        $this->db->from('informations');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function set_refuse($idRecord, $newstate, $tostate, $level) {

        $where = array(
            'id_record' => $idRecord,
            'level' => $level
        );

        $this->db->select('id');
        $this->db->from('mistakes');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {//обновляем описание ошибки
            if (($newstate == NULL) && ($tostate == NULL)) {
                $mistake = array(
                    'description' => $this->input->post('desc')
                );
            } else {
                $mistake = array(
                    'description' => $this->input->post('desc'),
                    'id_record' => $idRecord,
                    'tostate' => $tostate,
                    'level' => $level
                );
                $d = array(
                    'state' => $newstate
                );

                $this->db->where('id', $idRecord);
                $this->db->update('records', $d);
                //print_r($d);
            }
            //echo '1';
            // print_r($mistake);

            $this->db->where($where);
            $this->db->update('mistakes', $mistake);
        } else {//вносим описание ошибки

            if (($newstate == NULL) && ($tostate == NULL)) {//если запись была отклонена ранее, но ошибка не внеслась в mistakes
                /* $mistake = array(
                  'description' => $this->input->post('desc')
                  ); */

                $mistake = array(
                    'description' => $this->input->post('desc'),
                    'id_record' => $idRecord,
                    'tostate' => 0, //пока что вернуть в 0
                    'level' => $level
                );
            } else {
                $mistake = array(
                    'description' => $this->input->post('desc'),
                    'id_record' => $idRecord,
                    'tostate' => $tostate,
                    'level' => $level
                );
                $d = array(
                    'state' => $newstate
                );

                $this->db->where('id', $idRecord);
                $this->db->update('records', $d);
                //print_r($d);
            }

             $this->db->insert('mistakes', $mistake);

            //echo '2';
            //print_r($mistake);
        }
    }

    public function delete_action($action, $idCard) {//удалить  событие уровня
        $where = array(
            'id_action' => $action,
            'id_card' => $idCard
        );
        $this->db->where($where);
        $this->db->delete('informations');
    }

    public function delete_mistake($level, $mas) {//удалить ошибки уровня конкретной карточки
        /* $this->db->select('id');
          $this->db->from('records');
          $this->db->where('idLocOrg', $idCard);
          $query = $this->db->get();
          return $query->result(); */
        foreach ($mas as $row) {
            unset($where);
            $where = array(
                'level' => $level,
                'id_record' => $row->id_record
            );
            $this->db->where($where);
            $this->db->delete('mistakes');
        }

        // $this->db->where('level', $level);
    }

    public function delete_mistake_rec($level, $idRec) {//удалить ошибки уровня
        $where = array(
            'id_record' => $idRec,
            'level' => $level
        );
        $this->db->where($where);
        $this->db->delete('mistakes');
    }

    public function get_state($idCard) {
        if ($idCard == 160) {//ROSN
            //$this->db->select('*');
            // $this->db->from('recordrosn');
            $sql="SELECT rec.id AS id,rec.disloc AS disloc,org.id AS orgid,rec.state AS state FROM records AS rec
LEFT JOIN locorg AS locor ON rec.id_loc_org = locor.id LEFT JOIN organs AS org ON locor.id_organ = org.id WHERE org.id = ?";
           $query =  $this->db->query($sql,array(8));
           // $this->db->where('orgid', 8);
        } else {
            $this->db->select('*');
            $this->db->from('records');
            $this->db->where('id_loc_org', $idCard);
                 $query = $this->db->get();
        }

   
        return $query->result();
    }

    public function set_state($mas) {
        foreach ($mas as $row) {
            if ($row->state == 5) {
                //удаляем запись
                $tables = array('staff', 'technics', 'logs');
                $this->db->where('id_record', $row->id);
                $this->db->delete($tables);


                $this->db->where('id', $row->id);
                $this->db->delete('records');
            } else {
                //state=1
                $state = array(
                    'state' => 1
                );
                $this->db->where('id', $row->id);
                $this->db->update('records', $state);
            }
        }
    }

    public function get_auth($pssw) {
        $where = array(
            'pssw' => $pssw
        );

        $this->db->select('*');
        $this->db->from('radmins');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function set_inf($idCard, $action, $sign) {
        $today = date("Y-m-d H:i:s");

        if ($sign == 1) {//если ранее карточку брали в раб
            $where = array(
                'id_card' => $idCard,
                'id_action' => $action
            );
            $informations = array(
                'id_user' => $this->session->userdata('user_id'),
                'date' => $today,
                // 'idCard' => $idCard,
                'fio' => $this->session->userdata('fio'),
                // 'id_action' => $action,
                'id_admin' => $this->session->userdata('id_admin'),
            );
           $this->db->where($where);
            $this->db->update('informations', $informations);
//echo 'update';
        } else {
            $informations = array(
                'id_user' => $this->session->userdata('user_id'),
                'date' => $today,
                'id_card' => $idCard,
                'fio' => $this->session->userdata('fio'),
                'id_action' => $action,
                'id_admin' => $this->session->userdata('id_admin'),
            );

           $this->db->insert('informations', $informations);
//echo 'insert';
        }

        //print_r($mas);
        //print_r($informations);
    }

    public function get_yes($idCard, $adm, $action) {
        $where = array(
            'id_admin' => $adm,
            'id_card' => $idCard,
            'id_action' => $action
        );

        $this->db->select('*');
        $this->db->from('datefoot');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_work_fio($action) {
        $where = array(
            'id_action' => $action
        );

        $this->db->select('*');
        $this->db->from('informations');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function action_delete($action, $sign, $idCard) {//удалить дествие
        // проверить есть ли запись, если есть-delete, иначе - ничего
        $today = date("Y-m-d H:i:s");

        if ($sign == 1) {//если ранее карточку подт/откл РЦУ-удалить
            $where = array(
                'id_card' => $idCard,
                'id_action' => $action
            );
            $this->db->where($where);
            $this->db->delete('informations');
        }
        //print_r($informations);
        //return 1;
    }

}
