<?php
/**
 * The template for displaying a single post
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

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

				<?php endwhile; // end of the loop. ?>
				<?php endif; ?>
			</div>
			</div><!-- #content -->
			<div class="grid_3 pageSidebar">
			<?php get_sidebar(); ?>
			</div>
		</div><!--#mainContainer-->
		<?php get_footer(); ?>