'use strict'

jQuery(document).ready(function ($) {

    $.fn.wowFullEditor = function () {
        this.each(function (index, element) {
            const newId = 'wpie-fulleditor-' + (index + 1);
            $(element).attr('id', newId);
            $(element).css({'border': 'none', 'width': '100%'});
            if(index === 0) {
                wp.editor.initialize(
                    newId,
                    {
                        tinymce: {
                            wpautop: false,
                            plugins: 'lists wplink hr charmap textcolor colorpicker paste tabfocus wordpress wpautoresize wpeditimage wpemoji wpgallery wplink wptextpattern codemirror table',
                            toolbar1: 'shortcodes code | bold italic underline subscript superscript blockquote | bullist numlist | alignleft aligncenter alignright alignjustify | link unlink | wp_adv',
                            toolbar2: 'strikethrough hr | forecolor backcolor | pastetext removeformat charmap | outdent indent | undo redo wp_help ',
                            toolbar3: 'formatselect fontselect fontsizeselect | table',
                            toolbar4: 'w-row w-column w-row-example | modalform',
                            codemirror: {
                                indentOnInit: true, // Whether or not to indent code on init.
                                fullscreen: false,   // Default setting is false
                                path: modal_window_obj.plugin_url + 'admin/assets/js/vendors/codemirror', // Path to CodeMirror distribution
                                width: 800,         // Default value is 800
                                height: 600,        // Default value is 550
                                saveCursorPosition: true,    // Insert caret marker
                            },

                            setup: function (editor) {
                                editor.addButton('shortcodes', {
                                    icon: 'mce-ico dashicons-before dashicons-shortcode',
                                    onclick: function () {
                                        var width = $(window).width();
                                        var H = $(window).height();
                                        var W = (720 < width) ? 720 : width;
                                        W = W - 80;
                                        H = H - 120;

                                        // Open the Thickbox
                                        tb_show('Popup Box Shortcodes', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=popupShortcode');
                                        $("#TB_window").addClass("popup-box-shortcodes");
                                    }
                                });
                                editor.addButton('w-row', {
                                    text: '[w-row]',
                                    tooltip: 'Create row',
                                    onclick: function () {
                                        editor.insertContent('[w-row][/w-row]');
                                    }
                                });
                                editor.addButton('w-column', {
                                    text: '[w-column]',
                                    tooltip: 'Create a column. Attributes: width - this value can be from 1 to 12, align - this value can be: left, center, right',
                                    onclick: function () {
                                        editor.insertContent('[w-column][/w-column]');
                                    }
                                });
                                editor.addButton('w-row-example', {
                                    text: 'Row Example',
                                    tooltip: 'Example wirh row and column',
                                    onclick: function () {
                                        editor.insertContent('[w-row] [w-column width=6 align="center"] Content with 50% width and align center [/w-column] [w-column width=6 align="right"] Content with 50% width and align right [/w-column] [/w-row]');
                                    }
                                });
                                editor.addButton('modalform', {
                                    text: '{form}',
                                    tooltip: 'Insert the form',
                                    onclick: function () {
                                        editor.insertContent('{form}');
                                    }
                                });
                            }
                        },
                        quicktags: {
                            buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close",
                        },
                        mediaButtons: true,
                    }
                );
            } else {
                wp.editor.initialize(
                    newId,
                    {
                        tinymce: {
                            wpautop: false,
                            plugins: 'lists wplink hr charmap textcolor colorpicker paste tabfocus wordpress wpautoresize wpeditimage wpemoji wpgallery wplink wptextpattern codemirror table',
                            toolbar1: 'code | bold italic underline subscript superscript blockquote | bullist numlist | alignleft aligncenter alignright alignjustify | link unlink | wp_adv',
                            toolbar2: 'strikethrough hr | forecolor backcolor | pastetext removeformat charmap | outdent indent | undo redo wp_help ',
                            toolbar3: 'formatselect fontselect fontsizeselect | table',
                            toolbar4: 'modalemail modalemailname modalemailtext',
                            codemirror: {
                                indentOnInit: true, // Whether or not to indent code on init.
                                fullscreen: false,   // Default setting is false
                                path: modal_window_obj.plugin_url + 'admin/assets/js/vendors/codemirror', // Path to CodeMirror distribution
                                width: 800,         // Default value is 800
                                height: 600,        // Default value is 550
                                saveCursorPosition: true,    // Insert caret marker
                            },
                            setup: function (editor) {
                                editor.addButton('modalemail', {
                                    text: '{email}',
                                    tooltip: 'User email',
                                    onclick: function () {
                                        editor.insertContent('{email}');
                                    }
                                });
                                editor.addButton('modalemailname', {
                                    text: '{name}',
                                    tooltip: 'User Name',
                                    onclick: function () {
                                        editor.insertContent('{name}');
                                    }
                                });
                                editor.addButton('modalemailtext', {
                                    text: '{text}',
                                    tooltip: 'Email Text',
                                    onclick: function () {
                                        editor.insertContent('{text}');
                                    }
                                });
                            },
                        },
                        quicktags: {
                            buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close",
                        },
                        mediaButtons: true,
                    }
                );
            }
        });
    };

    $.fn.wowTextEditor = function () {
        this.each(function (index, element) {
            const newId = 'wpie-shorteditor-' + (index + 1);
            $(element).attr('id', newId);
            $(element).css({'border-top': 'none', 'min-height': '2'});

            wp.editor.initialize(newId, {
                tinymce: false, // This disables Visual mode
                quicktags: {
                    buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close,fullscreen"
                },
                mediaButtons: false,
            });
        });
    };

    $.fn.wowIconPicker = function () {
        this.fontIconPicker({
            theme: 'fip-darkgrey',
            emptyIcon: false,
            allCategoryText: 'Show all',
        });
    };

    $.fn.wowImageDownload = function (){
        const input = $(this).find('input');
        const addon = $(this).find('.wpie-field__label.is-addon');
        $(addon).html('<span class="wpie-icon wpie_icon-file-download is-pointer"></span>');
        var custom_uploader;

        $(addon).on('click', function (e){
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }

            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected in the media manager...
            custom_uploader.on('select', function() {
                // Get media attachment details from the frame state
                var attachment = custom_uploader.state().get('selection').first().toJSON();

                // Send the attachment URL to our custom input field.
                $(input).val(attachment.url);
            });

            // Open the media manager.
            custom_uploader.open();
        });

    };


});