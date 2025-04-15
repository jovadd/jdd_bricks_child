<?php
// Registra le impostazioni
function jdd_register_settings() {
    register_setting( 'jdd_theme_options_group', 'jdd_enable_gsap' );
    register_setting( 'jdd_theme_options_group', 'jdd_disable_gutenberg' );
    register_setting( 'jdd_theme_options_group', 'jdd_enable_custom_style' );
    register_setting( 'jdd_theme_options_group', 'jdd_enable_custom_scripts' );
    register_setting( 'jdd_theme_options_group', 'jdd_disable_comments' );
    register_setting( 'jdd_theme_options_group', 'jdd_enable_admin_style_acpt' );
    register_setting( 'jdd_theme_options_group', 'jdd_enable_fitty' );
}
add_action( 'admin_init', 'jdd_register_settings' );


// Aggiungi il menu per la pagina delle opzioni
function jdd_add_theme_menu() {
    add_menu_page(
        'JDD Bricks Option',
        'Jovadd',
        'manage_options',
        'jdd-theme-options',
        'jdd_render_theme_options_page',
        get_stylesheet_directory_uri() . '/assets/JB.svg', // Percorso dell'icona personalizzata
        1 // Posizione nella Dashboard
    );
}
add_action( 'admin_menu', 'jdd_add_theme_menu' );


// Aggiungi il messaggio di conferma dopo il salvataggio
function jdd_admin_notices() {
    if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ) {
        echo '<div class="banner-notice banner-notice-success notice notice-success is-dismissible"><p>Le impostazioni sono state salvate correttamente.</p></div>';
    }
}
add_action( 'admin_notices', 'jdd_admin_notices' );


// Renderizza la pagina delle opzioni
function jdd_render_theme_options_page() {
    ?>
    <div class="wrap jdd-theme-options">
        <h1>Jdd Bricks | A Bricks Child Theme Built for Performance</h1>
        <hr>
        <p>Jdd Bricks è un tema child sviluppato da <a class="ninedesigns" target="_blank" href="https://github.com/jovadd"><strong>jovadd</strong></a>, progettato per migliorare le prestazioni e la flessibilità di <a class="bricks-color" target="_blank" href="https://bricksbuilder.io">Bricks Builder</a>.<br>
        Questo tema combina ottimizzazione avanzata e funzionalità personalizzate, offrendo una base solida per progetti web ad alte prestazioni. <br>
        Grazie alla sua struttura leggera e modulare, Jdd Bricks è ideale per chi desidera un’esperienza di sviluppo fluida e un sito web performante senza compromessi.</p>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'jdd_theme_options_group' );
            ?>
            <table class="form-table jdd-form-table">
                
                <!-- Tabella GSAP -->
                <tr class="jdd-tr-flex">
                    <th scope="row jdd-border-row">
                        <label class="jdd-title-table" for="jdd_enable_gsap">1. GSAP</label>
                    </th>
                    <td>  
                        <input type="checkbox" name="jdd_enable_gsap" id="jdd_enable_gsap" value="1" <?php checked( 1, get_option( 'jdd_enable_gsap' ), true ); ?> />
                    </td>
                    <td class="jdd-td-center">
                        <p class="description">Attiva la libreria GSAP e carica uno script predefinito con animazioni di base come fade e batch.</p>
                        <div class="banner">
                        <p>👉 Attiva solo se utilizzi la libreria Gsap.</p>
                        </div>
                    </td>
                </tr>
                <!-- FINE Tabella GSAP -->

                <!-- Tabella Stile Custom -->
                <tr class="jdd-tr-flex">
                    <th scope="row jdd-border-row">
                        <label class="jdd-title-table" for="jdd_enable_custom_style">2. Stile Custom</label>
                    </th>
                    <td>  
                        <input type="checkbox" name="jdd_enable_custom_style" id="jdd_enable_custom_style" value="1" <?php checked( 1, get_option( 'jdd_enable_custom_style' ), true ); ?> />
                    </td>
                    <td class="jdd-td-center">
                        <p class="description">Abilita ed Include un file di stile Custom (style.css).</p>
                        <div class="banner">
                        <p>👉 Attiva solo se non utilizzi Advanced Themer altrimenti usa Advanced CSS.</p>
                        </div>
                    </td>
                </tr>
                <!-- FINE Stile Custom -->

                <!-- Tabella JS Custom -->
                <tr class="jdd-tr-flex">
                    <th scope="row jdd-border-row">
                        <label class="jdd-title-table" for="jdd_enable_custom_script">3. Scripts Custom</label>
                    </th>
                    <td>  
                        <input type="checkbox" name="jdd_enable_custom_script" id="jdd_enable_custom_script" value="1" <?php checked( 1, get_option( 'jdd_enable_custom_script' ), true ); ?> />
                    </td>
                    <td class="jdd-td-center">
                        <p class="description">Abilita ed Include un file JS Custom (scripts.js).</p>
                        <div class="banner">
                        <p>👉 Attiva solo per funzionalità VANILLA JS.</p>
                        </div>
                    </td>
                </tr>
                <!-- FINE JS Custom -->

                <!-- Tabella Gutenberg -->
                <tr class="jdd-tr-flex">
                    <th scope="row jdd-border-row">
                        <label class="jdd-title-table" for="jdd_disable_gutenberg">4. Gutenberg</label>
                    </th>
                    <td>  
                        <input type="checkbox" name="jdd_disable_gutenberg" id="jdd_enable_custom_script" value="1" <?php checked( 1, get_option( 'jdd_disable_gutenberg' ), true ); ?> />
                    </td>
                    <td class="jdd-td-center">
                        <p class="description">Rimuove Gutenberg e i suoi stili dal backend e dal Frontend.</p>
                        <div class="banner gutter-top">
                        <p>👉 Attenzione: se disattivi Gutenberg e hai già utilizzato l’editor a blocchi per creare contenuti, potrebbero verificarsi problemi di visualizzazione o perdita di funzionalità.</p>
                        </div>
                    </td>
                </tr>
                <!-- FINE Gutenberg -->

                <!-- Tabella Disabilita Commenti -->
                <tr class="jdd-tr-flex">
                    <th scope="row jdd-border-row">
                        <label class="jdd-title-table" for="jdd_disable_comments">5. Commenti</label>
                    </th>
                    <td>  
                        <input type="checkbox" name="jdd_disable_comments" id="jdd_enable_custom_script" value="1" <?php checked( 1, get_option( 'jdd_disable_comments' ), true ); ?> />
                    </td>
                    <td class="jdd-td-center">
                        <p class="description">Disattiva i commenti e la voce relativa nella dashboard.</p>
                        <div class="banner">
                        <p>👉 Si consiglia la disattivazione se non si desiderano i Commenti.</p>
                        </div>
                    </td>
                </tr>
                <!-- FINE Tabella Disabilita Commenti -->

                <!-- Tabella ACPT Style -->
                <tr class="jdd-tr-flex">
                    <th scope="row jdd-border-row">
                        <label class="jdd-title-table" for="jdd_enable_admin_style_acpt">6. ACPT</label>
                    </th>
                    <td>  
                        <input type="checkbox" name="jdd_enable_admin_style_acpt" id="jdd_enable_custom_script" value="1" <?php checked( 1, get_option( 'jdd_enable_admin_style_acpt' ), true ); ?> />
                    </td>
                    <td class="jdd-td-center">
                        <p class="description">Carica stili personalizzati per la gestione del Plugin <a href="https://acpt.io/" target="_blank">ACPT</a> di Mauro Cassani.</p>
                        <div class="banner">
                        <p>👉 Da attivare solo in presenza del plugin ACPT.</p>
                        </div>
                    </td>
                </tr>
                <!-- FINE Tabella ACPT Style -->

                <!-- Tabella Fitty -->
                <tr class="jdd-tr-flex">
                    <th scope="row jdd-border-row">
                        <label class="jdd-title-table" for="jdd_enable_fitty">7. FITTY JS</label>
                    </th>
                    <td>  
                        <input type="checkbox" name="jdd_enable_fitty" id="jdd_enable_fitty" value="1" <?php checked( 1, get_option( 'jdd_enable_fitty' ), true ); ?> />
                    </td>
                    <td class="jdd-td-center">
                        <p class="description">Carica Fitty JS </p>
                        <div class="banner">
                        <p>👉 Attiva solo se utilizzi Fitty JS </p>
                        </div>
                    </td>
                </tr>
                <!-- FINE Tabella Fitty -->

            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
?>

