<?php
class Peminjaman_Model extends CI_Model {

        public $id_pinjam;
        public $tgl_pinjam;
        public $tgl_kembali;
        public $id_anggota;
        public $id_buku;
        public $id_admin;
      
        public function insert_entry2($data)
        {
            $this->db->insert('peminjaman', $data);
        }
  
        public function get_join()
        {
            //$query = $this->db->get('mahasiswa');
            $this->db->select('*');
            $this->db->from('peminjaman');
            $this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
            $this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
            $this->db->join('admin', 'admin.id_admin = peminjaman.id_admin');
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
		
		public function DeleteData($where, $table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
		
		public function detail_data($id_pinjam = NULL)
		{
			$query=$this->db->get_where('peminjaman', array('id_pinjam'=>$id_pinjam))->row();
			return $query;
		}
  
		public function edit_data($where, $table)
		{
			return $this->db->get_where($table, $where);	
		}
		
		public function update_data($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);	
		}
}