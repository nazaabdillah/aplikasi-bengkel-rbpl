<?php
session_start();

// Redirect kalau diakses langsung tanpa lewat form
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}

$nama = $_POST['nama'] ?? '';
$plat_nomor = $_POST['plat_nomor'] ?? '';
$jenis_motor = $_POST['jenis_motor'] ?? '';
$jenis_servis = $_POST['jenis_servis'] ?? '';

if (empty($nama) || empty($plat_nomor) || empty($jenis_motor) || empty($jenis_servis)) {
    die("ERROR: Data tidak lengkap!");
}

// Data Harga (Logic Yoga)
$harga_servis = [
    "Servis Ringan" => 50000, "Servis Berkala" => 150000, "Ganti Oli" => 75000,
    "Tune Up" => 100000, "Ganti Ban" => 250000, "Perbaikan Mesin" => 300000,
    "Perbaikan Kelistrikan" => 125000, "Perbaikan Rem" => 80000, "Cuci Motor" => 25000
];

$biaya_motor = [
    "Honda Beat" => 0, "Honda Scoopy" => 5000, "Honda Vario" => 5000, "Honda PCX" => 15000,
    "Yamaha Mio" => 0, "Yamaha Nmax" => 15000, "Yamaha Aerox" => 15000, "Yamaha Jupiter" => 0,
    "Suzuki Nex" => 0, "Suzuki Satria" => 10000, "Kawasaki Ninja" => 20000, "Lainnya" => 25000
];

// Perhitungan
$biaya_jasa = isset($harga_servis[$jenis_servis]) ? $harga_servis[$jenis_servis] : 50000;
$biaya_tambahan_motor = isset($biaya_motor[$jenis_motor]) ? $biaya_motor[$jenis_motor] : 0;
$subtotal = $biaya_jasa + $biaya_tambahan_motor;
$ppn = $subtotal * 0.1; // PPN 10%
$total_biaya = $subtotal + $ppn;

// Simpan ke Session buat ditarik di Struk Agi
$_SESSION['data_servis'] = [
    'nama' => $nama,
    'plat_nomor' => $plat_nomor,
    'jenis_motor' => $jenis_motor,
    'jenis_servis' => $jenis_servis,
    'biaya_jasa' => $biaya_jasa,
    'biaya_tambahan_motor' => $biaya_tambahan_motor,
    'subtotal' => $subtotal,
    'ppn' => $ppn,
    'total_biaya' => $total_biaya,
    'tanggal' => date('d-m-Y H:i:s'),
    'no_nota' => 'SRV-' . date('Ymd') . '-' . rand(100, 999)
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan - Bengkel RBPL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-200 min-h-screen flex flex-col items-center justify-center p-4 sm:p-8">

    <div class="w-full max-w-xl bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-white/50 ring-1 ring-slate-900/5">
        
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-8 text-center relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
            <div class="text-4xl mb-3 relative z-10 drop-shadow-md">✅</div>
            <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight relative z-10">Perhitungan Sukses</h1>
            <p class="text-emerald-100 mt-2 text-sm font-medium relative z-10">Data servis telah berhasil diproses.</p>
        </div>

        <div class="p-6 sm:p-10">
            
            <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 mb-6">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span>👤</span> Data Pelanggan
                </h3>
                <div class="grid grid-cols-2 gap-y-4 gap-x-2">
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Nama</p>
                        <p class="text-sm font-semibold text-slate-800 mt-0.5"><?= htmlspecialchars($nama) ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Plat Nomor</p>
                        <p class="text-sm font-semibold text-slate-800 mt-0.5 uppercase"><?= htmlspecialchars($plat_nomor) ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Motor</p>
                        <p class="text-sm font-semibold text-slate-800 mt-0.5"><?= htmlspecialchars($jenis_motor) ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Servis</p>
                        <p class="text-sm font-semibold text-slate-800 mt-0.5"><?= htmlspecialchars($jenis_servis) ?></p>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span>💰</span> Rincian Biaya
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-600">Biaya Jasa</span>
                        <span class="font-semibold text-slate-800">Rp <?= number_format($biaya_jasa, 0, ',', '.') ?></span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-600">Biaya Tambahan Motor</span>
                        <span class="font-semibold text-slate-800">Rp <?= number_format($biaya_tambahan_motor, 0, ',', '.') ?></span>
                    </div>
                    <div class="flex justify-between items-center text-sm pt-3 border-t border-slate-100">
                        <span class="text-slate-600">Subtotal</span>
                        <span class="font-semibold text-slate-800">Rp <?= number_format($subtotal, 0, ',', '.') ?></span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-600">PPN (10%)</span>
                        <span class="font-semibold text-slate-800">Rp <?= number_format($ppn, 0, ',', '.') ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center mt-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                        <span class="font-bold text-blue-900">Total Biaya</span>
                        <span class="text-lg font-bold text-blue-700">Rp <?= number_format($total_biaya, 0, ',', '.') ?></span>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 border-t border-slate-100 pt-6">
                <a href="index.php" class="w-1/3 text-center bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-3.5 px-4 rounded-xl transition-all duration-200">
                    Batal
                </a>
                <a href="hasil_struk.php" class="w-2/3 text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 px-4 rounded-xl shadow-lg shadow-blue-600/30 transition-all duration-200 flex justify-center items-center gap-2">
                    Lihat Struk
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

        </div>
    </div>

</body>
</html>