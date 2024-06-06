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
                            <h1 class="m-0 nav__logo-letra" style="text-align: center; color: black;">Tratamientos
                            </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 nav__logo-letra" style="color: black">Nuevo Tratamiento</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="{{ route('tratamientos.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nombre" class="required">Nombre</label>
                                            <input type="text" name="nombre" id="nombre"
                                                class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}"
                                                placeholder="Ingrese el nombre del tratamiento"
                                                value="{{old('nombre', '')}}">
                                            @if ($errors->has('nombre'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion" class="required">Descripcion </label>
                                            <input type="text-area" name="descripcion" id="descripcion"
                                                class="form-control {{$errors->has('descripcion') ? 'is-invalid' : ''}}"
                                                placeholder="Ingrese la descripción del tratamiento"
                                                value="{{old('descripcion', '')}}">
                                            @if ($errors->has('descripcion'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label for="medicamento" class="required">Medicamento </label>
                                            <div class="search-container">
                                                <input type="text" name="medicamento" id="search"
                                                    placeholder="Escriba el nombre del medicamento..."
                                                    class="form-control {{$errors->has('medicamento') ? 'is-invalid' : ''}}"
                                                    value="{{ old('medicamento', $nombre ?? '') }}">
                                                <ul id="results" class="dropdown"></ul>
                                            </div>
                                            @if ($errors->has('medicamento'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('medicamento') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_inicio" class="required">Fecha de inicio </label>
                                            <input type="date" name="fecha_inicio" id="fecha_inicio"
                                                class="form-control {{$errors->has('fecha_inicio') ? 'is-invalid' : ''}}"
                                                placeholder="Ingresa la fecha de inicio del tratamiento"
                                                value="{{ old('fecha_inicio', '') }}">
                                            @if ($errors->has('fecha_inicio'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="duracion_tratamiento" class="required">Duración del tratamiento
                                            </label>
                                            <input type="number" name="duracion_tratamiento" id="duracion_tratamiento"
                                                class="form-control {{$errors->has('duracion_tratamiento') ? 'is-invalid' : ''}}"
                                                placeholder="Ingresa la duracion del tratamiento (en días)"
                                                value="{{ old('duracion_tratamiento', '') }}">
                                            <div class="form-check">
                                                <input type="checkbox" id="indefinido" name="indefinido"
                                                    class="form-check-input">
                                                <label for="indefinido" class="form-check-label">Indefinido</label>
                                            </div>
                                            @if ($errors->has('duracion_tratamiento'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('duracion_tratamiento') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="frecuencia_toma" class="required">Frecuencia de la toma
                                            </label>
                                            <input type="number" name="frecuencia_toma" id="frecuencia_toma"
                                                class="form-control {{$errors->has('frecuencia_toma') ? 'is-invalid' : ''}}"
                                                placeholder="Ingresa la frecuencia de toma (en horas)"
                                                value="{{ old('frecuencia_toma', '') }}">
                                            @if ($errors->has('frecuencia_toma'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('frecuencia_toma') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="row d-print-none mt-2">
                                            <div class="col-12 text-right">
                                                <a class="btn btn-danger" href="{{route('tratamientos.index')}}">
                                                    <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                                    Regresar
                                                </a>
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
    <!-- Script para el checkbox -->
    <script>
        document.getElementById('indefinido').addEventListener('change', function () {
            var duracionInput = document.getElementById('duracion_tratamiento');
            if (this.checked) {
                duracionInput.type = "hidden";
                duracionInput.value = 0;
            } else {
                duracionInput.type = "number";
            }
        });
    </script>
    <script src="{{ asset('js/scriptMedicamentos.js') }}"></script>
</body>
</body>

</html>