<!-- modal review-->

<div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tulis Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="review" method="post" action="<?= base_url('cars/inputreview'); ?>">

                    <!-- nanti langsung ubah jadi username -->
                    <label class="form-label">Username: </label><br>
                    <input type="text" class="form-control" name="nama" value="<?= $this->session->userdata('username')?>" readonly>
                    <label class="form-label">Model Mobil:</label>
                    <input type="text" class="form-control" name="mobil_modal" id="modalMobilInput" readonly>
                    <input type="hidden" class="form-control" name="id_modal" id="modalidInput">

                    <label class="form-label">Rating:</label><br>
                    <div class="rate">
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                    <br><br>
                    <label class="form-label">Review:</label>
                    <textarea rows="3" class="form-control" name='review' id="review" maxlength="128"></textarea>


                    <button type="submit" value="submit" class="form-control" id="form-submit">Kirim Review</button>

                </form>
            </div>
        </div>
    </div>
</div>



<!-- modal pesan sekarang -->

<!-- Modal -->
<div class="modal fade" id="pesan" tabindex="-1" aria-labelledby="pesanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pesan">Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('assets/img/modalorder.png') ?>" alt="">
                <h6 class="text-center">Silahkan pesan melalui link sosial media berikut</h6>
                <div class="social-links mt-3 align-center text-center">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>