<?php
require_once 'PHP/App/init.php';
require_once 'PHP/Data.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}


$id = $_GET['id'];
$pembayaranzakat = $mysqli->read("SELECT * FROM kepala_keluarga WHERE id = $id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Zakat</title>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
    <script src="https://kit.fontawesome.com/71cd5983fb.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
    <div class="col-lg-6 mx-auto py-5">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 class="" id="exampleModalLabel">Pembayaran Zakat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                foreach ($pembayaranzakat as $key) : ?>
                    <div class="modal-body" id="modal_body">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?=$key['id']?>">
                            <div class="form-group">
                                <label for="NIK">NIK</label>
                                <input class="form-control" value="<?= $key['NIK']?>" type="text" id="NIK" name="NIK" type="text">
                            </div>
                            <div class="form-group">
                                <label for="nama_kk">Nama KK</label>
                                    <input class="form-control" value="<?= $key['nama_kk']?>" type="text" id="nama_kk" name="nama_kk" type="text">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_anggota_kk">Jumlah Anggota</label>
                                <input class="form-control" value="<?= $key['jumlah_anggota_kk']?>" id="jumlah_angggota_kk" name="jumlah_angggota_kk" type="text">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_bayar_zakat">Jumlah Bayar Zakat</label>
                                <input class="form-control" placeholder="Jumlah Bayar Zakat (angka)" id="jumlah_bayar_zakat" name="jumlah_bayar_zakat" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="jeniszakat">Jenis Zakat</label>
                                <select id="jeniszakat" name="jeniszakat" onChange="update()">
                                    <option value="">- pilih -</option>
                                    <option value="beras">Beras</option>
                                    <option value="uang">Uang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bayar_beras">Bayar Beras</label>
                                <input class="form-control" placeholder="Total Beras" id="bayar_beras" name="bayar_beras" type="text">
                            </div>
                            <div class="form-group">
                                <label for="bayar_uang">Bayar Uang</label>
                                <input class="form-control" placeholder="Total Uang" id="bayar_uang" name="bayar_uang" type="text">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="submit" name="bayarzakat">Simpan</button>
                                <a class="btn btn-secondary" href="muzakki.php">Kembali</a>
                            </div>
                        </form>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function update() {
    var jeniszakat = document.getElementById('jeniszakat').value;
    var jumlah_bayar_zakat = document.getElementById('jumlah_bayar_zakat').value;

    if (jeniszakat == "beras") {
        result = 2.5 * jumlah_bayar_zakat;
        document.getElementById('bayar_beras').value = result+" Kg";
        document.getElementById('bayar_uang').value = 0;
    } else if (jeniszakat == "uang") {
        result = 30000 * jumlah_bayar_zakat;
        document.getElementById('bayar_uang').value = "Rp. "+result;
        document.getElementById('bayar_beras').value = 0;
    } else {
        document.getElementById('bayar_uang').value = 0;
        document.getElementById('bayar_beras').value = 0;
    }
}

update();
</script>
<script src="bootstrap.bundle.min.js"></script>
</body>
</html>

