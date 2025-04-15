<?php 
// Registra Fitty JS
if ( ! function_exists( 'jdd_fitty' ) ) { 
	
	function jdd_fitty() {
		// Esegui il codice solo sul frontend e sul canvas, non nel pannello del builder
		if ( ! bricks_is_builder_main() ) {
			// Importa la libreria principale
			wp_enqueue_script(
				'fitty-js',
				get_stylesheet_directory_uri() . '/vendor/fitty/fitty.min.js',
				array(), // Nessuna dipendenza
				filemtime( get_stylesheet_directory() . '/vendor/fitty/fitty.min.js' ),
				true // Caricato nel footer
			);

			// Importa lo script personalizzato
			wp_enqueue_script(
				'jdd_fitty_init',
				get_stylesheet_directory_uri() . '/vendor/fitty/fitty-init.js',
				array( 'fitty-js' ), // Dipende da fitty-js
				filemtime( get_stylesheet_directory() . '/vendor/fitty/fitty-init.js' ),
				true // Caricato nel footer
			);
		}
	}
}

add_action( 'wp_enqueue_scripts', 'jdd_fitty' );