<?php
    include 'index.php';
    include 'koneksi.php';

    $query = "SELECT max(222211_kodecustomer) as maxkode FROM customer_222211";
    $hasil = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($hasil);
    $kode = $data['maxkode'];
    $nourut = (int) substr($kode, 4, 3);
    $nourut++;
    $char = "CUST";
    $kode = $char . sprintf("%03s", $nourut);
?>

<div class="container-fluid py-2">
    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#tambah">
        Add Costumer
    </button>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize text-center">COSTUMER</h6>
                </div>

                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Kode</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">No. Telephone</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM customer_222211");
                                    while ($cust = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <p class="text-md font-weight-bold mb-0"><?php echo $cust['222211_kodecustomer']; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-md font-weight-bold mb-0"><?php echo $cust['222211_nama']; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-md font-weight-bold mb-0"><?php echo $cust['222211_notlp']; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="#" data-bs-toggle="modal" class="badge badge-sm bg-info" data-bs-target="#edit<?php echo $cust['222211_kodecustomer']; ?>">Edit</a>
                                            <a href="#" data-bs-toggle="modal" class="badge badge-sm bg-danger" data-bs-target="#delete<?php echo $cust['222211_kodecustomer']; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit<?php echo $cust['222211_kodecustomer']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Customer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="editcustomer.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $cust['222211_kodecustomer']; ?>">
                                                        <div class="input-group input-group-outline is-filled mb-4">
                                                            <label class="form-label">Kode</label>
                                                            <input type="text" class="form-control" name="kode" value="<?php echo $cust['222211_kodecustomer']; ?>" readonly>
                                                        </div>
                                                        <div class="input-group input-group-outline is-filled mb-4">
                                                            <label class="form-label">Nama</label>
                                                            <input type="text" class="form-control" name="nama" value="<?php echo $cust['222211_nama']; ?>" required>
                                                        </div>
                                                        <div class="input-group input-group-outline is-filled mb-4">
                                                            <label class="form-label">No. Telephone</label>
                                                            <input type="text" class="form-control" name="notlp" value="<?php echo $cust['222211_notlp']; ?>" required>
                                                        </div>
                                                        <div class="modal-footer justify-content-left">
                                                            <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn bg-gradient-dark" name="edit">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="delete<?php echo $cust['222211_kodecustomer']; ?>" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Customer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center">Apakah Anda yakin ingin menghapus Customer ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Batal</button>
                                                    <a href="hapuscustomer.php?id=<?php echo $cust['222211_kodecustomer']; ?>" class="btn bg-gradient-dark">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="tambahcustomer.php" method="POST">
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" class="form-control" name="kode" value="<?php echo $kode; ?>" readonly>
                        </div>
                        <div class="input-group input-group-outline mb-4">
                            <label for="plat" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="input-group input-group-outline mb-4">
                            <label for="notlp" class="form-label">No. Telephone</label>
                            <input type="text" class="form-control" name="notlp" required>
                        </div>
                        <div class="input-group input-group-outline mb-4">
                            <label for="plat" class="form-label">Plat</label>
                            <input type="text" class="form-control" name="plat" required>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="jenis" class="form-control">
                                <option disabled selected>-- Jenis Kendaraan --</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                            </select>
                        </div>
                        <div class="input-group input-group-outline mb-4">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control" name="merk" required>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="tanggal_service" class="form-label">Tanggal Service</label>
                            <input type="date" class="form-control" name="tanggal_service" required>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="kerusakan" class="form-label">Kerusakan</label>
                            <textarea name="kerusakan" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-3">
                            <label class="form-label">Harga Jasa</label>
                            <input type="number" name="hargajasa" class="form-control" placeholder="0" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih Spareparts</label><br>
                            <?php
                            $sparepartsQuery = mysqli_query($conn, "SELECT * FROM spareparts_222211");
                            while ($sparepart = mysqli_fetch_array($sparepartsQuery)) {
                            ?>
                                <div>
                                    <input type="checkbox" name="spareparts[]" value="<?php echo $sparepart['222211_kodespareparts']; ?>" onchange="updateTotal('<?php echo $transaksi['222211_kodecustomer']; ?>')">
                                    <?php echo $sparepart['222211_namaspareparts'] . " - <b>" . rupiah($sparepart['222211_hargaspareparts'])."</b>" ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer justify-content-left">
                            <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-dark" name="tambah">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>