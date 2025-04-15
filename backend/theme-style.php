<?php 
function jdd_enqueue_admin_assets() {
    // Importa il file CSS per il backend dal tema child
    wp_enqueue_style(
        'jdd-admin-styles', // Nome univoco dello stile
        get_stylesheet_directory_uri() . '/backend/jdd-admin-style.css', // Percorso del file CSS nel tema child
        [],
        filemtime( get_stylesheet_directory() . '/backend/jdd-admin-style.css' ) // Versione basata sull'ultima modifica
    );

    // Importa il file JavaScript per il backend dal tema child
    wp_enqueue_script(
        'jdd-admin-scripts', // Nome univoco dello script
        get_stylesheet_directory_uri() . '/backend/jdd-admin-script.js', // Percorso del file JavaScript nel tema child
        ['jquery'], // Dipendenze, se necessarie
        filemtime( get_stylesheet_directory() . '/backend/jdd-admin-script.js' ), // Versione basata sull'ultima modifica
        true // Caricamento nel footer
    );
}
add_action( 'admin_enqueue_scripts', 'jdd_enqueue_admin_assets' );


// Cambia il Logo del Login di Accesso.
function jdd_custom_login_logo() {
    echo '<style type="text/css">
        #login h1 a {
            background-image: url(' . get_stylesheet_directory_uri() . '/assets/LogoWPAccess.png) !important;
            background-size: contain !important;
            width: 100% !important;
            height: 80px !important;
        }
    </style>';
}
add_action('login_head', 'jdd_custom_login_logo');
