<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Servicio</title>

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

        input, textarea{
            width: 100%;
            padding: 13px 15px;
            margin-bottom: 16px;
            border-radius: 10px;
            border: 1px solid #374151;
            background-color: #111827;
            color: white;
            font-size: 15px;
        }

        textarea{
            min-height: 100px;
            resize: vertical;
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

        <h1>Crear Servicio</h1>

        <form action="/servicios" method="POST">
            @csrf

            <input type="text" name="nombre" placeholder="Nombre del servicio">

            <textarea name="descripcion" placeholder="Descripción"></textarea>

            <input type="number" step="0.01" name="precio" placeholder="Precio">

            <input type="number" name="duracion_min" placeholder="Duración en minutos">

            <button type="submit">Guardar servicio</button>
        </form>

        <a href="/servicios" class="volver">Volver al listado</a>

    </div>

</body>
</html>