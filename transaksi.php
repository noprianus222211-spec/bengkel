<?php
include 'index.php';
include 'koneksi.php';

$query = "SELECT max(222211_kodetransaksi) as maxkode FROM transaksi_222211";
$hasil = mysqli_query($conn, $query);
$data = mysqli_fetch_array($hasil);
$kode = $data['maxkode'];
$nourut = (int) substr($kode, 4, 3);
$nourut++;
$char = "TRNS";
$kode = $char . sprintf("%03s", $nourut);
?>

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">
            <form action="laporantransaksi.php" method="GET" class="d-flex justify-content-between mb-4">
                <div class="col-5">
                    <div class="input-group input-group-outline is-filled">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                    </div>
                </div>
                <div class="col-5">
                    <div class="input-group input-group-outline is-filled">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" required>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary align-self-center">Cetak Laporan</button>
                </div>
            </form>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize text-center">TRANSACTION</h6>
                </div>

                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Kode</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">No. Tlp</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Plat</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Jenis</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Merk</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Tgl</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Pembayaran</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM viewcust");
                                while ($transaksi = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td class="align-middle text-center"><?php echo $transaksi['222211_kodecustomer']; ?></td>
                                        <td class="align-middle text-center"><?php echo $transaksi['222211_nama']; ?></td>
                                        <td class="align-middle text-center"><?php echo $transaksi['222211_notlp']; ?></td>
                                        <td class="align-middle text-center"><?php echo $transaksi['222211_plat']; ?></td>
                                        <td class="align-middle text-center"><?php echo $transaksi['222211_jenis']; ?></td>
                                        <td class="align-middle text-center"><?php echo $transaksi['222211_merk']; ?></td>
                                        <td class="align-middle text-center"><?php echo $transaksi['222211_tgl']; ?></td>
                                        <td class="align-middle text-center"><?php echo $transaksi['222211_pembayaran']; ?></td>
                                        <td class="align-middle text-center">
                                            <?php if ($transaksi['222211_pembayaran'] == 'Berhasil') { ?>
                                                <a target="blank" href="cetakstruk.php?kode=<?php echo $transaksi['222211_kodecustomer']; ?>" class="badge badge-sm bg-info">Cetak Struk</a>
                                            <?php } else { ?>
                                                <a href="#" data-bs-toggle="modal" class="badge badge-sm bg-success" data-bs-target="#bayar<?php echo $transaksi['222211_kodecustomer']; ?>">Bayar</a>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="bayar<?php echo $transaksi['222211_kodecustomer']; ?>" tabindex="-1" aria-labelledby="bayar" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Pembayaran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="prosestransaksi.php" method="POST">
                                                        <!-- <input type="hidden" name="kode_transaksi" value="<?php echo $kode; ?>"> -->
                                                        <input type="hidden" name="kode_customer" value="<?php echo $transaksi['222211_kodecustomer']; ?>">
                                                        <?php
                                                            $trxcd = $transaksi['222211_kodecustomer'];
                                                            $querypart = mysqli_query($conn, "SELECT * FROM transaksi_222211
                                                                WHERE 222211_kodecustomer = '$trxcd' LIMIT 1");

                                                            $dataspare = mysqli_fetch_assoc($querypart);
                                                            $valuesparepart_db = $dataspare['222211_spareparts'];
                                                            // echo $valuesparepart;

                                                            $sparepartArray = array_map('trim', explode(',', $valuesparepart_db));

                                                            // escape + quote
                                                            $escaped = array_map(function($val) use ($conn) {
                                                                return "'" . mysqli_real_escape_string($conn, $val) . "'";
                                                            }, $sparepartArray);

                                                            // gabungkan untuk IN (...)
                                                            $valuesparepart = implode(',', $escaped);

                                                            $sparepartsQueryCal = mysqli_query($conn, "SELECT * FROM spareparts_222211 WHERE 222211_namaspareparts IN ($valuesparepart)");
                                                            $sparepartsQuery = mysqli_query($conn, "SELECT * FROM spareparts_222211 WHERE 222211_namaspareparts IN ($valuesparepart)");
                                                            $itemPrice = 0;
                                                            while ($ip = mysqli_fetch_array($sparepartsQueryCal)) {
                                                                $itemPrice += $ip['222211_hargaspareparts'];
                                                            }
                                                        ?>
                                                        <input type="hidden" name="kode_transaksi" value="<?php echo $dataspare['222211_kodetransaksi']; ?>">
                                                        <div class="mb-4">
                                                            <label class="form-label">Info Kerusakan</label>
                                                            <p><?php echo $transaksi['222211_kerusakan']; ?></p>
                                                        </div>

                                                        <!-- <div class="input-group input-group-outline is-filled mb-3">
                                                            <label class="form-label">Harga Jasa</label>
                                                            <input type="number" name="hargajasa" id="hargajasa_<?php echo $transaksi['222211_kodecustomer']; ?>" class="form-control" value="0" oninput="updateTotal('<?php echo $transaksi['222211_kodecustomer']; ?>','<?=$itemPrice?>')" required>
                                                        </div> -->

                                                        <div class="mb-3">
                                                            <label class="form-label">Pilih Spareparts</label><br>
                                                            <?php
                                                            while ($sparepart = mysqli_fetch_array($sparepartsQuery)) {
                                                            ?>
                                                                <div>
                                                                    <?php echo $sparepart['222211_namaspareparts'] . " - <b>" . rupiah($sparepart['222211_hargaspareparts'])."</b>" ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>

                                                        <div class="input-group input-group-outline is-filled mb-3">
                                                            <label class="form-label">Total</label>
                                                            <input type="number" name="total" class="form-control" value="<?=$dataspare['222211_total']?>" readonly>
                                                        </div>

                                                        <div class="input-group input-group-outline is-filled mb-3">
                                                            <label class="form-label">Jumlah Uang</label>
                                                            <input type="number" name="jumlah_uang" id="jumlah_uang_<?php echo $transaksi['222211_kodecustomer']; ?>" class="form-control" value="0" oninput="updateKembalian('<?php echo $transaksi['222211_kodecustomer']; ?>', '<?=$dataspare['222211_total']?>')" required>
                                                        </div>

                                                        <div class="input-group input-group-outline is-filled mb-3">
                                                            <label class="form-label">Kembalian</label>
                                                            <input type="number" name="kembalian" id="kembalian_<?php echo $transaksi['222211_kodecustomer']; ?>" class="form-control" value="0" readonly>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn bg-gradient-dark" name="bayar">Bayar</button>
                                                        </div>
                                                    </form>
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
</div>
<script>
    function updateTotal(kodeCustomer, price) {
        let total = 0;
        const hargaJasa = parseFloat(document.getElementById('hargajasa_' + kodeCustomer).value) || 0;
        // const checkboxes = document.querySelectorAll('input[name="spareparts[]"]:checked');
        // checkboxes.forEach((checkbox) => {
        //     const sparepartValue = parseFloat(checkbox.nextSibling.textContent.split('-')[1].trim());
        //     total += sparepartValue;
        // });
        total = hargaJasa + parseFloat(price);
        document.getElementById('total_' + kodeCustomer).value = total;
        updateKembalian(kodeCustomer);
    }

    function updateKembalian(kodeCustomer, total) {
        // const total = parseFloat(document.getElementById('total_' + kodeCustomer).value) || 0;
        const jumlahUang = parseFloat(document.getElementById('jumlah_uang_' + kodeCustomer).value) || 0;
        const kembalian = jumlahUang - parseFloat(total);
        document.getElementById('kembalian_' + kodeCustomer).value = kembalian >= 0 ? kembalian : 0;
    }
</script>