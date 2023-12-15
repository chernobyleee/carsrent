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
                    $i = 1;
                    foreach ($message as $c) {
                    ?>
                        <tr id="row<?= $i ?>" class="text-center">
                            <td scope="row" class="w-5"><?= $i ?></td>
                            <td scope="row"><?= $c->nama ?></td>
                            <td scope="row"><?= $c->email ?></td>
                            <td scope="row"><?= $c->subject ?></td>
                            <td scope="row">

                                <div>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <p class="text-panjang" id="myText">
                                            <?= $c->message ?>
                                        </p>
                                        <button type="button" class="btn btn-outline-info text-cecnter" id="btnModalMassage<?= $i ?>" data-bs-toggle="modal" data-bs-target="#linkMassage<?= $i ?>">
                                            <small>
                                                Lihat Selengkapnya
                                            </small>
                                        </button>
                                    </div>


                                    <div class="modal fade modalpesan" id="linkMassage<?= $i ?>" tabindex="1000" aria-labelledby="linkMassage<?= $i ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-info text-white">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="linkMassage<?= $i ?>">pesan lengkap</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?= $c->message ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </td>
                            <td scope="row">
                                <div class="text-center">
                                    <div class="form-check">
                                        <div class="d-grid gap-2 col-6 mx-auto">
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
                                </div>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    } ?>
                </tbody>

            </table>
        </div>

        <!-- akhir content 2 -->

        </div>