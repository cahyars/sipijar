<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function view_user()
    {
        return $this->db->query("SELECT * FROM tb_user")->result();
    }

    public function view_edit_user($id_user)
    {
        return $this->db->query("SELECT * FROM tb_user WHERE tb_user.id_user=$id_user")->result();
    }

    public function proses_tambah()
    {
        $lokasi_file     = $_FILES['foto']['tmp_name'];
        $nama_file         = $_FILES['foto']['name'];
        $direktori         = "assets/foto/user/$nama_file";
        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, $direktori);
        }

        $data    =    array(
            "foto" => $nama_file,
            "nip" => $this->input->post('nip'),
            "nama" => $this->input->post('nama'),
            "jabatan" => $this->input->post('jabatan'),
            "hak_akses" => $this->input->post('hak_akses'),
            "username" => $this->input->post('username'),
            "password" => MD5($this->input->post('password'))
        );
        $this->db->insert("tb_user", $data);
    }

    public function proses_edit($id_user)
    {
        $lokasi_file     = $_FILES['foto']['tmp_name'];
        $nama_file         = $_FILES['foto']['name'];
        $direktori         = "assets/foto/user/$nama_file";
        $password_baru     = $this->input->post('password_baru');
        if (!empty($lokasi_file) && !empty($password_baru)) {
            move_uploaded_file($lokasi_file, $direktori);

            $data    =    array(
                "foto" => $nama_file,
                "nip" => $this->input->post('nip'),
                "nama" => $this->input->post('nama'),
                "jabatan" => $this->input->post('jabatan'),
                "hak_akses" => $this->input->post('hak_akses'),
                "username" => $this->input->post('username'),
                "password" => MD5($this->input->post('password_baru'))
            );

            $this->db->where("id_user", $id_user);
            return $this->db->update("tb_user", $data);
        } elseif (!empty($lokasi_file) && empty($password_baru)) {
            move_uploaded_file($lokasi_file, $direktori);
            $data    =    array(
                "foto" => $nama_file,
                "nip" => $this->input->post('nip'),
                "nama" => $this->input->post('nama'),
                "jabatan" => $this->input->post('jabatan'),
                "hak_akses" => $this->input->post('hak_akses'),
                "username" => $this->input->post('username'),
            );

            $this->db->where("id_user", $id_user);
            return $this->db->update("tb_user", $data);
        } elseif (empty($lokasi_file) && !empty($password_baru)) {
            $data    =    array(
                "nip" => $this->input->post('nip'),
                "nama" => $this->input->post('nama'),
                "jabatan" => $this->input->post('jabatan'),
                "hak_akses" => $this->input->post('hak_akses'),
                "username" => $this->input->post('username'),
                "password" => MD5($this->input->post('password_baru'))
            );

            $this->db->where("id_user", $id_user);
            return $this->db->update("tb_user", $data);
        } elseif (empty($lokasi_file) && empty($password_baru)) {
            $data    =    array(
                "nip" => $this->input->post('nip'),
                "nama" => $this->input->post('nama'),
                "jabatan" => $this->input->post('jabatan'),
                "hak_akses" => $this->input->post('hak_akses'),
                "username" => $this->input->post('username'),
            );

            $this->db->where("id_user", $id_user);
            return $this->db->update("tb_user", $data);
        }
    }

    public function hapus($id_user)
    {
        $this->db->where("id_user", $id_user);
        return $this->db->delete("tb_user");
    }
}
