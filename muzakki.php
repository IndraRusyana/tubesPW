<?php
require_once 'PHP/App/init.php';
require_once 'PHP/Data.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>

  <div class="row">
    <div class="col-10 my-4 mx-auto">
      <p>Pengumpulan Zakat Fitrah / Data Muzakki</p>
    </div>
  </div>

  <div class="">
    <div class="col-10 shadow-sm p-3 mb-5 bg-white rounded mx-auto">
      <h3> Data Muzakki</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Muzakki</th>
            <th scope="col">Jumlah Tanggungan</th>
            <th scope="col">Keterangan</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (count($muzakki) == 0) { ?>
            <tr>
              <td>Tidak ada data...</td>
            </tr>
          <?php } ?>
          <?php $count = 1; ?>
          <?php foreach ($muzakki as $key) : ?>
            <tr>
              <th scope="row"><?= $count; ?></th>
              <td><?= $key['nama_kk'] ?></td>
              <td><?= $key['jumlah_anggota_kk'] ?></td>
              <td><?= $key['keterangan'] ?></td>
              <td class="text-center">
                  <!-- <a class="btn btn-info" href="" data-toggle="modal" data-target="#bayarModal<?= $key['id'] ?>">Bayar</a> -->
                  <a class="btn btn-info" href="bayar.php?id=<?=$key['id']?>">Bayar</a>
                  <a class="btn btn-danger" href="" data-toggle="modal" data-target="#deleteModal<?= $key['id'] ?>">Hapus<i class="fa-solid fa-trash ml-2"></i></a>
              </td>
            </tr>

            <?php $count++; ?>
          <?php endforeach; ?>

        </tbody>
      </table>

    </div>
  </div>

  <!-- Modal notfication logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <i class="fas fa-bell mr-2 text-white"></i>
          <h5 class="modal-title text-white" id="exampleModalLabel">Notification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" id="modal_body">Yakin ingin logout ?</div>
        <div class="modal-footer">
          <a type="submit" class="btn btn-danger" href="logout.php">Ya</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal notification -->

  <?php foreach ($muzakki as $key) : ?>
    <!-- Modal notfication tambah -->
    <!-- <div class="modal fade" id="bayarModal<?=$key['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white" id="exampleModalLabel">Pembayaran Zakat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="text-white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center" id="modal_body">
            <form action="" method="post">
              <input type="hidden" name="id" value="<?=$key['id']?>">
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <input class="form-control" value="<?= $key['NIK']?>" type="text" id="NIK" name="NIK" type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <input class="form-control" value="<?= $key['nama_kk']?>" type="text" id="nama_kk" name="nama_kk" type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <input class="form-control" value="<?= $key['jumlah_anggota_kk']?>" id="jumlah_angggota_kk" name="jumlah_angggota_kk" type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                  <select id="jeniszakat" name="jeniszakat" onChange="update()">
                    <option value="">Jenis Zakat</option>
                    <option value="beras">Beras</option>
                    <option value="uang">Uang</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <input class="form-control" placeholder="Jumlah Bayar Zakat (angka)" id="jumlah_bayar_zakat" name="jumlah_bayar_zakat" type="text" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <input class="form-control" placeholder="Total Beras" id="bayar_beras" name="bayar_beras" type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <input class="form-control" placeholder="Total Uang" id="bayar_uang" name="bayar_uang" type="text">
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-info" type="submit" name="bayarzakat">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> -->
    <!-- End modal notification -->
  <?php endforeach; ?>

  <?php foreach ($muzakki as $key) : ?>
    <!-- Modal notfication hapus -->
    <div class="modal fade" id="deleteModal<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <i class="fas fa-bell mr-2 text-white"></i>
            <h5 class="modal-title text-white" id="exampleModalLabel">Notification</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="text-white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center" id="modal_body">Anda akan menghapus muzakki <?= $key['nama_kk'] ?></div>
          <div class="modal-footer">
            <form action="" method="post">
              <input type="hidden" name="id" id="" value="<?= $key['id'] ?>">
              <button class="btn btn-danger" type="submit" name="deletemuzakki">Konfirmasi</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End modal notification -->
  <?php endforeach; ?>

  <!-- coming soon -->
  
    
  <!-- Core -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="bootstrap.bundle.min.js"></script>
</body>

</html>