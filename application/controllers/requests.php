<?php

class Requests extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('requests_model');
        $this->load->model('fill_model');
        $this->load->model('edit_model');
        $this->load->helper('url');
    }

    public function index() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data['check'] = $this->edit_model->check(NULL, NULL); //авторизован ли пользователь

            if ($data['check'] == 1) {

                $data['issetRecords'] = $this->fill_model->isset_records(); //есть ли записи в карточке

                if (!empty($data['issetRecords'])) {
                    $data['status'] = $this->fill_model->get_status(); //статус карточки

                    if (empty($data['status']))
                        $data['status'] = NULL; //нет записи статуса
                } else
                    $data['status'] = NULL; //записей не существует в карточке

                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('requests/bread');

                if ($data['status'] == NULL)//заявок нет
                    $this->load->view('requests/msgempt', $data); //заявок нет
                else {
                    $data['datecaption'] = $this->edit_model->date_caption($this->session->userdata('locorg_id')); //дата карточки
                    $data['datefoot'] = $this->edit_model->date_foot($this->session->userdata('locorg_id')); //дата карточки

                    /* if ($this->session->userdata('orgid') == 8) {//ROSN
                      $orgid = 8;
                      $data['recordkey'] = $this->edit_model->get_recordidROSN($orgid); //выбор id записей как ключей
                      $data['card'] = $this->edit_model->get_cardROSN($orgid); //все записи карточки
                      } else { */
                    $data['recordkey'] = $this->edit_model->get_recordid($this->session->userdata('locorg_id')); //выбор id записей как ключей
                    $data['card'] = $this->edit_model->get_card($this->session->userdata('locorg_id')); //все записи карточки
                    // }

                    $data['caption'] = $this->edit_model->caption($this->session->userdata('locorg_id')); //название карточки

                    $data['mis'] = $this->edit_model->get_mistakes($this->session->userdata('locorg_id')); //все ошибки карточки


                    foreach ($data['status'] as $row) {
                        $status = $row->status;
                    }

                    if ($status == 0) {//есть заявка
                        $this->load->view('query/msg', $data); //есть заявка
                        $this->load->view('templates/caption', $data);
                        $this->load->view('query/view', $data);
                        $this->load->view('templates/foot', $data);
                        $this->load->view('edit/legend', $data); //легенда карточки
                        $this->load->view('requests/write', $data); //кнопка подписать
                    } else {//где находится карточка
                        $this->load->view('news/view', $data); //сообщение
                        $this->load->view('templates/caption', $data);
                        $this->load->view('query/view', $data);
                        $this->load->view('templates/foot', $data);
                        $this->load->view('edit/legend', $data); //легенда карточки
                    }
                }

                $this->load->view('templates/footer');
            } else

                header('Location:/ss/auth');

        } else {

            header('Location:/ss/auth');

        }
    }

    public function write() {//подписать карточку
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            header('Location:/ss/requests');

        } else {

            if (isset($_POST['write'])) {

                $action = 3;
                $data['lastsend'] = $this->edit_model->last_complete($action, $this->session->userdata('locorg_id')); //было ли до этого подпись карточки

                if (!empty($data['lastsend'])) //если да
                    $sign = 1;
                else
                    $sign = NULL;

                $data['send'] = $this->edit_model->complete($action, $sign, $this->session->userdata('locorg_id')); //отправка в УМЧС
                $data['statuscards'] = $this->fill_model->set_status(2, 0, $this->session->userdata('locorg_id')); //изменить статус карточки


                header('Location:/ss/requests');

            }
        }
    }

}
