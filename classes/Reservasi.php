<?php
abstract class Reservasi {
    // Properti Terenkapsulasi (protected)
    protected $id_reservasi;
    protected $nama_tamu;
    protected $nomor_kamar;
    protected $durasi_menginap;
    protected $harga_per_malam_dasar;

    public function __construct($id, $nama, $nomor, $durasi, $harga_dasar) {
        $this->id_reservasi = $id;
        $this->nama_tamu = $nama;
        $this->nomor_kamar = $nomor;
        $this->durasi_menginap = $durasi;
        $this->harga_per_malam_dasar = $harga_dasar;
    }

    // Metode Abstrak wajib (akan di-override di kelas anak)
    abstract public function hitungTotalTagihan();
    abstract public function getDeskripsiFasilitas();

    // Getter untuk dipanggil di antarmuka View nanti
    public function getNamaTamu() { return $this->nama_tamu; }
    public function getNomorKamar() { return $this->nomor_kamar; }
    public function getDurasiMenginap() { return $this->durasi_menginap; }
}
?>