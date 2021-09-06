<?php
class Produk extends CI_Controller
{
    public function index()
    {
        $data['produk'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('about', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_ke_keranjang($ID)
    {
        $produk = $this->model_barang->find($ID);
        $data = array(
            'id'      => $produk->ID_produk,
            'qty'     => 1,
            'price'   => $produk->harga,
            'name'    => $produk->nama_produk,

        );

        $this->cart->insert($data);
        redirect('produk');
    }

    public function detail($ID_produk)
    {
        $data['produk'] = $this->model_barang->detail_produk($ID_produk);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/detail_barang', $data);
        $this->load->view('templates/footer');
    }
    
}