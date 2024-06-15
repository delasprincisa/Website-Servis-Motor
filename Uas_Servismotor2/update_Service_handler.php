<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['s_id']) && isset($_POST['e_id']) && isset($_POST['m_noPol']) && isset($_POST['s_tgl']) && isset($_POST['s_layanan']) && isset($_POST['s_biaya'])) {
    $s_id = $_POST['s_id'];
        $e_id = $_POST['e_id'];
        $m_noPol = $_POST['m_noPol'];
        $s_tgl = $_POST['s_tgl'];
        $s_layanan = $_POST['s_layanan'];
        $s_biaya = $_POST['s_biaya'];

        $sql = "UPDATE dtlservice SET e_id='$e_id', m_noPol='$m_noPol', s_tgl='$s_tgl', s_layanan='$s_layanan', s_biaya='$s_biaya' WHERE s_id='$s_id'";

        if ($conn->query($sql) === TRUE) {
            header('Location: read.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


$conn->close();
?>
