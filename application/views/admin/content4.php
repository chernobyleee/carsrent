<!-- content 4 start -->

<div class="mt-5 text-center" id="hapusdata">
    <div class="badge bg-success text-wrap mt-5 mb-3" style="width: 11rem;">
        <i class='bi bi-trash fs-6'></i> <span class="fs-6">Hapus Data</span>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Transmisi</th>
            <th scope="col">Tahun</th>
            <th scope="col">Warna</th>
            <th scope="col">Kursi</th>
            <th scope="col">Harga</th>
            <th scope="col">gambar</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php //$i = 1; $i < 10; $i++
        $i = 1;
        foreach ($cars as $c) {
        ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $c->nama ?></td>
                <td><?= $c->transmisi ?></td>
                <td><?= $c->tahun ?></td>
                <td><?= $c->warna ?></td>
                <td><?= $c->kursi ?></td>
                <td>Rp. <?= number_format($c->harga) ?></td>
                <td>
                    <img src="<?= base_url('assets/img/cars/') . $c->gambar; ?>" alt="" class="img-fluid img-thumbnail" style="width: 100px;">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Kamu yakin akan menghapus ?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
