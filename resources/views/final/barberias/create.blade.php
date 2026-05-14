<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Barbería</title>

    <style>
        *{
            box-sizing: border-box;
        }

        body{
            background: linear-gradient(135deg, #0f172a, #111827);
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
            max-width: 520px;
            padding: 30px;
        }

        h1{
            text-align: center;
            margin-bottom: 25px;
            font-size: 34px;
        }

        form{
            background-color: #1f2937;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.35);
        }

        input{
            width: 100%;
            padding: 13px 15px;
            margin-bottom: 16px;
            border-radius: 10px;
            border: 1px solid #374151;
            background-color: #111827;
            color: white;
            font-size: 15px;
            outline: none;
        }

        input::placeholder{
            color: #9ca3af;
        }

        input:focus{
            border-color: #f59e0b;
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
            margin-top: 5px;
        }

        button:hover{
            background-color: #fbbf24;
        }

        .volver{
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #d1d5db;
            text-decoration: none;
        }

        .volver:hover{
            color: #f59e0b;
        }

        textarea{
            width: 100%;
            min-height: 110px;
            padding: 13px 15px;
            margin-bottom: 16px;
            border-radius: 10px;
            border: 1px solid #374151;
            background-color: #111827;
            color: white;
            font-size: 15px;
            font-family: Arial;
            outline: none;
            resize: vertical;
        }

        textarea:focus{
            border-color: #f59e0b;
        }
        
    </style>

</head>
<body>

    <div class="page">

        <h1>Crear Barbería</h1>

        <form action="/admin/barberias" method="POST" enctype="multipart/form-data">

            @csrf

            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="ciudad" placeholder="Ciudad">
            <input type="text" name="direccion" placeholder="Dirección">
            <input type="text" name="codigo_postal" placeholder="Código Postal">
            <input type="text" name="telefono" placeholder="Teléfono">
            <textarea name="descripcion" placeholder="Descripción"></textarea>
            <input type="file" name="imagen">
            <input type="time" name="horario_apertura">
            <input type="time" name="horario_cierre">

            <button type="submit">Guardar Barbería</button>

        </form>

        <a href="/admin/barberias" class="volver">Volver al listado</a>

    </div>

</body>

</html>