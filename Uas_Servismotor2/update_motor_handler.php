<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['m_noPol'])) {
    $m_noPol = $_POST['m_noPol'];
        $c_id = $_POST['c_id'];
        $m_brand = $_POST['m_brand'];
        $m_model = $_POST['m_model'];
        $m_thnBuat = $_POST['m_thnBuat'];

        $sql = "UPDATE motor SET c_id='$c_id', m_brand='$m_brand', m_model='$m_model', m_thnBuat='$m_thnBuat' WHERE m_noPol='$m_noPol'";

        if ($conn->query($sql) === TRUE) {
            header('Location: read.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
$conn->close();
?>
