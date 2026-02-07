<?php
  include 'index.php';
  include 'koneksi.php';
  $query = "SELECT max(222211_kodespareparts) as maxkode FROM spareparts_222211";
  $hasil = mysqli_query($conn, $query);
  $data = mysqli_fetch_array($hasil);
  $kode = $data['maxkode'];
  $nourut = (int) substr($kode, 3, 3);
  $nourut++;
  $char = "SPR";  
  $kode = $char . sprintf("%03s", $nourut);
?>
<div class="container-fluid py-2">
    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#tambah">
       Add Spareparts
    </button>

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize text-center">SPAREPARTS</h6>
                </div>

                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Kode</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Kategori Sparepart</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Merk</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Harga</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Stok</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM spareparts_222211 ORDER BY 222211_kategori_sparepart ASC");
                                while ($spareparts = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td class="align-middle text-center"><p class="text-md font-weight-bold mb-0"><?php echo $spareparts['222211_kodespareparts']; ?></p></td>
                                    <td class="align-middle"><p class="text-md font-weight-bold mb-0"><?php echo $spareparts['222211_namaspareparts']; ?></p></td>
                                    <td class="align-middle text-center"><p class="text-md font-weight-bold mb-0"><?php echo $spareparts['222211_kategori_sparepart']; ?></p></td>
                                    <td class="align-middle text-center"><p class="text-md font-weight-bold mb-0"><?php echo $spareparts['222211_merkspareparts']; ?></p></td>
                                    <td class="align-middle text-right"><p class="text-md font-weight-bold mb-0">Rp. <?php echo number_format($spareparts['222211_hargaspareparts']); ?></p></td>
                                    <td class="align-middle text-center"><p class="text-md font-weight-bold mb-0"><?php echo $spareparts['222211_stok']; ?></p></td>
                                    <td class="align-middle text-center">
                                        <a href="#" data-bs-toggle="modal" class="badge badge-sm bg-info" data-bs-target="#edit<?php echo $spareparts['222211_idspareparts']; ?>">Edit</a>
                                        <a href="#" data-bs-toggle="modal" class="badge badge-sm bg-danger" data-bs-target="#delete<?php echo $spareparts['222211_idspareparts']; ?>">Hapus</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit<?php echo $spareparts['222211_idspareparts']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Spareparts</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="editspareparts.php" method="POST">
                                                    <div class="input-group input-group-outline is-filled mb-4">
                                                        <label for="kode" class="form-label">Kode</label>
                                                        <input type="text" class="form-control" name="kode" value="<?php echo $spareparts['222211_kodespareparts']; ?>" readonly>
                                                    </div>
                                                    <div class="input-group input-group-outline is-filled mb-4">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" name="nama" value="<?php echo $spareparts['222211_namaspareparts']; ?>" required>
                                                    </div>
                                                    <div class="input-group input-group-outline is-filled mb-4">
                                                        <label for="kategori_sparepart" class="form-label">Kategori Sparepart</label>
                                                        <?php
                                                            $currentKategori = $spareparts['222211_kategori_sparepart'];
                                                        ?>
                                                        <select name="kategori_sparepart" id="kategori_sparepart" class="form-control">
                                                            <option value="Ganti Oli" <?= $currentKategori == 'Ganti Oli' ? 'selected' : '' ?>>Ganti Oli</option>
                                                            <option value="Tune Up" <?= $currentKategori == 'Tune Up' ? 'selected' : '' ?>>Tune Up</option>
                                                            <option value="Overhaul" <?= $currentKategori == 'Overhaul' ? 'selected' : '' ?>>Overhaul</option>
                                                            <option value="Kaki-Kaki" <?= $currentKategori == 'Kaki-Kaki' ? 'selected' : '' ?>>Kaki-Kaki</option>
                                                            <option value="Kelistrikan" <?= $currentKategori == 'Kelistrikan' ? 'selected' : '' ?>>Kelistrikan</option>
                                                            <option value="Cas Aki" <?= $currentKategori == 'Cas Aki' ? 'selected' : '' ?>>Cas Aki</option>
                                                            <option value="Body Repair" <?= $currentKategori == 'Body Repair' ? 'selected' : '' ?>>Body Repair</option>
                                                            <option value="Body Dico" <?= $currentKategori == 'Body Dico' ? 'selected' : '' ?>>Body Dico</option>
                                                            <option value="Service AC dan Isi Freon" <?= $currentKategori == 'Service AC dan Isi Freon' ? 'selected' : '' ?>>
                                                                Service AC dan Isi Freon
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group input-group-outline is-filled mb-4">
                                                        <label for="merk" class="form-label">Merk</label>
                                                        <input type="text" class="form-control" name="merk" value="<?php echo $spareparts['222211_merkspareparts']; ?>" required>
                                                    </div>
                                                    <div class="input-group input-group-outline is-filled mb-4">
                                                        <label for="harga" class="form-label">Harga</label>
                                                        <input type="text" class="form-control" name="harga" value="<?php echo $spareparts['222211_hargaspareparts']; ?>" required>
                                                    </div>
                                                    <div class="input-group input-group-outline is-filled mb-4">
                                                        <label for="stok" class="form-label">Stok</label>
                                                        <input type="text" class="form-control" name="stok" value="<?php echo $spareparts['222211_stok']; ?>" required>
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
                                <div class="modal fade" id="delete<?php echo $spareparts['222211_idspareparts']; ?>" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Spareparts</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center">Apakah Anda yakin ingin menghapus sparepart ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Batal</button>
                                                <a href="hapusspareparts.php?id=<?php echo $spareparts['222211_idspareparts']; ?>" class="btn bg-gradient-dark">Hapus</a>
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
                    <h5 class="modal-title">Tambah Spareparts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="tambahspareparts.php" method="POST">
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" class="form-control" name="kode" value="<?php echo $kode; ?>" readonly>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="kategori_sparepart" class="form-label">Kategori Sparepart</label>
                            <select name="kategori_sparepart" id="kategori_sparepart" class="form-control">
                                <option disabled selected>Pilih Kategori Sparepart</option>
                                <option value="Ganti Oli">Ganti Oli</option>
                                <option value="Tune Up">Tune Up</option>
                                <option value="Overhaul">Overhaul</option>
                                <option value="Kaki-Kaki">Kaki-Kaki</option>
                                <option value="Kelistrikan">Kelistrikan</option>
                                <option value="Cas Aki">Cas Aki</option>
                                <option value="Body Repair">Body Repair</option>
                                <option value="Body Dico">Body Dico</option>
                                <option value="Service AC dan Isi Freon">Service AC dan Isi Freon</option>
                            </select>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control" name="merk" required>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" required>
                        </div>
                        <div class="input-group input-group-outline is-filled mb-4">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" name="stok" required>
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