<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mahasiswa');
        $this->load->model('M_admin');
        $this->load->library('form_validation');
    }


    //member

    public function index()
    {
        //cari
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        $data['title'] = 'Daftar Member';
        $data['member'] = $this->M_admin->tampilDataMember($data['keyword']);
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/index', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {

        $nama   = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_tlp = $this->input->post('no_tlp');
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'no_tlp' => $no_tlp
        ];

        $this->M_admin->tambahDataMember($data, 'tb_member_iis');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil ditambahkan
          </div>');
        redirect('admin');
    }

    public function hapus($id)
    {
        $where  = ['id_member' => $id];
        $this->M_admin->hapus_data($where, 'tb_member_iis');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil dihapus
          </div>');
        redirect('admin');
    }

    public function Edit($id)
    {

        $data['title'] = 'Form Ubah Data Member';
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_tlp', 'No telpon', 'required|trim|min_length[12]|max_length[12]', [
            'min_length' => 'No telpon harus 12 karakter',
            'max_length' => 'No telpon harus 12 karakter',
        ]);
        $this->form_validation->set_message('required', 'tidak boleh kosong');

        $data['edit_member'] = $this->M_admin->getMemberById($id);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_admin->ubah_data();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('admin');
        }
    }
}
