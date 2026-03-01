<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Pelanggan</title>
</head>
<body>
    <h1>Form Data Pelanggan</h1>

    <form action="proses_input.php" method="POST" id="formPelanggan">
        <label for="nama">Nama Pelanggan</label>
        <input type="text" id="nama" name="nama" placeholder="Contoh: Ujang Fredciken" required>

        <label for="plat_nomor">Plat Nomor</label>
        <input type="text" id="plat_nomor" name="plat_nomor" placeholder="Contoh: Z 1234 XYZ" required>

        <label for="jenis_motor">Jenis Motor</label>
                <select id="jenis_motor" name="jenis_motor" required>
                    <option value="">-- Pilih Jenis Motor --</option>
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
        
        <label for="jenis_servis">Jenis Servis</label>
                <select id="jenis_servis" name="jenis_servis" required>
                    <option value="">-- Pilih Jenis Servis --</option>
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

                <button type="submit">Simpan Data</button>
                <button type="reset">Reset Data</button>
    </form>
</body>
</html>