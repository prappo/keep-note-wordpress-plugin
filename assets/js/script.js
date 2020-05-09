jQuery(document).ready(function ($) { //wrapper

    /**
     * ==================================================
     * Check if the position of the editor is set or not
     * If not set then set default position left and top
     * ==================================================
     */


    let default_position_top = 20, default_position_left = 1000


    if (localStorage.getItem('kn_editor_post_left')) {

        /**
         * If position already set previously then this block
         * will execute :D
         */

        $('#kn-editor').offset({
            'left': localStorage.getItem('kn_editor_post_left'),
            'top': localStorage.getItem('kn_editor_post_top')
        });


    } else {

        /**
         * If the editor position does not set
         * Then set the default position
         */

        $('#kn-editor').offset({
            'left': default_position_left,
            'top': default_position_top
        });

    }

    /**
     * Show saved note in the textarea filed
     */

    if (localStorage.getItem('kn_txt_data')) {
        $('#kn_txt').val(localStorage.getItem('kn_txt_data'));
    }


    /**
     * Check and control window content visibility
     */

    if (localStorage.getItem("kn_editor_visible") == 'yes') {

        $('#kn-editor-body').show();

    } else if (localStorage.getItem("kn_editor_visible") == 'no') {

        $('#kn-editor-body').hide();


    } else {

        $('#kn-editor-body').show();

    }


    /**
     * Control draggable window
     */

    $("#kn-editor").draggable({
        handle: '.kn-header',
        drag: function () {
            var offset = $(this).offset();
            var x = $("#kn-editor").position();
            localStorage.setItem("kn_editor_post_top", x.top);
            localStorage.setItem("kn_editor_post_left", x.left);

        }
    });


    $("#kn_txt").on('change keyup paste', function () {
        localStorage.setItem("kn_txt_data", $(this).val());
    });


    $('.kn-header__close').click(function () {


        $('#kn-editor-body').toggle();


        if ($("#kn-editor-body").is(':visible')) {

            localStorage.setItem("kn_editor_visible", "yes");

        } else {

            localStorage.setItem("kn_editor_visible", "no");

        }
    });


    $('#tab_save').click(function () {
        alert('Saved');
    });


});