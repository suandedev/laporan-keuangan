<div class="container-fluid">

    <!-- edit produk -->
    <?php if ($tag != 'edit') { ?>
        <h1 class="h3 mb-4 text-gray-800"><?= $tag; ?> Produk</h1>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $tag; ?> <?= $title; ?></h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('produk/aksiEdit/'.$produk[0]['id']); ?>" enctype="multipart/form-data" class="user">
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control form-control-user" id="nama" placeholder="masukan nama..." value="<?= $produk[0]['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="number" name="harga" class="form-control form-control-user" id="harga" placeholder="masukan harga..." value="<?= $produk[0]['harga']; ?>">
                                <?= form_error('harga'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="deskripsi" class="form-control form-control-user" id="deskripsi" placeholder="masukan deskripsi..." value="<?= $produk[0]['deskripsi']; ?>">
                                <?= form_error('deskripsi'); ?>
                            </div>
                            <div class="">
                                <div class="card mb-3" style="max-width: 200px;">
                                    <div class="row">
                                        <div class="col">
                                            <img src="<?= base_url('assets/upload/user.png'); ?>" class="img-fluid rounded-start justify-content-center" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="gambar" class="form-control" id="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- add produk -->
    <?php } else { ?>
        <h1 class="h3 mb-4 text-gray-800"><?= $tag; ?> Produk</h1>

        <!-- form add produk -->
        <div class="row justify-content-center">
            <div class="col-lg-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $tag; ?> <?= $title; ?></h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('produk/addProduk'); ?>" enctype="multipart/form-data" class="user">
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
                            <div class="form-group">
                                <input type="file" name="gambar" class="form-control" id="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>