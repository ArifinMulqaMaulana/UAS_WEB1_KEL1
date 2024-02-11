<?php
include 'header.php';
include 'check_session.php';
?>
<div class="container mt-5">
    <h2>Edit User</h2>

    <form id="editUserForm" enctype="multipart/form-data">
        <input type="text" id="id" name="id" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>"></input>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="pwd" required>
        </div>

        <div class="form-group">
            <label for="profileImage">Profile Image:</label>
            <input type="file" class="form-control-file" id="profileImage" name="profile_image" accept="image/*" required>
        </div>

        <button type="button" class="btn btn-primary" onclick="editUser()">Save Changes</button>
    </form>
</div>
<script>
    function editUser() {
        var formData = new FormData(document.getElementById('editUserForm'));

        // Make an AJAX request to your PHP script
        fetch('https://tubesgroup4.000webhostapp.com/login/edit_users.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                return response.text(); // Handle non-JSON responses
            }
        })
        .then(data => {
            // Handle the response from the server
            if (typeof data === 'string') {
                // Handle non-JSON response
                alert(data);
            } else {
                alert(data.message);

                if (data.status == 'success'){
                    location.reload();
                }

            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
<?php include 'footer.php'; ?>
