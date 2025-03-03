<?php

$actions = [
	'load_kennis',
	'load_related',
	'load_vacatures',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}


function load_kennis () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="item">
				<?php get_template_part('parts/content', 'post', ['is_custom' => false, 'post_id' => get_the_ID()]) ?>
			</div>

		<?php }
	}
	wp_reset_query(); 
	die();
}


function load_related() {
	$offset = intval($_POST['offset']);
	$content = get_field('content', intval($_POST['page_id']));
	$items = '';
	foreach ($content as $row) {
		if($row['acf_fc_layout'] == 'related_content_blocks') $items = $row['items'];
	}

	if (is_array($items) && checkArrayForValues($items)) :
		foreach ($items as $index => $item):
			if ($index >= $offset && $index < $offset + 3) {
				get_template_part('parts/content', 'related', ['item' => $item]);
			}
		endforeach;
	endif;

	wp_die();
}


function load_vacatures () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="item">
				<?php get_template_part('parts/content', 'post', ['is_custom' => false, 'post_id' => get_the_ID()]) ?>
			</div>

		<?php }
	}
	wp_reset_query(); 
	die();
}