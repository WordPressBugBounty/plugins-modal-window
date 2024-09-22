<?php
/*
 * Page Name: Button
 */

use ModalWindow\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/button.php' );
$field    = new CreateFields( $options, $page_opt );
$id       = $options['id'] ?? '';
?>
<details class="wpie-item" open>
	<summary class="wpie-item_heading">
		<span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-bottom"></span></span>
		<span class="wpie-item_heading_label"><?php esc_html_e( 'Floating Button', 'modal-window' ); ?></span>
	</summary>
	<div class="wpie-item_content">
		<div class="wpie-fields">
			<?php $field->create( 'umodal_button' ); ?>
			<?php $field->create( 'button_type' ); ?>
			<?php $field->create( 'umodal_button_text' ); ?>
		</div>
        <div class="umodal-button-options has-mt">

            <div class="wpie-fieldset umodal-button-icon">
                <div class="wpie-legend"><?php esc_html_e( 'Icon', 'modal-window' ); ?></div>
                <div class="wpie-fields">
			        <?php $field->create( 'button_icon' ); ?>
			        <?php $field->create( 'rotate_icon' ); ?>
			        <?php $field->create( 'button_icon_after' ); ?>
			        <?php $field->create( 'button_shape' ); ?>
                </div>
            </div>

            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Location', 'modal-window' ); ?></div>
                <div class="wpie-fields">
			        <?php $field->create( 'umodal_button_position' ); ?>
			        <?php $field->create( 'button_position' ); ?>
			        <?php $field->create( 'button_margin' ); ?>
                </div>
            </div>

            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Style', 'modal-window' ); ?></div>
                <div class="wpie-fields">
			        <?php $field->create( 'button_text_size' ); ?>
			        <?php $field->create( 'button_padding' ); ?>
			        <?php $field->create( 'button_radius' ); ?>
                </div>
                <div class="wpie-fields">
		            <?php $field->create( 'button_text_color' ); ?>
		            <?php $field->create( 'button_text_hcolor' ); ?>
		            <?php $field->create( 'umodal_button_color' ); ?>
		            <?php $field->create( 'umodal_button_hover' ); ?>
                </div>
            </div>

        </div>

	</div>
</details>