<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Detail <?= $title; ?></h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img style="max-width: 200px;" src="<?= base_url('assets/upload/'.$produk[0]['gambar']); ?>" class="img-fluid rounded-start justify-content-center" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $produk[0]['nama']; ?></h5>
                    <p class="card-text"><?= $produk[0]['deskripsi']; ?></p>
                    <p class="card-text"><small class="text-muted">harga jual : Rp. <?= $produk[0]['harga_jual']; ?></small></p>
                    <p class="card-text"><small class="text-muted">harga modal : Rp. <?= $produk[0]['harga_modal']; ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>