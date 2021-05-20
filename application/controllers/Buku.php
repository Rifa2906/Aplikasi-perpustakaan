<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_buku');
    }

    public function index()
    {
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }


        $data['title'] = 'Daftar Buku';
        $data['buku'] = $this->M_buku->tampilDataBuku($data['keyword']);
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('daftar buku/index', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $judul   = $this->input->post('judul');
        $pengarang = $this->input->post('pengarang');
        $penerbit = $this->input->post('penerbit');
        $data = [
            'judul' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit
        ];

        $this->M_buku->tambah('tb_buku_iis', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil ditambahkan
          </div>');
        redirect('buku');
    }

    public function hapus($id)
    {
        $where = ['id_buku' => $id];

        $this->M_buku->hapus_data($where, 'tb_buku_iis');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil dihapus
          </div>');
        redirect('buku');
    }

    public function Edit($id)
    {
        $data['title'] = 'Form Ubah Data Buku';
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_message('required', 'tidak boleh kosong');

        $data['edit_buku'] = $this->M_buku->getBukuById($id);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('daftar buku/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_buku->ubah_data();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('buku');
        }
    }
}
