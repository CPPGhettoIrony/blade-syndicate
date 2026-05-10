<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicios</title>

    <style>
        *{ box-sizing: border-box; }

        body{
            background-color: #111827;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 40px;
        }

        h1{
            text-align: center;
            font-size: 42px;
            margin-bottom: 45px;
        }

        table{
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background-color: #1f2937;
            border-radius: 18px;
            overflow: hidden;
        }

        th{
            background-color: #f59e0b;
            color: #111827;
            padding: 18px;
            text-align: left;
        }

        td{
            padding: 18px;
            border-bottom: 1px solid #374151;
        }

        .acciones{
            display: flex;
            gap: 10px;
        }

        .btn-editar{
            background-color: #f59e0b;
            color: #111827;
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        form{
            margin: 0;
        }

        .btn-eliminar{
            background-color: #dc2626;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        .boton-crear{
            text-align: center;
            margin-top: 40px;
        }

        .boton-crear a{
            background-color: #f59e0b;
            color: #111827;
            padding: 14px 28px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Servicios</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Duración</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->nombre }}</td>
                    <td>{{ $servicio->descripcion }}</td>
                    <td>{{ $servicio->precio }} €</td>
                    <td>{{ $servicio->duracion_min }} min</td>
                    <td>
                        <div class="acciones">
                            <a href="/servicios/{{ $servicio->id }}/edit" class="btn-editar">
                                Editar
                            </a>

                            <form action="/servicios/{{ $servicio->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-eliminar">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="boton-crear">
        <a href="/servicios/create">Nuevo servicio</a>
    </div>

</body>
</html>