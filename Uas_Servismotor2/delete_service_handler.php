<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $s_id = $_POST['s_id'];

        $sql = "DELETE FROM dtlservice WHERE s_id='$s_id'";

        if ($conn->query($sql) === TRUE) {
            echo header('Location: delete_service.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    mysqli_close($conn);
}
?>
