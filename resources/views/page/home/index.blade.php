<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        *{
            /* border: 1px solid; */
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="hero mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
            <div class="container-fluid d-flex">
                <a class="navbar-brand" href="#">
                    <img src="/image/logo.jpeg" alt="" width="50" height="50" class="d-inline-block align-text-center">
                    Royal Galaxy
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="nav-link active text-secondary" aria-current="page" href="/">Home</a>
                    <a class="nav-link text-secondary" href="/rooms">Rooms</a>
                    <a class="nav-link text-secondary" href="/facilities">Facilities</a>
                    @auth
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-none d-md-block d-lg-inline-block">Hi, {{ auth()->user()->username }}
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{-- <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a> --}}
                                <form action="/logout" method="post" class="form-class">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i
                                            data-feather="log-out"></i>Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                    @else
                    <a href="/login" type="button" class="btn btn-dark ms-auto px-4 btn-sm me-2">Login</a>
                    @endauth
                </div>
            </div>
        </nav>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            
            <div class="carousel-inner" style="height:100vh">
                <div class="carousel-item active">
                    <img src="/image/1.jpg" class="d-block w-100 img" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/image/2.jpg" class="d-block w-100 img" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/image/receptionists-5975962_1920.jpg" class="d-block w-100 img" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    @auth
    <div class="container bg-white shadow rounded p-3 mb-5 py-4" style="margin-top:-87px; z-index:5; position:relative">
        <form action="/booking" method="POST" class="text-center">
            @csrf
            <div class="row">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="col-2">
                    {{-- <label for="room_id" class="form-label">Room Type</label> --}}
                    <select class="form-select" name="room_id" id="room_id">
                        <option disabled selected hidden>Room Type</option>
                        @foreach ($room as $row)
                            <option value="{{ $row->id }}">{{ $row->room_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    {{-- <label for="qty" class="form-label">Qty</label> --}}
                    <select class="form-select" name="qty" id="qty">
                        <option disabled selected hidden>Qty</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="col-3">
                    {{-- <label for="check_in" class="form-label">Check In</label> --}}
                    <input type="text" class="form-control" id="check_in" name="check_in" autocomplete="off" placeholder="Check In" onfocus="(this.type='date')">
                </div>
                <div class="col-3">
                    {{-- <label for="check_out" class="form-label">Check Out</label> --}}
                    <input type="text" class="form-control" id="check_out" name="check_out" autocomplete="off" placeholder="Check Out" onfocus="(this.type='date')">
                </div>
                {{-- <div class="col-2">
                    <label for="total_payment" class="form-label">Total Payment</label>
                    <input type="text" class="form-control" id="total_payment" name="total_payment" autocomplete="off">
                </div> --}}
                <div class="col-2 d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark px-4">Book Now</button>
                </div>
            </div>
        </form>
    </div> 
    @endauth

    <div class="about-us container d-flex mb-5 justify-content-center">
        <div class="hotel-desc  text-center">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores nobis magnam nesciunt corporis provident qui pariatur fuga ducimus, ipsum tempore vitae error, minima, fugit iste ipsam dolorum assumenda rerum. Deleniti voluptatum iure doloribus dolorem aperiam. Explicabo dolores corporis ullam consectetur, mollitia quisquam cum modi similique iusto nisi aut optio, molestias neque eaque non? Numquam, dignissimos? Ratione itaque nam harum magnam animi officia porro, sunt ex.</p>
           
        </div>
    </div>

    <div class="container mb-5">
        <h2 class="text-center mb-4">Rooms</h2>
        <div class="row">
            <div class="col-md-6">
                <img src="/image/superior.jpg" class="shadow img-fluid" >
            </div>
            <div class="col-md-6">
                <img src="/image/deluxe.jpg" class=" shadow img-fluid" >
            </div> 
        </div>
    </div>

    <div class="facilities container mb-5 mt-5">
        <h2 class="text-center mb-4">Facility</h2>
        <div class="f-body d-flex justify-content-evenly">
            <div class="card" style="width: 23rem;">
                <img src="/image/cafe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
            <div class="card" style="width: 23rem;">
                <img src="/image/library.jpg" class="card-img-top" alt="..." style="height: 15.3rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
            <div class="card" style="width: 23rem;">
                <img src="/image/swimming-pool.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center ">
                <div class="card" style="width: 20rem;">
                    <img src="/image/cafe.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center ">
                    <div class="card" style="width: 20rem;">
                        <img src="/image/library.jpg" class="card-img-top" alt="..." style="height: 13rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center ">
                    <div class="card" style="width: 20rem;">
                        <img src="/image/swimming-pool.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- GMaps --}}
    <div class="location container mb-5 text-center">
        <h2 class="mb-4">Location</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2034969634324!2d106.82652621406348!3d-6.23688679548534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e7f183d3fd%3A0xf2f89088c7d7440c!2sJl.%20Gatot%20Subroto%20No.Kav%2018%2C%20RT.9%2FRW.4%2C%20Kuningan%20Tim.%2C%20Kecamatan%20Setiabudi%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012950!5e0!3m2!1sid!2sid!4v1663809347612!5m2!1sid!2sid" width="1100" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    {{-- Footer --}}
    <div class="container-fluid bg-dark text-white py-4 px-5">
        <footer class="pt-1">
            <div class="row row-cols-5">
                <div class="col">
                    <a href="/" class="d-flex align-items-center mb-3 link-white text-decoration-none">
                        <img src="/image/logo.jpeg" alt="" width="100" height="100" class="d-inline-block align-text-center">
                        <h4 class="text-white ms-3">Royal Galaxy</h4>
                    </a>
                </div>

                <div class="col">

                </div>

                <div class="col">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
                    </ul>
                </div>

            </div>

            <div class="d-flex justify-content-between pt-4 mt-4 border-top">
                <p>© 2021 Company, Inc. All rights reserved.</p>
                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3">
                        <a class="text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/voler/dist/assets/js/feather-icons/feather.min.js"></script>
    <script src="/voler/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/voler/dist/assets/js/app.js"></script>

    <script src="/voler/dist/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="/voler/dist/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="/voler/dist/assets/js/pages/dashboard.js"></script>

    <script src="/voler/dist/assets/js/main.js"></script>
</body>

</html>