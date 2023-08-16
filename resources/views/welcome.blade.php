<x-front.master>
    <x-slot:title>
        Mission Support FZ-LLC
    </x-slot:title>
    {{-- <h2>Mission Support FZ-LLC</h2> --}}


    <section class="hero" id="gallery">
        <div class="container">
            <!-- Image carousel will be added here -->
            <img src="{{asset('assets/img/logo.png')}}" alt="Logo">
            <h2>Mission Support LLC FZ</h2>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2>About Us</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/Shayan_Rasheed_Photo.jpg')}}" alt="CEO Image" class="img-fluid rounded-circle mb-3">
                </div>
                <div class="col-md-6">
                    <p>Mission Support LLC FZ, led by CEO Shayan Rasheed, is a dynamic and experienced company that specializes in providing high-quality engineering solutions and services. With a young workforce, Mission Support has completed challenging Artificial Intelligence-based CCTV Surveillance work in the country. The company supplies various capital machinery from world-leading manufacturers, including diesel and gas generators, turning-key power solutions, and mobile cranes. Mission Support is one of the largest suppliers of diesel generating sets in the region, and has completed installations in conventional energy exceeding 1000 megawatts. The company's core purpose is to improve the vivacity of societies through long-term value creation based on quality and trust.</p>
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
                    <img src="{{asset('assets/img/navistar.jpg')}}" alt="Partner Logo" class="partner-logo">
                </div>
                <div class="col-md-3">
                    <img src="{{asset('assets/img/macDefence.png')}}" alt="Partner Logo" class="partner-logo">
                </div>
                <div class="col-md-3">
                    <img src="{{asset('assets/img/MLR.png')}}" alt="Partner Logo" class="partner-logo">
                </div>
                <div class="col-md-3">
                    <img src="{{asset('assets/img/sunseeker.png')}}" alt="Partner Logo" class="partner-logo">
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
                        <hr>
                        Phone No - +8801711-896299 <br>
                        Email - missionsupportLLC@protonmail.com <br>
                        Email - missionsupport.Procurement@protonmail.com
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

    @push('js')
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
    @endpush

</x-front.master>