<x-front.master>
    <x-slot:title>
        Mission Support FZ-LLC
    </x-slot:title>
    {{-- <h2>Mission Support FZ-LLC</h2> --}}


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
                $('html, body').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });
    </script>
    </body>

    </html>

</x-front.master>