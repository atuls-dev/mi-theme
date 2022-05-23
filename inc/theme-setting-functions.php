<?php 

/*
 * functions related to theme settings
 */
function theme_settings_page()
{
    ?>
    <div class="wrap">
	    <h1>Theme Settings Page</h1>
	    <form method="post" action="options.php" enctype="multipart/form-data">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
	</div>
	<?php
}

function add_theme_menu_item()
{
	add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_layout_element()
{
	?>
		<input type="checkbox" name="theme_layout" value="1" <?php checked(1, get_option('theme_layout'), true); ?> /> 
	<?php
}

function logo_display()
{
	?>
	    
	    <input type="text" name="theme_logo" value="<?php echo get_option('logo'); ?>" readonly='readonly'>
        <input type="file" name="logo" /><br />
        <img height="auto" width="150" src="<?php echo get_option('logo'); ?>" />
   <?php
}

function handle_logo_upload()
{
    $option = get_option('logo');
	if(!empty($_FILES["logo"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;   
	}
	  
	return $option;
}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("theme_layout", "Do you want social icons to appear in header?", "display_layout_element", "theme-options", "section");
    add_settings_field("logo", "Logo", "logo_display", "theme-options", "section"); 
    
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "theme_layout");
    register_setting("section", "logo", "handle_logo_upload");
}

add_action("admin_init", "display_theme_panel_fields");

function wpb_custom_excerpt( $output ) {
  if ( has_excerpt() && ! is_attachment() ) {
    $output .= wpb_continue_reading_link();
  }
  return $output;
}
add_filter( 'get_the_excerpt', 'wpb_custom_excerpt' );
