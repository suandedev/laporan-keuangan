<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CetakLaporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	// get cetak
    public function index()
    {
        $data['title'] = 'Laporan';
        $data['produk'] = $this->m_laporan->getProduk();
        $data['cetak'] = $this->m_laporan->getCetak();
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('v_cetak', $data);
        $this->load->view('footer');
    }

    // cetak laporan
    public function cetak()
    {
        $getLaporan = $this->m_laporan->getLaporan();
        foreach ($getLaporan as $row) {
            $id = $row['id'];
            $id_produk = $row['id_produk'];
            $jumlah = $row['jumlah'];
            $total_jual = $row['total_jual'];
            $total_modal = $row['total_modal'];
            $laba = $row['laba'];

            $data = [
                'id_produk' => $id_produk,
                'jumlah' => $jumlah,
                'total_jual' => $total_jual,
                'total_modal' => $total_modal,
                'laba' => $laba,
                'date_created' => time(),
                'date_modify' => time()
            ];

            $this->m_laporan->cetakLaporan($data);
            $this->m_laporan->hapusLaporan($id);
        }
        redirect('transaksi');
    }

    public function cetakLaporanPdf()
    {

		$getCetak = $this->m_laporan->getCetak();
		foreach ($getCetak as $row) :
			$laba[] = $row['laba'];
			$total_harga_modal[] = $row['total_modal'];
			$total_harga_jual[] = $row['total_jual'];

			$dataTotalLaba = array_sum($laba);
			$dataTotalHargaModal = array_sum($total_harga_modal);
			$dataTotalHargaJual = array_sum($total_harga_jual);

		endforeach;

    	$data['cetak_laporan'] = $this->m_laporan->getCetak();
    	$data['laba'] = $dataTotalLaba;
		$data['harga_jual'] = $dataTotalHargaJual;
		$data['harga_modal'] = $dataTotalHargaModal;
    	$data['time'] = time();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Laporan-keuangan.pdf";
		$this->pdf->load_view('v_cetak_pdf', $data);


	}

	public function cetakLaporanHapus()
	{
		$getLaporan = $this->m_laporan->getCetak();
		foreach ($getLaporan as $row) {
			$id = $row['id'];

			$this->m_laporan->deteleAllCetakLaporan($id);
		}
		redirect('cetaklaporan');
	}
}
