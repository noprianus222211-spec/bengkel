<?php 
include 'index.php';
?>
<div class="container-fluid py-2">
    <!-- Menambahkan teks di tengah halaman dengan kotak biru -->
    <div class="row">
    <div class="col text-center mb-4">
    <div class="card" style="background-color:rgb(29, 95, 165); border: none; padding: 20px;">
        <h4 class="text-white mt-3">29Garage Solusi Terbaik Untuk Mobil Anda</h4>
        <p class="text-white">Kami menyediakan layanan perawatan dan perbaikan mobil untuk menjaga performa kendaraan Anda tetap optimal.</p>
    </div>
</div>

    </div>

    <div class="row">
        <!-- Tambahkan tiga gambar dalam satu baris -->
        <div class="col text-center mb-4">
            <div class="card" style="background-color:rgb(29, 92, 160); border: none; padding: 20px;">
                <img src="assets/img/gambar0.jpg" alt="Banner" style="width: 100%; max-width: 300px;">
            </div>
        </div>
        <div class="col text-center mb-4">
            <div class="card" style="background-color:rgb(29, 95, 165); border: none; padding: 20px;">
                <img src="assets/img/gambarcat1.png" alt="Service" style="width: 100%; max-width: 300px;">
            </div>
        </div>
        <div class="col text-center mb-4">
            <div class="card" style="background-color:rgb(29, 95, 165); border: none; padding: 20px;">
                <img src="assets/img/sukucadang.jpg" alt="Quality" style="width: 100%; max-width: 300px;">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="ms-3">
            <br>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3" style="background-color:rgb(29, 94, 165);">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize text-white">Sparepart</p>
                            <h3 class="mb-0">
                                <?php
                                $query = "SELECT * FROM spareparts_222211";
                                $hitung = mysqli_query($conn, $query);
                                $baris = mysqli_num_rows($hitung);
                                echo $baris;
                                ?>
                            </h3>
                        </div>
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="fas fa-wrench"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2 ps-3"></div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3" style="background-color:rgb(29, 94, 165);">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize text-white">Kendaraan</p>
                            <h3 class="mb-0">
                                <?php
                                $query = "SELECT * FROM kendaraan_222211";
                                $hitung = mysqli_query($conn, $query);
                                $baris = mysqli_num_rows($hitung);
                                echo $baris;
                                ?>
                            </h3>
                        </div>
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2 ps-3"></div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3" style="background-color:rgb(29, 96, 165);">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize text-white">Customer</p>
                            <h3 class="mb-0">
                                <?php
                                $query = "SELECT * FROM customer_222211";
                                $hitung = mysqli_query($conn, $query);
                                $baris = mysqli_num_rows($hitung);
                                echo $baris;
                                ?>
                            </h3>
                        </div>
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2 ps-3"></div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3" style="background-color:rgb(29, 94, 165);">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize text-white">Mekanik</p>
                            <h3 class="mb-0">
                                <?php
                                $query = "SELECT * FROM mekanik_222211";
                                $hitung = mysqli_query($conn, $query);
                                $baris = mysqli_num_rows($hitung);
                                echo $baris;
                                ?>
                            </h3>
                        </div>
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="fas fa-user-gear"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2 ps-3"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <img src="assets/img/bg.svg" style="width: 600px; height: 600px;">
        </div>
    </div>
</div>
