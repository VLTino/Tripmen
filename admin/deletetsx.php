<?php 
require 'functions.php';

$id = $_GET["id"];

if ( deletetsx($id) > 0){
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'testi.php';
    </script>";
}else {
    echo "<script>
    alert('data gagal dihapus')
    document.location.href = 'testi.php';
    </script>";
}
?>