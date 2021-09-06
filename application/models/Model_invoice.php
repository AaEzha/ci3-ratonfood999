<?php
class Model_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

		// ambil total harga
		$total_harga = 0;
		foreach ($this->cart->contents() as $items) {
			$harga = $items['qty'] * $items['price'];
			$total_harga += $harga;
		}

        $invoice = array(
			'ID_pelanggan'	=> $this->session->id_pelanggan,
            'nama'          => $nama,
            'alamat'        => $alamat,
			'total_bayar'	=> $total_harga,
            'tgl_pesan'     => date('Y-m-d H:i:s'),
            'batas_bayar'   => date(
                'Y-m-d H:i:s',
                mktime(
                    date('H'),
                    date('i'),
                    date('s'),
                    date('m'),
                    date('d') + 1,
                    date('Y')
                )
            ),
        );
        $this->db->insert('t_invoice', $invoice);
        $ID_invoice = $this->db->insert_id();
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'id_invoice'    => $ID_invoice,
                'id_produk'     => $items['id'],
                'nama_produk'   => $items['name'],
                'jumlah'        => $items['qty'],
                'harga'         => $items['price'],
            );
            $this->db->insert('t_pembelian', $data);
        }
        return TRUE;
    }
    public function tampil_data()
    {
        $result = $this->db->get('t_invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function ambil_id_invoice($ID_invoice)
    {
        $result = $this->db->where('ID_invoice', $ID_invoice)->get('t_invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function ambil_id_pesanan($ID_invoice)
    {
        $result = $this->db->where('ID_invoice', $ID_invoice)->get('t_pembelian');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('t_invoice');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('ID_invoice','desc');
        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('t_invoice');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=1');
        $this->db->order_by('ID_invoice','desc');
        return $this->db->get()->result();
    }

    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('t_invoice');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('ID_invoice','desc');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('t_invoice');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=3');
        $this->db->order_by('ID_invoice','desc');
        return $this->db->get()->result();
    }
    
    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('t_invoice');
        $this->db->where('ID_invoice',$id_transaksi);
        return $this->db->get()->row();
    }

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tb_rekening');
        return $this->db->get()->result();
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('ID_invoice', $data['id_transaksi']);
        $this->db->update('t_invoice', $data);
    }

    public function detail_pembelian($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tb_rinci_transaksi');
        $this->db->join('t_invoice', 'tb_rinci_transaksi.nomor_order = tb_transaksi.nomor_order', 'left');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_rinci_transaksi.id_barang', 'left');
        $this->db->where('ID_invoice',$id_transaksi);
        $this->db->order_by('ID_invoice','desc');
        return $this->db->get()->result();
    }

	public function detail_invoice($id_invoice)
	{
		$this->db->select('*');
        $this->db->from('t_pembelian');
        $this->db->where('ID_invoice',$id_invoice);
        return $this->db->get()->result();
	}
    
}
