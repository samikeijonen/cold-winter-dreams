<?php 
/**
 * Template Name: Cold Front Page
 *
 * @package Cold Winter Dreams
 * @subpackage Template
 * @since 1.0
 */
 
get_header(); // Loads the header.php template. ?>

<main <?php hybrid_attr( 'content' ); ?>>

<?php hybrid_get_sidebar( 'cold-front-page' ); // Loads the sidebar-cold-front-page.php template. ?>

	<?php if ( have_posts() ) : // Checks if any posts were found. ?>

		<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

			<?php the_post(); // Loads the post data. ?>

			<?php hybrid_get_content_template(); // Loads the content/*.php template. ?>

		<?php endwhile; // End found posts loop. ?>

	<?php else : // If no posts were found. ?>

		<?php locate_template( array( 'content/error.php' ), true ); // Loads the content/error.php template. ?>

	<?php endif; // End check for posts. ?>

</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>