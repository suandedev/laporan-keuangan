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
                    <p class="card-text"><small class="text-muted">Rp. <?= $produk[0]['harga']; ?></small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail <?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item bold">Nama</li>
                        <li class="list-group-item"><?= $produk[0]['nama']; ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item bold">harga</li>
                        <li class="list-group-item"><?= $produk[0]['harga']; ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item bold">deskripsi</li>
                        <li class="list-group-item"><?= $produk[0]['deskripsi']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

</div>