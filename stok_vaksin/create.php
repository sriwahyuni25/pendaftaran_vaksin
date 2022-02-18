<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : 'auto';
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


<?=template_header('Create')?>

<div class="content update">
	<h2>Buat Stok Vaksin</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="jenis_vaksin">Jenis Vaksin</label>
        <input type="varchar" name="id" value="auto" id="id">
        <input type="varchar" name="jenis_vaksin" id="jenis_vaksin">
        <label for="tahap_vaksin">Tahap Vaksin</label>
        <label for="jumlah_tersedia">Jumlah Teredia</label>
        <input type="varchar" name="tahap_vaksin" id="tahap_vaksin">
        <input type="varchar" name="jumlah_tersedia" id="jumlah_tersedia">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>