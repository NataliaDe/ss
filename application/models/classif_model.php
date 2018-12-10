<?php

class Classif_model extends CI_Model {

    public function __construct() {

    }

    public function get_technic($id) {
        
        if($id==NULL) {//выбор всего списка техники
           $this->db->select('*');
        $this->db->from('views');
        $this->db->order_by("name", "desc");
        $query = $this->db->get();
        return $query->result(); 
        }
        else {//выбор наименования конкретного вида техники
           $this->db->select('*');
        $this->db->from('views');
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query->result();  
        }
        
    }
 

    public function check_technics() {//есть ли такая запись в БД
        $this->db->select('id');
        $this->db->from('views');
        $this->db->where('name', $this->input->post('technicName'));
        $query = $this->db->get();
        return $query->result();
    }
    
       public function check_technics_for_upd($id) {//есть ли такая запись в БД
        $this->db->select('id');
        $this->db->from('views');
        $this->db->where('name', $this->input->post('technicName'));
         $this->db->where( 'id !=', $id);
        $query = $this->db->get();
        return $query->result();
        
    }
   

    public function set_technics() {
        $technics = array(
            'name' => $this->input->post('technicName'),
             'description' => $this->input->post('descTech')
        );
        $this->db->insert('views', $technics);
    }
    
       public function update_technics($name,$id, $des) {
        $technics = array(
            'name' => $name,
            'description' => $des
        );
          $where = array(
            'id' => $id
        );
          $this->db->where($where);
        $this->db->update('views', $technics);
    }
    
          public function delete_technics($id) {
     
         
          $this->db->where("id", $id);
        $this->db->delete('views');
    }

          public function nodelete() {
          $this->db->select('id_view');
          $this->db->from('technics');
          $query = $this->db->get();
        return $query->result();
    }
    
}
