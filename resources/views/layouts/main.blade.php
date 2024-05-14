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
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
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
    <footer class="footer-section">
        <div class="container">
            <div class="row  justify-content-center">
                <h4 class="text-white mb-3">PUBLISHER</h4>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="mb-3">
                    <a href="https://www.scientific.net/" class="pl-table" style="width:150px">
                        <div class="pl-tablecell">
                            <img src="{{ url('') }}/assets/img/partner-logo/partner-1.png" alt=""
                                style="height: 100px;">
                        </div>
                    </a>
                </div>
            </div>
            <div class="row  justify-content-center">
                <h4 class="text-white mb-3">OTHER PUBLISHER PARTNERS</h4>
            </div>
            <div class="partner-logo owl-carousel">
                <a href="https://jkk.unjani.ac.id/index.php/jkk" class="pl-table" style="width:150px">
                    <div class="pl-tablecell">
                        <img src="{{ url('') }}/assets/img/partner-logo/partner-2.png" alt=""
                            style="height: 100px;">
                    </div>
                </a>
                <a href="https://journal.uinsgd.ac.id/index.php/tadris-kimiya/index" class="pl-table"
                    style="width:150px">
                    <div class="pl-tablecell">
                        <img src="{{ url('') }}/assets/img/partner-logo/partner-3.png" alt=""
                            style="height: 100px;">
                    </div>
                </a>
                <a href="https://jurnal.untirta.ac.id/index.php/EduChemia" class="pl-table" style="width:150px">
                    <div class="pl-tablecell">
                        <img src="{{ url('') }}/assets/img/partner-logo/partner-4.png" alt=""
                            style="height: 100px;">
                    </div>
                </a>
                <a href="https://jurnal.unpad.ac.id/jcena" class="pl-table" style="width:150px">
                    <div class="pl-tablecell">
                        <img src="{{ url('') }}/assets/img/partner-logo/partner-5.png" alt=""
                            style="height: 100px;">
                    </div>
                </a>
                <a href="https://journal.uinsgd.ac.id/index.php/ak/index" class="pl-table" style="width:150px">
                    <div class="pl-tablecell">
                        <img src="{{ url('') }}/assets/img/partner-logo/partner-6.png" alt=""
                            style="height: 100px;">
                    </div>
                </a>
                <a href="https://online-journal.unja.ac.id/jisic" class="pl-table" style="width:150px">
                    <div class="pl-tablecell">
                        <img src="{{ url('') }}/assets/img/partner-logo/partner-7.png" alt=""
                            style="height: 100px;">
                    </div>
                </a>
            </div>

            <div class="row mt-3 justify-content-center">
                <img src="{{ url('') }}/assets/img/hosted.png" alt="hosted.png">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-text">
                        <div class="copyright-text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | ICICS 2023
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        {{-- <div class="ft-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ url('') }}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ url('') }}/assets/js/bootstrap.min.js"></script>
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
