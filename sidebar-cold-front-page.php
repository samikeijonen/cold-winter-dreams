<aside <?php hybrid_attr( 'sidebar', 'cold-front-page' ); ?>>
	
	<?php if ( is_active_sidebar( 'cold-front-page' ) ) : // If the sidebar has widgets. ?>

		<?php dynamic_sidebar( 'cold-front-page' ); // Displays the cold-front-page sidebar. ?>

	<?php else : // If the sidebar has no widgets. ?>

		<?php the_widget(
			'WP_Widget_Text',
			array(
				'title'  => __( 'Example Widget 1', 'cold-winter-dreams' ),
				/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
				'text'   => sprintf( __( 'This is an example widget to show how the Cold Front Page sidebar looks by default. You can add custom widgets from the %swidgets screen%s in the admin.', 'cold-winter-dreams' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
				'filter' => true,
			),
			array(
				'before_widget' => '<section class="widget widget_text">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			)
		); ?>
			
		<?php the_widget(
			'WP_Widget_Text',
			array(
				'title'  => __( 'Example Widget 2', 'cold-winter-dreams' ),
				/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
				'text'   => sprintf( __( 'This is an example widget to show how the Cold Front Page sidebar looks by default. You can add custom widgets from the %swidgets screen%s in the admin.', 'cold-winter-dreams' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
				'filter' => true,
			),
			array(
				'before_widget' => '<section class="widget widget_text">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			)
		); ?>
		
	<?php endif; // End widgets check. ?>
			
</aside><!-- #sidebar-cold-front-page -->