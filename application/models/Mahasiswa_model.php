<?php

class Mahasiswa_model extends CI_Model
{
    public function getAllMahasiswa()
    {
        return $this->db->get('tb_mahasiswa')->result_array(); //Memanggil semua data pada tabel mahasiswa menjadi data berbentuk array
        // Coding diatas adalah methode chaining merupakan penyederhanaan dari coding berikut
        // $query = $this->db->get('tb_mahasiswa'); // Ini merupakan query builder
        // return $query->result_array();

    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
        ];
        $this->db->insert('tb_mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_mahasiswa');
    }
}
