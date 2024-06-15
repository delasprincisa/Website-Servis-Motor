<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $c_id = $_POST['c_id'];

        $sql = "DELETE FROM customer WHERE c_id='$c_id'";

        if ($conn->query($sql) === TRUE) {
            header('Location: delete_customer.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    mysqli_close($conn);
}
?>
