<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Ruangan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Barang');
    }

    public function view_ruangan()
    {
        return $this->db->query("SELECT * FROM tb_ruangan")->result();
    }

    public function view_edit_ruangan($id_ruangan)
    {
        return $this->db->query("SELECT * FROM tb_ruangan WHERE tb_ruangan.id_ruangan=$id_ruangan")->result();
    }

    public function barang_ruang()
    {
        return $this->db->query("SELECT * FROM tb_ruangan JOIN tb_barang ON tb_ruangan.id_ruangan = tb_barang.id_ruangan;")->result();
    }

    public function proses_tambah()
    {
        $lokasi_file     = $_FILES['foto']['tmp_name'];
        $nama_file         = $_FILES['foto']['name'];
        $direktori         = "assets/foto/ruangan/$nama_file";
        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, $direktori);
        }

        $data    =    array(
            "foto" => $nama_file,
            "nama_ruangan" => $this->input->post('nama_ruangan'),
        );
        $this->db->insert("tb_ruangan", $data);
    }

    public function proses_edit($id_ruangan)
    {
        $lokasi_file     = $_FILES['foto']['tmp_name'];
        $nama_file         = $_FILES['foto']['name'];
        $direktori         = "assets/foto/ruangan/$nama_file";
        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, $direktori);

            $data    =    array(
                "foto" => $nama_file,
                "nama_ruangan" => $this->input->post('nama_ruangan')
            );

            $this->db->where("id_ruangan", $id_ruangan);
            return $this->db->update("tb_ruangan", $data);
        } else {

            $data    = array(
                "foto" => $this->input->post('foto_lama'),
                "nama_barang" => $this->input->post('nama_ruangan')
            );

            $this->db->where("id_ruangan", $id_ruangan);
            return $this->db->update("tb_ruangan", $data);
        }
    }

    public function hapus($id_ruangan)
    {
        $this->db->where("id_ruangan", $id_ruangan);
        return $this->db->delete("tb_ruangan");
    }
}
