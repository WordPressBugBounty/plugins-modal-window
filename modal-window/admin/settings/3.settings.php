<?php
/*
 * Page Name: Settings
 */

use ModalWindow\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/settings.php' );
$field    = new CreateFields( $options, $page_opt );
$id       = $options['id'] ?? '';

$item_order = ! empty( $options['item_order']['triggers'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>

    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][triggers]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-crosshairs"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Triggers', 'modal-window' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
                <span class="wpie-icon wpie_icon-chevron-down"></span>
                <span class="wpie-icon wpie_icon-chevron-up "></span>
            </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'modal_show' ); ?>
					<?php $field->create( 'modal_timer' ); ?>
					<?php $field->create( 'reach_window' ); ?>
                </div>
                <div class="wpie-fields">
					<?php $field->create( 'use_cookies' ); ?>
					<?php $field->create( 'modal_cookies' ); ?>
                </div>
                <div class="wpie-fields is-column wpie-trigger-click">
                    <ul>
                        <li>
                            <b class="wpie-color-danger"><?php esc_html_e( 'You can open popup via adding to the element:', 'modal-window' ); ?></b>
                        </li>
                        <li><strong>Class</strong> - wow-modal-id-<?php echo absint( $id ); ?>, like <code>&lt;span
                                class="wow-modal-id-<?php echo absint( $id ); ?>"&gt;Open Popup&lt;/span&gt;</code>
                        </li>
                        <li><strong>ID</strong> - wow-modal-id-<?php echo absint($id); ?>, like <code>&lt;span
                                id="wow-modal-id-<?php echo absint($id); ?>"&gt;Open Popup&lt;/span&gt;</code></li>
                        <li><strong>URL</strong> - #wow-modal-id-<?php echo absint( $id ); ?>, like <code>&lt;a
                                href="#wow-modal-id-<?php echo absint( $id ); ?>">Open Popup&lt;/a&gt;</code></li>
                    </ul>
                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['animation'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][animation]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-sparkle"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Animation', 'modal-window' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'window_animate' ); ?>
					<?php $field->create( 'speed_window' ); ?>
                </div>
                <div class="wpie-fields">
					<?php $field->create( 'window_animate_out' ); ?>
					<?php $field->create( 'speed_window_out' ); ?>
                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['close_popup'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][close_popup]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-square-minus"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Closing Modal', 'modal-window' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'close_button_overlay' ); ?>
					<?php $field->create( 'close_button_esc' ); ?>
                </div>
                <div class="wpie-fields is-column">
                    <ul>
                        <li>
                            <b class="wpie-color-danger"><?php esc_html_e( 'You can сlose popup via adding to the element:', 'modal-window' ); ?></b>
                        </li>
                        <li><strong>Class</strong> - wow-modal-close-<?php echo absint($id); ?>, like <code>&lt;span
                                class="wow-modal-close-<?php echo absint($id); ?>"&gt;Close Popup&lt;/span&gt;</code></li>
                        <li><strong>ID</strong> - wow-modal-close-<?php echo absint($id); ?>, like <code>&lt;span
                                id="wow-modal-close-<?php echo absint($id); ?>"&gt;Close Popup&lt;/span&gt;</code></li>
                        <li><strong>URL</strong> - #wow-modal-close-<?php echo absint($id); ?>, like <code>&lt;a
                                href="#wow-modal-close-<?php echo absint($id); ?>">Close Popup&lt;/a&gt;</code></li>
                    </ul>
                </div>
            </div>

        </div>
    </details>

<?php
