<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
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

    <div class="text-center mt-5">
    <h1>Selamat Datang di Tim Kreatif Kami</h1>
        <h3>Untuk mengakses laporan berita, Anda perlu melakukan login terlebih dahulu.</h3>
    </div>
    <div class="container mt-5">
    <section class="row">

            <div class="col-md-4 mb-4">
                <div id="myCard">
                    <img src="images/member.jpg" class="card-img-top" alt="Arifin ">
                    <div class="card-body">
                        <h2 class="card-title">Arifin Mulqa</h2>
                        <p class="card-text">Mahasiswa</p>
                        <a href="detail.php#Arifin" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div id="myCard">
                    <img src="images/Aku.jpg" class="card-img-top" alt="Febriani">
                    <div class="card-body">
                        <h2 class="card-title">Febriani</h2>
                        <p class="card-text">Mahasiswa</p>
                        <a href="detail.php#Febriani" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div id="myCard">
                    <img src="images/intan.jpg" class="card-img-top" alt="Intan">
                    <div class="card-body">
                        <h2 class="card-title">Intan Aprilia</h2>
                        <p class="card-text">Mahasiswa</p>
                        <a href="detail.php#Intan" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- Tambahkan anggota kelompok lainnya sesuai kebutuhan -->

        </section>
        </div>
    <?php include 'footer.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>