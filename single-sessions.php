<?php
/**
 * The template for displaying a single session
 */

get_header(); ?>

<div id="mainContainer" class="container mainContainer">
	<div id="content" class="grid_7 session-single" role="main">
		<div class="sessionContent">

<?php
			if (have_posts()) : while (have_posts()) : the_post();
			$postID = get_the_ID();
			$meta = get_post_meta($postID);
?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<p class="session-sentence"><?php echo $meta['session_sentence'][0]; ?></p>
					<?php the_post_thumbnail('large'); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
					<h2>Session Outcomes</h2>
					<p><?php echo $meta['session_outcome'][0]; ?></p>
				</div><!-- .entry-content -->
				<div class="separator"></div>
			</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // end of the loop. ?>
		<?php endif; ?>
	</div>
	</div><!-- #content -->
	<div class="grid_5 pageSidebar session-sidebar">
		<div class="presenter-details">
			<h2>Presenter Details</h2>
			 	<p><span class="label presenter">Presenter:</span>
					 <?php echo $meta['lead_presenter_fname'][0] . ' ' .
						$meta['lead_presenter_lname'][0] . ', ' . $meta['lead_presenter_title'][0] . ' at ' .
						$meta['lead_presenter_college'][0] ; ?></p>

					 <?php
					 	if (isset( $meta['lead_presenter_facebook'][0] )){
					 ?>
					 		<p  class="facebook"><span class="label">Facebook:</span>
					 		<a target="_blank" href="http://www.facebook.com/<?php echo $meta['lead_presenter_facebook'][0];?>"><?php echo $meta['lead_presenter_facebook'][0];?></a></p>
							</p>
						<?php
						} else {
						}
						?>

					 <?php
					 	if (isset( $meta['lead_presenter_twitter'][0] )){
					 ?>
					 		<p class="twitter"><span class="label">Twitter:</span>
					 		<a target="_blank" href="http://www.twitter.com/<?php echo $meta['lead_presenter_twitter'][0];?>">@<?php echo $meta['lead_presenter_twitter'][0];?></a></p>
							</p>
						<?php
						} else {
						}
						?>
					<?php if (isset( $meta['co1_presenter_fname'][0] )){ ?>
							<p><span class="label presenter">Co-Presenter:</span>
						<?php
							echo $meta['co1_presenter_fname'][0];
							echo isset( $meta['co1_presenter_lname'][0] ) ? ' ' . $meta['co1_presenter_lname'][0] : NULL;
							echo isset( $meta['co1_presenter_title'][0] ) ? ', ' . $meta['co1_presenter_title'][0] : NULL;
							echo isset ( $meta['co1_presenter_college'][0] ) ? ' at ' . $meta['co1_presenter_college'][0] : NULL ;
						?>
							</p>

						<?php
							echo isset( $meta['co1_presenter_facebook'][0] ) ?
							'<p class="facebook"><span class="label">Facebook:</span><a target="_blank" href="http://www.facebook.com/' . $meta['co1_presenter_facebook'][0] . '">' . $meta['co1_presenter_facebook'][0] . '</a></p>' : NULL;
						?>

						<?php
							echo isset( $meta['co1_presenter_twitter'][0] ) ?
							'<p class="twitter"><span class="label">Twitter:</span><a target="_blank" href="http://www.twitter.com/' . $meta['co1_presenter_twitter'][0] . '">@' . $meta['co1_presenter_twitter'][0] . '</a></p>' : NULL;
						?>

					<?php } ?>
					<?php if (isset( $meta['co2_presenter_fname'][0] )){ ?>
							<p><span class="label presenter">Co-Presenter:</span>
						<?php
							echo $meta['co2_presenter_fname'][0];
							echo isset( $meta['co2_presenter_lname'][0] ) ? ' ' . $meta['co2_presenter_lname'][0] : NULL;
							echo isset( $meta['co2_presenter_title'][0] ) ? ', ' . $meta['co2_presenter_title'][0] : NULL;
							echo isset ( $meta['co2_presenter_college'][0] ) ? ' at ' . $meta['co2_presenter_college'][0] : NULL ;
						?>
							</p>

						<?php
							echo isset( $meta['co2_presenter_facebook'][0] ) ?
							'<p class="facebook"><span class="label">Facebook:</span><a target="_blank" href="http://www.facebook.com/' . $meta['co2_presenter_facebook'][0] . '">' . $meta['co2_presenter_facebook'][0] . '</a></p>' : NULL;
						?>

						<?php
							echo isset( $meta['co2_presenter_twitter'][0] ) ?
							'<p class="twitter"><span class="label">Twitter:</span><a target="_blank" href="http://www.twitter.com/' . $meta['co2_presenter_twitter'][0] . '">@' . $meta['co2_presenter_twitter'][0] . '</a></p>' : NULL;
						?>
					<?php } ?>
					<?php if (isset( $meta['co3_presenter_fname'][0] )){ ?>
							<p><span class="label presenter">Co-Presenter:</span>
						<?php
							echo $meta['co3_presenter_fname'][0];
							echo isset( $meta['co3_presenter_lname'][0] ) ? ' ' . $meta['co3_presenter_lname'][0] : NULL;
							echo isset( $meta['co3_presenter_title'][0] ) ? ', ' . $meta['co3_presenter_title'][0] : NULL;
							echo isset ( $meta['co3_presenter_college'][0] ) ? ' at ' . $meta['co3_presenter_college'][0] : NULL ;
						?>
							</p>

						<?php
							echo isset( $meta['co3_presenter_facebook'][0] ) ?
							'<p class="facebook"><span class="label">Facebook:</span><a target="_blank" href="http://www.facebook.com/' . $meta['co3_presenter_facebook'][0] . '">' . $meta['co3_presenter_facebook'][0] . '</a></p>' : NULL;
						?>
						<?php
							echo isset( $meta['co3_presenter_twitter'][0] ) ?
							'<p class="twitter"><span class="label">Twitter:</span><a target="_blank" href="http://www.twitter.com/' . $meta['co3_presenter_twitter'][0] . '">@' . $meta['co3_presenter_twitter'][0] . '</a></p>' : NULL;
						?>
					<?php } ?>
					<?php if (isset( $meta['co4_presenter_fname'][0] )){ ?>
							<p><span class="label presenter">Co-Presenter:</span>
						<?php
							echo $meta['co4_presenter_fname'][0];
							echo isset( $meta['co4_presenter_lname'][0] ) ? ' ' . $meta['co4_presenter_lname'][0] : NULL;
							echo isset( $meta['co4_presenter_title'][0] ) ? ', ' . $meta['co4_presenter_title'][0] : NULL;
							echo isset ( $meta['co4_presenter_college'][0] ) ? ' at ' . $meta['co4_presenter_college'][0] : NULL ;
						?>
							</p>
						<?php
							echo isset( $meta['co4_presenter_facebook'][0] ) ?
							'<p class="facebook"><span class="label">Facebook:</span><a target="_blank" href="http://www.facebook.com/' . $meta['co4_presenter_facebook'][0] . '">' . $meta['co4_presenter_facebook'][0] . '</a></p>' : NULL;
						?>
						<?php
							echo isset( $meta['co4_presenter_twitter'][0] ) ?
							'<p class="twitter"><span class="label">Twitter:</span><a target="_blank" href="http://www.twitter.com/' . $meta['co4_presenter_twitter'][0] . '">@' . $meta['co4_presenter_twitter'][0] . '</a></p>' : NULL;
						?>
							
					<?php } ?>
		</div>
		<div class="session-details">
			<h2>Session Details</h2>
			<p><span class="label">Room:</span>
								<?php echo $meta['session_room'][0]; ?></p>

			<p><span class="label">Time:</span>
			<?php
				switch ( $meta['session_slot'][0] ) {
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
			?></p>

			<p><span class="label">Audience:</span>

				<?php
					if (isset($meta['audience_all'][0])) {
						echo 'All';
					} else {
						$audience = array();
						(isset($meta['audience_faculty'][0]) ? $audience['faculty'] = $meta['audience_faculty'][0] : NULL);
						(isset($meta['audience_studentservices'][0]) ? $audience['studentservices'] = $meta['audience_studentservices'][0] : NULL);
						(isset($meta['audience_it'][0]) ? $audience['it'] = $meta['audience_it'][0] : NULL);
						(isset($meta['audience_bbadmin'][0]) ? $audience['bbadmin'] = $meta['audience_bbadmin'][0] : NULL);
						(isset($meta['audience_administrator'][0]) ? $audience['administrator'] = $meta['audience_administrator'][0] : NULL);
						(isset($meta['audience_facilities'][0]) ? $audience['facilities'] = $meta['audience_facilities'][0] : NULL);
						(isset($meta['audience_adjuncts'][0]) ? $audience['adjuncts'] = $meta['audience_adjuncts'][0] : NULL);
						$commaSeparated = implode(', ', $audience);
						echo $commaSeparated;
					}
				 ?>
				</p>

			<p><span class="label">Level:</span>

				<?php
					if (isset($meta['audience_level_all'][0])) {
						echo 'All';
					} else {
						$audience = array();
						(isset($meta['audience_level_beginner'][0]) ? $audience['beg'] = $meta['audience_level_beginner'][0] : NULL);
						(isset($meta['audience_level_intermediate'][0]) ? $audience['int'] = $meta['audience_level_intermediate'][0] : NULL);
						(isset($meta['audience_level_advanced'][0]) ? $audience['adv'] = $meta['audience_level_advanced'][0] : NULL);
						$commaSeparated = implode(', ', $audience);
						echo $commaSeparated;
					}
					?>
				</p>
			<p><span class="label">Category: </span>

			<?php 
			$categories = get_the_category();
			$separator = ' ';
			$output = '';
			if($categories){
				foreach($categories as $category) {
					$output .= '<a class="category button '.esc_attr( $category->slug ).'" href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
				}
			echo trim($output, $separator);
			} ?>
			</p>
			<p><span class="label">Tags: </span>

			<?php the_tags( '', ', ', ''); ?>
			</p>
		</div><!--end .session-details-->
	</div>
</div><!-- #mainContainer -->
<?php get_footer(); ?>