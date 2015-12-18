<?php

add_shortcode( 'latest_sermons', 'pilgrim_latest_sermons' );

function pilgrim_latest_sermons( $atts ) {

	$args = array(
		'post_type'   => 'recording',
		'posts_per_page' => 5,
		'tax_query' => array(
			array(
				'taxonomy' => 'recording-category',
				'field' => 'slug',
				'terms' => 'sermon'
			)
		),
	);

	$query = new WP_Query( $args );

	$i = 0;

	$upload_dir = wp_upload_dir();

	if( $query->have_posts() ):

		ob_start(); ?>


		<?php  ?>

		<div id='latest_sermons'>

			<h2>Recent Sermons</h2>

			<?php while( $query->have_posts() ):

				$query->the_post();

				$downloadurl = get_post_meta( get_the_ID(), 'recording-url', true );

				$downloadfilename = str_replace( $upload_dir['baseurl'] . "/", '', $downloadurl );

				$downloadfilename = str_replace( '-', ' ', $downloadfilename );

				if( $i === 0 || true ): ?>

				<h4>&ldquo;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>&rdquo;<u></u><date><?php the_date('M j\<\s\u\p\>S\<\/\s\u\p\>'); ?></date></h4>

				<?php else: ?>

					<h4><a href="<?php the_permalink(); ?>"><?php the_date('F j'); ?></a></h4>

				<?php endif;

				$i++;

			endwhile; ?>

		</div>

		<?php

		return ob_get_clean();

	else:

		return false;

	endif;

}

add_shortcode( 'upcoming_events', 'pilgrim_upcoming_events' );

function pilgrim_upcoming_events( $atts ) {

	$args = array(
		'post_type'   => 'event',
		'posts_per_page' => 5,
		'post_status' => 'publish',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_key' => '_start_ts',
		'meta_value' => current_time('timestamp'),
		'meta_value_num' => current_time('timestamp'),
		'meta_compare' => '>='
	);

	$query = new WP_Query( $args );

	ob_start(); ?>

	<div id='upcoming_events'>

		<h2>Upcoming Events</h2>

	<?php foreach( $query->posts as $event ):

		$date = get_post_meta( $event->ID, '_start_ts', true );

		$date = date('z') == date('z',$date) ? 'Today<span>@</span>' . date('g:ia',$date) : date( 'j\<\s\u\p\>S\<\/\s\u\p\>\<\s\p\a\n\>@\<\/\s\p\a\n\>g:ia', $date );
	 ?>

		<h4><a href="<?php echo $event->guid; ?>"><?php echo $event->post_title; ?></a><u></u><date><?php echo $date; ?></date></h4>

	<?php endforeach; ?>

	</div>

	<?php return ob_get_clean();

}

add_shortcode( 'pilgrim_login_form', 'pilgrim_login_form' );

function pilgrim_login_form() {

	$args = array(
		'redirect' => get_bloginfo( 'url' )
	);

	ob_start();

	if( ! is_user_logged_in() ) {

		wp_logout();

	}

	wp_login_form( $args );


	return ob_get_clean();

}

add_shortcode( 'calendarstyles', 'calendarstyles' );

function calendarstyles() {

	$day = get_query_var('calendar_day');

	ob_start();

	if( $day ) {

		?>

		<style>
		#em-wrapper #events_list {
			display: block;
		}
		#em-wrapper #events_calendar {
			display: none;
		}
		</style>


		<?php

	}

	return ob_get_clean();

}

 ?>