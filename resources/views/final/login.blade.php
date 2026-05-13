@include('final.common')

@php begin('Iniciar Sesión', 'form'); @endphp

<main>
    <div id="form">
        <div><h3>Entrar al sindicato</h3></div>
        
        {{-- Añadimos la ruta y el método POST --}}
        <form action="/login" method="POST">
            {{-- Obligatorio en Laravel para no recibir un error 419 --}}
            @csrf

            {{-- Importante: el name="email" --}}
            <div> 
                Correo Electrónico 
                <input type="email" name="email" class="text-input" required> 
            </div>

            {{-- Importante: el name="password" y type="password" --}}
            <div> 
                Contraseña 
                <input type="password" name="password" class="text-input" required> 
            </div>

            @if($errors->any())
                <p style="color: red;">{{ $errors->first() }}</p>
            @endif

            <input type="submit" id="submit" value="Iniciar Sesión">
            <p class="registro-texto">
                ¿No tienes cuenta?
                <a href="{{ route('registro') }}">Regístrate aquí</a>
            </p>
        </form>
    </div>
</main>

{!! footer !!}