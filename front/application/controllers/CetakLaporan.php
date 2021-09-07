<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CetakLaporan extends CI_Controller
{
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
}
