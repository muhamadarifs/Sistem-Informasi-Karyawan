<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>
        @if(isset($title))
        {{ $title }} | HRISPA
        @else
        HRISPA | Human Resources Information System Personal Admin
        @endif
    </title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/FM LOGO 1.png')}}">
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">

    <style>
        #calendar {
            font-family: "Nunito",sans-serif;
            width:auto;
            height: auto;
            margin: auto;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
        }

        .modal-content {
            position: relative;
            margin: 5% auto;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            animation: slideDown 0.5s ease-out;
        }
        span{
            font-family: "Nunito",sans-serif;
            margin-bottom: 2px;
        }
        .fc-event {
            border-color: transparent;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-50%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @media (max-width: 767px) {
            #calendar {
                width: auto;
                height: auto;
                margin: 0;
                font-size: 8px;
            }
            .fc-title {
                font-size: 8px;
            }
            #main{
                top: 20px;
                bottom: 20px;
                left: 0;
            }
            .card{
                width: auto;
                height: auto;
                left: 0;
            }
            .logo img{
               padding-left: 0;
            }
        }
    </style>

</head>
    <body>
        @include('sweetalert::alert')

        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <a href="/dashboard" class="logo d-flex align-items-center">
                  <img src="img/FM LOGO 2.png" alt="">
                </a>
            </div>
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        @if(Auth::user()->image)
                            <img class="image rounded-circle" src="{{asset('/storage/images/UserProfile/'.Auth::user()->image)}}" alt="profile_image" >
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

        {{-- MAIN WEB  --}}
        <main id="main" class="main" style="margin-left: 0; margin-right: 0;">
            <div class="card" >
                <div class="card-header">
                    <h5 class="card-title m-0 p-0">Calendar Event</h5>
                    <div class="float-end">
                    </div>
                </div>
                <div class="card-body">
                    <div class="calendar mt-3 event-label" id='calendar'></div>
                </div>
            </div>
            <div id="modal-action" class="modal" tabindex="-1">
            </div>
        </main>
        {{-- END MAIN WEB --}}

        <!-- Footer -->
        <footer id="footer" class="footer" style="margin-left: 0px;">
            <div class="copyright">
                &copy; Copyright <strong><span>HUMAN RESOURCES | PT. FEEN MARINE</span></strong>. All Rights Reserved
            </div>
            <div class="credits"></div>
        </footer>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <!-- Vendor JS Files -->
        <script src="vendor/apexcharts/apexcharts.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/chart.js/chart.umd.js"></script>
        <script src="vendor/echarts/echarts.min.js"></script>
        <script src="vendor/quill/quill.min.js"></script>
        <script src="vendor/simple-datatables/simple-datatables.js"></script>
        <script src="vendor/tinymce/tinymce.min.js"></script>
        <script src="vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="js/main.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>


        {{-- Script in HTML --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.10/index.global.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type='text/javascript' src='fullcalendar/gcal.js'></script>
        <script type='text/javascript' src='fullcalendar/gcal.min.js'></script>
        <script src='packages/google-calendar/index.global.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.10/plugins/google-calendar/main.min.js"></script>


        <script>

        const modal = $('#modal-action')
        const csrfToken = $('meta[name=csrf-token]').attr('content')
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var userRole = '{{ Auth::user()->role ?? '' }}';
            var isSuperAdmin = (userRole === 'superadmin');
            var isRegularAdmin = (userRole === 'admin');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'Asia/Jakarta',
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                events: `{{ route('events.list') }}`,
                editable: true,
                dateClick: function (info) {
                    if (isSuperAdmin || isRegularAdmin){
                        $.ajax({
                            url: `{{ route('events.create') }}`,
                            data:{
                                start_date: info.dateStr,
                                end_date: info.dateStr
                            },
                            success: function (res){

                                modal.html(res).modal('show')
                                $('#form-action').on('submit', function(e){
                                    e.preventDefault()
                                    const form = this
                                    const formData = new FormData(form)
                                    $.ajax({
                                        url: form.action,
                                        method: form.method,
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function (res) {
                                            modal.modal('hide'),
                                            calendar.refetchEvents(),
                                            iziToast.success({
                                                title: 'Success',
                                                message: res.message,
                                                position: 'topRight'
                                            });
                                        },
                                        error: function (res) {
                                            iziToast.error({
                                                title: 'Error',
                                                message: 'Terjadi kesalahan saat menambahkan acara.',
                                                position: 'topRight'
                                            });
                                        }
                                    })
                                })
                            }
                        })
                    }else{
                        iziToast.warning({
                            title: 'Warning',
                            message: 'Anda tidak memiliki izin untuk menambahkan acara.',
                            position: 'topRight'
                        });
                    }
                },
                eventClick: function ({event}) {
                        $.ajax({
                            url: `{{ url('events') }}/${event.id}/edit`,
                            success: function (res){
                                modal.html(res).modal('show')
                                $('#form-action').on('submit', function(e){
                                    e.preventDefault()
                                    const form = this
                                    const formData = new FormData(form)
                                    $.ajax({
                                        url: form.action,
                                        method: form.method,
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function (res) {
                                            modal.modal('hide'),
                                            calendar.refetchEvents(),
                                            iziToast.success({
                                                title: 'Success',
                                                message: res.message,
                                                position: 'topRight'
                                            });
                                        }
                                    })
                                })
                            }
                        })
                },
                dayCellContent: function(arg) {
                    var day = arg.date.getDay();
                    var content = document.createElement('div');
                    content.textContent = arg.dayNumberText;

                    if (day === 0 || day === 6) {
                        content.style.color = 'red';
                    }

                    return { domNodes: [content] };
                },
                dayHeaderContent: function(arg) {
                    var day = arg.date.getDay();
                    var header = document.createElement('div');
                    header.textContent = arg.text;

                    if (day === 0 || day === 6) {
                        header.style.color = 'red';
                    }

                    return { domNodes: [header] };
                },
                eventContent: function(arg) {
                    var event = arg.event;
                    var content = document.createElement('div');
                    content.textContent = event.title;

                    if (event.extendedProps.category === 'Hari Libur') {
                        content.style.color = 'white';
                    } else if (event.extendedProps.category === 'Event Kantor') {
                        content.style.color = 'black';
                    }

                    return { domNodes: [content] };
                },
            });
            function getCategoryColor(category) {
                switch (category) {
                case 'Event Kantor':
                    return 'blue';
                case 'Hari Libur':
                    return 'red';
                default:
                    return '';
                }
            }
            calendar.render();
        });
        $(function() {
            $('#calendar').fullCalendar({
                googleCalendarApiKey: 'AIzaSyDRh43FkYhFFmrSZWOGQ0gifIswJYPss8Q',
                events: {
                googleCalendarId: 'masariif051102@gmail.com'
                },
            });
        });

        function logout() {
            document.getElementById('logout').submit();
        }
        function confirmLogout() {
            Swal.fire({
                title: 'Confirmation Logout',
                text: "Do you want to end the current session ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#FF5555',
                cancelButtonColor: '#a0a0a0',
                confirmButtonText: 'Yes, Logout',
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
        </script>
    </body>
</html>
