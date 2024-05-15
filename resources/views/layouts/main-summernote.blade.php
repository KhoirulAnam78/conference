@php
    use App\Models\GlobalSetting;
    $data = GlobalSetting::where('name', 'abbreviation')->first();
    $abbreviation = $data->value ?? 'Conference';
    $data = GlobalSetting::where('name', 'primary_color1')->first();
    $primary_color1 = $data->value ?? '#ee8425';
    $data = GlobalSetting::where('name', 'primary_color2')->first();
    $primary_color2 = $data->value ?? '#f9488b';

@endphp
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="International Conference of the Indonesian Chemical Society
    2023">
    <meta name="keywords" content="icics, icics 2023, icics2023, icics jambi, universitas jambi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $abbreviation }} | {{ $title }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('') }}/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/style.css" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        .primary-btn {
            display: inline-block;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 20px;
            color: #ffffff;
            text-align: center;
            border-radius: 50px;
            background-image: -webkit-gradient(linear,
                    left top,
                    right top,
                    from({{ $primary_color1 }}),
                    to({{ $primary_color2 }})),
                -webkit-gradient(linear, left top, right top, from({{ $primary_color1 }}), to({{ $primary_color2 }}));
            background-image: -o-linear-gradient(left, {{ $primary_color1 }} 0%, {{ $primary_color2 }} 100%),
                -o-linear-gradient(left, {{ $primary_color1 }} 0%, {{ $primary_color2 }} 100%);
            background-image: linear-gradient(to right, {{ $primary_color1 }} 0%, {{ $primary_color2 }} 100%),
                linear-gradient(to right, {{ $primary_color1 }} 0%, {{ $primary_color2 }} 100%);
        }


        .bg-gradient,
        .bd-text .bd-tag-share .s-share a:hover,
        .bh-text .play-btn,
        .schedule-table-tab .nav-tabs .nav-item .nav-link.active,
        .newslatter-inner .ni-form button,
        .latest-item .li-tag,
        .price-item .price-btn:hover,
        .price-item .pi-price,
        .price-item .tr-tag,
        .schedule-tab .nav-tabs .nav-item .nav-link.active,
        .site-btn {
            background-image: -o-linear-gradient(330deg, {{ $primary_color1 }} 0%, {{ $primary_color2 }} 100%),
                -o-linear-gradient(330deg, {{ $primary_color1 }} 0%, {{ $primary_color2 }} 100%);
            background-image: linear-gradient(120deg, {{ $primary_color1 }} 0%, {{ $primary_color2 }} 100%),
                linear-gradient(120deg, {{ $primary_color1 }} 0%, {{ $primary_color2 }} 100%);
        }
    </style>
    @livewireStyles
    @yield('css')
    @stack('css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    {{-- HEADER --}}
    @include('layouts.header')

    @yield('content')
    <!-- Footer Section Begin -->
    @include('layouts.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ url('') }}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ url('') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.countdown.min.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.slicknav.js"></script>
    <script src="{{ url('') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ url('') }}/assets/js/main.js"></script>
    @livewireScripts
    <script>
        window.addEventListener('to-top', (event) => {
            event.preventDefault();
            window.scrollTo(0, 0);
        });
    </script>
    @yield('script')
    @stack('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</body>

</html>
