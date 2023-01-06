<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('v_dashboard');
        $this->load->view('templates/footer');
    }
}
