<?php 
require 'admin/functions.php';

if (isset($_POST["ulas"])) {
    if (ulas($_POST)) {
        echo "<script>
        alert('data berhasil diedit');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal diedit');
        document.location.href = 'index.php';
        </script>";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ulas Kami</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body id="bodyulas">

    <div class="btnback">
        <button class="glow-on-hover2" type="button"><a href="index.php">Kembali</a></button>
    </div>

    <div class="container">
        <div class="formulas">
            <h3>Berikan Ulasan Kepada Kami</h3><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    Gambar <br>
                    <input type="file" name="gambar" id=""><br>
                    Nama
                    <input type="text" name="nama" id="" class="form-control">
                    Kota
                    <input type="text" name="kota" id="" class="form-control">
                    Teks
                    <input type="text" name="teks" id="" class="form-control">
                    
                <div class="rating form-control">
                    <p>Rating</p>
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                </div><br>
                <button type="submit" class="btn btn-primary" name="ulas">Submit</button>
                </div>
               
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0d2b3238f9.js" crossorigin="anonymous"></script>
</body>

</html>