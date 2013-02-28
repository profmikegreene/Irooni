<?php

        $query = new WP_Query($args);

$postCount = $query->post_count;
echo '<p class="session-count">Currently showing ' . $postCount . ' sessions.</p>';
if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

        $id = $query->post->ID;

        include(locate_template( 'content-session-excerpt.php' ));

endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php       endif;
?>