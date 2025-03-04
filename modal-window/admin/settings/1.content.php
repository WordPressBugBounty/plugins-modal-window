<?php
/*
 * Page Name: Content
 */

use ModalWindow\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/content.php' );
$field    = new CreateFields( $options, $page_opt );
?>

    <div class="wpie-fieldset">
        <div class="wpie-fields is-column">
			<?php $field->create( 'content' ); ?>
        </div>
        <div class="wpie-fields">
		    <?php $field->create( 'aria_live' ); ?>
        </div>
    </div>

    <div id="popupShortcode" style="display:none;">

        <div class="wpie-fieldset popup-box-shortcode-option">
            <div class="wpie-fields">
				<?php $field->create( 'shortcode_type' ); ?>
            </div>
            <div class="wpie-fields video-box">
				<?php $field->create( 'shortcode_video_from' ); ?>
				<?php $field->create( 'shortcode_video_id' ); ?>
				<?php $field->create( 'shortcode_video_width' ); ?>
				<?php $field->create( 'shortcode_video_height' ); ?>
            </div>

            <div class="wpie-fields button-box">
				<?php $field->create( 'shortcode_btn_type' ); ?>
				<?php $field->create( 'shortcode_btn_size' ); ?>
				<?php $field->create( 'shortcode_btn_fullwidth' ); ?>
				<?php $field->create( 'shortcode_btn_text' ); ?>
				<?php $field->create( 'shortcode_btn_color' ); ?>
				<?php $field->create( 'shortcode_btn_bgcolor' ); ?>
				<?php $field->create( 'shortcode_btn_link' ); ?>
				<?php $field->create( 'shortcode_btn_target' ); ?>
				<?php $field->create( 'shortcode_btn_class' ); ?>
            </div>

            <div class="wpie-fields iframe-box">
				<?php $field->create( 'iframe_link' ); ?>
				<?php $field->create( 'iframe_width' ); ?>
				<?php $field->create( 'iframe_height' ); ?>
				<?php $field->create( 'iframe_id' ); ?>
				<?php $field->create( 'iframe_class' ); ?>
				<?php $field->create( 'iframe_style' ); ?>
            </div>
            <div class="wpie-fields icon-box">
	            <?php $field->create( 'shortcode_icon' ); ?>
	            <?php $field->create( 'icon_color' ); ?>
	            <?php $field->create( 'icon_size' ); ?>
	            <?php $field->create( 'icon_link' ); ?>
	            <?php $field->create( 'icon_target' ); ?>
            </div>

        </div>

        <div class="wpie-fieldset">
            <div class="wpie-fields is-column">
                <div id="shortcodeBtnPreview"></div>
            </div>
            <div class="wpie-fields is-column">
                <div id="shortcodeBox"></div>
            </div>
            <div class="wpie-fields is-column">
                <button class="button button-primary button-large" id="shortcodeInsert">
                    <span><?php esc_html_e('Insert Shortcode', 'modal-window');?></span>
                </button>
            </div>
        </div>

    </div>
<?php
