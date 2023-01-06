<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Ruangan');
        $this->load->model('M_Login');
        if (!_is_logged_in()) {
            redirect("login");
        }
    }

    public function index()
    {
        if ($_SESSION['hak_akses'] == "admin") {
            $data['ruangan']    = $this->M_Ruangan->view_ruangan();
            $data['barangruang']    = $this->M_Ruangan->barang_ruang();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_ruangan', $data);
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
        if ($_SESSION['hak_akses'] == "admin") {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_tambah_ruangan');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_blokir');
            $this->load->view('templates/footer');
        }
    }

    public function proses_tambah()
    {
        $data['ruangan'] = $this->M_Ruangan->proses_tambah();
        $pesan          = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#0dd910',
            title: 'Ruangan berhasil ditambahkan!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata("pesan", $pesan);
        redirect("ruangan");
    }

    public function edit()
    {
        if ($_SESSION['hak_akses'] == "admin") {
            $id_ruangan  = $this->uri->segment(3);
            $data['ruangan'] = $this->M_Ruangan->view_edit_ruangan($id_ruangan);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_edit_ruangan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_blokir');
            $this->load->view('templates/footer');
        }
    }

    public function proses_edit($id_ruangan)
    {
        $this->M_Ruangan->proses_edit($id_ruangan);
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#ffa200',
            title: 'Ruangan berhasil diubah!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect("ruangan");
    }

    public function hapus($id_ruangan)
    {
        $this->M_Ruangan->hapus($id_ruangan);
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'info',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#ff1a1d',
            title: 'Ruangan berhasil dihapus!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect('ruangan');
    }
}
