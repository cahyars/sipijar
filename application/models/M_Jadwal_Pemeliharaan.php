<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Jadwal_Pemeliharaan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function view_jadwal()
    {
        return $this->db->query("SELECT * FROM tb_jadwal")->result();
    }

    public function view_detail_jadwal($id_jadwal)
    {
        return $this->db->query("SELECT * FROM tb_jadwal WHERE tb_jadwal.id_jadwal=$id_jadwal")->result();
    }

    public function view_jadwal_last()
    {
        return $this->db->query("SELECT * FROM tb_jadwal ORDER BY tb_jadwal.id_jadwal DESC LIMIT 5")->result();
    }

    public function proses_tambah()
    {
        $data   = array(
            "tgl_mulai" => $this->input->post('tanggal_mulai'),
            "tgl_selesai" => $this->input->post('tanggal_selesai'),
            "deskripsi" => $this->input->post('deskripsi')
        );
        $this->db->insert("tb_jadwal", $data);
    }

    public function proses_edit($id_jadwal)
    {
        $data   = array(
            "tgl_mulai" => $this->input->post('tanggal_mulai'),
            "tgl_selesai" => $this->input->post('tanggal_selesai'),
            "deskripsi" => $this->input->post('deskripsi')
        );
        $this->db->where("id_jadwal", $id_jadwal);
        $this->db->update("tb_jadwal", $data);
    }

    public function hapus($id_jadwal)
    {
        $this->db->where("id_jadwal", $id_jadwal);
        return $this->db->delete("tb_jadwal");
    }
}
