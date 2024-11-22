<?php
// Konfigurasi koneksi ke database
$host = "127.0.0.1";   // Ganti dengan host database Anda
$user = "root";        // Ganti dengan username MySQL Anda
$password = "root";        // Ganti dengan password MySQL Anda
$database = "doaseharihari";  // Ganti dengan nama database Anda
$port = "8889";


// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database, $port);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data doa
$sql = "SELECT judul, isi FROM doa";
$result = $conn->query($sql);

// Array untuk menampung data doa
$doa = array();

// Memasukkan data dari database ke dalam array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Menambahkan data ke dalam array $doa
        $doa[] = array(
            'judul' => $row['judul'],
            'isi' => $row['isi']
        );
    }
} else {
    echo "Tidak ada data doa.";
}

// Menutup koneksi
$conn->close();


?>
