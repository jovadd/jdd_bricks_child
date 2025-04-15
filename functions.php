<?php 
//Includi Funzionalità
require_once get_stylesheet_directory() . '/backend/theme-style.php';         // Includi Stile del Tema
require_once get_stylesheet_directory() . '/inc/theme-option-page.php';       // Includi Pagina Opzioni del Tema


// Inclusione condizionale delle funzionalità
if ( get_option( 'jdd_enable_gsap' ) ) { require_once get_stylesheet_directory() . '/inc/gsap-include.php'; }                // Includi Gsap e il file Scripts
if ( get_option( 'jdd_enable_custom_style' ) ) { require_once get_stylesheet_directory() . '/inc/active-style.php';}         // Includi Stile Custom
if ( get_option( 'jdd_enable_custom_scripts' ) ) { require_once get_stylesheet_directory() . '/inc/active-scripts.php';}     // Includi Scripts
if ( get_option( 'jdd_enable_fitty' ) ) { require_once get_stylesheet_directory() . '/inc/fitty-include.php';}               // Includi Scripts
if ( get_option( 'jdd_disable_gutenberg' ) ) { require_once get_stylesheet_directory() . '/inc/gutenberg-disable.php'; }     // Disattiva Gutenberg e i suoi stili
if ( get_option( 'jdd_disable_comments' ) ) {require_once get_stylesheet_directory() . '/inc/disable-comments.php'; }        // Disabilita i Commenti e la voce nella Dashboard
if ( get_option( 'jdd_enable_admin_style_acpt' ) ) { require_once get_stylesheet_directory() . '/inc/admin-style-acpt.php';} // Attiva gli Stile Custom per ACPT | Solo Backend e SOLO se installato


