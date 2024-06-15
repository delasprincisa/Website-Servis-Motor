<?php
// Pastikan metode HTTP adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sesuaikan dengan konfigurasi koneksi ke database Anda
    include 'db_connection.php';

    // Ambil data dari form
    $e_id = $_POST['e_id'];
    $e_nama = $_POST['e_nama'];
    $e_alamat = $_POST['e_alamat'];
    $e_noTlp = $_POST['e_noTlp'];

    // Proses upload gambar jika ada
    if (isset($_FILES['e_gambar']) && $_FILES['e_gambar']['size'] > 0) {
        $e_gambar = 'e_gambar/' . basename($_FILES['e_gambar']['name']);
        move_uploaded_file($_FILES['e_gambar']['tmp_name'], $e_gambar);
        $sql = "UPDATE employee SET e_nama='$e_nama', e_alamat='$e_alamat', e_noTlp='$e_noTlp', e_gambar='$e_gambar' WHERE e_id='$e_id'";
    } else {
        $sql = "UPDATE employee SET e_nama='$e_nama', e_alamat='$e_alamat', e_noTlp='$e_noTlp' WHERE e_id='$e_id'";
    }

    // Eksekusi query update
    if ($conn->query($sql) === TRUE) {
        header('Location: read.php');
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
} else {
    echo "Metode HTTP bukan POST, akses tidak diizinkan.";
}
?>
