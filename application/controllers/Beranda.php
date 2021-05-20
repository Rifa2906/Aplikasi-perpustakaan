<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_transaksi');
        $this->load->model('M_buku');
        $this->load->model('M_admin');
    }

    public function jumlahMember()
    {
        $query = $this->db->get('tb_member_iis');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jumlahBuku()
    {
        $query = $this->db->get('tb_buku_iis');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jumlahTransaksi()
    {
        $query = $this->db->get('tb_transaksi_iis');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['jml_member'] = $this->jumlahMember();
        $data['jml_buku'] = $this->jumlahBuku();
        $data['jml_transaksi'] = $this->jumlahTransaksi();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/footer');
    }
}
