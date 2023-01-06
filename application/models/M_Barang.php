<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Barang extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function view_barang()
    {
        return $this->db->query("SELECT * FROM tb_barang JOIN tb_ruangan ON tb_barang.id_ruangan=tb_ruangan.id_ruangan")->result();
    }

    public function view_edit_barang($id_barang)
    {
        return $this->db->query("SELECT * FROM tb_barang JOIN tb_ruangan ON tb_barang.id_ruangan=tb_ruangan.id_ruangan WHERE tb_barang.id_barang=$id_barang")->result();
    }

    public function tampil_barang($id_ruangan)
    {
        $query = $this->db->query("SELECT * FROM tb_barang WHERE tb_barang.id_ruangan=$id_ruangan");
        $output = '';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_barang . '">' . $row->nama_barang . '</option>';
        }
        return $output;
    }

    public function proses_tambah()
    {
        $lokasi_file     = $_FILES['foto']['tmp_name'];
        $nama_file         = $_FILES['foto']['name'];
        $direktori         = "assets/foto/barang/$nama_file";
        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, $direktori);
        }

        $data    =    array(
            "foto_barang" => $nama_file,
            "nama_barang" => $this->input->post('nama_barang'),
            "jenis" => $this->input->post('jenis'),
            "status_barang" => 'b',
            "id_ruangan" => $this->input->post('ruangan')
        );
        $this->db->insert("tb_barang", $data);
    }

    public function proses_edit($id_barang)
    {
        $lokasi_file     = $_FILES['foto_barang']['tmp_name'];
        $nama_file         = $_FILES['foto_barang']['name'];
        $direktori         = "assets/foto/barang/$nama_file";
        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, $direktori);

            $data    =    array(
                "foto_barang" => $nama_file,
                "nama_barang" => $this->input->post('nama_barang'),
                "jenis" => $this->input->post('jenis'),
                "id_ruangan" => $this->input->post('id_ruangan')
            );
            
            $this->db->where("id_barang", $id_barang);
            return $this->db->update("tb_barang", $data);
        } else {
            
            $data    = array(
                "foto_barang" => $this->input->post('foto_lama'),
                "nama_barang" => $this->input->post('nama_barang'),
                "jenis" => $this->input->post('jenis'),
                "id_ruangan" => $this->input->post('id_ruangan')
            );

            $this->db->where("id_barang", $id_barang);
            return $this->db->update("tb_barang", $data);
        }
    }

    public function hapus($id_barang)
    {
        $this->db->where("id_barang", $id_barang);
        return $this->db->delete("tb_barang");
    }
}
