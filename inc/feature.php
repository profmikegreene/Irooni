<?php
		$firstPost = $remainingPosts = $singlePost = array();
		//global $post;
		$args = array(
            'numberposts' => 1,
						'category' => 62
        );
    $myPosts = get_posts($args);

    foreach ($myPosts as $post) :  setup_postdata($post);
    	if (has_post_thumbnail()) {
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$firstPost[0] = '<a href="'. get_permalink() . '"><img src="'. $thumbnail[0]. '" alt="'. get_the_title(). '" />';
				$firstPost[1] = '<a href="'. get_permalink() . '">'. get_the_title(). '</a>';
  		}
    endforeach;

    $args = array(
            'numberposts' => 4,
						'category' => 62,
						'offset' => 1
        );
    $myPosts = get_posts($args);

    foreach ($myPosts as $post) :  setup_postdata($post);
    	if (has_post_thumbnail()) {
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				 array_push($singlePost,'<a href="'. get_permalink() . '"><img data-src="'. $thumbnail[0]. '" alt="'. get_the_title(). '" />');
				array_push($singlePost, '<a href="'. get_permalink() . '">'. get_the_title(). '</a>');
  		}
  		array_push($remainingPosts, $singlePost);

    endforeach;

?>
			<div class="feature" id="feature">
				<?php
					echo $firstPost[0];
					foreach ($remainingPosts as $post) {
						echo $post[0];
					}
				?>
			</div>
			<div class="caption">
				<?php 
				echo $firstPost[1]; 
				foreach ($remainingPosts as $post) {
						echo $post[1];
					}?>
			</div>