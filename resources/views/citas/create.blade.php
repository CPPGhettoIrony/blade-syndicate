<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nueva Cita</title>

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

        select, input{
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
    </style>
</head>

<body>

    <div class="page">

        <h1>Nueva Cita</h1>

        <form action="/citas" method="POST">

            @csrf

            <select name="id_cliente">
                <option value="">Selecciona cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">
                        {{ $cliente->nombre }} {{ $cliente->apellidos }}
                    </option>
                @endforeach
            </select>

            <select name="id_barbero">
                <option value="">Selecciona barbero</option>
                @foreach($barberos as $barbero)
                    <option value="{{ $barbero->id }}">
                        {{ $barbero->nombre }} {{ $barbero->apellidos }}
                    </option>
                @endforeach
            </select>

            <select name="id_barberia">
                <option value="">Selecciona barbería</option>
                @foreach($barberias as $barberia)
                    <option value="{{ $barberia->id }}">
                        {{ $barberia->nombre }}
                    </option>
                @endforeach
            </select>

            <select name="id_servicio">
                <option value="">Selecciona servicio</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">
                        {{ $servicio->nombre }} - {{ $servicio->precio }} €
                    </option>
                @endforeach
            </select>

            <input type="date" name="fecha">

            <input type="time" name="hora_inicio">

            <button type="submit">
                Guardar cita
            </button>

        </form>

        <a href="/citas" class="volver">Volver al listado</a>

    </div>

</body>

</html>