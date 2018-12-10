<?php

class Fill extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('fill_model');
        $this->load->model('edit_model');
        $this->load->helper('url');
    }

    public function index() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $userId = $this->session->userdata('user_id');
            //$data['idCard'] = $this->uri->segment(2);

            $this->load->view('templates/header');
            if (!empty($userId)) {

                $this->load->view('templates/menuauth');
                $this->load->view('fill/bread');
                $data['success'] = 0; //добавления записи не было
                $data['divizions'] = $this->fill_model->get_divizionName();
                $data['types'] = $this->fill_model->get_types();
                $data['views'] = $this->fill_model->get_views();
                $data['locrosn'] = $this->fill_model->get_rosnview();

                $data['issetRecords'] = $this->fill_model->isset_records(); //есть ли записи в карточке
                if (!empty($data['issetRecords'])) {
                    $data['status'] = $this->fill_model->get_status(); //статус карточки
                } else
                    $data['status'] = NULL; //не существует карточки


                $this->load->view('fill/index', $data);
                $this->load->view('templates/footer');
            } else {

                header('Location:/ss/auth');

            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['exit'])) {//если нажата кнопка 'закончить заполнение карточки'
                
                 $data['success'] = $this->fill_model->insert(0, 1);

                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('fill/bread');
                //$this->load->view('fill/exit', $data);
                 header('Location:/ss/edit');
            } elseif (isset($_POST['complete'])) {//если была нажата кнопка 'отправить на подпись руководителю'
                $action = 1; //заполнение карточки
                $data['lastsend'] = $this->edit_model->last_complete($action, $this->session->userdata('locorg_id')); //было ли до этого редактирование карточки

                if (!empty($data['lastsend'])) //если да
                    $sign = 1;
                else
                    $sign = NULL;
                $data['complete'] = $this->edit_model->complete($action, $sign, $this->session->userdata('locorg_id')); //отправка на подпись
                
                  if ($this->session->userdata('orgid') == 4 ) {//УМЧС исполнитель отправляет карточку сразу в УМЧС на подтверждение
                      $status=2;
                  }
                  else{
                      $status=0;
                  }
                $this->fill_model->set_status($status, 0, $this->session->userdata('locorg_id')); //установить статус карточки


                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('fill/bread');
                $this->load->view('fill/complete', $data);
            } else {//продолжаем заполнять
                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');

                $data['success'] = $this->fill_model->insert(0, 1);

                $data['divizions'] = $this->fill_model->get_divizionName();
                $data['types'] = $this->fill_model->get_types();
                $data['views'] = $this->fill_model->get_views();
                $data['locrosn'] = $this->fill_model->get_rosnview();
                $data['status'] = NULL; //не существует карточки
                $this->load->view('fill/bread');
                $this->load->view('fill/index', $data);
            }


            $this->load->view('templates/footer');
        }
    }

}
