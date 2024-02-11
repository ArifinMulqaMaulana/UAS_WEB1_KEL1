<?php
include('header.php');
include('check_session.php');
?>

<div class="container mt-5">
    <h2 class="mb-4">Add News Form</h2>
    <form id="addNewsForm">
        <div class="form-group">
            <label for="judul">Title:</label>
            <input type="text" class="form-control" maxlength="100" id="judul" name="judul" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Content:</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="url_img">Image:</label>
            <input type="file" class="form-control-file" id="url_image" name="url_image" accept="image/" required>  
        </div>
        <div class="form-group">
            <label for="tanggal">Date:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="addNews()">Add News</button>
    </form>
</div>
<?php include 'footer.php'; ?>  

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
     function addNews(){
        const judul = document.getElementById('judul').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const urlImageInput = document.getElementById('url_image');
        const url_image = urlImageInput.files[0];

        // Get the selected date from the input field
        const tanggalInput = document.getElementById('tanggal');
        const tanggal = tanggalInput.value;

        // Get form data
        var formData = new FormData();
        formData.append('judul', judul);
        formData.append('deskripsi', deskripsi);
        formData.append('url_image', url_image);
        formData.append('tanggal', tanggal);

        // Make post request using Axios
        axios.post('https://tubesgroup4.000webhostapp.com/news/addnews.php', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
        .then(function (response) {
            console.log(response.data);
            console.log(formData);
            alert(response.data);
            document.getElementById('addNewsForm').reset();
        })
        .catch(function (error) {
            console.error(error);
            alert('Error Adding news');
        });
    }
</script>
