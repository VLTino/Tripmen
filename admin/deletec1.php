<?php 
require 'functions.php';

$id = $_GET["id"];

if ( deletec1($id) > 0){
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'content1.php';
    </script>";
}else {
    echo "<script>
    alert('data gagal dihapus')
    document.location.href = 'content1.php';
    </script>";
}
?>