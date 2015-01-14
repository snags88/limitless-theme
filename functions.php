<?php
//Allows you to pull stylesheet and javascript files


function limitless_resources(){
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'limitless_resources');


//Navigation Menus
register_nav_menus(array(
    'primary' => __( 'Primary Menu'),
    'footer' => __( 'Footer Menu'),
    'home' => __( 'Home Page')
));
    
//Get top ancestor
function get_top_ancestor_id() {
    global $post;
    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    
    return $post->ID;
}

//Does page have children?
function has_children() {
    global $post;
    
    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}

// Customize excerpt word count length
function custom_excerpt_length() {
    return 40;
}
add_filter('excerpt_length', 'custom_excerpt_length');

//remove ... from excerpt
function trim_excerpt ($text) {
    $text = str_replace('[&hellip;]', '<a href=' . get_permalink() . '> (continue reading&hellip;) </a>', $text);

    return $text;
}
add_filter('get_the_excerpt','trim_excerpt');             
    

// Get images from Media Library function
function get_imgs_from_media($postsReturned = 1) {
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'post_status' => 'inherit',
        'posts_per_page' => $postsReturned
    );
    $query = new WP_Query( $args);
    $imgs = array();
    foreach ( $query->posts as $image) {
        $imgs[]= $image->guid;
    }
    return $imgs;
}


function limitless_setup() {

    // Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('home-thumbnail', 300, 200, true);
    add_image_size('banner-image', 920, 210, array('center','center'));
    add_image_size('gallery-large', 600, 600, array('center','center'));
    add_image_size('gallery-small', 400, 400, array('center','center'));
    
    // Add post format support
    add_theme_support('post-formats', array('quote', 'image'));
}
add_action('after_setup_theme', 'limitless_setup');

// Add our widget locations
function ourWidgetsInit() {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="side-widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Footer Left',
        'id' => 'footerleft',
        'before_widget' => '<div class="left-widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Footer Center-Left',
        'id' => 'footercenterleft',
        'before_widget' => '<div class="center-left-widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Footer Center-Right',
        'id' => 'footercenterright',
        'before_widget' => '<div class="center-right-widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Footer Right',
        'id' => 'footerright',
        'before_widget' => '<div class="right-widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
}

add_action('widgets_init', 'ourWidgetsInit');

// Code taken from perishablepress.com/css-dropdown-menu-wordpress/
class CSS_Menu_Maker_Walker extends Walker {

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
	
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}
	
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		
		/* Add active class */
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}
		
		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}
		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><div class="menu-text">';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</div></a>';
		$item_output .= $args->after;
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}

?>