<?php
/* ==================================================================
*
*   Custom Session Grid Post Type
*
* -----------------------------------------------------------------*/
add_action( 'init', 'profmg_register_my_sessions' );
function profmg_register_my_sessions() {
  $labels = array(
      'name' => _x( 'Sessions', 'sessions' ),
      'singular_name' => _x( 'Session', 'sessions' ),
      'add_new' => _x( 'Add New', 'sessions' ),
      'add_new_item' => _x( 'Add New Session', 'sessions' ),
      'edit_item' => _x( 'Edit Session', 'sessions' ),
      'new_item' => _x( 'New Session', 'sessions' ),
      'view_item' => _x( 'View Session', 'sessions' ),
      'search_items' => _x( 'Search Session', 'sessions' ),
      'not_found' => _x( 'No session found', 'sessions' ),
      'not_found_in_trash' => _x( 'No session found in Trash', 'sessions' ),
      'parent_item_colon' => _x( 'Parent Session:', 'sessions' ),
      'menu_name' => _x( 'Sessions', 'sessions' )
  );
  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'description' => 'New Horizons Sessions',
      'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
      'taxonomies' => array( 'category', 'post_tag', 'sessions' ),
      'public' => true,
      'show_ui' => true,
      'menu_position' => 5,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => true,
      'capability_type' => 'post'
  );
  register_post_type( 'sessions', $args );
}


if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true );
    add_image_size( 'session-pic', 260, 160 );
}

add_action( 'admin_init', 'profmg_create_meta_box' );
function profmg_create_meta_box() {
	add_meta_box( 'session_meta_box',
	'Session Details',
	'profmg_display_session_meta_box',
	'sessions', 'normal', 'high' );
}

global $profmg_session_fields;
global $custom_fields;

$profmg_session_fields = array(
	'$nh_session_id'               => 'nh_session_id',
	'$session_room'                => 'session_room',
	'$session_slot'                => 'session_slot',

	'$lead_presenter_type'         => 'lead_presenter_type',
	'$lead_presenter_fname'        => 'lead_presenter_fname',
	'$lead_presenter_lname'        => 'lead_presenter_lname',
	'$lead_presenter_title'        => 'lead_presenter_title',
	'$lead_presenter_college'      => 'lead_presenter_college',
	'$lead_presenter_facebook'		 => 'lead_presenter_facebook',
	'$lead_presenter_twitter'			 => 'lead_presenter_twitter',

	'$co1_presenter_fname'    => 'co1_presenter_fname',
	'$co1_presenter_lname'    => 'co1_presenter_lname',
	'$co1_presenter_title'    => 'co1_presenter_title',
	'$co1_presenter_college'  => 'co1_presenter_college',
	'$co1_presenter_facebook' => 'co1_presenter_facebook',
	'$co1_presenter_twitter'  => 'co1_presenter_twitter',

	'$co2_presenter_fname'    => 'co2_presenter_fname',
	'$co2_presenter_lname'    => 'co2_presenter_lname',
	'$co2_presenter_title'    => 'co2_presenter_title',
	'$co2_presenter_college'  => 'co2_presenter_college',
	'$co2_presenter_facebook' => 'co2_presenter_facebook',
	'$co2_presenter_twitter'  => 'co2_presenter_twitter',

	'$co3_presenter_fname'    => 'co3_presenter_fname',
	'$co3_presenter_lname'    => 'co3_presenter_lname',
	'$co3_presenter_title'    => 'co3_presenter_title',
	'$co3_presenter_college'  => 'co3_presenter_college',
	'$co3_presenter_facebook' => 'co3_presenter_facebook',
	'$co3_presenter_twitter'  => 'co3_presenter_twitter',

	'$co4_presenter_fname'    => 'co4_presenter_fname',
	'$co4_presenter_lname'    => 'co4_presenter_lname',
	'$co4_presenter_title'    => 'co4_presenter_title',
	'$co4_presenter_college'  => 'co4_presenter_college',
	'$co4_presenter_facebook' => 'co4_presenter_facebook',
	'$co4_presenter_twitter'  => 'co4_presenter_twitter',

	'$session_sentence'            => 'session_sentence',
	'$session_type'                => 'session_type',
	'$session_abstract'            => 'session_abstract',
	'$session_outcome'             => 'session_outcome',
	'$session_scantron'						 => 'session_scantron',
	'$session_slideshare'					 => 'session_slideshare',

	'$audience_level_beginner'     => 'audience_level_beginner',
	'$audience_level_intermediate' => 'audience_level_intermediate',
	'$audience_level_advanced'     => 'audience_level_advanced',
	'$audience_level_all'          => 'audience_level_all',
	'$audience_faculty'            => 'audience_faculty',
	'$audience_studentservices'    => 'audience_studentservices',
	'$audience_it'                 => 'audience_it',
	'$audience_bbadmin'            => 'audience_bbadmin',
	'$audience_administrator'      => 'audience_administrator',
	'$audience_facilities'         => 'audience_facilities',
	'$audience_adjuncts'           => 'audience_adjuncts',
	'$audience_all'                => 'audience_all'
);
function profmg_display_session_meta_box ( $session ){
	global $profmg_session_fields;
	$custom_fields = get_post_custom($session->ID);
?>
	<table>
		<tr>
			<td class="session-details-title">Scantron Link: </td>
			<td>
				<input type="text" size="70"
					name="session_scantron"
					value="<?php if (isset($custom_fields['session_scantron'][0])){echo $custom_fields['session_scantron'][0];} ?>"
					placeholder="" />
				</td>
		</tr>
		<tr>
			<td class="session-details-title">Slideshare Embed: </td>
			<td>
				<input type="text" size="70"
					name="session_slideshare"
					value="<?php if (isset($custom_fields['session_slideshare'][0])){echo $custom_fields['session_slideshare'][0];} ?>"
					placeholder="" />
				</td>
		</tr>
		<tr>
			<td class="session-details-title">New Horizons ID: </td>
			<td>
				<input type="text" size="25"
					name="nh_session_id"
					value="<?php if (isset($custom_fields['nh_session_id'][0])){echo $custom_fields['nh_session_id'][0];} ?>"
					placeholder="12345" />
				</td>
		</tr>
		<tr>
			<td>Room: </td>
			<td>
				<select name="session_room" id="session_room">
          <option value="Shenandoah A" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Shenandoah A' ); }?>>Shenandoah A</option>
          <option value="Shenandoah B" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Shenandoah B' ); }?>>Shenandoah B</option>
           <option value="Pocahontas A" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Pocahontas A' ); }?>>Pocahontas A</option>
           <option value="Pocahontas B" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Pocahontas B' ); }?>>Pocahontas B</option>
           <option value="Appalachian" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Appalachian' ); }?>>Appalachian</option>
           <option value="Mill Mountain" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Mill Mountain' ); }?>>Mill Mountain</option>
           <option value="Buck Mountain" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Buck Mountain' ); }?>>Buck Mountain</option>
           <option value="Brush Mountain" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Brush Mountain' ); }?>>Brush Mountain</option>
           <option value="Tinker Mountain" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Tinker Mountain' ); }?>>Tinker Mountain</option>
           <option value="Harrison / Tyler" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Harrison / Tyler' ); }?>>Harrison / Tyler</option>
           <option value="Madison" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Madison' ); }?>>Madison</option>
           <option value="Washington" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Washington' ); }?>>Washington</option>
           <option value="Monroe Computer Lab" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Monroe Computer Lab' ); }?>>Monroe Computer Lab</option>
           <option value="Wilson Computer Lab" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Wilson Computer Lab' ); }?>>Wilson Computer Lab</option>
           <option value="Crystal A" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Crystal A' ); }?>>Crystal A</option>
           <option value="Crystal B" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Crystal B' ); }?>>Crystal B</option>
           <option value="Crystal C" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Crystal C' ); }?>>Crystal C</option>
           <option value="Crystal D" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Crystal D' ); }?>>Crystal D</option>
           <option value="Crystal E" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Crystal E' ); }?>>Crystal E</option>
           <option value="Roanoke E" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Roanoke E' ); }?>>Roanoke E</option>
           <option value="Roanoke F" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Roanoke F' ); }?>>Roanoke F</option>
           <option value="Roanoke G" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Roanoke G' ); }?>>Roanoke G</option>
           <option value="Roanoke H" <?php if (isset($custom_fields['session_room'][0])){selected( $custom_fields['session_room'][0],
           'Roanoke H' ); }?>>Roanoke H</option>
        </select>
			</td>
		</tr>
		<tr>
			<td>Time slot: </td>
			<td>
				<select name="session_slot" id="session_slot">
          <option value="1" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
          '1' ); }?>>Wednesday 1:45 p.m.</option>
          <option value="2" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
          '2' ); }?>>Wednesday 3:00 p.m.</option>
         	<option value="3" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
         	'3' ); }?>>Wednesday 4:15 p.m.</option>
         	<option value="4" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
         	'4' ); }?>>Thursday 8:30 a.m.</option>
         	<option value="5" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
         	'5' ); }?>>Thursday 9:45 a.m.</option>
         	<option value="6" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
         	'6' ); }?>>Thursday 11:00 a.m.</option>
         	<option value="7" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
         	'7' ); }?>>Thursday 2:00 p.m.</option>
         	<option value="8" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
         	'8' ); }?>>Thursday 3:15 p.m.</option>
         	<option value="9" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
         	'9' ); }?>>Thursday 4:30 p.m.</option>
         	<option value="10" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
         	'10' ); }?>>Friday 9:00 a.m.</option>
         	<option value="11" <?php if (isset($custom_fields['session_slot'][0])){selected( $custom_fields['session_slot'][0],
         	'11' ); }?>>Friday 10:15 a.m.</option>
        </select>
				</td>
		</tr>
		<tr>
			<td>Session Sentence: </td>
			<td>
				<textarea rows="5" cols="50" name="session_sentence"><?php 
				if (isset($custom_fields['session_sentence'][0])){echo $custom_fields['session_sentence'][0];} ?>
				</textarea>
				</td>
		</tr>
		<tr>
			<td>Session Abstract: </td>
			<td>
				<textarea rows="5" cols="50" name="session_abstract"><?php 
				if (isset($custom_fields['session_abstract'][0])){echo $custom_fields['session_abstract'][0];} ?>
				</textarea>
				</td>
		</tr>
		<tr>
			<td><label for="session_type">Session Type: </label></td>
			<td>
				<select name="session_type" id="session_type">
					<option value="Select One"
						<?php if (isset($custom_fields['session_type'][0])){selected( $custom_fields['session_type'][0], 'Select One' );} ?>
						>Select One
					</option>
					<option value="Single presenter only (1 hour, podium set-up)"
						<?php if (isset($custom_fields['session_type'][0])){selected( $custom_fields['session_type'][0],
						 'Single presenter only (1 hour, podium set-up)' );} ?>
						>Single presenter only (1 hour, podium set-up)
					</option>
					<option value="Presenters forum (1 hour, podium set-up, 1 lead presenter and up to 4 additional co-presenters)"
						<?php if (isset($custom_fields['session_type'][0])){selected( $custom_fields['session_type'][0],
						 'Presenters forum (1 hour, podium set-up, 1 lead presenter and up to 4 additional co-presenters)' );} ?>
						>Presenters forum (1 hour, podium set-up, 1 lead presenter and up to 4 additional co-presenters)
					</option>
					<option value="Presenters panel (1 hour, head table set-up, 1 lead presenter and up to 4 additional co-presenters)"
						<?php if (isset($custom_fields['session_type'][0])){selected( $custom_fields['session_type'][0],
						 'Presenters panel (1 hour, head table set-up, 1 lead presenter and up to 4 additional co-presenters)' ); }?>
						>Presenters panel (1 hour, head table set-up, 1 lead presenter and up to 4 additional co-presenters)
					</option>
					<option value="Computer lab workshop (1 hour, hands-on)"
						<?php if (isset($custom_fields['session_type'][0])){selected( $custom_fields['session_type'][0],
						 'Computer lab workshop (1 hour, hands-on)' ); }?>
						>Computer lab workshop (1 hour, hands-on)
					</option>
					<option value="Computer lab workshop (2 hours, hands-on)"
						<?php if (isset($custom_fields['session_type'][0])){selected( $custom_fields['session_type'][0],
						 'Computer lab workshop (2 hours, hands-on)' ); }?>
						>Computer lab workshop (2 hours, hands on)
					</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="lead_presenter_type">Presenter Type: </label></td>
			<td>
        <select name="lead_presenter_type" id="lead_presenter_type">
            <option value="VCCS Employee" <?php if (isset($custom_fields['lead_presenter_type'][0])){selected( $custom_fields['lead_presenter_type'][0],
             'VCCS Employee' ); }?>>VCCS Employee</option>
            <option value="Vendor" <?php if (isset($custom_fields['lead_presenter_type'][0])){selected( $custom_fields['lead_presenter_type'][0],
             'Vendor' ); }?>>Vendor</option>
        </select>
			</td>
		</tr>
		<tr><td colspan="2"><hr /></td></tr>
		<tr>
			<td>
				<label>Lead Presenter Name:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="lead_presenter_fname"
					value="<?php if (isset($custom_fields['lead_presenter_fname'][0])){echo $custom_fields['lead_presenter_fname'][0];} ?>"
					placeholder="first" />
				<input type="text" size="20"
					name="lead_presenter_lname"
					value="<?php if (isset($custom_fields['lead_presenter_lname'][0])){echo $custom_fields['lead_presenter_lname'][0];} ?>"
					placeholder="last" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Lead Presenter Job Title:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="lead_presenter_title"
					value="<?php if (isset($custom_fields['lead_presenter_title'][0])){echo $custom_fields['lead_presenter_title'][0];} ?>"
					placeholder="title" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Lead Presenter College:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="lead_presenter_college"
					value="<?php if (isset($custom_fields['lead_presenter_college'][0])){echo $custom_fields['lead_presenter_college'][0];} ?>"
					placeholder="College" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Lead Presenter Facebook:</label>
			</td>
			<td>www.facebook.com/
				<input type="text" size="20"
					name="lead_presenter_facebook"
					value="<?php if (isset($custom_fields['lead_presenter_facebook'][0])){echo $custom_fields['lead_presenter_facebook'][0];} ?>"
					placeholder="facebook" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Lead Presenter Twitter:</label>
			</td>
			<td>www.twitter.com/
				<input type="text" size="20"
					name="lead_presenter_twitter"
					value="<?php if (isset($custom_fields['lead_presenter_twitter'][0])){echo $custom_fields['lead_presenter_twitter'][0];} ?>"
					placeholder="twitter" />
			</td>
		</tr>
		<tr><td colspan="2"><hr /></td></tr>
		<tr>
			<td>
				<label>co1 Presenter Name:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co1_presenter_fname"
					value="<?php if (isset($custom_fields['co1_presenter_fname'][0])){echo $custom_fields['co1_presenter_fname'][0];} ?>"
					placeholder="first" />
				<input type="text" size="20"
					name="co1_presenter_lname"
					value="<?php if (isset($custom_fields['co1_presenter_lname'][0])){echo $custom_fields['co1_presenter_lname'][0];} ?>"
					placeholder="last" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co1 Presenter Job Title:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co1_presenter_title"
					value="<?php if (isset($custom_fields['co1_presenter_title'][0])){echo $custom_fields['co1_presenter_title'][0];} ?>"
					placeholder="title" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co1 Presenter College:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co1_presenter_college"
					value="<?php if (isset($custom_fields['co1_presenter_college'][0])){echo $custom_fields['co1_presenter_college'][0];} ?>"
					placeholder="College" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co1 Presenter Facebook:</label>
			</td>
			<td>www.facebook.com/
				<input type="text" size="20"
					name="co1_presenter_facebook"
					value="<?php if (isset($custom_fields['co1_presenter_facebook'][0])){echo $custom_fields['co1_presenter_facebook'][0];} ?>"
					placeholder="facebook" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co1 Presenter Twitter:</label>
			</td>
			<td>www.twitter.com/
				<input type="text" size="20"
					name="co1_presenter_twitter"
					value="<?php if (isset($custom_fields['co1_presenter_twitter'][0])){echo $custom_fields['co1_presenter_twitter'][0];} ?>"
					placeholder="twitter" />
			</td>
		</tr>
<tr><td colspan="2"><hr /></td></tr>
		<tr>
			<td>
				<label>co2 Presenter Name:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co2_presenter_fname"
					value="<?php if (isset($custom_fields['co2_presenter_fname'][0])){echo $custom_fields['co2_presenter_fname'][0];} ?>"
					placeholder="first" />
				<input type="text" size="20"
					name="co2_presenter_lname"
					value="<?php if (isset($custom_fields['co2_presenter_lname'][0])){echo $custom_fields['co2_presenter_lname'][0];} ?>"
					placeholder="last" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co2 Presenter Job Title:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co2_presenter_title"
					value="<?php if (isset($custom_fields['co2_presenter_title'][0])){echo $custom_fields['co2_presenter_title'][0];} ?>"
					placeholder="title" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co2 Presenter College:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co2_presenter_college"
					value="<?php if (isset($custom_fields['co2_presenter_college'][0])){echo $custom_fields['co2_presenter_college'][0];} ?>"
					placeholder="College" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co2 Presenter Facebook:</label>
			</td>
			<td>www.facebook.com/
				<input type="text" size="20"
					name="co2_presenter_facebook"
					value="<?php if (isset($custom_fields['co2_presenter_facebook'][0])){echo $custom_fields['co2_presenter_facebook'][0];} ?>"
					placeholder="facebook" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co2 Presenter Twitter:</label>
			</td>
			<td>www.twitter.com/
				<input type="text" size="20"
					name="co2_presenter_twitter"
					value="<?php if (isset($custom_fields['co2_presenter_twitter'][0])){echo $custom_fields['co2_presenter_twitter'][0];} ?>"
					placeholder="twitter" />
			</td>
		</tr>
<tr><td colspan="2"><hr /></td></tr>
		<tr>
			<td>
				<label>co3 Presenter Name:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co3_presenter_fname"
					value="<?php if (isset($custom_fields['co3_presenter_fname'][0])){echo $custom_fields['co3_presenter_fname'][0];} ?>"
					placeholder="first" />
				<input type="text" size="20"
					name="co3_presenter_lname"
					value="<?php if (isset($custom_fields['co3_presenter_lname'][0])){echo $custom_fields['co3_presenter_lname'][0];} ?>"
					placeholder="last" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co3 Presenter Job Title:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co3_presenter_title"
					value="<?php if (isset($custom_fields['co3_presenter_title'][0])){echo $custom_fields['co3_presenter_title'][0];} ?>"
					placeholder="title" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co3 Presenter College:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co3_presenter_college"
					value="<?php if (isset($custom_fields['co3_presenter_college'][0])){echo $custom_fields['co3_presenter_college'][0];} ?>"
					placeholder="College" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co3 Presenter Facebook:</label>
			</td>
			<td>www.facebook.com/
				<input type="text" size="20"
					name="co3_presenter_facebook"
					value="<?php if (isset($custom_fields['co3_presenter_facebook'][0])){echo $custom_fields['co3_presenter_facebook'][0];} ?>"
					placeholder="facebook" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co3 Presenter Twitter:</label>
			</td>
			<td>www.twitter.com/
				<input type="text" size="20"
					name="co3_presenter_twitter"
					value="<?php if (isset($custom_fields['co3_presenter_twitter'][0])){echo $custom_fields['co3_presenter_twitter'][0];} ?>"
					placeholder="twitter" />
			</td>
		</tr>
<tr><td colspan="2"><hr /></td></tr>
		<tr>
			<td>
				<label>co4 Presenter Name:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co4_presenter_fname"
					value="<?php if (isset($custom_fields['co4_presenter_fname'][0])){echo $custom_fields['co4_presenter_fname'][0];} ?>"
					placeholder="first" />
				<input type="text" size="20"
					name="co4_presenter_lname"
					value="<?php if (isset($custom_fields['co4_presenter_lname'][0])){echo $custom_fields['co4_presenter_lname'][0];} ?>"
					placeholder="last" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co4 Presenter Job Title:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co4_presenter_title"
					value="<?php if (isset($custom_fields['co4_presenter_title'][0])){echo $custom_fields['co4_presenter_title'][0];} ?>"
					placeholder="title" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co4 Presenter College:</label>
			</td>
			<td>
				<input type="text" size="20"
					name="co4_presenter_college"
					value="<?php if (isset($custom_fields['co4_presenter_college'][0])){echo $custom_fields['co4_presenter_college'][0];} ?>"
					placeholder="College" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co4 Presenter Facebook:</label>
			</td>
			<td>www.facebook.com/
				<input type="text" size="20"
					name="co4_presenter_facebook"
					value="<?php if (isset($custom_fields['co4_presenter_facebook'][0])){echo $custom_fields['co4_presenter_facebook'][0];} ?>"
					placeholder="facebook" />
			</td>
		</tr>
		<tr>
			<td>
				<label>co4 Presenter Twitter:</label>
			</td>
			<td>www.twitter.com/
				<input type="text" size="20"
					name="co4_presenter_twitter"
					value="<?php if (isset($custom_fields['co4_presenter_twitter'][0])){echo $custom_fields['co4_presenter_twitter'][0];} ?>"
					placeholder="twitter" />
			</td>
		</tr>
<tr><td colspan="2"><hr /></td></tr>

		<tr>
			<td>Session Outcome: </td>
			<td>
				<textarea rows="5" cols="50" name="session_outcome"><?php 
				if (isset($custom_fields['session_outcome'][0])){echo $custom_fields['session_outcome'][0];} ?></textarea>
				</td>
		</tr>
		<tr>
			<td>Intended Audience Level: </td>
			<td>
				<input type="checkbox" id="audience_level_beginner" 
				 name="audience_level_beginner" 
				 value="Beginner"<?php 
				 if (isset($custom_fields['audience_level_beginner'][0]) ){
				 	checked( $custom_fields['audience_level_beginner'][0], 'Beginner' );
				 }  ?> />
    		<label for="audience_level_beginner">Beginner</label><br />
    		<input type="checkbox" id="audience_level_intermediate" 
				 name="audience_level_intermediate" 
				 value="Intermediate"<?php 
				 if (isset($custom_fields['audience_level_intermediate'][0]) ){
				 	checked( $custom_fields['audience_level_intermediate'][0], 'Intermediate' );
				 }  ?> />
    		<label for="audience_level_intermediate">Intermediate</label><br />
    		<input type="checkbox" id="audience_level_advanced" 
				 name="audience_level_advanced" 
				 value="Advanced"<?php 
				 if (isset($custom_fields['audience_level_advanced'][0]) ){
				 	checked( $custom_fields['audience_level_advanced'][0], 'Advanced' );
				 }  ?> />
    		<label for="audience_level_advanced">Advanced</label><br />
    		<input type="checkbox" id="audience_level_all" 
				 name="audience_level_all" 
				 value="All"<?php 
				 if (isset($custom_fields['audience_level_all'][0]) ){
				 	checked( $custom_fields['audience_level_all'][0], 'All' );
				 } ?> />
    		<label for="audience_level_all">All</label><br />
    	</td>
    </tr>
    <tr>
			<td>Intended Audience: </td>
			<td>
				<div class="alignleft" style="margin-right:10px;">
				<input type="checkbox" id="audience_faculty" 
				 name="audience_faculty" 
				 value="Faculty"<?php 
				 if (isset($custom_fields['audience_faculty'][0]) ){
				 	checked( $custom_fields['audience_faculty'][0], 'Faculty' );
				 }  ?> />
    		<label for="audience_faculty">Faculty</label><br />
    		<input type="checkbox" id="audience_studentservices" 
				 name="audience_studentservices" 
				 value="Student Services"<?php 
				 if (isset($custom_fields['audience_studentservices'][0]) ){
				 	checked( $custom_fields['audience_studentservices'][0], 'Student Services' );
				 } ?> />
    		<label for="audience_studentservices">Student Services</label><br />
    		<input type="checkbox" id="audience_it" 
				 name="audience_it" 
				 value="IT"<?php 
				 if (isset($custom_fields['audience_it'][0]) ){
				 	checked( $custom_fields['audience_it'][0], 'IT' );
				 } ?> />
    		<label for="audience_it">IT</label><br />
    		<input type="checkbox" id="audience_bbadmin" 
				 name="audience_bbadmin" 
				 value="Blackboard Admins"<?php 
				 if (isset($custom_fields['audience_bbadmin'][0]) ){
				 	checked( $custom_fields['audience_bbadmin'][0], 'Blackboard Admins' );
				 } ?> />
    		<label for="audience_bbadmin">Blackboard Admins</label></div>
    		<div class="alignleft">
    		<input type="checkbox" id="audience_administrator" 
				 name="audience_administrator" 
				 value="Deans/VPs/Presidents"<?php 
				 if (isset($custom_fields['audience_administrator'][0]) ){
				 	checked( $custom_fields['audience_administrator'][0], 'Deans/VPs/Presidents' );
				 } ?> />
    		<label for="audience_administrator">Deans/VPs/Presidents</label><br />
    		<input type="checkbox" id="audience_facilities" 
				 name="audience_facilities" 
				 value="Facilities"<?php 
				 if (isset($custom_fields['audience_facilities'][0]) ){
				 	checked( $custom_fields['audience_facilities'][0], 'Facilities' );
				 } ?> />
    		<label for="audience_facilities">Facilities</label><br />
    		<input type="checkbox" id="audience_adjuncts" 
				 name="audience_adjuncts" 
				 value="Adjuncts"<?php 
				 if (isset($custom_fields['audience_adjuncts'][0]) ){
				 	checked( $custom_fields['audience_adjuncts'][0], 'Adjuncts' );
				 } ?> />
    		<label for="audience_adjuncts">Adjuncts</label><br />
    		<input type="checkbox" id="audience_all" 
				 name="audience_all" 
				 value="All"<?php 
				 if (isset($custom_fields['audience_all'][0]) ){
				 	checked( $custom_fields['audience_all'][0], 'All' );
				 } ?> />
    		<label for="audience_all">All</label></div>
    	</td>
    </tr>
	</table>
<?php
}

add_action( 'save_post', 'profmg_add_session_fields', 10, 2);
function profmg_add_session_fields( $session_id, $session ) {
	global $profmg_session_fields;
	global $custom_fields;
	if ($session->post_type == 'sessions') {
		foreach ($profmg_session_fields as $k => $v) {
			if ( isset($_POST[$v]) && $_POST[$v] != '') {
				update_post_meta($session_id, $v, $_POST[$v]);
			} else{
				delete_post_meta($session_id, $v);
			}
		}
	}
}

add_filter( 'manage_sessions_posts_columns', 'profmg_columns_head', 10 );
function profmg_columns_head($defaults) {
	$defaults['lead_presenter_lname'] = 'Presenter';
	$defaults['session_room'] = 'Room';
	$defaults['session_slot'] = 'Time';
	$defaults['nh_session_id'] = 'Session ID';
	return $defaults;
}

add_action( 'manage_sessions_posts_custom_column', 'profmg_columns_content', 10, 2 );
function profmg_columns_content($column_name, $post_ID) {
	if ($column_name == 'lead_presenter_lname') {
		$presenter_name = get_post_meta( $post_ID, 'lead_presenter_fname', true );
		$presenter_name .= ' ' . get_post_meta( $post_ID, 'lead_presenter_lname', true );
		echo $presenter_name;
	}
	if ( $column_name == 'session_room' ){
		$session_room = get_post_meta( $post_ID, 'session_room', true );
		echo $session_room;
	}
	if ( $column_name == 'session_slot' ){
		$session_slot = get_post_meta( $post_ID, 'session_slot', true );
		echo $session_slot;
	}
	if ( $column_name == 'nh_session_id' ){
		$session_id = get_post_meta( $post_ID, 'nh_session_id', true );
		echo $session_id;
	}
}

add_filter( 'manage_edit-sessions_sortable_columns', 'profmg_sortable_columns' );
function profmg_sortable_columns( $columns ) {
	$columns['nh_session_id'] = 'nh_session_id';
	$columns['lead_presenter_lname'] = 'lead_presenter_lname';
	return $columns;
}

add_action( 'pre_get_posts', 'profmg_session_id_orderby' );
function profmg_session_id_orderby( $query ) {
	if( ! is_admin() )
		return;

	$orderby = $query->get( 'orderby');

	if( 'nh_session_id' == $orderby ) {
		$query->set('meta_key','nh_session_id');
		$query->set('orderby','meta_value_num');
	}
	if( 'lead_presenter_lname' == $orderby ) {
		$query->set('meta_key', 'lead_presenter_lname');
		$query->set('orderby', 'meta_value');
	}
}

add_filter('manage_sessions_posts_columns', 'profmg_columns_remove_date');
function profmg_columns_remove_date($defaults) {
	unset($defaults['date']);
	unset($defaults['comments']);
	return $defaults;
}

function profmg_namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'sessions', 'nav_menu_item'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'profmg_namespace_add_custom_types' );

function profmg_session_grid_cycle( $sessions,  $current_room, $current_slot ) {
	$current_sessions = array();
	foreach ($sessions as $k) {
		if ( strcmp( $k['session_room'], $current_room) == 0 &&
				 $k['session_slot'] == $current_slot ) {
			array_push($current_sessions, $k);
			//$current_sessions[$k['session_slot']] .= $k['session_title'];
		}
	}
	if ( empty( $current_sessions[1] ) == FALSE  ) {
		$css_class = isset($current_sessions[1]['category'][0]->slug) ? $current_sessions[1]['category'][0]->slug : 'no-category';
		$css_class .= ' ' . str_replace(' ', '', $current_sessions[1]['session_room']) . '-' . $current_sessions[1]['session_slot'];
		echo '<td class="' . $css_class . '">';
		echo '<a href="' . $current_sessions[1]['session_url'] . '">';
		echo '<span class="error">' . substr( $current_sessions[1]['session_title'], 0, 70 ) . '...</span>';
		echo '</a>';
		echo '</td>';
	}
	if ( empty( $current_sessions[0] ) == FALSE ) {
		$css_class = isset($current_sessions[0]['category'][0]->slug) ? $current_sessions[0]['category'][0]->slug : 'no-category';
		$css_class .= ' ' . str_replace(' ', '', $current_sessions[0]['session_room']) . '-' . $current_sessions[0]['session_slot'];
		echo '<td class="' . $css_class . '">';
		echo '<a href="' . $current_sessions[0]['session_url'] . '">';
		echo substr( $current_sessions[0]['session_title'], 0, 70 );
		echo strlen( $current_sessions[0]['session_title'] ) > 70 ? '...' : NULL;
		echo '</a>';
		echo '</td>';
	}
	else {
		$css_class = isset($current_sessions[0]['category'][0]->slug) ? $current_sessions[0]['category'][0]->slug : 'blank';
		echo '<td class="' . $css_class . '">';
	}
	// echo '<pre>';
	// var_dump($current_sessions[0]['category'][0]);
	// echo '</pre>';
}

function profmg_bulk_delete() {
	$args = array(
		'numberposts' => 50,
		'post_type' =>'sessions'
	);
	$posts = get_posts( $args );
	if (is_array($posts)) {
	   foreach ($posts as $post) {
	// what you want to do;
	       echo "Deleted Post: ".get_the_title( $post->ID )."\r\n";
	       wp_delete_post( $post->ID, true);
	   }
	}



}


?>