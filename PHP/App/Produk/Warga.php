<?php

class Warga extends Database
{
    public function __construct($host, $username, $password, $dbname)
    {
        parent::__construct($host, $username, $password, $dbname);
    }

    // tambah 
    public function create($data)
    {
        $nama = $data["nama"];
        $kategori = $data["kategori"];
        $hak = $data["hak"];

        $create = "INSERT INTO mustahik_warga VALUES('','$nama','$kategori','$hak')";
        mysqli_query($this->getConn(), $create);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'warga.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'warga.php';
                  </script>";
        }
        return $result;
    }

    //delete
    public function Delete($data)
    {
        $id = $data["id"];

        $delete = "DELETE FROM mustahik_warga WHERE id = $id";
        mysqli_query($this->getConn(), $delete);

        $result = mysqli_affected_rows($this->getConn());
        if ($result < 0) {
            $result = "<script>
                    alert('Data Gagal Dihapus');
                    document.location.href = 'warga.php';
                  </scrpit>";
        } else {
            $result = "<script>
                    alert('Data Berhasil Dihapus');
                    document.location.href = 'warga.php';
                  </script>";
        }
        return $result;
    }

     //edit muzakki
     public function update($data)
     {
         $id = $data['id'];
         $nama = $data["nama"];
         $kategori = $data["kategori"];
         $hak = $data["hak"];
 
         $sql = "UPDATE mustahik_warga SET 
             nama = '$nama',
             kategori = '$kategori',
             hak = '$hak'
             WHERE id = $id";
 
         mysqli_query($this->getConn(), $sql);
 
         $result = mysqli_affected_rows($this->getConn());
         if ($result < 0) {
             $result = "<script>
                     alert('Data Gagal Diubah');
                     document.location.href = 'warga.php';
                   </scrpit>";
         } else {
             $result = "<script>
                     alert('Data Berhasil Diubah');
                     document.location.href = 'warga.php';
                   </script>";
         }
         return $result;
     }
}