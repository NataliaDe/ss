<?php

class Edit_model extends CI_Model {

    public function __construct() {

    }

    public function check($level, $masIdCard) {

        $userId = $this->session->userdata('user_id');

        if (($level != NULL) && ($masIdCard != NULL)) {

            foreach ($masIdCard as $row) {
                $idCard = $row->id_card;
            }

            $levelId = $this->session->userdata('level_id');
            $locorgId = $this->session->userdata('locorg_id');

            if ((!empty($userId)) && ($levelId == $level) && ($locorgId == $idCard))
                return 1;
            else
                return 0;
        }
        else {
            if (!empty($userId))
                return 1;
            else
                return 0;
        }
    }

    public function get_state($idRecord) {

        $where = array(
            'id_record' => $idRecord
        );

        $this->db->select('state');
        $this->db->from('card');
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_orgid($idRecord) {

        $where = array(
            'id_record' => $idRecord
        );

        $this->db->select('orgid');
        $this->db->from('card');
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_state_mistake($idRecord) {//state, в которое надо вернуть запись после внесения обновлений
        $where = array(
            'id_record' => $idRecord
        );

        $this->db->select('tostate');
        $this->db->from('mistakes');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_state_mistake_level($idRecord, $level) {//state, в которое надо вернуть запись после внесения обновлений
        $where = array(
            'id_record' => $idRecord,
            'level' => $level
        );

        $this->db->select('tostate');
        $this->db->from('mistakes');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_count_technic($idRecord) {
        $where = array(
            'id_record' => $idRecord
        );

        $this->db->from('technics');
        $this->db->where($where);
        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_id_technic($idRecord) {
        $where = array(
            'id_record' => $idRecord
        );

        $this->db->select('id');
        $this->db->from('technics');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_count_form() {
        $x = 0;
        for ($j = 0; $j <= $this->input->post('countTech'); $j++) {
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

                /* $technics = array(
                  'idRecord' => $lastId,
                  'idView' => $technicName[$j],
                  'mark' => $mark[$j],
                  'v' => $v[$j],
                  'idType' => $type[$j],
                  'calculation' => $calculation[$j]
                  ); */
                $x++;
            }
        }
        return $x;
    }

    public function in_work($x, $idCard) {//взять карточку в раб
        $where = array(
            'id_card' => $idCard
        );
        $work = array(
            'work' => $x
        );
        $this->db->where($where);
        $query = $this->db->update('statuscards', $work);
    }

    public function get_recordid($idCard) {//выбор id записей как ключей
        if ($idCard == 160) {//ROSN
            $orgid = 8;
            $where = array(
                'orgid' => $orgid
            );
        } else {
            $where = array(
                'id_card' => $idCard
            );
        }

        $this->db->distinct();
        $this->db->select('id_record');
        $this->db->from('card');
        $this->db->where($where);
        $query = $this->db->get();

        return $query->result();
    }

    /* public function get_recordidROSN($orgid) {//выбор id записей как ключей
      $where = array(
      'orgid' => $orgid
      );
      $this->db->distinct();
      $this->db->select('idRecord');
      $this->db->from('card');
      $this->db->where($where);
      $query = $this->db->get();

      return $query->result();
      } */

    public function get_card($idCard) {
        if ($idCard == 160) {//ROSN
            $orgid = 8;
            $where = array(
                'orgid' => $orgid
            );
        } else {
            $where = array(
                'id_card' => $idCard
            );
        }


        $this->db->select('*');
        $this->db->from('card');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    /* public function get_cardROSN($orgid) {

      $where = array(
      'orgid' => $orgid
      );
      $this->db->select('*');
      $this->db->from('card');
      $this->db->where($where);
      $query = $this->db->get();
      return $query->result();
      } */

    public function get_idcard($idRec) {

        $where = array(
            'id_record' => $idRec
        );
        $this->db->select('id_card');
        $this->db->from('card');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_mistakes($idCard) {

        // $org = $this->session->userdata('orgid');
        if ($idCard == 160) {//ROSN
            $where = array(
                'orgid' => 8
            );
        } else {
            $where = array(
                'id_card' => $idCard
            );
        }
        $this->db->select('*');
        $this->db->from('allmistakes');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function caption($who) {
        $where = array(
            'locorg_id' => $who
        );
        //$this->db->select('auth');
        $this->db->select('*');
        $this->db->from('caption');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function date_caption($idCard) {//дата заголовка карточки
        $where = array(
            'id_card' => $idCard
        );
        $this->db->select('dat');
        $this->db->from('datecaption');
        $this->db->where($where);
        $this->db->order_by('datte', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function date_foot($idCard) {//дата подписи карточки
        $where = array(
            'id_card' => $idCard
        );
        $this->db->select('*');
        $this->db->from('datefoot');
        $this->db->where($where);
        $this->db->order_by('datte');
        //$this->db->order_by('id_action');
        $query = $this->db->get();
        return $query->result();
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

        //return $idRec;
    }

    public function update_record($state) {
        $where = array(
            'id' => $this->input->post('idRecord')
        );
        $whereStaff = array(
            'id_record' => $this->input->post('idRecord')
        );
		        $polygon =$this->input->post('polygon');
	    if($polygon == 'Необходима геометрия' || $polygon == 'Необходим полигон'){
		$polygon='';
	}

                    $a= $this->input->post('cou_with_slhs');
            $cou_with_slhs=($a == 1)? $a : 0;

        //------------------- если авторизован РОСН, idLocOrg=выбранному району РОСН ------------------------------
        $locrosn = $this->input->post('locrosn');

        if (isset($locrosn) && !empty($locrosn))//ROSN
            $idlocorg = $this->input->post('locrosn');

        //иначе, если редактирует ответственный УМЧС
        elseif(( $this->session->userdata('level_id') == 2) && ($this->session->userdata('role_id') == 1)){

        $this->db->select('id_loc_org');
        $this->db->from('records');
        $this->db->where($where);
        $query = $this->db->get();
        foreach ($query->result() as $v) {
             $idlocorg = $v->id_loc_org;
        }
        }
        //иначе
        else
            $idlocorg = $this->session->userdata('locorg_id');
        //-------------------- -------------------------конец -------------------

        if ($state == NULL) {//state записи не меняется
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
                'id_user' => $this->session->userdata('user_id'),
                'cou_with_slhs'=> $cou_with_slhs
            );
            //staff----------------------------------------------------------------
            $staff = array(
                'count_div' => $this->input->post('countDiv'),
                'change_one' => $this->input->post('countChange1'),
                'change_two' => $this->input->post('countChange2'),
                'change_three' => $this->input->post('countChange3'),
                'driver_all' => $this->input->post('countDriverAll'),
                'driver_change' => $this->input->post('countDriverChange'),
                'disp_all' => $this->input->post('countDispAll'),
                'disp_change' => $this->input->post('countDispChange')
            );
        } else {

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
            //staff----------------------------------------------------------------
            $staff = array(
                'count_div' => $this->input->post('countDiv'),
                'change_one' => $this->input->post('countChange1'),
                'change_two' => $this->input->post('countChange2'),
                'change_three' => $this->input->post('countChange3'),
                'driver_all' => $this->input->post('countDriverAll'),
                'driver_change' => $this->input->post('countDriverChange'),
                'disp_all' => $this->input->post('countDispAll'),
                'disp_change' => $this->input->post('countDispChange')
            );
        }
        $this->db->where($where);
        $this->db->update('records', $data);

        //print_r($staff);
        $this->db->where($whereStaff);
        $this->db->update('staff', $staff);

        // print_r($data);
        // echo '<br><br>-----';
        return $data;
    }

    /***********  Редактирование техники  ***********/
    public function update_technic($idTech) {
        //technics-------------------------------------------------------------
        $masTech = array();
        $x = 0;

        if (!empty($idTech)) {
            foreach ($idTech as $row) {//id единиц техники
                $masTech[] = $row->id;
            }
        }


        //print_r($masTech);
        for ($j = 0; $j <= $this->input->post('countTech'); $j++) {
            $technicName[$j] = $this->input->post('technicName' . $j);
            $mark[$j] = $this->input->post('mark' . $j);
            $type[$j] = $this->input->post('type' . $j);
            $v[$j] = $this->input->post('v' . $j);
            $calculation[$j] = $this->input->post('calculation' . $j);
            $numbsign[$j] = $this->input->post('numbsign' . $j);
            if (isset($_POST['t_id' . $j])) {
                $t_id[$j] = $this->input->post('t_id' . $j);
            }
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
                if (empty($numbsign[$j]))
                    $numbsign[$j] = NULL;

                $technics = array(
                    'id_view' => $technicName[$j],
                    'mark' => $mark[$j],
                    'v' => $v[$j],
                    'id_type' => $type[$j],
                    'calculation' => $calculation[$j],
                    'numbsign' => $numbsign[$j]
                );

                //print_r($technics);
                //не новая единица техники
                if (isset($t_id[$j])) {

                    //есть такая ед техники в БД
                    if (in_array($t_id[$j], $masTech)) {

                        //update
                        $this->db->where('id', $t_id[$j]);
                        $this->db->update('technics', $technics);

                        //удалить эту ед из массива $masTech
                        foreach ($masTech as $key => $value) {
                            if ($value == $t_id[$j]) {
                                unset($masTech[$key]);
                            }
                        }
                    }
                }
                //новая единица техники
                else {
                    //insert
                    $technics['id_record'] = $this->input->post('idRecord');
                    $this->db->insert('technics', $technics);
                }
            }
        }
        //удалить из БД лишние ед техники, которые были удалены с формы
        if (!empty($masTech)) {
            foreach ($masTech as $key => $value) {
                $this->db->where('id', $masTech[$key]);
                $this->db->delete('technics');

                unset($masTech[$key]);
            }
        }

        unset($technics);
    }

    public function set_logs($action) {
        //logs------------------------------------------------------------
        $today = date("Y-m-d H:i:s");
        $logs = array(
            'id_record' => $this->input->post('idRecord'),
            'host' => $_SERVER['REMOTE_ADDR'],
            'date' => $today,
            'id_action' => $action,
            'id_user' => $this->session->userdata('user_id')
        );
        //print_r($logs);
        $this->db->insert('logs', $logs);
        unset($logs);
    }

    public function update_record_admin() {
        $where = array(
            'id' => $this->input->post('idRecord')
        );
        $whereStaff = array(
            'id_record' => $this->input->post('idRecord')
        );
        $polygon =$this->input->post('polygon');
	    if($polygon == 'Необходима геометрия' || $polygon == 'Необходим полигон'){
		$polygon='';
	}

                    $a= $this->input->post('cou_with_slhs');
            $cou_with_slhs=($a == 1)? $a : 0;


        $data = array(
            'id_divizion' => $this->input->post('divizionName'),
            'divizion_num' => $this->input->post('divizionNum'),
            'disloc' => $this->input->post('disloc'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'phone' => $this->input->post('phone'),
            'local_exit' => $this->input->post('localExit'),
            'id_user' => $this->session->userdata('user_id'),
			'polygon' => $polygon,
            'cou_with_slhs'=> $cou_with_slhs
        );
        //staff----------------------------------------------------------------
        $staff = array(
            'count_div' => $this->input->post('countDiv'),
            'change_one' => $this->input->post('countChange1'),
            'change_two' => $this->input->post('countChange2'),
            'change_three' => $this->input->post('countChange3'),
            'driver_all' => $this->input->post('countDriverAll'),
            'driver_change' => $this->input->post('countDriverChange'),
            'disp_all' => $this->input->post('countDispAll'),
            'disp_change' => $this->input->post('countDispChange')
        );

        $this->db->where($where);
        $this->db->update('records', $data);

        //print_r($staff);
        $this->db->where($whereStaff);
        $this->db->update('staff', $staff);
    }

    public function last_complete($action, $idCard) {//есть ли запись с таким action для карточки
        $where = array(
            'id_card' => $idCard,
            'id_action' => $action
        );

        $this->db->select('*');
        $this->db->from('informations');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function complete($action, $sign, $idCard) {//отправка на подпись
        // проверить есть ли запись, если есть-update, иначе - insert
        $today = date("Y-m-d H:i:s");

        if ($sign == 1) {//если ранее карточку редактировали
            $informations = array(
                'id_user' => $this->session->userdata('user_id'),
                'date' => $today,
                'fio' => $this->input->post('fio')
            );
            $where = array(
                'id_card' => $idCard,
                'id_action' => $action
            );
            $this->db->where($where);
            $this->db->update('informations', $informations);
        } else {
            $informations = array(
                'id_user' => $this->session->userdata('user_id'),
                'date' => $today,
                'id_card' => $idCard,
                'fio' => $this->input->post('fio'),
                'id_action' => $action
            );

            $this->db->insert('informations', $informations);
        }
        //print_r($informations);
        return 1;
    }

    public function set_state($idRec, $state) {

        $where = array(
            'id' => $idRec
        );
        $records = array(
            'state' => $state
        );
        $this->db->where($where);
        $this->db->update('records', $records);
    }

}
