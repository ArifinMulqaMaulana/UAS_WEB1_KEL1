<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/4.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <!-- DataTablesCSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <!-- XLSX Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

    <!-- pdfMake Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
     <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <!-- DataTables Javascript -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
    <title>Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-dark">
        <div class="navbar-brand">
            <!-- Add your logo image with a proper path -->
            <img src="images/4.png" alt="Logo" height="30" class="mr-2">
            <a href="#" class="text-white" onclick="dashboard()">Kelompok 4</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label=Toggle navigation>
            <span class="navbar-toggle-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="dashboard()">Live Report News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="tambahdata()">Add News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="keloladata()">Data Manage</a>
                </li>
                <!-- Add a dropdown menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" onclick="edituser()">Edit User</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="logout()">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- Profile Image -->
                    <img id="profileImage" src="#" alt="Profile Image" style="width: 40px; height: 40px; border-radius: 50%; margin-left: 10px;">
                </li>
            </ul>
        </div>
    </nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function dashboard() {
            window.location.href = "dashboard.php";
        }

        function tambahdata() {
            window.location.href = "tambah.php";
        }

        function keloladata() {
            window.location.href = "kelola.php";
        }

        function edituser() {
            window.location.href = "edituser.php";
        }

        function logout() {
            // Mendapatkan session_token dari tempat penyimpanan yang sesuai
            const sessionToken = localStorage.getItem('session_token');
            // Hapus "nama" dari local storage saat logout
            localStorage.removeItem('nama');
            // Membuat objek FormData
            const formData = new FormData();
            formData.append('session_token', sessionToken);

            // Konfigurasi Axios untuk logout
            axios.post('https://tubesgroup4.000webhostapp.com/login/logout.php', formData)
                .then(response => {
                    // Handle response dari server
                    if (response.data.status == 'success') {
                        // Jika logout berhasil, arahkan kembali ke halaman login
                        localStorage.removeItem('nama');
                        localStorage.removeItem('session_token');
                        window.location.href = "login.php";
                    } else {
                        // Jika logout gagal, tampilkan pesan kesalahan
                        alert('Logout failed, Please try again.');
                    }
                })
                .catch(error => {
                    // Handle kesalahan koneksi atau server
                    console.error('Error during logout', error);
                });
        }
    </script>
</body>

</html>