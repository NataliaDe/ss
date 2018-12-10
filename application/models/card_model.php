<?php

class Card_model extends CI_Model {

    public function __construct() {

    }

    public function get_recordid($region) {//выбор id записей области как ключей
        if ($region == NULL) {//по РБ
            $this->db->distinct();
            $this->db->select('id_record');
            $this->db->from('card');
            $query = $this->db->get();
        } else {
            $where = array(
                'region' => $region
            );
            $this->db->distinct();
            $this->db->select('id_record');
            $this->db->from('card');
            $this->db->where($where);
            $query = $this->db->get();
        }

        return $query->result();
    }

    public function get_card($region) {
        if ($region == NULL) {//по РБ
            $this->db->select('*');
            $this->db->from('card');
            $query = $this->db->get();
        } else {
            $where = array(
                'region' => $region
            );
            $this->db->select('*');
            $this->db->from('card');
            $this->db->where($where);
            $query = $this->db->get();
        }

        return $query->result();
    }

    public function caption_region($who) {
        $where = array(
            'region' => $who
        );
        $this->db->select('head');
        $this->db->from('caption');
        $this->db->where($where);
        $this->db->where('orgid !=', 8); //в карточку Минского ГУМЧС не выводить записи РОСН
        $query = $this->db->get();
        return $query->result();
    }

    public function date_caption($who) {//дата заголовка карточки
        $where = array(
            'region' => $who
        );
        $this->db->select('dat');
        $this->db->from('datecaption');
        $this->db->where($where);
        $this->db->order_by('datte', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function who_refuse() {//кто отклонил карточку(РЦУ или УМЧС)
        $this->db->select('*');
        $this->db->from('whorefuse');

        //$this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    
    //кто в РЦУ взял в работу карточку, если она в работе в РЦУ
   /* public function get_action_in_work($idCard) {
        
          
            $id_card = $idCard;
             $id_action=8;
             $status=1;
             $work=1;
       
            $query = $this->db->query("SELECT date_format(a.`date`,'%d.%m.%Y') AS date , a.`fio`, a.`id_action`, a.`id_card`, s.`status`, s.`work`  FROM allactions AS a INNER JOIN statuscards AS s
                ON a.`id_card`=s.`id_card` WHERE a.id_action=".$id_action." AND a.`id_card`=".$id_card." AND s.`status`=".$status." AND s.`work`=".$work. 
  " ORDER BY a.`date` DESC LIMIT 1");
       
        return $query->result();
    }*/

}
