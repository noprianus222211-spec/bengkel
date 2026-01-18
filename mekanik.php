<?php
    include 'index.php';
    include 'koneksi.php';

    $query = "SELECT max(222211_kodemekanik) as maxkode FROM mekanik_222211";
    $hasil = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($hasil);
    $kode = $data['maxkode'];
    $nourut = (int) substr($kode, 4, 3);
    $nourut++;
    $char = "MKNK";
    $kode = $char . sprintf("%03s", $nourut);
?>

<div class="container-fluid py-2">
    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#tambah">
        Add Mechanical
    </button>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize text-center">MECHANICHAL</h6>
                </div>

                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Kode</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM mekanik_222211");
                                    while ($cust = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <p class="text-md font-weight-bold mb-0"><?php echo $cust['222211_kodemekanik']; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-md font-weight-bold mb-0"><?php echo $cust['222211_namamekanik']; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-md font-weight-bold mb-0"><?php echo $cust['222211_status']; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="#" data-bs-toggle="modal" class="badge badge-sm bg-info" data-bs-target="#edit<?php echo $cust['222211_kodemekanik']; ?>">Edit</a>
                                            <a href="#" data-bs-toggle="modal" class="badge badge-sm bg-danger" data-bs-target="#delete<?php echo $cust['222211_kodemekanik']; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit<?php echo $cust['222211_kodemekanik']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Mekanik</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="editmekanik.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $cust['222211_kodemekanik']; ?>">
                                                        <div class="input-group input-group-outline is-filled mb-4">
                                                            <label class="form-label">Kode</label>
                                                            <input type="text" class="form-control" name="kode" value="<?php echo $cust['222211_kodemekanik']; ?>" readonly>
                                                        </div>
                                                        <div class="input-group input-group-outline is-filled mb-4">
                                                            <label class="form-label">Nama</label>
                                                            <input type="text" class="form-control" name="nama" value="<?php echo $cust['222211_namamekanik']; ?>" required>
                                                        </div>
                                                        <div class="input-group input-group-outline is-filled mb-4">
                                                            <label class="form-label">Status</label>
                                                            <select name="status" class="form-control">
                                                                <option value="<?php echo $cust['222211_status']; ?>"><?php echo $cust['222211_status']; ?></option>
                                                                <?php if($cust['222211_status'] == 'Tersedia') { ?>
                                                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                                                <?php }else { ?>
                                                                    <option value="Tersedia">Tersedia</option>
                                                                <?php } ?>
                                                            </select>
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
                                    <div class="modal fade" id="delete<?php echo $cust['222211_kodemekanik']; ?>" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Mekanik</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center">Apakah Anda yakin ingin menghapus Mekanik ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Batal</button>
                                                    <a href="hapusmekanik.php?id=<?php echo $cust['222211_kodemekanik']; ?>" class="btn bg-gradient-dark">Hapus</a>
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
                    <h5 class="modal-title">Tambah Mekanik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="tambahmekanik.php" method="POST">
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" class="form-control" name="kode" value="<?php echo $kode; ?>" readonly>
                        </div>
                        <div class="input-group input-group-outline mb-4">
                            <label for="plat" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="plat" class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option selected disabled>-- Status --</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
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