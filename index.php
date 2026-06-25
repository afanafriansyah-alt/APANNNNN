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
    <title>Data Reservasi OYO</title>
    <style>
        :root {
            --oyo-red: #EE2A24;
            --oyo-light: #fdf2f2;
            --text-dark: #2d3436;
            --bg-body: #f4f6f9;
        }
        
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            background-color: var(--bg-body); 
            color: var(--text-dark);
        }
        
        .container { 
            max-width: 1100px; 
            margin: 40px auto; 
            background: white; 
            border-radius: 12px; 
            box-shadow: 0 8px 20px rgba(0,0,0,0.08); 
            overflow: hidden;
        }

        .header {
            background-color: var(--oyo-red);
            color: white;
            padding: 25px 20px;
            text-align: center;
        }

        .header h2 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .content {
            padding: 20px 40px 40px 40px;
        }

        h3 { 
            color: var(--oyo-red); 
            border-bottom: 2px solid var(--oyo-light); 
            padding-bottom: 10px; 
            margin-top: 35px; 
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-wrapper {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 0 1px #e1e5ee;
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            background-color: white;
        }

        th, td { 
            padding: 14px 18px; 
            text-align: left; 
            border-bottom: 1px solid #edf2f7; 
        }

        th { 
            background-color: var(--oyo-light); 
            color: var(--oyo-red); 
            font-weight: 600; 
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover { background-color: #f8fafc; }

        .fasilitas-badge {
            background-color: #e2e8f0;
            color: #4a5568;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 13px;
            display: inline-block;
        }

        .price-tag {
            color: #16a085;
            font-weight: 700;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Data Reservasi OYO</h2>
            <p>Sistem Manajemen Penginapan Terpadu</p>
        </div>

        <div class="content">
            <h3>🛏️ Tipe Kamar: Standar</h3>
            <div class="table-wrapper">
                <table>
                    <tr><th>Nama Tamu</th><th>No Kamar</th><th>Durasi</th><th>Detail Fasilitas</th><th>Total Tagihan Akhir</th></tr>
                    <?php foreach($dataStandar as $row): 
                        $kamar = new KamarStandar($row['id_reservasi'], $row['nama_tamu'], $row['nomor_kamar'], $row['durasi_menginap'], $row['harga_per_malam_dasar'], $row['fasilitas_sarapan']);
                    ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($kamar->getNamaTamu()) ?></strong></td>
                        <td><?= htmlspecialchars($kamar->getNomorKamar()) ?></td>
                        <td><?= htmlspecialchars($kamar->getDurasiMenginap()) ?> Hari</td>
                        <td><span class="fasilitas-badge"><?= htmlspecialchars($kamar->getDeskripsiFasilitas()) ?></span></td>
                        <td class="price-tag">Rp <?= number_format($kamar->hitungTotalTagihan(), 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <h3>✨ Tipe Kamar: Deluxe</h3>
            <div class="table-wrapper">
                <table>
                    <tr><th>Nama Tamu</th><th>No Kamar</th><th>Durasi</th><th>Detail Fasilitas</th><th>Total Tagihan Akhir</th></tr>
                    <?php foreach($dataDeluxe as $row): 
                        $kamar = new KamarDeluxe($row['id_reservasi'], $row['nama_tamu'], $row['nomor_kamar'], $row['durasi_menginap'], $row['harga_per_malam_dasar'], $row['akses_gym'], $row['pilihan_pemandangan']);
                    ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($kamar->getNamaTamu()) ?></strong></td>
                        <td><?= htmlspecialchars($kamar->getNomorKamar()) ?></td>
                        <td><?= htmlspecialchars($kamar->getDurasiMenginap()) ?> Hari</td>
                        <td><span class="fasilitas-badge"><?= htmlspecialchars($kamar->getDeskripsiFasilitas()) ?></span></td>
                        <td class="price-tag">Rp <?= number_format($kamar->hitungTotalTagihan(), 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <h3>👑 Tipe Kamar: Suite</h3>
            <div class="table-wrapper">
                <table>
                    <tr><th>Nama Tamu</th><th>No Kamar</th><th>Durasi</th><th>Detail Fasilitas</th><th>Total Tagihan Akhir</th></tr>
                    <?php foreach($dataSuite as $row): 
                        $kamar = new KamarSuite($row['id_reservasi'], $row['nama_tamu'], $row['nomor_kamar'], $row['durasi_menginap'], $row['harga_per_malam_dasar'], $row['minibar_premium'], $row['layanan_butler']);
                    ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($kamar->getNamaTamu()) ?></strong></td>
                        <td><?= htmlspecialchars($kamar->getNomorKamar()) ?></td>
                        <td><?= htmlspecialchars($kamar->getDurasiMenginap()) ?> Hari</td>
                        <td><span class="fasilitas-badge"><?= htmlspecialchars($kamar->getDeskripsiFasilitas()) ?></span></td>
                        <td class="price-tag">Rp <?= number_format($kamar->hitungTotalTagihan(), 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>