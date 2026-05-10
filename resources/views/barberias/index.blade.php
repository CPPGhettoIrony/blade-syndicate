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
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 28px;
        }

        .card{
            background-color: #1f2937;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.35);
            transition: all 0.3s ease;
            min-height: 330px;
            display: flex;
            flex-direction: column;
        }

        .card:hover{
            transform: translateY(-5px);
        }

        .card h2{
            color: #fbbf24;
            margin: 0 0 25px 0;
            font-size: 30px;
            line-height: 1.2;
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

    </style>
</head>

<body>

    <h1>💈 Listado de Barberías</h1>

    <div class="contenedor">

        @foreach($barberias as $barberia)

            <div class="card">

                <h2>{{ $barberia->nombre }}</h2>

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
                    <a href="/barberias/{{ $barberia->id }}/edit">
                        Editar
                    </a>
                </div>

                <form action="/barberias/{{ $barberia->id }}" method="POST" class="form-eliminar">
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
        <a href="/barberias/create">
            Añadir nueva barbería
        </a>
    </div>

</body>

</html>