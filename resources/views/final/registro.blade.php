@include('final.common')

@php begin('Registro', 'form'); @endphp

<main>
    <div id="form" class="registro-form">
        <div>
            <h3>Crear cuenta</h3>
        </div>

        <form action="{{ route('registro.guardar') }}" method="POST">
            @csrf

            <div>
                Nombre
                <input type="text" name="nombre" class="text-input" value="{{ old('nombre') }}" required>
            </div>

            <div>
                Apellidos
                <input type="text" name="apellidos" class="text-input" value="{{ old('apellidos') }}" required>
            </div>

            <div>
                Teléfono
                <input type="text" name="telefono" class="text-input" value="{{ old('telefono') }}" required>
            </div>

            <div>
                Correo Electrónico
                <input type="email" name="email" class="text-input" value="{{ old('email') }}" required>
            </div>

            <div>
                Contraseña
                <input type="password" name="password" class="text-input" required>
            </div>

            <div>
                Repetir Contraseña
                <input type="password" name="password_confirmation" class="text-input" required>
            </div>

            @if ($errors->any())
                <div class="errores">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <input type="submit" id="submit" value="Registrarse">

            <p class="registro-texto">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}">Inicia sesión</a>
            </p>
        </form>
    </div>
</main>

{!! footer !!}