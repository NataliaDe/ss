<?php

class Edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('edit_model');
        $this->load->model('fill_model');
        $this->load->model('query_model');
        $this->load->helper('url');
    }

    public function index() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data['check'] = $this->edit_model->check(NULL, NULL); //авторизован ли пользователь

            if ($data['check'] == 1) {

                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('edit/bread');

                $data['issetRecords'] = $this->fill_model->isset_records(); //есть ли записи в карточке
                $data['caption'] = $this->edit_model->caption($this->session->userdata('locorg_id')); //название карточки
                $data['datecaption'] = $this->edit_model->date_caption($this->session->userdata('locorg_id')); //дата карточки
                $data['datefoot'] = $this->edit_model->date_foot($this->session->userdata('locorg_id')); //дата карточки




                if (!empty($data['issetRecords'])) {//есть записи в карточке
                    $data['status'] = $this->fill_model->get_status(); //статус карточки
                    /* if ($this->session->userdata('orgid') == 8) {//ROSN
                      $orgid = 8;
                      $data['recordkey'] = $this->edit_model->get_recordidROSN($orgid); //выбор id записей как ключей
                      $data['card'] = $this->edit_model->get_cardROSN($orgid); //все записи карточки
                      } else { */
                    $data['recordkey'] = $this->edit_model->get_recordid($this->session->userdata('locorg_id')); //выбор id записей как ключей
                    $data['card'] = $this->edit_model->get_card($this->session->userdata('locorg_id')); //все записи карточки
                    // }

                    $data['mis'] = $this->edit_model->get_mistakes($this->session->userdata('locorg_id')); //все ошибки карточки

                    if (empty($data['status'])) {//если карточка заполнена, но не отправлена на подпись(1 раз), нет записи статуса
                        //$data['badge']=1;
                        $this->load->view('edit/index'); //сообщение о том, что карточка не отправлена на подпись

                        $this->load->view('edit/view', $data); //таблица записей
                        $this->load->view('edit/newrecord', $data); //кнопка добавить новое подразделение
                        $this->load->view('edit/legend', $data); //легенда карточки
                    }
                    //проверяем статус карточки
                    else {
                        $this->load->view('templates/caption', $data); //название карточки

                        $this->load->view('edit/view', $data); //карточка

                        $this->load->view('templates/foot', $data); //кто заполнял
                        $this->load->view('edit/newrecord', $data); //кнопка добавить новое подразделение
                        $this->load->view('edit/sendwrite', $data); //кнопка отправить на подпись
                        $this->load->view('edit/legend', $data); //легенда карточки
                    }
                } else {//карточка не существует
                    $this->load->view('templates/msgempt', $data);
                }

                $this->load->view('templates/footer');
            } else

                header('Location:/ss/auth');

        }
    }

    public function work() {//взять карточку в работу
        if (isset($_POST['work'])) {
   $data['work'] = $this->edit_model->in_work(1, $this->session->userdata('locorg_id')); // work=1

            header('Location:/ss/edit');

        } else

            header('Location:/ss/auth');

    }

    public function create() {//форма добавления
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            header('Location:/ss/auth');

        } else {

            if (isset($_POST['create'])) { //добавление новой записи
                $data['status'] = $this->fill_model->get_status(); //статус карточки

                if (empty($data['status']))
                    $state = 0;
                else {
                    foreach ($data['status'] as $row) {
                        if ($row->status == 0)
                            $state = 0;
                        else
                            $state = 3;
                    }
                }


                $this->fill_model->insert($state, 1); //вставка записи


                header('Location:/ss/edit');

            }

            else {
                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('edit/bread');


                $data['divizions'] = $this->fill_model->get_divizionName();
                $data['types'] = $this->fill_model->get_types();
                $data['views'] = $this->fill_model->get_views();
                $data['locrosn'] = $this->fill_model->get_rosnview();
                $this->load->view('edit/create', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    public function record() { //форма редактирования записи
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $idRec = $this->uri->segment(3);
            $data['idRecord'] = $this->uri->segment(3);

            $data['idCard'] = $this->edit_model->get_idcard($idRec); //получить id карточки
            // $data['check'] = $this->edit_model->check(3, $data['idCard']); //авторизован ли пользователь
            // if ($data['check'] == 1) {
            $this->load->view('templates/header');
            $this->load->view('templates/menuauth');
            $this->load->view('edit/bread');

            $data['divizions'] = $this->fill_model->get_divizionName();
            $data['types'] = $this->fill_model->get_types();
            $data['views'] = $this->fill_model->get_views();
            $data['locrosn'] = $this->fill_model->get_rosnview();


                $data['record'] = $this->edit_model->get_record($idRec); //получить запись
                $this->load->view('edit/record', $data);


            if (( $this->session->userdata('level_id') == 1) && ($this->session->userdata('role_id') == 3)) {//РЦУ admin
            } else {

                $this->load->view('edit/back');
            }
            $this->load->view('templates/footer');

            //} else

               // header('Location:/ss/auth');

        }
        else {		
            if (isset($_POST['record'])) {//редактирование записи
                if (( $this->session->userdata('level_id') == 1) && ($this->session->userdata('role_id') == 3)) {//РЦУ admin
                    $this->edit_model->update_record_admin(); //редактирование общей информации
                } else {
                    $data['status'] = $this->fill_model->get_status(); //статус карточки

                    $data['state'] = $this->edit_model->get_state($this->input->post('idRecord')); //статус записи
                    foreach ($data['state'] as $row) {
                        $stateDb = $row->state;
                    }

//редактирование общей информации -----------------------------------------------------------------------
                    //либо empty либо редактирует ответственный УМЧС
                    if (empty($data['status']) || (( $this->session->userdata('level_id') == 2) && ($this->session->userdata('role_id') == 1))) {
                        $state = FALSE;
                    } else {
                        foreach ($data['status'] as $row) {
                            if ($row->status == 0)
                                $state = FALSE;
                            elseif ($row->status == 3) {
                                // echo $stateDb;
                                if ($stateDb == 4) {
                                    $data['mistake'] = $this->edit_model->get_state_mistake($this->input->post('idRecord')); //state, в которое надо вернуть запись после внесения обновлений
                                    foreach ($data['mistake'] as $row) {
                                        $state = $row->tostate;
                                    }
                                } else
                                    $state = 2;
                                //echo '';
                            } else
                                $state = 2;
                        }
                    }
                    $data['all'] = $this->edit_model->update_record($state); //редактирование общей информации
                }



//редактирование техники --------------------------------------------------------------------------------------------
                // $data['countDb'] = $this->edit_model->get_count_technic($this->input->post('idRecord')); //количество единиц техники в БД
                $data['idTech'] = $this->edit_model->get_id_technic($this->input->post('idRecord')); //id единиц техники в БД
                $this->edit_model->update_technic($data['idTech']);
//------------------------------------------------------------------------------------------------------------------


                $this->edit_model->set_logs(2);

                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('edit/bread');

                //получить id_loc_org - для перехода на карточку РОЧС, которую проверяет УМЧС, по кнопке "назад"
                if (( $this->session->userdata('level_id') == 2) && ($this->session->userdata('role_id') == 1)) {
                    $data['id_card'] = $this->edit_model->get_idcard($this->input->post('idRecord'));
                    $this->load->view('edit/success', $data);
                } else {
                    $this->load->view('edit/success');
                }


                $this->load->view('templates/footer');
            }
        }
    }

    public function complete() {//отправка на подпись
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $idRec = $this->uri->segment(3);
            $data['idRecord'] = $this->uri->segment(3);
            $data['idCard'] = $this->edit_model->get_idcard($idRec); //получить id карточки

            $data['check'] = $this->edit_model->check(3, $data['idCard']); //авторизован ли пользователь

            if ($data['check'] == 1) {

                header('Location:/ss/edit');

            } else

                header('Location:/ss/auth');

        }

        else {//отправка на подпись
            $action = 2;
            $data['lastsend'] = $this->edit_model->last_complete($action, $this->session->userdata('locorg_id')); //было ли до этого редактирование карточки

            if (!empty($data['lastsend'])) //если да
                $sign = 1;
            else
                $sign = NULL;

            $data['send'] = $this->edit_model->complete($action, $sign, $this->session->userdata('locorg_id')); //отправка на подпись
            
           if ($this->session->userdata('orgid') == 4) {//УМЧС исполнитель отправляет карточку сразу в УМЧС на подтверждение
                $status = 2;
            } else {
                $status = 0;
            }
            $data['statuscards'] = $this->fill_model->set_status($status, 0, $this->session->userdata('locorg_id')); //изменить статус карточки
            //************************ подписи, собранные ранее, слетают
            $this->query_model->delete_action(3, $this->session->userdata('locorg_id')); // подпись слетает
            $this->query_model->delete_action(5, $this->session->userdata('locorg_id')); // подтверждение слетает
            $this->query_model->delete_action(6, $this->session->userdata('locorg_id')); // подтверждение РЦУ слетает
            //************************ конец подписи, собранные ранее, слетают

            $this->load->view('templates/header');
            $this->load->view('templates/menuauth');
            $this->load->view('edit/bread');
            $this->load->view('edit/ok', $data);
            $this->load->view('templates/footer');
        }
    }

}
