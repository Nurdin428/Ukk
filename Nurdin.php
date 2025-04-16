<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Aplikasi Diskon</h3>
            </div>
            <div class="card-body">
                <form method="post" action="">  <!-- //jika tombol btn sudah di klik form ini berfungsi megirim data input dengan metode post -->
                    <div class="form-group">
                        <label for="harga">Harga Barang (Rp)</label>
                        <input type="text" name="harga" id="harga" class="form-input" required placeholder="Masukkan Harga"> <!--untuk kolom mengisi harga dan diskon -->
                    </div>
                    <div class="form-group">
                        <label for="diskon">Persentase Diskon (%)</label>
                        <input type="text" name="diskon" id="diskon" class="form-input" required placeholder="Masukkan Diskon">
                    </div>
                    <button type="submit" name="hitung" class="btn">Hitung Diskon</button>
                    
                </form>

                <?php
                if (isset($_POST['hitung'])) { // sebelum form methodd mengirim data if menditeksi button hitung apakah sudah ditekan atau belum jika sudah maka proses perhitungan akan di proses
                    $hargainput = $_POST['harga']; //jika sudai di mulai harga input mengambil data dari form input dan menyimpan data dari harga dan diskon
                    $diskoninput = $_POST['diskon'];

                    $hargainput = str_replace(['.',','],[ '',''],$hargainput); //jika pengguna mengiput dengan menguna koma maka str berguna mengganti titik mnjdi koma agar dapat menghitung segala angka
                    $diskoninput = str_replace(',', '.', $diskoninput);

                    $harga = floatval($hargainput); //ini berfungsi untuk memastikan hasil angka menjadi angka desimal
                    $diskon = floatval($diskoninput);

                    // lalu data yang di input akan di tes valid tidak nya 

                    echo '<div class="alert">';
                    if ($harga <= 0) {
                        echo "Harga harus lebih dari 0.";  // untuk mengetes validasi harga harus lebih dari nol
                    } elseif ($diskon < 0 || $diskon > 100) {
                        echo "Diskon harus antara 0 - 100%."; // untuk mengetes validasi diskon harus 0-100
                    } else {
                        $nilaiDiskon = $harga * ($diskon / 100); // jika data sudah valid rumus akan menghitung nya
                        $totalHarga = $harga - $nilaiDiskon;

                        echo "<strong>Harga barang:</strong> Rp " . number_format($harga, 2, ',', '.'); //ini berfungsi untuk menampilkan hasil akhir

                        echo "<br><strong>Harga diskon:</strong> Rp " . number_format($diskoninput, 0, ',', '.');

                        echo "<br><strong>Nilai Diskon:</strong> Rp " . number_format($nilaiDiskon, 2, ',', '.');

                        echo "<br><strong>Total Harga Setelah Diskon:</strong> Rp " . number_format($totalHarga, 2, ',', '.');
                    }
                    echo '</div>';
                }
                ?>
            </div>
            <div class="card-footer">
                <p>@ UKK RPL 2025 | Nurdin | XII PPLG</p>
            </div>
        </div>
    </div>
</body>

</html>