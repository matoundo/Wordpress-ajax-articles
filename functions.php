<?php
	add_action('wp_enqueue_scripts', 'ajax_script');
	function ajax_script(){
		wp_enqueue_script('ajax_script', get_template_directory_uri().'/script.js', array('jquery'), '1.0', 1);
		wp_localize_script('ajax_script', 'ajax_var', array(
				'url' => admin_url('admin-ajax.php')
			)
		);
	}
	
	add_action( 'wp_ajax_posts', 'ajax_load_posts' );
	add_action( 'wp_ajax_nopriv_posts', 'ajax_load_posts' );

	function ajax_load_posts(){
		$numberposts = get_option('posts_per_page');
		$wp_query = new WP_Query(array('type' => 'posts', 'offset' => $numberposts*$_GET['compteur'], 'posts_per_page' => '2'));
		
		header("Content-Type: text/json");
		die(json_encode($wp_query));
	}
	
?>