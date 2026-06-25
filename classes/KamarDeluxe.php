<?php
require_once 'Reservasi.php';

class KamarDeluxe extends Reservasi {
    // Properti tambahan spesifik anak
    private $akses_gym;
    private $pilihan_pemandangan;

    public function __construct($id, $nama, $nomor, $durasi, $harga, $gym, $pemandangan) {
        parent::__construct($id, $nama, $nomor, $durasi, $harga);
        $this->akses_gym = $gym;
        $this->pilihan_pemandangan = $pemandangan;
    }

    // Tahap 4: Metode Query Spesifik Kamar Deluxe
    public static function getDaftarDeluxe($db) {
        $query = "SELECT * FROM tabel_reservasi WHERE tipe_kamar = 'Deluxe'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tahap 5: Overriding hitungTotalTagihan()
    public function hitungTotalTagihan() {
        $biaya_dasar = $this->harga_per_malam_dasar * $this->durasi_menginap;
        return $biaya_dasar + 150000; // Tambahan biaya fasilitas & gym
    }

    // Tahap 5: Overriding getDeskripsiFasilitas()
    public function getDeskripsiFasilitas() {
        $gym_status = $this->akses_gym ? "Akses Gym Gratis" : "Tanpa Akses Gym";
        return "Pemandangan: " . $this->pilihan_pemandangan . " | " . $gym_status;
    }
}
?>