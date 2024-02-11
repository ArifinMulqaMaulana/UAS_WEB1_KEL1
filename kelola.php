    <?php
        include('header.php');
        include('check_session.php');
    ?>

        <div class="container mt-5">
            <h2 class="mb-4">List News</h2>
            <table id="newsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <?php include 'footer.php'; ?>  
        
        <!-- Axios Javascript -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
        var table = null;

        function initTable(initData) {
        table = $('#newsTable').DataTable({
        "data": initData,
        "processing": true,
        "serverSide": false,
        "paging": true, //tambah ini
        "lengthMenu": [10, 25, 50], //tambah ini
        "pageLength": 10, //tambah ini untuk nilai degault
        // "ajax": function(data, callback, settings) {

        // },
        "columns": [{
                "data": "no"
            },
            {
                "data": "title"
            },
            {
                "data": "desc"
            },
            {
                "data": "img",
                "render": function(data, type, row) {
                    return '<img src="' + data + '" alt="Image" style="max-width: 100px; max-height: 100px;">';
                }
            },
            {
                "data": null,
                "render": function(data, type, row, meta) {
                    return '<div class="btn-group">' +
                        "<button class='btn btn-danger btn-sm' style='margin-right: 5px;' data-index='" + meta.row + "' onclick='deleteNews(this)'>Delete</button>" +
                        '<form action="edit.php" method="post">' +
                        '<input type="hidden" name="id" value="' + row.id + '" >' +
                        '<button type="submit" class="btn btn-primary btn-sm">Edit</button>' +
                        '</form>' +
                        '</div>';
                }
            }
        ]
    });
}
$(document).ready(function editnews() {
    axios.get('https://tubesgroup4.000webhostapp.com/news/listnews.php', {
            params: {
                key: ''
            }
        })
        .then(function(response) {
            // Add a new property 'no' to each row
            console.log(response.data);
            var data = response.data;
            data.forEach(function(row, index) {
                row.no = index + 1;
                data[index] = row;
            });

            console.log(data);

            initTable(response.data);

            // Filter the data based on the search value
            // var filteredData = filterData(response.data, data.search.value);

            // // Add a new property 'no' to each row
            // filteredData.forEach(function(row, index) {
            //     row.no = index + 1;
            // });

            // callback({
            //     draw: data.draw,
            //     recordsTotal: response.data.recordsTotal,
            //     recordsFiltered: filteredData.length,
            //     data: response.data
            // });
            // console.log("Total " +response.data.length);
            // console.log("Filter " +recordsFiltered);
        })
        .catch(function(error) {
            console.log('error', error);
            alert('Error Fetching news data');
        });

});

// Function to filter data based on search value
function filterData(data, searchValue) {
    return data.filter(function(row) {
        // Customize the filter logic based on your requirements
        return (
            row.title.toLowerCase().includes(searchValue.toLowerCase()) ||
            row.desc.toLowerCase().includes(searchValue.toLowerCase())
        );
    });
}

            function deleteNews(id) {
                var formData = new FormData();
                formData.append('idnews', id);

                if (confirm('Are you sure you want to delete this news?')) {
                    axios.post('https://tubesgroup4.000webhostapp.com/news/deletenews.php', formData)
                        .then(function (response) {
                            alert(response.data);
                            // Refresh the DataTable after deletion
                            $('#newsTable').DataTable().ajax.reload();
                        })
                        .catch(function (error) {
                            console.error(error);
                            alert('Error delete news');
                        });
                }
            }
        </script>
