<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_transaksi');
        $this->load->model('M_buku');
        $this->load->model('M_admin');
    }

    public function index()
    {

        $data['title'] = 'Daftar Transaksi';
        $data['transaksi'] = $this->M_transaksi->tampilDataTransaksi();
        $data['id_buku'] = $this->M_buku->tampilDataBuku();
        $data['id_member'] = $this->M_admin->tampilDataMember();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $id_buku   = $this->input->post('id_buku');
        $id_member = $this->input->post('id_member');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $data = [
            'nama_buku' => $id_buku,
            'nama_member' => $id_member,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
        ];

        $this->M_transaksi->tambah('tb_transaksi_iis', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil ditambahkan
          </div>');
        redirect('transaksi');
    }

    public function hapus($id)
    {
        $where = ['id_transaksi' => $id];

        $this->M_transaksi->hapus_data($where, 'tb_transaksi_iis');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil dihapus
          </div>');
        redirect('transaksi');
    }

    public function Edit($id)
    {
        $data['title'] = 'Form Ubah Data Transaksi';
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'required|trim');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kemabli', 'required|trim');
        $this->form_validation->set_message('required', 'tidak boleh kosong');

        $data['edit_transaksi'] = $this->M_transaksi->getTransaksiById($id);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('transaksi/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_transaksi->ubah_data();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('transaksi');
        }
    }
}
