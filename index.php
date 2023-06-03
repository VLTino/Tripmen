<?php
require 'admin/functions.php';
include 'admin/counter.php';
$logo = query("SELECT * FROM `logo` WHERE `id`= 1");
$header = query("SELECT * FROM `header` WHERE `id`=1");
$headerc1 = query("SELECT * FROM `hdrc1` WHERE `id`=1");
$content1 = query("SELECT * FROM `content1`");
$about = query("SELECT * FROM `about`");
$promo = query("SELECT * FROM `promo`");
$headersewa = query("SELECT * FROM `headersewa` WHERE `id`=1");
$headermbl = query("SELECT * FROM `headersewamobil` WHERE `id`=1 ");
$mobil = query("SELECT * FROM `mobil`");
$headermtr = query("SELECT * FROM `headersewamotor` WHERE `id`=1 ");
$motor = query("SELECT * FROM `motor`");
$headerbnf = query("SELECT * FROM `headerbenefit` WHERE `id`=1");
$benefit = query("SELECT * FROM `benefit`");
$headerts = query("SELECT * FROM `headertesti` WHERE `id`=1");
$testirg = query("SELECT * FROM `testimonial` WHERE `posisi`= 'kanan'");
$testilf = query("SELECT * FROM `testimonial` WHERE `posisi`= 'kiri'");
$bgfas = query("SELECT * FROM `bgfasilitas` WHERE `id`=1");
$fasilitas = query("SELECT * FROM `fasilitas`");
$headerfas = query("SELECT * FROM `headerfasilitas` WHERE `id`=1");
$headersis = query("SELECT * FROM `headersistem` WHERE `id`=1");
$sistem = query("SELECT * FROM `sistem`");
$footer = query("SELECT * FROM `footer` WHERE `id`=1");
$whatsapp = query("SELECT * FROM `whatsapp` WHERE `id`=1");
$popup = query("SELECT * FROM `popupwa` WHERE `id`=1");
$agen = query("SELECT * FROM `agen`");
$sosmed = query("SELECT * FROM `sosmed` WHERE `id`=1");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Tripmen</title>
</head>

<body>
    
<button
        type="button"
        class="btn btn-primary btn-floating btn-md"
        id="btn-back-to-top"
        >
  <i class="fas fa-arrow-up"></i>
</button>

    <script>
        //Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
    
    </script>

<style>
    /* CSS untuk tampilan popup */
    .popup {
        
        position: fixed;
        bottom: -100%;
        right: -8%;
        transform: translateX(-50%);
        width: 300px;
        max-height: 500px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 9999;
        animation: slide-up 0.3s ease forwards;
        overflow: auto;
    }

    /* CSS untuk animasi slide-up */
    @keyframes slide-up {
        0% {
            bottom: -100%;
        }
        100% {
            bottom: 10%;
        }
    }

    /* CSS untuk animasi rotate */
    @keyframes rotate {
        20% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    /* Responsiveness */
    @media screen and (max-width: 600px) {
        .popup {
            width: 90%;
            right:-40%;
        }
    }
</style>

<div class="whatsapp">
    <a><i class="fa-brands fa-whatsapp" id="popup-button"></i></a>
</div>

<div class="popup" style="display: none;">
    <!-- Konten popup -->
    <?php foreach ($popup as $pp): ?>
    <div class="hw">
        <h4><i class="fa-brands fa-whatsapp"></i> <?= $pp["header"]; ?></h4>
        <p><?= $pp["teks1"]; ?></p>
    </div>
    <div id="powa">
        <p><?= $pp["teks2"]; ?></p>
    </div>
    <?php endforeach; ?>
    <?php foreach ($agen as $ag):?>
    <div class="agen">
      <a href="<?= $ag["link"]; ?>">
        <div class="wan m-3">
            <div class="row">
                <div class="col-3"><img src="img/<?= $ag["gambar"]; ?>" alt="" srcset="" style="width:50px;height:50px; border-radius:50%;"></div>
                <div class="col-9"><p class="pt-2"><?= $ag["nama"]; ?></p></div>
            </div>
        </div>
      </a>
    </div>
    <?php endforeach; ?>
    
</div>

<script>
    const popupButton = document.getElementById('popup-button');
    const popup = document.querySelector('.popup');

    popupButton.addEventListener('click', () => {
        // Toggle tampilan popup
        popup.style.display = popup.style.display === 'none' ? 'block' : 'none';
        // Tambahkan animasi saat muncul atau hilang
        popup.classList.toggle('slide-up');

        // Ganti class ikon saat diklik
        popupButton.classList.toggle('fa-x');
        popupButton.classList.toggle('fa-whatsapp');

        // Tambahkan animasi rotate pada ikon saat a href diklik
        popupButton.style.animation = 'rotate 1s linear infinite';
        setTimeout(() => {
            popupButton.style.animation = '';
        }, 1000);
    });

    // Menutup popup saat mengklik di luar popup
    document.addEventListener('click', (event) => {
        if (!event.target.closest('.popup') && event.target !== popupButton) {
            popup.style.display = 'none';
            // Hilangkan animasi saat popup ditutup
            popup.classList.remove('slide-up');

            // Kembalikan class ikon menjadi fa-whatsapp saat popup ditutup
            popupButton.classList.remove('fa-x');
            popupButton.classList.add('fa-whatsapp');
        }
    });
</script>


<div class="back">
    <div class="bg">
          <?php foreach ($header as $hdr): ?>
              <img src="img/<?php echo $hdr["bg"] ?>" alt="" srcset="" class="img-fluid bkimg">
          <?php endforeach; ?>
      </div>

</div>
    <div class="header">
       
           
            
        
        <div class="content-header">
            <div class="row">
                <div class="col-lg-6" id="hdr">
                    <?php foreach ($logo as $lg): ?>
                        <img src="img/<?php echo $lg["logo"] ?>" alt="" srcset="" id="logo" class="img-fluid">
                    <?php endforeach; ?>
                    <?php foreach ($header as $hdr): ?>
                        <h1 id="jdl">
                            <?php echo $hdr["header"] ?>
                        </h1>
                        <p id="phdr">
                            <?php echo $hdr["teks"] ?>
                        </p><br>
                        <?php foreach ($whatsapp as $wa):?>
                            <div class="wrapper">
                        <a href="<?php echo $wa["link"] ?>" id="wahdr"><span><i class="fa-brands fa-whatsapp"></i>
                            <?php echo $wa["hf"] ?></span>
                        </a>
                        </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-6"></div>
            </div>
        </div>
    </div>


    <div class="content">

        <div class="akomo">
            <?php foreach ($headerc1 as $hdrc1): ?>
                <h2>
                    <?= $hdrc1["header"]; ?>
                </h2><br>
            <?php endforeach; ?>
            <div class="row">
                <?php foreach ($content1 as $c1): ?>
                    <div class="col-md-3">
                        <div class="akoicon">
                            <p><i class="<?= $c1["icon"]; ?>"></i></p>
                        </div>
                        <br>
                        <p class="akomop">
                            <?= $c1["teks"]; ?>
                        </p>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>

<div data-aos="fade-up">

    <div class="about">
        <?php foreach ($about as $abt): ?>
           <div class="iconabt">
           <p><i class="<?= $abt["icon"]; ?>"></i></p>
           </div>
            <div class="cabout">
                <h2>
                    <?= $abt["header"]; ?>
                </h2>
                <p>
                    <?= $abt["teks"]; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
        <div class="container">
            <div class="promo">
                <div class="row">
                    <?php foreach ($promo as $pr): ?>
                        <div class="col-lg-4">
                            <div class="diskon">
                                <h4>
                                    <?= $pr["teks"]; ?>
                                </h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="harga mt-3 pt-5">
                <?php foreach ($headersewa as $sew): ?>
                    <h1>
                        <?= $sew["header"]; ?>
                    </h1><br>
                <?php endforeach; ?>
                <?php foreach ($headermbl as $hmb): ?>
                    <h2>
                        <?= $hmb["header"]; ?>
                    </h2>
                <?php endforeach; ?>
    
<div data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">

     <div class="mobil">
         <div class="row">
             <?php foreach ($mobil as $mbl): ?>
                 <div class="col-lg-3 p-4">
                     <img src="img/<?= $mbl["gambar"]; ?>" alt="" srcset="" class="img-fluid">
                     <h6 class="merk">
                         <?= $mbl["merk"]; ?>
                     </h6>
                     <h4 class="jenis">
                         <?= $mbl["nama"]; ?>
                     </h4>
                     <p class="nominal">
                         <?= $mbl["harga"]; ?>
                     </p><br>
                     <?php foreach ($whatsapp as $wa): ?>
                     <a href="<?= $wa["link"]; ?>" class="wa"><span><i class="fa-brands fa-whatsapp"></i> <?php echo $wa["mobil"];?></span></a>
                     <?php endforeach; ?>
                 </div>
             <?php endforeach; ?>

         </div>
     </div>
</div>
                <br>
                <?php foreach ($headermtr as $hmtr): ?>
                    <h2>
                        <?= $hmtr["header"] ?>
                    </h2>
                <?php endforeach; ?>
    <div data-aos="fade-left"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">

     <div class="motor">
         <div class="row">
             <?php foreach ($motor as $mtr): ?>
                 <div class="col-lg-3 p-3">
                     <img src="img/<?= $mtr["gambar"]; ?>" alt="" srcset="" class="img-fluid">
                     <h6 class="merk">
                         <?= $mtr["merk"]; ?>
                     </h6>
                     <h4 class="jenis">
                         <?= $mtr["nama"]; ?>
                     </h4>
                     <p class="nominal">
                         <?= $mtr["harga"]; ?>
                     </p><br>
                     <?php foreach ($whatsapp as $wa): ?>
                     <a href="<?php echo $wa["link"]; ?>" class="wa"><span><i class="fa-brands fa-whatsapp"></i> <?php echo $wa["motor"]; ?></span></a>
                     <?php endforeach; ?>
                 </div>
             <?php endforeach; ?>

         </div>
     </div>
</div>
            </div>
        </div>
        <div class="container">
            
            <div class="benefit">
                <div class="row">
                    <div class="col-lg-6">
                        <?php foreach ($headerbnf as $hbnf): ?>
                            <h2 id="bh2">
                                <?= $hbnf["header"]; ?>
                            </h2>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
                <div class="row">
                    <?php $i=01; ?>
                    <?php foreach ($benefit as $bnf): ?>
                        <div class="content-benefit col-lg-4">
                            <p class="p1"><?= $i++?>.</p>
                            <h4><?= $bnf["header"];?></h4>
                            <p><?= $bnf["teks"];?></p>
                        </div>
                    <?php endforeach; ?>
                    
                </div>

            </div>
        </div>
        <div class="container">
            <div class="testi">
                <div class="row">
                    <div class="col-lg-6 ">
                        <div class="content-testi-h">
                            <?php foreach ($headerts as $hts):?>
                            <h1 class="htes"><?= $hts["header"]; ?></h1>
                            <?php endforeach; ?>
                        </div>
                        <?php foreach ($testilf as $tlf):?>
                            <div data-aos="zoom-out-up">

                                <div class="content-testi">
                                    <p class="content-testi-p"><?= $tlf["teks"]; ?></p>
                                    <div class="row">
                                        <div class="col d-flex justify-content-end"><img src="img/<?= $tlf["gambar"]; ?>" alt="" srcset=""
                                                class="img -testi img-fluid "></div>
                                        <div class="orang col">
                                            <h6 class="nama-testi"><?= $tlf["nama"]; ?></h6>
                                            <p class="tempat-testi"><?= $tlf["tempat"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                       



                    </div>
                    <div class="col-lg-6">
                        <?php foreach ($testirg as $trg):?>
                            <div data-aos="zoom-out-up">

                                <div class="content-testi">
                                    <p class="content-testi-p"><?= $trg["teks"]; ?></p>
                                    <div class="row">
                                        <div class="col d-flex justify-content-end"><img src="img/<?= $trg["gambar"]; ?>" alt="" srcset=""
                                                class="img -testi img-fluid "></div>
                                        <div class="orang col">
                                            <h6 class="nama-testi"><?= $trg["nama"]; ?></h6>
                                            <p class="tempat-testi"><?= $trg["tempat"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="note">
                            <?php foreach ($headerts as $hdrts): ?>
                            <p><i class="fa-solid fa-circle-info info"></i><?= $hdrts["note"]; ?></p>
                                <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="fasi">
        <div data-aos="fade-left"
        data-aos-offset="300"
     data-aos-easing="ease-in-sine">

     <div class="fas-img">
         <div class="row">
             <div class="col-xl-3"></div>
             <div class="col-xl-4"></div>
             <div class="col-xl-5">
                 <?php foreach ($bgfas as $bgf):?>
                 <img src="img/<?= $bgf["gambar"] ?>" alt="" srcset="" class="img-fluid bkfas">
                 <?php endforeach; ?>
             </div>
         </div>
     </div>
</div>

<div data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">

     <div class="fasilitas container">
     <?php foreach ($bgfas as $bgf):?>
                 <img src="img/<?= $bgf["gambar"] ?>" alt="" srcset="" class="img-fluid pojokfas">
                 <?php endforeach; ?>
         <div class="content-fasilitas">

             <div class="row">
                 <div class="fas-hd col-lg-4">
                     <?php foreach ($headerfas as $hfs):?>
                     <h4><?= $hfs["header"]; ?></h4>
                     <?php endforeach; ?>
                 </div>
                 <div class="fas-p col-lg-8">
                     <ul style="list-style: none;">
                     <?php foreach ($fasilitas as $fas): ?>
                         <li><i class="fa-solid fa-circle-check check"></i><?= $fas["fasilitas"]; ?></li>
                             <?php endforeach; ?>
                         

                     </ul>
                 </div>

             </div>
         </div>

     </div>
</div>
        </div>
        <div class="sistem ">
            <div class="content-sistem container">
                <?php foreach ($headersis as $hsis ):?>
                <h1><?= $hsis["header"]; ?></h1>
                <?php endforeach; ?>
                <div class="sistem-p">
                    <ul style="list-style:none;">
                    <?php foreach ($sistem as $sis):?>
                        <li><i class="fa-solid fa-circle-check check"></i><?= $sis["sistem"]; ?></li>
                            <?php endforeach; ?>                   

                    </ul>
                </div>
            </div>
        </div>
        <footer>
            <div class="foot-icon">
                <?php foreach ($footer as $fo):?>
                <p><i class="<?= $fo["icon"]; ?>"></i></p>
            </div>
            <div class="foot container p-5">
                <h1><?= $fo["header"]; ?></h1>
                <p class="pt-4"><?= $fo["teks1"]; ?></p>
                <p style="font-weight:bold;"><?= $fo["teks2"]; ?></p><br>
                <?php endforeach; ?>
                <?php foreach ($whatsapp as $wa):?>
                <a href="<?= $wa["link"]; ?>" id="wafoot"><span><i class="fa-brands fa-whatsapp"></i> <?= $wa["hf"]; ?></span></a><br><br><br>
                <?php endforeach; ?>


                <div class="wrapper">
                    <?php foreach ($sosmed as $sos): ?>
                    <div class="icon facebook">
                      <div class="tooltip">Facebook</div>
                      <a href="<?= $sos["facebook"]; ?>" target="_blank" rel="noopener noreferrer" class="sosmed"><span><i class="fab fa-facebook-f"></i></span></a>
                    </div>
                    <div class="icon twitter">
                      <div class="tooltip">Twitter</div>
                      <a href="<?= $sos["twitter"]; ?>" target="_blank" rel="noopener noreferrer" class="sosmed"><span><i class="fab fa-twitter"></i></span></a>
                    </div>
                <div class="icon github">
                      <div class="tooltip">Instagram</div>
                      <a href="<?= $sos["instagram"]; ?>" target="_blank" rel="noopener noreferrer" class="sosmed"><span><i class="fab fa-instagram"></i></span></a>
                    </div>
                <div class="icon youtube">
                      <div class="tooltip">Tiktok</div>
                      <a href="<?= $sos["tiktok"]; ?>" target="_blank" rel="noopener noreferrer" class="sosmed"><span><i class="fab fa-tiktok"></i></span></a>
                    </div>
                    <?php endforeach; ?>
                </div>
                    
            </div>

        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0d2b3238f9.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
        AOS.init();
        </script>


</body>

</html>