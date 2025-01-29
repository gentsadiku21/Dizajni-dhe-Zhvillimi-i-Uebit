
<?php 
include "connection.php";


if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Query per delete
    $sql = "DELETE FROM `kerkuesit` WHERE `user_id`='$user_id'";

    // egzekutimi i queryt
    $result = $con->query($sql);

    if ($result === TRUE) {
        header("Location: Dashboard-Kerkuesit.php");
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
?>
