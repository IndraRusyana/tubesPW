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
      <p>Master Data / Data Kepala Keluarga</p>
    </div>
  </div>

  <div class="">
    <div class="col-10 shadow-sm p-3 mb-5 bg-white rounded mx-auto">
      <h3> Data Kepala Keluarga</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Jumlah Anggota Keluarga</th>
            <th scope="col">Keterangan</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (count($kepala_keluarga) == 0) { ?>
            <tr>
              <td>Tidak ada data...</td>
            </tr>
          <?php } ?>
          <?php $count = 1; ?>
          <?php foreach ($kepala_keluarga as $key) : ?>
            <tr>
              <th scope="row"><?= $count; ?></th>
              <td><?= $key['NIK'] ?></td>
              <td><?= $key['nama_kk'] ?></td>
              <td><?= $key['jumlah_anggota_kk'] ?></td>
              <td><?= $key['keterangan'] ?></td>
              <td class="text-center">
                <?php if ($key['muzakki'] == true) : ?>
                  <button class="btn btn-info text-white mx-2" href="kepalakeluarga.php?id_kk=<?=$key['id']?>" disabled="disabled">Muzakki</button>
                <?php else : ?>
                  <a class="btn btn-info text-white mx-2" href="kepalakeluarga.php?id_kk=<?=$key['id']?>">Muzakki</a>
                <?php endif; ?>
                
                
                <a class="btn btn-light mx-2" href="" data-toggle="modal" data-target="#editModal<?= $key['id'] ?>">Edit</a>
                <a class="btn btn-danger mx-2" href="" data-toggle="modal" data-target="#deleteModal<?= $key['id'] ?>">Hapus<i class="fa-solid fa-trash ml-2"></i></a>
              </td>
            </tr>

            <?php $count++; ?>
          <?php endforeach; ?>

        </tbody>
      </table>

      <a class="btn btn-dark mt-2" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa-solid fa-plus mr-2"></i> Tambah</a>

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
          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data KK</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" id="modal_body">
          <form action="" method="post">
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <input class="form-control" placeholder="NIK" type="text" id="NIK" name="NIK" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <input class="form-control" placeholder="Nama KK" type="text" id="nama_kk" name="nama_kk" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <input class="form-control" placeholder="Jumlah Anggota" type="text" id="jumlah_anggota_kk" name="jumlah_anggota_kk" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative">
                <input class="form-control" placeholder="Keterangan" type="text" id="keterangan" name="keterangan" type="text" required>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-info text-white" type="submit" name="addkk">Tambah Data</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal notification -->

  <?php foreach ($kepala_keluarga as $key) : ?>
    <!-- Modal notfication edit -->
    <div class="modal fade" id="editModal<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white" id="exampleModalLabel">Edit Data KK</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="text-white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center" id="modal_body">
            <form action="" method="post">
              <table class="table text-left">
                <input type="hidden" name="id" id="" value="<?= $key['id'] ?>">
                <tr>
                  <td>Nama Muzakki</td>
                  <td>:</td>
                  <td><input type="text" name="nama_kk" id="nama_kk" value="<?= $key['nama_kk'] ?>"></td>
                </tr>
                <tr>
                  <td>Jumlah Tanggungan</td>
                  <td>:</td>
                  <td><input type="text" name="jumlah_anggota_kk" id="jumlah_anggota_kk" value="<?= $key['jumlah_anggota_kk'] ?>"></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>:</td>
                  <td><input type="text" name="keterangan" id="keterangan" value="<?= $key['keterangan'] ?>"></td>
                </tr>
              </table>
              <div class="modal-footer">
                <button class="btn btn-info" type="submit" name="editkk">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
    <!-- End modal notification -->
  <?php endforeach; ?>

  <?php foreach ($kepala_keluarga as $key) : ?>
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
          <div class="modal-body text-center" id="modal_body">Anda akan menghapus data kk <?= $key['nama_kk'] ?></div>
          <div class="modal-footer">
            <form action="" method="post">
              <input type="hidden" name="id" id="" value="<?= $key['id'] ?>">
              <button class="btn btn-danger" type="submit" name="deletekk">Konfirmasi</button>
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