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

        td {
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
                <a href="/admin_home" class="nav-item nav-link ">Home</a>
                <a href="#" class="nav-item nav-link" data-bs-toggle="modal"
                    data-bs-target="#logoutAccountModal"><b class="text-danger">Logout</b></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-white p-3">
                            <h5><b>Users</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mb-5">
                                <table class="table border mb-2" id="sortTable">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle">
                                            <th class="text-center">Full Name</th>
                                            <th>Date Registered</th>
                                            <th class="text-center">Documents</th>
                                            <th>Status</th>
                                            <td class="text-center">Action</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr class="align-middle">
                                                <td class="text-center">
                                                    {{ $item->firstName }} {{ $item->middleName }} {{ $item->lastName }}
                                                </td>
                                                <td>
                                                    {{ (new DateTime($item->created_at))->setTimezone(new DateTimeZone('Asia/Manila'))->format('Y-m-d h:i A') }}
                                                </td>
                                                <td class="text-center">
                                                    @if (array_key_exists($item->userID, $details))
                                                        <button class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#viewDocumentModal"
                                                            onclick="viewDocument('{{ $details[$item->userID]['documents'] }}')">View
                                                            Document</button>
                                                    @else
                                                        No Details Yet Added
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (array_key_exists($item->userID, $details))
                                                        {{ $details[$item->userID]['status'] }}
                                                    @else
                                                        No Details Yet Added
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (array_key_exists($item->userID, $details))
                                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#updateAccountModal"
                                                            onclick="updateAccount({{ $details[$item->userID]['id'] }},'{{ $details[$item->userID]['status'] }}')">Update</button>
                                                    @else
                                                    @endif
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- Roadmap Start -->
    <div class="container-xxl py-5">
        <div class="container">

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

    <div class="modal fade" id="viewDocumentModal" tabindex="-1" role="dialog"
        aria-labelledby="viewDocumentModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDocumentModalTitle">View User Document</h5>
                    <button type="button" class="btn btn-outline-dark close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <embed style="height: 600px; width:100%" class="embed-responsive mt-2" id="pdfViewer"
                                src="" type="application/pdf">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


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
    <div class="modal fade" id="updateAccountModal" tabindex="-1" role="dialog"
        aria-labelledby="updateAccountModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateAccountModalTitle">Update User</h5>
                    <button type="button" class="btn btn-outline-dark close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin_home" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="approval" style="color: #000000 !important">Update Status:</label>
                                <br>
                                <select style="color: #000000 !important" required name="approval" id="approval"
                                    class="form-control mt-3">
                                    <option value="not approved">Not Approved</option>
                                    <option value="approved">Approved</option>
                                </select>
                                <input type="hidden" name="id" id="uid" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btnUpdateAccount"
                            value="yes">Proceed Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        function updateAccount(id, status) {
            let uid = document.getElementById('uid');
            uid.value = id;
            let approval = document.getElementById('approval');
            approval.selected = status;
            approval.value = status;
        }

        function viewDocument(filePath) {
            let pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.src = filePath;



        }

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
    @if (session()->pull('successUpdateAccount'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Successfully User Account',
                    showConfirmButton: false,
                    timer: 800,
                });
            }, 500);
        </script>
        {{ session()->forget('successUpdateAccount') }}
    @endif
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
    @if (session()->pull('errorUpdateAccount'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Failed To Update User Account, Please Try Again Later',
                    showConfirmButton: true,
                });
            }, 500);
        </script>
        {{ session()->forget('errorUpdateAccount') }}
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
