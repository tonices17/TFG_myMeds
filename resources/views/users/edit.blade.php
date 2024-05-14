<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myMeds - Editar Usuario</title>

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
                            <h1 class="m-0 nav__logo-letra" style="text-align: center; color: black;">Editar Usuario {{
                                $user->name }}
                            </h1>
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
                                    <form method="POST" action="{{route('users.update', $user->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name" class="required">Nombre</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                                placeholder="Ingrese el nombre del usuario"
                                                value="{{old('name', $user->name)}}">
                                            @if ($errors->has('name'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="required">Email </label>
                                            <input type="email" name="email" id="email"
                                                class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                                placeholder="Ingrese el email del usuario"
                                                value="{{old('email', $user->email)}}">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number" class="required">Teléfono </label>
                                            <input type="number" name="phone_number" id="phone_number"
                                                class="form-control {{$errors->has('phone_number') ? 'is-invalid' : ''}}"
                                                placeholder="Ingrese el teléfono del usuario"
                                                value="{{old('phone_number', $user->phone_number)}}">
                                            @if ($errors->has('phone_number'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="required">Contraseña </label>
                                            <input type="password" name="password" id="password"
                                                class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                                                placeholder="Ingrese la contraseña del usuario">
                                            @if ($errors->has('password'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirmation" class="required">Repita la Contraseña
                                            </label>
                                            <input type="password" name="password_confirmation"
                                                id="password-confirmation" class="form-control"
                                                placeholder="Repita la contraseña del usuario">
                                        </div>
                                        <div class="row d-print-none mt-2">
                                            <div class="col-12 text-right">
                                                <a class="btn btn-danger" href="{{route('home')}}">
                                                    <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                                    Regresar
                                                </a>
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Editar
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#eliminarUsuario">
                                                    {{ __('Eliminar Usuario') }}
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
            <!-- Modal -->
            <div class="modal fade" id="eliminarUsuario" tabindex="-1" role="dialog"
                aria-labelledby="eliminarUsuarioLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eliminarUsuarioLabel">{{ __('Confirmar Eliminación') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ __('¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede
                            deshacer.') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancelar')
                                }}</button>
                            <form method="POST" action="#">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                            </form>
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