<?php

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('card_model');
        $this->load->model('home_model');
        $this->load->model('fill_model');
        $this->load->model('edit_model');
        $this->load->helper('url');
    }

    public function view($page = 'home') {

        if (!file_exists(APPPATH . '/views/pages/' . $page . '.php')) {

            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->load->view('templates/header');
        $userId = $this->session->userdata('user_id');
        if (!empty($userId)) {
            $this->load->view('templates/menuauth');
        } else {
            $this->load->view('templates/menu');
        }
        $data['main'] = $this->home_model->get_maintable(); //список органов
        $data['divizions'] = $this->fill_model->get_divizionName();
       // $data['c'] = $this->home_model->get_count_div($data['main'], $data['divizions']); //количество подразделений органа
        $data['dat'] = $this->home_model->get_date($data['main']); //дата последнего действия
//карточка по РБ---------------------------------------------------------------------------------------------------------------
        $data['recordkey'] = $this->card_model->get_recordid(NULL); //выбор id записей  как ключей
        $data['card'] = $this->card_model->get_card(NULL); //все записи

        $data['whorefuse'] = $this->card_model->who_refuse(); //кто отклонил

        $this->load->view('card/print');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function index() {
        $this->load->view('templates/header');
        $userId = $this->session->userdata('user_id');
        if (!empty($userId)) {
            $this->load->view('templates/menuauth');
        } else {
            $this->load->view('templates/menu');
        }
        $data['main'] = $this->home_model->get_maintable(); //список органов
        $data['divizions'] = $this->fill_model->get_divizionName();
       // $data['c'] = $this->home_model->get_count_div($data['main'], $data['divizions']); //количество подразделений органа
        $data['dat'] = $this->home_model->get_date($data['main']); //дата последнего действия
//карточка по РБ---------------------------------------------------------------------------------------------------------------
        $data['recordkey'] = $this->card_model->get_recordid(NULL); //выбор id записей  как ключей
        $data['card'] = $this->card_model->get_card(NULL); //все записи

        $data['whorefuse'] = $this->card_model->who_refuse(); //кто отклонил

          /*************** временно, пока не будут отредактированы карточки - номерной знак*******************/
        $data['is_numbsign']=$this->home_model->is_numbsign();//заполнены ли номерные знаки
        
        $this->load->view('card/print');
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

}

