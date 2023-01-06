<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Pemeliharaan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function view_pemeliharaan()
    {
        return $this->db->query("SELECT * FROM tb_pemeliharaan JOIN tb_ruangan ON tb_pemeliharaan.id_ruangan=tb_ruangan.id_ruangan JOIN tb_user ON tb_user.id_user=tb_pemeliharaan.id_user")->result();
    }

    public function view_pemeliharaan_detail($id_pemeliharaan)
    {
        return $this->db->query("SELECT * FROM tb_pemeliharaan JOIN tb_ruangan ON tb_pemeliharaan.id_ruangan=tb_ruangan.id_ruangan JOIN tb_user ON tb_user.id_user=tb_pemeliharaan.id_user JOIN tb_pemeliharaan_barang ON tb_pemeliharaan_barang.id_pemeliharaan=tb_pemeliharaan.id_pemeliharaan JOIN tb_barang ON tb_pemeliharaan_barang.id_barang_pelihara=tb_barang.id_barang WHERE tb_pemeliharaan.id_pemeliharaan=$id_pemeliharaan")->result();
    }

    public function proses_tambah($data)
    {
        $this->db->insert('tb_pemeliharaan', $data);
    }

    public function hapus($id_pemeliharaan)
    {
        $this->db->where("id_pemeliharaan", $id_pemeliharaan);
        return $this->db->delete("tb_pemeliharaan");
    }
}
