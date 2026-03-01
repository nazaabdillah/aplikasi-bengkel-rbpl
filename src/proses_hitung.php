<?php
function hitungBiayaServis($jenis_servis, $jenis_motor, $biaya_tambahan = 0) {

    $harga_servis = [
        "Servis Ringan" => 50000,
        "Servis Berkala" => 150000,
        "Ganti Oli" => 75000,
        "Tune Up" => 100000,
        "Ganti Ban" => 250000,
        "Perbaikan Mesin" => 300000,
        "Perbaikan Kelistrikan" => 125000,
        "Perbaikan Rem" => 80000,
        "Cuci Motor" => 25000
    ];

    $biaya_motor = [
        "Honda Beat" => 0,
        "Honda Scoopy" => 5000,
        "Honda Vario" => 5000,
        "Honda PCX" => 15000,
        "Yamaha Mio" => 0,
        "Yamaha Nmax" => 15000,
        "Yamaha Aerox" => 15000,
        "Yamaha Jupiter" => 0,
        "Suzuki Nex" => 0,
        "Suzuki Satria" => 10000,
        "Kawasaki Ninja" => 20000,
        "Lainnya" => 25000
    ];

    $biaya_jasa = isset($harga_servis[$jenis_servis]) ? $harga_servis[$jenis_servis] : 50000;
    $biaya_motor_tambahan = isset($biaya_motor[$jenis_motor]) ? $biaya_motor[$jenis_motor] : 0;
    $subtotal = $biaya_jasa + $biaya_motor_tambahan;
    $ppn = $subtotal * 0.1;
    $grand_total = $subtotal + $ppn + $biaya_tambahan;

    $hasil = [

        'biaya_jasa' => $biaya_jasa,
        'biaya_motor_tambahan' => $biaya_motor_tambahan,
        'biaya_spare_part' => $biaya_tambahan,
        'subtotal_sebelum_ppn' => $subtotal,
        'ppn_10_persen' => $ppn,
        'total_biaya' => $grand_total,

        'biaya_jasa_rp' => 'Rp ' . number_format($biaya_jasa, 0, ',', '.'),
        'biaya_motor_tambahan_rp' => 'Rp ' . number_format($biaya_motor_tambahan, 0, ',', '.'),
        'biaya_spare_part_rp' => 'Rp ' . number_format($biaya_tambahan, 0, ',', '.'),
        'subtotal_rp' => 'Rp ' . number_format($subtotal, 0, ',', '.'),
        'ppn_rp' => 'Rp ' . number_format($ppn, 0, ',', '.'),
        'total_rp' => 'Rp ' . number_format($grand_total, 0, ',', '.'),
        
        'jenis_servis' => $jenis_servis,
        'jenis_motor' => $jenis_motor,
        'tanggal_hitung' => date('d-m-Y H:i:s'),
        'no_ref' => 'INV-' . date('Ymd') . '-' . rand(1000, 9999)
    ];
    
    return $hasil;
}

function hitungBiayaServisJson($jenis_servis, $jenis_motor, $biaya_tambahan = 0) {
    $hasil = hitungBiayaServis($jenis_servis, $jenis_motor, $biaya_tambahan);
    header('Content-Type: application/json');
    return json_encode($hasil, JSON_PRETTY_PRINT);
}

function cekKetersediaanServis($jenis_servis, $jenis_motor) {
    $servis_tersedia = [
        "Servis Ringan", "Servis Berkala", "Ganti Oli", 
        "Tune Up", "Ganti Ban", "Perbaikan Mesin", 
        "Perbaikan Kelistrikan", "Perbaikan Rem", "Cuci Motor"
    ];
    
    $motor_tersedia = [
        "Honda Beat", "Honda Scoopy", "Honda Vario", "Honda PCX",
        "Yamaha Mio", "Yamaha Nmax", "Yamaha Aerox", "Yamaha Jupiter",
        "Suzuki Nex", "Suzuki Satria", "Kawasaki Ninja", "Lainnya"
    ];
    
    $valid = true;
    $pesan = [];
    
    if (!in_array($jenis_servis, $servis_tersedia)) {
        $valid = false;
        $pesan[] = "Jenis servis '$jenis_servis' tidak tersedia";
    }
    
    if (!in_array($jenis_motor, $motor_tersedia)) {
        $valid = false;
        $pesan[] = "Jenis motor '$jenis_motor' tidak terdaftar";
    }
    
    return [
        'valid' => $valid,
        'pesan' => $pesan
    ];
}
?>
