<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Barbería</title>

    <style>

        *{
            box-sizing: border-box;
        }

        body{
            background: linear-gradient(135deg, #0f172a, #111827);
            color: white;
            font-family: Arial;
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
        }

    </style>

</head>

<body>

    <div class="page">

        <h1>Editar Barbería</h1>

        <form action="/barberias/{{ $barberia->id }}" method="POST">

            @csrf
            @method('PUT')

            <input
                type="text"
                name="nombre"
                value="{{ $barberia->nombre }}"
            >

            <input
                type="text"
                name="ciudad"
                value="{{ $barberia->ciudad }}"
            >

            <input
                type="text"
                name="direccion"
                value="{{ $barberia->direccion }}"
            >

            <input
                type="text"
                name="codigo_postal"
                value="{{ $barberia->codigo_postal }}"
            >

            <input
                type="text"
                name="telefono"
                value="{{ $barberia->telefono }}"
            >

            <input
                type="time"
                name="horario_apertura"
                value="{{ $barberia->horario_apertura }}"
            >

            <input
                type="time"
                name="horario_cierre"
                value="{{ $barberia->horario_cierre }}"
            >

            <button type="submit">
                Actualizar Barbería
            </button>

        </form>

    </div>

</body>

</html>