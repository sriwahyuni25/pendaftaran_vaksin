<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Pendaftaran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container p-3 my-3 border">
    <h1 class="text-center">Form Pendaftaran Vaksin</h1>
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "../koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["Submit"])){
        if(!empty($_POST)) {

            $tanggal_vaksin=input($_POST["tanggal_vaksin"]);
            $jenis_vaksin=input($_POST["jenis_vaksin"]);
            $dosis=input($_POST["dosis"]);
            $nik=input($_POST["nik"]);
            $nama=input($_POST["nama"]);
            $tempat_lahir=input($_POST["tempat_lahir"]);
            $tanggal_lahir=input($_POST["tanggal_lahir"]);
            $jk=input($_POST["jk"]);
            $no_telp=input($_POST["no_telp"]);
            $alamat=input($_POST["alamat"]);

            //Query input menginput data kedalam tabel pendaftaraan
            $sql="insert into pendaftar_vaksin (id_pendaftaran,tanggal_vaksin, jenis_vaksin, dosis, nik, nama, tempat_lahir, tanggal_lahir, jk, no_telp, alamat) values
            (null,'$tanggal_vaksin','$jenis_vaksin', '$dosis', '$nik','$nama','$tempat_lahir','$tanggal_lahir','$jk','$no_telp','$alamat')";

            //Mengeksekusi/menjalankan query diatas
            $hasil=mysqli_query($koneksi,$sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) { 
                echo "<div class='alert alert-success'> Selamat $nama anda telah berhasil mendaftar.</div>"; 
            } else {
                echo "<div class='alert alert-danger'> Pendaftaraan Gagal.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'> Pendaftaraan Gagal.</div>";
        }
    }
    
    ?>
        <form id="form" method="post">
        <div class="alert alert-primary">
                <strong>Informasi Vaksin</strong>
            </div>
            <div class="row">
		<div class="form-group col-md-3">
			<label for="tanggal_vaksin">Tanggal Vaksin</label>
			<input type="date" class="form-control" name="tanggal_vaksin" placeholder="Tanggal Vaksin" required>
		</div>
		<div class="form-group col-md-2">
			<label for="jenis_vaksin">Jenis Vaksin</label>
			<select class="form-control" name="jenis_vaksin" required>
                <option>Pilih</option>
                <option value="1">Astrazeneca</option>
                <option value="2">Sinovac</option>
            </select>
		</div>
		<div class="form-group col-md-2">
			<label for="dosis">Dosis</label>
			<select class="form-control" name="dosis" required>
                <option>Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
		</div>
	</div>
                <div class="alert alert-primary">
                <strong>Data Diri</strong>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" placeholder="Masukan Nomor NIK" required>
                    </div>
                </div>
                    <div class="form-group col-md-6">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" name="nama" placeholder="Nama" required>
		</div>
		<div class="form-group col-md-2">
        <label>Jenis Kelamin:</label>
                                <select class="form-control" name="jk" required>
                                 <option>Pilih</option>
                                 <option value="1">Laki-laki</option>
                                 <option value="2">Perempuan</option>
                                </select>
		</div>
	</div>
                <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tempat Lahir:</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Tanggal Lahir:</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
			<label for="alamat">Alamat</label>
			<textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
		</div>

        <div class="form-row">
		<div class="form-group col-md-6">
			<label for="no_telp">No Telp</label>
			<input type="text" class="form-control" name="no_telp" placeholder="No Telp" required>
		</div>
	</div>
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Daftar</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='../home.html'">Back</button>
                    <!-- <a href="../home.html" class="action-btn">Back to home</a> -->
                </div>

            </div>
        </form>
    </div>
</body>
</html>