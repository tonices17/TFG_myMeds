<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myMeds - Medicamentos</title>

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
                            <h1 class="m-0 nav__logo-letra" style="text-align: center; color: black;">Medicamentos</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <form id="searchForm">
                <input type="text" id="searchInput" placeholder="Buscar medicamentos...">
            </form>

            <div id="results"></div>


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
    <script>
        const searchInput = document.getElementById('searchInput');
        const resultsDiv = document.getElementById('results');
    
        searchInput.addEventListener('keyup', async function() {
            const query = this.value.trim();
    
            if (query.length === 0) {
                resultsDiv.innerHTML = ''; // Limpiar los resultados si la consulta está vacía
                return;
            }
    
            try {
                const response = await fetch(`/api/medicamentos?query=${encodeURIComponent(query)}`);
                const data = await response.json();
    
                // Construir la lista de resultados
                let html = '<ul>';
                data.forEach(medicamento => {
                    html += `<li>${medicamento.nombre}</li>`;
                });
                html += '</ul>';
    
                resultsDiv.innerHTML = html;
            } catch (error) {
                console.error('Error al buscar medicamentos:', error);
            }
        });
    </script>
</body>

</html>