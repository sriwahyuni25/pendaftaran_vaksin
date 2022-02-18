<?php
include 'functions_jadwal.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id_jadwal = isset($_POST['id_jadwal']) && !empty($_POST['id_jadwal']) && $_POST['id_jadwal'] != 'auto' ? $_POST['id_jadwal'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    //$Nomor = isset($_POST['Nomor']) ? $_POST['Nomor'] : '';
    //$Id = isset($_POST['Id']) ? $_POST['Id'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO jadwal_vaksin VALUES (?, ?, ?, ?)');
    $stmt->execute([$id_jadwal, $id, $tanggal, $lokasi]);
    // Output message
    $msg = 'Created Successfully!';
}
?>