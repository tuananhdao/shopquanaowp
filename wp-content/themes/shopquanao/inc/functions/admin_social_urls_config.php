<?php
/*
 * For the Theme Setting Page
 */
function theme_settings_page(){
	?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("social-config-section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_menu_page("Theme Options", "Social URLs", "manage_options", "theme-panel", "theme_settings_page", null, 63);
}

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

function display_instagram_element()
{
	?>
		<input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" />
	<?php
}

function display_pinterest_element()
{
	?>
		<input type="text" name="pinterest_url" id="pinterest_url" value="<?php echo get_option('pinterest_url'); ?>" />
	<?php
}

function display_googleplus_element()
{
	?>
		<input type="text" name="googleplus_url" id="googleplus_url" value="<?php echo get_option('googleplus_url'); ?>" />
	<?php
}

function display_theme_panel_fields()
{
	add_settings_section("social-config-section", "All Settings", null, "theme-options");
	
	add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "social-config-section");
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "social-config-section");
    add_settings_field("instagram_url", "Instagram Profile Url", "display_instagram_element", "theme-options", "social-config-section");
    add_settings_field("pinterest_url", "Pinterest Profile Url", "display_pinterest_element", "theme-options", "social-config-section");
    add_settings_field("googleplus_url", "Google Plus Profile Url", "display_googleplus_element", "theme-options", "social-config-section");

    register_setting("social-config-section", "facebook_url");
	register_setting("social-config-section", "twitter_url");
	register_setting("social-config-section", "instagram_url");
	register_setting("social-config-section", "pinterest_url");
	register_setting("social-config-section", "googleplus_url");
}