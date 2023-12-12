<!-- start content -->

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex flex-column justify-content-center text-center text-lg-start btn-pr" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="fw-bold">CarsRent</h1>
                <h2>Temukan kebebasan menjelajahi perjalanan dengan kualitas terbaik melalui layanan istimewa kami
                </h2>
                <div class="justify-content-center mt-4">
                    <a class="btn-hero" href="<?= base_url('about') ?>">Selengkapnya</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block" data-aos="zoom-in" data-aos-duration="1000">
                <img src="<?= base_url('assets/img/hero-img.png') ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>

<!-- gambar brand -->

<section id="car-brand" class="py-3">
    <div class="container">
        <div class="row justify-content-center align-items-baseline" data-aos="zoom-in" data-aos-duration="1000">
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <img src="<?= base_url('assets/img/brand/toyota.png') ?>" class="img-fluid" alt="">
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <img src="<?= base_url('assets/img/brand/honda.png') ?>" class="img-fluid" alt="">
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <img src="<?= base_url('assets/img/brand/Daihatsu.png') ?> " class="img-fluid" alt="">
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <img src="<?= base_url('assets/img/brand/hyundai.png') ?> " class="img-fluid" alt="">
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <img src="<?= base_url('assets/img/brand/mitsubishi.png') ?> " class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>



<!-- review -->
<section id="testimonial">
    <div class="container" data-aos="fade-up" data-aos-duration="1000">
        <div class="section-title">
            <h2>Review Terkini</h2>
            <p>Review tentang CarsRent kami adalah bukti nyata kepuasan pelanggan kami. Pelanggan kami telah
                mengalami pengalaman yang luar biasa dengan layanan kami</p>
        </div>
        <div class="row text-center d-flex align-items-stretch">


            <!-- ini isinya review dari user -->
            <!-- foreach(array_slice($section['Article'], 0, 3) as $article ):-->
            <?php
            foreach(array_slice($review, 0, 3) as $r ){
            ?>
                <div class="col-md-6 col-lg-4 col-12 mb-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-duration="1000" >
                    <div class="card testimonial-card"style="width: 1000px;">
                        <div class="card-up"></div>
                        <div class="avatar mx-auto bg-white">
                            <img src="<?= base_url('assets/img/profil/defaults.png') ?>" class="rounded-circle img-fluid" />
                        </div>
                        <div class="card-body">

                            <!-- nama user -->
                            <h4 class="mb-4"><?= $r['username']; ?></h4>
                            <hr />
                            <div class="position-relative "style="left:100px">
                                <img src="<?= base_url('assets/img/star/star'). $r['rating']; ?>.png" class="img-fluid rounded-start position-absolute top-0 start-0" style="width: 100px;">
                            </div>                        
                            <br>
                            <p class="dark-grey-text mt-4">

                                <!-- review user -->
                                <i class="fas  pe-2"></i>
                                "<?= $r['massage']; ?>"
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>



        </div>
</section>


<!-- akhir contet -->
<section id="cta">
    <div class="container">
        <div class="row align-items-center" data-aos="zoom-in" data-aos-duration="1000">
            <div class="col-lg-9 text-center text-lg-start col-12">
                <h3>BUTUH KENDARAAN ? LIHAT KISARAN HARGANYA SEKARANG!!</h3>
                <p> Apakah Anda membutuhkan kendaraan untuk keperluan pribadi, liburan keluarga, atau perjalanan
                    bisnis?
                    Jangan khawatir! Kami di CarsRent siap memberikan solusi untuk kisaran harga Mobil yang tepat untuk Anda.
                    Dapatkan
                    kendaraan yang Anda butuhkan dengan cepat dan mudah melalui layanan CarsRent terbaik kami
                </p>
            </div>
            <div class="col-lg-3 text-center col-12 mt-3 mt-lg-0">
                <a href="<?= base_url('contact') ?>" class="btn-cta">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>