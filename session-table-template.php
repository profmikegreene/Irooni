<?php

 /*Template Name: Session Table-form

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
<div id="mainContainer" class="mainContainer">
    <div id="content" class="" role="main">
        <div class="pageContent" id="pageContent">
        <?php get_template_part( 'content', 'page' ); ?>
        <table class="grid">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Presenter</th>
                <th class="room">Room</th>
                <th class="time">Time</th>
                <th>URL</th>
            </tr>
        <?php endwhile; // end of the loop.
            $args= array(
                'post_type'=>'sessions',
                'posts_per_page'  => -1,
                'orderby'  =>'meta_value_num',
                'order' => 'ASC',
                'meta_key' => 'nh_session_id'



            );
            $query = new WP_Query($args);

            $postCount = $query->post_count;
            echo '<p class="session-count">Currently showing ' . $postCount . ' sessions'.'</p>';
            if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

                    $id = $query->post->ID;
                    echo '<tr>';
                    echo '<td>'.get_post_meta( $id, 'nh_session_id', true ).'</td>';
                    echo '<td>'.get_the_title($id).'</td>';
                    echo '<td>'.get_post_meta( $id, 'lead_presenter_fname', true ).' '.get_post_meta( $id, 'lead_presenter_lname', true ).'</td>';
                    echo '<td>'.get_post_meta( $id, 'session_room', true ).'</td>';
                    echo '<td>';
                    switch ( get_post_meta( $id, 'session_slot', true ) ) {
                            case '1':
                                echo 'Wednesday 1:45 p.m.';
                                break;
                            case '2':
                                echo 'Wednesday 3:00 p.m.';
                                break;
                            case '3':
                                echo 'Wednesday 4:15 p.m.';
                                break;
                            case '4':
                                echo 'Thursday 8:30 a.m.';
                                break;
                            case '5':
                                echo 'Thursday 9:45 a.m.';
                                break;
                            case '6':
                                echo 'Thursday 11:00 a.m.';
                                break;
                            case '7':
                                echo 'Thursday 2:00 p.m.';
                                break;
                            case '8':
                                echo 'Thursday 3:15 p.m.';
                                break;
                            case '9':
                                echo 'Thursday 4:30 p.m.';
                                break;
                            case '10':
                                echo 'Friday 9:00 a.m.';
                                break;
                            case '11':
                                echo 'Friday 10:15 a.m.';
                                break;
                            default:
                                break;
                            }
                    echo '</td>';
                    echo '<td><a href="' . get_permalink( $id ) . '">';
                    echo get_permalink( $id );
                    echo '</a></td>';
                    echo '</tr>';


            endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php       endif;

        ?>
        </table>
    </div>
    </div><!-- #content -->
</div><!-- #mainContainer -->


<?php get_footer(); ?>