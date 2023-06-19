<!DOCTYPE html>
<html>
<head>
    <title>Add Package</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Package</h1>
        <form id="addPackageForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required>
            </div>
            <div class="form-group">
                <label for="pax">Pax</label>
                <input type="number" class="form-control" id="pax" name="pax" placeholder="Enter pax" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="days">Days</label>
                <input type="number" class="form-control" id="days" name="days" placeholder="Enter number of days" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Package</button>
        </form>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Add Package Form Submission
            $('#addPackageForm').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = new FormData(form[0]);

                $.ajax({
                    type: 'POST',
                    url: 'add.php',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(response); 
                        form[0].reset();
                        
                    }
                });
            });
        });
    </script>
</body>
</html>
