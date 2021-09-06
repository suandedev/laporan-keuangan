<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Produk</h1>

    <!-- form add transaksi -->
    <div class="row justify-content-center">
        <div class="col-lg-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Transakasi</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="<?= base_url('laporan/addLaporan'); ?>" class="user">
                        <div class="form-group">
                            <input type="text" name="produk" class="form-control form-control-user" id="produk" placeholder="masukan produk...">
                        </div>
                        <div class="form-group">
                            <input type="text" name="harga" class="form-control form-control-user" id="harga" placeholder="masukan harga...">
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
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transakasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>produk</th>
                            <th>harga</th>
                            <th>deskripsi</th>
                            <th>tanggal dibuat</th>
                            <th>tanggal diubah</th>
                            <th>aksi </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>no</th>
                            <th>produk</th>
                            <th>harga</th>
                            <th>deskripsi</th>
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
                                <td><?= $row['harga']; ?></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td><?= date('Y-m-d', $row['date_created']); ?></td>
                                <td><?= date('Y-m-d', $row['date_modify']); ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary"><i class="fa fa-eye"> detail</i></button>
                                    <button type="button" class="btn btn-outline-success"><i class='fa fa-edit'></i> edit</button>
                                    <button type="button" class="btn btn-outline-danger"><i class='fa fa-edit'></i> edit</button>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>