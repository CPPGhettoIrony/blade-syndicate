<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>

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

        <h1>Crear Usuario</h1>

        <form action="/usuarios" method="POST">
            @csrf

            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellidos" placeholder="Apellidos">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="telefono" placeholder="Teléfono">

            <select name="rol">
                <option value="">Selecciona rol</option>
                <option value="admin_general">Admin general</option>
                <option value="admin_local">Admin local</option>
                <option value="barbero">Barbero</option>
                <option value="cliente">Cliente</option>
            </select>

            <select name="id_barberia">
                <option value="">Sin barbería</option>
                @foreach($barberias as $barberia)
                    <option value="{{ $barberia->id }}">
                        {{ $barberia->nombre }}
                    </option>
                @endforeach
            </select>

            <input type="password" name="password" placeholder="Contraseña">

            <button type="submit">Guardar usuario</button>
        </form>

        <a href="/usuarios" class="volver">Volver al listado</a>

    </div>

</body>
</html>