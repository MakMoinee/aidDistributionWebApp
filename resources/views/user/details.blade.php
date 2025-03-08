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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.8.69/pdf.min.mjs"></script>
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
                <a href="/user_details" class="nav-item nav-link active">Details</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="/user_aids" class="nav-item nav-link">Aids</a>
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
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">PERSONAL INFORMATION
                        </h5>
                        <h1 class="display-5 mb-0">My Details</h1>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="/user_details" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($details)
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="firstName" class="text-dark">First Name:</label>
                                            <br>
                                            <input required type="text" name="firstName" id=""
                                                class="form-control mt-2" value="{{ $details[0]['firstName'] }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="middleName" class="text-dark">Middle Name:</label>
                                            <br>
                                            <input required type="text" name="middleName" id=""
                                                class="form-control mt-2" value="{{ $details[0]['middleName'] }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="lastName" class="text-dark">Last Name:</label>
                                            <br>
                                            <input required type="text" name="lastName" id=""
                                                class="form-control mt-2" value="{{ $details[0]['lastName'] }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="Address" class="text-dark">Address:</label>
                                            <br>
                                            <textarea required name="address" id="" cols="30" rows="5" class="form-control">{{ $details[0]['address'] }}</textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="birthDate" class="text-dark">Birth Date:</label>
                                            <br>
                                            <input required type="date" name="birthDate" id=""
                                                class="form-control" value="{{ $details[0]['birthDate'] }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="contactNumber" class="text-dark">Contact Number:</label>
                                            <br>
                                            <input required type="number" name="contactNumber" id=""
                                                class="form-control" value="{{ $details[0]['contactNumber'] }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <label for="file" class="text-dark">Upload Supporting Documents In One
                                                PDF
                                                (Birth Cert, Id,
                                                Barangay Clearance and etc.)</label>
                                            <br>
                                            <button type="button" id="btnUpload" onclick="loadDocument()"
                                                class="btn btn-primary mt-3">{{ $details[0]['documents'] }}</button>
                                            <button type="button"
                                                class="btn btn-secondary mt-3" id="btnClear"
                                                onclick="clearData()">Clear</button>
                                            <input required type="file" name="documents" id="myDocument"
                                                class="invisible" accept=".pdf" onchange="onDocChange(this)">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 mx-auto">
                                            <embed style="height: 600px; width:100%;" class="embed-responsive mt-2"
                                                id="pdfViewer" src="{{ $details[0]['documents'] }}"
                                                type="application/pdf">
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="firstName" class="text-dark">First Name:</label>
                                            <br>
                                            <input required type="text" name="firstName" id=""
                                                class="form-control mt-2">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="middleName" class="text-dark">Middle Name:</label>
                                            <br>
                                            <input required type="text" name="middleName" id=""
                                                class="form-control mt-2">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="lastName" class="text-dark">Last Name:</label>
                                            <br>
                                            <input required type="text" name="lastName" id=""
                                                class="form-control mt-2">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="Address" class="text-dark">Address:</label>
                                            <br>
                                            <textarea required name="address" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="birthDate" class="text-dark">Birth Date:</label>
                                            <br>
                                            <input required type="date" name="birthDate" id=""
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="contactNumber" class="text-dark">Contact Number:</label>
                                            <br>
                                            <input required type="number" name="contactNumber" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <label for="file" class="text-dark">Upload Supporting Documents In One
                                                PDF
                                                (Birth Cert, Id,
                                                Barangay Clearance and etc.)</label>
                                            <br>
                                            <button type="button" id="btnUpload" onclick="loadDocument()"
                                                class="btn btn-primary mt-3">Upload File</button>
                                            <button type="button" style="display: none;"
                                                class="btn btn-secondary mt-3" id="btnClear"
                                                onclick="clearData()">Clear</button>
                                            <input required type="file" name="documents" id="myDocument"
                                                class="invisible" accept=".pdf" onchange="onDocChange(this)">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 mx-auto">
                                            <embed style="height: 600px; width:100%;  display: none;"
                                                class="embed-responsive mt-2" id="pdfViewer" src=""
                                                type="application/pdf">
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="card-footer bg-white mt-3">
                                <button type="submit" class="btn btn-success mb-3" style="float: right"
                                    name="btnSaveDetails" value="yes">Save</button>
                            </div>
                        </form>
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
    <script>
        function loadDocument() {
            document.getElementById('myDocument').click();
        }

        function onDocChange(event) {
            let file = event.files[0];
            let btnUpload = document.getElementById('btnUpload');
            btnUpload.innerHTML = file.name;
            let btnClear = document.getElementById('btnClear');
            btnClear.removeAttribute("style");
            let fileURL = URL.createObjectURL(file);
            let pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.src = fileURL;
            pdfViewer.setAttribute("style", "height: 600px; width:100%;");
        }

        function clearData() {
            let btnClear = document.getElementById('btnClear');
            btnClear.setAttribute("style", "display:none;");

            let myDocument = document.getElementById('myDocument');
            myDocument.value = null;
            let btnUpload = document.getElementById('btnUpload');
            btnUpload.innerHTML = "Upload File";
            let pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.src = null;
            pdfViewer.setAttribute("style", "height: 600px; width:100%;display:none;");

        }
    </script>
    @if (session()->pull('successDetails'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Successfully Updated Details',
                    showConfirmButton: false,
                    timer: 800,
                });
            }, 500);
        </script>
        {{ session()->forget('successDetails') }}
    @endif
    @if (session()->pull('errorDetails'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Failed To Update Details, Please Try Again Later',
                    showConfirmButton: true,
                });
            }, 500);
        </script>
        {{ session()->forget('errorDetails') }}
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
