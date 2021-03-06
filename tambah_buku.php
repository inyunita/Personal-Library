<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'querydb.php';

//sidebar favorit
$topfav  = query("SELECT * FROM buku WHERE is_favorite = 'ya' LIMIT 3 ");

//cek tombol submit
if(isset ($_POST["submit"])){
  //cek apakah ada data baru yang masuk dari query di function tambah
  if(tambah($_POST) > 0){
    echo "
    <script>
      alert('Data Telah Berhasil Ditambahkan!');
      document.location.href = 'koleksi_buku.php'
    </script>
  ";

  }else{
    echo "
    <script>
      alert('Data gagal ditambahkan, ayo coba lagi!');
      document.location.href = 'tambah_buku.php'
    </script>
  ";
  }


}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyLib</title>
  </head>
  <body>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

        <!-- Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
        <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/style.css" />
        <title>Document</title>
      </head>
      <body class="d-flex justify-content-between">
        <!-- main -->
        <div class="container main-menu">
          <div class="row row-cols-1 row-cols-md-3 gx-5 d-flex justify-content-between">
            <!-- Menu Kiri -->
            <div class="col-md-3 side-kiri pt-3 p-2 pb-5">
              <div class="row">
                <h2 class="text-center pt-5 pb-5">MyLib</h2>
              </div>
              <!-- Link Menu -->
              <a href="index.php" class="row link-menu justify-content-around">
                <div class="col-md-2"><i class="bi bi-speedometer2"></i></div>
                <div class="col-md-10">Dashboard</div>
              </a>
              <a href="koleksi_buku.php" class="row link-menu justify-content-around">
                <div class="col-md-2"><i class="bi bi-journal"></i></div>
                <div class="col-md-10">Koleksi Buku</div>
              </a>

              <a href="sudah_dibaca.php" class="row link-menu justify-content-around">
                <div class="col-md-2"><i class="bi bi-journal-check"></i></div>
                <div class="col-md-10">Sudah Dibaca</div>
              </a>

              <a href="belum_dibaca.php" class="row link-menu justify-content-around">
                <div class="col-md-2"><i class="bi bi-bookmark"></i></div>
                <div class="col-md-10">Belum Dibaca</div>
              </a>
              <a href="tambah_buku.php" class="row link-menu justify-content-around active1">
                <div class="col-md-2"><i class="bi bi-plus-circle"></i></div>
                <div class="col-md-10">Tambah Buku</div>
              </a>

              <!-- Akhir Link Menu -->

              <!-- Tombol Keluar -->
              <a class="row button justify-content-around" href="keluar.php">
                <div class="col-md-9 isi">Keluar</div>
                <div class="col-md-3 isi"><i class="bi bi-box-arrow-right bold"></i></div>
              </a>

              
              
              <!-- Akhir Tombol Keluar -->
            </div>
            <!-- Akhir Menu Kiri -->

            <!-- Bagian Tengah -->
            <div class="col-md-6 side-tengah">
              <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-between">
                <!-- judul -->
                <div class="col-md-12">
                  <h2 class="fw-bold">Tambah Buku</h2>
                </div>
                <!-- Akhir judul  -->

                <!-- Form -->
                <div class="col-md-12">
                  <form action="" method="post" class="form-crud row g-3 " enctype="multipart/form-data">
                    <div class="col-md-12">
                      <label for="id" class="form-label">ID Buku</label>
                      <input type="text" class="form-control" id="id" name="id" />
                    </div>
                    <div class="col-md-12">
                      <label for="judulBuku" class="form-label">Judul Buku</label>
                      <input type="text" class="form-control" id="judulBuku" name="judulBuku" />
                    </div>
                    <div class="col-md-12">
                      <label for="penulis" class="form-label">Nama Penulis</label>
                      <input type="text" class="form-control" id="penulis" name="penulis" />
                    </div>
                    <div class="col-md-6">
                      <p>Status</p>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="sudah" value="sudah"/>
                        <label class="form-check-label" for="sudah"> Sudah Dibaca </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="belum" value="belum"/>
                        <label class="form-check-label" for="belum"> Belum Dibaca </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <p>Apakah ini buku favoritmu?</p>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="favorit" id="ya" value="ya" />
                        <label class="form-check-label" for="ya"> Ya </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="favorit" id="tidak" value="tidak"/>
                        <label class="form-check-label" for="tidak"> Tidak </label>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="formFile" class="form-label">Foto Cover Buku</label>
                      <input class="form-control" type="file" id="formFile" name="foto_buku" />
                    </div>

                    <div class="col-12 mt-5">
                      <button type="submit" name="submit" class="btn btn-biru ">Tambah</button>
                    </div>
                  </form>
                </div>
                <!-- Akhir Form -->
              </div>
            </div>
            <!-- Akhir Bagian Tengah -->

            <!-- Bagian Kanan -->
            <div class="col-md-3 side-kanan">
              

              <!-- Side Bar Bawah Pencarian -->
              <div class="row card-putih mt-4 p-3 fav">
            <img class="rounded-circle mx-auto d-block profil mt-5 mb-4" src="Gambar/FotoProfil/<?= $_SESSION["foto_profil"];?>" alt="Foto Profil" />
            <h5 class="text-center fw-bold"><?= $_SESSION["nama"];?></h5>
            <p class="text-center mb-5"><?= $_SESSION["username"];?></p>
            <!-- Buku Favorit -->
            <h6 class="fw-bold mb-3">Buku Favoritku</h6>
            <!-- Card Per Buku -->
            <?php foreach($topfav as $row) :?>
            <div class="card mb-3" style="max-width: 540px">
              <div class="row g-0">
                <div class="col-md-3 d-flex align-items-center">
                  <img src="Gambar/CoverBuku/<?= $row["foto_buku"];?>" class="img-fluid" alt="buku" />
                </div>
                <div class="col-md-9">
                  <div class="card-body">
                    <p class="card-title fw-bold"><?= $row["judul_buku"];?></p>
                    <p class="card-text"><?= $row["nama_penulis"];?></p>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
            <!-- Akhir Card Per Buku -->
            <!-- Button Lihat Semua -->
            <a href="favorit.php" class="mt-4 mb-4"><div class="button text-center">Lihat Semua</div></a>
            <!-- Akhir Button Lihat Semua -->
            <!-- Akhir Buku Favorit -->
          </div>
              <!-- Akhir Side Bar Bawah Pencarian -->
            </div>
            <!-- Akhir Bagian Kanan -->
          </div>
        </div>

        <!-- JS Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </body>
    </html>
  </body>
</html>
