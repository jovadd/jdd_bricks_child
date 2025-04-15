<?php
// Enqueue di style.css solo nel backend se ACPT è attivo
function jdd_enqueue_admin_style_if_acpt_active() {
    // Verifica se il plugin ACPT è attivo
    if ( is_plugin_active( 'advanced-custom-post-type/advanced-custom-post-type.php' ) ) { 
        // Carica il file style.css solo nel backend
        wp_enqueue_style(
            'jdd-admin-style', // Handle unico
            get_stylesheet_directory_uri() . '/vendor/acpt-plugin/acpt-admin-custom-style.css', // Percorso del file CSS
            array(), // Nessuna dipendenza
            filemtime( get_stylesheet_directory() . '/vendor/acpt-plugin/acpt-admin-custom-style.css' ) // Versione dinamica
        );
    }
}
add_action( 'admin_enqueue_scripts', 'jdd_enqueue_admin_style_if_acpt_active' );