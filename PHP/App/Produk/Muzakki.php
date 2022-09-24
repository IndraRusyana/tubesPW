<?php

class Muzakki extends Database
{
    public function __construct($host, $username, $password, $dbname)
    {
        parent::__construct($host, $username, $password, $dbname);
    }

    // tambah buku
    public function create($data)
    {
        $nama_muzakki = $data["nama_muzakki"];
        $jumlah_tanggungan = $data["jumlah_tanggungan"];
        $Keterangan = $data["Keterangan"];

        $create = "INSERT INTO muzakki VALUES('','$nama_muzakki','$jumlah_tanggungan','$Keterangan')";
        mysqli_query($this->getConn(), $create);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'muzakki.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'muzakki.php';
                  </script>";
        }
        return $result;
    }

    //delete
    public function Delete($data)
    {
        $id = $data["id"];

        $sql = "UPDATE kepala_keluarga SET 
        muzakki = 0
        WHERE id = $id";

    mysqli_query($this->getConn(), $sql);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Dihapus');
                    document.location.href = 'muzakki.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Dihapus');
                    document.location.href = 'muzakki.php';
                  </script>";
        }
        return $result;
    }

     //edit muzakki
     public function update($data)
     {
         $id_muzakki = $data['id_muzakki'];
         $nama_muzakki = $data["nama_muzakki"];
         $jumlah_tanggungan = $data["jumlah_tanggungan"];
         $keterangan = $data["keterangan"];
 
         $sql = "UPDATE muzakki SET 
             nama_muzakki = '$nama_muzakki',
             jumlah_tanggungan = '$jumlah_tanggungan',
             keterangan = '$keterangan'
             WHERE id_muzakki = $id_muzakki";
 
         mysqli_query($this->getConn(), $sql);
 
         $result = mysqli_affected_rows($this->getConn());
         if ($result < 0) {
             $result = "<script>
                     alert('Data Gagal Diubah');
                     document.location.href = 'muzakki.php';
                   </scrpit>";
         } else {
             $result = "<script>
                     alert('Data Berhasil Diubah');
                     document.location.href = 'muzakki.php';
                   </script>";
         }
         return $result;
     }
}