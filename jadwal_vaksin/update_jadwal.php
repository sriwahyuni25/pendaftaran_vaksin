<?php
include 'functions_jadwal.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $jenis_vaksin = isset($_POST['jenis_vaksin']) ? $_POST['jenis_vaksin'] : '';
        $tahap_vaksin = isset($_POST['tahap_vaksin']) ? $_POST['tahap_vaksin'] : '';
        $jumlah_tersedia = isset($_POST['jumlah_tersedia']) ? $_POST['jumlah_tersedia'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE jadwal_vaksin SET id = ?, jenis_vaksin = ?, tahap_vaksin = ?, jumlah_tersedia = ? WHERE id = ?');
        $stmt->execute([$id, $jenis_vaksin, $tahap_vaksin, $jumlah_tersedia, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM jadwal_vaksin WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update Jadwal Vaksin #<?=$contact['id']?></h2>
    <form action="update_jadwal.php?id=<?=$contact['id_jadwal']?>"method="post">
        <label for="id_jadwal">ID Jadwal</label>
        <label for="id">ID Vaksin</label>
        <input type="varchar" name="id_jadwal" value="<?=$contact['id_jadwal']?>" id="id_jadwal">
        <input type="varchar" name="id" value="<?=$contact['id']?>" id="id">
        <label for="tanggal">Tanggal</label>
        <label for="lokasi">Lokasi</label>
        <input type="varchar" name="tanggal" value="<?=$contact['tanggal']?>" id="tanggal">
        <input type="varchar" name="lokasi" value="<?=$contact['lokasi']?>" id="lokasi">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>