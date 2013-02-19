<?php
/**
 * The template for displaying all posts for a tag
 */

get_header(); ?>
<section class="feature_and_announcements">
	<div class="container">
		<div class="grid_9 pageHeader">
	<?php	profmg_breadcrumb(); ?>
		</div>
	</div>
</section>
<div id="mainContainer" class="container mainContainer">

	<div id="content" class="grid_9" role="main">
		<div class="pageContent">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php
						printf( __( 'Tagged: %s', 'irooni' ), '<span>' . single_tag_title( '', false ) . '</span>' );
						?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
<?php 
				echo '<h3>';
        echo '<a href="' . get_permalink( $id ) . '">';
        echo get_the_title($id);
        echo ' with ';
        echo    esc_html( get_post_meta( $id,'lead_presenter_fname', true ) ).' ';
        echo    esc_html( get_post_meta( $id,'lead_presenter_lname', true ) );
        echo '</a>';

        echo '</h3>';
?>
<?php the_content(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; // end of the loop. ?>
<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'irooni' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
					
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

<?php endif; ?>
		</div>
	</div><!-- #content -->
	<div class="grid_3 pageSidebar">
<?php get_sidebar(); ?>
	</div>
</div><!-- #mainContainer -->

<?php get_footer(); ?>