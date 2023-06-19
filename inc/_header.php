<?php 
ini_set ('display_errors', 0);
session_start();
if(  isset($_SESSION['username']) )
{
  $button_name=  "<a href=''><button type='button'class='btn  btn-secondary'><ion-icon  id='login-btn'  name='person-circle-outline'></ion-icon>". $_SESSION['username']." </button></a>";
  
}else{
  $button_name=  "<a href='./login/login.php'><button class='btn btn-primary'>Sign In / Sign Up</button></a>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WonderTrail Travel Agency</title>

  <!-- 
    - favicon
  -->
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
var currPageView =$(location).attr('pathname'); 
console.log(currPageView);
if(currPageView != '/tourly/book.php')
{
  $(document).ready(function() {
            $.ajax({
                url: 'api/packages.php?l=3',
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

                        <p class="text">pax: ${item.pax}</p>
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
<form method="POST" action="package.php">

<input  class="hide" name="id" value="${item.id}" >
  <button type="submit" class="btn btn-secondary">More</button>
</form>
                

                </div>

              </div>
            </li>
                        `;
                        $('#package-list').append(cardHtml);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
}
       
    </script>

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
      <div class="container">

        <a href="tel:+01123456790" class="helpline-box">

          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <div class="wrapper">
            <p class="helpline-title">For Further Inquires :</p>

            <p class="helpline-number">+01 (123) 4567 90</p>
          </div>

        </a>

        <a href="#" class="logo">
         WonderTrail
        </a>

        <div class="header-btn-group">

       <?php echo $button_name ?>

          <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
          </button>

        </div>

      </div>
    </div>

    <div class="header-bottom">
      <div class="container">

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="./assets/images/logo-blue.svg" alt="Tourly logo">
            </a>

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <ul class="navbar-list">

            <li>
              <a href="#home" class="navbar-link" data-nav-link>home</a>
            </li>

            <li>
              <a href="#" class="navbar-link" data-nav-link>about us</a>
            </li>

            <li>
              <a href="#destination" class="navbar-link" data-nav-link>destination</a>
            </li>

            <li>
              <a href="#package" class="navbar-link" data-nav-link>packages</a>
            </li>

            <li>
              <a href="#gallery" class="navbar-link" data-nav-link>gallery</a>
            </li>

            <li>
              <a href="#contact" class="navbar-link" data-nav-link>contact us</a>
            </li>

          </ul>

        </nav>

        <button class="btn btn-primary">Book Now</button>

      </div>
    </div>

  </header>

