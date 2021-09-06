<?php
class Data_barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['produk'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambah_aksi()
    {
        $ID_produk      = $this->input->post('ID_produk');
        $nama_produk    = $this->input->post('nama_produk');
        $keterangan     = $this->input->post('keterangan');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $gambar         = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads/.';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'ID_produk'     => $ID_produk,
            'nama_produk'   => $nama_produk,
            'keterangan'    => $keterangan,
            'harga'         => $harga,
            'stok'          => $stok,
            'gambar'        => $gambar

        );
        $this->model_barang->tambah_barang($data, 't_produk');
        redirect('admin/data_barang/index');
    }
    public function edit($ID)
    {
        $where = array('ID_produk' => $ID);
        $data['produk'] = $this->model_barang->edit_barang(
            $where,
            't_produk'
        )->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }
    public function update()
    {
        $ID_produk      = $this->input->post('ID_produk');
        $nama_produk    = $this->input->post('nama_produk');
        $keterangan     = $this->input->post('keterangan');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');

        $data = array(
            'nama_produk'   => $nama_produk,
            'keterangan'    => $keterangan,
            'harga'         => $harga,
            'stok'          => $stok
        );
        $where = array(
            'ID_produk' => $ID_produk
        );
        $this->model_barang->update_data($where, $data, 't_produk');
        redirect('admin/data_barang/index');
    }
    public function hapus($ID)
    {
        $where = array('ID_produk' => $ID);
        $this->model_barang->hapus_data($where, 't_produk');
        redirect('admin/data_barang/index');
    }
    public function detail_barang($ID_produk)
    {
        $data['produk'] = $this->model_barang->detail_produk($ID_produk);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_barang', $data);
        $this->load->view('templates_admin/footer');
    }
}
