<?php 

require 'functions.php';

$id = $_GET["id"];


    if(plusts($id) > 0){
        echo "<script>
        alert('data berhasil diaprove jangan lupa atur posisi');
        document.location.href = 'testi.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal diaprove');
        document.location.href = 'testi.php';
        </script>";
    }
?>


