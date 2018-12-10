<?php

class Result extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('result_model');
        $this->load->model('card_model');
        $this->load->model('query_model');
        $this->load->model('fill_model');
        $this->load->model('edit_model');

        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('templates/header');
        $userId = $this->session->userdata('user_id');
        if (!empty($userId)) {
            $this->load->view('templates/menuauth');
        } else {
            $this->load->view('templates/menu');
        }

        $data['today'] = $this->result_model->get_date_today(); //today date
        $data['result'] = $this->result_model->index(); //count all organs вкладка отделы по чс
        $data['orgname'] = $this->result_model->get_organs_name(); //name all organs

        $data['diviz'] = $this->result_model->get_count_divizions(); //count all divizions
        $data['paspobject'] = $this->result_model->get_paspobject(); //count all organs pasp object
        $data['divizall'] = $this->result_model->get_count_all(); //count divizions without PASO object
        //

         //
          $data['rosn'] = $this->result_model->get_rosnresult(); //name rosn

          $data['cou_by_local'] = $this->result_model->get_cou_by_local(); //all cou in local

        // print_r($data['result']);
        $this->load->view('result/bread', $data);
        $this->load->view('card/print');
        $this->load->view('result/today', $data);
        $this->load->view('result/tab', $data);

        $this->load->view('result/toggle', $data); //show/hide rows
        // $this->load->view('result/orgrange', $data); //folter

        $this->load->view('result/index', $data); // отделы по ЧС
        $this->load->view('result/tab2', $data); // подразделения по чс по областям
        $this->load->view('result/tab3', $data); // подразделения по чс по районам
         $this->load->view('result/tab5', $data);
        $this->load->view('templates/footer');
    }

}
