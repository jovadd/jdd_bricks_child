<?php 
// Aggiungi la pagina opzioni al menu
function jdd_add_theme_options_page() {
    add_menu_page(
        'NineBricks Option',
        'NineBricks',
        'manage_options',
        'jdd-theme-options',
        'jdd_render_theme_options_page',
        get_stylesheet_directory_uri() . '/assets/Favicon.svg', // Percorso dell'icona personalizzata
        1  // Posizione del menu
    );
}
add_action( 'admin_menu', 'jdd_add_theme_options_page' );


// Callback per il rendering della pagina delle opzioni
function jdd_render_theme_options_page() {
    ?>
    <div class="wrap jdd-theme-options">
        <h1>Nine Bricks | A Child Performing Theme</h1>
        <hr>
        <p>Nine Bricks è un tema child sviluppato da <a class="jovadd" target="_blank" href="https://assaidesign.it"><strong>Jovadd Studio</strong></a>, progettato per migliorare le prestazioni e la flessibilità di <a class="bricks-color" target="_blank" href="https://bricksbuilder.io">Bricks Builder</a>.<br>
        Questo tema combina ottimizzazione avanzata e funzionalità personalizzate, offrendo una base solida per progetti web ad alte prestazioni. <br>
        Grazie alla sua struttura leggera e modulare, Nine Bricks è ideale per chi desidera un’esperienza di sviluppo fluida e un sito web performante senza compromessi.</p>
        <form method="post" action="options.php">
            <?php
            // Registra e gestisce le impostazioni
            settings_fields( 'jdd_theme_options_group' );
            // Sezioni e campi della pagina
            do_settings_sections( 'jdd-theme-options' );
            // Pulsante di salvataggio
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Registrazioni delle Impostazioni
function jdd_register_theme_settings() {
    // Registra le impostazioni e i campi con spiegazioni
    $fields = [
        'jdd_enable_gsap' => [
            'label' => '1. GSAP',
            'description' => 'Attiva la libreria GSAP e carica uno script predefinito con animazioni di base come fade e batch.',
            'callback' => 'jdd_render_checkbox_gsap',
            'hint' => '👉 Attiva solo se utilizzi la libreria Gsap',

        ],
        'jdd_enable_custom_style' => [
            'label' => '2. Stile Custom',
            'description' => 'Abilita ed Include un file di stile Custom (style.css). Se non si utilizza ricordati di creare uno stile di margin-bottom su tutti i testi <H> e <p>.',
            'callback' => 'jdd_render_checkbox_style',
             'hint' => '👉 Attiva solo se non utilizzi Advanced Themer altrimenti usa Advanced CSS',

        ],
        'jdd_enable_custom_scripts' => [
            'label' => '3. Scripts Custom',
            'description' => 'Abilita ed Include un file JS Custom (scripts.js)',
            'callback' => 'jdd_render_checkbox_scripts',
            'hint' => '👉 Attiva solo per funzionalità VANILLA JS',

        ],
        'jdd_disable_gutenberg' => [
            'label' => '4. Gutenberg',
            'description' => 'Rimuove Gutenberg e i suoi stili dal backend e dal Frontend.',
            'callback' => 'jdd_render_checkbox_gutenberg',
            'hint' => '👉 Attenzione: se disattivi Gutenberg e hai già utilizzato l’editor a blocchi per creare contenuti, potrebbero verificarsi problemi di visualizzazione o perdita di funzionalità.',


        ],
        'jdd_disable_comments' => [
            'label' => '5. Commenti',
            'description' => 'Disattiva i commenti e la voce relativa nella dashboard.',
            'callback' => 'jdd_render_checkbox_comments',
            'hint' => '👉 Si consiglia la disattivazione se non si desiderano i Commenti.'

        ],
        'jdd_enable_admin_style_acpt' => [
            'label' => '6. ACPT',
            'description' => 'Carica stili personalizzati per la gestione del Plugin ACPT di Mauro Cassani.',
            'callback' => 'jdd_render_checkbox_acpt',
            'hint' => '👉 Da attivare solo in presenza del plugin ACPT.'

        ],
    ];

foreach ( $fields as $option_name => $field ) {
    register_setting( 'jdd_theme_options_group', $option_name );

    add_settings_field(       
            $option_name,
            $field['label'],
            function() use ( $option_name, $field ) {
            // Renderizza il checkbox e il nome accanto
            $value = get_option( $option_name );
            echo '<label class="jdd-label-wrapper" style="display: flex; align-items: center;">';
            echo '<input type="checkbox" name="' . esc_attr( $option_name ) . '" value="1" ' . checked( 1, $value, false ) . ' />';
            // Aggiungi la descrizione sotto il checkbox e il nome
            if ( ! empty( $field['description'] ) ) {
                echo '<p class="description" style="margin-left:5px; margin-top: -4px;">' . esc_html( $field['description'] ) . '</p>';
            }
            echo '</label>';
            // Campo grigio per i consigli (hint)
            if ( ! empty( $field['hint'] ) ) {
            echo '<div style="margin: 10px 0 0 25px; background: #f5f5f5; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">';
            echo '<em style="color: #666;">' . esc_html( $field['hint'] ) . '</em>';
            echo '</div>';
            }

          
        },
        'jdd-theme-options',
        'jdd_theme_settings_section'
    );
}

    // Aggiungi una sezione per le impostazioni
    add_settings_section(
        'jdd_theme_settings_section',
        '<div class="impostazioni"> 🚀 Impostazioni del Tema </div><hr>',
        null,
        'jdd-theme-options'
    );
}

// Callback per ogni checkbox
function jdd_render_checkbox_gsap() {
    $value = get_option( 'jdd_enable_gsap' , 0 );
    echo '<input type="checkbox" name="jdd_enable_gsap" value="1" ' . checked( 0, $value, false ) . ' />';
}
function jdd_render_checkbox_style() {
    $value = get_option( 'jdd_enable_custom_style' , 1 );
    echo '<input type="checkbox" name="jdd_enable_custom_style" value="1" ' . checked( 1, $value, false ) . ' />';
}
function jdd_render_checkbox_scripts() {
    $value = get_option( 'jdd_enable_custom_scripts' , 0 );
    echo '<input type="checkbox" name="jdd_enable_custom_scripts" value="1" ' . checked( 0, $value, false ) . ' />';
}
function jdd_render_checkbox_gutenberg() {
    $value = get_option( 'jdd_disable_gutenberg' , 0 );
    echo '<input type="checkbox" name="jdd_disable_gutenberg" value="1" ' . checked( 0, $value, false ) . ' />';
}
function jdd_render_checkbox_comments() {
    $value = get_option( 'jdd_disable_comments' , 1 );
    echo '<input type="checkbox" name="jdd_disable_comments" value="1" ' . checked( 1, $value, false ) . ' />';
}
function jdd_render_checkbox_acpt() {
    $value = get_option( 'jdd_enable_admin_style_acpt' , 0 );
    echo '<input type="checkbox" name="jdd_enable_admin_style_acpt" value="1" ' . checked( 0, $value, false ) . ' />';
}

add_action( 'admin_init', 'jdd_register_theme_settings' );


// Aggiungi una notifica dopo il salvataggio delle opzioni
function jdd_admin_settings_saved_notice() {
    // Controlla che la pagina corrente sia la pagina delle opzioni del tema
    if ( isset( $_GET['page'] ) && $_GET['page'] === 'jdd-theme-options' && isset( $_GET['settings-updated'] ) ) {
        // Prepara il messaggio
        $messages [] = 'Le modifiche sono state salvate con successo';

        // Mostra il messaggio in una notifica
        foreach ( $messages as $message ) {
            echo '<div class="banner-notice banner-notice-success notice notice-success is-dismissible"><p>' . esc_html( $message ) . '</p></div>';
        }
    }
}
add_action( 'admin_notices', 'jdd_admin_settings_saved_notice' );

