<?php

$conn = mysqli_connect("localhost", "root", "", "landingpage");



function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



function register($data)
{

    global $conn;

    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username

    //cek confirm password
    if ($password !== $password2) {
        echo "<script> 
            alert('Konfirmasi password salah')
            </script>";
        return false;
    }



    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO `admin` VALUES (NULL,'$username','$password')");

    return mysqli_affected_rows($conn);
}

function img()
{

    $namafile = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu')
            </script>";
        return false;
    }
    //cek ekstensi
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
            alert('yang anda upload bukan gambar')
            </script>";
        return false;
    }
    //generate namafile baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, '../img/' . $namafilebaru);
    return $namafilebaru;

}


function editlogo($data)
{

    global $conn;

    error_reporting(0);
    $logo = $data["gambar"];

    $result = mysqli_query($conn, "SELECT `logo` FROM `logo` WHERE `id`= 1");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['logo'];

    $logo = img();
    if (!$logo) {
        return false;
    }

    $query = "UPDATE `logo` SET `logo`='$logo' ";
    mysqli_query($conn, $query);

    if ($gambarlama && $gambarlama != $logo) {
        $old_file = "../img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }

    return mysqli_affected_rows($conn);

}


function editheader($data)
{

    global $conn;
    error_reporting(0);
    $bghdr = $data["gambar"];
    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);
   

    $result = mysqli_query($conn, "SELECT `bg` FROM `header` WHERE `id`= 1");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['bg'];


    $bghdr = imgedit();
    if (!$bghdr) {
        $bghdr = $gambarlama;
    }

    $query = "UPDATE `header` SET `bg`='$bghdr', `header`='$header',`teks`='$teks' WHERE `id` = 1 ";
    mysqli_query($conn, $query);

    if ($gambarlama && $gambarlama != $bghdr) {
        $old_file = "../img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }

    return mysqli_affected_rows($conn);


}

function imgedit()
{
    $namafile = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        return false;
    }
    //cek ekstensi
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
            alert('yang anda upload bukan gambar')
            </script>";
        return false;
    }
    //generate namafile baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, '../img/' . $namafilebaru);
    return $namafilebaru;
}

function inpc1($data)
{

    global $conn;
    error_reporting(0);
    $icon = $data["icon"];
    $teks = htmlspecialchars($data["teks"]);

    $query = "INSERT INTO `content1` VALUES (NULL,'$icon','$teks')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    

}


function edithdrc1($data)
{

    global $conn;

    $header = htmlspecialchars($data["header"]);

    $query = "UPDATE `hdrc1` SET `header`='$header'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function editc1($data)
{

    global $conn;
    error_reporting(0);
    $id = $data["id"];
    $icon = $data["icon"];
    $teks = htmlspecialchars($data["teks"]);

    $query = "UPDATE `content1` SET `icon`='$icon',`teks`='$teks' WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);



}

function deletec1($id)
{
    global $conn;
    $query = "DELETE FROM `content1` WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function editc2($data)
{

    global $conn;
    error_reporting(0);
    $icon = $data["icon"];
    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);

    $query = "UPDATE `about` SET `icon`='$icon',`header`='$header',`teks`='$teks' WHERE `id`=1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


}

function plusabt($data)
{

    global $conn;

    $gambar = $data["gambar"];
    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);

    $gambar = img();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO `about` VALUES (NULL,'$gambar','$header','$teks')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function pluspromo($data)
{

    global $conn;

    $teks = htmlspecialchars($data["teks"]);

    $query = "INSERT INTO `promo` VALUES (NULL,'$teks')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editpromo($data)
{

    global $conn;

    $id = $data["id"];
    $teks = htmlspecialchars($data["teks"]);

    $query = "UPDATE `promo` SET `teks`='$teks' WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deletepr($id)
{

    global $conn;

    $query = "DELETE FROM `promo` WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editkdrn($data)
{

    global $conn;

    $teks = htmlspecialchars($data["header"]);

    $query = "UPDATE `headersewa` SET `header`='$teks' WHERE `id`= 1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edithmbl($data)
{

    global $conn;

    $teks = htmlspecialchars($data["header"]);

    $query = "UPDATE `headersewamobil` SET `header`='$teks' WHERE `id`= 1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function plusmbl($data)
{

    global $conn;
    error_reporting(0);
    $img = $data["gambar"];
    $merk = htmlspecialchars($data["merk"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);

    $img = img();
    if (!$img) {
        return false;
    }

    $query = "INSERT INTO `mobil` VALUES (NULL,'$img','$merk','$nama','$harga')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editmbl($data)
{
    global $conn;
    error_reporting(0);
    $id = $data["id"];
    $img = $data["gambar"];
    $merk = htmlspecialchars($data["merk"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);

    $result = mysqli_query($conn, "SELECT `gambar` FROM `mobil` WHERE `id`=$id");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $img = imgedit();
    if (!$img) {
        $img = $gambarlama;
    }

    $query = "UPDATE `mobil` SET `gambar`='$img',`merk`='$merk',`nama`='$nama',`harga`='$harga' WHERE `id`= $id";
    mysqli_query($conn, $query);

    if ($gambarlama && $gambarlama != $img) {
        $old_file = "../img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }

    return mysqli_affected_rows($conn);
}

function deletembl($id)
{
    global $conn;

    $result = mysqli_query($conn, "SELECT `gambar` FROM `mobil` WHERE `id`=$id ");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $old_file = "../img/$gambarlama";
    if (file_exists($old_file)) {
        unlink($old_file);
    }

    $query = "DELETE FROM `mobil` WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


}

function edithmtr($data)
{
    global $conn;

    $teks = htmlspecialchars($data["header"]);

    $query = "UPDATE `headersewamotor` SET `header`='$teks' WHERE `id`= 1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function plusmtr($data)
{
    global $conn;
    error_reporting(0);
    $img = $data["gambar"];
    $merk = htmlspecialchars($data["merk"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);

    $img = img();
    if (!$img) {
        return false;
    }

    $query = "INSERT INTO `motor` VALUES (NULL,'$img','$merk','$nama','$harga')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); 
}

function editmtr($data)
{
    global $conn;
    error_reporting(0);
    $id = $data["id"];
    $img = $data["gambar"];
    $merk = htmlspecialchars($data["merk"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);

    $result = mysqli_query($conn, "SELECT `gambar` FROM `motor` WHERE `id`=$id");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $img = imgedit();
    if (!$img) {
        $img = $gambarlama;
    }

    $query = "UPDATE `motor` SET `gambar`='$img',`merk`='$merk',`nama`='$nama',`harga`='$harga' WHERE `id`= $id";
    mysqli_query($conn, $query);

    if ($gambarlama && $gambarlama != $img) {
        $old_file = "../img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }

    return mysqli_affected_rows($conn);
}

function deletemtr($id)
{
    global $conn;

    $result = mysqli_query($conn, "SELECT `gambar` FROM `motor` WHERE `id`=$id ");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $old_file = "../img/$gambarlama";
    if (file_exists($old_file)) {
        unlink($old_file);
    }

    $query = "DELETE FROM `motor` WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edithbnf($data)
{
    global $conn;

    $header = htmlspecialchars($data["header"]);

    $query = "UPDATE `headerbenefit` SET `header`='$header' WHERE `id`=1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function plusbnf($data)
{
    global $conn;

    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);
    
    $query = "INSERT INTO `benefit` VALUES (NULL,'$header','$teks')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}


function editbnf($data)
{
    global $conn;

    $id = $data["id"];
    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);
    
    $query = "UPDATE `benefit` SET `header`='$header',`teks`='$teks' WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}


function deletebnf($id)
{
    global $conn;

    $query = "DELETE FROM `benefit` WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edithts($data)
{
    global $conn;

    $header = htmlspecialchars($data["header"]);
    $note = htmlspecialchars($data["note"]);

    $query = "UPDATE `headertesti` SET `header`='$header',`note`='$note' WHERE `id`=1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function plusts($id)
{
    global $conn;
    error_reporting(0);
     // Query untuk memilih data dengan ID yang ditentukan dari Tabel A
     $selectQuery = "SELECT * FROM `testix` WHERE id = '$id'";
     $result = $conn->query($selectQuery);
     
     // Periksa apakah ada data yang dipilih
     if ($result->num_rows > 0) {
         // Ambil baris data
         $row = $result->fetch_assoc();
         
         // Ambil nilai dari setiap kolom
         $column1Value = $row["gambar"];
         $column2Value = $row["teks"];
         $column3Value = $row["nama"];
         $column4Value = $row["kota"];
         $column5Value = $row["rating"];
         
         
         // Query untuk memasukkan data ke Tabel B
         $insertQuery = "INSERT INTO `testimonial` VALUES (NULL, '$column1Value', '$column2Value','$column3Value','$column4Value','$column5Value',NULL)";
         
         // Eksekusi query INSERT
         if ($conn->query($insertQuery) === TRUE) {
             // Query untuk menghapus data dari Tabel A
             $query = "DELETE FROM `testix` WHERE `id`=$id";
             mysqli_query($conn, $query);
             return mysqli_affected_rows($conn);
         }
        }

}

function deletets($id)
{
    global $conn;
    error_reporting(0);
    $result = mysqli_query($conn, "SELECT `gambar` FROM `testimonial` WHERE `id`=$id ");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $old_file = "../img/$gambarlama";
    if (file_exists($old_file)) {
        unlink($old_file);
    }

    $query = "DELETE FROM `testimonial` WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editts($data)
{
    global $conn;
    error_reporting(0);
    $id = $data["id"];
    $gambar = $data["gambar"];
    $teks  = htmlspecialchars($data["teks"]);
    $nama = htmlspecialchars($data["nama"]);
    $tempat = htmlspecialchars($data["tempat"]);
    $posisi = htmlspecialchars($data["posisi"]);

    $result = mysqli_query($conn, "SELECT `gambar` FROM `testimonial` WHERE `id`=$id");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $gambar = imgedit();
    if (!$gambar) {
        $gambar = $gambarlama;
    }

    $query = "UPDATE `testimonial` SET `gambar`='$gambar',`teks`='$teks',`nama`='$nama',`tempat`='$tempat',`posisi`='$posisi' WHERE `id`= $id";
    mysqli_query($conn, $query);

    if ($gambarlama && $gambarlama != $gambar) {
        $old_file = "../img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }
    return mysqli_affected_rows($conn);
}

function edithfas($data)
{
    global $conn;

    $header = htmlspecialchars($data["header"]);

    $query = "UPDATE `headerfasilitas` SET `header`='$header' WHERE `id`=1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editfasbg($data)
{
    global $conn;

    error_reporting(0);
    $gambar = $data["gambar"];

    $result = mysqli_query($conn, "SELECT `gambar` FROM `bgfasilitas` WHERE `id`= 1");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $gambar = img();
    if (!$gambar) {
        return false;
    }

    $query = "UPDATE `bgfasilitas` SET `gambar`='$gambar' ";
    mysqli_query($conn, $query);

    if ($gambarlama && $gambarlama != $gambar) {
        $old_file = "../img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }

    return mysqli_affected_rows($conn);
}

function plusfas($data)
{
    global $conn;

    $teks = htmlspecialchars($data["teks"]);

    $query = "INSERT INTO `fasilitas` VALUES (NULL,'$teks')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editfas($data) 
{
    global $conn;

    $id = $data["id"];
    $teks = htmlspecialchars($data["teks"]);

    $query = "UPDATE `fasilitas` SET `fasilitas`='$teks' WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deletefas($id)
{
    global $conn;

    $query = "DELETE FROM `fasilitas` WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edithsis($data)
{
    global $conn;

    $header = htmlspecialchars($data["header"]);

    $query = "UPDATE `headersistem` SET `header`='$header'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function plussis($data)
{
    global $conn ;

    $teks = htmlspecialchars($data["sistem"]);

    $query = "INSERT INTO `sistem` VALUES (NULL,'$teks')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editsis($data)
{
    global $conn;

    $id = $data["id"];
    $teks = htmlspecialchars($data["sistem"]);

    $query = "UPDATE `sistem` SET `sistem`='$teks' WHERE `id`=$id ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editfoot($data)
{
    global $conn;
    error_reporting(0);
    $icon = $data["icon"];
    $header = htmlspecialchars($data["header"]);
    $teks1 = htmlspecialchars($data["teks1"]);
    $teks2 = htmlspecialchars($data["teks2"]);

    $query = "UPDATE `footer` SET `icon`='$icon',`header`='$header',`teks1`='$teks1',`teks2`='$teks2' WHERE `id`=1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editwa($data)
{
    global $conn;

    $link = htmlspecialchars($data["link"]);
    $hf = htmlspecialchars($data["hf"]);
    $mobil = htmlspecialchars($data["mobil"]);
    $motor = htmlspecialchars($data["motor"]);
    $teks = htmlspecialchars($data["tekswa"]);

    $query = "UPDATE `whatsapp` SET `link`='$link',`hf`='$hf',`mobil`='$mobil',`motor`='$motor',`tekswa`='$teks' WHERE `id` =1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editpu($data)
{
    global $conn;

    $header = htmlspecialchars($data["header"]);
    $teks1 = htmlspecialchars($data["teks1"]);
    $teks2 = htmlspecialchars($data["teks2"]);

    $query = "UPDATE `popupwa` SET `header`='$header',`teks1`='$teks1',`teks2`='$teks2' WHERE `id`=1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function plusagen($data)
{
    global $conn;

    $gambar = $data["gambar"];
    $nama = htmlspecialchars($data["nama"]);
    $link = htmlspecialchars($data["link"]);

    $gambar = img();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO `agen` VALUES (NULL,'$gambar','$nama','$link') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function editagen($data)
{
    global $conn;

    $id = $data["id"];
    $gambar = $data["gambar"];
    $nama = htmlspecialchars($data["nama"]);
    $link = htmlspecialchars($data["link"]);

    $result = mysqli_query($conn, "SELECT `gambar` FROM `agen` WHERE `id`=$id");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $gambar = imgedit();
    if(!$gambar){
        $gambar = $gambarlama;
    }

    $query = "UPDATE `agen` SET `gambar`='$gambar',`nama`='$nama',`link`='$link' WHERE `id`=$id ";
    mysqli_query($conn, $query);
    
    if ($gambarlama && $gambarlama != $gambar) {
        $old_file = "../img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }

    return mysqli_affected_rows($conn);
}

function deleteagen($id)
{
    global $conn;

    $result = mysqli_query($conn, "SELECT `gambar` FROM `agen` WHERE `id`=$id ");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $old_file = "../img/$gambarlama";
    if (file_exists($old_file)) {
        unlink($old_file);
    }

    $query = "DELETE FROM `agen` WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editsosmed($data)
{
    global $conn;

    $fb = $data ["facebook"];
    $tw = $data ["twitter"];
    $ig = $data ["instagram"];
    $tk = $data ["tiktok"];

    $query = "UPDATE `sosmed` SET `facebook`='$fb',`twitter`='$tw',`instagram`='$ig',`tiktok`='$tk' WHERE `id`=1";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ulas($data)
{
    global $conn;
    error_reporting(0);
    $gambar = $data["gambar"];
    $nama = htmlspecialchars($data["nama"]);
    $kota = htmlspecialchars($data["kota"]);
    $teks = htmlspecialchars($data["teks"]);
    $rating = htmlspecialchars($data["rating"]);

    $gambar = imgulas();
    if(!$gambar){
        $gambar = NULL;
    }

    $query = "INSERT INTO `testix` VALUES (NULL,'$gambar','$nama','$kota','$teks','$rating')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

}

function deletetsx($id)
{
    global $conn;
    error_reporting(0);
    $result = mysqli_query($conn, "SELECT `gambar` FROM `testix` WHERE `id`=$id ");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $old_file = "../img/$gambarlama";
    if (file_exists($old_file)) {
        unlink($old_file);
    }

    $query = "DELETE FROM `testix` WHERE `id`=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function imgulas()
{
    $namafile = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        return false;
    }
    //cek ekstensi
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
            alert('yang anda upload bukan gambar')
            </script>";
        return false;
    }
    //generate namafile baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, 'img/' . $namafilebaru);
    return $namafilebaru;
}
?>