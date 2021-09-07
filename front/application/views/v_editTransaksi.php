<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Transaksi</h1>

    <!-- form add transaksi -->
    <div class="row justify-content-center">
        <div class="col-lg-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> Transakasi</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="<?= base_url('transaksi/aksiEdit/'.$id); ?>" class="user">
                        <div class="form-group">
                            <select name="id_produk" class="form-select" aria-label="Default select example">
                                <option value="" selected>--pilih produk--</option>
                                <?php foreach ($produk as $row) : ?>
                                    <option value="<?= $row['id']; ?>" <?= ($id_produk == $row['id'])?"selected":""; ?>><?= $row['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="jumlah" class="form-control form-control-user" id="jumlah" placeholder="masukan jumlah..." value="<?= $jumlah ?>">
                            <?= form_error('jumlah') ?>
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