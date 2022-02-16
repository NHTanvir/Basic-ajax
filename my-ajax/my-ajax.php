<?php
/**
 * Plugin Name: My AJAX
 */
add_shortcode( 'ajax-form', 'my_ajax_form' );
function my_ajax_form() {
	return '
		<form id="my-super-form">
			<input type="hidden" name="action" value="cx_process_data" />
			<input type="text" name="first_name" />

			<input type="submit" />
		</form>
	';
}

add_action( 'wp_head', 'my_scripts' );
function my_scripts() {
	?>
	<script type="text/javascript">
		var myaction = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
	</script>
	<?php
}

add_action( 'wp_enqueue_scripts', 'my_enqueue' );
function my_enqueue() {
	wp_enqueue_script( 'my-scripts', plugins_url( 'script.js', __FILE__ ), [ 'jquery' ], '0.1', true );
}

add_action( 'wp_ajax_cx_process_data', 'my_ajax_handler' );
function my_ajax_handler() {
	wp_die( 'My name is ' . $_POST['first_name'] );
}