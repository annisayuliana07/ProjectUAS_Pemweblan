<?php
class Anggota_Model extends CI_Model {

        public $id_anggota;
        public $nama_anggota;
        public $tgl_lahir;
        public $no_telp;
        public $alamat;
        
        public function get_all()
        {
            $query = $this->db->get('anggota');
            return $query;
            
        }

        public function get_anggota()
        {
            $query = $this->db->get('anggota');
            return $query;
            
        }
        
        public function insert_entry2($data)
        {
            $this->db->insert('anggota', $data);
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
		
		public function detail_data($id_anggota = NULL)
		{
			$query=$this->db->get_where('anggota', array('id_anggota'=>$id_anggota))->row();
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
