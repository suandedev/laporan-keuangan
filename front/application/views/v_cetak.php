<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Riwayat Keuangan</h1>

    <!-- DataTales laporan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Transakasi</h6>
            <a href="<?= base_url('cetaklaporan/cetakLaporanPdf'); ?>" class="btn btn-primary btn-sm float-right"><i class='fa fa-plus'></i> cetak</a>
			<a href="<?= base_url('cetaklaporan/cetakLaporanHapus'); ?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('yakin?')"><i class='fa fa-trash'></i> hapus</a>
		</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>no</th>
                            <th>produk</th>
                            <th>harga jual</th>
                            <th>harga modal</th>
                            <th>jumlah</th>
                            <th>total jual</th>
                            <th>total modal</th>
                            <th>laba</th>
                            <th>tanggal dibuat</th>
                            <th>tanggal diubah</th>
                            <!-- <th>aksi </th> -->
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>no</th>
                            <th>produk</th>
                            <th>harga jual</th>
                            <th>harga modal</th>
                            <th>jumlah</th>
                            <th>total jual</th>
                            <th>total modal</th>
                            <th>laba</th>
                            <th>tanggal dibuat</th>
                            <th>tanggal diubah</th>
                            <!-- <th>aksi </th> -->
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($cetak as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td>Rp. <?= $row['harga_jual']; ?></td>
                                <td>Rp. <?= $row['harga_modal']; ?></td>
                                <td><?= $row['jumlah']; ?></td>
                                <td>Rp. <?= $row['total_jual']; ?></td>
                                <td>Rp. <?= $row['total_modal']; ?></td>
                                <td>Rp. <?= $row['laba']; ?></td>
                                <td><?= date('d-m-Y', $row['date_created']); ?></td>
                                <td><?= date('d-m-Y', $row['date_modify']); ?></td>
                                <!-- <td class="text-center">
                                    <a href="<?= base_url('transaksi/totalItem/' . $row['id']); ?>" class="btn btn-sm btn-outline-success"><i class="fa fa-calculator"> total</i></a>
                                    <a href="<?= base_url('transaksi/detail/' . $row['id']); ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"> detail</i></a>
                                    <a href="<?= base_url('transaksi/edit/' . $row['id']); ?>" class="btn btn-sm btn-outline-warning"><i class='fa fa-edit'></i> edit</a>
                                    <a href="<?= base_url('transaksi/hapus/' . $row['id']); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('yakin?')"><i class='fa fa-trash'></i> hapus</a>

                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
