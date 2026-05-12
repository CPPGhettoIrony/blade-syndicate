@include('final.common')

@php
    begin('Editar Reserva', 'form');
@endphp

<main>
    <div id="form">
        <h2>Editar Cita</h2>

        <form action="/citas/{{ $cita->id }}" method="POST">
            @csrf
            @method('PUT')

            {{-- 1. ID CLIENTE --}}
            @if(array_key_exists('id_cliente', $campos))
                <input type="hidden" name="id_cliente" value="{{ $cita->id_cliente }}">
            @else
                <label>Cliente:</label>
                <select name="id_cliente">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" @selected($cita->id_cliente == $cliente->id)>
                            {{ $cliente->nombre }} {{ $cliente->apellidos }}
                        </option>
                    @endforeach
                </select>
            @endif

            {{-- 2. ID BARBERO --}}
            @if(array_key_exists('id_barbero', $campos))
                <input type="hidden" name="id_barbero" value="{{ $cita->id_barbero }}">
            @else
                <label>Barbero:</label>
                <select name="id_barbero">
                    @foreach($barberos as $barbero)
                        <option value="{{ $barbero->id }}" @selected($cita->id_barbero == $barbero->id)>
                            {{ $barbero->nombre }} {{ $barbero->apellidos }}
                        </option>
                    @endforeach
                </select>
            @endif

            {{-- 3. ID BARBERÍA --}}
            @if(array_key_exists('id_barberia', $campos))
                <input type="hidden" name="id_barberia" value="{{ $cita->id_barberia }}">
            @else
                <label>Barbería:</label>
                <select name="id_barberia">
                    @foreach($barberias as $barberia)
                        <option value="{{ $barberia->id }}" @selected($cita->id_barberia == $barberia->id)>
                            {{ $barberia->nombre }}
                        </option>
                    @endforeach
                </select>
            @endif

            {{-- 4. SERVICIO --}}
            <label>Servicio:</label>
            <select name="id_servicio">
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" @selected($cita->id_servicio == $servicio->id)>
                        {{ $servicio->nombre }} - {{ $servicio->precio }} €
                    </option>
                @endforeach
            </select>

            <label>Fecha y Hora</label>
            
            <input type="date" name="fecha" value="{{ \Carbon\Carbon::parse($cita->fecha)->format('Y-m-d') }}">
            <input type="time" name="hora_inicio" value="{{ \Carbon\Carbon::parse($cita->hora_inicio)->format('H:i') }}">

            {{-- TODO: Ocultar si el que edita la reserva es un usuario normal --}}
            @if(array_key_exists('estado', $campos))
                <input type="hidden" name="campos" value="{{ $cita->estado }}">
            @else
                <label>Estado:</label>
                <select name="estado">
                    @foreach($estados as $estado)
                        <option value="{{ $estado }}" @selected($cita->estado == $estado)>
                            {{ $estado }}
                        </option>
                    @endforeach
                </select>
            @endif

            <button type="submit">Actualizar cita</button>
        </form>

        <a href="/citas" style="text-decoration: none;" class="button">
            Cancelar
        </a>
    </div>
</main>

{!! footer !!}