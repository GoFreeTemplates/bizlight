<?php



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bizlight' ),
			'menu-2' => esc_html__( 'Seconday', 'bizlight')
		) );



		require "inc/bs4navwalker.php";


		add_filter('nav_menu_css_class' , 'primary_active_menulink' , 10 , 2);
		function primary_active_menulink($classes, $item){

		    if( in_array('current-menu-item', $classes) ){
		        $classes[] = 'active ';
		    }
		return $classes;
		}


		register_sidebar( array(
			'name'          => esc_html__( 'Footer  Widget Area', 'bizlight' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'bizlight' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	function bizlight_script(){

			wp_enqueue_style( 'bizlight-style', get_stylesheet_uri() );
			wp_enqueue_style( 'bizlight-app', get_template_directory_uri() . '/css/app.css', array(), '20160822', false);
			//wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
			//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			//	wp_enqueue_script( 'comment-reply' );
			//}
	}
	add_action( 'wp_enqueue_scripts', 'bizlight_script' );