<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $m_noPol = $_POST['m_noPol'];
        $c_id = $_POST['c_id'];
        $m_brand = $_POST['m_brand'];
        $m_model = $_POST['m_model'];
        $m_thnBuat = $_POST['m_thnBuat'];

        $sql = "INSERT INTO motor (m_noPol, c_id, m_brand, m_model, m_thnBuat) VALUES ('$m_noPol', '$c_id', '$m_brand', '$m_model', '$m_thnBuat')";

        if ($conn->query($sql) === TRUE) {
            header('Location: create_motor.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    mysqli_close($conn);
}
?>
