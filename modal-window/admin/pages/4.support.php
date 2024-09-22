<?php
/**
 * Page Name: Support
 *
 */

use ModalWindow\Admin\SupportForm;
use ModalWindow\WOWP_Plugin;

defined( 'ABSPATH' ) || exit;
?>

    <div class="wpie-block-tool is-white">

        <p>
			<?php
			esc_html_e( 'To get your support related question answered in the fastest timing, please send a message via the form below or write to us via', 'modal-window' );
			echo ' <a href="' . esc_url( WOWP_Plugin::info( 'support' ) ) . '">' . esc_html__( 'support page', 'modal-window' ) . '</a>';
			?>
        </p>

        <p>
			<?php esc_html_e( 'Also, you can send us your ideas and suggestions for improving the plugin.', 'modal-window' ); ?>
        </p>

		<?php SupportForm::init(); ?>

    </div>
<?php
