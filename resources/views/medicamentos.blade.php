<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myMeds - Medicamentos</title>

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
    <style>
        .search-container {
            position: relative;
            width: 100%;
        }

        #search {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #results {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            list-style: none;
            padding: 0;
            margin: 0;
            background: white;
            border: 1px solid #ccc;
            border-top: none;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
        }

        #results li {
            padding: 10px;
            cursor: pointer;
        }

        #results li:hover {
            background-color: #f0f0f0;
        }

        .medicamento-detalle {
            margin-top: 20px;
            text-align: left;
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
                        <button class="sidebar-toggle" id="sidebarToggle">☰</button>
                        <div class="col-sm-12">
                            <h1 class="m-0 nav__logo-letra" style="text-align: center; color: black;">Medicamentos</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="container">
                <div class="search-container">
                    <form action="{{ route('tratamientos.create') }}" method="GET">
                        <input type="text" id="search" name="nombre" placeholder="Escriba el nombre del medicamento...">
                        <ul id="results" class="dropdown"></ul>
                        <button type="submit" class="btn mb-4" style="background: #F36A5C; color: white;">Crear un
                            tratamiento</button>
                    </form>
                </div>
                <div id="medicamento-detalle" class="medicamento-detalle"></div>
            </div>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> --}}
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
    <script src="{{ asset('js/scriptMedicamentos.js') }}"></script>
    <script>
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
    </script>
</body>

</html>