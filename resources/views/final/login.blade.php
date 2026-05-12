@include('final.common')

<?php
    begin('Iniciar Sesión', 'form');
?>

<main>
    <div id="form">
        <div><h3>Entrar al sindicato</h3></div>
        <form>
            <div> Correo Electrónico <input type="email" class="text-input"> </div>
            <div> Contraseña <input type="text" class="text-input"> </div>
            <input type="submit", id="submit", value="Iniciar Sesión">
        </form>
    </div>
</main>

<?php
    echo footer;
?>