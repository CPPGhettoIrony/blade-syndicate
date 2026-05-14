<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Barberías</title>

    <style>
        *{
            box-sizing: border-box;
        }

        body{
            background-color: #111827;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 40px;
        }

        h1{
            text-align: center;
            margin-bottom: 45px;
            font-size: 38px;
        }

        .contenedor{
            max-width: 1450px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .card{
            background-color: #1f2937;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.35);
            transition: all 0.3s ease;
            min-height: 620px;
            display: flex;
            flex-direction: column;
        }

        .card h2{
            color: #fbbf24;
            margin: 0 0 20px 0;
            font-size: 28px;
            line-height: 1.2;
            min-height: 70px;

            display: flex;
            align-items: flex-start;
        }

        .imagen-barberia {
            width: 100%;
            height: 230px;
            object-fit: cover;
            border-radius: 16px;
            margin: 0 0 25px;
        }

        .card:hover{
            transform: translateY(-5px);
        }

        .contenido{
            flex: 1;
        }

        .dato{
            margin-bottom: 12px;
            font-size: 17px;
            line-height: 1.5;
        }

        .titulo{
            font-weight: bold;
            color: #d1d5db;
        }

        .boton-editar{
            margin-top: 25px;
        }

        .boton-editar a{
            display: inline-block;
            background-color: #f59e0b;
            color: #111827;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .boton-editar a:hover{
            background-color: #fbbf24;
        }

        .form-eliminar{
            margin-top: 15px;
        }

        .form-eliminar button{
            background-color: #dc2626;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            font-size: 15px;
        }

        .form-eliminar button:hover{
            background-color: #ef4444;
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
            transition: 0.3s;
        }

        .boton-crear a:hover{
            background-color: #fbbf24;
        }

        .btn-panel{
            background-color: #374151 !important;
            color: white !important;
            margin-left: 15px;
        }

        .btn-panel:hover{
            background-color: #4b5563 !important;
        }

    </style>
</head>

<body>

    <h1>💈 Listado de Barberías</h1>

    <div class="contenedor">

        @foreach($barberias as $barberia)

            <div class="card">

                <h2>{{ $barberia->nombre }}</h2>

                @if($barberia->imagen)
                    <img 
                        src="{{ asset('img/' . $barberia->imagen) }}" 
                        alt="{{ $barberia->nombre }}" 
                        class="imagen-barberia"
                    >
                @endif

                <div class="contenido">

                    <div class="dato">
                        <span class="titulo">Ciudad:</span>
                        {{ $barberia->ciudad }}
                    </div>

                    <div class="dato">
                        <span class="titulo">Dirección:</span>
                        {{ $barberia->direccion }}
                    </div>

                    <div class="dato">
                        <span class="titulo">Teléfono:</span>
                        {{ $barberia->telefono }}
                    </div>

                    <div class="dato">
                        <span class="titulo">Horario:</span>
                        {{ $barberia->horario_apertura }}
                        -
                        {{ $barberia->horario_cierre }}
                    </div>

                </div>

                <div class="boton-editar">
                    <a href="/admin/barberias/{{ $barberia->id }}/edit">
                        Editar
                    </a>
                </div>

                <form action="/admin/barberias/{{ $barberia->id }}" method="POST" class="form-eliminar">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Eliminar
                    </button>
                </form>

            </div>

        @endforeach

    </div>

    <div class="boton-crear">
        <a href="/admin/barberias/create">
            Añadir nueva barbería
        </a>
        <a href="/panel" class="btn-panel">
            Volver al Panel
        </a>
    </div>

</body>

</html>