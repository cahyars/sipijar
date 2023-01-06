<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
        $this->load->model('M_Pemeliharaan');
        $this->load->model('M_Ruangan');
        $this->load->model('M_Barang');
        $this->load->helper('tgl_indo');
        if (!_is_logged_in()) {
            redirect("login");
        }
    }

    public function index()
    {
        $data['pemeliharaan']   = $this->M_Pemeliharaan->view_pemeliharaan();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_pemeliharaan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        if ($_SESSION['hak_akses'] == "staff") {
            $data['ruang'] =  $this->M_Ruangan->view_ruangan();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_tambah_pemeliharaan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_blokir');
            $this->load->view('templates/footer');
        }
    }

    public function cek_barang()
    {
        $id_ruangan = $this->input->post('id_ruangan');
        if ($id_ruangan) {
            echo $this->M_Barang->tampil_barang($id_ruangan);
        }
    }

    public function proses_tambah()
    {
        $data = array(
            'tgl_mulai'             => $this->input->post('tanggal_mulai'),
            'tgl_selesai'           => $this->input->post('tanggal_selesai'),
            'id_ruangan'            => $this->input->post('ruangan'),
            'id_user'               => $this->input->post('id_user'),
            'deskripsi'             => $this->input->post('deskripsi'),
            'status_pemeliharaan'   => 'menunggu'
        );
        $this->M_Pemeliharaan->proses_tambah($data);

        $id_pemeliharaan = $this->db->insert_id();
        $nama_barang = count($this->input->post('barang'));

        for ($i = 0; $i < $nama_barang; $i++) {
            $data_barang[$i] = array(
                'id_pemeliharaan'   => $id_pemeliharaan,
                'id_barang_pelihara'         => $this->input->post('barang[' . $i . ']'),
                'status'            => ''
            );
            $this->db->insert('tb_pemeliharaan_barang', $data_barang[$i]);
        }

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
        redirect('pemeliharaan');
    }

    public function edit()
    {
        if ($_SESSION['hak_akses'] == "staff") {
            $id_pemeliharaan = $this->uri->segment(3);
            $data['pemeliharaan'] = $this->M_Pemeliharaan->view_pemeliharaan($id_pemeliharaan);
            $data['ruang'] =  $this->M_Ruangan->view_ruangan();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('v_edit_pemeliharaan', $data);
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

    public function cetak()
    {
        $id_pemeliharaan = $this->uri->segment(3);
        $data['pemeliharaan'] = $this->M_Pemeliharaan->view_pemeliharaan_detail($id_pemeliharaan);
        $this->load->view('v_print_ba', $data);
    }

    public function hapus($id_pemeliharaan)
    {
        $this->M_Pemeliharaan->hapus($id_pemeliharaan);
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'info',
            iconColor: '#f5f5f5',
            color: '#f5f5f5',
            background: '#ff1a1d',
            title: 'Data Pemeliharaan berhasil dihapus!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect('pemeliharaan');
    }
}
