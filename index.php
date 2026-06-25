<?php
// Memanggil koneksi dan semua class
require_once 'config/database.php';
require_once 'classes/KamarStandar.php';
require_once 'classes/KamarDeluxe.php';
require_once 'classes/KamarSuite.php';

// Inisiasi database
$database = new Database();
$db = $database->getConnection();

// Mengambil data dari database menggunakan metode statis
$dataStandar = KamarStandar::getDaftarStandar($db);
$dataDeluxe  = KamarDeluxe::getDaftarDeluxe($db);
$dataSuite   = KamarSuite::getDaftarSuite($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Reservasi StayEase</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 20px; background-color: #f4f7f6; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        h3 { color: #0056b3; border-bottom: 2px solid #0056b3; padding-bottom: 5px; margin-top: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #0056b3; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Reservasi Penginapan StayEase</h2>

        <h3>Tipe Kamar: Standar</h3>
        <table>
            <tr><th>Nama Tamu</th><th>No Kamar</th><th>Durasi</th><th>Detail Fasilitas</th><th>Total Tagihan Akhir</th></tr>
            <?php foreach($dataStandar as $row): 
                // Membuat objek KamarStandar dari data array database
                $kamar = new KamarStandar($row['id_reservasi'], $row['nama_tamu'], $row['nomor_kamar'], $row['durasi_menginap'], $row['harga_per_malam_dasar'], $row['fasilitas_sarapan']);
            ?>
            <tr>
                <td><?= htmlspecialchars($kamar->getNamaTamu()) ?></td>
                <td><?= htmlspecialchars($kamar->getNomorKamar()) ?></td>
                <td><?= htmlspecialchars($kamar->getDurasiMenginap()) ?> hari</td>
                <td><?= htmlspecialchars($kamar->getDeskripsiFasilitas()) ?></td>
                <td><strong>Rp <?= number_format($kamar->hitungTotalTagihan(), 0, ',', '.') ?></strong></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h3>Tipe Kamar: Deluxe</h3>
        <table>
            <tr><th>Nama Tamu</th><th>No Kamar</th><th>Durasi</th><th>Detail Fasilitas</th><th>Total Tagihan Akhir</th></tr>
            <?php foreach($dataDeluxe as $row): 
                // Membuat objek KamarDeluxe
                $kamar = new KamarDeluxe($row['id_reservasi'], $row['nama_tamu'], $row['nomor_kamar'], $row['durasi_menginap'], $row['harga_per_malam_dasar'], $row['akses_gym'], $row['pilihan_pemandangan']);
            ?>
            <tr>
                <td><?= htmlspecialchars($kamar->getNamaTamu()) ?></td>
                <td><?= htmlspecialchars($kamar->getNomorKamar()) ?></td>
                <td><?= htmlspecialchars($kamar->getDurasiMenginap()) ?> hari</td>
                <td><?= htmlspecialchars($kamar->getDeskripsiFasilitas()) ?></td>
                <td><strong>Rp <?= number_format($kamar->hitungTotalTagihan(), 0, ',', '.') ?></strong></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h3>Tipe Kamar: Suite</h3>
        <table>
            <tr><th>Nama Tamu</th><th>No Kamar</th><th>Durasi</th><th>Detail Fasilitas</th><th>Total Tagihan Akhir</th></tr>
            <?php foreach($dataSuite as $row): 
                // Membuat objek KamarSuite
                $kamar = new KamarSuite($row['id_reservasi'], $row['nama_tamu'], $row['nomor_kamar'], $row['durasi_menginap'], $row['harga_per_malam_dasar'], $row['minibar_premium'], $row['layanan_butler']);
            ?>
            <tr>
                <td><?= htmlspecialchars($kamar->getNamaTamu()) ?></td>
                <td><?= htmlspecialchars($kamar->getNomorKamar()) ?></td>
                <td><?= htmlspecialchars($kamar->getDurasiMenginap()) ?> hari</td>
                <td><?= htmlspecialchars($kamar->getDeskripsiFasilitas()) ?></td>
                <td><strong>Rp <?= number_format($kamar->hitungTotalTagihan(), 0, ',', '.') ?></strong></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>