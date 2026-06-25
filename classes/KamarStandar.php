<?php
require_once 'Reservasi.php';

class KamarStandar extends Reservasi {
    // Properti tambahan spesifik anak
    private $fasilitas_sarapan;

    public function __construct($id, $nama, $nomor, $durasi, $harga, $sarapan) {
        // Memanggil constructor dari abstract class induk (Reservasi)
        parent::__construct($id, $nama, $nomor, $durasi, $harga);
        $this->fasilitas_sarapan = $sarapan;
    }

    // Tahap 4: Metode Query Spesifik Kamar Standar
    public static function getDaftarStandar($db) {
        $query = "SELECT * FROM tabel_reservasi WHERE tipe_kamar = 'Standar'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tahap 5: Overriding hitungTotalTagihan()
    public function hitungTotalTagihan() {
        return $this->harga_per_malam_dasar * $this->durasi_menginap;
    }

    // Tahap 5: Overriding getDeskripsiFasilitas()
    public function getDeskripsiFasilitas() {
        return $this->fasilitas_sarapan ? "Termasuk Sarapan Pagi" : "Tanpa Sarapan Pagi";
    }
}
?>