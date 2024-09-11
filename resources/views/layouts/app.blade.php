<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sekawan Media Tech Test</title>

    <!-- Core css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app">
        <div class="layout">
            @include('layouts.header')
            @include('layouts.navbar')
        </div>

        <div class="page-container">
            @yield('content')

            <footer class="footer">
                <div class="footer-content flex justify-content-center">
                    <p class="m-b-0">Copyright © <span id="year"></span> Lutfi Sobri</p>
                    <script>
                        document.getElementById("year").textContent = new Date().getFullYear();
                      </script>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>

</html>
