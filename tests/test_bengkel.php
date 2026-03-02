<!-- end list -->
<?php
// Script Pengujian Manual Logika Perhitungan Bengkel
echo "=== PENGUJIAN LOGIKA SISTEM ===\n\n";

$harga_servis = ["Servis Ringan" => 50000, "Ganti Oli" => 75000];
$biaya_motor = ["Honda Beat" => 0, "Yamaha Nmax" => 15000];

// Skenario Pengujian 1
$subtotal1 = $harga_servis["Servis Ringan"] + $biaya_motor["Honda Beat"];
echo "Skenario 1: Servis Ringan + Honda Beat\n";
echo "Ekspektasi: 50000 | Hasil Output: " . $subtotal1 . "\n";
echo ($subtotal1 == 50000) ? "STATUS: BERHASIL [PASSED]\n\n" : "STATUS: GAGAL [FAILED]\n\n";

// Skenario Pengujian 2
$subtotal2 = $harga_servis["Ganti Oli"] + $biaya_motor["Yamaha Nmax"];
echo "Skenario 2: Ganti Oli + Yamaha Nmax\n";
echo "Ekspektasi: 90000 | Hasil Output: " . $subtotal2 . "\n";
echo ($subtotal2 == 90000) ? "STATUS: BERHASIL [PASSED]\n\n" : "STATUS: GAGAL [FAILED]\n\n";

echo "Seluruh skenario pengujian telah selesai dieksekusi.\n";
?>