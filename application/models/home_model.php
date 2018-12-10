<?php

class Home_model extends CI_Model {

    public function __construct() {

    }

    public function get_maintable() {

        $this->db->select('*');
        $this->db->from('maintable');
        $query = $this->db->get();
        return $query->result();
    }

//    public function get_count_div($main, $diviz) {//количество подразделений органа
//        foreach ($main as $row) {
//            foreach ($diviz as $myrow) {
//                // $mas[$row->idCard][$myrow->name]= $this->db->call_function ('countDiv',$row->idCard,$myrow->id);
//
//                $where = array(
//                    'id_card' => $row->id_card,
//                    'id_div' => $myrow->id
//                );
//
//                $this->db->where($where);
//                $this->db->from('maindata');
//                $query = $this->db->count_all_results();
//
//                // $query = $this->db->get();
//                $mas[$row->id_card][$myrow->name] = $query;
//            }
//        }
//        //print_r($mas);
//        return $mas;
//    }

    public function get_date($main) {//дата последнего действия
   
        foreach ($main as $myrow) {

            $idCard = $myrow->id_card;

            // echo   $idCard;

            $where = array(
                'id_card' => $idCard
            );

            $this->db->select('dat');
            $this->db->from('datecaption');
            $this->db->where($where);
            $this->db->order_by('datte', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                foreach ($query->result()as $row) {
                    $mas[$myrow->id_card] = $row->dat;
                }
            } else
                $mas[0] = 0;

        }
       
       // print_r($mas);
        return $mas;
    }
    // id тех карточек, у кого не заполнены  номерные знаки
    public function is_numbsign() {
              $where = array(
              'numbsign'=>NULL
        );
          $this->db->select('id_card');
        $this->db->from('card');
        $this->db->where($where);
        $query = $this->db->get();
        
        if(!empty($query->result())){
            foreach ($query->result() as $row) {
            $is_numbsign[]=$row->id_card;
        } 
        }
        else{
         $is_numbsign=array();   
        }
       
      
        return array_unique($is_numbsign);
    }

}
