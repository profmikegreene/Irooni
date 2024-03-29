<?php
require( $_SERVER['DOCUMENT_ROOT'].'/wp/wp-load.php' );
// require( '/Users/mgreene/Dropbox/Dev/svn/trunk/www.wp.dev/wp-load.php' );

	$sortBy   = ISSET($sortBy) ? NULL : $_POST['sortBy'];
	$room     = ISSET($room) ? NULL :$_POST['room'];
	$cat      = ISSET($cat) ? NULL: $_POST['cat'];
	// $audience = ISSET($audience) ? NULL: $_POST['audience'];
	$blogID		= ISSET($blogID) ? NULL : $_POST['blogID'];
	// $audience_level = ISSET($audience_level) ?NULL : 'audience_';

	$args= array(
       'post_type'=>'sessions',
       'cat'	=> $cat,
       'posts_per_page'	=> -1,
       'order' => 'ASC',
       'orderby' => 'title'
  );
 switch ($sortBy) {
		case 'time':
			$sortBy = 'session_slot';
			$args['orderby'] = 'meta_value_num';
	 		$args['meta_key'] = $sortBy;
			break;
		case 'presenter':
			$sortBy = 'lead_presenter_lname';
			$args['orderby'] = 'meta_value';
	 		$args['meta_key'] = $sortBy;
			break;
		default:
			$sortBy = 'title';
			break;
	}

	if (strcmp($room, 'All')==0) {
	} else {
			$args['meta_query'] = array(
	     		array(
							'key'   =>	'session_room',
							'value' =>	$room
	     		)
	     );
		}
	//Use this to show the query
  //echo '<pre>' . var_dump($args) . '</pre>';
  switch_to_blog($blogID);
  $query = new WP_Query($args);

	$postCount = $query->post_count;
echo '<p class="session-count">Currently showing ' . $postCount . ' sessions.</p>';
if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

        $id = $query->post->ID;

        include '../content-session-excerpt.php';

endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php       endif;

  wp_reset_postdata();

?>