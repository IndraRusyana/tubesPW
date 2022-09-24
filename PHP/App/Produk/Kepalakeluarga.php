<?php

class Kepalakeluarga extends Database
{
    public function __construct($host, $username, $password, $dbname)
    {
        parent::__construct($host, $username, $password, $dbname);
    }

    // tambah buku
    public function create($data)
    {
        $NIK = $data["NIK"];
        $nama_KK = $data["nama_kk"];
        $jumlah_tanggungan_kk = $data["jumlah_anggota_kk"];
        $Keterangan = $data["keterangan"];
        $muzakki = 0;
        $bayarzakat = 0;

        $create = "INSERT INTO kepala_keluarga VALUES('','$NIK','$nama_KK','$jumlah_tanggungan_kk','$Keterangan','$muzakki','$bayarzakat')";
        mysqli_query($this->getConn(), $create);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'kepalakeluarga.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'kepalakeluarga.php';
                  </script>";
        }
        return $result;
    }

    //tambah muzakki
    public function CreateToMuzakki($data1,$data2)
    {   
        foreach ($data2 as $key) {
            $nama_muzakki = $key['nama_kk'];
            $jumlah_tanggungan = $key['jumlah_anggota_kk'];
            $keterangan = $key['keterangan'];
        }

        $create = "INSERT INTO muzakki VALUES('','$nama_muzakki','$jumlah_tanggungan','$keterangan')";
        mysqli_query($this->getConn(), $create);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'kepalakeluarga.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'muzakki.php';
                  </script>";
        }

        $sql = "UPDATE kepala_keluarga SET 
             muzakki = 1
             WHERE id = $data1";
 
         mysqli_query($this->getConn(), $sql);

        return $result;
    }

    //delete
    public function Delete($data)
    {
        $id = $data["id"];

        $delete = "DELETE FROM kepala_keluarga WHERE id = $id";
        mysqli_query($this->getConn(), $delete);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Dihapus');
                    document.location.href = 'kepalakeluarga.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Dihapus');
                    document.location.href = 'kepalakeluarga.php';
                  </script>";
        }
        return $result;
    }

     //edit kk
     public function update($data)
     {
         $id = $data['id'];
         $nama_kk = $data["nama_kk"];
         $jumlah_anggota_kk = $data["jumlah_anggota_kk"];
         $keterangan = $data["keterangan"];
 
         $sql = "UPDATE kepala_keluarga SET 
             nama_kk = '$nama_kk',
             jumlah_anggota_kk = '$jumlah_anggota_kk',
             keterangan = '$keterangan'
             WHERE id = $id";
 
         mysqli_query($this->getConn(), $sql);
 
         $result = mysqli_affected_rows($this->getConn());
         if ($result < 0) {
             $result = "<script>
                     alert('Data Gagal Diubah');
                     document.location.href = 'kepalakeluarga.php';
                   </scrpit>";
         } else {
             $result = "<script>
                     alert('Data Berhasil Diubah');
                     document.location.href = 'kepalakeluarga.php';
                   </script>";
         }
         return $result;
     }
}