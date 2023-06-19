<?php 
ini_set ('display_errors', 0);
session_start();
$username=$_SESSION['username'];
$location=$_POST['location'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Package Search</title>
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/svg+xml">

<!-- 
  - custom css link
-->
<link rel="stylesheet" href="./assets/css/style.css">

<!-- 
  - google font link
-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
  rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Package Search</h1>
        <input type="text" id="searchInput" class="form-control" placeholder="Search" value="<?php echo $location ?>">
        <ul id="packageList" class="list-unstyled"></ul>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Live Search
            $('#searchInput').keyup(function() {
                var searchValue = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: './api/search.php',
                    data: { search: searchValue },
                    dataType: 'json',
                    success: function(response) {
                        // Generate the HTML for the search results
                        var html = '';
                        $.each(response, function(index, package) {
                            html += '<br><li>';
                            html += '  <div class="package-card">';
                            html += '    <figure class="card-banner">';
                            html += '      <img src="./assets/images/' + package.image + '" alt="' + package.title + '" loading="lazy">';
                            html += '    </figure>';
                            html += '    <div class="card-content">';
                            html += '      <h3 class="h3 card-title">' + package.title + '</h3>';
                            html += '      <p class="card-text">' + package.description + '</p>';
                            html += '      <ul class="card-meta-list">';
                            html += '        <li class="card-meta-item">';
                            html += '          <div class="meta-box">';
                            html += '            <ion-icon name="time" role="img" class="md hydrated" aria-label="time"></ion-icon>';
                            html += '            <p class="text">' + package.time + '</p>';
                            html += '          </div>';
                            html += '        </li>';
                            html += '        <li class="card-meta-item">';
                            html += '          <div class="meta-box">';
                            html += '            <ion-icon name="people" role="img" class="md hydrated" aria-label="people"></ion-icon>';
                            html += '            <p class="text">pax: ' + package.pax + '</p>';
                            html += '          </div>';
                            html += '        </li>';
                            html += '        <li class="card-meta-item">';
                            html += '          <div class="meta-box">';
                            html += '            <ion-icon name="location" role="img" class="md hydrated" aria-label="location"></ion-icon>';
                            html += '            <p class="text">' + package.location + '</p>';
                            html += '          </div>';
                            html += '        </li>';
                            html += '      </ul>';
                            html += '    </div>';
                            html += '    <div class="card-price">';
                            html += '      <div class="wrapper">';
                            html += '        <p class="reviews">(25 reviews)</p>';
                            html += '        <div class="card-rating">';
                            html += '          <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>';
                            html += '          <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>';
                            html += '          <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>';
                            html += '          <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>';
                            html += '          <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>';
                            html += '        </div>';
                            html += '      </div>';
                            html += '      <p class="price">$' + package.price + '<span>/ per person</span></p>';
                            html += '      <form method="POST" action="package.php">';
                            html += '        <input class="hide" name="id" value="' + package.id + '">';
                            html += '        <button type="submit" class="btn btn-secondary">More</button>';
                            html += '      </form>';
                            html += '    </div>';
                            html += '  </div>';
                            html += '</li>';
                        });

                        // Update the package list with the generated HTML
                        $('#packageList').html(html);
                    }
                });
            });
        });
    </script>
</body>
</html>
