<?php

 /*Template Name: Concurrent Session List/Archive

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
                    <option value="ShenandoahA">Shenandoah A</option>
                    <option value="ShenandoahB">Shenandoah B</option>
                    <option value="PocahontasA">Pocahontas A</option>
                    <option value="PocahontasB">Pocahontas B</option>
                    <option value="Appalachian">Appalachian</option>
                    <option value="MillMtn">Mill Mountain</option>
                    <option value="BuckMtn">Buck Mountain</option>
                    <option value="BrushMtn">Brush Mountain</option>
                    <option value="HarrisonTyler">Harrison/Tyler</option>
                    <option value="Madison">Madison</option>
                    <option value="Washington">Washington</option>
                    <option value="Monroe">Monroe</option>
                    <option value="Wilson">Wilson</option>
                    <option value="CrystalA">Crystal A</option>
                    <option value="CrystalB">Crystal B</option>
                    <option value="CrystalC">Crystal C</option>
                    <option value="CrystalD">Crystal D</option>
                    <option value="CrystalE">Crystal E</option>
                    <option value="RoanokeE">Roanoke E</option>
                    <option value="RoanokeF">Roanoke F</option>
                    <option value="RoanokeG">Roanoke G</option>
                    <option value="RoanokeH">Roanoke H</option>
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
        <div class="postContent" id="pageContent">
       

        <?php get_template_part( 'content', 'page' ); ?>

        <?php endwhile; // end of the loop.

        $args= array(
            'post_type'=>'sessions',
            'posts_per_page'  => -1


        );
        $query = new WP_Query($args);
        include 'content-sessionList.php'; ?>
    </div>
    </div><!-- #content -->
    <div class="grid_3 pageSidebar">
    <?php get_sidebar(); ?>
    </div>
</div><!-- #mainContainer -->


<?php get_footer(); ?>