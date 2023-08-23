<x-front.master>
    <x-slot:title>
        Mission Support FZ-LLC
    </x-slot:title>
    {{-- <h2>Mission Support FZ-LLC</h2> --}}


    <section class="hero" id="gallery">
        <div class="container">
            <img src="{{asset('assets/img/maxxpro.png')}}" alt="Logo">
            <h2 class="glow-text-fixed">Mission Support LLC FZ</h2>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2>About Us</h2>
            <div class="about-content">
                <div class="about-image">
                    <img src="{{asset('assets/img/logo.png')}}" alt="Logo" width="200" height="200">
                </div>
                <div class="about-text">
                    <p> <small> At Mission Support LLC FZ, we are the vanguards of precision and reliability in the realm of international trade. With an unyielding dedication to delivering the right parts, at the right place, at the right time, and at the right price, we have become an indomitable force in supplying defence military-grade parts. As a trusted defence supplier in Bangladesh, our mission is simple yet profound: to fortify the nation's defence by sourcing and providing critical components with unparalleled excellence.
                        
                    <br> <b> Unrivalled Position </b> <br>
                        Within the landscape of Bangladesh's defence industry, Mission Support LLC FZ holds an exclusive and unassailable position as the singular defence parts supplier. This distinction is not merely a testament to our commitment to quality and the integrity of our supply chain; it's a testament to the trust we've earned from the Bangladesh Army. In a world where national security hinges on the availability of precise and reliable components, Mission Support LLC FZ stands as a beacon of unwavering assurance.
                        <br> <b> Global Nexus </b> <br>
                        Headquartered in the dynamic heart of Dubai, we strategically position ourselves at the crossroads of international trade. This pivotal location empowers us to forge alliances and source materials from industry giants such as Navister, Pearson Engineering and MACK Defence. Our global presence transcends physical boundaries and underscores our resolute determination to uphold excellence.
                        <br> <b> Our Dedication Unveiled </b> <br>
                        Mission Support isn't just a name; it's a solemn vow to furnish the Bangladesh Army with the highest-calibre defence parts obtainable in the global market. Our devotion to this cause is unshakable. We meticulously scour the world for precision-engineered parts, meticulously scrutinising each component for quality and reliability to ensure we meet and exceed the highest standards.
                            <br> <b>Beyond Procurement </b> <br>
                        Our spectrum of services extends far beyond conventional procurement. We serve as the vital link between the needs of the Bangladesh Army and the world's premier defence parts suppliers. Our profound understanding of the intricacies of defence logistics guarantees that the right components unfailingly reach their intended destinations promptly, every single time.
                        <br> <b>Commitment to Excellence </b> <br>
                        At Mission Support LLC FZ, quality isn't a negotiable aspect; it's a resolute promise. Our stringent quality control protocols leave no margin for error. Every component that passes through our hands undergoes rigorous testing, ensuring that only the finest products are dispatched to safeguard the nation's defence.
                        <br> <b>A Vision of Tomorrow </b> <br>
                        As we peer into the horizon, Mission Support LLC FZ envisions a future where Bangladesh assumes a commanding position in defence capabilities. We're motivated by the conviction that by fortifying our nation's defence infrastructure, we're shaping a brighter and safer future for generations to come.
                        <br>
                        Mission Support LLC FZ isn't just a company; it's an unwavering guardian of Bangladesh's defence interests. We embody precision, reliability, and steadfast commitment. With Dubai as our launchpad, we're poised to ascend to new zeniths and further cement our standing as the foremost defence parts supplier in Bangladesh. Welcome to Mission Support, where the pursuit of excellence knows no bounds.
                    </small> </p>
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
                    <img src="{{asset('assets/img/pearson.jpg')}}" alt="Partner Logo" class="partner-logo">
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
                    <p class="address text-right">
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
                $('html, body').animate({ scrollTop: 0 }, 1000); // Adjust the duration as needed
                return false;
            });
        });
    </script>
    
    {{-- <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#scroll-to-top').fadeIn();
                } else {
                    $('#scroll-to-top').fadeOut();
                }
            });
    
            $('#scroll-to-top').click(function() {
            slowScrollToTop(1000); // Adjust the time as needed
            return false;
        });
        });
        function slowScrollToTop(duration) {
        var scrollStep = -window.scrollY / (duration / 15); // Adjust the division value for speed
        var scrollInterval = setInterval(function() {
            if (window.scrollY !== 0) {
                window.scrollBy(0, scrollStep);
            } else {
                clearInterval(scrollInterval);
            }
        }, 15); // This interval will control the smoothness of scrolling
    }
    </script> --}}
    
    {{-- <script>
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

    //     document.addEventListener("DOMContentLoaded", function() {
    //     var aboutSection = document.getElementById("about");
    //     var aboutImage = document.querySelector(".about-image");

    //     // Check if the user is in the About section
    //     function isInAboutSection() {
    //         var rect = aboutSection.getBoundingClientRect();
    //         return rect.top <= window.innerHeight && rect.bottom >= 0;
    //     }

    //     // Toggle the visibility of the logo based on the user's scroll position
    //     function toggleLogoVisibility() {
    //         if (isInAboutSection()) {
    //             aboutImage.style.display = "block";
    //         } else {
    //             aboutImage.style.display = "none";
    //         }
    //     }

    //     // Listen for scroll events
    //     window.addEventListener("scroll", toggleLogoVisibility);

    //     // Initial check on page load
    //     toggleLogoVisibility();
    // });

    </script> --}}
    @endpush

</x-front.master>