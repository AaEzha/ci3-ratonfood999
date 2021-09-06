<?php
class Pesanan_saya extends CI_Controller
{
	public function index()
	{
		$this->load->model('Model_invoice', 'invoice');
		$data['belum_bayar'] = $this->invoice->belum_bayar();
		$data['diproses'] = $this->invoice->diproses();
		$data['dikirim'] = $this->invoice->dikirim();
		$data['selesai'] = $this->invoice->selesai();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pesanan_saya', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$this->load->model('Model_invoice', 'invoice');
		$data['data'] = $this->invoice->detail_invoice($id);
		$data['invoice'] = $this->invoice->detail_pesanan($id);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pesanan_saya_detail', $data);
		$this->load->view('templates/footer');
	}
}
