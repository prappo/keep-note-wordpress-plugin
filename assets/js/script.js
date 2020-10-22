jQuery(document).ready(function ($) { //wrapper

    /**
     * ==================================================
     * Check if the position of the editor is set or not
     * If not set then set default position left and top
     * ==================================================
     */

    localStorage.setItem("kn_editor_visible", "yes");

    let default_position_top = 20,
        default_position_left = 1000


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
     * Check and control window content visibility
     */

    if (localStorage.getItem("kn_editor_visible") == 'yes') {

        $('#kn-editor-body').show();

    } else if (localStorage.getItem("kn_editor_visible") == 'no') {

        $('#kn-editor').hide();

    } else {

        $('#kn-editor').show();

    }


    /**
     * Control draggable window
     */

    $("#kn-editor").draggable({
        handle: '.kn-header, .tabs',
        drag: function () {
            var offset = $(this).offset();
            var x = $("#kn-editor").position();
            localStorage.setItem("kn_editor_post_top", x.top);
            localStorage.setItem("kn_editor_post_left", x.left);

        }
    });



    $("#kn_txt").on('change keyup paste', function () {
        $('.kn-title').html('Note*');
        localStorage.setItem("kn_txt_data", $(this).val());
    });

    localStorage.setItem("kn_editor_visible", "yes");

    // $('.kn-header__close').click(function () {

    //     $('#kn-editor-body').toggle();

    //     if ($("#kn-editor-body").is(':visible')) {

    //         localStorage.setItem("kn_editor_visible", "yes");

    //     } else {

    //         localStorage.setItem("kn_editor_visible", "no");

    //     }
    // });



    $('#tab_save').click(function () {

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                'action': 'kn_save_txt',
                'kn_text': $('#kn_txt').val()
            },
            success: function (data) {
                $('.kn-title').html('Saved');
                setTimeout(function () {
                    $('.kn-title').html('Note');
                }, 1000);

            },
            error: function (data) {
                console.log(data.responseText);
                alert('Something went wrong');
            }
        });
    });

    $('#kn-new').click(function () {
        $('#kn_txt').val('');
        // alert('Working');
    });

    $('#kn_txt').val(localStorage.getItem('kn_txt_data'));

    $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
            'action': 'kn_get_txt',
        },
        success: function (data) {

            if (localStorage.getItem('kn_txt_data')) {
                $('#kn_txt').val(localStorage.getItem('kn_txt_data'));
            }

        }
    });


    $('.btn_set_default_postion , #wp-admin-bar-keep-note-reset-window').click(function () {
        $('#kn-editor').offset({
            'left': default_position_left,
            'top': default_position_top
        });

        localStorage.setItem("kn_editor_post_top", default_position_top);
        localStorage.setItem("kn_editor_post_left", default_position_left);
    });

});