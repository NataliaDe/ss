<?php

class Classif extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('classif_model');
        $this->load->model('home_model');
        $this->load->model('fill_model');
        $this->load->model('edit_model');
        $this->load->helper('url');
    }

    public function index() {


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $userId = $this->session->userdata('user_id');
            if (!empty($userId)) {

                $idTech = $this->uri->segment(2); //редактирование

                if (!empty($idTech)) {//редактирование
                    $data['idTechnic'] = $this->uri->segment(2);
                    // echo $idRec;
                    $data['technics'] = $this->classif_model->get_technic($idTech); //получить 1 наименование техники
                    $this->load->view('templates/header');
                    $this->load->view('templates/menuauth');
                    $this->load->view('classif/bread');
                    $this->load->view('classif/formedit', $data);
                    $this->load->view('classif/back');
                    $this->load->view('templates/footer');
                } else {
                    $data['technics'] = $this->classif_model->get_technic(NULL); //получить наименование техники
                    $data['nodelete'] = $this->classif_model->nodelete(); //no delete technics
                    $this->load->view('templates/header');
                    $this->load->view('templates/menuauth');
                    $this->load->view('classif/bread');
                    $this->load->view('classif/index', $data);
                    $this->load->view('templates/footer');
                }
            } else {


                header('Location:/ss/auth');

            }
        } else {
            if (isset($_POST['ok'])) {

                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('classif/bread');

                $data['check'] = $this->classif_model->check_technics(); //проверить существует ли такая техника
               
                if (empty($data['check'])) {//не существует
                    $this->classif_model->set_technics(); //записать наименование техники
                    $data['ok'] = 1; //insert
                    $this->load->view('classif/success', $data);
                } else {
                    $this->load->view('classif/error');
                }
            } elseif (isset($_POST['updateTech'])) {//edit

                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('classif/bread');

                $data['checkupd'] = $this->classif_model->check_technics_for_upd($this->input->post('id')); //проверить существует ли такая техника
               // print_r($data['checkupd']);
                
                if (empty($data['checkupd'])) {//не существует
                    $this->classif_model->update_technics($this->input->post('technicName'), $this->input->post('id'), $this->input->post('descTech')); //сохранить изменения
                    $data['ok'] = 2; //update
                    $this->load->view('classif/success', $data);
                } else {
                    $this->load->view('classif/error');
                }
            } elseif (isset($_POST['delete'])) {
                $this->load->view('templates/header');
                $this->load->view('templates/menuauth');
                $this->load->view('classif/bread');

                $this->classif_model->delete_technics($this->input->post('id')); //delete
                $data['ok'] = 3; //delete
                $this->load->view('classif/success', $data);
            }
            $data['technics'] = $this->classif_model->get_technic(NULL); //получить наименование техники
            $data['nodelete'] = $this->classif_model->nodelete(); //no delete technics
            $this->load->view('classif/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function remove() {//remove technic
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $userId = $this->session->userdata('user_id');
            if (!empty($userId)) {

                $idTech = $this->uri->segment(3); //delete

                if (!empty($idTech)) {//delete
                    $data['idTechnic'] = $this->uri->segment(3);
                    $data['technics'] = $this->classif_model->get_technic($idTech); //получить 1 наименование техники
                    $this->load->view('templates/header');
                    $this->load->view('templates/menuauth');
                    $this->load->view('classif/removeform', $data);
                    $this->load->view('classif/back');
                    $this->load->view('templates/footer');
                }
            }
        }
    }

}
