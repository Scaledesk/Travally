<?php
global $wpdb,$table_prefix;

/* Form Post Data */

wp_enqueue_media();

$plugin_dir_url =  plugin_dir_url( __FILE__ );

if( sanitize_text_field( $_POST['submit'] ) == 'Save') {
	
	if ( ! isset( $_POST['ajax_product_search_setting_nonce'] ) || ! wp_verify_nonce( $_POST['ajax_product_search_setting_nonce'], 'ajax_product_search_setting_submit' ) ) 
	{

	   print 'Sorry, your nonce did not verify.';
	   exit;

	} 
	else {
		
		$search_inp_label_p = sanitize_text_field( $_POST['search_inp_label'] );

		$search_sub_label_p = sanitize_text_field( $_POST['search_sub_label'] );

		$min_num_of_char_p = sanitize_text_field( $_POST['min_num_of_char'] );
		
		$max_num_of_result_p = sanitize_text_field( $_POST['max_num_of_result'] );
		
		//$submit_button_label = sanitize_text_field( $_POST['submit_button_label'] );
		
		$loader_image = sanitize_text_field( $_POST['loader_image'] );
		
		$search_field_placeholder = sanitize_text_field( $_POST['search_field_placeholder'] );

		$result1 = update_option('phoe_s_search_inp_label',$search_inp_label_p,'yes');

		$result2 = update_option('phoe_s_search_sub_label',$search_sub_label_p,'yes');

		$result3 = update_option('phoe_s_min_num_of_char',$min_num_of_char_p,'yes');

		$result4 = update_option('phoe_s_max_num_of_result',$max_num_of_result_p,'yes');
		
		//$result5 = update_option('phoe_s_submit_button_label',$submit_button_label,'yes');
		
		$result6 = update_option('phoe_s_loader_image',$loader_image,'yes');
		
		$result7 = update_option('phoe_s_search_field_placeholder',$search_field_placeholder,'yes');

		if($result1 == 1 || $result2 == 1 || $result3 == 1 || $result4 == 1 || $result5 == 1 || $result6 == 1 || $result7 == 1)
		{
		?>

			<div class="updated" id="message">

				<p><strong>Setting updated.</strong></p>

			</div>

		<?php
		}
		else
		{
			?>
				<div class="error below-h2" id="message"><p> Something Went Wrong Please Try Again With Valid Data.</p></div>
			<?php
		}
		
	}

	

}


?>

<div id="profile-page" class="wrap">
<?php
$tab = sanitize_text_field( $_GET['tab'] );
?>
<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
	<a class="nav-tab <?php if($tab == 'set' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=ph_ajax_pro_search_setting&amp;tab=set">Settings</a>
	<a class="nav-tab <?php if($tab == 'premium'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=ph_ajax_pro_search_setting&amp;tab=premium">Premium Version</a>
	
</h2>
<?php
if($tab == 'set' || $tab == '')
{
	
	$search_inp_label = get_option('phoe_s_search_inp_label');
	
	$search_sub_label = get_option('phoe_s_search_sub_label');
	
	$min_num_of_char = get_option('phoe_s_min_num_of_char');
	
	$max_num_of_result = get_option('phoe_s_max_num_of_result');
	
	//$submit_button_label = get_option( 'phoe_s_submit_button_label' );
	
	$loader_image = get_option( 'phoe_s_loader_image' );
	
	$search_field_placeholder = get_option( 'phoe_s_search_field_placeholder' );
	
?>
<div class="meta-box-sortables" id="normal-sortables">
	<div class="postbox " id="pho_wcpc_box">
					<h3><span class="upgrade-setting">Upgrade to the PREMIUM VERSION</span></h3>
					<div class="inside">
						<div class="pho_check_pin">

							<div class="column two">
								<!----<h2>Get access to Pro Features</h2>----->

					<p>Switch to the premium version </p>

					<div class="pho-upgrade-btn">
										<a target="_blank" href="https://www.phoeniixx.com/product/ajax-product-search-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>assets/images/premium-btn.png" /></a>
									</div>
				</div>
			</div>
		</div>
	</div>
		
<h2>

Ajax Product Search - Plugin Options</h2>

<form novalidate="novalidate" method="post" action="" >
   <?php wp_nonce_field( 'ajax_product_search_setting_submit', 'ajax_product_search_setting_nonce' ); ?>
<h3>General settings</h3>

<table class="form-table">

	<tbody>

		<tr class="user-user-login-wrap">

			<th><label for="search_inp_label"> Label for Search Input Field :</label></th>
			
			<td><input type="text" class="regular-text" id="search_inp_label" value="<?php echo $search_inp_label; ?>" name="search_inp_label" /></td>

		</tr>
		
		<tr class="user-user-login-wrap">

			<th><label for="search_field_placeholder"> Search Text Field placeholder :</label></th>
			
			<td><input type="text"  value="<?php echo $search_field_placeholder; ?>" class="regular-text" id="search_field_placeholder" name="search_field_placeholder" /></td>

		</tr>
		
		<tr class="user-user-login-wrap">

			<th><label for="min_num_of_char"> User has to put Minimum number of characters For Search results :</label></th>
			
			<td><input type="number" step="1" max="10" min="1" style="width:50px;" value="<?php echo $min_num_of_char; ?>" class="regular-text" id="min_num_of_char" name="min_num_of_char" /></td>

		</tr>
		

		<tr class="user-user-login-wrap">

			<th><label for="search_sub_label"> Label for Search Submit Button :</label></th>
			
			<td><input type="text" class="regular-text" id="search_sub_label" value="<?php echo $search_sub_label; ?>" name="search_sub_label" /></td>

		</tr>
		
		<tr class="user-user-login-wrap">

			<th><label for="max_num_of_result"> Maximum number of results to display below search text field :</label></th>
			
			<td><input type="number" step="1" max="10" min="1" style="width:50px;" value="<?php echo $max_num_of_result; ?>" class="regular-text" id="max_num_of_result" name="max_num_of_result" /></td>

		</tr>
		
		<!--<tr class="user-user-login-wrap">

			<th><label for="submit_button_label">  Submit Button label text :</label></th>
			
			<td><input type="text"  value="<?php //echo $submit_button_label; ?>" class="regular-text" id="submit_button_label" name="submit_button_label" /></td>

		</tr>-->
		
		<tr class="user-user-login-wrap">

			<th><label for="loader_image"> Loader Image :</label></th>
			
			<td><input type="text"  value="<?php echo $loader_image; ?>" class="regular-text" id="loader_image" name="loader_image" /><input class="button uploadimage" type="button" value="Upload" /></td>

		</tr>
		
	</tbody>

</table>	

<p class="submit"><input type="submit" value="Save" class="button button-primary" id="submit" name="submit"></p>

</form>
</div>	
<?php
}
if($tab == 'premium')
{
	require_once(dirname(__FILE__).'/premium-setting.php');
}

?>			
</div>
<script>
jQuery(document).ready(function($)
{

	var custom_upload;

	$(document).on("click",".uploadimage",uploadimage_button);

		function uploadimage_button(){

					//textid = this.id+'1';

					var custom_upload = wp.media({

					title: 'Add Media',

					button: {

						text: 'Insert Image'

					},

					multiple: false  // Set this to true to allow multiple files to be selected

				})

				.on('select', function() {

					var attachment = custom_upload.state().get('selection').first().toJSON();

					//$('.custom_media_image').attr('src', attachment.url);

					$('#loader_image').val(attachment.url);

				})

				.open();

		}
		
});
</script>
<style>
.form-table th {
    width: 270px;
	padding: 25px;
}
.form-table td {
	
    padding: 20px 10px;
}
.form-table {
	background-color: #fff;
}
h3 {
    padding: 10px;
}
</style>