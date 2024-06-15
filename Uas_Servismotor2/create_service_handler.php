<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $s_id = $_POST['s_id'];
        $e_id = $_POST['e_id'];
        $m_noPol = $_POST['m_noPol'];
        $s_tgl = $_POST['s_tgl'];
        $s_layanan = $_POST['s_layanan'];
        $s_biaya = $_POST['s_biaya'];

        $sql = "INSERT INTO dtlservice (s_id, e_id, m_noPol, s_tgl, s_layanan, s_biaya) VALUES ('$s_id', '$e_id', '$m_noPol', '$s_tgl', '$s_layanan', '$s_biaya')";

        if ($conn->query($sql) === TRUE) {
        echo header('Location: create_service.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
