<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Login');
        if (!_is_logged_in()) {
            redirect("login");
        }
    }

    public function index()
    {
        if ($_SESSION['hak_akses'] == "admin") {
            $data['user']   = $this->M_User->view_user();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_blokir');
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_tambah_user');
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        $data['user'] = $this->M_User->proses_tambah();
        $pesan        = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#0dd910',
            title: 'User berhasil ditambahkan!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata("pesan", $pesan);
        redirect("user");
    }

    public function edit()
    {
        $id_user  = $this->uri->segment(3);
        $data['user']  = $this->M_User->view_edit_user($id_user);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_edit_user', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit($id_user)
    {
        $this->M_User->proses_edit($id_user);
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#ffa200',
            title: 'User berhasil diubah!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect("user");
    }

    public function hapus($id_user)
    {
        $this->M_User->hapus($id_user);
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'info',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#ff1a1d',
            title: 'User berhasil dihapus!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect('user');
    }
}
