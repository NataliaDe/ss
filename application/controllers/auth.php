<?php

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->helper('url');
    }

    public function index() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $this->load->view('auth/index');
            $this->load->view('templates/footer');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->load->view('templates/header');

            //вызов модели, метод проверки пользователя в БД get_user()
            $data['auth'] = $this->auth_model->get_user();
            //если авторизация прошла успешно, метод вернул непустой массив данных, то переход на controllers/home, загрузка нового меню
            if (!empty($data['auth'])) {
                //запомнить логин и хост пользователя в домене
                //$this->load->view('templates/domain');
                $this->session->set_userdata($data['auth']);
                $this->load->view('templates/menuauth');


                if ((($this->session->userdata('level_id')) == 3) && (($this->session->userdata('role_id')) == 2))//исполнитель РОЧС

                    header('Location:/ss/news/');
                elseif ((($this->session->userdata('level_id')) == 3) && (($this->session->userdata('role_id')) == 1))//отв РОЧС
                    header('Location:/ss/requests/');
                elseif (((($this->session->userdata('level_id')) == 2) && (($this->session->userdata('role_id')) == 1)) || ((($this->session->userdata('level_id')) == 1) && (($this->session->userdata('role_id')) != 3)))//отв УМЧС, РЦУ
                    header('Location:/ss/query/');
                else
                    header('Location:/ss/');

            } else { //иначе форма авторизации
                $this->load->view('templates/menu');
                $this->load->view('auth/index');
            }
         //print_r($data['auth']);

            $this->load->view('templates/footer');
        }
    }

//разлогирование
    public function logoff() {
        $this->session->sess_destroy();
       redirect();
      
    }

}
