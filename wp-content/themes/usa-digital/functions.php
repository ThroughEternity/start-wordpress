<?php 

if (! function_exists('band_digital_setap')) {
	function band_digital_setap(){
		//пользовательский логотип
		add_theme_support( 'custom-logo', [
			'height'      => 50,
			'width'       => 130,
			'flex-width'  => false,
			'flex-height' => false,
			'header-text' => '',
			'unlink-homepage-logo' => false, // WP 5.5
		]  );
		//добавляем динамический <title>
		add_theme_support('title-tag');
	}
	add_action( 'after_setup_theme', 'band_digital_setap');
}


/* 
Подключение стилей и скриптов
*/

// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'usa_digital_scripts' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function usa_digital_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	//bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.css', array('main'), null );
	
//Icofont Css
wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/plugins/fontawesome/css/all.css', array('main'), null );
//animate-css
wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/plugins/animate-css/animate.css', array('main'), null );
//Icofont
wp_enqueue_style( 'icofont', get_template_directory_uri() . '/plugins/icofont/icofont.css', array('main'), null );
// style
	wp_enqueue_style( 'usa-digital', get_template_directory_uri() . '/css/style.css', array('icofont'), null );

// переподкл jQuery

wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/plugins/jquery/jquery.min.js');
	wp_enqueue_script( 'jquery', );

//Bootstrap 4.3.1
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/plugins/bootstrap/js/popper.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
	//Woow animtaion
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/plugins/counterup/wow.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/plugins/counterup/jquery.easing.1.3.js', array('jquery'), '1.0.0', true );
	//Counterup
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/plugins/counterup/jquery.waypoints.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/plugins/counterup/jquery.counterup.min.js', array('jquery'), '1.0.0', true );
	//Google Map
	wp_enqueue_script( 'google-map', get_template_directory_uri() . '/plugins/google-map/gmap3.min.js', array('jquery'), '1.0.0', true );
	//Contact
	wp_enqueue_script( 'contact', get_template_directory_uri() . '/plugins/jquery/contact.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
	
}


/**
 * Регистрируем сразу несколько областей меню .
 *
 */
function usa_digital_menus() {
// собираем области меню 
	$locations = array(
		'header'  => __( 'Header Menu', 'usa_digital' ),	
		'footer'   => __( 'Footer Menu', 'usa_digital' ),	
	);
//регистрируем области меню лежалие в переменной $locations
	register_nav_menus( $locations );
}
// хук событие
add_action( 'init', 'usa_digital_menus' );

class bootstrap_4_walker_nav_menu extends Walker_Nav_menu {
    
	function start_lvl( &$output, $depth ){ // ul
			$indent = str_repeat("\t",$depth); // indents the outputted HTML
			$submenu = ($depth > 0) ? ' sub-menu' : '';
			$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}

function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span
			
	$indent = ( $depth ) ? str_repeat("\t",$depth) : '';
	
	$li_attributes = '';
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
			$classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
			$classes[] = 'nav-item';
			$classes[] = 'nav-item-' . $item->ID;
			if( $depth && $args->walker->has_children ){
					$classes[] = 'dropdown-menu';
			}
			
			$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr($class_names) . '"';
			
			$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
			
			$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
			
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
			
			$attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';
			
			$item_output = $args->before;
			$item_output .= ( $depth > 0 ) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			
			$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	
	}
	
}
