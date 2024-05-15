@php
    use App\Models\Partner;

    $partner = Partner::get();
@endphp
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
            @foreach ($partner as $item)
                <a href="{{ $item->url }}" class="pl-table" style="width:150px">
                    <div class="pl-tablecell">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" alt=""
                            style="height: 100px;">
                    </div>
                </a>
            @endforeach
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
