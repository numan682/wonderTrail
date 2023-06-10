<!DOCTYPE html>
<html>
<head>
    <title>Fetch Data Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../api/packages.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var data = response; // Store the response in a variable

                    // Loop through the data and create HTML boxes
                    for (var i = 0; i < data.length; i++) {
                        var item = data[i];
                        var cardHtml = `
                        <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="./assets/images/${item.image}" alt="Experience The Great Holiday On Beach" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">${item.name}</h3>

                  <p class="card-text">
                  ${item.description}
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">${item.time}</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">${item.location}</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(25 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $${item.price}
                    <span>/ per person</span>
                  </p>

                  <button class="btn btn-secondary">Book Now</button>

                </div>

              </div>
            </li>
                        `;
                        $('#data-container').append(cardHtml);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
    </script>
</head>
<body>
    <h1>Fetch Data Example</h1>

    <div id="data-container"></div>
    
    <!-- Your HTML content goes here -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
