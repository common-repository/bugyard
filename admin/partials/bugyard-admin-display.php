<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    bugyard
 * @subpackage bugyard/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
    //Grab all options
    $options = get_option($this->bugyard);

    // Cleanup
    $isActive = $options['isActive'];
    $project_name = $options['project_name'];
?>

<?php
    settings_fields($this->bugyard);
    do_settings_sections($this->bugyard);
?>

<div class="wrap">

    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <form method="post" name="cleanup_options" action="options.php">

        <?php settings_fields($this->bugyard); ?>

        <p>Welcome to the bugyard from wordpress plugin, please find below the details to get started.</p>
        <!-- load jQuery from CDN -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Activate Bugyard on your Wordpress Website', $this->bugyard); ?></span></legend>
            <label for="<?php echo $this->bugyard; ?>-isActive">
                <input type="checkbox"  id="<?php echo $this->bugyard; ?>-isActive" name="<?php echo $this->bugyard; ?>[isActive]" value="1" <?php checked($isActive,1); ?>/>
                <span><?php esc_attr_e('Activate Bugyard on your Wordpress Website', $this->bugyard); ?></span>
            </label>
                    <fieldset>
                        <p>Copy in the field below the wordpress ID that is located in your project > configuration > wordpress, then click on save.</p>
                        <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->bugyard); ?></span></legend>
                        <input class="regular-text" id="<?php echo $this->bugyard; ?>-project_name" name="<?php echo $this->bugyard; ?>[project_name]" value="<?php if(!empty($project_name)) echo $project_name; ?>"/>
                    </fieldset>
        </fieldset>

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>

</div>
