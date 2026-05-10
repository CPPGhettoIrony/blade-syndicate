<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cita</title>

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

        <h1>Editar Cita</h1>

        <form action="/citas/{{ $cita->id }}" method="POST">

            @csrf
            @method('PUT')

            <select name="id_cliente">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" @selected($cita->id_cliente == $cliente->id)>
                        {{ $cliente->nombre }} {{ $cliente->apellidos }}
                    </option>
                @endforeach
            </select>

            <select name="id_barbero">
                @foreach($barberos as $barbero)
                    <option value="{{ $barbero->id }}" @selected($cita->id_barbero == $barbero->id)>
                        {{ $barbero->nombre }} {{ $barbero->apellidos }}
                    </option>
                @endforeach
            </select>

            <select name="id_barberia">
                @foreach($barberias as $barberia)
                    <option value="{{ $barberia->id }}" @selected($cita->id_barberia == $barberia->id)>
                        {{ $barberia->nombre }}
                    </option>
                @endforeach
            </select>

            <select name="id_servicio">
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" @selected($cita->id_servicio == $servicio->id)>
                        {{ $servicio->nombre }} - {{ $servicio->precio }} €
                    </option>
                @endforeach
            </select>

            <input type="date" name="fecha" value="{{ $cita->fecha }}">

            <input type="time" name="hora_inicio" value="{{ $cita->hora_inicio }}">

            <button type="submit">
                Actualizar cita
            </button>

        </form>

        <a href="/citas" class="volver">Volver al listado</a>

    </div>

</body>
</html>