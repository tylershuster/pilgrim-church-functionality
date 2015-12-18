<?php
 /*
 Plugin Name: Pilgrim Church Functionality
 Description: Provides functionality for Pilgrim Church's website
 Plugin URI: http://pilgrimchurchredding.org
 Author: Tyler Shuster
 Author URI: http://tyler.shuster.house
 Version: 1.0
 License: GPL0
 */

add_action( 'plugins_loaded', 'pilgrim_timezone' );

function pilgrim_timezone() {

	// date_default_timezone_set( 'America/Los_Angeles' );

}

include( 'post-types.php' );
include( 'taxonomies.php' );
include( 'meta-boxes.php' );
include( 'shortcodes.php' );

global $pilgrim_office_hours;
$pilgrim_office_hours = array(
	'mon' => array(
		'text' => '8:30 a.m. - 3:00 p.m'
	),
	'tue' => array(
		'text' => '8:30 a.m. - 3:00 p.m'
	),
	'wed' => array(
		'text' => '8:30 a.m. - 3:00 p.m'
	),
	'thu' => array(
		'text' => '8:30 a.m. - 3:00 p.m'
	),
	'fri' => array(
		'text' => 'none'
	),
	'sat' => array(
		'text' => 'none'
	),
);

function pilgrim_office_hours_cb() {

	global $pilgrim_office_hours;

	$current_day = strtolower( date( 'D' ) );

	ob_start(); ?>

	<dl class="footer__office-hours">

	<?php foreach( $pilgrim_office_hours as $day => $hours ): $selected = $current_day == $day ? 'class="office-hours--today"' : '';?>

		<dt <?php echo $selected; ?>><?php echo $day; ?></dt>
		<dd <?php echo $selected; ?>><?php echo $hours['text']; ?></dd>

	<?php endforeach; ?>

	</dl>

	<?php $return = ob_get_clean();

	return $return;

}
add_shortcode( 'pilgrim_office_hours','pilgrim_office_hours_cb' );


function pilgrim_age_cb( $atts ) {

	$then_ts = "-399859200";


	$then_year = date('Y', $then_ts);

	$age = date('Y') - $then_year;

	if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;

	return $age;

}
add_shortcode( 'pilgrim_age','pilgrim_age_cb' );

add_image_size( 'directory_thumbnail', 200 );

function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}


  ?>
