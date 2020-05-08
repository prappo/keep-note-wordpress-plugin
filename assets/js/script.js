jQuery(document).ready(function($) { //wrapper



    if (localStorage.getItem('kn_txt_data')) {
        $('#kn_txt').val(localStorage.getItem('kn_txt_data'));
    }

    if (localStorage.getItem("kn_editor_visible")) {
        $('#kn-editor-body').show();
    } else {
        $('#kn-editor-body').hide();
    }


    $("#kn-editor").draggable({
        handle: '.kn-header',
        drag: function() {
            var offset = $(this).offset();
            var x = $("#kn-editor").position();
            localStorage.setItem("kn_editor_post_top", x.top);
            localStorage.setItem("kn_editor_post_left", x.left);

        }
    });

    $('#kn-editor').offset({
        'left': localStorage.getItem('kn_editor_post_left'),
        'top': localStorage.getItem('kn_editor_post_top')
    });

    $("#kn_txt").on('change keyup paste', function() {
        localStorage.setItem("kn_txt_data", $(this).val());
    });








    $('.kn-header__close').click(function() {


        $('#kn-editor-body').toggle();


        if ($("#kn-editor-body").is(':visible')) {

            localStorage.setItem("kn_editor_visible", true);

        } else {

            localStorage.setItem("kn_editor_visible", false);

        }
    });



    $('#kn_btn_save').click(function() {
        alert('Saved');
    });


});