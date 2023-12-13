        <!-- awal content 2 -->
        <div class="mt-5 text-center" id="massage">
            <div class="badge bg-success text-wrap mt-5 mb-3" style="width: 11rem;">
                <i class='bx bx-message-square-detail fs-6'></i> <span class="fs-6">Massage</span>
            </div>
        </div>

        <!-- table massage -->
        <div class="table-responsive">

            <table class="table">
                <thead class="table-light text-center">
                    <tr>
                        <th scope="col-4">No</th>
                        <th scope="col-4">Nama</th>
                        <th scope="col-4">Email</th>
                        <th scope="col-4">Subject</th>
                        <th scope="col-4">Masssage</th>
                        <th scope="col-4">keterangan</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    $i = 0;
                    foreach ($message as $c) {
                        $i++
                        ?>
                        <tr id="row<?= $i ?>" class="text-center">
                            <td scope="row" class="w-5"><?= $i ?></td>
                            <td scope="row"><?= $c->nama ?></td>
                            <td scope="row"><?= $c->email ?></td>
                            <td scope="row"><?= $c->subject ?></td>
                            <td scope="row">

                                <div>
                                    <!-- Isi teks panjang di sini -->
                                    <p class="text-panjang" id="myText">
                                        <?= $c->message ?>
                                    </p>
                                    <a href="#" id="linkMassage<?= $i ?>" onclick="return confirm('<?= $c->message ?>')" disabled>Lihat Selengkapnya</a>
                                    <!-- Link Lihat Selengkapnya -->
                                </div>

                            </td>
                            <td scope="row">
                                <div class="text-cecnter">
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexCheckDefault<?= $i ?>">
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault<?= $i ?>" onchange="ubahWarna(<?= $i ?>)">
                                            sudah dibaca
                                        </label>
                                        <form action="admin/delContact" method="post">
                                        <input type="hidden" name="id_contact" id="id_contact" value="<?= $c->id_contact ?>" readonly>                                        
                                        <button type="submit" value="submit" class="btn btn-danger btn-sm" id="btnDeleteMassage<?= $i ?>" disabled>
                                            <i class="bi bi-trash"></i>Hapus massage
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>

        <!-- akhir content 2 -->

        </div>