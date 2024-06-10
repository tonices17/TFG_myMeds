<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myMeds - Calendario</title>

    <link rel="icon" href="{{ asset('assets/logo.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Full Calendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <style>
        .fc-toolbar-title {
            font: 400 2.5rem fuentePagina;
            color: black;
        }

        .custom-event {
            margin-bottom: 1px;
        }

        .legend-container {
            display: flex;
            justify-content: center;
            margin: 1rem 0 1rem 0;
        }

        .legend {
            display: flex;
            align-items: center;
            margin-right: 1rem;
            font-family: fuentePagina;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            margin-right: 0.5rem;
            border-radius: 3px;
        }

        .chronic {
            background-color: #F36A5C;
        }

        .normal {
            background-color: #20c997;
        }

        /* Styles for the sidebar toggle button */
        .sidebar-toggle {
            display: none;
            background-color: #F36A5C;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 30px;
        }

        @media (max-width: 426px) {
            .sidebar-toggle {
                display: block;
            }

            .main-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .main-sidebar.active {
                transform: translateX(0);
                margin-left: 0px;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 flex-between">
                        <!-- Sidebar Toggle Button -->
                        <button class="sidebar-toggle" id="sidebarToggle">☰</button>
                        <div class="col-sm-12">
                            <h1 class="m-0 nav__logo-letra" style="text-align: center; color: black;">Calendario</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <!-- Legend -->
                                <div class="legend-container">
                                    <div class="legend">
                                        <div class="legend-color chronic"></div>
                                        <span>Tratamientos Crónicos</span>
                                    </div>
                                    <div class="legend">
                                        <div class="legend-color normal"></div>
                                        <span>Tratamientos Temporales</span>
                                    </div>
                                </div>
                                <!-- Calendar -->
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('layouts.partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- Full Calendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 750,
                buttonText: {
                    today: 'Hoy',
                },
                firstDay: 1,
                fixedWeekCount: false,
                events: @json($eventos),
                eventDidMount: function(info) {
                    info.el.classList.add('custom-event');
                    if (info.event.extendedProps.tipo === 'cronico') {
                        info.el.style.backgroundColor = '#F36A5C';
                    } else if (info.event.extendedProps.tipo === 'normal') {
                        info.el.style.backgroundColor = '#20c997';
                    }
                }
            });
            calendar.render();

            document.getElementById('sidebarToggle').addEventListener('click', function() {
                document.querySelector('.main-sidebar').classList.toggle('active');
            });

            document.addEventListener('click', function(event) {
                var sidebar = document.querySelector('.main-sidebar');
                var toggleButton = document.getElementById('sidebarToggle');
                if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>