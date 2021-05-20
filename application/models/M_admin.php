<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    // Member

    public function tampilDataMember($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('alamat', $keyword);
        }
        return $this->db->get('tb_member_iis')->result_array();
    }

    public function tambahDataMember($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getMemberById($id)
    {

        return $this->db->get_where('tb_member_iis', ['id_member' => $id])->row_array();
    }


    public function ubah_data()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_tlp' => $this->input->post('no_tlp')
        ];

        $this->db->where('id_member', $this->input->post('id_member'));
        $this->db->update('tb_member_iis', $data);
    }
}
