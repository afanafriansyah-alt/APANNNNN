<?php
require_once 'Reservasi.php';

class KamarSuite extends Reservasi {
    // Properti tambahan spesifik anak
    private $minibar_premium;
    private $layanan_butler;

    public function __construct($id, $nama, $nomor, $durasi, $harga, $minibar, $butler) {
        parent::__construct($id, $nama, $nomor, $durasi, $harga);
        $this->minibar_premium = $minibar;
        $this->layanan_butler = $butler;
    }

    // Tahap 4: Metode Query Spesifik Kamar Suite
    public static function getDaftarSuite($db) {
        $query = "SELECT * FROM tabel_reservasi WHERE tipe_kamar = 'Suite'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tahap 5: Overriding hitungTotalTagihan()
    public function hitungTotalTagihan() {
        $biaya_dasar = $this->harga_per_malam_dasar * $this->durasi_menginap;
        return ($biaya_dasar * 1.10) + 500000; // Pajak 10% + Layanan Butler
    }

    // Tahap 5: Overriding getDeskripsiFasilitas()
    public function getDeskripsiFasilitas() {
        $minibar_status = $this->minibar_premium ? "Minibar Premium Terisi" : "Minibar Standar";
        $butler_status = $this->layanan_butler ? "Layanan Butler 24 Jam" : "Tanpa Butler";
        return $minibar_status . " & " . $butler_status;
    }
}
?>