<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AidLink</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/donation.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body,
        .modal-title {
            font-family: 'Sen', sans-serif;
        }

        .text-primary {
            color: #ff001e !important;
        }

        .btn-primary:hover {
            color: #FFFFFF !important;
            background-color: #ff001e !important;
        }

        .btn-primary {
            background-color: #ff001e !important;
            border-color: #ff001e !important;
        }

        .navbar .btn:hover {
            color: #FFFFFF !important;
            background: #ff001e !important;
        }

        .navbar .navbar-nav .nav-link:focus,
        .nav-link {
            color: #000000 !important;
        }

        .footer .btn.btn-link:hover,
        .navbar .navbar-nav .nav-link:hover,
        .navbar .navbar-nav .nav-link.active {
            color: #ff001e !important;
        }

        .btn-link {
            color: #000000 !important;
        }

        td,
        .text-center {
            color: #000000 !important;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary"><img class="img-fluid me-2" src="/donation.png" alt=""
                    style="width: 45px;">AidLink</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="/user_home" class="nav-item nav-link ">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="/user_aids" class="nav-item nav-link active">Aids</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
                <a href="#" class="nav-item nav-link" data-bs-toggle="modal"
                    data-bs-target="#logoutAccountModal"><b class="text-danger">Logout</b></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->



    <!-- Roadmap Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">FUND OTHER PEOPLE NEEDS
                        </h5>
                        <h1 class="display-5 mb-0">Donation/s</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-lg-6">
                    <button class="btn btn-dark" onclick="window.location='/user_aids'">Go Back</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3 col-lg-6">

                    <form action="/user_donations" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's Name"
                                aria-label="Recipient's Name" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6"></div>
            </div>
            <div class="row">
                <div class="table-responsive mb-5">
                    <table class="table border mb-2" id="sortTable">
                        <thead class="table-light fw-semibold">
                            <tr class="align-middle">
                                <th class="text-center">
                                    <svg class="icon" width="16" height="16" viewBox="0 0 50 50"
                                        data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #231f20;
                                                }

                                                .cls-2 {
                                                    fill: #d30000;
                                                }

                                                .cls-3 {
                                                    fill: #ff8e5a;
                                                }

                                                .cls-4 {
                                                    fill: #ffba50;
                                                }
                                            </style>
                                        </defs>
                                        <title />
                                        <path class="cls-1"
                                            d="M43.125,4.5H6.875A2.377,2.377,0,0,0,4.5,6.875v36.25A2.377,2.377,0,0,0,6.875,45.5h36.25A2.377,2.377,0,0,0,45.5,43.125V6.875A2.377,2.377,0,0,0,43.125,4.5ZM44.5,43.125A1.377,1.377,0,0,1,43.125,44.5H6.875A1.377,1.377,0,0,1,5.5,43.125V6.875A1.377,1.377,0,0,1,6.875,5.5h36.25A1.377,1.377,0,0,1,44.5,6.875Z" />
                                        <path class="cls-1"
                                            d="M40,39.5h-.375V12a2.5,2.5,0,0,0-2.5-2.5H35.5A2.5,2.5,0,0,0,33,12V39.5H28.377V22a2.5,2.5,0,0,0-2.5-2.5H24.252a2.5,2.5,0,0,0-2.5,2.5V39.5H17.129V32a2.5,2.5,0,0,0-2.5-2.5H13A2.5,2.5,0,0,0,10.5,32v7.5H10a.5.5,0,0,0,0,1H40a.5.5,0,0,0,0-1Z" />
                                        <path class="cls-2"
                                            d="M34,12a1.5,1.5,0,0,1,1.5-1.5h1.625a1.5,1.5,0,0,1,1.5,1.5V39.5H34Z" />
                                        <path class="cls-3"
                                            d="M22.752,22a1.5,1.5,0,0,1,1.5-1.5h1.625a1.5,1.5,0,0,1,1.5,1.5V39.5H22.752Z" />
                                        <path class="cls-4"
                                            d="M11.5,32A1.5,1.5,0,0,1,13,30.5h1.625a1.5,1.5,0,0,1,1.5,1.5v7.5H11.5Z" />
                                        <path class="cls-1" d="M10,10.5h6.587a.5.5,0,0,0,0-1H10a.5.5,0,0,0,0,1Z" />
                                        <path class="cls-1" d="M10,13.415h6.587a.5.5,0,0,0,0-1H10a.5.5,0,0,0,0,1Z" />
                                        <path class="cls-1" d="M10,16.331h6.587a.5.5,0,0,0,0-1H10a.5.5,0,0,0,0,1Z" />
                                    </svg>
                                </th>
                                <th>Recepient Name</th>
                                <th class="text-center">Request Name</th>
                                <th>Date Submitted</th>
                                <th class="text-center">Purpose</th>
                                <th>Amount</th>
                                <th class="text-center">Note</th>
                                <td>Action</td>
                                <td class="text-center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aids as $item)
                                <tr>
                                    <td class="text-center"></td>
                                    <td> {{ $item->firstName }} {{ $item->middleName }} {{ $item->lastName }} </td>
                                    <td class="text-center">
                                        {{ $item->name }}
                                    </td>
                                    <td> {{ (new DateTime($item->created_at))->setTimezone(new DateTimeZone('Asia/Manila'))->format('Y-m-d h:i A') }}
                                    </td>
                                    <td class="text-center"> {{ $item->purpose }} </td>
                                    <td>P{{ $item->amount }} </td>
                                    <td class="text-center">
                                        {{ $item->letter }}

                                    </td>
                                    <td>
                                        <button class="btn btn-warning text-white" title="Donate">
                                            Donate
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagination">
                                <ul class="pagination">
                                    @for ($i = 1; $i <= $aids->lastPage(); $i++)
                                        <li class="page-item ">
                                            <a class="page-link {{ $aids->currentPage() == $i ? 'active text-danger' : 'text-dark' }}"
                                                href="{{ $aids->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    <!-- Roadmap End -->





    <!-- Footer Start -->
    <div class="container-fluid bg-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6">
                    <h1 class="text-primary mb-4"><img class="img-fluid me-2" src="/assets/img/icon-1.png"
                            alt="" style="width: 45px;">AidLink</h1>
                    <span class="text-dark">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et
                        lorem et sit, sed
                        stet lorem sit clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum
                        et lorem et sit.</span>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-4">Newsletter</h5>
                    <p>Clita erat ipsum et lorem et sit, sed stet lorem sit clita.</p>
                    <div class="position-relative">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Get In Touch</h5>
                    <p class="text-dark"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="text-dark"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="text-dark"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Our Services</h5>
                    <a class="btn btn-link" href="">Donation Management</a>
                    <a class="btn btn-link" href="">Aid Request Management</a>
                    <a class="btn btn-link" href="">Smart Contracts</a>
                    <a class="btn btn-link" href="">AI Powered</a>
                    <a class="btn btn-link" href="">Reports and Analytics</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="#about">About Us</a>
                    <a class="btn btn-link" href="#services">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Follow Us</h5>
                    <div class="d-flex">
                        <a class="btn btn-square rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="/">AidLink</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/lib/wow/wow.min.js"></script>
    <script src="/assets/lib/easing/easing.min.js"></script>
    <script src="/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/assets/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="/assets/js/main.js"></script>
    <div class="modal fade" id="logoutAccountModal" tabindex="-1" role="dialog"
        aria-labelledby="logoutAccountModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-outline-dark close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/logout" method="get" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <center>
                            <h5>Are You Sure You Want To Logout?</h5>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnLogout" value="yes">Yes,
                            Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog"
        aria-labelledby="createAccountModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAccountModalTitle">Create Your Account</h5>
                    <button type="button" class="btn btn-outline-dark close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group mt-2">
                            <label for="firstName" class="text-dark">First Name:</label>
                            <br>
                            <input required type="text" name="firstName" id="" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="middleName" class="text-dark">Middle Name:</label>
                            <br>
                            <input type="text" name="middleName" id="" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="lastName" class="text-dark">Last Name:</label>
                            <br>
                            <input required type="text" name="lastName" id="" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="address" class="text-dark">Address:</label>
                            <br>
                            <textarea required name="address" id="" cols="30" rows="5" class="form-control">

                            </textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label for="birthDate" class="text-dark">Birth Date:</label>
                            <br>
                            <input required type="date" name="birthDate" id="" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="gender" class="text-dark">Gender:</label>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="gender" value="male"
                                            aria-label="Radio button for selecting male">
                                    </div>
                                </div>
                                <span class="text-dark" style="margin-left: 5px;">Male</span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="gender" value="female"
                                            aria-label="Radio button for selecting female">
                                    </div>
                                </div>
                                <span class="text-dark" style="margin-left: 5px;">Female</span>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <label for="phoneNumber" class="text-dark">Phone Number:</label>
                            <br>
                            <input required type="number" name="phoneNumber" id="" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="username" class="text-dark">Username:</label>
                            <br>
                            <input required type="text" name="username" id="" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="password" class="text-dark">Password:</label>
                            <br>
                            <input required type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="confimpass" class="text-dark">Confirm Password:</label>
                            <br>
                            <input required type="password" name="confimpass" id="confimpass" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                            <label for="showPassword" class="text-dark">Show Password</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnCreateAccount"
                            value="yes">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility2() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var confirmPasswordField = document.getElementById("confimpass");
            if (passwordField.type === "password" && confirmPasswordField.type === "password") {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
            }
        }
    </script>
    @if (session()->pull('successLogin'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Login Successfully',
                    showConfirmButton: false,
                    timer: 800,
                });
            }, 500);
        </script>
        {{ session()->forget('successLogin') }}
    @endif
    @if (session()->pull('errorCreateAccount'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Failed To Create Account, Please Try Again Later',
                    showConfirmButton: true,
                });
            }, 500);
        </script>
        {{ session()->forget('errorCreateAccount') }}
    @endif
    @if (session()->pull('errorPasswordNotMatch'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Password Doesn\'t Match, Please Try Again',
                    showConfirmButton: true,
                });
            }, 500);
        </script>
        {{ session()->forget('errorPasswordNotMatch') }}
    @endif
</body>

</html>
