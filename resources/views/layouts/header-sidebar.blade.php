<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/1.png')}}">
    <title>
        @if(isset($title))
            {{ $title }} | HRISPA
        @else
            HRISPA | Human Resources Information System Personnel Admin
        @endif
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/boxicons/css/boxicons.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/quill/quill.snow.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/quill/quill.bubble.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/remixicon/remixicon.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/simple-datatables/style.css')}}" >
    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/loading.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" >
    <!-- IziToast CSS-->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
        .sidebar{
            font-family: "Nunito", sans-serif;
        }
        .spancustom{
            color: #899bbd;
            font-size: 12px;
            font-weight: 400;
        }
        .spancustom1{
            color: #899bbd;
        }
        #calendar {
            width: 20%;
            height: auto;
            margin: auto;
        }
        .custom-swal-text {
            font-family: "Nunito", sans-serif;
        }
        .profile-image-wrapper {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 50%;
        }

        .image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            object-position: top;
            border-radius: 50%;
        }
        @media only screen and (max-width: 767px) {
            .profile-image-wrapper {
                width: 30px;
                height: 30px;
            }

            .image {
                width: 100%;
                height: 100%;
                border-radius: 50%;
            }
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')

    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/dashboard" class="logo d-flex align-items-center">
              <img src="{{ asset('storage/images/1.png')}}" alt="">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown">
                </li>
                <!-- End Notification Nav -->
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        @if(Auth::user()->image)
                            <div class="profile-image-wrapper">
                                <img class="image rounded-circle" src="{{asset('/storage/images/UserProfile/'.Auth::user()->image)}}" alt="profile_image" >
                            </div>
                        @endif
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth()->user()->name }} </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth()->user()->name }}</h6>
                            <span>
                                @if (Auth()->user()->position)
                                    {{ Auth()->user()->position_name }}
                                @else
                                    No Position Assigned
                                @endif
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/profile">
                                <i class="fa-solid fa-user"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <button type="submit" class="dropdown-item d-flex align-items-center"  onclick="confirmLogout()">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Logout</span>
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Info</li>
        <li class="nav-item ">
            <a class="nav-link collapsed {{ ($title === "Dashboard") ? 'active' : '' }}" href="{{ route('dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Home Page</span>
            </a>
        </li>
        <!-- MY INFO -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-fill-exclamation"></i>
                <span>My Info</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/Attend" class="{{ ($title === "Attendance Report") ? 'active' : '' }}" >
                        <i class="bi bi-circle"></i>
                        <span>My Attendance Report</span>
                    </a>
                </li>
                <li>
                    <a href="/payslips" class="{{ ($title === "Payslip") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>My Payslip</span>
                    </a>
                </li>
                <li>
                    <a href="/company-regulation" class="{{ ($title === "Company Regulation") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>View Company Regulation</span>
                    </a>
                </li>
                <li>
                    <a href="/inmemo-announ" class="{{ ($title === "Internal Memo Announcement") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>View Internal Memo and Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="/annual-list" class="{{ ($title === "Record My Leave") ? 'active' : '' }}" >
                        <i class="bi bi-circle"></i>
                        <span>My Leave Record</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('index.archive')}}" class="{{ ($title === "All Form") ? 'active' : '' }}" >
                        <i class="bi bi-circle"></i>
                        <span>All Form</span>
                    </a>
                </li>
                <!-- TAHAP PENGEMBANGAN (untuk pengembang selanjutnya) -->
                {{-- <li>
                    <a href="/jobdesc" class="{{ ($title === "Job Description") ? 'active' : '' }}"hidden>
                        <i class="bi bi-circle"></i>
                        <span>My Job Description</span>
                    </a>
                </li> --}}
            </ul>
        </li>

        <!-- Application Form -->
        <li class="nav-heading">Form</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-brands fa-wpforms"></i>
                <span>My Application Form</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/employment-certificate" class="{{ ($title === "Employment Certificate") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Apply for Employment Certificate</span>
                    </a>
                </li>
                <li>
                    <a href="/cr-annual-leave" class="{{ ($title === "Annual Leave") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Create Annual Leave Application</span>
                    </a>
                </li>
                <li>
                    <a href="/special-leave" class="{{ ($title === "Special Leave") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Create Special Leave Application</span>
                    </a>
                </li>
                <li>
                    <a href="/medical" class="{{ ($title === "Medical Leave") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Create Medical Leave Application</span>
                    </a>
                </li>
                <li>
                    <a href="/permit" class="{{ ($title === "Permit") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Create Permit Application</span>
                    </a>
                </li>
                <li>
                    <a href="/data-changes" class="{{ ($title === "Data Form") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Create Submission of Data Changes</span>
                    </a>
                </li>
            </ul>
        </li>

        @if (isset(Auth::user()->position) && Auth::user()->position->position_code == 'HRGA4')
        <li class="nav-item">
            <a class="nav-link collapsed {{ ($title === "Review Form") ? 'active' : '' }}" href="{{ route('review.mainindex')}}">
                <i class="fa-regular fa-address-card"></i>
                <span>Review Form</span>
            </a>
        </li>
        @endif

        <!-- APPROVAL LIST -->
        @if (
             Auth::user()->position && Auth::user()->position->position_code == 'MGT2' ||  // IT Manager Div
             Auth::user()->position && Auth::user()->position->position_code == 'ITD1' ||  // IT Manager Dept
             Auth::user()->position && Auth::user()->position->position_code == 'MGT5' ||  // HRGA Manager Dept
             Auth::user()->position && Auth::user()->position->position_code == 'HRGA1' || // HRGA Manager Div
             Auth::user()->position && Auth::user()->position->position_code == 'HRGA2' || // HR Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'HRGA3' || // GA Payroll Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'MGT4' ||
             Auth::user()->position && Auth::user()->position->position_code == 'FAC1' ||  // Finance Manager Div
             Auth::user()->position && Auth::user()->position->position_code == 'MGT6' ||  // Sales Manager Div
             Auth::user()->position && Auth::user()->position->position_code == 'SED3' ||  // Service Engineer Coordinator
             Auth::user()->position && Auth::user()->position->position_code == 'MGT7' ||  // Supply Chain Manage Dept
             Auth::user()->position && Auth::user()->position->position_code == 'PUR1' ||  // Purchasing Manager Div
             Auth::user()->position && Auth::user()->position->position_code == 'LOG1' ||  // Logistic Manager Div
             Auth::user()->position && Auth::user()->position->position_code == 'LOG2' ||  // Logistic Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'WHD1' ||  // Warehouse Manager Div
             Auth::user()->position && Auth::user()->position->position_code == 'WHD3' ||  // Warehouse Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'MGT9' ||  // Electrical and Automation Manager
             Auth::user()->position && Auth::user()->position->position_code == 'ENI1' ||  // Electrical and Instrumen Manager
             Auth::user()->position && Auth::user()->position->position_code == 'ENI2' ||  // Electrical and Instrumen Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'QAQC1' || // QAQC Asst Manager
             Auth::user()->position && Auth::user()->position->position_code == 'MGT10' || // QAQC Manager
             Auth::user()->position && Auth::user()->position->position_code == 'HSE1' ||  // HSE Manager
             Auth::user()->position && Auth::user()->position->position_code == 'MCN1' ||  // Machining Manager
             Auth::user()->position && Auth::user()->position->position_code == 'MCN2' ||  // Machining Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'DVD1' ||  // Damper Manager
             Auth::user()->position && Auth::user()->position->position_code == 'DVD2' ||  // Damper Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'MGT8' ||  // Production Manager
             Auth::user()->position && Auth::user()->position->position_code == 'MPD1' ||  // MECHANICAL PRODUCTION MANAGER
             Auth::user()->position && Auth::user()->position->position_code == 'MPD2' ||  // Production COORDINATOR
             Auth::user()->position && Auth::user()->position->position_code == 'MPD3' ||  // Production Administrator
             Auth::user()->position && Auth::user()->position->position_code == 'MPD4' ||  // Laser Cutting Engineer
             Auth::user()->position && Auth::user()->position->position_code == 'MPD5' ||  // Mechanical, OH and Production Machine Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'MPD15' || // Robotic Welding Engineer
             Auth::user()->position && Auth::user()->position->position_code == 'MPD16' || // Welding Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'MPD20' || // Fitting Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'MPD24' || // Painting & Blasting Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'MPD28' || // Piping Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'MPD32' || // Facilities & Maintenance Supervisor
             Auth::user()->position && Auth::user()->position->position_code == 'MGT3' ||
             Auth::user()->level == 'Developer'
        )
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Approv-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-regular fa-rectangle-list"></i><span>Approval List</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Approv-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('annualleave.index')}}" class="{{ ($title === "Approval Annual Leave") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Annual Leave</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('medicalleave.index')}}" class="{{ ($title === "Approval Medical Leave") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Medical Leave</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('specialleave.index')}}" class="{{ ($title === "Approval Special Leave") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Special Leave</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('permit.index')}}" class="{{ ($title === "Approval Permit") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Permit</span>
                        </a>
                    </li>
                    @if ((Auth::user()->position && Auth::user()->position->position_code == 'MGT5') || Auth::user()->level == 'Developer')
                    <li>
                        <a href="{{ route('indexmgt5.pagecertificate')}}" class="{{ ($title === "Certificate Form Review") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Certificate Form</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- EXTRAS -->
        @if (Auth::user()->level == 'Developer')
            <li class="nav-heading">Other</li>
            <!-- NEXT PENGEMBANGAN -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed {{ ($title === "HOD Page") ? 'active' : '' }}" href="/hodpages">
                    <i class="fa-regular fa-floppy-disk"></i>
                    <span>Information Employee</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link collapsed {{ ($title === "Tools") ? 'active' : '' }}" href="/tools">
                    <i class="fa-solid fa-user-gear"></i>
                    <span>Tools</span>
                </a>
            </li>
            <!-- NEXT PENGEMBANGAN -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed {{ ($title === "HRIS") ? 'active' : '' }}" href="/hris">
                    <i class="fa-solid fa-laptop-file"></i>
                    <span>HRIS Application</span>
                </a>
            </li> --}}
        @elseif (Auth::user()->role == 'superadmin')
            <li class="nav-heading">Other</li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ ($title === "Tools") ? 'active' : '' }}" href="/tools">
                    <i class="fa-solid fa-user-gear"></i>
                    <span>Tools</span>
                </a>
            </li>
        @elseif ( Auth::user()->role == 'admin')
            <li class="nav-heading">Other</li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ ($title === "Tools") ? 'active' : '' }}" href="/tools">
                    <i class="fa-solid fa-user-gear"></i>
                    <span>Tools</span>
                </a>
            </li>
        @endif

        <li class="nav-heading">Account</li>

        <li class="nav-item">
            <a class="nav-link collapsed {{ ($title === "Profile") ? 'active' : '' }}" href="/profile">
                <i class="fa-regular fa-address-card"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed {{ ($title === "Calendar") ? 'active' : '' }}" href="/events"  >
                <i class="fa-solid fa-calendar-days"></i>
                <span>Calendar</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed {{ ($title === "Helpdesk") ? 'active' : '' }}" href="/helpdesk"  >
                <i class="fa-regular fa-circle-question"></i>
                <span>Helpdesk</span>
            </a>
        </li>
        <li class="nav-item">
            <form id="logout" action="/logout" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-link collapsed" href="javascript:void(0);" onclick="confirmLogout()">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </li>
      </ul>
    </aside>

    <main id="main" class="main">
        @yield('content1')
    </main>

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Developer | UserUnknown</span></strong>. All Rights Reserved
        </div>
        <div class="credits"></div>
    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js')}}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function logout() {
            document.getElementById('logout').submit();
        }
        function confirmLogout() {
            Swal.fire({
                title: 'Confirmation Logout',
                text: "Are you sure you want to end the current session ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#FF5555',
                cancelButtonColor: '#a0a0a0',
                confirmButtonText: 'Yes, I am sure',
                cancelButtonText: 'Cancel',
                customClass: {
                    title: 'custom-swal-text',
                    content: 'custom-swal-text'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    logout();
                }
            });
        }

        var listItems = document.querySelectorAll('#components-nav > li');
        listItems.forEach(function(item) {
            var link = item.querySelector('a');
            if (link.classList.contains('active')) {
                var parentUl = item.closest('ul');

                if (parentUl) {
                    parentUl.classList.add('active');
                    parentUl.classList.add('show');
                }
                return;
            }
        });

        var listItems = document.querySelectorAll('#forms-nav > li');
        listItems.forEach(function(item) {
            var link = item.querySelector('a');
            if (link.classList.contains('active')) {
                var parentUl = item.closest('ul');

                if (parentUl) {
                    parentUl.classList.add('active');
                    parentUl.classList.add('show');
                }
                return;
            }
        });

        var listItems = document.querySelectorAll('#Approv-nav > li');
        listItems.forEach(function(item) {
            var link = item.querySelector('a');
            if (link.classList.contains('active')) {
                var parentUl = item.closest('ul');

                if (parentUl) {
                    parentUl.classList.add('active');
                    parentUl.classList.add('show');
                }
                return;
            }
        });

        var dashboardLink = document.querySelector('a');
        if (dashboardLink) {
            if (window.location.href === "{{ route('dashboard')}}") {
                dashboardLink.classList.add('active');
            }
        }
    </script>
    @stack('scripts')
</body>
</html>
