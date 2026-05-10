<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Citas</title>

    <style>

        form{
            margin: 0;
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
            margin-bottom: 50px;
            font-size: 42px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            background-color: #1f2937;
            border-radius: 20px;
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

        tr:hover{
            background-color: #374151;
        }

        .tabla-contenedor{
            max-width: 1400px;
            margin: auto;
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
            transition: 0.3s;
        }

        .btn-editar:hover{
            background-color: #fbbf24;
        }


        .btn-eliminar{
            background-color: #dc2626;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-eliminar:hover{
            background-color: #ef4444;
        }

    </style>

</head>

<body>

    <h1>📅 Listado de Citas</h1>
    <div class="tabla-contenedor">
        <table>

            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Barbero</th>
                    <th>Barbería</th>
                    <th>Servicio</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($citas as $cita)

                    <tr>

                        <td>
                            {{ $cita->cliente->nombre }}
                        </td>

                        <td>
                            {{ $cita->barbero->nombre }}
                        </td>

                        <td>
                            {{ $cita->barberia->nombre }}
                        </td>

                        <td>
                            {{ $cita->servicio->nombre }}
                        </td>

                        <td>
                            {{ $cita->fecha }}
                        </td>

                        <td>
                            {{ $cita->hora_inicio }} - {{ $cita->hora_fin }}
                        </td>

                        <td>
                            <div class="acciones">

                            <a href="/citas/{{ $cita->id }}/edit" class="btn-editar">
                                Editar
                            </a>

                            
                            <form action="/citas/{{ $cita->id }}" method="POST">

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
    
    </div>

    <div class="boton-crear">
        <a href="/citas/create">
            Nueva cita
        </a>
    </div>

</body>

</html>