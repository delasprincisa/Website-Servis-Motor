<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $e_id = $_POST['e_id'];

        $sql = "DELETE FROM employee WHERE e_id='$e_id'";

        if ($conn->query($sql) === TRUE) {
            echo header('Location: delete_employee.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    mysqli_close($conn);
}
?>

