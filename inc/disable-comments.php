<?php 
// Disabilita i commenti in tutto il sito
function jdd_disable_comments_everywhere() {
    // Disattiva supporto ai commenti per tutti i tipi di post
    foreach (get_post_types() as $post_type) {
        remove_post_type_support($post_type, 'comments');
        remove_post_type_support($post_type, 'trackbacks');
    }
}
add_action('init', 'jdd_disable_comments_everywhere');

// Rimuovi voci relative ai commenti dalla dashboard
function jdd_remove_comments_from_admin_menu() {
    remove_menu_page('edit-comments.php'); // Rimuove la voce "Commenti" dal menu admin
}
add_action('admin_menu', 'jdd_remove_comments_from_admin_menu');

// Reindirizza tentativi di accesso alla pagina dei commenti
function jdd_redirect_comments_page() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'jdd_redirect_comments_page');

// Rimuovi widget dei commenti dalla dashboard
function jdd_remove_comments_dashboard_widget() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'jdd_remove_comments_dashboard_widget');

// Rimuovi commenti dal menu della barra di amministrazione
function jdd_remove_comments_from_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'jdd_remove_comments_from_admin_bar');