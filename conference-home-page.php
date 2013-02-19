<?php
/* ==================================================================
*
*   Template Name: Conference Home Page
*
* -----------------------------------------------------------------*/



get_header(); ?>
<section class="feature_and_announcements">
 <div class="container ">
	<div class="grid_12">
		<div class="feature grid_8" id="feature">
			<div class="fadeIn alpha">
				<h1>Answer the question, what is great teaching?</h1>
				<p>Featuring Seven Principles for Good Practice in Undergraduate Education by Arthur W. Chickering and Zelda F. Gamson</p>
			</div>
			<div class="fadeIn">
				<h1>Learning what teachers make with Taylor Mali.</h1>

			</div>
			<div class="fadeIn">
				<h1>Explore how to learn, teach, and apply technology in your classroom, right in your office.</h1>
			</div>
		</div>
		<div class="callToAction grid_4 push_8">
			<a href="http://www.cvent.com/events/2013-vccs-new-horizons-conference-participant-registration/event-summary-860946d7d77a43efbf9311afe93d5f65.aspx" 
			   target="_blank" class="green button">Attend NH13</a>
			<a href="/nh13/agenda/sessions/grid" class="white button">Session Grid</a>
		</div>
	</div>
	</div>
</section>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="main_content">
 <div class="container">
	<article class="post" id="post-<?php the_ID(); ?>">
	<div class="entry">
		<div class="grid_8">
			<h2>Welcome to VCCS New Horizons 2013</h2>
			<?php the_content(); ?>
		</div>
		<div class="grid_4">
			<div class="secondary">
				<?php
					$args = array(
						'numberposts'	=> 1,
						'post_status'	=> 'publish',
						'post_type'		=> 'post'
						);
					$lastposts = get_posts( $args );
					foreach($lastposts as $post) : setup_postdata($post); ?>
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
					<?php endforeach; ?>
					<?php wp_reset_query(); ?>
					<hr />
					<div class="dates" id="dates">
						<h3>Current Events</h3>
						<div class="date">Feb. 15 - Registration Closes</div>
						<div class="date">Apr. 3 - NH13 Day 1</div>
						<div class="date">Apr. 4 - NH13 Day 2</div>
						<div class="date">Apr. 5 - NH13 Day 3</div>
					</div>
			</div>
		</div>
		</div>
	</article>
	<?php endwhile; endif; ?>
</section>
	<section class="events_tweets_and_photos">
		<div class="container">
			<div class="grid_4" id="tweets">
				<div class="tweets">
					<?php dynamic_sidebar('homepage-twitter-conf-feed'); ?>
				</div>
			</div>
			<div class="grid_5" id="photos">
				<div class="photos">
					<h3>Photos</h3>
					<?php echo do_shortcode( '[AFG_gallery]' );	?>
				</div>
			</div>
			<div class="grid_3" id="dates">
				<div class="tweets">
					<h3>#nh13 Tweets</h3>
					<?php dynamic_sidebar('homepage-twitter-hashtag'); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="tag_cloud">
		<div class="container">
			<div class="grid_12">
				<h3>I want to learn about...</h3>
				<?php profmg_cloud(); ?>
			</div>
		</div>
	</section>
	<section class="vendor_cloud">
		<div class="container">
			<div class="grid_12">
		<?php
		$argsThumb = array(
		    'order'          => 'ASC',
		    'post_type'      => 'attachment',
		    'posts_per_page'	=>	-1,
		    'post_parent'		 => 36,
		    'post_status'    => null
		);
		$attachments = get_posts( $argsThumb );
		if ($attachments) {
		    foreach ($attachments as $attachment) {
		    	$img = wp_get_attachment_image_src($attachment->ID, 'vendor-thumb', false);
          echo '<img src="'.$img[0].'" />';
		    }
		}
?>
			</div>
		</div>
	</section>
	<br class="clearFloat" />
<?php get_footer(); ?>