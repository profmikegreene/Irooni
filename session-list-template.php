<?php

 /*Template Name: Concurrent Session List

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
            <form method="post" name="controlForm" action="#" id="controlForm" class="controlForm">
                <label for="sortBy">Sort By</label><br />
                <select name="sortBy" id="sortBy">
                    <option value="time">Time</option>
                    <option value="title">Title</option>
                    <option value="presenter">Presenter</option>
                </select>
                <br />
                <label for="room">Filter By</label><br />
                <select name="room" id="filterByRoom">
                    <option value="All">All Rooms</option>
                    <option value="Shenandoah A">Shenandoah A</option>
                    <option value="Shenandoah B">Shenandoah B</option>
                    <option value="Pocahontas A">Pocahontas A</option>
                    <option value="Pocahontas B">Pocahontas B</option>
                    <option value="Appalachian">Appalachian</option>
                    <option value="Mill Mountain">Mill Mountain</option>
                    <option value="Buck Mountain">Buck Mountain</option>
                    <option value="Brush Mountain">Brush Mountain</option>
                    <option value="Tinker Mountain">Tinker Mountain</option>
                    <option value="Harrison / Tyler">Harrison/Tyler</option>
                    <option value="Madison">Madison</option>
                    <option value="Washington">Washington</option>
                    <option value="Monroe Computer Lab">Monroe</option>
                    <option value="Wilson Computer Lab">Wilson</option>
                    <option value="Crystal A">Crystal A</option>
                    <option value="Crystal B">Crystal B</option>
                    <option value="Crystal C">Crystal C</option>
                    <option value="Crystal D">Crystal D</option>
                    <option value="Crystal E">Crystal E</option>
                    <option value="Roanoke E">Roanoke E</option>
                    <option value="Roanoke F">Roanoke F</option>
                    <option value="Roanoke G">Roanoke G</option>
                    <option value="Roanoke H">Roanoke H</option>
                </select>
<?php
                    $args = array(
                            'hide_empty'    =>  0,
                            'hierarchical'  =>  1,
                            'show_option_all'   =>  'All Categories'
                        );
                    wp_dropdown_categories( $args );
?>
                <input type="hidden" id="blogID" name="blogID" value="<?php echo $blog_id; ?>" />
                <input id="submit" class="green button" name="submit" type="submit" value="View">
            </form>
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
        include(locate_template( 'session-list-content.php' )); ?>
    </div>
    </div><!-- #content -->
    <div class="grid_3 pageSidebar">
    <?php get_sidebar(); ?>
    </div>
</div><!-- #mainContainer -->


<?php get_footer(); ?>