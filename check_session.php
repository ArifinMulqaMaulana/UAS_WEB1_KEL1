        <!-- Axios Javascript -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- DataTables Javascript -->
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>



        <script>
                //fungsi untuk memeriksa session
                function checkSession() {
                    //ambil session_token dari localStorage
                    //membuat objek formData
                    const formData = new FormData();
                    formData.append('session_token', localStorage.getItem('session_token'));

                    //kirim session_token ke server untuk memeriksa 
                    axios.post('https://tubesgroup4.000webhostapp.com/login/session.php', formData)
                        .then(response => {
                            console.log(response);
                            if (response.data.status == 'success') {
                                //jika session masih aktif, arahkan kehalaman dashboard.php
                                
                                const id = response.data.id;
                                const nama = response.data.name || 'Default Name';
                                const profileImage = response.data.profile_image || 'default_profile_image.jpg';

                                localStorage.setItem('id', id);
                                localStorage.setItem('nama', nama);
                                document.getElementById('profileImage').src = 'https://tubesgroup4.000webhostapp.com/login/' + profileImage;
                                document.getElementById('navbarDropdown').innerText = nama;
                                

                            }else{
                                //Jika session tidak aktif, lakukan yang sesuai 
                                window.location.href = 'login.php';
                            }
                        })
                        .catch(error => {
                            console.error('error checking session', error);
                        });
                    }
                
                    //panggil fungsi checksession saat halaman dimuat
                    checkSession();
            </script>