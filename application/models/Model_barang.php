<?php
class Model_barang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('t_produk');
    }
    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function find($ID_produk)
    {
        $result = $this->db->where('ID_produk', $ID_produk)
            ->limit(1)
            ->get('t_produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function detail_produk($ID_produk)
    {
        $result = $this->db->where('ID_produk', $ID_produk)->get('t_produk');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
