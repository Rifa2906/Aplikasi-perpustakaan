<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_buku extends CI_Model
{

    function tampilDataBuku($keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('pengarang', $keyword);
            $this->db->or_like('penerbit', $keyword);
        }
        return $this->db->get('tb_buku_iis')->result_array();
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

    public function Ubah_data()
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit')
        ];

        $this->db->where('id_buku', $this->input->post('id_buku'));
        $this->db->update('tb_buku_iis', $data);
    }

    public function getBukuById($id)
    {

        return $this->db->get_where('tb_buku_iis', ['id_buku' => $id])->row_array();
    }
}
