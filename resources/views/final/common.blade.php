<?php

    use Illuminate\Support\Str; // IMPORTANTE: Para que Str:: funcione
    use Illuminate\Support\Facades\Auth;

    function begin($name, $css) {
        // Usa asset() para las rutas o asegúrate de que lleven la barra inicial
        $logo = asset('img/logo.png');
        $style = asset("css/{$css}.css");
        echo "
            <!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Six+Caps&display=swap' rel='stylesheet'>
                <link rel='stylesheet' href='{$style}'>
                <title>BLADE SYNDICATE - {$name}</title>
            </head>
            <body>
            <header>
                <div id='logo'>
                    BLADE <img src='{$logo}'> SYNDICATE
                </div>
                <div id='contact'>
                    info@bladesyndicate.com | +34 600 000 000
                </div>
            </header>";
    }

    function menu_element($text, $link) {
        return ['texto' => $text, 'enlace' => $link];
    }

    function get_menu_element_html($element) {
        $ret = '<div><a href="' . $element['enlace'] . '">' . $element['texto'] . '</a></div>';
        return $ret;
    }

    function menu($elements) {
        echo '<div class="menu">';

            foreach ($elements as $element) {
                echo get_menu_element_html($element);
            }

            if (Auth::check()) {
                echo get_menu_element_html(menu_element('Barberías', '/barberias'));
            }

            if (Auth::check() && Auth::user()->rol === 'admin_general') {
                echo get_menu_element_html(menu_element('Dashboard', '/panel'));
            }

            echo (Auth::check()
                ? get_menu_element_html(menu_element('Cerrar Sesión', '/logout'))
                : get_menu_element_html(menu_element('Iniciar Sesión', '/login'))
            );

        echo '</div>';
    }

    // Corregido: Acceso dinámico al modelo
    function get_param($modelName, $id, $parameter) {
        $instance = $modelName::find($id);
        return $instance ? $instance->$parameter : 'N/A';
    }

    function id_to_name_if_exists($param, $id) {
        if(Str::startsWith($param, 'id_')) {
            // OJO: Aquí debes pasar el modelo al que pertenece la relación.
            // Si el campo es id_barberia, el modelo debería ser App\Models\Barberia
            
            // Lógica simplificada: mapear el prefijo al modelo
            $map = [
                'id_cliente'  => \App\Models\User::class,
                'id_barberia' => \App\Models\Barberia::class,
                'id_servicio' => \App\Models\Servicio::class,
                'id_barbero'  => \App\Models\User::class
            ];

            if(isset($map[$param])) {
                return get_param($map[$param], $id, 'nombre') 
                    . ' '
                    . get_param($map[$param], $id, 'apellidos');
            }
        }
        return $id;
    }

    function clean_param($text) {
        $text = str_replace('id_', '', $text);
        $text = str_replace('_', ' ', $text);
        return ucwords($text);
    }

    if(!defined('footer')) {
        define("footer",
            '<footer>
                &copy; 2026 BLADE SYNDICATE - Maestros de la Navaja. Todos los derechos reservados.
            </footer>
            </body>
            </html>'
        );
    }