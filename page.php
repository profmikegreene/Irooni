<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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

				<div class="grid_9 pageContent">

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
			<div class="grid_3 pageSidebar">
			<?php get_sidebar(); ?>
			</div>
		</div><!-- #mainContainer -->

<?php get_footer(); ?>