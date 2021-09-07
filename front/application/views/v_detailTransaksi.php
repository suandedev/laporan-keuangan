<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Transaksi</h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img style="max-width: 200px;" src="<?= base_url('assets/upload/' . $transaksi[0]['gambar']); ?>" class="img-fluid rounded-start justify-content-center" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $transaksi[0]['nama']; ?></h5>
                    <p class="card-text">jumlah pembelian : <?= $transaksi[0]['jumlah']; ?></p>
                    <p class="card-text"><small class="text-muted">Harga : Rp. <?= $transaksi[0]['harga']; ?></small></p>
                    <p class="card-text"><small class="text-muted">tanggal transaksi : <?= date('d-m-Y', $transaksi[0]['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>