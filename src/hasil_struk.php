<?php
session_start();

// Cek apakah ada data hitungan dari Yoga, kalau ngga ada lempar ke depan
if (!isset($_SESSION['data_servis'])) {
    header("Location: index.php");
    exit;
}

// Ambil data yang udah dibungkus Yoga
$data = $_SESSION['data_servis'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - Bengkel RBPL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-receipt { font-family: 'JetBrains Mono', monospace; }
        
        /* CSS Khusus pas nge-Print Biar Rapih & Hemat Tinta */
        @media print {
            @page { margin: 0; }
            body { background: white !important; -webkit-print-color-adjust: exact; }
            .no-print { display: none !important; }
            .print-shadow-none { box-shadow: none !important; }
            .print-m-0 { margin: 0 !important; padding: 10px !important; }
            .print-border-none { border: none !important; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-200 min-h-screen flex flex-col items-center justify-center p-4 sm:p-8">

    <div class="w-full max-w-md bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-white/50 ring-1 ring-slate-900/5 print-shadow-none print-border-none print-m-0">
        
        <div class="bg-gradient-to-r from-slate-800 to-slate-900 p-6 text-center relative overflow-hidden no-print">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-white opacity-5 rounded-full blur-2xl"></div>
            <h1 class="text-xl font-bold text-white tracking-tight relative z-10 flex justify-center items-center gap-2">
                <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                E-Receipt Nota
            </h1>
        </div>

        <div class="p-6 sm:p-8 bg-white print-m-0">
            <div class="font-receipt text-slate-800 text-sm">
                
                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold mb-1">BENGKEL RBPL</h2>
                    <p class="text-slate-500 text-xs">Sistem IPO Kebut Semalam</p>
                    <p class="text-slate-500 text-xs mt-1"><?php echo $data['tanggal']; ?></p>
                    <p class="text-slate-500 text-xs">No Nota: <?php echo $data['no_nota']; ?></p>
                </div>

                <div class="border-t-2 border-dashed border-slate-300 my-4"></div>

                <div class="space-y-1">
                    <div class="flex justify-between">
                        <span class="text-slate-500">Nama</span>
                        <span class="font-semibold"><?php echo htmlspecialchars($data['nama']); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">No. Polisi</span>
                        <span class="font-semibold uppercase"><?php echo htmlspecialchars($data['plat_nomor']); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">Motor</span>
                        <span class="font-semibold"><?php echo htmlspecialchars($data['jenis_motor']); ?></span>
                    </div>
                </div>

                <div class="border-t-2 border-dashed border-slate-300 my-4"></div>

                <div class="space-y-2 mb-4">
                    <div class="font-semibold mb-1">Rincian Layanan:</div>
                    <div class="flex justify-between">
                        <span>Jasa (<?php echo htmlspecialchars($data['jenis_servis']); ?>)</span>
                        <span><?php echo number_format($data['biaya_jasa'],0,',','.'); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Admin/Motor</span>
                        <span><?php echo number_format($data['biaya_tambahan_motor'],0,',','.'); ?></span>
                    </div>
                </div>

                <div class="border-t-2 border-dashed border-slate-300 my-4"></div>

                <div class="space-y-1">
                    <div class="flex justify-between text-slate-500">
                        <span>Subtotal</span>
                        <span><?php echo number_format($data['subtotal'],0,',','.'); ?></span>
                    </div>
                    <div class="flex justify-between text-slate-500">
                        <span>PPN (10%)</span>
                        <span><?php echo number_format($data['ppn'],0,',','.'); ?></span>
                    </div>
                    <div class="flex justify-between font-bold text-lg mt-2 pt-2">
                        <span>TOTAL BAYAR</span>
                        <span>Rp <?php echo number_format($data['total_biaya'],0,',','.'); ?></span>
                    </div>
                </div>

                <div class="border-t-2 border-dashed border-slate-300 my-4"></div>

                <div class="text-center mt-6">
                    <p class="font-bold">Terima Kasih 🙏</p>
                    <p class="text-xs text-slate-500 mt-1">Layanan Servis Bergaransi</p>
                </div>

            </div>
        </div>
        
        <div class="p-6 pt-0 no-print">
            <div class="flex gap-3 mt-2">
                <button onclick="window.location.href='index.php'" class="w-1/4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-3 px-4 rounded-xl transition-all duration-200 flex justify-center items-center outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </button>
                <button onclick="window.print()" class="w-3/4 bg-slate-800 hover:bg-slate-900 text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition-all duration-200 flex justify-center items-center gap-2 outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Cetak Struk
                </button>
            </div>
        </div>

    </div>

</body>
</html>