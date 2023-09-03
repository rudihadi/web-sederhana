<?php

class Mahasiswa extends CI_Controller
{
    public function __construct() //Penggunaan construct digunakan agar semua methode yang ada disini dapat menggunakan model tersebut
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model'); //Model yang akan digunakan harus di load
        $this->load->library('form_validation'); //Form Validasi yang akan digunakan harus di load
    }

    public function index()
    {

        $data['judul'] = 'Daftar Mahasiswa'; //Memberi value judul untuk ditampilkan
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa(); //Pemanggilan Model
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Mahasiswa';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }
}
