<?php

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('templates/menuauth');
        $this->load->view('news/bread');

        $data['issetRecords'] = $this->news_model->isset_records(); //есть ли записи в карточке
        /*************** временно, пока не будут отредактированы карточки - номерной знак*******************/
        $data['is_numbsign']=$this->news_model->is_numbsign();//заполнены ли номерные знаки

        if (!empty($data['issetRecords'])) {
            $data['status'] = $this->news_model->get_status();

            if (empty($data['status'])) {//если карточка заполнена, но не отправлена на подпись(1 раз)
                //$data['badge']=1;
                $this->load->view('news/index', $data);
            } else {
                $this->load->view('news/view', $data);
            }
        } else {//оповещений нет
            $this->load->view('templates/msgempt', $data);
        }

        $this->load->view('templates/footer');
    }

}
