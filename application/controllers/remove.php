<?php

class Remove extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('remove_model');
        $this->load->model('edit_model');
        $this->load->model('fill_model');
        $this->load->helper('url');
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $idRec = $this->uri->segment(2);
            $data['idRecord'] = $this->uri->segment(2);
            $data['idCard'] = $this->edit_model->get_idcard($idRec); //получить id карточки
//  $data['check'] = $this->edit_model->check(3, $data['idCard']); //авторизован ли пользователь
//  if ($data['check'] == 1) {

            $data['card'] = $this->remove_model->get_record($idRec); //запись

            $this->load->view('templates/header');
            $this->load->view('templates/menuauth');
            $this->load->view('remove/bread');


            $this->load->view('remove/index', $data);
            if (( $this->session->userdata('level_id') == 1) && ($this->session->userdata('role_id') == 3)) {//РЦУ admin
            } else {
                $this->load->view('remove/back');
            }

            $this->load->view('templates/footer');

            //} else
            // header('Location:/ss/auth');

        }
    }

    function delete() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $idRec = $this->uri->segment(2);
            $data['idRecord'] = $this->uri->segment(2);
            $data['idCard'] = $this->edit_model->get_idcard($idRec); //получить id карточки

            $data['check'] = $this->edit_model->check(3, $data['idCard']); //авторизован ли пользователь

            if ($data['check'] == 1) {


                header('Location:/ss/edit');

            } else

                header('Location:/ss/auth');

        } else {
            if (isset($_POST['remove'])) {

                if (( $this->session->userdata('level_id') == 1) && ($this->session->userdata('role_id') == 3)) {//РЦУ admin
                    $data['delete'] = $this->remove_model->delete_record(NULL); //удалить запись
                } else {
                    $data['status'] = $this->fill_model->get_status(); //статус карточки
                    $data['delete'] = $this->remove_model->delete_record($data['status']); //удалить запись
//print_r($data['status']);
                }

                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('remove/bread');


                $this->load->view('remove/success', $data);
                $this->load->view('templates/footer');
            }
        }
    }

}
