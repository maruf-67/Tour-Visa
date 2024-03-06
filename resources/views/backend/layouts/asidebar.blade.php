 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="mb-3 d-flex">
             {{-- <div class="image">
                 <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div> --}}
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>


                 {{-- Application data Filter --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                         <p>
                             Application Data Filter
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Todays Applications</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Weekly Applications</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Monthly Applications</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Yearly Applications</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 {{-- Application start here --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tree"></i>
                         <p>
                             Application
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/UI/general.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Approved Application</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/UI/icons.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Processing Application</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/UI/buttons.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Paid Application</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/UI/sliders.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>On Hold Application</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/UI/modals.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Unpaid Application</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/UI/navbar.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Rejected Application</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/UI/timeline.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Refund</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- Application End Here --}}


                 {{--  tools Start --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-edit"></i>
                         <p>
                             Tools
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.service.create') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Service Type</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.service.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>View All Service type</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{--  tools end --}}

                 {{-- Transaction --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-table"></i>
                         <p>
                             Transaction
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Paypal</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 {{-- Settings --}}
                 <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Basic Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.edit',auth()->user()->id) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.adminUser') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin User List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.country.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Country for Visa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Settings End  --}}


             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
