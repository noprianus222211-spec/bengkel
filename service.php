<?php
include 'index.php';
include 'koneksi.php';
?>
<div class="container-fluid py-2">
    <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM kendaraan_222211 WHERE 222211_status IN ('Proses', 'Dikerjakan')");
        if (mysqli_num_rows($query) > 0) {
            while ($cust = mysqli_fetch_array($query)) {
        ?>
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0"><?php echo $cust['222211_plat']; ?></h4>
                            <h6 class="text-muted"><?php echo $cust['222211_merk']; ?></h6>
                        </div>
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="fas fa-car fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer text-center">
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#info<?php echo $cust['222211_kodecustomer']; ?>">
                        Info
                    </button>
                    <?php 
                    if (empty($cust['222211_kodemekanik'])) {
                    ?>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#mechanic<?php echo $cust['222211_kodecustomer']; ?>">
                            Pilih Mekanik
                        </button>
                    <?php } ?>

                    <?php if ($cust['222211_status'] == 'Dikerjakan') { ?>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#finish<?php echo $cust['222211_kodecustomer']; ?>">
                            Selesai
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="modal fade" id="info<?php echo $cust['222211_kodecustomer']; ?>" tabindex="-1" aria-labelledby="info" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Info Kendaraan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Plat:</strong> <?php echo $cust['222211_plat']; ?></p>
                        <p><strong>Merk:</strong> <?php echo $cust['222211_merk']; ?></p>
                        <p><strong>Jenis:</strong> <?php echo $cust['222211_jenis']; ?></p>
                        <p><strong>Tanggal Service:</strong> <?php echo $cust['222211_tgl']; ?></p>
                        <p><strong>Kerusakan:</strong> <?php echo $cust['222211_kerusakan']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mechanic<?php echo $cust['222211_kodecustomer']; ?>" tabindex="-1" aria-labelledby="mechanic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Mekanik</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="pilihmekanik.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $cust['222211_kodecustomer']; ?>">
                            <div class="input-group input-group-outline is-filled mb-4">
                                <label class="form-label">Pilih Mekanik:</label>
                                <select name="kode" class="form-control" required>
                                    <option disabled selected>-- Pilih Mekanik --</option>
                                    <?php
                                    $mekanikQuery = mysqli_query($conn, "SELECT * FROM mekanik_222211 WHERE 222211_status = 'Tersedia'");
                                    while ($mekanik = mysqli_fetch_array($mekanikQuery)) {
                                        echo "<option value='" . $mekanik['222211_kodemekanik'] . "'>" . $mekanik['222211_namamekanik'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-dark" name="pilih">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="finish<?php echo $cust['222211_kodecustomer']; ?>" tabindex="-1" aria-labelledby="finish" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin mengubah status kendaraan ini menjadi "Selesai"?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="selesaiservice.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $cust['222211_kodecustomer']; ?>">
                            <input type="hidden" name="kode" value="<?php echo $cust['222211_kodemekanik']; ?>">
                            <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-gradient-dark" name="selesai">Selesai</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            } 
        } else { 
        ?>
        <div class="col-12">
            <h2 class="text-center">
                Tidak ada kendaraan yang ingin diservice saat ini.
            </h2>
        </div>
        <div class="col text-center">
            <img src="assets/img/car.svg" style="width: 800px; height: 800px;">
        </div>
        <?php } ?>
    </div>
</div>