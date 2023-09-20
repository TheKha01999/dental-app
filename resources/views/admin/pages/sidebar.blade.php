 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
      with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview ">
                     <a href="#" class="nav-link ">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./index.html" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Dashboard v1</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index2.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Dashboard v2</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index3.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Dashboard v3</p>
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
                             <a href="{{ route('admin.product_categories.index') }}" class="nav-link @yield('category_list_menu_active')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Category lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.product_categories.create') }}"
                                 class="nav-link @yield('category_create_menu_active')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Category</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.products.index') }}" class="nav-link @yield('product_list_menu_active')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Product lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.products.create') }}" class="nav-link @yield('product_create_menu_active')">
                                 <i class="far fa-circle nav-icon"></i>
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
                         <i class="nav-icon fas ion-ios-book"></i>
                         <p>
                             Blog
                             <i class="fas fa-angle-left right"></i>
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.blog_categories.index') }}" class="nav-link @yield('blog_category_list_menu_active')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Category lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.blog_categories.create') }}" class="nav-link @yield('blog_category_create_menu_active')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Category</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.blogs.index') }}" class="nav-link @yield('blog_list_menu_active')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Blog lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.blogs.create') }}" class="nav-link @yield('blog_create_menu_active')">
                                 <i class="far fa-circle nav-icon"></i>
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
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Branch lists</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="{{ route('admin.branchs.create') }}" class="nav-link @yield('branch_create_menu_active')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Branch</p>
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
