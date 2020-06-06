<?php
class Kategori_Model extends CI_Model {

        public $id_kategori;
        public $jenis;

        public function get_kategori()
        {
            $query = $this->db->get('kategori');
            return $query;
            
        }


}
