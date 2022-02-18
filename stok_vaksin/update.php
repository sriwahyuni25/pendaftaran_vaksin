<?php
include 'functions.php';
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
        $stmt = $pdo->prepare('UPDATE stok_vaksin SET id = ?, jenis_vaksin = ?, tahap_vaksin = ?, jumlah_tersedia = ? WHERE id = ?');
        $stmt->execute([$id, $jenis_vaksin, $tahap_vaksin, $jumlah_tersedia, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM stok_vaksin WHERE id = ?');
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
	<h2>Update Stok Vaksin #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>"method="post">
        <label for="id">ID</label>
        <label for="jenis_vaksin">Jenis Vaksin</label>
        <input type="varchar" name="id" value="<?=$contact['id']?>" id="id">
        <input type="varchar" name="jenis_vaksin" value="<?=$contact['jenis_vaksin']?>" id="jenis_vaksin">
        <label for="tahap_vaksin">Tahap Vaksin</label>
        <label for="jumlah_tersedia">Jumlah Teredia</label>
        <input type="varchar" name="tahap_vaksin" value="<?=$contact['tahap_vaksin']?>" id="tahap_vaksin">
        <input type="varchar" name="jumlah_tersedia" value="<?=$contact['jumlah_tersedia']?>" id="jumlah_tersedia">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>