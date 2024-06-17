@php
    use App\Models\MenuGroup;
    use App\Models\MenuItem;

    $menu_group = MenuGroup::where('permission_name', 'menu_setting_app')->first();
    $menu_items = MenuItem::where('menu_group_id', $menu_group->id)
        ->orderBy('posision', 'asc')
        ->get();
@endphp

<div class="col-lg-2">
    <div class="schedule-table-tab">

        <ul class="nav nav-tabs" role="tablist" style="width:100%">

            @foreach ($menu_items as $item)
                @can($item->permission_name)
                    <li class="nav-item" style="width:100%">
                        <a class="nav-link {{ request()->routeIs($item->route) ? ' active' : '' }}"
                            href="{{ route($item->route) }}" style="font-size:16px">{{ $item->name }}</a>
                    </li>
                @endcan
            @endforeach
            @if (session()->has('main_user'))
                <li class="nav-item">
                    <form action="{{ route('logoutAs') }}" method="POST">
                        @csrf
                        <input type="hidden" name="main_user" value="{{ session('main_user') }}">
                        <button type="submit" class="btn btn-primary">Logout As
                            {{ auth()->user()->email }}</button>
                    </form>
                </li>
            @endif
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
