<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myMeds - Tratamientos</title>

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
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.11.5/datatables.min.css" />

    <style>
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
                            <h1 class="m-0 nav__logo-letra" style="text-align: center; color: black;">Tratamientos</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ route('tratamientos.create') }}" class="btn mb-4"
                                        style="background: #F36A5C; color: white;">Nuevo
                                        Tratamiento</a>
                                    <a href="{{ route('tratamientos.pdf') }}" class="btn mb-4"
                                        style="background: #F36A5C; color: white;">
                                        Descargar PDF
                                    </a>
                                    <table class="table table-bordered" id="tratamiento_table">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                @if(Auth::user()->hasRole('admin'))
                                                <th>Usuario</th>
                                                @endif
                                                <th>Medicamento</th>
                                                <th>Fecha Inicio</th>
                                                <th>Fecha Fin</th>
                                                <th>Frecuencia de toma</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tratamientos as $tratamiento)
                                            <tr>
                                                <td>{{$tratamiento->nombre}}</td>
                                                <td>{{$tratamiento->descripcion}}</td>
                                                @if(Auth::user()->hasRole('admin'))
                                                <td>{{$tratamiento->user->name}}</td>
                                                @endif
                                                <td>{{$tratamiento->medicamento}}</td>
                                                <td>{{$tratamiento->fecha_inicio}}</td>
                                                {{-- @php
                                                $fecha = date_create_from_format('Y-m-d', $tratamiento->fecha_inicio);
                                                if ($tratamiento->duracion_tratamiento == 0) {
                                                $fechaFinal = "Indefinido"
                                                } else {
                                                $fechaFinal = date_modify($fecha, '+' .
                                                $tratamiento->duracion_tratamiento . ' days');
                                                $fechaFinal = date_format($fechaFinal, 'Y-m-d');
                                                }
                                                @endphp --}}
                                                <td>{{$tratamiento->duracion_tratamiento}}</td>
                                                <td>{{$tratamiento->frecuencia_toma}} horas</td>
                                                <td>
                                                    <a href="{{ route('tratamientos.edit', $tratamiento->id) }}"
                                                        class="btn btn-success">
                                                        Editar
                                                    </a>

                                                    <form action="{{ route('tratamientos.destroy', $tratamiento->id) }}"
                                                        id="delete_form" method="POST"
                                                        onsubmit="return confirm('Esta seguro que desea eliminar el tratamiento?')"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-danger" value="Eliminar">
                                                    </form>
                                                </td>
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
    <!-- Datatable -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.11.5/datatables.min.js">
    </script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#tratamiento_table').DataTable({
            "paging": true, // Activar paginación
            "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });
        });

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