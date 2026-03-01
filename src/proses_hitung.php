<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = $_POST['nama'] ?? '';
    $plat_nomor = $_POST['plat_nomor'] ?? '';
    $jenis_motor = $_POST['jenis_motor'] ?? '';
    $jenis_servis = $_POST['jenis_servis'] ?? '';
    
    
    if (empty($nama) || empty($plat_nomor) || empty($jenis_motor) || empty($jenis_servis)) {
        die("ERROR: Data tidak lengkap!");
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
    $biaya_tambahan_motor = isset($biaya_motor[$jenis_motor]) ? $biaya_motor[$jenis_motor] : 0;
    $subtotal = $biaya_jasa + $biaya_tambahan_motor;
    $ppn = $subtotal * 0.1; // PPN 10%
    $total_biaya = $subtotal + $ppn;
    
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
        <title>Hasil Perhitungan Biaya Servis</title>
        <!-- <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Arial, sans-serif;
            }
            body {
                background: linear-gradient(135deg, #a9adbe 0%, #a9adbe 100%);
                min-height: 100vh;
                padding: 40px 20px;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
            }
            .header {
                background: white;
                border-radius: 15px 15px 0 0;
                padding: 25px;
                text-align: center;
                background: linear-gradient(135deg, #1e38e2 0%, #293dc2 100%);
                color: white;
            }
            .header h1 {
                font-size: 32px;
                margin-bottom: 5px;
            }
            .content {
                background: white;
                border-radius: 0 0 15px 15px;
                padding: 30px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            }
            .info-pelanggan {
                background: #f8f9fa;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 25px;
                border-left: 5px solid #FF8008;
            }
            .info-pelanggan h3 {
                color: #333;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .info-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
            .info-item {
                display: flex;
                flex-direction: column;
            }
            .info-label {
                font-size: 12px;
                color: #666;
                text-transform: uppercase;
            }
            .info-value {
                font-size: 18px;
                font-weight: bold;
                color: #333;
            }
            .table-perhitungan {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
            .table-perhitungan tr {
                border-bottom: 1px solid #dee2e6;
            }
            .table-perhitungan td {
                padding: 15px 10px;
                font-size: 16px;
            }
            .table-perhitungan td:last-child {
                text-align: right;
                font-weight: 600;
            }
            .total-row {
                background: #fff3e0;
                font-size: 20px;
                font-weight: bold;
            }
            .total-row td {
                color: #FF8008;
            }
            .status-success {
                background: #d4edda;
                color: #155724;
                padding: 15px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                gap: 10px;
                margin: 20px 0;
            }
            .button-group {
                display: flex;
                gap: 15px;
                justify-content: center;
                margin-top: 25px;
            }
            .btn {
                padding: 12px 30px;
                border-radius: 50px;
                text-decoration: none;
                font-weight: 600;
                transition: 0.3s;
            }
            .btn-primary {
                background: #FF8008;
                color: white;
            }
            .btn-secondary {
                background: #6c757d;
                color: white;
            }
            .btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }
            .footer {
                text-align: center;
                margin-top: 20px;
                color: white;
            }
            @media (max-width: 600px) {
                .info-grid {
                    grid-template-columns: 1fr;
                }
                .button-group {
                    flex-direction: column;
                }
            }
        </style> -->
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>🔧 BENGKEL MOTOR</h1>
                <p>Hasil Perhitungan Biaya Servis</p>
            </div>
            
            <div class="content">
                <!-- INFO PELANGGAN -->
                <div class="info-pelanggan">
                    <h3>📋 Data Pelanggan</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Nama Pelanggan</span>
                            <span class="info-value"><?= htmlspecialchars($nama) ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Plat Nomor</span>
                            <span class="info-value"><?= htmlspecialchars($plat_nomor) ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Jenis Motor</span>
                            <span class="info-value"><?= htmlspecialchars($jenis_motor) ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Jenis Servis</span>
                            <span class="info-value"><?= htmlspecialchars($jenis_servis) ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- TABEL PERHITUNGAN -->
                <h3 style="margin-bottom: 15px;">💰 Rincian Biaya</h3>
                <table class="table-perhitungan">
                    <tr>
                        <td>Biaya Jasa Servis (<?= htmlspecialchars($jenis_servis) ?>)</td>
                        <td>Rp <?= number_format($biaya_jasa, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Biaya Tambahan (Jenis Motor: <?= htmlspecialchars($jenis_motor) ?>)</td>
                        <td>Rp <?= number_format($biaya_tambahan_motor, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Subtotal (Jasa + Tambahan)</td>
                        <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>PPN 10%</td>
                        <td>Rp <?= number_format($ppn, 0, ',', '.') ?></td>
                    </tr>
                    <tr class="total-row">
                        <td>TOTAL BIAYA SERVIS</td>
                        <td>Rp <?= number_format($total_biaya, 0, ',', '.') ?></td>
                    </tr>
                </table>
                
                <!-- STATUS -->
                <div class="status-success">
                    <span style="font-size: 24px;">✅</span>
                    <div>
                        <strong>Perhitungan Berhasil!</strong><br>
                        Data telah disimpan dan siap untuk dicetak struk.
                    </div>
                </div>
                
                <!-- TOMBOL AKSI -->
                <div class="button-group">
                    <a href="form_input.php" class="btn btn-secondary">← Input Lagi</a>
                    <a href="hasil_struk.php" class="btn btn-primary">Lihat Struk →</a>
                </div>
            
            </div>
            
            <div class="footer">
                <p>Aplikasi Bengkel RBPL • Hitung Biaya Servis</p>
            </div>
        </div>
    </body>
    </html>
    <?php
    
} else {
    
    header("Location: form_input.php");
    exit;
}
?>
