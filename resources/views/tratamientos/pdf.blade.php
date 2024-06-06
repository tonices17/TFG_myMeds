<!DOCTYPE html>
<html>

<head>
    <title>Tratamientos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            display: flex;
            /* Para colocar elementos en la misma línea */
            align-items: center;
            /* Centrar verticalmente los elementos */
            margin-bottom: 20px;
        }

        .header img {
            width: 50px;
            height: auto;
            margin-right: 10px;
            /* Espacio entre el logo y el texto */
        }

        .header h1 {
            color: #F36A5C;
            margin: 0;
        }

        .header h2 {
            color: #20c997;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #F36A5C;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .admin-column {
            display: none;
        }
    </style>
</head>

<body>
    @php
    $usuario = Auth::user();
    @endphp
    <div class="header">
        <img src="{{ public_path('assets/logo.png') }}" alt="Logo">
        <h1 style="display: inline-block">myMeds</h1>
        <h2>Tratamientos de {{ $usuario->name }}</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                @if(Auth::user()->hasRole('admin'))
                <th class="admin-column">Usuario</th>
                @endif
                <th>Medicamento</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Frecuencia de toma</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tratamientos as $tratamiento)
            <tr>
                <td>{{ $tratamiento->nombre }}</td>
                <td>{{ $tratamiento->descripcion }}</td>
                @if(Auth::user()->hasRole('admin'))
                <td class="admin-column">{{ $tratamiento->user->name }}</td>
                @endif
                <td>{{ $tratamiento->medicamento }}</td>
                <td>{{ $tratamiento->fecha_inicio }}</td>
                <td>{{ $tratamiento->duracion_tratamiento }}</td>
                <td>{{ $tratamiento->frecuencia_toma }} horas</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>