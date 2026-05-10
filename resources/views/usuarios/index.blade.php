<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>

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

        form{ margin: 0; }

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

    <h1>Usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Barbería</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }} {{ $usuario->apellidos }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->telefono }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>{{ $usuario->barberia->nombre ?? 'Sin barbería' }}</td>

                    <td>
                        <div class="acciones">
                            <a href="/usuarios/{{ $usuario->id }}/edit" class="btn-editar">
                                Editar
                            </a>

                            <form action="/usuarios/{{ $usuario->id }}" method="POST">
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
        <a href="/usuarios/create">Nuevo usuario</a>
    </div>

</body>
</html>