
        <!-- awal content 1 -->
        
        <div class="mt-5 text-center" id="accreview">
            <div class="badge bg-success text-wrap mt-5 mb-3" style="width: 11rem;">
                <i class='bi bi-list-check fs-6'></i> <span class="fs-6">Acc review</span>
            </div>
        </div>
        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-4">No</th>
                        <th scope="col-4">Username</th>
                        <th scope="col-4">Mobil</th>
                        <th scope="col-4">Bintang</th>
                        <th scope="col-4">Review</th>
                        <th scope="col-4">Accept</th>
                        <th scope="col-4">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    foreach($review as $r){
                    ?>
                        <tr>
                            <th scope="row"><?= $r['id_review'] ?></th>
                            <td scope="row"><?= $r['username'] ?></td>
                            <td scope="row"><?= $r['nama'] ?></td>
                            <td scope="row"><img src="<?= base_url('assets/img/star/star'). $r['rating']; ?>.png" alt="" style="width: 60px;"></td>
                            <td scope="row"><?= $r['massage'] ?></td>
                                <div class="gap-2">
                                    <!-- acc review -->
                                    <td>
                                    <form class="review" method="post" action="<?= base_url('admin/accreview'); ?>">
                                    <input type="hidden" class="form-control" name="status" value="<?= $r['id_review'] ?>">
                                    <button type="submit" value="submit" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </button>
                                    </form>
                    </td>
                                    <!-- delete review -->
                                    <td>
                                    <form class="review" method="post" action="<?= base_url('admin/delreview'); ?>">
                                    <input type="hidden" class="form-control" name="status" value="<?= $r['id_review'] ?>">
                                    <button type="submit" value="submit" class="btn btn-danger btn-sm" onclick="return confirm('Kamu yakin akan menghapus ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    </form>
                    </td>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
<!-- akhir content1 -->