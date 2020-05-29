<?php
class Admin_Model extends CI_Model {

        public $id_admin;
        public $username;
        public $password;
        public $no_telp;
        public $alamat;
        
        public function get_admin()
        {
            $query = $this->db->get('admin');
            return $query;
            
        }

}
