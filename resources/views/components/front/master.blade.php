<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/front.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>{{$title}}</title>

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
    <x-front.partials.navbar />
    {{$slot}}

    <script src="{{asset('assets/js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    @livewireScripts
    @stack('js')
</body>

</html>