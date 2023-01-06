<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Laporan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function view_laporan()
    {
        return $this->db->query("SELECT * FROM tb_laporan JOIN tb_user ON tb_laporan.id_user=tb_user.id_user")->result();
    }

    public function view_detail_laporan($id_laporan)
    {
        return $this->db->query("SELECT * FROM tb_laporan JOIN tb_user ON tb_laporan.id_user=tb_user.id_user WHERE tb_laporan.id_laporan=$id_laporan")->result();
    }
}
