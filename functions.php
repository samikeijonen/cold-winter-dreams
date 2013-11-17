<?php
/**
 * This is child themes functions.php file. All modifications should be made in this file.
 *
 * All style changes should be in child themes style.css file.
 *
 * @package    Cold Winter Dreams
 * @version    1.0
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @copyright  Copyright (c) 2013, Sami Keijonen
 * @link       http://foxnet-themes.fi
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Adds the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'cold_winter_dreams_theme_setup', 11 );

/**
 * Setup function.  All child themes should run their setup within this function.  The idea is to add/remove 
 * filters and actions after the parent theme has been set up.  This function provides you that opportunity.
 *
 * @since  1.0
 * @access public
 * @return void
 */
function cold_winter_dreams_theme_setup() {

	/* Change default background color. */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'e0e9f2'
		)
	);
	
	/* Add a custom header to overwrite the defaults. */
	add_theme_support(
		'custom-header',
		array(
			'default-text-color' => '163e6f',
			'default-image'      => get_stylesheet_directory_uri() . '/images/headers/mountains.jpg'
		)
	);
	
	/* Registers default headers for the theme. */
	register_default_headers(
		array(
			'winter-dream-1' => array(
				'url'           => '%2$s/images/headers/mountains.jpg',
				'thumbnail_url' => '%2$s/images/headers/mountains-thumbnail.jpg',
				/* Translators: Header image description. */
				'description'   => __( 'Cold Winter Dream 1', 'cold-winter-dreams' )
			),
			'winter-dream-2' => array(
				'url'           => '%2$s/images/headers/header3.jpg',
				'thumbnail_url' => '%2$s/images/headers/header3-thumbnail.jpg',
				/* Translators: Header image description. */
				'description'   => __( 'Cold Winter Dream 2', 'cold-winter-dreams' )
			),
			'winter-dream-3' => array(
				'url'           => '%2$s/images/headers/header4.jpg',
				'thumbnail_url' => '%2$s/images/headers/header4-thumbnail.jpg',
				/* Translators: Header image description. */
				'description'   => __( 'Cold Winter Dream 3', 'cold-winter-dreams' )
			),
			'winter-dream-4' => array(
				'url'           => '%2$s/images/headers/header5.jpg',
				'thumbnail_url' => '%2$s/images/headers/header5-thumbnail.jpg',
				/* Translators: Header image description. */
				'description'   => __( 'Cold Winter Dream 4', 'cold-winter-dreams' )
			),
		)
	);
	
	/* Change primary color. */
	add_filter( 'theme_mod_color_primary', 'cold_winter_dreams_primary_color' );
	
	/* Register sidebars. */
	add_action( 'widgets_init', 'cold_winter_dreams_register_sidebars', 6 );
	
	/* Adds custom attributes to the cold-front-page sidebar. */
	add_filter( 'hybrid_attr_sidebar', 'cold_winter_dreams_sidebar_cold_front_page_class', 11, 2 );
	
}

/**
 * Change primary color
 *
 * @since 1.0
 * @access public
 * @param  string  $hex
 * @return string
 */
function cold_winter_dreams_primary_color( $color ) {

	return $color ? $color : '265992';
	
}

/**
 * Registers sidebars.
 *
 * @since  1.0
 * @access public
 * @return void
 */
function cold_winter_dreams_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'cold-front-page',
			'name'        => _x( 'Cold Front page', 'sidebar', 'cold-winter-dreams' ),
			'description' => __( 'The Cold Front Page sidebar. It is displayed on the page template called Cold Front Page.', 'cold-winter-dreams' )
		)
	);
}

/**
 * Calculate number of widgets.
 *
 * @since  1.0
 * @access public
 * @param  array  $attr
 * @param  string $context
 * @return array
 */
function cold_winter_dreams_sidebar_cold_front_page_class( $attr, $context ) {

	if ( 'cold-front-page' === $context ) {
		global $sidebars_widgets;

		if ( is_array( $sidebars_widgets ) && !empty( $sidebars_widgets[ $context ] ) ) {

			$count = count( $sidebars_widgets[ $context ] );

			if ( !( $count % 3 ) || $count % 2 )
				$attr['class'] .= ' sidebar-col-3';

			elseif ( !( $count % 2 ) )
				$attr['class'] .= ' sidebar-col-2';

			else
				$attr['class'] .= ' sidebar-col-1';

		}
	}

	return $attr;
}

?>