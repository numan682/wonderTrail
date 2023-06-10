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
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${item.name}</h5>
                                    <p class="card-text">${item.description}</p>
                                    <p class="card-text">Price: $${item.price}</p>
                                </div>
                            </div>
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
