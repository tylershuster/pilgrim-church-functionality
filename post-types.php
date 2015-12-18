<?php

function pilgrim_post_types() {

	if( ! post_type_exists( 'report' ) ) {

		$report_labels = array(
			'name'                => _x( 'Reports', 'Post Type General Name', 'pilgrim' ),
			'singular_name'       => _x( 'Report', 'Post Type Singular Name', 'pilgrim' ),
			'menu_name'           => __( 'Report', 'pilgrim' ),
			'name_admin_bar'      => __( 'Report', 'pilgrim' ),
			'parent_item_colon'   => __( 'Parent Item:', 'pilgrim' ),
			'all_items'           => __( 'All Reports', 'pilgrim' ),
			'add_new_item'        => __( 'Add New Report', 'pilgrim' ),
			'add_new'             => __( 'Add New', 'pilgrim' ),
			'new_item'            => __( 'New Report', 'pilgrim' ),
			'edit_item'           => __( 'Edit Report', 'pilgrim' ),
			'update_item'         => __( 'Update Report', 'pilgrim' ),
			'view_item'           => __( 'View Report', 'pilgrim' ),
			'search_items'        => __( 'Search Report', 'pilgrim' ),
			'not_found'           => __( 'Report not found', 'pilgrim' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'pilgrim' ),
		);
		$report_args = array(
			'label'               => __( 'Report', 'pilgrim' ),
			'description'         => __( 'Reports by Pilgrim\'s council or related bodies', 'pilgrim' ),
			'labels'              => $report_labels,
			'supports'            => array( 'title', 'editor', 'revisions', ),
			'taxonomies'          => array( 'report-category' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-quote',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => 'reports',
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'report', $report_args );

	}

	if( ! post_type_exists( 'recording' ) ) {

		$recording_labels = array(
			'name'                => _x( 'Recordings', 'Post Type General Name', 'pilgrim' ),
			'singular_name'       => _x( 'Recording', 'Post Type Singular Name', 'pilgrim' ),
			'menu_name'           => __( 'Recording', 'pilgrim' ),
			'name_admin_bar'      => __( 'Recording', 'pilgrim' ),
			'parent_item_colon'   => __( 'Parent Item:', 'pilgrim' ),
			'all_items'           => __( 'All Recordings', 'pilgrim' ),
			'add_new_item'        => __( 'Add New Recording', 'pilgrim' ),
			'add_new'             => __( 'Add New', 'pilgrim' ),
			'new_item'            => __( 'New Recording', 'pilgrim' ),
			'edit_item'           => __( 'Edit Recording', 'pilgrim' ),
			'update_item'         => __( 'Update Recording', 'pilgrim' ),
			'view_item'           => __( 'View Recording', 'pilgrim' ),
			'search_items'        => __( 'Search Recording', 'pilgrim' ),
			'not_found'           => __( 'Recording not found', 'pilgrim' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'pilgrim' ),
		);
		$recording_args = array(
			'label'               => __( 'Recording', 'pilgrim' ),
			'description'         => __( 'Recordings relating to Pilgrim', 'pilgrim' ),
			'labels'              => $recording_labels,
			'supports'            => array( 'title', 'editor', ),
			'taxonomies'          => array( 'recording-category' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-audio',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => 'recordings',
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'recording', $recording_args );

	}

	if( ! post_type_exists( 'document' ) ) {

		$document_labels = array(
			'name'                => _x( 'Documents', 'Post Type General Name', 'pilgrim' ),
			'singular_name'       => _x( 'Document', 'Post Type Singular Name', 'pilgrim' ),
			'menu_name'           => __( 'Document', 'pilgrim' ),
			'name_admin_bar'      => __( 'Document', 'pilgrim' ),
			'parent_item_colon'   => __( 'Parent Document:', 'pilgrim' ),
			'all_items'           => __( 'All Documents', 'pilgrim' ),
			'add_new_item'        => __( 'Add New Document', 'pilgrim' ),
			'add_new'             => __( 'Add New', 'pilgrim' ),
			'new_item'            => __( 'New Document', 'pilgrim' ),
			'edit_item'           => __( 'Edit Document', 'pilgrim' ),
			'update_item'         => __( 'Update Document', 'pilgrim' ),
			'view_item'           => __( 'View Document', 'pilgrim' ),
			'search_items'        => __( 'Search Document', 'pilgrim' ),
			'not_found'           => __( 'Document not found', 'pilgrim' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'pilgrim' ),
		);
		$document_args = array(
			'label'               => __( 'Document', 'pilgrim' ),
			'description'         => __( 'Documents related to Pilgrim', 'pilgrim' ),
			'labels'              => $document_labels,
			'supports'            => array( 'title', 'editor', 'author', 'revisions', ),
			'taxonomies'          => array( 'document-category' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-media-document',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => 'documents',
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'document', $document_args );

	}

	if( ! post_type_exists( 'friend' ) ) {

		$friend_labels = array(
			'name'                => _x( 'Friends', 'Post Type General Name', 'pilgrim' ),
			'singular_name'       => _x( 'Friend', 'Post Type Singular Name', 'pilgrim' ),
			'menu_name'           => __( 'Friend', 'pilgrim' ),
			'name_admin_bar'      => __( 'Friend', 'pilgrim' ),
			'parent_item_colon'   => __( 'Parent Item:', 'pilgrim' ),
			'all_items'           => __( 'All Friends', 'pilgrim' ),
			'add_new_item'        => __( 'Add New Friend', 'pilgrim' ),
			'add_new'             => __( 'Add New', 'pilgrim' ),
			'new_item'            => __( 'New Friend', 'pilgrim' ),
			'edit_item'           => __( 'Edit Friend', 'pilgrim' ),
			'update_item'         => __( 'Update Friend', 'pilgrim' ),
			'view_item'           => __( 'View Friend', 'pilgrim' ),
			'search_items'        => __( 'Search Friend', 'pilgrim' ),
			'not_found'           => __( 'Friend not found', 'pilgrim' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'pilgrim' ),
		);
		$friend_args = array(
			'label'               => __( 'Friend', 'pilgrim' ),
			'description'         => __( 'Friends of Pilgrim', 'pilgrim' ),
			'labels'              => $friend_labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
			'taxonomies'          => array( 'friend-category' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-groups',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => 'friends',
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'friend', $friend_args );

	}


}
add_action( 'init', 'pilgrim_post_types', 0 );

add_action('init', 'recording_rss');
function recording_rss(){
  add_feed('pilgrim-sermons', 'pilgrim_sermon_rss');
}
function pilgrim_sermon_rss(){
  require_once( dirname( __FILE__ ) . '/podcast-rss-template.php' );
}

function pilgrim_enqueue_position_saver() {


	if( is_singular('recording') ) {
		wp_register_script( 'pilgrim_position_saver', plugins_url( "position-saver.js", __FILE__ ) );
		wp_enqueue_script( 'pilgrim_position_saver' );

	}

}

add_action( 'wp_enqueue_scripts', 'pilgrim_enqueue_position_saver' );

 ?>