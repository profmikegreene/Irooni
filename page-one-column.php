<?php
/**
 * Template Name: One Column No Sidebar
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="feature_and_announcements">
	<div class="container">
		<div class="grid_12">
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
		</div>
		<div class="grid_9 pageHeader">
			<?php	profmg_breadcrumb(); ?>
		</div>
	</div>
</section>
		<div id="mainContainer" class="container mainContainer">

				<div class="grid_12 pageContent">

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #mainContainer -->

<?php get_footer(); ?>