<?php
class Admin_Model extends CI_Model
{

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

    public function cek_login($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('admin');
    }

    public function getLoginData($user, $pass)
    {
        $u = $user;
        $p = $pass;

        $query_cekLogin = $this->db->get_where(
            'admin',
            array('username' => $u, 'password' => $p)
        );
        if (count($query_cekLogin->result()) > 0) {
            foreach ($query_cekLogin->result() as $qck) {
                foreach ($query_cekLogin->result() as $ck) {
                    $sess_data['logged_in'] = TRUE;
                    $sess_data['username'] = $ck->username;
                    $sess_data['password'] = $ck->password;
                    $sess_data['id_admin'] = $ck->id_admin;

                    $this->session->set_userdata($sess_data);
                }
                redirect('home'); //jika pass dan uname benar 
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf Username dan Password Anda Salah</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('login'); //jika pass dan uname salah
        }
    }
}
