<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{


    public function register()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password_awal'), PASSWORD_DEFAULT),
            'level' => 2
        ];

        $this->db->insert('tb_user', $data);
    }

    public function cekPass()
    {
        $email = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'level' => $user['level'],
                    'nama' => $user['nama']
                ];
                $this->session->set_userdata($data);
                redirect('beranda');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Password salah!
          </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun belum dibuat
          </div>');
            redirect('auth/login');
        }
    }
}
