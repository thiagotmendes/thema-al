<?php
// Custom WordPress Login Logo
function my_login_logo() { ?>
<style>
   body.login div#login h1 a {
        background-image: url(<?php echo get_template_directory_uri(); ?>/images/logo.png);
        padding-bottom: 10px;
        width:208px;
        height:73px;
       background-size: 208px;
   }
 </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

//Link na tela de login para a página inicial
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

add_action('admin_head', 'my_custom_logo');
function my_custom_logo() {
echo '<style> #wp-admin-bar-wp-logo .ab-icon {background: url('.get_bloginfo('template_directory').'/images/logo_fortes_RH.png) no-repeat center top !important; } </style>';
}

function remove_footer_admin () {
	echo '© <a href="http://4media.com.br/" target="blank">4media</a> - Agência de Comunicação';
}
add_filter('admin_footer_text', 'remove_footer_admin');


// Saudação customizada
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Olá', 'Bem vindo', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );


//Login Stylesheet
function my_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_template_directory_uri(); ?>/assets/css/custom-wp-admin.css" type="text/css" media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
