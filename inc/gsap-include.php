<?php 
// Registra il JS Custom e Gsap ndel sito. 
if ( ! function_exists( 'jdd_gsap_script' ) ) { 
	
	function jdd_gsap_script() {
		// Esegui il codice solo sul frontend e sul canvas, non nel pannello del builder
		if ( ! bricks_is_builder_main() ) {
			// Importa la libreria GSAP principale
			wp_enqueue_script( 'jdd_gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), false, true );
			
			// ScrollTrigger con gsap.js come dipendenza
			wp_enqueue_script( 'jdd_gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array( 'jdd_gsap-js' ), false, true );
			
			// Importa lo script personalizzato
			wp_enqueue_script( 'jdd_custom-script-gsap', get_stylesheet_directory_uri() . '/vendor/gsap-library/gsap-scripts.js', array( 'jdd_gsap-js', 'jdd_gsap-st' ), filemtime( get_stylesheet_directory() . '/vendor/gsap-library/gsap-scripts.js' ), true );
		}
	}
}
  
add_action( 'wp_enqueue_scripts', 'jdd_gsap_script' );