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
      <p>Distribusi Zakat Fitrah / Data Mustahik Lainnya</p>
    </div>
  </div>

  <div class="">
    <div class="col-10 shadow-sm p-3 mb-5 bg-white rounded mx-auto">
      <h3>Data Distribusi Mustahik Lainnya</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Hak</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (count($mustahiklainnya) == 0) { ?>
            <tr>
              <td>Tidak ada data...</td>
            </tr>
          <?php } ?>
          <?php $count = 1; ?>
          <?php foreach ($mustahiklainnya as $key) : ?>
            <tr>
              <th scope="row"><?= $count; ?></th>
              <td><?= $key['nama'] ?></td>
              <td><?= $key['kategori'] ?></td>
              <td><?= $key['hak'] ?></td>
              <td class="text-center">
                <a class="btn btn-light" href="" data-toggle="modal" data-target="#editModal<?= $key['id'] ?>">Edit</a>
                <a class="btn btn-danger" href="" data-toggle="modal" data-target="#deleteModal<?= $key['id'] ?>">Hapus<i class="fa-solid fa-trash ml-2"></i></a>
              </td>
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
          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data Mustahik Lainnya</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" id="modal_body">
          <form action="" method="post">
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <input class="form-control" placeholder="Nama mustahik" type="text" id="nama" name="nama" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <select id="kategori" name="kategori" onChange="update()">
                  <option value="">Kategori</option>
                  <option value="Amilin">Amilin</option>
                  <option value="Fisabilillah">Fisabilillah</option>
                  <option value="Mualaf">Mualaf</option>
                  <option value="Ibnu Sabil">Ibnu Sabil</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative">
                <input class="form-control" value="hak" type="text" id="hak" name="hak" type="text" required>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-info" type="submit" name="addmustahiklainnya">Tambah Data</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal notification -->

  <?php foreach ($mustahiklainnya as $key) : ?>
    <!-- Modal notfication edit -->
    <div class="modal fade" id="editModal<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="hidden" name="id" id="" value="<?= $key['id'] ?>">
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><input type="text" name="nama" id="nama" value="<?= $key['nama'] ?>"></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td><input type="text" name="kategori" id="kategori" value="<?= $key['kategori'] ?>"></td>
                </tr>
                <tr>
                  <td>Hak</td>
                  <td>:</td>
                  <td><input type="text" name="hak" id="hak" value="<?= $key['hak'] ?>"></td>
                </tr>
              </table>
              <div class="modal-footer">
                <button class="btn btn-info" type="submit" name="editmustahiklainnya">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
    <!-- End modal notification -->
  <?php endforeach; ?>

  <?php foreach ($mustahiklainnya as $key) : ?>
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
          <div class="modal-body text-center" id="modal_body">Anda akan menghapus mustahik <?= $key['nama'] ?></div>
          <div class="modal-footer">
            <form action="" method="post">
              <input type="hidden" name="id" id="" value="<?= $key['id'] ?>">
              <button class="btn btn-danger" type="submit" name="deletemustahiklainnya">Konfirmasi</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End modal notification -->
  <?php endforeach; ?>

  <script type="text/javascript">
    function update() {
      var kategori = document.getElementById('kategori').value;
      

      if (kategori == "Amilin") {
        hak = "10 Kg";
      } else if(kategori == "Fisabilillah"){
        hak = "3 Kg";
      } else if(kategori == "Mualaf") {
        hak = "4 Kg";
      } else if(kategori == "Ibnu Sabil") {
        hak = "4 Kg";
      } else {
        hak = "Hak";
      }
      document.getElementById('hak').value = hak;
      
    }

    update();
  </script>

  <!-- Core -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="bootstrap.bundle.min.js"></script>
</body>

</html>