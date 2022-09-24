<?php
require_once 'App/init.php';

// koneksi ke database
$mysqli = new Database('Localhost', 'root', '', 'zakatfitrah');
$hostDB = $mysqli->getHost();
$usernameDB = $mysqli->getUsername();
$passwordDB = $mysqli->getPassword();
$databaseDB = $mysqli->getDBname();

// get session name
$name = $mysqli->getSession();

//login user
if (isset($_POST["login"])) {
    // instansiasi Login
    $login = new Login($hostDB, $usernameDB, $passwordDB, $databaseDB);

    if ($login->login($_POST) == 1) {
        $error = true;
    }
}

// baca database data muzakki
$muzakki = $mysqli->read("SELECT * FROM kepala_keluarga WHERE muzakki = 1 AND bayarzakat = 0");

//tambah muzakki
if (isset($_POST["addmuzakki"])) {
    // instansiasi LoginAdmin
    $addmuzakki = new Muzakki($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $addmuzakki->create($_POST);
}

//edit muzakki
if (isset($_POST["editmuzakki"])) {
    // instansiasi LoginAdmin
    $editmuzakki = new Muzakki($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $editmuzakki->update($_POST);
}

//delete muzakki
if (isset($_POST["deletemuzakki"])) {
    // instansiasi LoginAdmin
    $deletemuzakki = new Muzakki($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $deletemuzakki->delete($_POST);
}

// baca database data mustahik
$mustahik = $mysqli->read("SELECT * FROM kategori_mustahik");

//tambah mustahik
if (isset($_POST["addmustahik"])) {
    // instansiasi LoginAdmin
    $addmustahik = new Mustahik($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $addmustahik->create($_POST);
}

//edit mustahik
if (isset($_POST["editmustahik"])) {
    // instansiasi LoginAdmin
    $editmustahik = new Mustahik($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $editmustahik->update($_POST);
}

//delete mustahik
if (isset($_POST["deletemustahik"])) {
    // instansiasi LoginAdmin
    $deletemustahik = new Mustahik($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $deletemustahik->delete($_POST);
}

// baca database data kepala keluarga
$kepala_keluarga = $mysqli->read("SELECT * FROM kepala_keluarga");

//tambah kk
if (isset($_POST["addkk"])) {
    // instansiasi LoginAdmin
    $addkk = new Kepalakeluarga($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $addkk->create($_POST);
}

//tambah muzakki
if (isset($_GET["id_kk"])) {
    // baca table kk
    $id = $_GET["id_kk"];
    $table_kk = $mysqli->read("SELECT * FROM kepala_keluarga WHERE id = $id");
    // instansiasi kk
    $CreateToMuzakki = new Kepalakeluarga($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $CreateToMuzakki->CreateToMuzakki($_GET["id_kk"],$table_kk);
}

//edit kk
if (isset($_POST["editkk"])) {
    // instansiasi kk
    $editkk = new Kepalakeluarga($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $editkk->update($_POST);
}

//delete kk
if (isset($_POST["deletekk"])) {
    // instansiasi kk
    $deletekk = new Kepalakeluarga($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $deletekk->delete($_POST);
}

// baca database data bayar zakat
$bayarzakat = $mysqli->read("SELECT * FROM bayarzakat");

//bayar zakat
if (isset($_POST["bayarzakat"])) {
    // instansiasi bayarzakat
    $bayarzakat = new Bayarzakat($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $bayarzakat->create($_POST);
}

//delete
if (isset($_POST["deletebayarzakat"])) {
    // instansiasi kk
    $deletebayarzakat = new Bayarzakat($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $deletebayarzakat->delete($_POST);
}

// baca database data mustahik warga
$mustahikwarga = $mysqli->read("SELECT * FROM mustahik_warga");

//tambah mustahik warga
if (isset($_POST["addmustahikwarga"])) {
    // instansiasi LoginAdmin
    $addmustahikwarga = new Warga($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $addmustahikwarga->create($_POST);
}

//edit mustahik warga
if (isset($_POST["editmustahikwarga"])) {
    // instansiasi kk
    $editmustahikwarga = new Warga($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $editmustahikwarga->update($_POST);
}

//delete mustahik warga
if (isset($_POST["deletemustahikwarga"])) {
    // instansiasi kk
    $deletemustahikwarga = new Warga($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $deletemustahikwarga->delete($_POST);
}

// baca database data mustahik lainnya
$mustahiklainnya = $mysqli->read("SELECT * FROM mustahik_lainnya");

//tambah mustahik lainnya
if (isset($_POST["addmustahiklainnya"])) {
    // instansiasi LoginAdmin
    $addmustahiklainnya = new Mustahiklainnya($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $addmustahiklainnya->create($_POST);
}

//edit mustahik lainnya
if (isset($_POST["editmustahiklainnya"])) {
    // instansiasi kk
    $editmustahiklainnya = new Mustahiklainnya($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $editmustahiklainnya->update($_POST);
}

//delete mustahik lainnya
if (isset($_POST["deletemustahiklainnya"])) {
    // instansiasi kk
    $deletemustahiklainnya = new Mustahiklainnya($hostDB, $usernameDB, $passwordDB, $databaseDB);

    echo $deletemustahiklainnya->delete($_POST);
}


// // CRUD