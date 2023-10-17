 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('admin.dashboard') }}" class="brand-link">
         <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             @php
                 $imagesLink = is_null(Auth::user()->image) || !file_exists('images/' . Auth::user()->image) ? 'https://bootdey.com/img/Content/avatar/avatar7.png' : asset('images/' . Auth::user()->image);
             @endphp
             <div class="image">
                 <img src="{{ $imagesLink }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="{{ route('profile.edit') }}" class="d-block"> {{ Auth::user()->name }}</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview @yield('dashboard_menu_open')">
                     <a href="#" class="nav-link @yield('dashboard_menu_active') ">
                         <i class="nav-icon fas fa-tools"></i>
                         <p>
                             Dashboard
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.dashboard') }}" class="nav-link @yield('dashboard_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Dashboard</p>
                             </a>
                         </li>
                     </ul>
                 </li>



                 <!-- User (patient or admin) -->
                 <li
                     class="nav-item has-treeview @yield('user_create_menu_open') @yield('user_list_menu_open') @yield('admin_create_menu_open') @yield('admin_list_menu_open')">
                     <a href="#"
                         class="nav-link @yield('user_create_menu_active') @yield('user_list_menu_active') @yield('admin_create_menu_active') @yield('admin_list_menu_active')">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             User / Admin
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.users.index') }}" class="nav-link @yield('user_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>User List</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.users.create') }}" class="nav-link @yield('user_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create User</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.admins.index') }}" class="nav-link @yield('admin_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Admin List</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.admins.create') }}" class="nav-link @yield('admin_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create Admin</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- Product -->
                 <li
                     class="nav-item has-treeview @yield('category_create_menu_open') @yield('category_list_menu_open') 
                     @yield('product_create_menu_open') @yield('product_list_menu_open')">
                     <a href="#"
                         class="nav-link @yield('product_create_menu_active') @yield('product_list_menu_active') 
                         @yield('category_create_menu_active') @yield('category_list_menu_active')">
                         <i class="nav-icon fas ion-ios-cart"></i>
                         <p>
                             Product
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.product_categories.index') }}"
                                 class="nav-link @yield('category_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Category lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.product_categories.create') }}"
                                 class="nav-link @yield('category_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create Category</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.products.index') }}" class="nav-link @yield('product_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Product lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.products.create') }}" class="nav-link @yield('product_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create Product</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- Blog -->
                 <li
                     class="nav-item has-treeview @yield('blog_category_create_menu_open') @yield('blog_category_list_menu_open') 
                     @yield('blog_create_menu_open') @yield('blog_list_menu_open')">
                     <a href="#"
                         class="nav-link @yield('blog_create_menu_active') @yield('blog_list_menu_active') 
                         @yield('blog_category_create_menu_active') @yield('blog_category_list_menu_active')">
                         <i class="nav-icon fas fa-blog"></i>
                         <p>
                             Blog
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.blog_categories.index') }}" class="nav-link @yield('blog_category_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Category lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.blog_categories.create') }}" class="nav-link @yield('blog_category_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create Category</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.blogs.index') }}" class="nav-link @yield('blog_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Blog lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.blogs.create') }}" class="nav-link @yield('blog_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create blog</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- Branch -->
                 <li class="nav-item has-treeview @yield('branch_create_menu_open') @yield('branch_list_menu_open')">
                     <a href="#" class="nav-link @yield('branch_create_menu_active') @yield('branch_list_menu_active')">
                         <i class="nav-icon fas ion-ios-location"></i>
                         <p>
                             Branch
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.branchs.index') }}" class="nav-link @yield('branch_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Branch lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.branchs.create') }}" class="nav-link @yield('branch_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create Branch</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- Service -->
                 <li
                     class="nav-item has-treeview @yield('service_category_create_menu_open') @yield('service_category_list_menu_open') 
                  @yield('service_create_menu_open') @yield('service_list_menu_open')">
                     <a href="#"
                         class="nav-link @yield('service_create_menu_active') @yield('service_list_menu_active') 
                      @yield('service_category_create_menu_active') @yield('service_category_list_menu_active')">
                         <i class="nav-icon fas fa-file-medical"></i>
                         <p>
                             Service
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.service_categories.index') }}"
                                 class="nav-link @yield('service_category_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Category lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.service_categories.create') }}"
                                 class="nav-link @yield('service_category_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create Category</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.services.index') }}" class="nav-link @yield('service_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Service lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.services.create') }}" class="nav-link @yield('service_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create Service</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- Doctors -->
                 <li class="nav-item has-treeview @yield('doctor_create_menu_open') @yield('doctor_list_menu_open')">
                     <a href="#" class="nav-link @yield('doctor_create_menu_active') @yield('doctor_list_menu_active')">
                         <i class="nav-icon fas fa-user-md"></i>
                         <p>
                             Doctors
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.doctors.index') }}" class="nav-link @yield('doctor_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Doctor lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.doctors.create') }}" class="nav-link @yield('doctor_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Create Doctor</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- Appointment -->
                 <li class="nav-item has-treeview @yield('booking_create_menu_open') @yield('booking_list_menu_open')">
                     <a href="#" class="nav-link @yield('booking_create_menu_active') @yield('booking_list_menu_active')">
                         <i class="nav-icon fas fa-calendar-week"></i>
                         <p>
                             Appointments
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.bookings.index') }}" class="nav-link @yield('booking_list_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Appointment</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.bookings.create') }}" class="nav-link @yield('booking_create_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Make Appointment</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- Order -->
                 <li class="nav-item has-treeview @yield('order_menu_open') ">
                     <a href="#" class="nav-link @yield('order_menu_active')  ">
                         <i class="nav-icon fas fa-shopping-bag"></i>
                         <p>
                             Order
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.orders') }}" class="nav-link @yield('order_menu_active')">
                                 <i class="fas fa-window-minimize nav-icon"></i>
                                 <p>Order Table</p>
                             </a>
                         </li>

                     </ul>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
