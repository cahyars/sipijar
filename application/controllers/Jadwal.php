<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_Login');
        $this->load->model('M_Jadwal_Pemeliharaan');
        if (!_is_logged_in()) {
            redirect("login");
        }
    }

    public function index()
    {
        $allEvents['result'] = $this->db->get("tb_jadwal")->result();

        foreach ($allEvents['result'] as $key => $value) {
            $allEvents['allEvents'][$key]['title'] = $value->deskripsi;
            $allEvents['allEvents'][$key]['start'] = $value->tgl_mulai;
            $allEvents['allEvents'][$key]['end'] = $value->tgl_selesai;
            $allEvents['allEvents'][$key]['backgroundColor'] = "#0e8ad8";
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_jadwal', $allEvents);
        $this->load->view('templates/footer');
    }

    public function kelola()
    {
        $data['jadwal']   = $this->M_Jadwal_Pemeliharaan->view_jadwal();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_kelola_jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['jadwal'] = $this->M_Jadwal_Pemeliharaan->view_jadwal_last();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_tambah_jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        $data['jadwal'] = $this->M_Jadwal_Pemeliharaan->proses_tambah();
        $pesan          = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#0dd910',
            title: 'Jadwal berhasil ditambahkan!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata("pesan", $pesan);
        redirect("jadwal/tambah");
    }

    public function edit()
    {
        $id_jadwal = $this->uri->segment(3);
        $data['jadwal'] = $this->M_Jadwal_Pemeliharaan->view_detail_jadwal($id_jadwal);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_edit_jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit($id_jadwal)
    {
        $this->M_Jadwal_Pemeliharaan->proses_edit($id_jadwal);
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#ffa200',
            title: 'Jadwal berhasil diubah!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect("jadwal/kelola");
    }

    public function hapus($id_jadwal)
    {
        $this->M_Jadwal_Pemeliharaan->hapus($id_jadwal);
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'info',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#ff1a1d',
            title: 'Jadwal berhasil dihapus!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect('jadwal/kelola');
    }
}
