@include('final.common')

@php
    begin("Dashboard", "dashboard");
    menu([
        menu_element('Índice', '/'), 
        menu_element('Nuestras Barberías', '/barberias')
    ]);
@endphp

<main>
    <h2>Bienvenido, Elfo7773</h2>

    <div id="panel-usuario">
        <div id="seccion-reservas">
            <h3>Mis Reservas</h3>
            <table class="tabla-reservas" width="100%" border="1" cellspacing="0" cellpadding="10">
                <thead>
                    <tr>
                        @foreach ($campos as $campo)
                            <th>{{ clean_param($campo) }}</th>
                        @endforeach
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        <tr>
                            @foreach ($campos as $campo)
                                <td>
                                    {{-- Pasamos el nombre de la clase como String --}}
                                    {{ id_to_name_if_exists($campo, $cita->$campo) }}
                                </td>
                            @endforeach
                            <td>
                                <a href="/citas/{{ $cita->id }}/edit" class="button">Editar</a> <br>
                                <form action="/citas/{{ $cita->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Cancelar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

{!! footer !!}