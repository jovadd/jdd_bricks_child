<?php
// Enqueue di script.js con controllo per Bricks
function jdd_enqueue_scripts() {
    // Verifica che non ci si trovi nell'editor principale di Bricks
    if ( ! bricks_is_builder_main() ) {
        // Registra e carica il file script.js dalla directory del tema child
        wp_enqueue_script(
            'jdd-custom-script', // Handle univoco
            get_stylesheet_directory_uri() . '/frontend/jdd_scripts.js', // Percorso del file script.js
            array(), // Dipendenze (vuoto se non ci sono)
            filemtime(get_stylesheet_directory() . '/frontend/jdd_scripts.js'), // Versione basata sull'ultima modifica
            true // Caricamento in footer
        );
    }
}
add_action('wp_enqueue_scripts', 'jdd_enqueue_scripts');