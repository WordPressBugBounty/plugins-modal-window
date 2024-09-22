'use strict';

jQuery(document).ready(function ($) {

    const selectors = {
        settings: '#wpie-settings',
        color_picker: '.wpie-color',
        checkbox: '.wpie-field input[type="checkbox"]',
        full_editor: '.wpie-fulleditor',
        item_heading: '.wpie-item .wpie-item_heading',
        location: '[data-field="location"]',
        overlay: '[data-field="overlay_checkbox"]',
        shadow: '[data-field="shadow"]',
        border_style: '[data-field="border_style"]',
        close_checkbox: '[data-field="close_checkbox"]',
        close: '[data-field="close"]',
        close_type: '[data-field="close_type"]',
        mobile_checkbox: '[data-field="mobile_checkbox"]',
        triggers: '[data-field="modal_show"]',
        close_redirect_checkbox: '[data-field="close_redirect_checkbox"]',
        video_support: '[data-field="video_support"]',
        language: '[data-field="language"]',
        tracking_open: '[data-field="enable_tracking_open"]',
        tracking_close: '[data-field="enable_tracking_close"]',
        close_location: '[data-field="close_location"]',
        width_unit: '[data-field="width_unit"]',
        height_unit: '[data-field="modal_height_par"]',
        popup_title: '[data-field="popup_title"]',
        use_cookies: '[data-field="use_cookies"]',
        umodal_button: '[data-field="umodal_button"]',
        button_type: '[data-field="button_type"]',
        send_to_admin: '[data-field="send_to_admin"]',
        send_to_user: '[data-field="send_to_user"]',
        scrollbar_width: '[data-field="scrollbar_width"]',
        language_on: '[data-field="language_on"]',
        image_download: '.wpie-image-download',

    };


    function set_up() {
        $(selectors.full_editor).wowFullEditor();

        $('.wpie-icon-box select').fontIconPicker({
            theme: 'fip-darkgrey', emptyIcon: false, allCategoryText: 'Show all',
        });

        $(selectors.color_picker).wpColorPicker();
        $(selectors.image_download).wowImageDownload();

        $(selectors.checkbox).each(set_checkbox);
        $(selectors.location).each(location);
        $(selectors.overlay).each(overlay);
        $(selectors.shadow).each(shadow);
        $(selectors.border_style).each(border_style);
        $(selectors.close_checkbox).each(close_checkbox);
        $(selectors.mobile_checkbox).each(mobile_checkbox);
        $(selectors.triggers).each(triggers);
        $(selectors.close_redirect_checkbox).each(close_redirect_checkbox);
        $(selectors.video_support).each(video_support);
        $(selectors.close_type).each(close_type);
        $(selectors.language).each(language);
        $(selectors.tracking_open).each(tracking);
        $(selectors.tracking_close).each(tracking);
        $(selectors.close_location).each(close_location);
        $(selectors.width_unit).each(size_unit);
        $(selectors.height_unit).each(size_unit);
        $(selectors.popup_title).each(popup_title);
        $(selectors.use_cookies).each(use_cookies);
        $(selectors.umodal_button).each(umodal_button);
        $(selectors.button_type).each(button_type);
        $(selectors.send_to_admin).each(email_settings);
        $(selectors.send_to_user).each(email_settings);
        $(selectors.scrollbar_width).each(scrollbar_width);

    }

    function initialize_events() {
        $(selectors.settings).on('change', selectors.checkbox, set_checkbox);
        $(selectors.settings).on('change', selectors.location, location);
        $(selectors.settings).on('change', selectors.overlay, overlay);
        $(selectors.settings).on('change', selectors.shadow, shadow);
        $(selectors.settings).on('change', selectors.border_style, border_style);
        $(selectors.settings).on('change', selectors.close_checkbox, close_checkbox);
        $(selectors.settings).on('change', selectors.mobile_checkbox, mobile_checkbox);
        $(selectors.settings).on('click', selectors.item_heading, item_toggle);
        $(selectors.settings).on('change', selectors.triggers, triggers);
        $(selectors.settings).on('change', selectors.close_redirect_checkbox, close_redirect_checkbox);
        $(selectors.settings).on('change', selectors.video_support, video_support);
        $(selectors.settings).on('change', selectors.close_type, close_type);
        $(selectors.settings).on('change', selectors.language, language);
        $(selectors.settings).on('change', selectors.tracking_open, tracking);
        $(selectors.settings).on('change', selectors.tracking_close, tracking);
        $(selectors.settings).on('change', selectors.close_location, close_location);
        $(selectors.settings).on('change', selectors.width_unit, size_unit);
        $(selectors.settings).on('change', selectors.height_unit, size_unit);
        $(selectors.settings).on('change', selectors.popup_title, popup_title);
        $(selectors.settings).on('change', selectors.use_cookies, use_cookies);
        $(selectors.settings).on('change', selectors.umodal_button, umodal_button);
        $(selectors.settings).on('change', selectors.button_type, button_type);
        $(selectors.settings).on('change', selectors.send_to_admin, email_settings);
        $(selectors.settings).on('change', selectors.send_to_user, email_settings);
        $(selectors.settings).on('change', selectors.scrollbar_width, scrollbar_width);
    }

    function initialize() {
        set_up();
        initialize_events();
    }

    // Set the checkboxes
    function set_checkbox() {
        const next = $(this).next('input[type="hidden"]');
        if ($(this).is(':checked')) {
            next.val('1');
        } else {
            next.val('0');
        }
    }

    function close_type() {

        const type = $(this).val();
        const close_text = $('[data-field-box="close_content"]');
        const close_padding = $('[data-field-box="close_padding"]');
        const close_box_size = $('[data-field-box="close_box_size"]');
        $(close_text).add(close_padding).add(close_box_size).addClass('is-hidden');
        if (type === 'text') {
            $(close_text).add(close_padding).removeClass('is-hidden');
        }

        if (type === 'image') {
           $(close_box_size).removeClass('is-hidden');
        }


    }

    function location() {
        const type = $(this).val().replace('-', '');
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        const typeFieldMapping = {
            topCenter: ['top'],
            bottomCenter: ['bottom'],
            left: ['left'],
            topLeft: ['top', 'left'],
            bottomLeft: ['bottom', 'left'],
            right: ['right'],
            topRight: ['top', 'right'],
            bottomRight: ['bottom', 'right'],
            center: [],
        }
        if (typeFieldMapping[type]) {
            const fieldsToShow = typeFieldMapping[type];
            fieldsToShow.forEach(field => {
                parent.find(`[data-field-box="${field}"]`).removeClass('is-hidden');
            });
        }
    }

    function overlay() {
        const parent = get_parent_fields($(this));
        const fields = parent.find('.wp-picker-container, [data-field-box="overlay_animation"]');
        fields.addClass('is-hidden');
        if ($(this).is(':checked')) {
            fields.removeClass('is-hidden');
        }
    }

    function shadow() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const type = $(this).val();
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        if (type !== 'none') {
            fields.removeClass('is-hidden');
        }
    }

    function close_redirect_checkbox() {
        const field = $('[data-field-box="close_redirect_target"]');
        field.addClass('is-hidden');
        if ($(this).is(':checked')) {
            field.removeClass('is-hidden');
        }
    }

    function video_support() {
        const type = $(this).val();
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        if (type === '2') {
            fields.removeClass('is-hidden');
        }
    }

    function border_style() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const radius = $('[data-field-box="border_radius"]');
        const type = $(this).val();
        const fields = parent.find('[data-field-box]').not(box).not(radius);
        fields.addClass('is-hidden');
        if (type !== 'none') {
            fields.removeClass('is-hidden');
        }
    }

    function close_checkbox() {
        const parent = get_parent_fields($(this), '.wpie-fieldset');
        const par_content = get_parent_fields($(this), '.wpie-item_content');
        const box = get_field_box($(this));
        const fields = parent.find('[data-field-box]').not(box);
        const fieldsets = par_content.find('.wpie-fieldset').not(parent);
        fields.addClass('is-hidden');
        fieldsets.addClass('is-hidden');
        if ($(this).is(':checked')) {
            fields.removeClass('is-hidden');
            fieldsets.removeClass('is-hidden');
            $(selectors.close).each(close_type);
        }
    }

    function mobile_checkbox() {
        const field = $('[data-field-box="mobile_width"]');
        field.addClass('is-hidden');
        if ($(this).is(':checked')) {
            field.removeClass('is-hidden');
        }
    }

    function triggers() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const type = $(this).val();
        const fields = parent.find('[data-field-box="reach_window"]');
        const text = $('.wpie-trigger-click');
        fields.addClass('is-hidden');
        text.addClass('is-hidden');
        if (type === 'scroll') {
            fields.removeClass('is-hidden');
        }
        if(type === 'click' || type === 'hover') {
            text.removeClass('is-hidden');
        }

    }

    function language() {
        const type = $(this).val();
        const locale = $('[data-field-box="locale"]');
        locale.addClass('is-hidden');
        if (type === 'custom') {
            locale.removeClass('is-hidden');
        }
    }

    function tracking() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        if ($(this).is(':checked')) {
            fields.removeClass('is-hidden');
        }
    }

    function popup_title() {
        const titleBox = $('.popup-title');
        titleBox.addClass('is-hidden');
        if ($(this).is(':checked')) {
            titleBox.removeClass('is-hidden');
        }
    }

    function use_cookies() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const type = $(this).val();
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        if (type !== 'no') {
            fields.removeClass('is-hidden');
        }
    }

    function umodal_button() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const type = $(this).val();
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        $('.umodal-button-options').addClass('is-hidden');
        if (type !== 'no') {
            fields.removeClass('is-hidden');
            $('.umodal-button-options').removeClass('is-hidden');
        }
    }

    function button_type() {
        const type = $(this).val();
        const text = $('[data-field-box="umodal_button_text"]');
        const icon = $('.umodal-button-icon');
        const button_icon_after = $('[data-field-box="button_icon_after"]');
        const button_shape = $('[data-field-box="button_shape"]');
        $(text).add(icon).add(button_icon_after).add(button_shape).addClass('is-hidden');
        const button = $('[data-field="umodal_button"]').val();
        if(button === 'no') {
            return;
        }
        if(type === '1') {
            $(text).removeClass('is-hidden');
        }
        if(type === '2') {
            $(text).add(icon).add(button_icon_after).removeClass('is-hidden');
        }
        if(type === '3') {
            $(icon).add(button_shape).removeClass('is-hidden');
        }

    }

    function item_toggle() {
        const parent = get_parent_fields($(this), '.wpie-item');
        const val = $(parent).attr('open') ? '0' : '1';
        $(parent).find('.wpie-item__toggle').val(val);
    }

    function close_location() {
        const type = $(this).val();
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        const typeFieldMapping = {
            topLeft: ['close_top_position', 'close_left_position'],
            bottomLeft: ['close_bottom_position', 'close_left_position'],
            topRight: ['close_top_position', 'close_right_position'],
            bottomRight: ['close_bottom_position', 'close_right_position'],
        }
        if (typeFieldMapping[type]) {
            const fieldsToShow = typeFieldMapping[type];
            fieldsToShow.forEach(field => {
                parent.find(`[data-field-box="${field}"]`).removeClass('is-hidden');
            });
        }
    }

    function scrollbar_width() {
        const type = $(this).val();
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        if(type !== 'none') {
            fields.removeClass('is-hidden');
        }
    }

    function email_settings() {
        const parent = get_parent_fields($(this));
        const grandParent = get_parent_fields($(this), '.wpie-fieldset');
        const box = get_field_box($(this));
        const fields = parent.find('[data-field-box]').not(box);
        const editor = grandParent.find('.-editor-box');
        fields.add(editor).addClass('is-hidden');
        if ($(this).is(':checked')) {
            fields.add(editor).removeClass('is-hidden');
        }
    }

    function size_unit() {
        const val = $(this).val();
        const parent = get_field_box($(this));
        const field = $(parent).find('input');
        if (val === 'auto') {
            $(field).attr('readonly', 'readonly');
            $(field).addClass('is-blur');
        } else {
            $(field).removeAttr('readonly');
            $(field).removeClass('is-blur');
        }
    }



    function get_parent_fields($el, $class = '.wpie-fields') {
        return $el.closest($class);
    }

    function get_field_box($el, $class = '.wpie-field') {
        return $el.closest($class);
    }

    initialize();
});