@php
    use App\Models\GlobalSetting;
    use App\Models\SatelliteEvents;
    use App\Models\DownloadFilePath;
    use App\Models\InformationPages;
    use App\Models\PreviouslyEvent;

    $logo = GlobalSetting::where('name', 'logo')->first();
    $satellite_events = SatelliteEvents::get();
    $information_pages = InformationPages::get();
    $downloads = DownloadFilePath::get();
    $previouslyEvent = PreviouslyEvent::orderBy('name')->get();

@endphp

<header class="header-section">
    <div class="container-fluid" style="position:fixed !important; top:0px; z-index: 1000; background-color:white">
        <div class="logo" style="">
            <a href="/">
                {{-- <img src="{{ url('') }}/assets/img/logo-fix.png" width="120px" alt="logo.png" class="logo-icics">
                <img src="{{ url('') }}/assets/img/Logo-HKI.png" width="120px" alt="logo.png"
                    class="logo-hki pb-3">
                <img src="{{ url('') }}/assets/img/unja-3d.jpeg" width="60px" class="logo-unja" alt="logo.png"> --}}
                <img src="{{ $logo->value ? asset('storage/' . $logo->value) : '' }}" width="200px" height="50px"
                    alt="">
            </a>
        </div>
        <div class="nav-menu">
            <nav class="mainmenu mobile-menu">
                <ul>
                    <li class="{{ $title == 'Home' ? 'active' : '' }}"><a href="/">Home</a></li>
                    <li
                        class="{{ ($title == 'Registration Fee' or $title == 'Scientific Committee' or $title == 'Steering Committee' or $title == 'Organizing Committee' or $title == 'About' or $title == 'Contact') ? 'active' : '' }}">
                        <a href="#">Information</a>
                        <ul class="dropdown" style="width:300px">
                            <li><a href="/registration-fee">Registration fee</a></li>
                            @foreach ($information_pages as $p)
                                <li><a
                                        href="{{ route('home.information-pages', ['slug' => $p->slug]) }}">{{ $p->name }}</a>
                                </li>
                            @endforeach
                            {{-- <li><a href="/scientific-committe">Scientific Committee</a></li>
                            <li><a href="/steering-committe">Steering Committee</a></li>
                            <li><a href="/organizing-committe">Organizing Committee</a></li>
                            <li><a href="/about-conference">About Conference</a></li> --}}
                            <li><a href="/contact">Contacts</a></li>
                        </ul>
                    </li>
                    </li>
                    {{-- <li class="{{ $title == 'Presentations' ? 'active' : '' }}"><a
                            href="./about-us.html">Presentations</a></li> --}}
                    <li class="{{ $title == 'Rundown ICICS 2023' ? 'active' : '' }}"><a
                            href="{{ route('home.rundown') }}">Rundown</a></li>

                    <li
                        class="{{ ($title == 'FGD MBKM' or $title == 'FGD Akreditasi Internasional' or $title == 'Kongres HKI' or $title == 'Forum Ketua Jurusan Kimia' or $title == 'Field Trip') ? 'active' : '' }}">
                        <a href="#">Satellite
                            Event</a>
                        <ul class="dropdown" style="width:300px">
                            @foreach ($satellite_events as $i)
                                <li><a
                                        href="{{ route('home.satellite-events', ['slug' => $i->slug]) }}">{{ $i->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="#">Download</a>
                        <ul class="dropdown" style="width:300px">
                            @foreach ($downloads as $d)
                                <li><a href="{{ asset('storage/' . $d->path_file) }}"
                                        target="_blank">{{ $d->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    </li>
                    <li class="{{ $title == 'Previously' ? 'active' : '' }}"><a href="#">Previously</a>
                        <ul class="dropdown" style="width:300px">
                            @foreach ($previouslyEvent as $item)
                                <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @if (Auth::user())
                        <a href="/dashboard" class="primary-btn mx-2  my-2">{{ Auth::user()->email }}</a>
                    @else
                        <a href="/login" class="primary-btn my-2 mx-2">Login</a>
                        <a href="/register" class="primary-btn mx-2 my-2">Registration</a>
                    @endif

                </ul>
            </nav>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->
