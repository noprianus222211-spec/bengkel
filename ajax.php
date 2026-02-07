<?php
require 'koneksi.php';

$kategori = $_GET['kategori'] ?? [];

$where = '';
if (!empty($kategori) && is_array($kategori)) {
    $safe = array_map(fn($k) => "'" . mysqli_real_escape_string($conn, $k) . "'", $kategori);
    $where = "WHERE 222211_kategori_sparepart IN (" . implode(',', $safe) . ")";
}

$sql = "
    SELECT 
        222211_kategori_sparepart AS kategori,
        222211_kodespareparts AS kode,
        222211_namaspareparts AS nama,
        222211_hargaspareparts AS harga
    FROM spareparts_222211
    $where
    ORDER BY kategori, nama
";

$q = mysqli_query($conn, $sql);

$data = [];
while ($r = mysqli_fetch_assoc($q)) {
    $data[] = $r;
}

if($where == ''){
    $data = [];
}

header('Content-Type: application/json');
echo json_encode($data);
