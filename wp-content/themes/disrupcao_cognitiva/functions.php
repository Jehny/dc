<?php
register_nav_menu( 'main-menu', __( 'Main Menu' ) );
// add_action( 'widgets_init', 'widgets_novos_widgets_init' );
// add_action( 'widgets_init', 'youtube_widgets_init' );
add_action( 'widgets_init', 'face_widgets_init' );
add_action( 'widgets_init', 'instagran_widgets_init' );
// add_action( 'widgets_init', 'in_widgets_init' );
// add_action( 'widgets_init', 'feed_facebook_widgets_init' );
// add_action( 'widgets_init', 'mapa_widgets_init' );

add_theme_support( 'post-thumbnails' );

add_action( 'init', 'banners_post_type');

add_post_type_support('banners', 'thumbnail');

add_action( 'init', 'redes_sociais' );

$supports = array('title', 'editor','thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'author', 'post-formats', 'page-attributes');

add_post_type_support('blog', $supports);


function banners_post_type() {
	register_post_type( 'banners',
			array(
					'labels' => array(
							'name' => __( 'Banners' ),
							'singular_name' => __( 'Banner' )
					),
					'public' => true,
					'has_archive' => true,
			)
	);
}

function redes_sociais() {
	register_post_type( 'redes_sociais',
			array(
					'labels' => array(
							'name' => __( 'Redes Sociais' ),
							'singular_name' => __( 'Redes Sociais' )
					),
					'public' => true,
					'has_archive' => true,
			)
	);
}

/**
 * Widget redes sociais
 *
 */

function face_widgets_init() {

	register_sidebar( array(
		'name' => 'Facebook',
		'id' => 'facebook',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}

function instagran_widgets_init() {

	register_sidebar( array(
		'name' => 'Instagran',
		'id' => 'instagran',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}


// Custom WordPress Login Logo
function my_login_logo() { ?>
	<style>
	   body.login div#login h1 a {
	        background: url('wp-content/themes/disrupcao_cognitiva/img/logo_login.png')no-repeat;
	        height: 70px;
	        width: 323px;
	        
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
	return 'CGF Jurídico';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//Custom dashboard logo
add_action('admin_head', 'my_custom_logo');
function my_custom_logo() {
	echo '<style>
 			#wpadminbar>#wp-toolbar>#wp-admin-bar-root-default>#wp-admin-bar-wp-logo .ab-icon {
 				background: url('.get_bloginfo('template_directory').'/img/logo_tabless.png) no-repeat left 6px !important;
				height: 20px;
				width: 20px;
				font-family: normal !important;
				font-family: normal !important;
				font-weight: normal !important;
			}
			#wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
				content: none;
			}
		</style>';
}

// Redirecionamento de páginas
function redirect_to( $location = NULL ) {
	if($location != NUll) {
		header("Location: {$location}");
		exit;
	}
}

function getComment(){
	$comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
	$endereco = get_comment_link( $comment );
}

function urlParametro($arg){
	$server = $_SERVER['SERVER_NAME'];
	$endereco = $_SERVER ['REQUEST_URI'];
	$arrayUrl = explode('/', $endereco);
	// if(strpos($endereco, $arg) !=0){
	// 	return true;
	// }else {
	// 	return $endereco;
	// }
	// return $endereco . " ";
	foreach($arrayUrl as $admin){
		if($admin == $arg){
			// return true;
			echo $admin;
		}else {
			echo $admin . " ";

		}
	}
}

?>