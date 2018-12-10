<?php

class Tables extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tables_model');
		$this->load->helper('url');
    }

    public function index() {//list table
        if (($this->session->userdata('level_id'))) { //если авторизован
            $this->load->view('templates/header');
            $this->load->view('templates/menuauth');
            if ((($this->session->userdata('level_id')) == 1) && (($this->session->userdata('role_id')) == 3)) {//admin rcu
                $table = $this->uri->segment(2); //name table

                if (!empty($table)) {//view table
                    if ($table == 'radmins') {
                        $data['delete'] = $this->tables_model->check_radmins_delete();

                        $data['radmins'] = $this->tables_model->get_radmins(NULL);
                        $this->load->view('tables/get_radmins', $data);
                        $this->load->view('tables/back');
                    }
                    if ($table == 'radmin_region') {


                        $data['radmin_region'] = $this->tables_model->get_radmin_region(NULL);
                        $this->load->view('tables/get_radmin_region', $data);
                        $this->load->view('tables/back');
                    }
                    if ($table == 'users') {


                        $data['users'] = $this->tables_model->get_users();
                        $this->load->view('tables/get_users', $data);
                        $this->load->view('tables/back');
                    }
                } else {
                    $this->load->view('tables/index');
                }
            } else {
                $this->load->view('tables/permissions');
            }
            $this->load->view('templates/footer');
        } else
            header('Location:/ss/auth');
    }

    public function edit() {//
        $this->load->view('templates/header');
        $this->load->view('templates/menuauth');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $table = $this->uri->segment(3); //name table
            $id = $this->uri->segment(4); //id record



            if (!empty($table)) {//view form
                if ($table == 'radmins') {
                    $data['radmins'] = $this->tables_model->get_radmins($id);
                    $this->load->view('tables/form_radmins', $data);
                    //$this->load->view('tables/back');
                }
                if ($table == 'radmin_region') {
                    $data['radmin_region'] = $this->tables_model->get_radmin_region($id);
                    $data['radmins'] = $this->tables_model->get_radmins(NULL);
                    $this->load->view('tables/form_radmin_region', $data);

                    //$this->load->view('tables/back');
                }
            } else {
                $this->load->view('tables/index');
            }
        } else {

            if (isset($_POST['radmins'])) {
                // echo '222333';
                // header('Location:/ss/tables/radmins');
                $data['check'] = $this->tables_model->check_radmins($this->input->post('id'), $this->input->post('psw'), $this->input->post('fio'));
                if (empty($data['check'])) { //psw unique
                    $this->tables_model->set_radmins($this->input->post('id'), $this->input->post('fio'), $this->input->post('psw'));
                    header('Location:/ss/tables/radmins');
                } else {
                    $data['id'] = $this->input->post('id');
                    $this->load->view('tables/error_radmins', $data);
                    //header('Location:/ss/tables/edit/radmins/' . $this->input->post('id'));
                }
            }

            if (isset($_POST['radmin_region'])) {

                $data['check'] = $this->tables_model->check_radmin_region($this->input->post('region'), $this->input->post('fio'));
                if (empty($data['check'])) { // unique
                    $this->tables_model->set_radmin_region($this->input->post('id'), $this->input->post('fio'));
                    header('Location:/ss/tables/radmin_region');
                } else {
                    $data['id'] = $this->input->post('id');
                    $this->load->view('tables/error_radmin_region', $data);
                    //header('Location:/ss/tables/edit/radmins/' . $this->input->post('id'));
                }
            }
        }
        $this->load->view('templates/footer');
    }

    public function newrecord() {
        $this->load->view('templates/header');
        $this->load->view('templates/menuauth');

        if (isset($_POST['radmins'])) {
            $data['check'] = $this->tables_model->check_radmins(NULL, $this->input->post('psw'), $this->input->post('fio'));
            if (empty($data['check'])) { //psw unique
                $this->tables_model->set_radmins(NULL, $this->input->post('fio'), $this->input->post('psw'));
                header('Location:/ss/tables/radmins');
            } else {

                $this->load->view('tables/error_radmins', $data);
                //header('Location:/ss/tables/edit/radmins/' . $this->input->post('id'));
            }
        }
        $this->load->view('templates/footer');
    }

    /* public function radmins() {//radmins table
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $data['radmins'] = $this->tables_model->get_radmins();
      $this->load->view('templates/header');
      $this->load->view('templates/menuauth');

      if (!empty($data['radmins'])) {
      $this->load->view('tables/radmins', $data);
      } else {
      echo 'нет данных для отображения';
      }
      $this->load->view('templates/footer');
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      } */

    public function remove() {
 //echo 'Radmins';
        $this->load->view('templates/header');
        $this->load->view('templates/menuauth');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $table = $this->uri->segment(3); //name table
            $id = $this->uri->segment(4); //id record

            $data['id'] = $id;

            if (!empty($table)) {//view form
                if ($table == 'radmins') {
                    $this->load->view('tables/messages_delete');
                    $this->load->view('tables/radmins_delete', $data);
                }
            }
        }
           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       // echo 'Radmins';
            if (isset($_POST['radmins'])) {
       
                $this->tables_model->delete_radmins($this->input->post('id'));
                header('Location:/ss/tables/radmins/');
            }
        }

        $this->load->view('templates/footer');
    }
    
    public function rem(){
        echo 'ghghhghghhghg';
    }

}
