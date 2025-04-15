<?php 
// Disattiva Gutenberg per tutti i tipi di post
add_filter('use_block_editor_for_post', '__return_false', 10);

// Disattiva completamente i CSS di Gutenberg
add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('wp-block-library'); // Frontend
    wp_dequeue_style('wp-block-library-theme'); // Tema
    wp_dequeue_style('wc-block-style'); // WooCommerce
}, 100);

// Nasconde l'icona "Aggiungi blocco" nell'editor
add_action('admin_enqueue_scripts', function() {
    wp_dequeue_script('wp-block-editor');
});

// Rimuove gli stili inline "Classic Theme Styles"
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'classic-theme-styles' );
    wp_deregister_style( 'classic-theme-styles' );
}, 20 );