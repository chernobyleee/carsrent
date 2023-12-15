<!-- dashboard -->

<div class="height-100 bg-light">
    <div class="container-fluid mt-5">

        <div class="row mt-5" id="dashboard">
            <div class="col-lg-12">
                <div class="card mb-3 text-white mt-5" style="background-color: #527853;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/profil/'.$user['gambar'])?>" class="card-img rounded-circle img-fluid ms-5" alt="..." style="object-fit: cover; margin: 25px; width: 200px; height: 200px;">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body ">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">
                                    <h1 class="fs-1 mt-5 fw-bold"><?= $user['username']; ?></h1>

                                </div>
                                <p class="card-text fs-5">Nama : <?= $user['nama']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- begin row -->
        <div class="mt-5 text-center">
            <div class="badge bg-success text-wrap mt-5 mb-3" style="width: 11rem;">
                <i class='bx bx-grid-alt nav_icon fs-6'></i> <span class="fs-6">Dashboard</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2 text-bg-dark">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah User</div>
                                <div class="h1 mb-0 font-weight-bold text-white"><?= $totaluser ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="#">
                                    <i class="fas fa-users fa-3x text-warning">
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 text-bg-dark">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total review</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                <?= $totalreview ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="#"><i class="fas fa-book fa-3x text-primary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2 text-bg-dark">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">massage</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                <?= $totalcontact ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="#"><i class="bi bi-chat-dots-fill fa-3x text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2 text-bg-dark">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total Mobil</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                <?= $totalcars ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="#"><i class="bi bi-car-front-fill fa-3x text-danger"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir row -->
