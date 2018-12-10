<?php

class Card extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('card_model');
        $this->load->model('query_model');
        $this->load->model('fill_model');
        $this->load->model('edit_model');

        $this->load->helper('url');
    }

    public function index() {

        $region = $this->uri->segment(2); //карточка области
        $data['region'] = $this->uri->segment(2);

        $idCard = $this->uri->segment(3); //карточка района
        if (isset($idCard)) {
            $data['idCard'] = $this->uri->segment(3);
        }

        if ((!empty($idCard)) && (!empty($region))) {//выбрана карточка района
            //$data['card'] = $this->remove_model->get_record($idRec); //карточка района
            $data['caption'] = $this->edit_model->caption($idCard); //название карточки
            $data['datecaption'] = $this->edit_model->date_caption($idCard); //дата карточки
            $data['datefoot'] = $this->edit_model->date_foot($idCard); //дата карточки
           // $data['who_work']=  $this->card_model->get_action_in_work($idCard);//кто в РЦУ взял в работу карточку, если она в работе в РЦУ


            /*  if ($idCard == 160) {//ROSN
              $orgid = 8;
              $data['recordkey'] = $this->edit_model->get_recordidROSN($orgid); //выбор id записей как ключей
              $data['card'] = $this->edit_model->get_cardROSN($orgid); //все записи карточки
              } else { */
            $data['recordkey'] = $this->edit_model->get_recordid($idCard); //выбор id записей как ключей
            $data['card'] = $this->edit_model->get_card($idCard); //все записи карточки
            // }



            $data['mis'] = $this->edit_model->get_mistakes($idCard); //все ошибки карточки

            $this->load->view('templates/header');
            $userId = $this->session->userdata('user_id');
            if (!empty($userId)) {
                $this->load->view('templates/menuauth');
            } else {
                $this->load->view('templates/menu');
            }
            $this->load->view('card/bread');
            $this->load->view('card/print');
            $this->load->view('templates/caption', $data); //название карточки
            $this->load->view('card/view', $data); //карточка

            $this->load->view('templates/foot', $data); //кто заполнял
            $this->load->view('edit/legend', $data); //легенда карточки
            //$this->load->view('card/back', $data); //кнопка назад
        } else {
            $data['recordkey'] = $this->card_model->get_recordid($region); //выбор id записей области как ключей
            $data['card'] = $this->card_model->get_card($region); //все записи карточки области

            $data['caption'] = $this->card_model->caption_region($region); //название карточки области
            $data['datecaption'] = $this->card_model->date_caption($region); //дата карточки
            //$data['mis'] = $this->edit_model->get_mistakes($idCard); //все ошибки карточки

            $this->load->view('templates/header');
            $userId = $this->session->userdata('user_id');
            if (!empty($userId)) {
                $this->load->view('templates/menuauth');
            } else {
                $this->load->view('templates/menu');
            }
            $this->load->view('card/bread');
            $this->load->view('card/print');
            $this->load->view('card/caption', $data); //название карточки
            $this->load->view('card/region', $data); //карточка области


            $this->load->view('edit/legend', $data); //легенда карточки
            // $this->load->view('card/back', $data); //кнопка назад
        }
        $this->load->view('templates/footer');
    }

    public function rb() {

//карточка по РБ---------------------------------------------------------------------------------------------------------------
        $data['recordkey'] = $this->card_model->get_recordid(NULL); //выбор id записей  как ключей
        $data['card'] = $this->card_model->get_card(NULL); //все записи

        $this->load->view('templates/header');
        $userId = $this->session->userdata('user_id');
        if (!empty($userId)) {
            $this->load->view('templates/menuauth');
        } else {
            $this->load->view('templates/menu');
        }

        $this->load->view('card/print');
        $this->load->view('card/rb', $data);

        $this->load->view('templates/footer');
    }

}
