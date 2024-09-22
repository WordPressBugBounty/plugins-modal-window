<?php
/*
 * Page Name: Style
 */

use ModalWindow\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/style.php' );
$field    = new CreateFields( $options, $page_opt );

$item_order = ! empty( $options['item_order']['general'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][general]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-paintbrush"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'General', 'modal-window' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">

            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Properties', 'modal-window' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'modal_width' ); ?>
					<?php $field->create( 'modal_height' ); ?>
					<?php $field->create( 'modal_zindex' ); ?>
					<?php $field->create( 'modal_position' ); ?>
                </div>
            </div>
            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Border', 'modal-window' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'border_radius' ); ?>
					<?php $field->create( 'border_style' ); ?>
					<?php $field->create( 'border_width' ); ?>
					<?php $field->create( 'border_color' ); ?>
                </div>
            </div>
            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Shadow', 'modal-window' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'shadow' ); ?>
					<?php $field->create( 'shadow_h_offset' ); ?>
					<?php $field->create( 'shadow_v_offset' ); ?>
					<?php $field->create( 'shadow_blur' ); ?>
					<?php $field->create( 'shadow_spread' ); ?>
					<?php $field->create( 'shadow_color' ); ?>
                </div>
            </div>
            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Content', 'modal-window' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'modal_padding' ); ?>
					<?php $field->create( 'content_size' ); ?>
					<?php $field->create( 'content_font' ); ?>
                </div>
                <div class="wpie-fields">
		            <?php $field->create( 'scrollbar_width' ); ?>
		            <?php $field->create( 'scrollbar_color' ); ?>
		            <?php $field->create( 'scrollbar_background' ); ?>
                </div>
            </div>
            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Background', 'modal-window' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'overlay_color' ); ?>
					<?php $field->create( 'bg_color' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['location'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][location]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-pointer"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Location', 'modal-window' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields wpie-modal-location">
					<?php $field->create( 'modal_top' ); ?>
					<?php $field->create( 'modal_bottom' ); ?>
					<?php $field->create( 'modal_left' ); ?>
					<?php $field->create( 'modal_right' ); ?>
                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['title'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][title]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-text"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Title', 'modal-window' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fields">
				<?php $field->create( 'popup_title' ); ?>
            </div>
            <div class="wpie-fieldset popup-title has-mt">
                <div class="wpie-fields">
					<?php $field->create( 'title_size' ); ?>
					<?php $field->create( 'title_line_height' ); ?>
					<?php $field->create( 'title_font' ); ?>
					<?php $field->create( 'title_font_weight' ); ?>
					<?php $field->create( 'title_font_style' ); ?>
					<?php $field->create( 'title_align' ); ?>
                </div>
                <div class="wpie-fields">
					<?php $field->create( 'title_color' ); ?>
					<?php $field->create( 'title_background' ); ?>
                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['close_button'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][close_button]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-square-plus"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Close Button', 'modal-window' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Positioning', 'modal-window' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'close_location' ); ?>
					<?php $field->create( 'close_top_position' ); ?>
					<?php $field->create( 'close_bottom_position' ); ?>
					<?php $field->create( 'close_left_position' ); ?>
					<?php $field->create( 'close_right_position' ); ?>
                </div>
            </div>
            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Type', 'modal-window' ); ?></div>
                <div class="wpie-fields">
	                <?php $field->create( 'close_type' ); ?>
	                <?php $field->create( 'close_box_size' ); ?>
	                <?php $field->create( 'close_content' ); ?>
	                <?php $field->create( 'close_padding' ); ?>
	                <?php $field->create( 'close_border_radius' ); ?>
                </div>
            </div>

            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Font', 'modal-window' ); ?></div>
                <div class="wpie-fields">
			        <?php $field->create( 'close_font' ); ?>
			        <?php $field->create( 'close_weight' ); ?>
			        <?php $field->create( 'close_font_style' ); ?>
			        <?php $field->create( 'close_size' ); ?>
                </div>
            </div>

            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Colors', 'modal-window' ); ?></div>
                <div class="wpie-fields">
			        <?php $field->create( 'close_content_color' ); ?>
			        <?php $field->create( 'close_content_color_hover' ); ?>
			        <?php $field->create( 'close_background_color' ); ?>
			        <?php $field->create( 'close_background_hover' ); ?>
                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['mobile_rules'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][mobile_rules]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-laptop-mobile"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Mobile Rule', 'modal-window' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'screen_size' ); ?>
					<?php $field->create( 'mobile_width' ); ?>
                </div>
            </div>

        </div>
    </details>

<?php
