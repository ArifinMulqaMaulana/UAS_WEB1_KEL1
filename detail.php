<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Detail Informasi</title>
    <link rel="shortcut icon" href="images/4.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-dark">
        <!-- Add a div for the logo -->
        <div class="navbar-brand">
            <!-- Add your logo image with a proper path -->
            <img src="images/4.png" alt="Logo" height="30" class="mr-2">
            <a href="#" class="text-white" onclick="index()">Kelompok 4</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggle-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="login()">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <script>
        function index() {
            window.location.href = "index.php";
        }
        function login() {
            window.location.href = "login.php";
        }
    </script>
     <div class="container mt-5">

<div class="text-center">
    <h1>Detail Informasi Anggota</h1>
</div>
<br>
<br>

<section id="Arifin" class="row mb-5 custom-section" >
    <div class="col-md-4">
        <img src="images/member.jpg" class="img-fluid" alt="Arifin">
    </div>
    <div class="col-md-8 mt-5">
        <h2>Nama : Arifin Mulqa Maulana</h2>
        <p>Status&emsp;&emsp;: Mahasiswa</p>
        <p>NIM&emsp;&emsp;&emsp;: 2155201142</p>
        <p>Kelas&emsp;&emsp; : TIFRP21PB</p>
        <p>Merupakan Mahasiswa Jurusan Teknik Informatika dari Sekolah Tinggi Teknologi Bandung yang sedang mengampuh S1 </p>
    </div>
</section>

<section id="Febriani" class="row mb-5 custom-section">
    <div class="col-md-4">
        <img src="images/Aku.jpg" class="img-fluid" alt="Febriani">
    </div>
    <div class="col-md-8 mt-5">
        <h2>Nama : Febriani</h2>
        <p>Status&emsp;&emsp;: Mahasiswa</p>
        <p>NIM&emsp;&emsp;&emsp;: 21552011244</p>
        <p>Kelas&emsp;&emsp; : TIFRP21PB</p>
        <p>Merupakan Mahasiswa Jurusan Teknik Informatika dari Sekolah Tinggi Teknologi Bandung yang sedang mengampuh S1 </p>

        </div>
</section>

<section id="Intan" class="row mb-5 custom-section">
    <div class="col-md-4">
        <img src="images/intan.jpg" class="img-fluid" alt="Intan">
    </div>
    <div class="col-md-8 mt-5">
        <h2>Nama : Intan Aprilia</h2>
        <p>Status&emsp;&emsp;: Mahasiswa</p>
        <p>NIM&emsp;&emsp;&emsp;: 21552011218</p>
        <p>Kelas&emsp;&emsp; : TIFRP21PB</p>
        <p>Merupakan Mahasiswa Jurusan Teknik Informatika dari Sekolah Tinggi Teknologi Bandung yang sedang mengampuh S1 </p>
    </div>
</section>

</div>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>