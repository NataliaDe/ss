<?php

class Report_model extends CI_Model {

    public function __construct() {

    }

    public function get_region() {

        $this->db->select('*');
        $this->db->from('regions');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_local() {

        $this->db->select('*');
        $this->db->from('locals');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_organ() {

        $this->db->select('*');
        $this->db->from('organs');
        $this->db->where('id !=', 5);
        $this->db->where('id !=', 4);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_keyid($region, $local, $organ, $divizion) {//выбор id записей области как ключей
        if (!isset($region) || empty($region) && !isset($local) || empty($local) && !isset($organ) || empty($organ) && !isset($divizion) || empty($divizion)) {//по РБ
            $this->db->distinct();
            $this->db->select('id_record');
            $this->db->from('card');
            $this->db->order_by("regionn");
            $this->db->order_by("local_name");
            $this->db->order_by("orgid");
            $query = $this->db->get();
        } elseif (isset($divizion) && !empty($divizion)) {
            $where = array(
                'divizid' => $divizion
            );
            $this->db->distinct();
            $this->db->select('id_record');
            $this->db->from('card');
            $this->db->where($where);
            $this->db->order_by("regionn");
            $this->db->order_by("local_name");
            $this->db->order_by("orgid");
            $query = $this->db->get();
        } elseif (isset($organ) && !empty($organ)) {
            $where = array(
                'orgid' => $organ
            );
            $this->db->distinct();
            $this->db->select('id_record');
            $this->db->from('card');
            $this->db->where($where);

            $this->db->order_by("regionn");
            $this->db->order_by("local_name");
            $this->db->order_by("orgid");

            $query = $this->db->get();
        } elseif (isset($local) && !empty($local)) {
            $where = array(
                'locid' => $local
            );
            $this->db->distinct();
            $this->db->select('id_record');
            $this->db->from('card');
            $this->db->where($where);
            $this->db->order_by("regionn");
            $this->db->order_by("local_name");
            $this->db->order_by("orgid");

            $query = $this->db->get();
        } elseif (isset($region) && !empty($region)) {
            $where = array(
                'region' => $region//regid
            );
            $this->db->distinct();
            $this->db->select('id_record');
            $this->db->from('card');
            $this->db->where($where);
            $this->db->order_by("regionn");
            $this->db->order_by("local_name");
            $this->db->order_by("orgid");
            $query = $this->db->get();
        }


        return $query->result();
    }

    public function get_report($region, $local, $organ, $divizion, $view, $mark, $type, $divmin, $divmax, $change1min, $change1max, $change2min, $change2max, $change3min, $change3max
    , $drallmin, $drallmax, $drchmin, $drchmax, $dispallmin, $dispallmax, $dispchmin, $dispchmax, $vmin, $vmax, $calcmin, $calcmax) {

        if (isset($region) && !empty($region)) {

            $where['region'] = $region;
        }
        if (isset($local) && !empty($local)) {
            $where['locid'] = $local;
        }
        if (isset($organ) && !empty($organ)) {
            $where['orgid'] = $organ;
        }
        if (isset($divizion) && !empty($divizion)) {
            $where['divizid'] = $divizion;
        }
        if (isset($view) && !empty($view)) {
            $where['idvie'] = $view;
        }
        if (isset($type) && !empty($type)) {
            $where['typeid'] = $type;
        }

        if (isset($divmin) && !empty($divmin)) {
            $where['count_div >='] = $divmin;
        }
        if (isset($divmax) && !empty($divmax)) {
            $where['count_div <='] = $divmax;
        }
        if (isset($change1min) && !empty($change1min)) {
            $where['change_one >='] = $change1min;
        }
        if (isset($change1max) && !empty($change1max)) {
            $where['change_one <='] = $change1max;
        }
        if (isset($change2min) && !empty($change2min)) {
            $where['change_two >='] = $change2min;
        }
        if (isset($change2max) && !empty($change2max)) {
            $where['change_two <='] = $change2max;
        }
        if (isset($change3min) && !empty($change3min)) {
            $where['change_three >='] = $change3min;
        }
        if (isset($change3max) && !empty($change3max)) {
            $where['change_three <='] = $change3max;
        }
        if (isset($drallmin) && !empty($drallmin)) {
            $where['driver_all >='] = $drallmin;
        }
        if (isset($drallmax) && !empty($drallmax)) {
            $where['driver_all <='] = $drallmax;
        }
        if (isset($drchmin) && !empty($drchmin)) {
            $where['driver_change >='] = $drchmin;
        }
        if (isset($drchmax) && !empty($drchmax)) {
            $where['driver_change <='] = $drchmax;
        }
        if (isset($dispallmin) && !empty($dispallmin)) {
            $where['disp_all >='] = $dispallmin;
        }
        if (isset($dispallmax) && !empty($dispallmax)) {
            $where['disp_all <='] = $dispallmax;
        }
        if (isset($dispchmin) && !empty($dispchmin)) {
            $where['disp_change >='] = $dispchmin;
        }
        if (isset($dispchmax) && !empty($dispchmax)) {
            $where['disp_change <='] = $dispchmax;
        }
        if (isset($vmin) && !empty($vmin)) {
            $where['v >='] = $vmin;
        }
        if (isset($vmax) && !empty($vmax)) {
            $where['v <='] = $vmax;
        }
        if (isset($calcmin) && !empty($calcmin)) {
            $where['calculation >='] = $calcmin;
        }
        if (isset($calcmax) && !empty($calcmax)) {
            $where['calculation <='] = $calcmax;
        }


        $this->db->select('*');
        $this->db->from('card');

        if (!empty($where))
            $this->db->where($where);

        if (isset($mark) && !empty($mark)) {
            $this->db->like('mark', $mark, 'after');
        }
        $this->db->order_by("regionn");
        $this->db->order_by("local_name");
        $this->db->order_by("orgid");
        $query = $this->db->get();
        return $query->result();
    }

    public function date_caption() {//дата заголовка карточки
        $this->db->select('dat');
        $this->db->from('datecaption');
        $this->db->order_by('datte', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function caption_local($loc) {
        $where = array(
            'locid' => $loc
        );
        $this->db->select('*');
        $this->db->from('caption');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function date_caption_local($loc) {
        $where = array(
            'locid' => $loc
        );
        $this->db->select('dat');
        $this->db->from('datecaption');
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function date_caption_organ($reg, $loc, $org) {//дата заголовка карточки
        $this->db->select('dat');
        $this->db->from('datecaption');

        if ($reg == NULL) {
            if ($loc == NULL) {
                if ($org == NULL) {
                    //без where
                } else {
                    $where = array(
                        'orgid' => $org
                    );
                    $this->db->where($where);
                }
            } else {
                if ($org == NULL) {
                    //без
                } else {
                    $where = array(
                        'locid' => $loc,
                        'orgid' => $org
                    );
                    $this->db->where($where);
                }
            }
        } else {
            if ($loc == NULL) {
                if ($org == NULL) {
                    $where = array(
                        'region' => $reg
                    );
                    $this->db->where($where);
                } else {

                    if ($org == 8) {
                        $where = array(
                            'orgid' => $org
                        );
                    } else {
                        $where = array(
                            'region' => $reg,
                            'orgid' => $org
                        );
                    }
                    $this->db->where($where);
                }
            } else {
                if ($org == NULL) {
                    $where = array(
                        'region' => $reg,
                        'locid' => $loc
                    );
                    $this->db->where($where);
                }
            }
        }


        $this->db->order_by('datte', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function caption_organ($loc, $org) {
        $where = array(
            'locid' => $loc,
            'orgid' => $org
        );
        $this->db->select('*');
        $this->db->from('caption');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function caption_ROSN($ROSN) {
        $where = array(
            'orgid' => $ROSN
        );
        $this->db->select('*');
        $this->db->from('caption');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    /* условия выборки */

    public function get_name_ob($id) {

        $where = array(
            'id' => $id
        );
        $this->db->select('*');
        $this->db->from('regions');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_name_lo($id) {

        $where = array(
            'id' => $id
        );
        $this->db->select('*');
        $this->db->from('locals');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_name_or($id) {

        $where = array(
            'id' => $id
        );
        $this->db->select('*');
        $this->db->from('organs');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_name_di($id) {

        $where = array(
            'id' => $id
        );
        $this->db->select('*');
        $this->db->from('divizions');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_name_te($id) {

        $where = array(
            'id' => $id
        );
        $this->db->select('*');
        $this->db->from('views');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_name_ty($id) {

        $where = array(
            'id' => $id
        );
        $this->db->select('*');
        $this->db->from('types');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

}
