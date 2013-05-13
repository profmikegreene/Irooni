<?php

 /*Template Name: Single room all sessions

 */
isset($_GET['room']) ? $room = $_GET['room'] : $room = '' ;
switch ($room) {
    case 'ShenandoahA':
        $room = 'Shenandoah A';
        break;
    case 'ShenandoahB':
        $room = 'Shenandoah B';
        break;
    case 'PocahontasA':
        $room = 'Pocahontas A';
        break;
    case 'PocahontasB':
        $room = 'Pocahontas B';
        break;
    case 'Appalachian':
        break;
    case 'MillMountain':
        $room = 'Mill Mountain';
        break;
    case 'BuckMountain':
        $room = 'Buck Mountain';
        break;
    case 'BrushMountain':
        $room = 'Brush Mountain';
        break;
    case 'TinkerMountain':
        $room = 'Tinker Mountain';
        break;
    case 'Harrison/Tyler':
        $room = 'Harrison / Tyler';
        break;
    case 'Madison':
        break;
    case 'Washington':
        break;
    case 'MonroeComputerLab':
        $room = 'Monroe Computer Lab';
        break;
    case 'WilsonComputerLab':
        $room = 'Wilson Computer Lab';
        break;
    case 'CrystalA':
        $room = 'Crystal A';
        break;
    case 'CrystalB':
        $room = 'Crystal B';
        break;
    case 'CrystalC':
        $room = 'Crystal C';
        break;
    case 'CrystalD':
        $room = 'Crystal D';
        break;
    case 'CrystalE':
        $room = 'Crystal E';
        break;
    case 'RoanokeE':
        $room = 'Roanoke E';
        break;
    case 'RoanokeF':
        $room = 'Roanoke F';
        break;
    case 'RoanokeG':
        $room = 'Roanoke G';
        break;
    case 'RoanokeH':
        $room = 'Roanoke H';
        break;
    default:
        break;
}
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
                'meta_key' => 'session_slot',
                'orderby'  =>'meta_value_num',
                'order' => 'ASC',
                'meta_key' => 'session_room',
                'meta_value' => $room


            );
            $query = new WP_Query($args);

            $postCount = $query->post_count;
            echo '<p class="session-count">Currently showing ' . $postCount . ' sessions in room '. $room .'.</p>';
            if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

                    $id = $query->post->ID;

                    echo '<p><a href="' . get_permalink( $id ) . '">';
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
                    echo ' ' . get_the_title( $id ) . ' with ' .
                    get_post_meta( $id, 'lead_presenter_fname', true ) . ' ' .
                    get_post_meta( $id, 'lead_presenter_lname', true );
                    echo '</a></p>';


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