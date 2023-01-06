<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Barang');
        $this->load->model('M_Ruangan');
        $this->load->model('M_Login');
        if (!_is_logged_in()) {
            redirect("login");
        }
    }

    public function index()
    {
        $data['barang'] = $this->M_Barang->view_barang();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['barang']  = $this->M_Barang->view_barang();
        $data['ruang']  = $this->M_Ruangan->view_ruangan();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_tambah_barang', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        $data['barang'] = $this->M_Barang->proses_tambah();
        $pesan          = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#0dd910',
            title: 'Barang berhasil ditambahkan!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata("pesan", $pesan);
        redirect("barang");
    }

    public function edit()
    {
        $id_barang  = $this->uri->segment(3);
        $data['barang']  = $this->M_Barang->view_edit_barang($id_barang);
        $data['ruang'] = $this->M_Ruangan->view_ruangan();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_edit_barang', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit($id_barang)
    {
        $this->M_Barang->proses_edit($id_barang);
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#ffa200',
            title: 'Barang berhasil diubah!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect("barang");
    }

    public function hapus($id_barang)
    {
        $this->M_Barang->hapus($id_barang);
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'info',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#ff1a1d',
            title: 'Barang berhasil dihapus!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect('barang');
    }
}
