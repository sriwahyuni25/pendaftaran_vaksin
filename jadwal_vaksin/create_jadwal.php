<?php
include 'functions_jadwal.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id_jadwal = isset($_POST['id_jadwal']) && !empty($_POST['id_jadwal']) && $_POST['id_jadwal'] != 'auto' ? $_POST['id_jadwal'] : 'auto';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO jadwal_vaksin VALUES (?, ?, ?, ?)');
    $stmt->execute([$id_jadwal, $id, $lokasi, $lokasi]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Buat Jadwal</h2>
    <form action="create_jadwal.php" method="post">
        <label for="id_jadwal">ID Jadwal</label>
        <label for="id">ID Vaksin</label>
        <input type="varchar" name="id_jadwal" value="auto" id="id_jadwal">
        <input type="varchar" name="id" id="id">
        <label for="tanggal">Tanggal</label>
        <label for="lokasi">Lokasi</label>
        <input type="varchar" name="tanggal" id="tanggal">
        <input type="varchar" name="lokasi" id="lokasi">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>