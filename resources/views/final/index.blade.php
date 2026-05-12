@include('final.common')

<?php
    begin("Índice", "index");
    menu([
        menu_element("Nuestras Barberías", '/barberias'),
    ]);
?>

<main>

    <div id="Recomendaciones">
        <h2>Recomendaciones</h2>
        <div id="Lista_Recomendaciones">
            @foreach($barberias as $barberia)
            <div>
                {{ $barberia->nombre }}
                <img src=img/{{ $barberia->imagen }}>
            </div>
            @endforeach
        </div>
    </div>

    <div id="Secciones">
        <div>
            <h3>Para Clientes:</h3>
            <p>
                Olvida las esperas al teléfono y las agendas apretadas. Con nuestra plataforma, 
                tienes el control total: reserva en segundos las 24 horas del día, elige a tu 
                barbero de confianza y recibe recordatorios automáticos para que nunca pierdas 
                tu cita. Estilo y comodidad a un solo clic.
            </p>
        </div>
        <div>
            <h3>Para Profesionales:</h3>
            <p>
                Digitaliza tu flujo de trabajo y haz crecer tu negocio. Gestiona tus horarios 
                sin interrupciones, reduce el ausentismo con avisos automáticos y proyecta una 
                imagen premium con un perfil personalizado que muestra tu portafolio y 
                valoraciones reales. Tú te encargas de la navaja, nosotros de la logística.
            </p>
        </div>
    </div>

</main>

<?php
    echo footer;
?>