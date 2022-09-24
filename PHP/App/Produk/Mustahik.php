<?php

class Mustahik extends Database
{
    public function __construct($host, $username, $password, $dbname)
    {
        parent::__construct($host, $username, $password, $dbname);
    }

    // tambah
    public function create($data)
    {
        $nama_kategori = $data["nama_kategori"];
        $jumlah_hak = $data["jumlah_hak"];

        $create = "INSERT INTO kategori_mustahik VALUES('','$nama_kategori','$jumlah_hak')";
        mysqli_query($this->getConn(), $create);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'mustahik.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'mustahik.php';
                  </script>";
        }
        return $result;
    }

    //delete
    public function Delete($data)
    {
        $id_kategori = $data["id_kategori"];

        $delete = "DELETE FROM kategori_mustahik WHERE id_kategori = $id_kategori";
        mysqli_query($this->getConn(), $delete);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Dihapus');
                    document.location.href = 'mustahik.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Dihapus');
                    document.location.href = 'mustahik.php';
                  </script>";
        }
        return $result;
    }

    //edit mustahik
    public function update($data)
    {
        $id_kategori = $data['id_kategori'];
        $nama_kategori = $data["nama_kategori"];
        $jumlah_hak = $data["jumlah_hak"];

        $sql = "UPDATE kategori_mustahik SET 
            nama_kategori = '$nama_kategori',
            jumlah_hak = '$jumlah_hak'
            WHERE id_kategori = $id_kategori";

        mysqli_query($this->getConn(), $sql);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Diubah');
                    document.location.href = 'mustahik.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Diubah');
                    document.location.href = 'mustahik.php';
                  </script>";
        }
        return $result;
    }
}
