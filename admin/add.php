<!DOCTYPE html>
<html>
<head>
  <title>Upload Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2>Upload Form</h2>
  <form id="uploadForm" enctype="multipart/form-data" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" required>
    </div>
    <div class="form-group">
      <label for="title">Title:</label>
      <input name="title" type="text" class="form-control" id="title" placeholder="Enter title" required>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea name="description"  class="form-control" id="description" rows="3" placeholder="Enter description" required></textarea>
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input  name="price" type="number" class="form-control" id="price" placeholder="Enter price" required>
    </div>
    <div class="form-group">
      <label for="pax">Pax:</label>
      <input  name="pax" type="number" class="form-control" id="pax" placeholder="Enter pax" required>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input  name="image" type="file" class="form-control-file" id="image" required>
    </div>
    <div class="form-group">
      <label for="datepicker">Duration:</label>
      <input name="date" type="text" class="form-control" id="datepicker" required>
    </div>
    <div class="form-group">
      <label for="location">Location:</label>
      <input  name="location" type="text" class="form-control" id="location" placeholder="Enter location" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#uploadForm').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: '../api/post.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response){
        // Handle success response here
        console.log(response);
        console.log(formData);
      },
      error: function(xhr, status, error){
        // Handle error response here
        console.log(xhr.responseText);
      }
    });
  });
});
</script>

</body>
</html>
