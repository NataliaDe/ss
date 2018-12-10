<?php

class Fill_model extends CI_Model {

    public function __construct() {

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

    public function get_divizionName() {

        if ($this->session->userdata('orgid') == 8) {//РОСН
            $where = "id =4 OR id=8";
        } elseif ($this->session->userdata('orgid') == 6) {//PASO области может иметь ПАСО или ЦОУ
          $where = "id = 1 OR id=8 ";
        }
        elseif(($this->session->userdata('orgid') == 9) ){//УГЗ, ИППК,ГИИ может выбрать только УПАСЧ
             $where = array(
                'id' => 5
            );
        }
           elseif($this->session->userdata('orgid') == 12){//Авиация может выбрать только ЧОП
             $where = array(
                'id' => 6
            );
        }
          elseif($this->session->userdata('orgid') == 13){//ПТЦ может выбрать только ПТЦ
             $where = array(
                'id' => 7
            );
        }
       elseif($this->session->userdata('orgid') == 4){//УМЧС имеет только ЦОУ на уровне УМЧС
               $where = array(
                'id' => 8
            );
        }
        else {

            $where = "id =2 OR id =3 OR id=8 OR id=9";
        }
        //$query = $this->db->get('divizions');
        $this->db->select('*');
        $this->db->from('divizions');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_types() {
        $query = $this->db->get('types');
        return $query->result();
    }

    public function get_views() {
        $this->db->order_by("name", "asc");
        $query = $this->db->get('views');
        return $query->result();
    }

    public function get_rosnview() {
        $query = $this->db->get('rosnview');
        return $query->result();
    }

    public function insert($state, $action) {
        //------------------- если авторизован РОСН, idLocOrg=выбранному району РОСН ------------------------------
        $locrosn = $this->input->post('locrosn');
        if (isset($locrosn) && !empty($locrosn))//ROSN
            $idlocorg = $this->input->post('locrosn');
        else//иначе
            $idlocorg = $this->session->userdata('locorg_id');
        //-------------------- -------------------------конец -------------------
//record-------------------------------------------------------------
        $polygon =$this->input->post('polygon');
	    if($polygon == 'Необходима геометрия' || $polygon == 'Необходим полигон'){
		$polygon='';
	}

                    $a= $this->input->post('cou_with_slhs');
            $cou_with_slhs=($a == 1)? $a : 0;

        $data = array(
            'id_loc_org' => $idlocorg,
            'id_divizion' => $this->input->post('divizionName'),
            'divizion_num' => $this->input->post('divizionNum'),
            'disloc' => $this->input->post('disloc'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'phone' => $this->input->post('phone'),
            'local_exit' => $this->input->post('localExit'),
            'polygon' => $polygon,
            'state' => $state,
            'id_user' => $this->session->userdata('user_id'),
            'cou_with_slhs'=> $cou_with_slhs
        );
        // print_r($data);
        // echo '<br><br>-----';
        $this->db->insert('records', $data);
        $lastId = $this->db->insert_id();
//staff----------------------------------------------------------------
        $staff = array(
            'id_record' => $lastId,
            'count_div' => $this->input->post('countDiv'),
            'change_one' => $this->input->post('countChange1'),
            'change_two' => $this->input->post('countChange2'),
            'change_three' => $this->input->post('countChange3'),
            'driver_all' => $this->input->post('countDriverAll'),
            'driver_change' => $this->input->post('countDriverChange'),
            'disp_all' => $this->input->post('countDispAll'),
            'disp_change' => $this->input->post('countDispChange')
        );
        // print_r($staff);
        // echo '<br><br>-----';
        $this->db->insert('staff', $staff);
//technics-------------------------------------------------------------

        for ($j = 0; $j <= $this->input->post('countTech'); $j++) {//count technics unit
            $technicName[$j] = $this->input->post('technicName' . $j);
            $mark[$j] = $this->input->post('mark' . $j);
            $type[$j] = $this->input->post('type' . $j);
            $v[$j] = $this->input->post('v' . $j);
            $calculation[$j] = $this->input->post('calculation' . $j);
        }
        for ($j = 0; $j <= $this->input->post('countTech'); $j++) {
            if ((!empty($technicName[$j])) || (!empty($mark[$j]))) {
                if (empty($technicName[$j]))
                    $technicName[$j] = NULL;
                if (empty($mark[$j]))
                    $mark[$j] = NULL;
                if (empty($v[$j]))
                    $v[$j] = 0;
                if (empty($type[$j]))
                    $type[$j] = NULL;
                if (empty($calculation[$j]))
                    $calculation[$j] = 0;

                $technics = array(
                    'id_record' => $lastId,
                    'id_view' => $technicName[$j],
                    'mark' => $mark[$j],
                    'v' => $v[$j],
                    'id_type' => $type[$j],
                    'calculation' => $calculation[$j]
                );

                // print_r($technics);
                $this->db->insert('technics', $technics);
            }
        }

//logs------------------------------------------------------------
        $today = date("Y-m-d H:i:s");
        $logs = array(
            'id_record' => $lastId,
            'host' => $_SERVER['REMOTE_ADDR'],
            'date' => $today,
            'id_action' => $action,
            'id_user' => $this->session->userdata('user_id')
        );
        //print_r($logs);
        $this->db->insert('logs', $logs);


        unset($data);
        unset($staff);
        unset($technics);
        unset($logs);
        return 1; //выполнено добавление записи
    }

    public function set_status($status, $work, $idCard) { //установиить статус карточки
        //print_r($statusCards);
        $this->db->select('id');
        $this->db->from('statuscards');
        $this->db->where('id_card', $idCard);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $statusCards = array(
                'status' => $status,
                'work' => $work
            );
            $this->db->where('id_card', $idCard);
            $this->db->update('statuscards', $statusCards);
        } else {
            $statusCards = array(
                'id_card' => $idCard,
                'status' => $status,
                'work' => $work
            );
            $this->db->insert('statuscards', $statusCards);
        }
    }

}
