<x-front.master>
    <x-slot:title>
        Mission Support FZ-LLC
    </x-slot:title>
    {{-- <h2>Mission Support FZ-LLC</h2> --}}

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>ARC Trading - Engineering Solutions</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <!-- Custom CSS -->
      <style>
        /* Add custom styles here */
        body {
          font-family: Arial, sans-serif;
          background-color: #f5f5f5;
          position: relative;
        }
        .navbar {
          background-color: rgba(0, 0, 0, 0.7);
          transition: background-color 0.3s ease-in-out;
        }
        .navbar-brand {
          color: #fff;
          font-size: 24px;
          font-weight: bold;
          padding-right: 20px;
        }
        .navbar-toggler {
          border-color: #fff;
        }
        .navbar-toggler-icon {
          background-color: #fff;
        }
        .navbar-nav .nav-item .nav-link {
          color: #fff;
        }
        .navbar-nav .nav-item .nav-link:hover {
          color: #ffc107;
        }
        .hero {
          background: url("path-to-hero-image.jpg") no-repeat center center;
          background-size: cover;
          height: 500px;
          display: flex;
          align-items: center;
          justify-content: center;
          color: #fff;
          text-align: center;
        }
        .hero h1 {
          font-size: 48px;
          margin-bottom: 20px;
        }
        .hero p {
          font-size: 24px;
          max-width: 600px;
          margin: 0 auto;
        }
        .about {
          padding: 100px 0;
          background-color: #fff;
        }
        .about h2 {
          font-size: 36px;
          font-weight: bold;
          text-align: center;
          margin-bottom: 50px;
        }
        .about p {
          font-size: 20px;
          max-width: 800px;
          margin: 0 auto;
        }
        .ceo {
          padding: 100px 0;
          background-color: #333;
          color: #fff;
          text-align: center;
        }
        .ceo img {
          width: 200px;
          height: 200px;
          border-radius: 50%;
          margin-bottom: 30px;
        }
        .ceo h2 {
          font-size: 36px;
          font-weight: bold;
          margin-bottom: 20px;
        }
        .ceo p {
          font-size: 18px;
          max-width: 600px;
          margin: 0 auto;
        }
        .partners {
          padding: 100px 0;
          background-color: #f9f9f9;
          text-align: center;
        }
        .partners h2 {
          font-size: 36px;
          font-weight: bold;
          margin-bottom: 50px;
        }
        .partners .partner-logo {
          width: 80px;
          height: auto;
          margin: 10px;
          transition: transform 0.3s ease-in-out;
        }
        .partners .partner-logo:hover {
          transform: scale(1.1);
        }
        .contact {
          padding: 100px 0;
          background-color: #333;
          color: #fff;
          text-align: center;
        }
        .contact h2 {
          font-size: 36px;
          font-weight: bold;
          margin-bottom: 30px;
        }
        .contact .contact-icons {
          font-size: 36px;
          margin: 10px;
        }
        .contact .address {
          font-size: 20px;
        }
        .footer {
          background-color: #222;
          color: #fff;
          padding: 20px 0;
          text-align: center;
        }
        /* Scroll to top button */
        #scroll-to-top {
          display: none;
          position: fixed;
          bottom: 20px;
          right: 20px;
          /* background-color: rgba(255, 255, 255, 0.8); */
          border: none;
          color: #333;
          padding: 10px 15px;
          border-radius: 50%;
          cursor: pointer;
          background-color: transparent;
          box-shadow: none;
      z-index: 1000;
        }
    
        /* Responsive styles */
        @media (max-width: 768px) {
          .hero h1 {
            font-size: 36px;
          }
          .hero p {
            font-size: 18px;
          }
          .navbar {
            background-color: rgba(0, 0, 0, 0.9);
          }
        }
      </style>
    </head>
    <body>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="path-to-logo.png" alt="Logo" width="50" height="50">
            ARC Trading
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#partners">Our Partners</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                </a>
                <div class="dropdown-menu" aria-labelledby="accountDropdown">
                  <a class="dropdown-item" href="#login">Login</a>
                  <a class="dropdown-item" href="#register">Register</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
      <!-- Hero Section -->
      <section class="hero" id="gallery">
        <div class="container">
          <!-- Image carousel will be added here -->
          <h1>Your ERP Solution</h1>
          <p>Streamline your business operations with our cutting-edge ERP system.</p>
        </div>
      </section>
    
      <!-- About Section -->
      <section id="about" class="about">
        <div class="container">
          <h2>About Us</h2>
          <div class="row">
            <div class="col-md-6">
              <img src="path-to-ceo-image.jpg" alt="CEO Image" class="img-fluid rounded-circle mb-3">
            </div>
            <div class="col-md-6">
              <p>ARC Trading, led by CEO Shayan Rasheed, is a dynamic and experienced company that specializes in providing high-quality engineering solutions and services. With a young workforce, ARC has completed challenging Artificial Intelligence-based CCTV Surveillance work in the country. The company supplies various capital machinery from world-leading manufacturers, including diesel and gas generators, turning-key power solutions, and mobile cranes. ARC Trading is one of the largest suppliers of diesel generating sets in the region, and has completed installations in conventional energy exceeding 1000 megawatts. The company's core purpose is to improve the vivacity of societies through long-term value creation based on quality and trust.</p>
            </div>
          </div>
        </div>
      </section>
    
      <!-- Partners Section -->
      <section id="partners" class="partners">
        <div class="container">
          <h2>Our Partners</h2>
          <div class="row">
            <div class="col-md-3">
              <img src="path-to-partner-logo-1.png" alt="Partner Logo" class="partner-logo">
            </div>
            <div class="col-md-3">
              <img src="path-to-partner-logo-2.png" alt="Partner Logo" class="partner-logo">
            </div>
            <div class="col-md-3">
              <img src="path-to-partner-logo-3.png" alt="Partner Logo" class="partner-logo">
            </div>
            <div class="col-md-3">
              <img src="path-to-partner-logo-4.png" alt="Partner Logo" class="partner-logo">
            </div>
          </div>
        </div>
      </section>
    
      <!-- Contact Section -->
      <section class="contact" id="contact">
        <div class="container">
          <h2>Contact Us</h2>
          <div class="row">
            <div class="col-md-6">
              <div class="contact-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fas fa-envelope"></i></a>
              </div>
            </div>
            <div class="col-md-6">
              <p class="address">
                House-51, Road - 4, Sector - 3, Uttara, Dhaka - 1230
              </p>
            </div>
          </div>
        </div>
      </section>
    
      <!-- Footer Section -->
      <footer class="footer">
        <div class="container">
          <p>&copy; 2023 Mission Support. All rights reserved.</p>
        </div>
      </footer>
    
      <!-- Scroll-to-top button -->
      <button id="scroll-to-top">
        <i class="fas fa-arrow-up"></i>
      </button>
    
      <!-- Font Awesome -->
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <!-- jQuery and Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- Scroll to top script -->
      <script>
        $(document).ready(function() {
          $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
              $('#scroll-to-top').fadeIn();
            } else {
              $('#scroll-to-top').fadeOut();
            }
          });
    
          $('#scroll-to-top').click(function() {
            $('html, body').animate({scrollTop : 0}, 800);
            return false;
          });
        });
      </script>
    </body>
    </html>
    
</x-front.master>