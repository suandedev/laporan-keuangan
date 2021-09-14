<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CetakLaporan extends CI_Controller
{

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

    	$data['cetak_laporan'] = $this->m_laporan->getCetak();
    	$data['time'] = time();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Laporan-keuangan.pdf";
		$this->pdf->load_view('v_cetak_pdf', $data);

		$getLaporan = $this->m_laporan->getCetak();
		foreach ($getLaporan as $row) {
			$id = $row['id'];

			$this->m_laporan->deteleAllCetakLaporan($id);
		}
		redirect('cetaklaporan');

	}
}
