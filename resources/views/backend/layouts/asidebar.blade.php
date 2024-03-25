<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Tour<span>Visa</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            {{-- Application data Filter Start --}}
            <li class="nav-item nav-category">Application Data Filter</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="tables">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Data Filter</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.application.report') }}" class="nav-link">Report</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.today') }}" class="nav-link">Today</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.last_week') }}" class="nav-link">Weekly</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.last_month') }}" class="nav-link">Monthly</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.last_year') }}" class="nav-link">Yearly</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li class="nav-item">
                <a href="pages/apps/chat.html" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat</span>
                </a>
            </li> --}}
            {{-- Application data Filter End --}}

            {{-- Application  Start --}}
            <li class="nav-item nav-category">Application</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#Application" role="button" aria-expanded="false"
                    aria-controls="forms">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Application</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Application">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.application.approved') }}" class="nav-link">Approved</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.processing') }}" class="nav-link">Processing</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.paid') }}" class="nav-link">Paid</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.onhold') }}" class="nav-link">On Hold</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.unpaid') }}" class="nav-link">Unpaid</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.rejected') }}" class="nav-link">Rejected</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Refund</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- Application End --}}


            {{-- Tools Start --}}
            <li class="nav-item nav-category">Tools</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#tools" role="button" aria-expanded="false"
                    aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Data Filter</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="tools">
                    <ul class="nav sub-menu">
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.service.create') }}" class="nav-link">Add Service</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.service.index') }}" class="nav-link">All Service</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Tools End --}}

            {{-- Transaction Start --}}
            @if (Auth::user()->role == 'administrator')

            <li class="nav-item nav-category">Transaction</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#transaction" role="button" aria-expanded="false"
                    aria-controls="authPages">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">List</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="transaction">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.transaction.transaction') }}" class="nav-link">Paypal</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            {{-- Transaction End --}}

            {{-- Settings Start --}}
            <li class="nav-item nav-category">Settings</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#setting" role="button" aria-expanded="false"
                    aria-controls="general-pages">
                    <i class="link-icon" data-feather="tool"></i>
                    <span class="link-title">Service</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="setting">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.index') }}" class="nav-link">Basic</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.adminUser') }}" class="nav-link">Admin User List</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link">All User</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.country.index') }}" class="nav-link">Country</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- Settings End --}}


        </ul>
    </div>
</nav>


{{-- <nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                    value="sidebar-light" checked>
                <label class="form-check-label" for="sidebarLight">
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                    value="sidebar-dark">
                <label class="form-check-label" for="sidebarDark">
                    Dark
                </label>
            </div>
        </div>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item active" href="../demo1/dashboard.html">
                <img src="../assets/images/screenshots/light.jpg" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item" href="../demo2/dashboard.html">
                <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
            </a>
        </div>
    </div>
</nav> --}}
<!-- partial -->
