<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>

    <!-- form add transaksi -->
    <div class="row justify-content-center">
        <div class="col-lg-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input <?= $title; ?></h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="<?= base_url('produk/addProduk'); ?>" class="user">
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control form-control-user" id="nama" placeholder="masukan nama...">
                        </div>
                        <div class="form-group">
                            <input type="number" name="harga" class="form-control form-control-user" id="harga" placeholder="masukan harga...">
                            <?= form_error('harga'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="deskripsi" class="form-control form-control-user" id="deskripsi" placeholder="masukan deskripsi...">
                            <?= form_error('deskripsi'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>