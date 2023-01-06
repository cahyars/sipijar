<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
        $this->load->model('M_Laporan');
        $this->load->model('M_Pemeliharaan');
        $this->load->helper('tgl_indo');
        if (!_is_logged_in()) {
            redirect("login");
        }
    }

    public function index()
    {
        $data['laporan'] = $this->M_Laporan->view_laporan();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_laporan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_tambah_laporan');
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        $id_laporan = $this->uri->segment(3);
        $data['laporan'] = $this->M_Laporan->view_detail_laporan($id_laporan);
        $this->load->view('v_cetak_laporan', $data);
    }
}
