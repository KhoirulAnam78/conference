<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="International Conference of the Indonesian Chemical Society
    2023">
    <meta name="keywords" content="icics, icics 2023, icics2023, icics jambi, universitas jambi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICICS 2023 | {{ $title }}</title>

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
    @livewireStyles
    @yield('css')
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
</body>

</html>
