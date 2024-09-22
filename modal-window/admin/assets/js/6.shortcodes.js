'use strict';

jQuery(document).ready(function ($) {
    const selectors = {
        settings: '.popup-box-shortcode-option',
        shortcode_type: '[data-field="shortcode_type"]',
        shortcode_btn_type: '[data-field="shortcode_btn_type"]',
        shortcode_btn_color: '[data-field="shortcode_btn_color"]',
        shortcode_btn_bgcolor: '[data-field="shortcode_btn_bgcolor"]',
        color_picker: '.wpie-color',
        video_box: '.video-box',
        button_box: '.button-box',
        iframe_box: '.iframe-box',
        icon_box: '.icon-box',
    };

    function set_up() {
        $(selectors.color_picker).wpColorPicker({
            change: function (event, ui) {
                builder();
            }
        });

        $(selectors.shortcode_type).each(shortcode_type);
        $(selectors.shortcode_btn_type).each(shortcode_btn_type);
        builder();
    }

    function initialize_events() {
        $(selectors.settings).on('change', selectors.shortcode_type, shortcode_type);
        $(selectors.settings).on('change', selectors.shortcode_btn_type, shortcode_btn_type);
        $(selectors.settings).on('change click keyup', builder);
    }

    function shortcode_type() {
        const type = $(this).val();
        $('.video-box, .button-box, .iframe-box, .icon-box').hide();
        if (type === 'button') {
            $('.button-box').show();
        }
        if (type === 'video') {
            $('.video-box').show();
        }
        if (type === 'iframe') {
            $('.iframe-box').show();
        }
        if (type === 'icon') {
            $('.icon-box').show();
        }
    }

    function shortcode_btn_type() {
        const type = $(this).val();
        const fields = $('[data-field-box="shortcode_btn_link"], [data-field-box="shortcode_btn_target"]');
        fields.hide();

        if (type === 'link') {
            fields.show();
        }
    }

    $('#shortcodeInsert').on('click', function () {
        let shortcode = $('#shortcodeBox').text();

        if (jQuery('#wp-popupBoxContent-editor-container > textarea').is(':visible')) {
            let val = jQuery('#wp-popupBoxContent-editor-container > textarea').val() + shortcode;
            jQuery('#wp-popupBoxContent-editor-container > textarea').val(val);
        } else {
            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
        }
        tb_remove();
    });

    function builder() {
        const type = $('[data-field="shortcode_type"]').val();
        let video_from = $('[data-field="shortcode_video_from"]').val();
        let video_id = $('[data-field="shortcode_video_id"]').val();
        let video_width = $('[data-field="shortcode_video_width"]').val();
        let video_height = $('[data-field="shortcode_video_height"]').val();
        let button = $('[data-field="shortcode_btn_type"]').val();
        let btn_size = $('[data-field="shortcode_btn_size"]').val();
        let btn_fullwidth = $('[data-field="shortcode_btn_fullwidth"]').val();
        let btn_text = $('[data-field="shortcode_btn_text"]').val();
        let btn_color = $('[data-field="shortcode_btn_color"]').val();
        let btn_bgcolor = $('[data-field="shortcode_btn_bgcolor"]').val();
        let btn_link = $('[data-field="shortcode_btn_link"]').val();
        let btn_target = $('[data-field="shortcode_btn_target"]').val();
        let btn_class = $('[data-field="shortcode_btn_class"]').val();

        $('#shortcodeBtnPreview').html('');
        let shortcode;
        if (type === 'video') {
            shortcode = '[videoBox from="' + video_from + '" id="' + video_id + '" width="' + video_width + '" height="' +
                video_height + '"]';
        }
        if (type === 'button') {
            let fullwidth;
            if (btn_fullwidth === '') {
                fullwidth = 'no';
            } else {
                fullwidth = 'yes';
                btn_fullwidth = 'is-fullwidth';
            }
            let btn_param = 'type="' + button + '" color="' + btn_color + '" bgcolor="' + btn_bgcolor + '" size="' +
                btn_size + '" fullwidth="' + fullwidth + '" class="' + btn_class + '"';
            if (button === 'link') {
                btn_param += ' link="' + btn_link + '" target="' + btn_target + '"';
            }
            shortcode = '[buttonBox ' + btn_param + ']' + btn_text + '[/buttonBox]';

            let content_size = $('#content_size').val();
            $('#shortcodeBtnPreview').css({
                'font-size': content_size + 'px',
            });
            let style = 'color:' + btn_color + ';background:' + btn_bgcolor + ';';
            let btn_preview = '<button class="ds-button is-' + btn_size + ' ' + btn_fullwidth + '" style="' + style + '">' +
                btn_text + '</button>';
            $('#shortcodeBtnPreview').html(btn_preview);
        }
        if (type === 'iframe') {
            let iframe_link = $('[data-field="iframe_link"]').val();
            let iframe_width = $('[data-field="iframe_width"]').val();
            let iframe_height = $('[data-field="iframe_height"]').val();
            let iframe_width_unit = $('[data-field="iframe_width_unit"]').val();
            let iframe_height_unit = $('[data-field="iframe_height_unit"]').val();
            let iframe_id = $('[data-field="iframe_id"]').val();
            let iframe_class = $('[data-field="iframe_class"]').val();
            let iframe_style = $('[data-field="iframe_style"]').val();
            shortcode = `[iframeBox link="${iframe_link}" width="${iframe_width}${iframe_width_unit}" height="${iframe_height}${iframe_height_unit}" id="${iframe_id}" class="${iframe_class}" style="${iframe_style}"]`;
        }

        if (type === 'icon') {
            let shortcode_icon = $('[data-field="shortcode_icon"]').val();
            let icon_color = $('[data-field="icon_color"]').val();
            let icon_size = $('[data-field="icon_size"]').val();
            let icon_link = $('[data-field="icon_link"]').val();
            let icon_target = $('[data-field="icon_target"]').val();

            shortcode = `[wow-icon name="${shortcode_icon}" color="${icon_color}" size="${icon_size}"`;

            if(icon_link !== '') {
                shortcode += ` link="${icon_link}" target="${icon_target}"`;
            }
            shortcode += ']';
            let icon_preview = `<i class="${shortcode_icon}" style="color:${icon_color};font-size:${icon_size}px;"></i>`;
            $('#shortcodeBtnPreview').html(icon_preview);
        }


        $('#shortcodeBox').text(shortcode);
    }

    function initialize() {
        set_up();
        initialize_events();
    }

    initialize();

});