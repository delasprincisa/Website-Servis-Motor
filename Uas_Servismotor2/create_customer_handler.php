<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $c_id = $_POST['c_id'];
    $c_nama = $_POST['c_nama'];
    $c_alamat = $_POST['c_alamat'];
    $c_noTlp = $_POST['c_noTlp'];

$sql = "INSERT INTO customer (c_id, c_nama, c_alamat, c_noTlp) VALUES ('$c_id', '$c_nama', '$c_alamat', '$c_noTlp')";    
if ($conn->query($sql) === TRUE) {
        header('Location: create_customer.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
