<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $tag; ?> Produk</h1>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $tag; ?> <?= $title; ?></h6>
                </div>
                <div class="card-body">

                    <!-- edit produk -->
                    <?php if ($tag != 'Tambah') { ?>
                        <form method="POST" action="<?= base_url('produk/aksiEdit/' . $produk[0]['id']); ?>" enctype="multipart/form-data" class="user">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama" class="form-control form-control-user" id="nama" placeholder="masukan nama..." value="<?= $produk[0]['nama']; ?>">
                                <label for="floatingInput">nama produk</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="harga_jual" class="form-control form-control-user" id="harga_jual" placeholder="masukan harga jual..." value="<?= $produk[0]['harga_jual']; ?>">
                                <label for="floatingInput">harga jual</label>
                                <?= form_error('harga_jual'); ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="harga_modal" class="form-control form-control-user" id="harga_modal" placeholder="masukan harga modal..." value="<?= $produk[0]['harga_modal']; ?>">
                                <label for="floatingInput">harga modal</label>
                                <?= form_error('harga_modal'); ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="deskripsi" class="form-control form-control-user" id="deskripsi" placeholder="masukan deskripsi..." value="<?= $produk[0]['deskripsi']; ?>">
                                <label for="floatingInput">deskripsi</label>
                                <?= form_error('deskripsi'); ?>
                            </div>
                            <div class="">
                                <div class="card mb-3" style="max-width: 200px;">
                                    <div class="row">
                                        <div class="col">
                                            <img src="<?= base_url('assets/upload/'. $produk[0]['gambar']); ?>" class="img-fluid rounded-start justify-content-center" alt="...">
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

                        <!-- add produk -->
                    <?php } else { ?>
                        <form method="POST" action="<?= base_url('produk/addProduk'); ?>" enctype="multipart/form-data" class="user">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama" class="form-control form-control-user" id="nama" placeholder="masukan nama...">
                                <label for="floatingInput">nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="harga_jual" class="form-control form-control-user" id="harga" placeholder="masukan harga jual...">
                                <label for="floatingInput">harga jual</label>
                                <?= form_error('harga_jual'); ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="harga_modal" class="form-control form-control-user" id="harga" placeholder="masukan harga modal...">
                                <label for="floatingInput">harga modal</label>
                                <?= form_error('harga_modal'); ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="deskripsi" class="form-control form-control-user" id="deskripsi" placeholder="masukan deskripsi...">
                                <label for="floatingInput">deskripsi</label>
                                <?= form_error('deskripsi'); ?>
                            </div>
                            <div class="form-group">
                                <input type="file" name="gambar" class="form-control" id="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                simpan
                            </button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>