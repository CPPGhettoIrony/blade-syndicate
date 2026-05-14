<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>

    <style>
        *{ box-sizing: border-box; }

        body{
            background-color: #111827;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .page{
            width: 100%;
            max-width: 600px;
            padding: 30px;
        }

        h1{
            text-align: center;
            margin-bottom: 30px;
            font-size: 38px;
        }

        form{
            background-color: #1f2937;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.35);
        }

        input, select{
            width: 100%;
            padding: 13px 15px;
            margin-bottom: 16px;
            border-radius: 10px;
            border: 1px solid #374151;
            background-color: #111827;
            color: white;
            font-size: 15px;
        }

        button{
            width: 100%;
            background-color: #f59e0b;
            color: #111827;
            padding: 14px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }

        .volver{
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #d1d5db;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="page">

        <h1>Editar Usuario</h1>

        <form action="/admin/usuarios/{{ $usuario->id }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="nombre" value="{{ $usuario->nombre }}">
            <input type="text" name="apellidos" value="{{ $usuario->apellidos }}">
            <input type="email" name="email" value="{{ $usuario->email }}">
            <input type="text" name="telefono" value="{{ $usuario->telefono }}">

            <select name="rol">
                <option value="admin_general" @selected($usuario->rol == 'admin_general')>Admin general</option>
                <option value="admin_local" @selected($usuario->rol == 'admin_local')>Admin local</option>
                <option value="barbero" @selected($usuario->rol == 'barbero')>Barbero</option>
                <option value="cliente" @selected($usuario->rol == 'cliente')>Cliente</option>
            </select>

            <select name="id_barberia">
                <option value="">Sin barbería</option>

                @foreach($barberias as $barberia)
                    <option value="{{ $barberia->id }}" @selected($usuario->id_barberia == $barberia->id)>
                        {{ $barberia->nombre }}
                    </option>
                @endforeach
            </select>

            <input type="password" name="password" placeholder="Nueva contraseña opcional">

            <button type="submit">Actualizar usuario</button>
        </form>

        <a href="/admin/usuarios" class="volver">Volver al listado</a>

    </div>

</body>
</html>