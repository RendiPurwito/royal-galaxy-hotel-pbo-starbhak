<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>
    
    <link rel="stylesheet" href="/voler/dist/assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="/voler/dist/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="/voler/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/voler/dist/assets/css/app.css">
    <link rel="shortcut icon" href="/voler/dist/assets/images/favicon.svg" type="image/x-icon">
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="/voler/dist/assets/images/logo.svg" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            
            
                <li class='sidebar-title'>Main Menu</li>
            
            
            
                <li class="sidebar-item {{ Request::is('admin/dashboard*') ? 'active' : '' }} ">
                    <a href="/admin/dashboard" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>
                    
                </li>

            
            
            
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="triangle" width="20"></i> 
                        <span>Data</span>
                    </a>
                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="/admin/room">Rooms</a>
                        </li>
                        
                        <li>
                            <a href="/admin/room-facility">Room Facility</a>
                        </li>
                        
                        <li>
                            <a href="/admin/public-facility">Public Facility</a>
                        </li>

                        <li>
                            <a href="/admin/booking">Booking</a>
                        </li>
    
                    </ul>
                </li> 
                
                <li class="sidebar-item {{ Request::is('admin/user*') ? 'active' : '' }}">
                    <a href="/admin/user" class='sidebar-link'>
                        <i data-feather="user" width="20"></i> 
                        <span>Register New User</span>
                    </a>
                    
                </li>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="/voler/dist/assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, {{ auth()->user()->username }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{-- <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a> --}}
                                <form action="/logout" method="post" class="form-class">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i data-feather="log-out"></i>Logout</button>
                                </form> 
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            
<div class="main-content container-fluid">
    {{-- <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div> --}}
    <section class="section">
        @yield('content')
    </section>
</div>

            {{-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        <p>2020 &copy; Voler</p>
                    </div>
                    <div class="float-right">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    <script src="/voler/dist/assets/js/feather-icons/feather.min.js"></script>
    <script src="/voler/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/voler/dist/assets/js/app.js"></script>
    
    <script src="/voler/dist/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="/voler/dist/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="/voler/dist/assets/js/pages/dashboard.js"></script>

    <script src="/voler/dist/assets/js/main.js"></script>
</body>
</html>
