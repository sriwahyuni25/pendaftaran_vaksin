<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    //$Nomor = isset($_POST['Nomor']) ? $_POST['Nomor'] : '';
    //$Id = isset($_POST['Id']) ? $_POST['Id'] : '';
    $jenis_vaksin = isset($_POST['jenis_vaksin']) ? $_POST['jenis_vaksin'] : '';
    $tahap_vaksin = isset($_POST['tahap_vaksin']) ? $_POST['tahap_vaksin'] : '';
    $jumlah_tersedia = isset($_POST['jumlah_tersedia']) ? $_POST['jumlah_tersedia'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO stok_vaksin VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $jenis_vaksin, $tahap_vaksin, $jumlah_tersedia]);
    // Output message
    $msg = 'Created Successfully!';
}
?>