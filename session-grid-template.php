<?php

 /*Template Name: Concurrent Session Grid

 */
get_header(); ?>
<section class="feature_and_announcements">
</section>
<div id="mainContainer" class="mainContainer">
    <div id="content" class="" role="main">
        <div class="pageContent" id="pageContent">
        <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'page' ); ?>

        <?php endwhile; // end of the loop. ?>

        <?php get_template_part( 'session', 'grid-content' ); ?>

    </div>
    </div><!-- #content -->

</div><!-- #mainContainer -->

<?php
get_footer();
?>