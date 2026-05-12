@include('final.common')

<?php
    begin('Reservar', 'form');
?>

<main>
    <div id="form">

        <h2>Nueva Cita</h2>

        <form action="/citas" method="POST">

            @csrf

            @if(array_key_exists('id_cliente', $campos))
                <input type="hidden" name="id_cliente" value="{{ $campos['id_cliente'] }}">
            @else
                <label>Cliente:</label>
                <select name="id_cliente">
                    <option value="">Selecciona cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nombre }} {{ $cliente->apellidos }}
                        </option>
                    @endforeach
                </select>
            @endif

            @if(array_key_exists('id_barbero', $campos))
                <input type="hidden" name="id_barbero" value="{{ $campos['id_barbero'] }}">
            @else
                <label>Barbero:</label>
                <select name="id_barbero">
                    <option value="">Selecciona barbero</option>
                    @foreach($barberos as $barbero)
                        <option value="{{ $barbero->id }}">
                            {{ $barbero->nombre }} {{ $barbero->apellidos }}
                        </option>
                    @endforeach
                </select>
            @endif

            @if(array_key_exists('id_barberia', $campos))
                <input type="hidden" name="id_barberia" value="{{ $campos['id_barberia'] }}">
            @else
                <label>Barberia:</label>
                <select name="id_barberia">
                    <option value="">Selecciona barbería</option>
                    @foreach($barberias as $barberia)
                        <option value="{{ $barberia->id }}">
                            {{ $barberia->nombre }}
                        </option>
                    @endforeach
                </select>
            @endif

            <label>Servicio:</label>
            <select name="id_servicio">
                <option value="">Selecciona servicio</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">
                        {{ $servicio->nombre }} - {{ $servicio->precio }} €
                    </option>
                @endforeach
            </select>

            <label>Fecha y Hora</label>

            <input type="date" name="fecha">

            <input type="time" name="hora_inicio">

            <button type="submit">
                Guardar cita
            </button>

        </form>

        <a href="/citas" style="text-decoration: none;" class="button">
            Cancelar
        </a>

    </div>
</main>

<?php
    echo footer;
?>