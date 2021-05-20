<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    function tampilDataTransaksi()
    {
        return $this->db->get('tb_transaksi_iis')->result_array();
    }

    public function tambah($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getTransaksiById($id)
    {
        return $this->db->get_where('tb_transaksi_iis', ['id_transaksi' => $id])->row_array();
    }

    public function Ubah_data()
    {
        $data = [
            'id_buku' => $this->input->post('id_buku'),
            'id_member' => $this->input->post('id_member'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali')
        ];

        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('tb_transaksi_iis', $data);
    }
}
