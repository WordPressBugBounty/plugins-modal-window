<?php
/*
 * Page Name: Targeting & Rules
 */

use ModalWindow\Admin\CreateFields;
use ModalWindow\Settings_Helper;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/rules.php' );
$field    = new CreateFields( $options, $page_opt );

?>

<?php
$item_order = ! empty( $options['item_order']['8'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][8]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-roadmap"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Display Rules', 'modal-window' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset wpie-rules">
            <div class="wpie-fields">
				<?php $field->create( 'show', 0 ); ?>
				<?php $field->create( 'operator', 0 ); ?>
				<?php $field->create( 'ids', 0 ); ?>
				<?php $field->create( 'page_type', 0 ); ?>
            </div>

			<?php
			$rules_count = ( ! empty( $options['show'] ) && is_array( $options['show'] ) ) ? count( $options['show'] ) : 0;
			if ( $rules_count > 1 ):
				for ( $i = 1; $i < $rules_count; $i ++ ):
					?>
                    <div class="wpie-fields">
						<?php $field->create( 'show', $i ); ?>
						<?php $field->create( 'operator', $i ); ?>
						<?php $field->create( 'ids', $i ); ?>
						<?php $field->create( 'page_type', $i ); ?>
                        <span class="wpie-remove wpie-icon wpie_icon-trash"></span>
                    </div>
				<?php endfor; endif; ?>
        </div>
    </div>
</details>

<?php
$item_order = ! empty( $options['item_order']['9'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][9]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-laptop-mobile"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Responsive Visibility', 'modal-window' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset">
            <div class="wpie-fields">
		        <?php $field->create( 'screen' ); ?>
		        <?php $field->create( 'screen_more' ); ?>
            </div>
        </div>
    </div>
</details>
