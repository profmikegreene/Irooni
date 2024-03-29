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
        $rooms = array(
        'Shenandoah A',
        'Shenandoah B',
        'Pocahontas A',
        'Pocahontas B',
        'Appalachian',
        'Mill Mountain',
        'Buck Mountain',
        'Brush Mountain',
        'Tinker Mountain',
        'Harrison / Tyler',
        'Madison',
        'Washington',
        'Monroe Computer Lab',
        'Wilson Computer Lab',
        'Crystal A',
        'Crystal B',
        'Crystal C',
        'Crystal D',
        'Crystal E',
        'Roanoke E',
        'Roanoke F',
        'Roanoke G',
        'Roanoke H'
        );
        foreach ($rooms as $room) {
            $args= array(
                'post_type'=>'sessions',
                'posts_per_page'  => -1,
                'orderby'  =>'title',
                'order' => 'ASC',
                'meta_key' => 'session_room',
                'meta_value' => $room


            );
            $query = new WP_Query($args);

            $postCount = $query->post_count;
            echo '<p class="session-count">Currently showing ' . $postCount . ' sessions in room '. $room .'.</p>';
            if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

                    $id = $query->post->ID;

                    echo '<a href="' . get_permalink( $id ) . '">';
                    echo get_permalink( $id );
                    echo '</a>';
                    echo '<br />';


            endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php       endif;

        }//end foreach
        ?>
    </div>
    </div><!-- #content -->
    <div class="grid_3 pageSidebar">
    <?php get_sidebar(); ?>
    </div>
</div><!-- #mainContainer -->


<?php get_footer(); ?>