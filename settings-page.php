<?php

defined('ABSPATH') || die ;


?>


<div class="wrap">
<h1>Keep Note Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'keep-note-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'keep-note-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Show note window</th>
        <td>

        <?php $options = get_option( 'show_note_window' ); ?>
        <?php

        if(!isset($options['status'])){
            $options['status'] = "yes";
        }

        ?>
<label><input type="radio" name="show_note_window[status]" value="yes"<?php checked( 'yes' == $options['status'] ); ?> /> Yes </label> <div style="width: 20px"></div>
<label><input type="radio" name="show_note_window[status]" value="no"<?php checked( 'no' == $options['status'] ); ?> /> No </label>
        </tr>


    </table>

    <?php submit_button(); ?>

</form>
</div>