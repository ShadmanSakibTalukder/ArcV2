<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>



    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles
<style>

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 230px; /* Adjust the width as needed */
    background-color: #f9f9f9;
    z-index: 1000;
    overflow-y: auto;
    padding-bottom: 60px; /* Add padding for the content at the bottom */
}
.main-content {
    margin-left: 250px; /* Adjust this value to match the sidebar width */
    padding-left: 15px; /* Add some padding to separate main content from sidebar */
}
.main-content {
    min-height: 100vh; /* Set a minimum height to ensure scrolling */
}
/* .content-wrapper {
    margin-left: 250px; /* Adjust this value to match the sidebar width */
    padding-left: 15px; /* Add some padding to separate main content from sidebar */
    padding-top: 15px; /* Add top padding to ensure content isn't hidden under the header */
} */

    </style>
</head>

<body>
    <x-partials.navbar />
    <div class="container-fluid">
        <div class="row">
            <x-partials.sidebar />
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
                {{$slot}}
            </main>
        </div>
    </div>
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