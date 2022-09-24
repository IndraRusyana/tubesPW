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
      <p>Pengumpulan Zakat Fitrah / Data Pengumpulan Zakat</p>
    </div>
  </div>
  <div class="">
    <div class="col-10 shadow-sm p-3 mb-5 bg-white rounded mx-auto">
      <h3>Data Pengumpulan Zakat</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Jumlah Anggota Muzakki</th>
            <th scope="col">Jenis Fitrah</th>
            <th scope="col">Jumlah Fitrah</th>
            <th scope="col">Beras</th>
            <th scope="col">Uang</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (count($bayarzakat) == 0) { ?>
            <tr>
              <td>Tidak ada data...</td>
            </tr>
          <?php } ?>
          <?php $count = 1; ?>
          <?php foreach ($bayarzakat as $key) : ?>
            <tr>
              <th scope="row"><?= $count; ?></th>
              <td><?= $key['nama_kk'] ?></td>
              <td><?= $key['jumlah_tanggungan'] ?></td>
              <td><?= $key['jenis_bayar'] ?></td>
              <td><?= $key['jumlah_tanggunganyangdibayar'] ?></td>
              <td><?= $key['bayar_beras'] ?></td>
              <td><?= $key['bayar_uang'] ?></td>
              <td class="text-center">
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

  <?php foreach ($bayarzakat as $key) : ?>
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
          <div class="modal-body text-center" id="modal_body">Anda akan menghapus data <?= $key['nama_kk'] ?></div>
          <div class="modal-footer">
            <form action="" method="post">
              <input type="hidden" name="id" id="" value="<?= $key['id'] ?>">
              <button class="btn btn-danger" type="submit" name="deletebayarzakat">Konfirmasi</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End modal notification -->
  <?php endforeach; ?>

  <!-- Core -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="bootstrap.bundle.min.js"></script>
</body>

</html>