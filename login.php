<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Login Page</title>
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
                    <a class="nav-link text-white" href="#" onclick="register()">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    <script>
        function index() {
            window.location.href = "index.php";
        }
        function register() {
            window.location.href = "register.php";
        }
    </script>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Login</h2>
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="login()">Login</button>
                            <p class="mt-3">Don't have an account? <a id="register-link" href="register.php">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Fungsi login
        function login(){
            // Mendapatkan nilai dari form
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Membuat objek FormData
            const formData = new FormData();
            formData.append('email', email);
            formData.append('pwd', password);

            // Konfigurasi axios
            axios.post('https://tubesgroup4.000webhostapp.com/login/login.php', formData)
                .then(response => {
                    console.log(response);
                    // Handle response dari server
                    if(response.data.status == 'success') {
                        // Jika login berhasil, buka dashboard
                        const sessionToken = response.data.session_token;
                        localStorage.setItem('session_token', sessionToken);
                        window.location.href = 'dashboard.php'; 
                    } else {
                        // Jika login gagal, tampilkan pesan kesalahan
                        alert('Login Failed, Please check your credentials');
                    }
                })
                .catch(error => {
                    // Handle kesalahan koneksi atau server
                    console.log('Error during login:', error);
                });
        }
    </script>
</body>
<?php include 'footer.php'; ?>
</html>
