<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Laporan Keuangan</h1>

    <!-- form add transaksi -->
    <div class="row justify-content-center">
        <div class="col-lg-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Transakasi</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="<?= base_url('transaksi/add'); ?>" class="user">
                        <div class="form-group">
                            <select name="id_produk" class="form-select" aria-label="Default select example">
                                <option value="" selected>--pilih produk--</option>
                                <?php foreach ($produk as $row) : ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="jumlah" class="form-control form-control-user" id="jumlah" placeholder="masukan jumlah...">
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            simpan
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- session flash data -->
    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <?= $this->session->flashdata('pesan1');; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Total Transakasi</h6>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('transaksi/total'); ?>" class="btn btn-sm btn-primary btn-block">total</a>
                    <p class="bold mb-3 mt-4 text-center">Rp. <?= $dataTotal; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales laporan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transakasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>no</th>
                            <th>produk</th>
                            <th>harga</th>
                            <th>jumlah</th>
                            <th>total</th>
                            <th>tanggal dibuat</th>
                            <th>tanggal diubah</th>
                            <th>aksi </th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>no</th>
                            <th>produk</th>
                            <th>harga</th>
                            <th>jumlah</th>
                            <th>total</th>
                            <th>tanggal dibuat</th>
                            <th>tanggal diubah</th>
                            <th>aksi </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($laporan as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td>Rp. <?= $row['harga']; ?></td>
                                <td><?= $row['jumlah']; ?></td>
                                <td>Rp. <?= $row['total']; ?></td>
                                <td><?= date('Y-m-d', $row['date_created']); ?></td>
                                <td><?= date('Y-m-d', $row['date_modify']); ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('transaksi/totalItem/' . $row['id']); ?>" class="btn btn-sm btn-outline-success"><i class="fa fa-calculator"> total</i></a>
                                    <a href="<?= base_url('transaksi/detail/' . $row['id']); ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"> detail</i></a>
                                    <a href="<?= base_url('transaksi/edit/' . $row['id']); ?>" class="btn btn-sm btn-outline-warning"><i class='fa fa-edit'></i> edit</a>
                                    <a href="<?= base_url('transaksi/hapus/' . $row['id']); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('yakin?')"><i class='fa fa-trash'></i> hapus</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>