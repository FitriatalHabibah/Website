<?php

namespace app\Models;

include 'app/Config/DatabaseConfig.php';

use app\Config\DatabaseConfig;
use mysqli;

class Doa extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {
        // Membuat koneksi ke database
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, 8889);
        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);
        }
    }

    // Menampilkan semua data doa
    public function findAll()
    {
        $sql = "SELECT * FROM doa";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    // Menampilkan data doa berdasarkan ID
    public function findById($id)
    {
        $sql = "SELECT * FROM doa WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id); // Menyambungkan ID dengan query
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc(); // Mengambil satu baris data
        $stmt->close();
        return $data; // Mengembalikan data doa berdasarkan ID
    }

    // Menambahkan doa baru
    public function create($data)
    {
        $judul = $data['judul'];
        $isi = $data['isi'];
        $query = "INSERT INTO doa (judul, isi) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $judul, $isi);
        $stmt->execute();
        $stmt->close();
    }

    // Memperbarui doa yang ada
    public function update($data, $id)
    {
        $judul = $data['judul'];
        $isi = $data['isi'];
        $query = "UPDATE doa SET judul = ?, isi = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $judul, $isi, $id);
        $stmt->execute();
        $stmt->close();
    }

    // Menghapus doa berdasarkan ID
    public function delete($id)
    {
        $query = "DELETE FROM doa WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    // Menutup koneksi database (Optional: Anda bisa memindahkannya ke destructor untuk penutupan otomatis)
    public function closeConnection()
    {
        $this->conn->close();
    }

    // Destructor untuk menutup koneksi setelah objek dihancurkan
    public function __destruct()
    {
        $this->closeConnection();
    }
}
