<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $m_noPol = $_POST['m_noPol'];

        $sql = "DELETE FROM motor WHERE m_noPol='$m_noPol'";

        if ($conn->query($sql) === TRUE) {
            echo header('Location: delete_motor.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    mysqli_close($conn);
}
?>
