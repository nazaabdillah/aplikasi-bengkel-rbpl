<div class="mb-6">
    <h2 class="text-xl font-bold text-slate-800">📋 Data Pelanggan</h2>
    <p class="text-sm text-slate-500 mt-1">Lengkapi form di bawah ini untuk menghitung biaya servis.</p>
</div>

<form action="proses_hitung.php" method="POST" id="formPelanggan" class="space-y-5">
    
    <div>
        <label for="nama" class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Pelanggan</label>
        <input type="text" id="nama" name="nama" placeholder="Contoh: Ujang Fredciken" required
               class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none shadow-sm text-slate-700 placeholder-slate-400">
    </div>

    <div>
        <label for="plat_nomor" class="block text-sm font-semibold text-slate-700 mb-1.5">Plat Nomor Kendaraan</label>
        <input type="text" id="plat_nomor" name="plat_nomor" placeholder="Contoh: Z 1234 XYZ" required
               class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none shadow-sm text-slate-700 placeholder-slate-400 uppercase">
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label for="jenis_motor" class="block text-sm font-semibold text-slate-700 mb-1.5">Jenis Motor</label>
            <div class="relative">
                <select id="jenis_motor" name="jenis_motor" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none shadow-sm text-slate-700 appearance-none cursor-pointer">
                    <option value="">-- Pilih Motor --</option>
                    <option value="Honda Beat">Honda Beat</option>
                    <option value="Honda Scoopy">Honda Scoopy</option>
                    <option value="Honda Vario">Honda Vario</option>
                    <option value="Honda PCX">Honda PCX</option>
                    <option value="Yamaha Mio">Yamaha Mio</option>
                    <option value="Yamaha Nmax">Yamaha Nmax</option>
                    <option value="Yamaha Aerox">Yamaha Aerox</option>
                    <option value="Yamaha Jupiter">Yamaha Jupiter</option>
                    <option value="Suzuki Nex">Suzuki Nex</option>
                    <option value="Suzuki Satria">Suzuki Satria</option>
                    <option value="Kawasaki Ninja">Kawasaki Ninja</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
            </div>
        </div>

        <div>
            <label for="jenis_servis" class="block text-sm font-semibold text-slate-700 mb-1.5">Jenis Servis</label>
            <div class="relative">
                <select id="jenis_servis" name="jenis_servis" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none shadow-sm text-slate-700 appearance-none cursor-pointer">
                    <option value="">-- Pilih Servis --</option>
                    <option value="Servis Ringan">Servis Ringan</option>
                    <option value="Servis Berkala">Servis Berkala</option>
                    <option value="Ganti Oli">Ganti Oli</option>
                    <option value="Tune Up">Tune Up</option>
                    <option value="Ganti Ban">Ganti Ban</option>
                    <option value="Perbaikan Mesin">Perbaikan Mesin</option>
                    <option value="Perbaikan Kelistrikan">Perbaikan Kelistrikan</option>
                    <option value="Perbaikan Rem">Perbaikan Rem</option>
                    <option value="Cuci Motor">Cuci Motor</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="flex gap-4 mt-8 pt-4 border-t border-slate-100">
        <button type="reset" class="w-1/3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-3.5 px-4 rounded-xl transition-all duration-200 focus:ring-2 focus:ring-slate-300 outline-none">
            Reset
        </button>
        <button type="submit" class="w-2/3 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 px-4 rounded-xl shadow-lg shadow-blue-600/30 transition-all duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 outline-none flex justify-center items-center gap-2">
            Hitung Biaya
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
        </button>
    </div>
</form>

<script>
    // Auto uppercase plat nomor
    document.getElementById('plat_nomor').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });

    // Validasi form sebelum submit
    document.getElementById('formPelanggan').addEventListener('submit', function(e) {
        const nama = document.getElementById('nama').value.trim();
        const plat = document.getElementById('plat_nomor').value.trim();
        
        if (nama === '' || plat === '') {
            e.preventDefault();
            alert('Mohon lengkapi semua field yang wajib diisi!');
            return false;
        }
    });
</script>