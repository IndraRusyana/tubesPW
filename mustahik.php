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
      <p>Master Data / Kategori Mustahik</p>
    </div>
  </div>

  <div class="">
    <div class="col-10 shadow-sm p-3 mb-5 bg-white rounded mx-auto">
      <h3>Mustahik</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Jumlah Hak</th>
            <th scope="col" colspan="2" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (count($mustahik) == 0) { ?>
            <tr>
              <td>Tidak ada data...</td>
            </tr>
          <?php } ?>
          <?php $count = 1; ?>
          <?php foreach ($mustahik as $key) : ?>
            <tr>
              <th scope="row"><?= $count; ?></th>
              <td><?= $key['nama_kategori'] ?></td>
              <td><?= $key['jumlah_hak'] ?></td>
              <td><a class="btn btn-light" href="" data-toggle="modal" data-target="#editModal<?= $key['id_kategori'] ?>">Edit</a></td>
              <td><a class="btn btn-danger" href="" data-toggle="modal" data-target="#deleteModal<?= $key['id_kategori'] ?>">Hapus<i class="fa-solid fa-trash ml-2"></i></a></td>
            </tr>

            <?php $count++; ?>
          <?php endforeach; ?>

        </tbody>
      </table>

      <a class="btn btn-dark mt-2" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa-solid fa-plus mr-2"></i>Tambah</a>

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

  <!-- Modal notfication tambah -->
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" id="modal_body">
          <form action="" method="post">
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <input class="form-control" placeholder="Nama kategori" type="text" id="nama_kategori" name="nama_kategori" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <input class="form-control" placeholder="Jumlah hak" type="text" id="jumlah_hak" name="jumlah_hak" type="text" required>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-info" type="submit" name="addmustahik">Tambah Data</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal notification -->

  <?php foreach ($mustahik as $key) : ?>
    <!-- Modal notfication detail -->
    <div class="modal fade" id="detailModal<?= $key['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white" id="exampleModalLabel">Detail Mustahik</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="text-white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center" id="modal_body">

            <table class="table text-left">
              <tr>
                <td>Nama Kategori</td>
                <td>:</td>
                <td><?= $key['nama_kategori'] ?></td>
              </tr>
              <tr>
                <td>Jumlah Hak</td>
                <td>:</td>
                <td><?= $key['jumlah_hak'] ?></td>
              </tr>
            </table>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End modal notification -->
  <?php endforeach; ?>

  <?php foreach ($mustahik as $key) : ?>
    <!-- Modal notfication edit -->
    <div class="modal fade" id="editModal<?= $key['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white" id="exampleModalLabel">Edit Mustahik</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="text-white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center" id="modal_body">
            <form action="" method="post">
              <table class="table text-left">
                <input type="hidden" name="id_kategori" id="" value="<?= $key['id_kategori'] ?>">
                <tr>
                  <td>Nama Kategori</td>
                  <td>:</td>
                  <td><input type="text" name="nama_kategori" id="nama_kategori" value="<?= $key['nama_kategori'] ?>"></td>
                </tr>
                <tr>
                  <td>Jumlah Hak</td>
                  <td>:</td>
                  <td><input type="text" name="jumlah_hak" id="jumlah_hak" value="<?= $key['jumlah_hak'] ?>"></td>
                </tr>
              </table>
              <div class="modal-footer">
                <button class="btn btn-info" type="submit" name="editmustahik">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
    <!-- End modal notification -->
  <?php endforeach; ?>

  <?php foreach ($mustahik as $key) : ?>
    <!-- Modal notfication hapus -->
    <div class="modal fade" id="deleteModal<?= $key['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <i class="fas fa-bell mr-2 text-white"></i>
            <h5 class="modal-title text-white" id="exampleModalLabel">Notification</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="text-white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center" id="modal_body">Anda akan menghapus mustahik <?= $key['nama_kategori'] ?></div>
          <div class="modal-footer">
            <form action="" method="post">
              <input type="hidden" name="id_kategori" id="" value="<?= $key['id_kategori'] ?>">
              <button class="btn btn-danger" type="submit" name="deletemustahik">Konfirmasi</button>
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