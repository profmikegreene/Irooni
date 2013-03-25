<?php

 /*Template Name: List sessions by presenter

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
                'orderby'  =>'meta_value',
                'order' => 'ASC',
                'meta_key' => 'lead_presenter_lname'
        );
        $query = new WP_Query($args);
        $names = array();
        $postCount = $query->post_count;
        echo '<p class="session-count">Currently showing ' . $postCount . ' sessions.</p>';
        if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

            $id = $query->post->ID;
            $names[get_post_meta( $id, 'lead_presenter_fname', true ).' '.get_post_meta( $id, 'lead_presenter_lname', true )] = array(
                'first' =>get_post_meta( $id, 'lead_presenter_fname', true ),
                'last' =>get_post_meta( $id, 'lead_presenter_lname', true )
                );
        endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php       endif;

        foreach ($names as $key => $name) {
            $args= array(
                'post_type'=>'sessions',
                'posts_per_page'  => -1,
                'orderby'  =>'title',
                'order' => 'ASC',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'lead_presenter_lname',
                        'value' => $name['last']
                    ),
                    array (
                        'key' =>'lead_presenter_fname',
                        'value' => $name['first']
                    )
                )


            );
            $query = new WP_Query($args);

            $postCount = $query->post_count;
            echo '<p>'.$key;
            echo '<br />';
            if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

                    $id = $query->post->ID;

                    echo '<a href="' . get_permalink( $id ) . '">';
                    echo get_the_title( $id );
                    echo '</a>';
                    echo '<br />';


            endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php       endif;
            echo '<p>';
        }//end foreach
        ?>
    </div>
    </div><!-- #content -->
    <div class="grid_3 pageSidebar">
    <?php get_sidebar(); ?>
    </div>
</div><!-- #mainContainer -->


<?php get_footer(); ?>