<?php

 /*Template Name: Concurrent Session Grid

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
<div id="mainContainer" class="mainContainer">
    <div id="content" class="" role="main">
        <div class="pageContent" id="pageContent">
        

        <?php get_template_part( 'content', 'page' ); ?>

        <?php endwhile; // end of the loop. ?>
        <ul class="grid-legend">
					<li class="blackboard-2 button">Blackboard</li>
					<li class="engaged button">Engaged</li>
					<li class="moving-forward button">Moving Forward</li>
					<li class="opportunity button">Opportunity</li>
					<li class="button personal-wellness">Personal Wellness</li>
					<li class="button professional-development-2">Professional Development</li>
					<li class="button retention">Retention</li>
					<li class="button teaching-and-learning">Teaching and Learning</li>
					<li class="button technology">Technology</li>
					<li class="button vendor">Vendor</li>
				</ul>
        <?php get_template_part( 'session', 'grid-content' ); ?>

    </div>
    </div><!-- #content -->

</div><!-- #mainContainer -->

<?php
get_footer();
?>