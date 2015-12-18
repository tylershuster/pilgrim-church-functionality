<?php
function pilgrim_taxonomies() {

	if( ! taxonomy_exists( 'report-category' ) ) {

		$labels = array(
			'name'                       => _x( 'Report Categories', 'Taxonomy General Name', 'pilgrim' ),
			'singular_name'              => _x( 'Report Category', 'Taxonomy Singular Name', 'pilgrim' ),
			'menu_name'                  => __( 'Report Category', 'pilgrim' ),
			'all_items'                  => __( 'All Report Categories', 'pilgrim' ),
			'parent_item'                => __( 'Parent Category', 'pilgrim' ),
			'parent_item_colon'          => __( 'Parent Category:', 'pilgrim' ),
			'new_item_name'              => __( 'New Report Category Name', 'pilgrim' ),
			'add_new_item'               => __( 'Add New Report Category', 'pilgrim' ),
			'edit_item'                  => __( 'Edit Report Category', 'pilgrim' ),
			'update_item'                => __( 'Update Report Category', 'pilgrim' ),
			'view_item'                  => __( 'View Report Category', 'pilgrim' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'pilgrim' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'pilgrim' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'pilgrim' ),
			'popular_items'              => __( 'Popular Report Categories', 'pilgrim' ),
			'search_items'               => __( 'Search Report Categories', 'pilgrim' ),
			'not_found'                  => __( 'Not Found', 'pilgrim' ),
		);
		$rewrite = array(
			'slug'                       => 'report-category',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'report-category', array( 'report' ), $args );

	}

	if( ! term_exists( 'council' ) ) {

		$council_args = array(
			'description' => 'Reports filed by the council or its members'
		);

		wp_insert_term( 'council', 'report-category', $council_args );

	}

	$council = term_exists( 'council' );

	if( $council ) {

		$sub_terms = array(
			'connecting' => 'Reports filed by the connecting co-cordinators',
			'giving' => 'Reports filed by the giving co-cordinators',
			'serving' => 'Reports filed by the serving co-cordinators',
			'learning' => 'Reports filed by the learning co-cordinators',
			'worship' => 'Reports filed by the worship co-cordinators',
			'clerk' => 'Reports filed by the council clerk',
			'moderator' => 'Reports filed by the council moderator'
		);

		foreach( $sub_terms as $sub_term => $description ) {

			if( ! term_exists( $sub_term ) ) {

				$args = array(
					'description' => $description,
					'parent' => $council
				);

				wp_insert_term( $sub_term, 'report-category', $args );

			}

		}

	}

	if( ! taxonomy_exists( 'recording-category' ) ) {

		$labels = array(
			'name'                       => _x( 'Recording Categories', 'Taxonomy General Name', 'pilgrim' ),
			'singular_name'              => _x( 'Recording Category', 'Taxonomy Singular Name', 'pilgrim' ),
			'menu_name'                  => __( 'Recording Category', 'pilgrim' ),
			'all_items'                  => __( 'All Recording Categories', 'pilgrim' ),
			'parent_item'                => __( 'Parent Category', 'pilgrim' ),
			'parent_item_colon'          => __( 'Parent Category:', 'pilgrim' ),
			'new_item_name'              => __( 'New Recording Category Name', 'pilgrim' ),
			'add_new_item'               => __( 'Add New Recording Category', 'pilgrim' ),
			'edit_item'                  => __( 'Edit Recording Category', 'pilgrim' ),
			'update_item'                => __( 'Update Recording Category', 'pilgrim' ),
			'view_item'                  => __( 'View Recording Category', 'pilgrim' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'pilgrim' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'pilgrim' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'pilgrim' ),
			'popular_items'              => __( 'Popular Recording Categories', 'pilgrim' ),
			'search_items'               => __( 'Search Recording Categories', 'pilgrim' ),
			'not_found'                  => __( 'Not Found', 'pilgrim' ),
		);
		$rewrite = array(
			'slug'                       => 'recording-category',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'recording-category', array( 'recording' ), $args );

	}

	if( ! term_exists( 'sermon' ) ) {

		$sermon_args = array(
			'description' => 'Sunday morning sermon recordings'
		);

		wp_insert_term( 'sermon', 'recording-category', $sermon_args );

	}

	if( ! taxonomy_exists( 'document-category' ) ) {

		$labels = array(
			'name'                       => _x( 'Document Categories', 'Taxonomy General Name', 'pilgrim' ),
			'singular_name'              => _x( 'Document Category', 'Taxonomy Singular Name', 'pilgrim' ),
			'menu_name'                  => __( 'Document Category', 'pilgrim' ),
			'all_items'                  => __( 'All Document Categories', 'pilgrim' ),
			'parent_item'                => __( 'Parent Category', 'pilgrim' ),
			'parent_item_colon'          => __( 'Parent Category:', 'pilgrim' ),
			'new_item_name'              => __( 'New Document Category Name', 'pilgrim' ),
			'add_new_item'               => __( 'Add New Document Category', 'pilgrim' ),
			'edit_item'                  => __( 'Edit Document Category', 'pilgrim' ),
			'update_item'                => __( 'Update Document Category', 'pilgrim' ),
			'view_item'                  => __( 'View Document Category', 'pilgrim' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'pilgrim' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'pilgrim' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'pilgrim' ),
			'popular_items'              => __( 'Popular Document Categories', 'pilgrim' ),
			'search_items'               => __( 'Search Document Categories', 'pilgrim' ),
			'not_found'                  => __( 'Not Found', 'pilgrim' ),
		);
		$rewrite = array(
			'slug'                       => 'document-category',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'document-category', array( 'document' ), $args );

	}


	if( ! taxonomy_exists( 'friend-category' ) ) {

		$labels = array(
			'name'                       => _x( 'Friend Categories', 'Taxonomy General Name', 'pilgrim' ),
			'singular_name'              => _x( 'Friend Category', 'Taxonomy Singular Name', 'pilgrim' ),
			'menu_name'                  => __( 'Friend Category', 'pilgrim' ),
			'all_items'                  => __( 'All Friend Categories', 'pilgrim' ),
			'parent_item'                => __( 'Parent Category', 'pilgrim' ),
			'parent_item_colon'          => __( 'Parent Category:', 'pilgrim' ),
			'new_item_name'              => __( 'New Friend Category Name', 'pilgrim' ),
			'add_new_item'               => __( 'Add New Friend Category', 'pilgrim' ),
			'edit_item'                  => __( 'Edit Friend Category', 'pilgrim' ),
			'update_item'                => __( 'Update Friend Category', 'pilgrim' ),
			'view_item'                  => __( 'View Friend Category', 'pilgrim' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'pilgrim' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'pilgrim' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'pilgrim' ),
			'popular_items'              => __( 'Popular Friend Categories', 'pilgrim' ),
			'search_items'               => __( 'Search Friend Categories', 'pilgrim' ),
			'not_found'                  => __( 'Not Found', 'pilgrim' ),
		);
		$rewrite = array(
			'slug'                       => 'friend-category',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'friend-category', array( 'friend' ), $args );

	}

	if( ! term_exists( 'member' ) ) {

		$member_args = array(
			'description' => 'Members of Pilgrim'
		);

		wp_insert_term( 'member', 'friend-category', $member_args );

	}

	if( ! term_exists( 'visitor' ) ) {

		$visitor_args = array(
			'description' => 'Visitors to Pilgrim'
		);

		wp_insert_term( 'visitor', 'friend-category', $visitor_args );

	}


}
add_action( 'init', 'pilgrim_taxonomies', 1 );
 ?>