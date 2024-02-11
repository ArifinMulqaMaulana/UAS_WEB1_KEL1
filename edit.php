<?php
include('header.php');
include('check_session.php');

// Ambil ID dari $_POST
$id = isset($_POST['id']) ? $_POST['id'] : null;
?>

<div class="container mt-5">
    <h2 class="mb-4">Edit News</h2>
    <form id="editNewsForm">
        <input type="hidden" id="newsId" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="judul">Title:</label>
            <input type="text" class="form-control" maxlength="50" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Content:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="form-group">
            <label for="url_image">Image:</label>
            <input type="file" class="form-control-file" id="url_image" name="url_image" accept="image/*">
        </div>
        <div class="form-group">
            <label for="tanggal">Date:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="editNews()">Edit News</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function getData(){
    const newsId = document.getElementById('newsId').value;
    var formData = new FormData();
    formData.append('idnews', newsId);
    
    //lakukan permintaan AJAX untuk mendapatkan data dari berita berdasarkan ID
    axios.post('https://tubesgroup4.000webhostapp.com/news/selectdata.php', formData)
    .then(function(response){
        //isi nilai input dengan data yang diterima 
        document.getElementById('judul').value = response.data.title;
        document.getElementById('deskripsi').value = response.data.desc;

        // Check if the date is defined before setting it
        if (response.data.date !== undefined) {
            document.getElementById('tanggal').value = response.data.date;
        }
    })
    .catch(function (error) {
        console.error(error);
        alert('Error fetching news data')
    });
}


    function editNews() {
        const newsId = document.getElementById('newsId').value;
        const judul = document.getElementById('judul').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const urlImageInput = document.getElementById('url_image');
        const url_image = urlImageInput.files[0];
        const tanggalInput = document.getElementById('tanggal');
        const tanggal = tanggalInput.value;

        // get form data
        var formData = new FormData();
        formData.append('idnews', newsId);
        formData.append('judul', judul);
        formData.append('deskripsi', deskripsi);
        formData.append('tanggal', tanggal);

        if (urlImageInput.files.length > 0) {
            formData.append('url_image', url_image);
        } else {
            formData.append('url_image', null);
        }

        // lakukan permintaan AJAX untuk mengedit berita
        axios.post('https://tubesgroup4.000webhostapp.com/news/editnews.php', formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        })
        .then(function(response){
            console.log(response.data);
            alert(response.data);
            window.location.href = 'kelola.php';
        })
        .catch(function(error){
            console.error(error);
            alert('Error Editing news');
        });
    }

    window.onload = getData;
</script>
<?php include 'footer.php'; ?>