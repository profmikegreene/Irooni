<?php
	$args = array(
          'post_type'=>'sessions',
          'posts_per_page'  => -1
	       );
	$query = new WP_Query($args);
	$sessions = array();
	$postCount = $query->post_count;
	echo '<p class="session-count">Currently showing ' . $postCount . ' sessions.</p>';
	if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();
    $id = $query->post->ID;
    $postTags = wp_get_post_tags( $id );

    $sessions[$id] = array();
    $sessions[$id]['post_ID']				=	$id;
    $sessions[$id]['category']			=	get_the_category( $id );
    $sessions[$id]['session_title']	= get_the_title( $id );
    $sessions[$id]['session_url']		= get_permalink( $id );
    $sessions[$id]['session_slot']	= esc_html( get_post_meta( $id, 'session_slot', true ) );
    $sessions[$id]['session_room']	= esc_html( get_post_meta( $id, 'session_room', true ) );

 endwhile;
 else: ?>
   <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php
endif;



?>

<table class="session-grid-table rt cf">
	<thead class="cf">
	<tr>
		<th class="blank">&nbsp;</th>
		<th class="weds">1:45-2:45pm</th>
		<th class="weds">3:00-4:00pm</th>
		<th class="weds">4:15-5:15pm</th>
		<th class="thurs">8:30-9:30am</th>
		<th class="thurs">9:45-10:45am</th>
		<th class="thurs">11:00-12:00pm</th>
		<th class="thurs">2:00-3:00pm</th>
		<th class="thurs">3:15-4:15pm</th>
		<th class="thurs">4:30-5:30pm</th>
		<th class="fri">9:00-10:00am</th>
		<th class="fri">10:15-11:15am</th>
	</tr>
</thead>
<tbody>
	<tr>
		<th>Shenandoah A</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Shenandoah A', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Shenandoah B</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Shenandoah B', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Pocahontas A</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Pocahontas A', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Pocahontas B</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Pocahontas B', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Appalachian</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Appalachian A', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Mill Mountain</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Mill Mountain', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Buck Mountain</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Buck Mountain', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Brush Mountain</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Brush Mountain', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Harrison/Tyler</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Harrison/Tyler', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Madison</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Madison', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Washington</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Washington', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Monroe</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Monroe', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Wilson</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Wilson', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Crystal A</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Crystal A', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Crystal B</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Crystal B', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Crystal C</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Crystal C', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Crystal D</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Crystal D', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Crystal E</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Crystal E', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Roanoke E</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Roanoke E', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Roanoke F</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Roanoke F', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Roanoke G</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Roanoke G', $i );
				
			}
		?>
	</tr>
	<tr>
		<th>Roanoke H</th>
		<?php
			for ($i=1; $i < 12 ; $i++) {
				
				profmg_session_grid_cycle( $sessions, 'Roanoke H', $i );
				
			}
		?>
	</tr>
</tbody>
</table>






