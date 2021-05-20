<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_mahasiswa');
    }


    public function index()
    {

        $data['title'] = "Login";
        $this->form_validation->set_rules('username', 'Username', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_message('required', 'tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->M_mahasiswa->cekPass();
        }
    }

    public function kodeGenerator()
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 6);
    }



    public function registrasi()
    {
        $data['acak'] = $this->kodeGenerator();
        $data['title'] = "Registrasi";
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[tb_user.email]', [
            'is_unique' => 'Email telah terdaftar',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password_awal', 'Password', 'required|trim|min_length[3]|matches[password_2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|trim|matches[password_awal]', [
            'matches' => 'Password tidak sama!'
        ]);

        $this->form_validation->set_rules('kode_1', 'Kode', 'required|trim|matches[kode_2]', [
            'matches' => 'Kode tidak sama!'
        ]);
        $this->form_validation->set_rules('kode_2', 'kode', 'required|trim|matches[kode_1]', [
            'matches' => 'Kode tidak sama!'
        ]);

        $this->form_validation->set_message('required', 'tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_mahasiswa->register();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat akun anda telah dibuat
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('nama');
        redirect('auth');
    }
}
