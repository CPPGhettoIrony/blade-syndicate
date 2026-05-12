@include('final.common')

<?php
    begin("Nuestras Barberías", "lista");
    menu([
        ['texto' => 'Índice', 'enlace' => '/'], 
        ['texto' => 'Citas', 'enlace' => '/citas'], 
    ]);
?>

<main>

    <div id="Lista">

        <div>
            <h2>Nuestras Barberías</h2>
        </div>

        @foreach ($barberias as $barberia)
            <div>
                <img src="img/{{ $barberia->imagen }}">
                <div> 
                    <h3>{{ $barberia->nombre }}</h3>
                    <div>{{ $barberia->descripcion }}</div>
                    {{-- TODO: Ocultar si el usuario es un barbero o admin --}}
                    <a href="/reserva/{{ $barberia->id }}" class="button">Reservar</a>
                </div>
            </div>
        @endforeach
        
    </div>

</main>

<?php
    echo footer;
?>