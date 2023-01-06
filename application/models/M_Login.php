<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ceklogin()
    {
        //variable
        $user     = $this->input->post('username');
        $pass    = MD5($this->input->post('password'));
        $q        = "SELECT * FROM tb_user WHERE username='$user' AND password='$pass'";
        $db        = $this->db->query($q);
        if ($db->num_rows() != 0) {
            $db = $db->row();
            if ($db->hak_akses == "1") {
                // $data	= array('role' => 'Admin', ); 
                $_SESSION['username'] = $db->username;
                $_SESSION['id_user'] = $db->id_user;
                $_SESSION['nama'] = $db->nama;
                $_SESSION['foto'] = $db->foto;
                $_SESSION['jabatan'] = $db->jabatan;
                $_SESSION['hak_akses'] = "admin";

                $msg    = "<script>Swal.fire({
						  icon: 'success',
						  title: 'Selamat datang Admin',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect('dashboard');
            } else if ($db->hak_akses == "2") {
                // $data	= array('role' => 'Admin', ); 
                $_SESSION['username'] = $db->username;
                $_SESSION['id_user'] = $db->id_user;
                $_SESSION['nama'] = $db->nama;
                $_SESSION['foto'] = $db->foto;
                $_SESSION['jabatan'] = $db->jabatan;
                $_SESSION['hak_akses'] = "staff";

                $msg    = "<script>Swal.fire({
						  icon: 'success',
						  title: 'Selamat datang Staff MRC',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect('dashboard');
            } else if ($db->hak_akses == "3") {
                // $data	= array('role' => 'Admin', ); 
                $_SESSION['username'] = $db->username;
                $_SESSION['id_user'] = $db->id_user;
                $_SESSION['nama'] = $db->nama;
                $_SESSION['foto'] = $db->foto;
                $_SESSION['jabatan'] = $db->jabatan;
                $_SESSION['hak_akses'] = "kepala";

                $msg    = "<script>Swal.fire({
						  icon: 'success',
						  title: 'Selamat datang Kepala MRC',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect('dashboard');
            } else if ($db->hak_akses == "4") {
                // $data	= array('role' => 'Admin', ); 
                $_SESSION['username'] = $db->username;
                $_SESSION['id_user'] = $db->id_user;
                $_SESSION['nama'] = $db->nama;
                $_SESSION['foto'] = $db->foto;
                $_SESSION['jabatan'] = $db->jabatan;
                $_SESSION['hak_akses'] = "wakasek";

                $msg    = "<script>Swal.fire({
						  icon: 'success',
						  title: 'Selamat datang Wakasek Sarpras',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect('dashboard');
            }
        } else {
            $msg    = "<script>Swal.fire({
						  icon: 'error',
						  title: 'Username atau Password Salah',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
            $this->session->set_flashdata("pesan", $msg);
            redirect('login');
        }
    }
}
