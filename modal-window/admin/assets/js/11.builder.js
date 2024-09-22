'use strict';

jQuery(document).ready(function ($) {

    $.fn.wowModalLiveBuilder = function () {
        $('.wpie-settings__main').on('click', '.wpie-preview-button', function (e) {
            e.preventDefault();
            let content;
            const editor = tinyMCE.get('wpie-fulleditor-1');
            if (editor && !editor.isHidden()) {
                content = editor.getContent();
            } else {
                content = $('#wpie-fulleditor-1').val();
            }

            let formData = $('#wpie-settings').serialize();

            const data = {
                action: 'modal_window_preview_content', // Replace with your desired action hook
                data: content,
                security_nonce: $('#wow_mwp_settings').val(),
                form_data: formData,
            };
            $.post(ajaxurl, data, function (response) {
                if (response.success) {
                    $(".modal-window-preview").html(response.data.content);
                    $('#modal-window-preview').ModalWindow(response.data.options);
                }
            });
        });

    };

    $($.fn).wowModalLiveBuilder();
});