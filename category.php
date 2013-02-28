<?php
/**
 * The template for displaying all posts for a category
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
<?php	query_posts( $query_string . '&posts_per_page=-1' ); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php
						printf( __( 'Category: %s', 'irooni' ), '<span>' . single_cat_title( '', false ) . '</span>' );
						?></h1>
				</header><!-- .entry-header -->

				<?php include(locate_template( 'content-session-excerpt.php' )); ?>
			</article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; // end of the loop. ?>
<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'irooni' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'irooni' ); ?></p>
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