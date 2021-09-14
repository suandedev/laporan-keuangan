<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<style>
		table,  th, td {
			border: 1px solid black;
		}
		th {
			background: #2c9faf;
			text-align: center;
		}
		h1 {
			text-align: center;
			padding: 10px;
		}
	</style>
    <title>Document</title>
</head>

<body>

<h1>Laporan Keuangan BUMDesa BAli Agung</h1>
<h5>Hari/Tanggal  :  <?= date('l-d-m-Y', $time) ?> </h5>

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
            </tr>
        </thead>
        </tfoot>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($cetak_laporan as $row) : ?>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>
