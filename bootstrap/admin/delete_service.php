<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "DELETE FROM add_service WHERE id = $id";
    mysqli_query($conn, $query);

    header("Location: manage_services.php?msg=deleted");
    exit;
}
?>
