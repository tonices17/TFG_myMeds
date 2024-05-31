<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myMeds - Calendario</title>

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
            /* Ajusta este valor para más o menos espacio */
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
            font-family: 'Source Sans Pro', sans-serif;
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
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 flex-between">
                        <div class="col-sm-12">
                            <h1 class="m-0 nav__logo-letra" style="text-align: center; color: black;">Calendario</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
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
                                        <span>Tratamientos preventivos</span>
                                    </div>
                                </div>
                                <!-- Calendar -->
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

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
                events: @json($eventos), // Pasar los eventos al calendario
                eventDidMount: function(info) {
                    // Agregar una clase personalizada a los eventos
                    info.el.classList.add('custom-event');
                    if (info.event.extendedProps.tipo === 'cronico') {
                        info.el.style.backgroundColor = '#F36A5C';
                    } else if (info.event.extendedProps.tipo === 'normal') {
                        info.el.style.backgroundColor = '#20c997';
                    }
                }
            });
            calendar.render();
        });
    </script>
</body>

</html>