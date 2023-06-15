<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Package List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Pax</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- The package data will be dynamically added here -->
            </tbody>
        </table>
       <a href="add_.php"> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Add Package</button>
</a>    </div>

    <!-- Edit Package Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editPackageForm">
                        <input type="hidden" id="editPackageId">
                        <div class="form-group">
                            <label for="editName">Name</label>
                            <input type="text" class="form-control" id="editName" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="editTitle">Title</label>
                            <input type="text" class="form-control" id="editTitle" placeholder="Enter title" required>
                        </div>
                        <div class="form-group">
                            <label for="editDescription">Description</label>
                            <textarea class="form-control" id="editDescription" rows="3" placeholder="Enter description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editPax">Pax</label>
                            <input type="number" class="form-control" id="editPax" placeholder="Enter pax" required>
                        </div>
                        <div class="form-group">
                            <label for="editPrice">Price</label>
                            <input type="number" class="form-control" id="editPrice" placeholder="Enter price" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="updateBtn">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fetch packages on page load
            fetchPackages();

            // Function to fetch all packages
            function fetchPackages() {
                $.ajax({
                    type: 'GET',
                    url: 'view.php',
                    success: function(response) {
                        $('#tableBody').html(response);
                    }
                });
            }

            // Add Package Form Submission
            $('#addPackageForm').submit(function(e) {
                e.preventDefault();

                var name = $('#addName').val();
                var title = $('#addTitle').val();
                var description = $('#addDescription').val();
                var pax = $('#addPax').val();
                var price = $('#addPrice').val();

                $.ajax({
                    type: 'POST',
                    url: 'add.php',
                    data: {
                        name: name,
                        title: title,
                        description: description,
                        pax: pax,
                        price: price
                    },
                    success: function(response) {
                        $('#addModal').modal('hide');
                        $('#addPackageForm')[0].reset();
                        fetchPackages();
                    }
                });
            });

            // Edit Package
            $(document).on('click', '.editBtn', function() {
                var packageId = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: 'get_package.php',
                    data: { id: packageId },
                    success: function(response) {
                        var packageData = JSON.parse(response);
                        $('#editPackageId').val(packageData.id);
                        $('#editName').val(packageData.name);
                        $('#editTitle').val(packageData.title);
                        $('#editDescription').val(packageData.description);
                        $('#editPax').val(packageData.pax);
                        $('#editPrice').val(packageData.price);

                        $('#editModal').modal('show');
                    }
                });
            });

            // Update Package
            $('#updateBtn').click(function() {
                var packageId = $('#editPackageId').val();
                var name = $('#editName').val();
                var title = $('#editTitle').val();
                var description = $('#editDescription').val();
                var pax = $('#editPax').val();
                var price = $('#editPrice').val();

                $.ajax({
                    type: 'POST',
                    url: 'edit.php',
                    data: {
                        id: packageId,
                        name: name,
                        title: title,
                        description: description,
                        pax: pax,
                        price: price
                    },
                    success: function(response) {
                        $('#editModal').modal('hide');
                        fetchPackages();
                    }
                });
            });

            // Delete Package
            $(document).on('click', '.deleteBtn', function() {
                var packageId = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: 'delete.php',
                    data: { id: packageId },
                    success: function(response) {
                        fetchPackages();
                    }
                });
            });
        });
    </script>
</body>
</html>
