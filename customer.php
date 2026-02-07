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
    $kategori = mysqli_query($conn, "SELECT DISTINCT 222211_kategori_sparepart FROM spareparts_222211");
    $kerusakan = [];
    while ($row = mysqli_fetch_assoc($kategori)) {
        $kerusakan[] = $row['222211_kategori_sparepart'];
    }
    $kerusakanList = $kerusakan;
?>
<style>
.tag-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 4px;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 12px;
    width: 100%;
}

.tag {
    background: linear-gradient(195deg, #42424a 0%, #191919 100%);
    color: #fff;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.tag span {
    cursor: pointer;
    font-weight: bold;
}

.tag-input {
    border: none;
    outline: none;
    flex: 1;
    min-width: 120px;
}

.suggest-box {
    border: 1px solid #ddd;
    background: #f1f1f1;
    display: none;
    top: 50px;
    position: absolute;
    z-index: 1000;
    width: 100%;
    font-size: 13px;
}

.suggest-item {
    padding: 8px;
    cursor: pointer;
}

.suggest-item:hover {
    background: #c4c4c4;
}
</style>



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
                                    $query = mysqli_query($conn, "SELECT * FROM customer_222211 ORDER BY 222211_kodecustomer DESC");
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
                                            <!-- <a href="#" data-bs-toggle="modal" class="badge badge-sm bg-info" data-bs-target="#edit<?php echo $cust['222211_kodecustomer']; ?>">Edit</a> -->
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
                        <!-- <div class="input-group input-group-outline is-filled mb-4">
                            <label for="kerusakan" class="form-label">Kerusakan</label>
                            <textarea name="kerusakan" class="form-control"></textarea>
                        </div> -->
                        <label class="form-label">Kerusakan</label>
                        <input type="hidden" name="hidden_kerusakan" id="hidden_kerusakan">
                        <div class="input-group input-group-outline is-filled mb-1">
                            <div class="tag-wrapper" id="kerusakan-wrapper">
                                <input
                                    type="text"
                                    id="kerusakan-input"
                                    class="form-control"
                                    placeholder="Ketik kerusakan..."
                                    autocomplete="off"
                                    style="border: none; padding: 0 !important"
                                >
                            </div>

                            <div id="suggest-kerusakan" class="suggest-box"></div>
                            <input type="hidden" name="kerusakan" id="kerusakan-hidden">
                        </div>

                        <div class="mb-4">
                            <div id="sparepart-container">
                                <i class="text-muted">Pilih kerusakan terlebih dahulu</i>
                            </div>
                        </div>


                        <div class="input-group input-group-outline is-filled mb-3">
                            <label class="form-label">Harga Jasa</label>
                            <input type="number" name="hargajasa" class="form-control" placeholder="0" required>
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
<script>
/* =======================
   DATA & ELEMENTS
======================= */
const kerusakanData = <?= json_encode($kerusakanList) ?>;

const input   = document.getElementById('kerusakan-input');
const wrapper = document.getElementById('kerusakan-wrapper');
const box     = document.getElementById('suggest-kerusakan');
const hidden  = document.getElementById('kerusakan-hidden');

let selected = [];

input.classList.add('tag-input');

/* =======================
   HELPERS
======================= */
function normalize(val) {
    return val.trim().toLowerCase();
}

function updateHidden() {
    hidden.value = JSON.stringify(selected);
}

/* =======================
   TAG HANDLING
======================= */
function addTag(value) {
    const norm = normalize(value);
    if (!norm || selected.includes(norm)) return;

    selected.push(norm);
    updateHidden();

    const tag = document.createElement('div');
    tag.className = 'tag';
    tag.dataset.kategori = norm;

    const text = document.createElement('span');
    text.textContent = value;

    const close = document.createElement('span');
    close.innerHTML = '&times;';
    close.style.cursor = 'pointer';

    close.onclick = () => {
        selected = selected.filter(v => v !== norm);
        updateHidden();
        tag.remove();
        loadSparepartsAjax();
    };

    tag.appendChild(text);
    tag.appendChild(close);

    wrapper.insertBefore(tag, input);

    input.value = '';
    box.style.display = 'none';
    input.focus();

    
    const hiddenInput = document.getElementById("hidden_kerusakan");
    let existingArray = [];

    if (hiddenInput.value) {
    try {
        existingArray = JSON.parse(hiddenInput.value);
    } catch (e) {
        existingArray = [];
    }
    }
    let kerusakanBaru = value;

    if (!existingArray.includes(kerusakanBaru)) {
        existingArray.push(kerusakanBaru);
    }

    // set ulang
    hiddenInput.value = JSON.stringify(existingArray);


    loadSparepartsAjax();
}

/* =======================
   AUTOCOMPLETE
======================= */
function renderSuggestions(list) {
    box.innerHTML = '';

    if (!list.length) {
        box.style.display = 'none';
        return;
    }

    list.forEach(item => {
        const div = document.createElement('div');
        div.className = 'suggest-item';
        div.textContent = item;

        div.onclick = () => {
            addTag(item);
            box.style.display = 'none';
        };

        box.appendChild(div);
    });

    box.style.display = 'block';
}

input.addEventListener('input', () => {
    const q = normalize(input.value);

    if (q.length < 2) {
        box.style.display = 'none';
        return;
    }

    const result = kerusakanData.filter(item =>
        normalize(item).includes(q) &&
        !selected.includes(normalize(item))
    );

    renderSuggestions(result);
});

input.addEventListener('keydown', e => {
    if (e.key === 'Enter' && input.value.trim()) {
        addTag(input.value.trim());
        box.style.display = 'none';
        e.preventDefault();
    }
});

/* =======================
   CLICK OUTSIDE
======================= */
document.addEventListener('click', e => {
    if (
        !e.target.closest('#kerusakan-wrapper') &&
        !e.target.closest('#suggest-kerusakan')
    ) {
        box.style.display = 'none';
    }
});

/* =======================
   FILTER SPAREPART GROUP
======================= */
function loadSparepartsAjax() {

    const container = document.getElementById('sparepart-container');
    container.innerHTML = '<i>Loading...</i>';

    const params = new URLSearchParams();
    selected.forEach(k => params.append('kategori[]', k));
    fetch('ajax.php?' + params.toString())
        .then(res => res.json())
        .then(data => {
            container.innerHTML = '';

            if (!data.length) {
                container.innerHTML = '<i>Tidak ada sparepart</i>';
                return;
            }

            let currentKategori = '';
            let group = null;

            data.forEach(sp => {

                if (currentKategori !== sp.kategori) {
                    currentKategori = sp.kategori;

                    group = document.createElement('div');
                    group.className = 'sparepart-group';
                    group.dataset.kategori = normalize(sp.kategori);

                    const title = document.createElement('div');
                    title.className = 'sparepart-category mt-3 fw-bold';
                    title.textContent = sp.kategori;

                    group.appendChild(title);
                    container.appendChild(group);
                }

                const item = document.createElement('div');
                item.className = 'sparepart-item';
                item.innerHTML = `
                    <input type="checkbox" name="spareparts[]" value="${sp.kode}">
                    ${sp.nama} - <b>${formatRupiah(sp.harga)}</b>
                `;

                group.appendChild(item);
            });
        });
}
function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(angka);
}


</script>





