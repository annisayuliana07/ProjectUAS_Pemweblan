<?php
class Buku_Model extends CI_Model {

        public $id_buku;
        public $judul_buku;
        public $penerbit;
        public $pengarang;
        public $id_kategori;
        
        
        
        public function insert_entry2($data)
        {
            $this->db->insert('buku', $data);
        }

        
        public function get_join()
        {
            //$query = $this->db->get('mahasiswa');
            $this->db->select('*');
            $this->db->from('buku');
            $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
            $query = $this->db->get();
            return $query;
            
        }


        public function get_kategori()
        {
            $query = $this->db->get('kategori');
            return $query;
            
        }

        public function get_buku()
        {
            $query = $this->db->get('buku');
            return $query;
            
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}
