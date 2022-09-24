<?php

class Bayarzakat extends Database
{
    public function __construct($host, $username, $password, $dbname)
    {
        parent::__construct($host, $username, $password, $dbname);
    }

    // bayar zakat
    public function create($data)
    {
        $id = $data['id'];
        $nama_kk = $data["nama_kk"];
        $jumlah_tanggungan = $data["jumlah_angggota_kk"];
        $jenis_bayar = $data["jeniszakat"];
        $jumlah_tanggunganyangdibayar = $data["jumlah_bayar_zakat"];
        $bayar_beras = $data["bayar_beras"];
        $bayar_uang = $data["bayar_uang"];

        $create = "INSERT INTO bayarzakat VALUES('$id',
                                '$nama_kk ',
                                '$jumlah_tanggungan',
                                '$jenis_bayar',
                                '$jumlah_tanggunganyangdibayar',
                                '$bayar_beras',
                                '$bayar_uang')";
        mysqli_query($this->getConn(), $create);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'bayarzakat.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'bayarzakat.php';
                  </script>";
        }

        $sql = "UPDATE kepala_keluarga SET 
        bayarzakat = 1
        WHERE id = $id";

    mysqli_query($this->getConn(), $sql);
        return $result;
    }

    //delete
    public function Delete($data)
    {
        $id = $data["id"];

        $delete = "DELETE FROM bayarzakat WHERE id = $id";
        mysqli_query($this->getConn(), $delete);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Dihapus');
                    document.location.href = 'bayarzakat.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Dihapus');
                    document.location.href = 'bayarzakat.php';
                  </script>";
        }
        
        $sql = "UPDATE kepala_keluarga SET 
        muzakki = 0,
        bayarzakat = 0
        WHERE id = $id";

        mysqli_query($this->getConn(), $sql);

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