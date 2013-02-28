<?php

 /*Template Name: Concurrent Session ID's

 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="feature_and_announcements">
    <div class="container">
        <div class="grid_9">
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->
            <?php   profmg_breadcrumb(); ?>
        </div>

        <div class="grid_3">
        </div>
    </div>
</section>
<div id="mainContainer" class="container mainContainer">
    <div id="content" class="grid_9" role="main">
        <div class="pageContent" id="pageContent">
        <?php get_template_part( 'content', 'page' ); ?>

        <?php endwhile; // end of the loop.
        $args= array(
            'post_type'=>'sessions',
            'posts_per_page'  => -1,
            'order_by'  =>'title',
            'order' => 'ASC'


        );
        $query = new WP_Query($args);

        $postCount = $query->post_count;
        echo '<p class="session-count">Currently showing ' . $postCount . ' sessions.</p>';
        if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

                $id = $query->post->ID;

                echo '<a href="' . get_permalink( $id ) . '">';
                echo get_permalink( $id );
                echo '</a>';
                echo '<br />';

        endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php       endif;

        ?>
    </div>
    </div><!-- #content -->
    <div class="grid_3 pageSidebar">
    <?php get_sidebar(); ?>
    </div>
</div><!-- #mainContainer -->


<?php get_footer(); ?>