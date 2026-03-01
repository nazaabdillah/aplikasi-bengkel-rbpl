<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = $_POST['nama'] ?? '';
    $plat_nomor = $_POST['plat_nomor'] ?? '';
    $jenis_motor = $_POST['jenis_motor'] ?? '';
    $jenis_servis = $_POST['jenis_servis'] ?? '';
    
    $errors = [];
    if (empty($nama)) $errors[] = "Nama harus diisi";
    if (empty($plat_nomor)) $errors[] = "Plat nomor harus diisi";
    if (empty($jenis_motor)) $errors[] = "Jenis motor harus dipilih";
    if (empty($jenis_servis)) $errors[] = "Jenis servis harus dipilih";
    
    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: form_input.php");
        exit;
    }
  
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
    
    $harga_motor = [
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
    
    $biaya_servis = $harga_servis[$jenis_servis] ?? 50000; 
    $biaya_tambahan = $harga_motor[$jenis_motor] ?? 0;
    $total_biaya = $biaya_servis + $biaya_tambahan;
    
    $biaya_spare_part = 0; 
    
    $ppn = $total_biaya * 0.1;
    $grand_total = $total_biaya + $ppn + $biaya_spare_part;
 
    $data_servis = [
        'nama' => $nama,
        'plat_nomor' => $plat_nomor,
        'jenis_motor' => $jenis_motor,
        'jenis_servis' => $jenis_servis,
        'biaya_servis' => $biaya_servis,
        'biaya_tambahan' => $biaya_tambahan,
        'biaya_spare_part' => $biaya_spare_part,
        'sub_total' => $total_biaya,
        'ppn' => $ppn,
        'grand_total' => $grand_total,
        'tanggal' => date('d-m-Y H:i:s'),
        'no_nota' => 'SRV-' . date('Ymd') . '-' . rand(100, 999)
    ];

    $_SESSION['data_servis'] = $data_servis;

    header("Location: hasil_struk.php");
    exit;
    
} else {
 
    header("Location: form_input.php");
    exit;
}
?>
