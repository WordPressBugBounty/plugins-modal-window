<?php
/*
 * Page Name: Mac Apps
 */

use ModalWindow\WOWP_Plugin;

defined( 'ABSPATH' ) || exit;

$apps_profile = 'https://www.glaze.app/@mononinja';
$apps_img_url = WOWP_Plugin::url() . 'admin/assets/img/';

$apps_utm = [
	'utm_source'   => 'wp-plugin',
	'utm_medium'   => 'admin',
	'utm_campaign' => 'wow-modal-windows-pro',
];

$mac_apps = [
	[
		'url'     => 'https://www.glaze.app/app/wordpress-recon-zBgB3y',
		'title'   => 'WordPress Recon',
		'icon'    => 'WordPress-Recon.png',
		'content' => 'See what your WordPress site reveals to the outside world — version, theme, plugins and other public fingerprints.',
	],
	[
		'url'     => 'https://www.glaze.app/app/seoinspector-FwJNp5',
		'title'   => 'SEOInspector',
		'icon'    => 'SEOInspector.png',
		'content' => 'Every SEO check your site needs: meta tags, structured data, Open Graph, backlinks, LLM mentions and more.',
	],
	[
		'url'     => 'https://www.glaze.app/app/sitelens-Dw8vob',
		'title'   => 'SiteLens',
		'icon'    => 'SiteLens.png',
		'content' => 'Everything a URL can tell you — headers, redirects, certificates, DNS and the whole technology stack.',
	],
	[
		'url'     => 'https://www.glaze.app/app/linkchecker-qVMVv9',
		'title'   => 'LinkChecker',
		'icon'    => 'LinkChecker.png',
		'content' => 'Crawl a site and find broken links, dead images and bad redirect chains before your visitors do.',
	],
	[
		'url'     => 'https://www.glaze.app/app/imagery-6MoowR',
		'title'   => 'Imagery',
		'icon'    => 'Imagery.png',
		'content' => 'Compress images and see the result side by side, so pages load faster without visible quality loss.',
	],
	[
		'url'     => 'https://www.glaze.app/app/sitepulse-CGEXg6',
		'title'   => 'SitePulse',
		'icon'    => 'SitePulse.png',
		'content' => 'Monitor website uptime in real time and get notified the moment a site stops responding.',
	],
	[
		'url'     => 'https://www.glaze.app/app/geolens-p9eAgc',
		'title'   => 'GeoLens',
		'icon'    => 'GeoLens.png',
		'content' => 'Browse your site as any country sees it and verify geo-targeted content, redirects and pricing.',
	],
];
?>

    <div class="wpie-apps">

        <div class="wpie-apps__intro">
            <h2><?php esc_html_e( 'Mac apps for site owners', 'wow-modal-windows-pro' ); ?></h2>
            <p><?php esc_html_e( 'Native macOS utilities from the author of this plugin, for auditing, monitoring and optimising the sites you build. They run on your Mac, not on your server — this page is only a list of links, nothing is installed or sent anywhere.', 'wow-modal-windows-pro' ); ?></p>
        </div>

        <div class="wpie-apps__grid">
			<?php foreach ( $mac_apps as $app ) :
				$app_url = add_query_arg( $apps_utm, $app['url'] );
				?>
                <div class="wpie-app-card">
                    <div class="wpie-app-card__head">
                        <img class="wpie-app-card__icon"
                             src="<?php echo esc_url( $apps_img_url . $app['icon'] ); ?>"
                             width="48" height="48" alt="" loading="lazy">
                        <div>
                            <h3 class="wpie-app-card__title"><?php echo esc_html( $app['title'] ); ?></h3>
                            <span class="wpie-app-card__badge"><?php esc_html_e( 'macOS', 'wow-modal-windows-pro' ); ?></span>
                        </div>
                    </div>
                    <p class="wpie-app-card__text"><?php echo esc_html( $app['content'] ); ?></p>
                    <a class="wpie-app-card__link" href="<?php echo esc_url( $app_url ); ?>" target="_blank"
                       rel="noopener noreferrer">
						<?php esc_html_e( 'View app', 'wow-modal-windows-pro' ); ?>
                        <span class="dashicons dashicons-external"></span>
                    </a>
                </div>
			<?php endforeach; ?>
        </div>

        <p class="wpie-apps__footer">
            <a href="<?php echo esc_url( add_query_arg( $apps_utm, $apps_profile ) ); ?>" target="_blank"
               rel="noopener noreferrer">
				<?php esc_html_e( 'See all apps', 'wow-modal-windows-pro' ); ?>
                <span class="dashicons dashicons-external"></span>
            </a>
        </p>

    </div>

<?php
