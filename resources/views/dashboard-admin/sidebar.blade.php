<div class="col-lg-3">
    <div class="schedule-table-tab">

        <ul class="nav nav-tabs" role="tablist" style="width:100%">
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Global Setting' ? 'active' : '' }}" href="{{ route('dashboard-admin') }}"
                    style="font-size:16px">Global Setting</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Loa and Invoice' ? 'active' : '' }}"
                    href="{{ route('data-loa-invoice') }}" style="font-size:16px">Loa and Invoice</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Front Image Slider' ? 'active' : '' }}"
                    href="{{ route('front-image-slider') }}" style="font-size:16px">Front Image Slider</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Scope' ? 'active' : '' }}" href="{{ route('scope') }}"
                    style="font-size:16px">SCOPE</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Participant Type' ? 'active' : '' }}"
                    href="{{ route('participant-type') }}" style="font-size:16px">Participant Type</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Download' ? 'active' : '' }}" href="{{ route('downloads-file') }}"
                    style="font-size:16px">Download File</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Important Dates' ? 'active' : '' }}"
                    href="{{ route('important-dates') }}" style="font-size:16px">Important Dates</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Rundown' ? 'active' : '' }}" href="{{ route('rundown') }}"
                    style="font-size:16px">Rundown</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Speakers' ? 'active' : '' }}" href="{{ route('speaker') }}"
                    style="font-size:16px">Speakers</a>
            </li>
            <li class="nav-item" style="width:100%;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary"
                        style="width:100%;background-color: transparent !important; border-color: transparent !important;">
                        <a class="nav-link"style="font-size:16px;">Logout </a>
                    </button>
                </form>
            </li>
        </ul><!-- Tab panes -->

    </div>
</div>
