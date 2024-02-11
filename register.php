<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Register Page</title>
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="images/4.png" />
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
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Register</h2>
                        <form id="registerForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="profileImage">Profile Image:</label>
                                <input type="file" class="form-control-file" id="profileImage" name="profile_image" accept="image/*">
                            </div>
                            <button type="button" class="btn btn-primary" onclick="register()">Register</button>
                            <p class="mt-3">Already have an account? <a id="login-link" href="login.php">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>  
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Fungsi register
        function register(){
            // Mendapatkan nilai dari form
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const profileImage = document.getElementById('profileImage').files[0];

            // Memeriksa apakah password dan konfirmasi password sama
            if (password !== confirmPassword) {
                alert('Password and Confirm Password do not match');
                return;
            }

            // Membuat objek FormData
            const formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('pwd', password);
            formData.append('profile_image', profileImage);

            // Konfigurasi Axios
            axios.post('https://tubesgroup4.000webhostapp.com/login/register.php', formData)
                .then(response => {
                    console.log(response);
                    // Handle response dari server
                    if(response.data.status == 'success') {
                        // Jika registrasi berhasil, arahkan ke halaman login
                        alert('Registration Successful. Please login.');
                        window.location.href = 'login.php'; 
                    } else {
                        // Jika registrasi gagal, tampilkan pesan kesalahan
                        alert('Registration Failed. Please try again.');
                    }
                })
                .catch(error => {
                    // Handle kesalahan koneksi atau server
                    console.log('Error during registration:', error);
                });
        }
    </script>
</body>
</html>
