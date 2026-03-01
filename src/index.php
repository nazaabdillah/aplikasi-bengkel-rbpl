<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel RBPL - Sistem Servis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Kustomisasi scrollbar biar estetik */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-200 min-h-screen flex flex-col items-center justify-center p-4 sm:p-8">

    <div class="w-full max-w-xl bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-white/50 ring-1 ring-slate-900/5 transition-all duration-300 hover:shadow-3xl">
        
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-indigo-700 p-8 text-center relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
            
            <div class="text-4xl mb-3 relative z-10 drop-shadow-md">🏍️</div>
            <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight relative z-10">Bengkel RBPL</h1>
            <p class="text-blue-100 mt-2 text-sm font-medium relative z-10 opacity-90">Sistem Pencatatan Servis Kebut Semalam</p>
        </div>

        <div class="p-6 sm:p-10">
            <?php 
            if (file_exists('form_input.php')) {
                include 'form_input.php'; 
            } else {
                // Skeleton Loader UX Dewa kalau file belum ada
                echo '
                <div class="text-center py-12">
                    <div class="animate-pulse flex flex-col items-center">
                        <div class="w-16 h-16 bg-slate-100 rounded-2xl mb-4"></div>
                        <div class="h-4 bg-slate-200 rounded-full w-3/4 mb-3"></div>
                        <div class="h-4 bg-slate-100 rounded-full w-1/2"></div>
                    </div>
                    <p class="text-slate-400 mt-6 text-sm font-medium">Menunggu sinkronisasi modul form...</p>
                </div>';
            }
            ?>
        </div>
    </div>

    <div class="mt-8 text-center text-slate-500 text-sm font-medium">
        <p>&copy; <?php echo date('Y'); ?> Tim Praktikum RBPL.</p>
        <p class="mt-1 text-xs opacity-75">Developed with ☕ & Native PHP</p>
    </div>

</body>
</html>