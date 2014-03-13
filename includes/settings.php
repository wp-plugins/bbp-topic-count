<?php

/*******************************************
* bbp topic count Settings Page
*******************************************/


function tc_settings_page()
{
	global $tc_options;
		
	?>
	<div class="wrap">
		<div id="upb-wrap" class="upb-help">
			<h2><?php _e('Topic Count Settings', 'bbp-topic-count'); ?></h2>
			<?php
			if ( ! isset( $_REQUEST['updated'] ) )
				$_REQUEST['updated'] = false;
			?>
			<?php if ( false !== $_REQUEST['updated'] ) : ?>
			<div class="updated fade"><p><strong><?php _e( 'Options saved', 'bbp-topic-count'); ?> ); ?></strong></p></div>
			<?php endif; ?>
			
			<table class="form-table">
			<tr>
		
		<td>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="9NKN2K8SXGS9Q">
<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
</td><td>
<?php _e("If you find this plugin useful, please consider donating just a couple of pounds to help me develop and maintain it. You support will be appreciated", 'bbp-last-post'); ?>
		
	</td>
	</tr>
	</table>		
			
			<form method="post" action="options.php">

				<?php settings_fields( 'tc_settings_group' ); ?>
								
				<table class="form-table">
					
					<tr valign="top">
						<th colspan="2"><p> This plugin allows you to display topic count, reply count and total posts under the authors name and avatar in topics and replies.</p></th>
					</tr>
					
										
					<!-------------------------------Topics ---------------------------------------->
					
					<tr valign="top">
						<th colspan="2"><h3><?php _e('Topics', 'bbp-topic-count'); ?></h3></th>
					</tr>
					
					<!-- checkbox to activate -->
					<tr valign="top">  
					<th><?php _e('Activate', 'bbp-topic-count'); ?></th>
					<td>
					<?php activate_topic_checkbox() ;?>
					</td>
					</tr>
									
					
					<tr valign="top">
					<th><?php _e('Topic Label Name', 'bbp-topic-count'); ?></th>
					<td>
						<input id="tc_settings[topic_label]" class="large-text" name="tc_settings[topic_label]" type="text" value="<?php echo isset( $tc_options['topic_label'] ) ? esc_html( $tc_options['topic_label'] ) : '';?>" /><br/>
						<label class="description" for="tc_settings[topic_label]"><?php _e( 'Enter the description eg "Topics:", "Topics - ", "Posts :" "Started : " etc.', 'bbp-topic-count' ); ?></label><br/>
					</td>
					</tr>
										
										
					<!------------------------------- Replies ------------------------------------------>
					<tr valign="top">
						<th colspan="2"><h3><?php _e('Replies', 'bbp-topic-count'); ?></h3></th>
					</tr>
					
					<!-- checkbox to activate -->
					<tr valign="top">  
					<th><?php _e('Activate', 'bbp-topic count'); ?></th>
					<td>
					<?php activate_reply_checkbox() ;?>
					</td>
					</tr>
					
					
					<tr valign="top">
						<th><?php _e('Reply Label Name', 'bbp-topic-count'); ?></th>
						<td>
							<input id="tc_settings[reply_label]" class="large-text" name="tc_settings[reply_label]" type="text" value="<?php echo isset( $tc_options['reply_label'] ) ? esc_html( $tc_options['reply_label'] ) : '';?>" /><br/>
							<label class="description" for="tc_settings[reply_label]"><?php _e( 'Enter the description eg "Replies:", "Replies - ", "Posts", "joined in : " etc.', 'bp-topic-count' ); ?></label><br/>
						</td>
					</tr>
					
					
					
					<!------------------------------- Total Posts ------------------------------------------>
					<tr valign="top">
						<th colspan="2"><h3><?php _e('Total posts (Topics + Replies)', 'bbp-topic-count'); ?></h3></th>
					</tr>
					
					<!-- checkbox to activate -->
					<tr valign="top">  
					<th><?php _e('Activate', 'bbp-topic-count'); ?></th>
					<td>
					<?php activate_totalposts_checkbox() ;?>
					</td>
					</tr>
					
					
					<tr valign="top">
						<th><?php _e('Total Posts Name', 'user-information'); ?></th>
						<td>
							<input id="tc_settings[posts_label]" class="large-text" name="tc_settings[posts_label]" type="text" value="<?php echo isset( $tc_options['posts_label'] ) ? esc_html( $tc_options['posts_label'] ) : '';?>" /><br/>
							<label class="description" for="tc_settings[item3_label]"><?php _e( 'Enter the description eg "Total posts:", "Total Posts - ", "Total", "Posts: " etc.', 'bp-topic-count' ); ?></label><br/>
						</td>
					</tr>
					
										
				
				
				</table>
				
				<!-- save the options -->
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'bbp-topic-count' ); ?>" />
				</p>
								
				
			</form>
		</div><!--end sf-wrap-->
	</div><!--end wrap-->
		
	<?php
}

// register the plugin settings
function tc_register_settings() {

	// create whitelist of options
	register_setting( 'tc_settings_group', 'tc_settings' );
	}
//call register settings function
add_action( 'admin_init', 'tc_register_settings' );


function tc_settings_menu() {

	// add settings page
	add_submenu_page('options-general.php', __('bbp topic count', 'bbp-topic-count'), __('bbp topic count', 'bbp-topic-count'), 'manage_options', 'bbp-topic-count-settings', 'tc_settings_page');
}
add_action('admin_menu', 'tc_settings_menu');

/*****************************   Checkbox functions **************************/

function activate_topic_checkbox() {
 	global $tc_options ;
	$item1 =  $tc_options['activate_topics'] ;
	echo '<input name="tc_settings[activate_topics]" id="tc_settings[activate_topics]" type="checkbox" value="1" class="code" ' . checked( 1,$item1, false ) . ' /> Add this item to the display';
  }
  
function activate_reply_checkbox() {
 	global $tc_options ;
	$item2 =  $tc_options['activate_replies'] ;
	echo '<input name="tc_settings[activate_replies]" id="tc_settings[activate_replies]" type="checkbox" value="1" class="code" ' . checked( 1,$item2, false ) . ' /> Add this item to the display';
  }

function activate_totalposts_checkbox() {
 	global $tc_options ;
	$item3 =  $tc_options['activate_posts'] ;
	echo '<input name="tc_settings[activate_posts]" id="tc_settings[activate_posts]" type="checkbox" value="1" class="code" ' . checked( 1,$item3, false ) . ' /> Add this item to the display';
  }