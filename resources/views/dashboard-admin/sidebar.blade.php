<div class="col-lg-3">
    <div class="schedule-table-tab">

        <ul class="nav nav-tabs" role="tablist" style="width:100%">
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Global Setting' ? 'active' : '' }}" href="{{ route('dashboard-admin') }}"
                    style="font-size:16px">Global Setting</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Scope' ? 'active' : '' }}" href="{{ route('scope') }}"
                    style="font-size:16px">SCOPE</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Validation HKI Member' ? 'active' : '' }}"
                    href="/validation-hki-member" style="font-size:16px">Validation HKI member</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Review Abstract' ? 'active' : '' }}" href="/review-abstract"
                    style="font-size:16px">Review Abstract</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Payment Validation' ? 'active' : '' }}" href="/payment-validation"
                    style="font-size:16px">Payment Validation</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Uploaded Paper' ? 'active' : '' }}" href="/uploaded-paper"
                    style="font-size:16px">Uploaded
                    Paper</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Send Email' ? 'active' : '' }}" href="/send-email"
                    style="font-size:16px">Send Email</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Presenter Have Paid' ? 'active' : '' }}" href="/presenter-have-paid"
                    style="font-size:16px">Presenter</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Participant Have Paid' ? 'active' : '' }}"
                    href="/participant-have-paid" style="font-size:16px">Participant</a>
            </li>
            <li class="nav-item" style="width:100%">
                <a class="nav-link {{ $title == 'Change Password' ? 'active' : '' }}" href="/change-password"
                    style="font-size:16px">Change Password</a>
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
