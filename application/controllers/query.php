<?php

class Query extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('query_model');
        $this->load->model('fill_model');
        $this->load->model('edit_model');
        $this->load->model('remove_model');
        $this->load->helper('url');
    }

    public function index() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data['check'] = $this->edit_model->check(NULL, NULL); //авторизован ли пользователь

            if ($data['check'] == 1) {//авторизован
                if ($this->session->userdata('level_id') == 2) {//ОУМЧС;
                    $region = $this->session->userdata('region_id');
                    $status = 2;
                } elseif ($this->session->userdata('level_id') == 1) {//РЦУ
                    $region = NULL;
                    $status = 1;
                }
                //******************************* рцу, умчс
                if ($this->session->userdata('level_id') != 3) {//умчс, рцу
                    $data['list'] = $this->query_model->get_list($region, $status); //получить список органов, где надо подтвердить карточку

                    $this->load->view('templates/header');
                    $this->load->view('templates/menuauth');
                    $this->load->view('query/bread');
                    /* if ($this->session->userdata('level_id') == 1) {//РЦУ
                      $this->load->view('query/fiowork', $data);
                      } */

                    if (!empty($data['list'])) {
                        $this->load->view('query/msg', $data); //сообщение
                        if ($this->session->userdata('level_id') == 1) {//РЦУ
                            $action = 8;
                            $data['workfio'] = $this->query_model->get_work_fio($action); //выбрать всю информацию, где idAction=8(взята в раб)
                        }
                        $this->load->view('query/index', $data);
                    } else
                        $this->load->view('requests/msgempt', $data); //заявок нет
                    $this->load->view('templates/footer');
                }
                //**************************************** руководитель
                else {
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

                        /*  if ($this->session->userdata('orgid') == 8) {//ROSN
                          $orgid = 8;
                          $data['recordkey'] = $this->edit_model->get_recordidROSN($orgid); //выбор id записей как ключей
                          $data['card'] = $this->edit_model->get_cardROSN($orgid); //все записи карточки
                          } else { */
                        $data['recordkey'] = $this->edit_model->get_recordid($this->session->userdata('locorg_id')); //выбор id записей как ключей
                        $data['card'] = $this->edit_model->get_card($this->session->userdata('locorg_id')); //все записи карточки
                        // }
                        $data['caption'] = $this->edit_model->caption($this->session->userdata('locorg_id')); //название карточки
//------------------------- get mistakes -----------------------------
                        /* $org = $this->session->userdata('orgid');
                          if ($org == 8)//ROSN
                          $data['mis'] = $this->edit_model->get_mistakesROSN($org); //все ошибки карточки
                          else *///иначе
                        $data['mis'] = $this->edit_model->get_mistakes($this->session->userdata('locorg_id')); //все ошибки карточки
//------------------------- end get mistakes -----------------------------

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
                }
            } else //не авторизован

                header('Location:/ss/auth');

        }
    }

    public function work() {//взять карточку в работу
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data['check'] = $this->edit_model->check(NULL, NULL); //авторизован ли пользователь

            if ($data['check'] == 1) {//авторизован
                $idCard = $this->uri->segment(3);
                $data['idCard'] = $this->uri->segment(3);
//************* берем в работу
                if ($this->session->userdata('level_id') == 1) {//РЦУ
                    $this->load->view('templates/header');
                    $this->load->view('templates/menuauth');
                    $this->load->view('query/bread');
                    $this->load->view('query/auth', $data); // авторизация
                    $this->load->view('templates/footer');
                } else {//УМЧС
                    $data['work'] = $this->edit_model->in_work(1, $idCard);
                    //echo 'dfdf';
                    //header('Location:/ss/query');
                     header('Location:/ss/query/view/'.$idCard);
                }
//************* конец берем в работу
            }
        }
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($this->session->userdata('level_id') == 1)) {//РЦУ ввел пароль
            $data['auth'] = $this->query_model->get_auth($this->input->post('password')); //есть ли такой пользователь в radmins table

            if (!empty($data['auth'])) {//yes
                foreach ($data['auth'] as $key => $value) {
                    $fio = $value->fio;
                    $id = $value->id_admin;
                    $psw = $value->pssw;
                }
                if ($psw == 1) //просто user
                    header('Location:/ss/query/work/' . $this->input->post('idCard')); //нельзя взять в работу
                else {//тот, кто имеет право на подтв/откл(есть в таблице radmins и имеет право взять в раб)
                    $newdata = array(
                        'fio' => $fio,
                        'id_admin' => $id
                    );

                    $this->session->set_userdata($newdata); //запомнить в сессию
                    $data['lastsend'] = $this->edit_model->last_complete(8, $this->input->post('idCard')); //было ли до этого взята в раб карточки
                    //$data['lastok'] = $this->edit_model->last_complete(6, $this->input->post('idCard')); //было ли до этого подтверждена карточка РЦУ
                    //$data['lastrefuse'] = $this->edit_model->last_complete(7, $this->input->post('idCard')); //было ли до этого отклонена карточка РЦУ
                    if (!empty($data['lastsend'])) //если да
                        $s = 1;
                    else
                        $s = NULL;

                    $this->query_model->set_inf($this->input->post('idCard'), 8, $s);

                    /* if (!empty($data['lastok'])) //если да
                      $s = 1; //удаляем
                      else
                      $s = NULL; //ничего
                      $this->query_model->action_delete(6, $s, $this->input->post('idCard')); //подтверждение delete
                      if (!empty($data['lastrefuse'])) //если да
                      $s = 1; //удаляем
                      else
                      $s = NULL; //ничего
                      $this->query_model->action_delete(7, $s, $this->input->post('idCard')); //отклонение delete
                     */
                    //**********************************
                    $data['work'] = $this->edit_model->in_work(1, $this->input->post('idCard')); //взять в работу
                    //header('Location:/ss/query');
                    header('Location:/ss/query/view/'.$this->input->post('idCard'));
                }
            } else {//нет в таблице radmins
                header('Location:/ss/query/work/' . $this->input->post('idCard'));
            }
        }
    }

    public function view() {//отображение карточки
        $data['check'] = $this->edit_model->check(NULL, NULL); //авторизован ли пользователь

        if ($data['check'] == 1) {//авторизован

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $idCard = $this->uri->segment(3); //id карточки
                $data['idCard'] = $this->uri->segment(3);


                $idRec = $this->uri->segment(4); //id записи
                if (isset($idRec)) {
                    $data['idRecord'] = $this->uri->segment(4);
                }

                if ((!empty($idRec)) && (!empty($idCard))) {//выбрана запись для отклонения
                    $data['card'] = $this->remove_model->get_record($idRec); //запись
                    $this->load->view('templates/header');
                    $this->load->view('templates/menuauth');
                    $this->load->view('query/bread');
                    $this->load->view('query/refuseform', $data);
                } else {//просмотр карточки
                    $data['caption'] = $this->edit_model->caption($idCard); //название карточки
                    $data['datecaption'] = $this->edit_model->date_caption($idCard); //дата карточки
                    $data['datefoot'] = $this->edit_model->date_foot($idCard); //дата карточки

                    /* if ($idCard == 160) {//ROSN
                      $orgid = 8;
                      $data['recordkey'] = $this->edit_model->get_recordidROSN($orgid); //выбор id записей как ключей
                      $data['card'] = $this->edit_model->get_cardROSN($orgid); //все записи карточки
                      } else { */
                    $data['recordkey'] = $this->edit_model->get_recordid($idCard); //выбор id записей как ключей
                    $data['card'] = $this->edit_model->get_card($idCard); //все записи карточки
                    // }


                    $data['mis'] = $this->edit_model->get_mistakes($idCard); //все ошибки карточки
                    //print_r($data['mis']);
                    $this->load->view('templates/header');
                    $this->load->view('templates/menuauth');
                    $this->load->view('query/bread');



                    if ($this->session->userdata('level_id') == 1) {//РЦУ
                        $adm = $this->session->userdata('id_admin');
                        //echo '****' . $adm;
                        if ((!empty($adm))) { //авторизован тот, кто может подтверждать/отклонять
                            $data['yes'] = $this->query_model->get_yes($idCard, $adm, 8); // выбранная карточка принадлежит данному пользователю?
                            //$this->load->view('query/fiowork', $data);
                            $this->load->view('templates/caption', $data); //название карточки
                            $this->load->view('query/view', $data); //карточка

                            $this->load->view('templates/foot', $data); //кто заполнял
                            $this->load->view('edit/legend', $data); //легенда карточки
                            if (!empty($data['yes'])) {
                                $this->load->view('query/write', $data); //кнопка подтвердить
                            }

                            //$this->load->view('query/back', $data); //кнопка назад

                        } else {
                            //echo 'empt';
                            $this->load->view('query/checkauth', $data);
                        }
                    } elseif ($this->session->userdata('level_id') == 2) {//ОУМЧС;
                        $this->load->view('templates/caption', $data); //название карточки
                        $this->load->view('query/view', $data); //карточка

                        $this->load->view('templates/foot', $data); //кто заполнял
                        $this->load->view('edit/legend', $data); //легенда карточки
                        $this->load->view('query/write', $data); //кнопка подтвердить
                        //$this->load->view('query/back', $data); //кнопка назад

                    }
                }
                $this->load->view('templates/footer');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {//проверка пароля для РЦУ
                $data['auth'] = $this->query_model->get_auth($this->input->post('password')); //есть ли такой пользователь в radmins table
                $card = $this->input->post('idCard');
                if (!empty($data['auth'])) {//yes
                    foreach ($data['auth'] as $key => $value) {
                        $fio = $value->fio;
                        $id = $value->id_admin;
                    }
                    $newdata = array(
                        'fio' => $fio,
                        'id_admin' => $id
                    );
                    $this->session->set_userdata($newdata); //запомнить в сессию
                    header('Location:/ss/query/view/' . $card);
                } else {
                    header('Location:/ss/query/view/' . $card);
                }
                /* else {

                  $newdata = array(
                  'idAdmin' => 1
                  );
                  } */
            }
        } else //не авторизован

            header('Location:/ss/auth');

    }

    public function refuse() {//отклонить запись
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data['check'] = $this->edit_model->check(NULL, NULL); //авторизован ли пользователь

            if ($data['check'] == 1) {//авторизован

                header('Location:/ss/query');

            } else

                header('Location:/ss/auth');

        }
        else {
            if (isset($_POST['safe'])) {//отклоняем запись
                $data['state'] = $this->edit_model->get_state($this->input->post('idRecord')); //статус записи
                foreach ($data['state'] as $row) {
                    $stateDb = $row->state;
                }
                if ($this->session->userdata('level_id') == 3) {//рук
                    $data['idCard'] = $this->session->userdata('locorg_id'); //все записи карточки
                } else
                    $data['idCard'] = $this->input->post('idCard'); //все записи карточки

                $level = $this->session->userdata('level_id');
                if ($stateDb == 5) {
                    $newstate = 4;
                    $tostate = 2;
                } elseif ($stateDb == 4) {//только обновить описание ошибки
                    $newstate = NULL;
                    $tostate = NULL;
                } else {
                    $newstate = 4;
                    $tostate = $stateDb;
                }
                $data['refuse'] = $this->query_model->set_refuse($this->input->post('idRecord'), $newstate, $tostate, $level); //статус записи

                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('query/bread');
                $this->load->view('query/msgrefuse', $data); //сообщение о том что запись отклонена
                $this->load->view('templates/footer');
            }
        }
    }

    public function complete() {//отправка в РЦУ либо на доработку
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data['check'] = $this->edit_model->check(NULL, NULL); //авторизован ли пользователь

            if ($data['check'] == 1) {//авторизован

                header('Location:/ss/query');

            } else

                header('Location:/ss/auth');

        }

        else {
            if (isset($_POST['refuse'])) {//отклонить карточку
                if ($this->session->userdata('level_id') == 2) {//УМЧС
                    $action = 4; //отклонил
                } elseif ($this->session->userdata('level_id') == 1) {
                    $action = 7; //отклонил РЦУ
                } elseif ($this->session->userdata('level_id') == 3) {//рук
                    $action = 9; //отклонил рук
                }


                $data['lastsend'] = $this->edit_model->last_complete($action, $this->input->post('idCard')); //было ли до этого отклонение карточки

                if (!empty($data['lastsend'])) //если да
                    $sign = 1; //обновить Ф.И.О.
                else
                    $sign = NULL; //добавить

                $data['send'] = $this->edit_model->complete($action, $sign, $this->input->post('idCard')); //обновить/вставить действие
                $data['statuscards'] = $this->fill_model->set_status(3, 0, $this->input->post('idCard')); //изменить статус карточки


                $data['ok'] = 3; //карточка отправлена на доработку для вывода сообщения

                if ($this->session->userdata('level_id') != 3) {// не рук
                    //************************ подписи, собранные ранее, слетают
                    $this->query_model->delete_action(3, $this->input->post('idCard')); // подпись слетает
                    $this->query_model->delete_action(5, $this->input->post('idCard')); // подтверждение слетает
                    $this->query_model->delete_action(6, $this->input->post('idCard')); // подтверждение РЦУ слетает
                    //************************ конец подписи, собранные ранее, слетают
                }
                if ($this->session->userdata('level_id') == 1) {
                    $this->query_model->delete_action(8, $this->input->post('idCard')); // взял в работу РЦУ стереть
                }

//                $this->load->view('templates/header');
//                $this->load->view('templates/menuauth');
//                $this->load->view('query/bread');
//                $this->load->view('query/ok', $data);
//                $this->load->view('templates/footer');
                 header('Location:/ss/query/view/'.$this->input->post('idCard'));
            }
            if (isset($_POST['complete'])) {//подтвердить карточку
//удалить все ошибки, которые писал УМЧС
                if ($this->session->userdata('level_id') == 2) {//УМЧС
                    $action1 = 4; //откл УМЧС
                    $action2 = 5; //подтв УМЧС
                    $status = 1; //отпр в РЦУ
                }
                if ($this->session->userdata('level_id') == 1) {//РЦУ
                    $action1 = 7; //откл
                    $action2 = 6; //подтв
                    $action3 = 8; //взять в раб
                    $status = 4; // подтв карточку
                }
                if ($this->session->userdata('level_id') == 3) {//рук
                    $action1 = 9; //откл
                    $action2 = 3; //подписал

                     // РОСН, УГЗ,ИППК,ГИИ, Авиация
                    if (($this->session->userdata('orgid') == 8) || ($this->session->userdata('orgid') == 9)|| ($this->session->userdata('orgid') == 10)|| ($this->session->userdata('orgid') == 11)|| ($this->session->userdata('orgid') == 12)){
                        $status = 1; //отпр в РЦУ
                    }
                    
                    else
                        $status = 2; //отпр в УМЧС
                }

                //echo $this->input->post('idCard');
                $data['lastsend'] = $this->edit_model->last_complete($action1, $this->input->post('idCard')); //было ли до этого откл карточки

                if (!empty($data['lastsend'])) {//если да-удаляем запись 'отклонил'
                    $this->query_model->delete_action($action1, $this->input->post('idCard')); //удалить запись с событием 'отклонил'
                    //$this->query_model->delete_mistake($this->session->userdata('level_id')); //удалить ошибки
                }


                $data['idrecord'] = $this->edit_model->get_recordid($this->input->post('idCard')); //выбор id записей карточки как ключей
                $this->query_model->delete_mistake($this->session->userdata('level_id'), $data['idrecord']); //удалить ошибки

                if ($this->session->userdata('level_id') == 1) {//РЦУ
                    $this->query_model->delete_action($action3, $this->input->post('idCard')); //удалить запись с событием 'взял в раб'

                    $data['state'] = $this->query_model->get_state($this->input->post('idCard')); //получить state всех записей карточки
                    $this->query_model->set_state($data['state']); //установить state всех записей карточки
                }

                //$action = 5; //подтв УМЧС
                //echo $this->input->post('idCard');
                //------------ если авторизован руководитель, то idCard совпадает с session->userdata('locorg_id') -------------------------------

                $data['lastsend'] = $this->edit_model->last_complete($action2, $this->input->post('idCard')); //было ли до этого подтверждение карточки

                if (!empty($data['lastsend'])) //если да
                    $sign = 1;
                else
                    $sign = NULL;

                $data['send'] = $this->edit_model->complete($action2, $sign, $this->input->post('idCard')); //подтверждение
                $data['statuscards'] = $this->fill_model->set_status($status, 0, $this->input->post('idCard')); //изменить статус карточки
                //echo $sign;

                if ($this->session->userdata('level_id') != 3) {// не рук
//                    $this->load->view('templates/header');
//                    $this->load->view('templates/menuauth');
//                    $this->load->view('query/bread');
//                    $this->load->view('query/ok', $data);
//                    $this->load->view('templates/footer');
                      header('Location:/ss/query/view/'.$this->input->post('idCard'));
                } else {//рук
                    header('Location:/ss/query');
                }
            }
        }
    }

    public function returnn() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $idCard = $this->uri->segment(3); //id карточки
            $data['idCard'] = $this->uri->segment(3);

            $idRec = $this->uri->segment(4); //id записи
            if (isset($idRec)) {
                $data['idRecord'] = $this->uri->segment(4);
            }

            $data['tostate'] = $this->edit_model->get_state_mistake_level($idRec, $this->session->userdata('level_id')); //state, в которое надо вернуть запись после внесения обновлений
            foreach ($data['tostate'] as $k) {
                $tostate = $k->tostate;
            }
            $this->edit_model->set_state($idRec, $tostate); //вернуть запись в бывшее state


            $this->query_model->delete_mistake_rec($this->session->userdata('level_id'), $idRec); //удалить ошибки


            $org = $this->edit_model->get_orgid($idRec); //получить id organ записи
            foreach ($org as $row) {
                $orgid = $row->orgid;
            }

            if ($this->session->userdata('level_id') == 3) {//  рук
                header('Location:/ss/query');
            } elseif (($this->session->userdata('level_id') == 2) || ($this->session->userdata('level_id') == 1)) {//УМЧС, РЦУ
                if ($orgid == 8)
                    $idR = 160; //ROSN
                else
                    $idR = $idCard;
                header('Location:/ss/query/view/' . $idR);
            }
        }
    }

    //разлогирование
    public function logoff() {
        $this->session->unset_userdata('fio');
        $this->session->unset_userdata('id_admin');
        header('Location:/ss/query');
    }

}
