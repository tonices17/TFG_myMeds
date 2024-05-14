<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myMeds - Users</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                                                <td>{{$tratamiento->user->name}}</td>
                                                <td>{{$tratamiento->medicamento}}</td>
                                                <td>{{$tratamiento->fecha_inicio}}</td>
                                                @php
                                                // Convertir la fecha de inicio a objeto DateTime
                                                $fechaInicioObj = new DateTime($tratamiento->fecha_inicio);

                                                // Clonar la fecha de inicio para no modificarla
                                                $fechaFinalObj = clone $fechaInicioObj;

                                                // Sumar la duración del tratamiento a la fecha de inicio
                                                $fechaFinalObj->modify('+' . $tratamiento->duracion_tratamiento . '
                                                days');

                                                // Obtener la fecha final como una cadena en formato YYYY-MM-DD
                                                $fechaFinal = $fechaFinalObj->format('Y-m-d');
                                                @endphp
                                                <td>{{$fechaFinal}}</td>
                                                <td>{{$tratamiento->frecuencia_toma}}</td>
                                                <td>
                                                    <a href="{{ route('tratamientos.edit', $tratamiento->id) }}"
                                                        class="btn btn-success">
                                                        Editar
                                                    </a>

                                                    <form action="{{ route('tratamientos.destroy', $tratamiento->id) }}"
                                                        id="delete_form" method="POST"
                                                        onsubmit="return confirm('Esta seguro que desea eliminar el registro?')"
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
    <script>
        $(document).ready(function() {
            $('#user_table').DataTable();
        });
    </script>
</body>

</html>