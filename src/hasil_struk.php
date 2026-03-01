<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$nama_pelanggan   = isset($_POST['nama_pelanggan']) ? $_POST['nama_pelanggan'] : '';
$no_kendaraan     = isset($_POST['no_kendaraan']) ? $_POST['no_kendaraan'] : '';
$jenis_kendaraan  = isset($_POST['jenis_kendaraan']) ? $_POST['jenis_kendaraan'] : '';

$nama_jasa        = isset($_POST['nama_jasa']) ? $_POST['nama_jasa'] : '';
$harga_jasa       = isset($_POST['harga_jasa']) ? (int)$_POST['harga_jasa'] : 0;

$nama_sparepart   = isset($_POST['nama_sparepart']) ? $_POST['nama_sparepart'] : '';
$harga_sparepart  = isset($_POST['harga_sparepart']) ? (int)$_POST['harga_sparepart'] : 0;
$jumlah_sparepart = isset($_POST['jumlah_sparepart']) ? (int)$_POST['jumlah_sparepart'] : 0;

$subtotal_sparepart = $harga_sparepart * $jumlah_sparepart;
$total_bayar = $harga_jasa + $subtotal_sparepart;

$tanggal = date("d-m-Y H:i:s");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembayaran - Bengkel RBPL</title>
    <style>
        body {
            font-family: monospace;
            background-color: #f4f4f4;
        }
        .struk {
            width: 380px;
            background: white;
            padding: 20px;
            margin: 30px auto;
            border: 1px solid #000;
        }
        h3 {
            text-align: center;
            margin-bottom: 5px;
        }
        hr {
            border: 1px dashed black;
        }
        .right {
            text-align: right;
        }
        .center {
            text-align: center;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 8px;
        }
    </style>
</head>
<body>

<div class="struk">
    <h3>BENGKEL RBPL</h3>
    <p class="center">Jl. Contoh Raya No. 123</p>
    <p class="center"><?php echo $tanggal; ?></p>

    <hr>

    <p>Nama Pelanggan : <?php echo htmlspecialchars($nama_pelanggan); ?></p>
    <p>No Kendaraan   : <?php echo htmlspecialchars($no_kendaraan); ?></p>
    <p>Jenis Kendaraan: <?php echo htmlspecialchars($jenis_kendaraan); ?></p>

    <hr>

    <strong>Jasa Servis</strong><br>
    <?php echo htmlspecialchars($nama_jasa); ?>
    <div class="right">Rp <?php echo number_format($harga_jasa,0,',','.'); ?></div>

    <br>

    <strong>Sparepart</strong><br>
    <?php echo htmlspecialchars($nama_sparepart); ?> (<?php echo $jumlah_sparepart; ?>)
    <div class="right">
        Rp <?php echo number_format($subtotal_sparepart,0,',','.'); ?>
    </div>

    <hr>

    <strong>Total Bayar</strong>
    <div class="right">
        <strong>Rp <?php echo number_format($total_bayar,0,',','.'); ?></strong>
    </div>

    <hr>

    <p class="center">Terima Kasih 🙏</p>

    <button onclick="window.print()">Cetak</button>
</div>

</body>
</html>